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

	public static function factory(array $sections = []): static
	{
		$collection = new static();
		$collection->data = Autoload::collection('section', $sections);

		return $collection;
	}
}
