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
	public AccessPermissions $access;
	public AccountPermissions $account;
	public FilesPermissions $files;
	public PagesPermissions $pages;
	public SitePermissions $site;
	public UsersPermissions $users;

	public function __construct(
		AccessPermissions $access = null,
		AccountPermissions $account = null,
		FilesPermissions $files = null,
		PagesPermissions $pages = null,
		SitePermissions $site = null,
		UsersPermissions $users = null,
	) {
		$this->access  = $access  ?? new AccessPermissions();
		$this->account = $account ?? new AccountPermissions();
		$this->files   = $files   ?? new FilesPermissions();
		$this->pages   = $pages   ?? new PagesPermissions();
		$this->site    = $site    ?? new SitePermissions();
		$this->users   = $users   ?? new UsersPermissions();
	}
}
