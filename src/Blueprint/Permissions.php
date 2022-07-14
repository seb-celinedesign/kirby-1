<?php

namespace Kirby\Blueprint;

/**
 * User Permissions option
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Permissions extends Component
{
	public function __construct(
		public AccessPermissions|null $access = null,
		public AccountPermissions|null $account = null,
		public FilesPermissions|null $files = null,
		public PagesPermissions|null $pages = null,
		public SitePermissions|null $site = null,
		public UsersPermissions|null $users = null,
	) {
		$this->access  ??= new AccessPermissions();
		$this->account ??= new AccountPermissions();
		$this->files   ??= new FilesPermissions();
		$this->pages   ??= new PagesPermissions();
		$this->site    ??= new SitePermissions();
		$this->users   ??= new UsersPermissions();
	}
}
