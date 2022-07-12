<?php

namespace Kirby\Blueprint;

use ReflectionProperty;
use Throwable;

/**
 * Base element for all blueprint features
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Node
{
	use Exporter;

	public string $id;

	public function __construct(
		string $id
	) {
		$this->id = $id;
	}

	public static function factory(array $props): static
	{
		foreach ($props = static::polyfill($props) as $key => $value) {
			if (is_object($value) === true) {
				continue;
			}

			$reflection = new ReflectionProperty(static::class, $key);
			$className  = $reflection->getType()->getName();

			if (class_exists($className) === true && method_exists($className, 'factory') === true) {
				$props[$key] = $className::factory($value);
			}
		}

		return new static(...$props);
	}

	public static function polyfill(array $props): array
	{
		return $props;
	}
}
