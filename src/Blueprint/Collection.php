<?php

namespace Kirby\Blueprint;

use Kirby\Cms\Collection as BaseCollection;
use Kirby\Cms\ModelWithContent;
use TypeError;

/**
 * Typed collection
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Collection extends BaseCollection
{
	/**
	 * The expected object type
	 */
	public const TYPE = Component::class;

	public function __construct(array $data = [])
	{
		$this->set($data);
	}

	/**
	 * The Kirby Collection class only shows the key to
	 * avoid huge tress with dump, but for the blueprint
	 * collections this is really not useful
	 */
	public function __debugInfo(): array
	{
		return array_map(function ($item) {
			return (array)$item;
		}, $this->data);
	}

	/**
	 * Validate the type of every item that is being
	 * added to the collection. They can either have
	 * the class defined by static::TYPE or be a
	 * promise that gets resolved later.
	 */
	public function __set(string $key, $value): void
	{
		if (is_a($value, static::TYPE) === false && is_a($value, Promise::class) === false) {
			throw new TypeError('Each value in the collection must be an instance of ' . static::TYPE . ' or a promise');
		}

		parent::__set($key, $value);
	}

	public static function factory(array $items)
	{
		$collection = new static();
		$className  = static::TYPE;

		foreach ($items as $id => $item) {
			if (is_array($item) === true) {
				$item['id'] ??= $id;
				$item = $className::factory($item);
				$collection->__set($item->id, $item);
			} else {
				$collection->__set($id, $className::factory($item));
			}
		}

		return $collection;
	}

	public function render(ModelWithContent $model): mixed
	{
		$props = [];

		foreach ($this->data as $key => $item) {
			$props[$key] = $item->render($model);
		}

		return $props;
	}
}
