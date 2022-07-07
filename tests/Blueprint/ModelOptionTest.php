<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\ModelOption
 */
class ModelOptionTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		// nothing specified
		$option = new ModelOption();
		$this->assertSame(['*' => null], $option->permissions);
	}

	/**
	 * @covers ::factory
	 */
	public function testFactory()
	{
		// nothing specified
		$option = ModelOption::factory();
		$this->assertSame(['*' => null], $option->permissions);

		// true for all roles
		$option = ModelOption::factory(true);
		$this->assertSame(['*' => true], $option->permissions);

		// false for all roles
		$option = ModelOption::factory(false);
		$this->assertSame(['*' => false], $option->permissions);

		// specific rules
		$option = ModelOption::factory($input = ['*' => false, 'admin' => true]);
		$this->assertSame($input, $option->permissions);
	}
}
