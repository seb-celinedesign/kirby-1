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
	public function __construct(
		public string $id,
		public Width|null $width = null,
		public Sections|null $sections = null
	) {
	}

	public function fields(): ?Fields
	{
		return $this->sections?->fields();
	}
}
