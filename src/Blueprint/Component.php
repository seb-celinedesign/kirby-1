<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;
use ReflectionProperty;

/**
 * Base component for everything in blueprints
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Component
{
	public static function factory(array $props): static
	{
		foreach ($props = static::polyfill($props) as $key => $value) {
			$props[$key] = static::factoryForProperty($key, $value);
		}

		return new static(...$props);
	}

	public static function factoryForProperty(string $key, $value): mixed
	{
		if (is_object($value) === true) {
			return $value;
		}

		$reflection = new ReflectionProperty(static::class, $key);
		$className  = $reflection->getType()->getName();

		if (class_exists($className) === true && method_exists($className, 'factory') === true) {
			return $className::factory($value);
		} else {
			return $value;
		}
	}

	public function set(string $key, $value): static
	{
		$this->$key = static::factoryForProperty($key, $value);
		return $this;
	}

	public static function polyfill(array $props): array
	{
		return $props;
	}

	public function render(ModelWithContent $model): mixed
	{
		$array = [];

		// go through all public properties
		foreach (get_object_vars($this) as $key => $value) {
			if (is_object($value) === false && is_resource($value) === false) {
				$array[$key] = $value;
				continue;
			}

			if (method_exists($value, 'render') === true) {
				$array[$key] = $value->render($model);
			}
		}

		// sort keys alphabetically
		ksort($array);
		return $array;
	}
}
