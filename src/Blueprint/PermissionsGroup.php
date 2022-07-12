<?php

namespace Kirby\Blueprint;

/**
 * Permissions Group
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PermissionsGroup extends Component
{
	/**
	 * Creates a new instance either from an
	 * array or a boolean
	 */
	public static function factory(array|bool $permissions = false): static
	{
		if (is_array($permissions) === true) {
			return new static(...$permissions);
		}

		$group = new static();

		// set all permissions to the given bool
		foreach (get_object_vars($group) as $key => $value) {
			$group->$key = $permissions;
		}

		return $group;
	}
}
