<?php

namespace Kirby\Blueprint;

use TypeError;

/**
 * Autoloader for blueprint components
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Autoload
{
	/**
	 * @param array $props
	 * @return \Kirby\Blueprint\Blueprint
	 */
	public static function blueprint(array $props): Blueprint
	{
		return static::type('blueprint', $props);
	}

	/**
	 * @param array $props
	 * @return \Kirby\Blueprint\Field
	 */
	public static function field(array $props): Field
	{
		return static::type('field', $props);
	}

	/**
	 * @param array $props
	 * @return \Kirby\Blueprint\Section
	 */
	public static function section(array $props): Section
	{
		return static::type('section', $props);
	}

	/**
	 * @param array $props
	 * @return \Kirby\Blueprint\Type
	 */
	public static function type(string $group, array $props): Node
	{
		// find the object type
		$type  = $props['type'] ??= $props['id'];
		$class = __NAMESPACE__ . '\\' . ucfirst($type) . ucfirst($group);

		// check for a valid section type
		if (class_exists($class) === false) {
			throw new TypeError('The ' . $group . ' type "' . $type . '" does not exist');
		}

		return new $class(...$props);
	}
}
