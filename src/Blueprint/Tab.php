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
	public Columns $columns;
	public Icon $icon;
	public Label $label;

	public function __construct(
		string $id,
		Label $label = null,
		Icon $icon = null,
		Columns $columns = null
	) {
		$this->columns   = $columns ?? new Columns();
		$this->icon      = $icon ?? new Icon();
		$this->id        = $id;
		$this->label     = $label ?? Label::fallback($id);
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
