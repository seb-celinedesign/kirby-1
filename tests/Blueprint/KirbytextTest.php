<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Kirbytext
 */
class KirbytextTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$text = new Kirbytext();
		$this->assertNull($text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithString()
	{
		$text = new Kirbytext('Test');
		$this->assertSame('Test', $text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithArray()
	{
		$text = new Kirbytext(['en' => 'Test']);
		$this->assertSame('Test', $text->value);
	}
}
