<?php

namespace Kirby\Blueprint;

/**
 * Sections
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Sections extends Collection
{
	public const TYPE = Section::class;

	public function __construct(Column $column, array $sections = [])
	{
		foreach ($sections as $id => $section) {
			$section['column'] = $column;
			$section['id']   ??= $id;

			$section = Autoload::section($section);

			$this->__set($section->id, $section);
		}
	}
}
