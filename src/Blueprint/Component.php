<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;
use ReflectionProperty;
use ReflectionUnionType;

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
	/**
	 * Dynamic getter for properties
	 */
	public function __call(string $name, array $args)
	{
		return $this->$name;
	}

	/**
	 * Creates an instance by a set of array properties.
	 */
	public static function factory(array $props)
	{
		foreach ($props = static::polyfill($props) as $key => $value) {
			$props[$key] = static::factoryForProperty($key, $value);
		}

		return new static(...$props);
	}

	public static function factoryForProperty(string $key, mixed $value): mixed
	{
		// instantly assign objects
		// PHP's type system will find issues automatically
		if (is_object($value) === true) {
			return $value;
		}

		// get the type for the property
		$reflection = new ReflectionProperty(static::class, $key);
		$propType   = $reflection->getType();

		// union types
		if (is_a($propType, ReflectionUnionType::class) === true) {
			// let the type system take over
			return $value;
		}

		// get the class name for the single type
		$className = $propType->getName();

		// check if there's a factory for the value
		if (is_subclass_of($className, Component::class) === true) {
			return $className::factory($value);

		// try to assign the value directly and trust
		// in PHP's type system.
		} else {
			return $value;
		}
	}

	/**
	 * Universal setter for properties
	 */
	public function set(string $key, mixed $value): static
	{
		$this->$key = static::factoryForProperty($key, $value);
		return $this;
	}

	/**
	 * Optional method that runs before static::factory sends
	 * its properties to the instance. This is perfect to clean
	 * up props or keep deprecated props compatible.
	 */
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
