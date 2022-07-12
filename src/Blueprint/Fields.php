<?php

namespace Kirby\Blueprint;

/**
 * Fields
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Fields extends Collection
{
	public const TYPE = Field::class;

	public static function factory(array $fields = []): static
	{
		$collection = new static();
		$collection->data = Autoload::collection('field', $fields);

		return $collection;
	}
}
