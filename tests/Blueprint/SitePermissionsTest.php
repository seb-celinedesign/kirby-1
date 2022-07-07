<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\SitePermissions
 */
class SitePermissionsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$permissions = new SitePermissions();

		$this->assertTrue($permissions->changeTitle);
		$this->assertTrue($permissions->preview);
		$this->assertTrue($permissions->update);
	}
}
