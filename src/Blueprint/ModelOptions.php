<?php

namespace Kirby\Blueprint;

/**
 * Model options
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class ModelOptions
{
	use Exporter;

	public const ALIASES = [];

	public static function factory(array $props): static
	{
		$options = [];

		foreach ($props as $key => $prop) {
			// support for old option names
			$key = static::ALIASES[$key] ?? $key;
			// add the model option to a clean new array
			$options[$key] = ModelOption::factory($prop);
		}

		return new static(...$options);
	}

}
