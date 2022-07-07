<?php

namespace Kirby\Blueprint;

/**
 * Column
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Column extends Node
{
	public Sections $sections;
	public Tab $tab;
	public Width $width;

	public function __construct(
		Tab $tab,
		string $id,
		string|null $width = null,
		array $sections = []
	) {
		parent::__construct(
			id: $id,
			model: $tab->model
		);

		$this->tab      = $tab;
		$this->sections = Sections::factory(column: $this, sections: $sections);
		$this->width    = new Width($width);
	}
}
