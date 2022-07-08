<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

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
	public Tabs $tabs;
	public Label $title;
	public string $type;

	public function __construct(
		ModelWithContent $model,
		string $id,
		string|array|null $title = null,
		array $tabs = []
	) {
		parent::__construct(
			id: $id,
			model: $model
		);

		$this->title = new Label($this, $title);
		$this->tabs  = Tabs::factory($this, $tabs);
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
