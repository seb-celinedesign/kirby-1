<?php

namespace Kirby\Blueprint;

/**
 * Pages permissions
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PagesPermissions extends PermissionsGroup
{
	public function __construct(
		public bool $changeSlug = true,
		public bool $changeStatus = true,
		public bool $changeTemplate = true,
		public bool $changeTitle = true,
		public bool $create = true,
		public bool $delete = true,
		public bool $duplicate = true,
		public bool $preview = true,
		public bool $read = true,
		public bool $sort = true,
		public bool $update = true,
	) {
	}
}
