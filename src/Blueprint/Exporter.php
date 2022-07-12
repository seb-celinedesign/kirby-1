<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Array and props converter for blueprint objects
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
trait Exporter
{
	public function __debugInfo(): array
	{
		return $this->export();
	}

	public function export(ModelWithContent $model = null)
	{
		$array  = [];

		// go through all public properties
		foreach (get_object_vars($this) as $key => $value) {
			$array[$key] = $this->exportProperty($key, $value, $model);
		}

		// sort keys alphabetically
		ksort($array);
		return $array;
	}

	public function exportProperty(string $key, mixed $value, ModelWithContent $model = null): mixed
	{
		return match (true) {
			// arrays, scalars and nulls
			is_object($value) === false => $value,

			// objects with export method
			method_exists($value, 'export') => $value->export($model),

			// objects with toArray method
			method_exists($value, 'toArray') => $value->toArray(),

			// objects with debug info method
			method_exists($value, '__debuginfo') => $value->__debugInfo(),

			// objects that can be at least converted to string
			method_exists($value, '__toString') => $value->__toString(),

			// objects that cannot be exported
			default => null,
		};
	}

	public function toArray(): array
	{
		return $this->export();
	}
}
