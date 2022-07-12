<?php

namespace Kirby\Blueprint;

use Kirby\Cms\App;
use Kirby\Data\Yaml;
use Kirby\Filesystem\F;
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
	public static function blueprint(string|array $props): Blueprint
	{
		if (is_string($props) === true) {
			$path  = $props;
			$props = static::props($path);

			$props['type'] ??= match (true) {
				$path === 'site' => 'site',
				str_starts_with($path, 'pages/') => 'page',
				str_starts_with($path, 'files/') => 'file',
				str_starts_with($path, 'users/') => 'user'
			};
		}

		return static::type('blueprint', $props);
	}

	public static function collection(string $type, array $items = []): array
	{
		$collection = [];

		foreach ($items as $id => $item) {
			$item['id'] ??= $id;
			$collection[$id] = Autoload::type($type, $item);
		}

		return $collection;
	}

	public static function extend(array $props): array
	{
		if (isset($props['extends']) === true) {
			$extension = static::props($props['extends']);

			// remove the reference to the extension
			unset($props['extends']);

			// add the extension
			$props = array_replace_recursive($extension, $props);
		}

		return $props;
	}

	public static function field(string|array $props): Field
	{
		return static::type('field', $props);
	}

	public static function props(string $path): array
	{
		$kirby = App::instance();
		$root  = $kirby->root('blueprints');
		$file  = $root . '/' . $path . '.yml';

		// try to load a blueprint from file first
		if (F::exists($file, $root) === true) {
			$data = $file;

		// load it form a plugin or the core
		} else {
			$data = App::instance()->extension('blueprints', $path);
		}

		// get props from a callback
		if (is_callable($data) === true) {
			$data = $data($kirby);
		}

		// parse a yaml file if props are not defined as array
		if (is_string($data) === true) {
			$data = Yaml::read($data);
		}

		$data['id'] ??= basename($path);

		return $data;
	}

	public static function section(string|array $props): Section
	{
		return static::type('section', $props);
	}

	public static function type(string $group, string|array $props): Component
	{
		if (is_string($props) === true) {
			$props = static::props($props);
		}

		$props = static::extend($props);

		// find the object type
		$type  = $props['type'] ??= $props['id'];
		$class = __NAMESPACE__ . '\\' . ucfirst($type) . ucfirst($group);

		// check for a valid section type
		if (class_exists($class) === false) {
			throw new TypeError('The ' . $group . ' type "' . $type . '" does not exist');
		}

		// remove the type prop
		// the classes take care of defining
		// their type attribute
		unset($props['type']);

		return $class::factory($props);
	}
}
