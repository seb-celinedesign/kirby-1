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
class Column extends Component
{
	public string $id;
	public Sections $sections;
	public Width $width;

	public function __construct(
		string $id,
		Width $width = null,
		Sections $sections = null
	) {
		$this->id       = $id;
		$this->sections = $sections ?? new Sections();
		$this->width    = $width    ?? new Width();
	}
}
