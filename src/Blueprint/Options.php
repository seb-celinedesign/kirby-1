<?php

namespace Kirby\Blueprint;

/**
 * Options
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Options extends Collection
{
	public const TYPE = Option::class;

	public static function factory(array $options = []): static
	{
		$collection = new static();

		foreach ($options as $key => $option) {
			if (is_string($option) === true) {
				if (is_string($key) === true) {
					$option = ['value' => $key, 'text' => $option];
				} else {
					$option = ['value' => $option];
				}
			}

			$option = Option::factory($option);
			$collection->__set($option->value, $option);
		}

		return $collection;
	}
}
