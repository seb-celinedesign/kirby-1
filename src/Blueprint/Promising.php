<?php

namespace Kirby\Blueprint;

/**
 * Promising
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
trait Promising
{
	/**
	 * Creates an instance by a set of array properties.
	 */
	public static function factory(string|array|null $props = null)
	{
		if (is_string($props) === true) {
			return static::promise($props);
		}

		return parent::factory($props ?? []);
	}

	/**
	 * Creates a promise object with the query and correct class name
	 */
	public static function promise(string $query): Promise
	{
		return new Promise($query, static::class);
	}
}
