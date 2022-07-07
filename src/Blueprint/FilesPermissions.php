<?php

namespace Kirby\Blueprint;

/**
 * Files permissions
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class FilesPermissions extends PermissionsGroup
{
	public function __construct(
		public bool $changeName = true,
		public bool $create = true,
		public bool $delete = true,
		public bool $replace = true,
		public bool $update = true,
	) {
	}
}
