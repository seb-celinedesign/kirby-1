<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\AccessPermissions
 */
class AccessPermissionsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$permissions = new AccessPermissions();

		$this->assertTrue($permissions->languages);
		$this->assertTrue($permissions->panel);
		$this->assertTrue($permissions->site);
		$this->assertTrue($permissions->system);
		$this->assertTrue($permissions->users);
	}
}
