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
class Permissions
{
	use ArrayConverter;

	public AccessPermissions $access;
	public AccountPermissions $account;
	public FilesPermissions $files;
	public PagesPermissions $pages;
	public SitePermissions $site;
	public UsersPermissions $users;

	public function __construct(
		array|bool $access = true,
		array|bool $account = true,
		array|bool $files = true,
		array|bool $pages = true,
		array|bool $site = true,
		array|bool $users = true,
	) {
		$this->access  = AccessPermissions::factory($access);
		$this->account = AccountPermissions::factory($account);
		$this->files   = FilesPermissions::factory($files);
		$this->pages   = PagesPermissions::factory($pages);
		$this->site    = SitePermissions::factory($site);
		$this->users   = UsersPermissions::factory($users);
	}
}
