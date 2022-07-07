<?php

namespace Kirby\Blueprint;

/**
 * Access permissions
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class AccessPermissions extends PermissionsGroup
{
	public function __construct(
		public bool $languages = true,
		public bool $panel = true,
		public bool $site = true,
		public bool $system = true,
		public bool $users = true,
	) {
	}
}
