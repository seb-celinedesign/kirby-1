<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\UsersPermissions
 */
class UsersPermissionsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$permissions = new UsersPermissions();

		$this->assertTrue($permissions->changeEmail);
		$this->assertTrue($permissions->changeLanguage);
		$this->assertTrue($permissions->changeName);
		$this->assertTrue($permissions->changeRole);
		$this->assertTrue($permissions->create);
		$this->assertTrue($permissions->delete);
		$this->assertTrue($permissions->update);
	}
}
