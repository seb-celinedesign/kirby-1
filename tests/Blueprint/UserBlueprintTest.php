<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\UserBlueprint
 */
class UserBlueprintTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$blueprint = new UserBlueprint(
			id: 'test'
		);

		$this->assertSame('user', $blueprint->type);

		$this->assertInstanceOf(Image::class, $blueprint->image);
		$this->assertInstanceOf(UserOptions::class, $blueprint->options);
		$this->assertInstanceOf(Permissions::class, $blueprint->permissions);
	}
}
