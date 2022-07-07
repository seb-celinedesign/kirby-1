<?php

namespace Kirby\Blueprint;

/**
 * Users permissions
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class UsersPermissions extends PermissionsGroup
{
	public function __construct(
		public bool $changeEmail = true,
		public bool $changeLanguage = true,
		public bool $changeName = true,
		public bool $changePassword = true,
		public bool $changeRole = true,
		public bool $create = true,
		public bool $delete = true,
		public bool $update = true,
	) {
	}
}
