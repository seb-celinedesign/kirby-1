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

	public static function factory(Column $column, array $sections = []): static
	{
		$collection = new static();

		foreach ($sections as $id => $section) {
			$section['column'] = $column;
			$section['id']   ??= $id;

			$section = Autoload::section($section);

			$collection->__set($section->id, $section);
		}

		return $collection;
	}
}
