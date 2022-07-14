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
	public function __construct(
		public string $id,
		public Label|null $label = null,
		public Icon|null $icon = null,
		public Columns|null $columns = null
	) {
		$this->label ??= Label::fallback($id);
	}

	/**
	 * Collects all fields from all columns
	 */
	public function fields(): ?Fields
	{
		return $this->sections()?->fields();
	}

	/**
	 * Collects all sections from all columns
	 */
	public function sections(): ?Sections
	{
		return $this->columns?->sections();
	}
}
