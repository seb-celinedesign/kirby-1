<?php

namespace Kirby\Blueprint;

/**
 * Tab
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Tab extends Node
{
	public Blueprint $blueprint;
	public Columns $columns;
	public string|null $icon;
	public Translated $label;

	public function __construct(
		Blueprint $blueprint,
		string $id,
		string|array|null $label = null,
		string|null $icon = null,
		array $columns = []
	) {
		parent::__construct(
			id: $id,
			model: $blueprint->model,
		);

		$this->blueprint = $blueprint;
		$this->columns   = Columns::factory($this, $columns);
		$this->icon      = $icon;
		$this->id        = $id;
		$this->label     = new Label($this, $label);
	}

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

	public function sections(): Sections
	{
		$sections = new Sections();

		foreach ($this->columns as $column) {
			foreach ($column->sections as $section) {
				$sections->__set($section->id, $section);
			}
		}

		return $sections;
	}
}
