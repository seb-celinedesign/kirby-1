<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Permissions
 */
class PermissionsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$permissions = new Permissions();

		$this->assertInstanceOf(AccessPermissions::class, $permissions->access);
		$this->assertInstanceOf(AccountPermissions::class, $permissions->account);
		$this->assertInstanceOf(FilesPermissions::class, $permissions->files);
		$this->assertInstanceOf(PagesPermissions::class, $permissions->pages);
		$this->assertInstanceOf(SitePermissions::class, $permissions->site);
		$this->assertInstanceOf(UsersPermissions::class, $permissions->users);
	}
}
