<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;
use Throwable;

/**
 * Array converter for blueprint objects
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
trait ArrayConverter
{
	public function __debuginfo(): array
	{
		return $this->toArray();
	}

	public function toArray(): array
	{
		$array = [];

		// go through all public properties
		foreach (get_object_vars($this) as $key => $value) {
			try {
				$array[$key] = $this->toArrayValue($key, $value);
			} catch (Throwable) {
				// don't add items to the array that
				// cannot be converted
			}
		}

		// sort keys alphabetically
		ksort($array);

		return $array;
	}

	public function toArrayValue(string $key, mixed $value)
	{
		return match (true) {
			// arrays, scalars and nulls
			is_object($value) === false => $value,

			// translatable values are more useful as strings
			is_a($value, Translate::class) => $value->toString(),

			// don't export parent blueprints, columns, tabs, sections and fields
			// to avoid infinite nesting loops
			is_a($value, Blueprint::class),
			is_a($value, Column::class),
			is_a($value, Field::class),
			is_a($value, ModelWithContent::class),
			is_a($value, Section::class),
			is_a($value, Tab::class) => throw new Throwable('Do not export'),

			// objects with toArray method
			method_exists($value, 'toArray') => $value->toArray(),

			// objects with debug info method
			method_exists($value, '__debuginfo') => $value->__debuginfo(),

			// objects that can be at least converted to string
			method_exists($value, '__toString') => $value->__toString(),
		};
	}
}
