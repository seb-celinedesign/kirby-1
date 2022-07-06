<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\FileOptions
 */
class FileOptionsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$options = new FileOptions;

		$this->assertInstanceOf(ModelOption::class, $options->changeName);
		$this->assertInstanceOf(ModelOption::class, $options->create);
		$this->assertInstanceOf(ModelOption::class, $options->delete);
		$this->assertInstanceOf(ModelOption::class, $options->read);
		$this->assertInstanceOf(ModelOption::class, $options->replace);
		$this->assertInstanceOf(ModelOption::class, $options->update);
	}
}
