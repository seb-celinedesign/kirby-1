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
	/**
	 * @var \Kirby\Blueprint\Sections
	 */
	public Sections $sections;

	/**
	 * @var \Kirby\Blueprint\Tab
	 */
	public Tab $tab;

	/**
	 * @var \Kirby\Blueprint\Width
	 */
	public Width $width;

	/**
	 * @param \Kirby\Blueprint\Tab $tab
	 * @param string $id
	 * @param string|null|null $width
	 * @param array $sections
	 */
	public function __construct(
		Tab $tab,
		string $id,
		string|null $width = null,
		array $sections = []
	) {
		parent::__construct($id);

		$this->tab      = $tab;
		$this->sections = new Sections($this, $sections);
		$this->width    = new Width($width);
	}
}
