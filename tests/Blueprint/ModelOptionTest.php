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

		// true for all roles
		$option = new ModelOption(true);
		$this->assertSame(['*' => true], $option->permissions);

		// false for all roles
		$option = new ModelOption(false);
		$this->assertSame(['*' => false], $option->permissions);

		// specific rules
		$option = new ModelOption($input = ['*' => false, 'admin' => true]);
		$this->assertSame($input, $option->permissions);
	}
}
