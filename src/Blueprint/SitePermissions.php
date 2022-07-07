<?php

namespace Kirby\Blueprint;

/**
 * Site permissions
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class SitePermissions extends PermissionsGroup
{
	public function __construct(
		public bool $changeTitle = true,
		public bool $preview = true,
		public bool $update = true,
	) {
	}
}
