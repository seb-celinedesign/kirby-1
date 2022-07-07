<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\UserOptions
 */
class UserOptionsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$options = new UserOptions();

		$this->assertInstanceOf(ModelOption::class, $options->changeEmail);
		$this->assertInstanceOf(ModelOption::class, $options->changeLanguage);
		$this->assertInstanceOf(ModelOption::class, $options->changeName);
		$this->assertInstanceOf(ModelOption::class, $options->changePassword);
		$this->assertInstanceOf(ModelOption::class, $options->changeRole);
		$this->assertInstanceOf(ModelOption::class, $options->create);
		$this->assertInstanceOf(ModelOption::class, $options->delete);
		$this->assertInstanceOf(ModelOption::class, $options->update);
	}
}
