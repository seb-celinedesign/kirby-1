<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\AccountPermissions
 */
class AccountPermissionsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$permissions = new AccountPermissions();
		$this->assertInstanceOf(UsersPermissions::class, $permissions);
	}
}
