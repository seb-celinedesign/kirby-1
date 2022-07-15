<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;
use Kirby\Exception\NotFoundException;

/**
 * The main blueprint class
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Blueprint extends NodeWithType
{
	public const TYPE = 'blueprint';

	public function __construct(
		public string $id,
		public Label|null $label = null,
		public Tabs|null $tabs = null,
	) {
		$this->label ??= Label::fallback($id);
	}

	/**
	 * Collects all columns from all tabs
	 */
	public function columns(): ?Columns
	{
		return $this->tabs?->columns();
	}

	public static function factory(array $props): static
	{
		return parent::factory(static::polyfill($props));
	}

	/**
	 * Collects all fields from all tabs
	 */
	public function fields(): ?Fields
	{
		return $this->sections()?->fields();
	}

	public static function polyfill(array $props): array
	{
		$props = static::polyfillTitle($props);
		$props = static::polyfillIcon($props);
		$props = static::polyfillFields($props);
		$props = static::polyfillSections($props);
		$props = static::polyfillColumns($props);

		return $props;
	}

	public static function polyfillColumns(array $props): array
	{
		if (isset($props['columns']) === true) {
			// create a new wrapping tab
			$props['tabs'] = [
				'content' => [
					'columns' => $props['columns']
				]
			];

			unset($props['columns']);
		}

		return $props;
	}

	public static function polyfillFields(array $props): array
	{
		// fields shortcut
		if (isset($props['fields']) === true) {
			// create a new wrapping content section
			$props['sections'] = [
				'content' => [
					'type'   => 'fields',
					'fields' => $props['fields']
				]
			];

			unset($props['fields']);
		}

		return $props;
	}

	public static function polyfillIcon(array $props): array
	{
		// move icon definition into image
		if (isset($props['icon']) === true) {
			$props['image']['icon'] = $props['icon'];
			unset($props['icon']);
		}

		return $props;
	}

	public static function polyfillSections(array $props): array
	{
		// sections shortcut
		if (isset($props['sections']) === true) {
			// create a new wrapping column
			$props['columns'] = [
				[
					'sections' => $props['sections']
				]
			];

			unset($props['sections']);
		}

		return $props;
	}

	public static function polyfillTitle(array $props): array
	{
		// make old title option compatible
		if (isset($props['title']) === true) {
			$props['label'] = $props['title'];
			unset($props['title']);
		}

		return $props;
	}

	public function render(ModelWithContent $model, string $tab = null): array
	{
		return [
			'label' => $this->label->render($model),
			'tabs'  => $this->tabs?->render($model),
			'tab'   => $this->tab($tab)?->render($model, true)
		];
	}

	/**
	 * Collects all sections from all tabs
	 */
	public function sections(): ?Sections
	{
		return $this->columns()?->sections();
	}

	/**
	 * Get the current tab by id
	 */
	public function tab(string $id = null): ?Tab
	{
		// the blueprint might not have any tabs
		if ($this->tabs === null || $this->tabs->count() === 0) {
			return null;
		}

		// no tab id -> take first tab
		if ($id === null) {
			return $this->tabs->first();
		}

		// find tab by id
		if ($tab = $this->tabs?->$id) {
			return $tab;
		}

		throw new NotFoundException('The tab could not be found');
	}
}
