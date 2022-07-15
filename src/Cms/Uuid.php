<?php

namespace Kirby\Cms;

use Kirby\Cache\Cache;
use Kirby\Toolkit\Str;
use Throwable;

/**
 * The `Uuid` class provides an interface to connect
 * a page, file, user or site model with a dedicated UUID string.
 * It also provides methods to cache these connections
 * for faster lookup.
 *
 * ```
 * // general usage
 * Uuid::for($model)->toString();
 * Uuid::for('page://12345678-90ab-cdef-1234-567890abcdef')->toModel();
 *
 * // cache actions
 * Uuid::for($model)->populate();
 * Uuid::for($model)->clear();
 * Uuid::index();
 * ```
 *
 * @package   Kirby Cms
 * @author    Nico Hoffmann <nico@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://getkirby.com/license
 */
class Uuid
{
	/**
	 * Local collection for more performant
	 * limited/local index to look up model
	 */
	protected Models|Blocks|null $collection;

	/**
	 * UUID string as uri protocol instance
	 */
	protected UuidProtocol $id;

	/**
	 * Model instance
	 */
	protected Site|User|Page|File|Block|null $model;

	public function __construct(
		string|null $uuid = null,
		Site|User|Page|File|Block|null $model = null,
		Models|null $collection = null
	) {
		$this->model      = $model;
		$this->collection = $collection;

		// if UUID is provided
		if ($uuid) {
			$this->id = new UuidProtocol($uuid);
		}

		// if object is provided to create instance
		if ($model) {
			$type = match (true) {
				$model instanceof Site => 'site',
				$model instanceof User => 'user',
				$model instanceof Page => 'page',
				$model instanceof File => 'file',
				$model instanceof Block => 'block',
				// @codeCoverageIgnoreStart
				$model instanceof StructureObject => 'struct'
				// @codeCoverageIgnoreEnd
			};

			// if not id exist yet,
			// create a new one right away
			$id = static::id($type, $model) ?? $this->create();

			$this->id = new UuidProtocol([
				'scheme' => $type,
				'host'   => $id
			]);
		}
	}

	/**
	 * Get instance for lookup cache
	 */
	public static function cache(): Cache
	{
		return App::instance()->cache('uuid');
	}

	/**
	 * Clears UUID from cache
	 */
	public function clear(bool $recursive = false): bool
	{
		// For pages: if $recursive, also clear UUIDs
		// from cache for all children recursively
		if ($this->type() === 'page' && $recursive === true) {
			foreach ($this->model->children() as $child) {
				static::for($child)->clear(true);
			}
		}

		return static::cache()->remove($this->key());
	}

	/**
	 * Returns global index collection
	 * for traversing content files
	 */
	protected function collection(): Models|Blocks
	{
		$kirby = App::instance();
		$site  = $kirby->site();

		$collection = match ($this->type()) {
			'page'  => $site->index(true),
			'file'  => $site->index(true)->files()
				->add($site->files())
				->add($kirby->users()->files()),
			'block' => Blocks::index(),
			// 'structure' => $site->index(true)->content()
		};

		// if a current collection was passed, remove it from
		// the global index as we have already checked it separately
		if ($this->collection !== null) {
			$collection = $collection->remove($this->collection);
		}

		return $collection;
	}

	/**
	 * Create a new UUID hash and update
	 * the model's content file to include it
	 */
	public function create(): string
	{
		$id = Str::uuid();

		// update content file with generated id:
		// make sure Kirby has the required permissions
		// for the update action
		$kirby = App::instance();
		$user  = $kirby->auth()->currentUserFromImpersonation();
		$kirby->impersonate('kirby');
		try {
			$this->model = $this->model->update(['uuid' => $id]);

			// @codeCoverageIgnoreStart
		} catch (Throwable $e) {
			// TODO: needs probably a better solution
			if ($e->getMessage() !== 'The directory "/dev/null" cannot be created') {
				throw $e;
			}
		}
		// @codeCoverageIgnoreEnd
		$kirby->impersonate($user);

		// TODO: replace the above in 3.9.0 with
		// App::instance()->impersonate(
		// 	'kirby',
		// 	fn () => $this->model = $this->model->update(['uuid' => $id])
		// );

		return $id;
	}

	/**
	 * Look up UUID in cache and
	 * resolve to page or file object
	 */
	protected function findFromCache(): Page|File|Block|null
	{
		// get page/file id from cache
		$key   = $this->key();
		$value = static::cache()->get($key);

		if ($value === null) {
			return null;
		}

		$type = $this->type();

		switch ($type) {
			case 'page':
				$model = App::instance()->page($value);
				break;

			case 'file':
				// value is itself another UUID protocol string
				// e.g. page://page-uuid/filename.jpg
				$uuid = new UuidProtocol($value);

				// we need to resolve the parent UUID to its model
				// and then query for the file by filename
				$parent   = static::for($uuid->base())->toModel();
				$filename = $uuid->path()->toString();
				$model    = $parent->file($filename);
				break;

			case 'block':
				// value is itself another UUID protocol string
				// e.g. page://page-uuid/myField/block-uuid
				$uuid = new UuidProtocol($value);

				// resolve e.g. page://page-uuid
				$parent = static::for($uuid->base())->toModel();
				$field  = $uuid->path()->first();
				$block  = $uuid->path()->last();
				$model  = $parent->$field()->toBlocks()->get($block);
				break;
		}

		return $model;
	}

	/**
	 * Look up model by traversing through local/global
	 * index and finding the matching UUID in content file
	 */
	protected function findFromIndex(): Page|File|Block|null
	{
		$id   = $this->id->host();
		$type = $this->type();

		if ($type === 'block') {
			return $this->collection?->get($id) ??
					$this->collection()->get($id);
		}

		if ($type === 'page' || $type === 'file') {
			$filter = fn ($model) => $model->content()->get('uuid')->value() === $id;
			return $this->collection?->filter($filter)->first() ??
					$this->collection()->filter($filter)->first();
		}
	}

	/**
	 * Shorthand to create instance
	 * by passing either UUID or model
	 */
	public static function for(
		string|Page|File|User|Site|Block $seed,
		Models|null $collection = null
	): static {
		if (is_string($seed) === true) {
			return new static(uuid: $seed, collection: $collection);
		}

		return new static(model: $seed, collection: $collection);
	}

	/**
	 * Retrieves the id/host from a model,
	 * e.g. from its content file
	 */
	protected function id(
		string $type,
		Page|File|User|Site|Block $model
	): string|null {
		return match ($type) {
			'site'	 => '',
			'user',
			'block'  => $model->id(),
			'page',
			'file',
			'struct' => $model->content()->get('uuid')->value()
		};
	}

	/**
	 * Populates cache with UUIDs
	 * for all models in index
	 */
	public static function index(): void
	{
		$kirby = App::instance();
		$site  = $kirby->site();
		$index = $site->index(true);

		// pages and page files
		foreach ($index as $page) {
			static::for($page)->populate();

			foreach ($page->files() as $file) {
				static::for($file)->populate();
			}
		}

		// site files
		foreach ($site->files() as $file) {
			static::for($file)->populate();
		}

		// user files
		foreach ($kirby->users()->files() as $file) {
			static::for($file)->populate();
		}

		// blocks
		// TODO: activate once functional
		// foreach (Blocks::index() as $block) {
		// 	static::for($block)->populate();
		// }
	}

	/**
	 * Checks if a string resembles an UUID uri
	 */
	public static function is(
		string $string,
		string|null $type = null
	): bool {
		if ($type !== null) {
			return Str::startsWith($string, $type . '://');
		}

		// try to match any of the supported schemes
		$pattern = sprintf('/(%s):\/\//', implode('|', UuidProtocol::$schemes));
		return preg_match($pattern, $string) === 1;
	}

	/**
	 * Returns key used for cache
	 */
	public function key(): string
	{
		$id = $this->id->toString(false);

		// for better performance when using a file-based cache,
		// turn first two characters of the id into a directory
		$id = substr($id, 0, 2) . '/' . substr($id, 2);

		return $this->type() . '/' . $id;
	}

	/**
	 * Write UUID relation to cache
	 *
	 * @return bool
	 */
	public function populate(): bool
	{
		return static::cache()->set($this->key(), $this->value());
	}


	public function toModel(): Site|User|Page|File|Block|null
	{
		if ($this->model !== null) {
			return $this->model;
		}

		if ($this->type() === 'site') {
			return $this->model = App::instance()->site();
		}

		if ($this->type() === 'user') {
			$id = $this->id->host();
			return $this->model = App::instance()->user($id);
		}

		if ($this->model = $this->findFromCache()) {
			return $this->model;
		}

		if ($this->model = $this->findFromIndex()) {
			// lazily fill cache by writing UUID to cache
			// whenever looked up from index
			$this->populate();

			return $this->model;
		}

		return null;
	}

	/**
	 * Returns the full UUID protocol string
	 * incl. type schema
	 */
	public function toString(): string
	{
		return $this->id->toString();
	}

	/**
	 * Returns the model type
	 */
	public function type(): string
	{
		return $this->id->type();
	}

	/**
	 * Returns the value that will be stored in cache
	 */
	public function value(): string
	{
		if (
			$this->type() === 'site' ||
			$this->type() === 'page' ||
			$this->type() === 'user'
		) {
			return $this->model->id();
		}

		if ($this->type() === 'file') {
			// for files, use parent's UUID as part of the path
			$parent = static::for($this->model->parent());
			return $parent->toString() . '/' . $this->model->filename();
		}

		if ($this->type() === 'block' || $this->type() === 'struct') {
			// for blocks, use parent's UUID and field name
			// as part of the path
			$parent = static::for($this->model->parent());
			$field  = $this->model->field();
			return $parent->toString() . '/' . $field->name() . '/' . $this->model->filename();
		}
	}
}
