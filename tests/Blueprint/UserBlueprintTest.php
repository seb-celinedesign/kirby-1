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
			model: $user = $this->user(),
			id: 'test',
			type: 'user'
		);

		$this->assertSame($user, $blueprint->model);

		$this->assertInstanceOf(Image::class, $blueprint->image);
		$this->assertInstanceOf(UserOptions::class, $blueprint->options);
	}

}
