<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\PagesPermissions
 */
class PagesPermissionsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$permissions = new PagesPermissions();

		$this->assertTrue($permissions->changeSlug);
		$this->assertTrue($permissions->changeStatus);
		$this->assertTrue($permissions->changeTemplate);
		$this->assertTrue($permissions->changeTitle);
		$this->assertTrue($permissions->create);
		$this->assertTrue($permissions->delete);
		$this->assertTrue($permissions->duplicate);
		$this->assertTrue($permissions->preview);
		$this->assertTrue($permissions->read);
		$this->assertTrue($permissions->sort);
		$this->assertTrue($permissions->update);
	}
}
