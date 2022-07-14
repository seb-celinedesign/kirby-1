<?php

namespace Kirby\Blueprint;

/**
 * User options
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class UserOptions extends ModelOptions
{
	public function __construct(
		public ModelOption|null $changeEmail = null,
		public ModelOption|null $changeLanguage = null,
		public ModelOption|null $changeName = null,
		public ModelOption|null $changePassword = null,
		public ModelOption|null $changeRole = null,
		public ModelOption|null $create = null,
		public ModelOption|null $delete = null,
		public ModelOption|null $update = null,
	) {
	}
}
