<?php

namespace Kirby\Blueprint;

/**
 * The main blueprint class
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Blueprint extends Node
{
	public string $id;
	public Label $label;
	public Tabs $tabs;
	public string $type;

	public function __construct(
		string $id,
		Label $label = null,
		Tabs $tabs = null,
	) {
		$this->id    = $id;
		$this->label = $label ?? Label::fallback($id);
		$this->tabs  = $tabs  ?? new Tabs();
	}

	/**
	 * Collects all columns from all tabs
	 */
	public function columns(): Columns
	{
		$columns = new Columns();

		foreach ($this->tabs as $tab) {
			foreach ($tab->columns as $column) {
				$columns->__set($column->id, $column);
			}
		}

		return $columns;
	}

	public static function factory(array $props): static
	{
		return parent::factory(static::polyfill($props));
	}

	/**
	 * Collects all fields from all tabs
	 */
	public function fields(): Fields
	{
		$fields = new Fields();

		foreach ($this->sections() as $section) {
			if ($section->type !== 'fields') {
				continue;
			}

			foreach ($section->fields as $field) {
				$fields->__set($field->id, $field);
			}
		}

		return $fields;
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

	/**
	 * Collects all sections from all tabs
	 */
	public function sections(): Sections
	{
		$sections = new Sections();

		foreach ($this->tabs as $tab) {
			foreach ($tab->sections() as $section) {
				$sections->__set($section->id, $section);
			}
		}

		return $sections;
	}
}
