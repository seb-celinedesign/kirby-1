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
		$options = new FileOptions();

		$this->assertNull($options->changeName);
		$this->assertNull($options->create);
		$this->assertNull($options->delete);
		$this->assertNull($options->read);
		$this->assertNull($options->replace);
		$this->assertNull($options->update);
	}
}
