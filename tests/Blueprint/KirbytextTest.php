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
		$text = new Kirbytext($this->model());
		$this->assertNull($text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithString()
	{
		$text = new Kirbytext($this->model(), 'Test');
		$this->assertSame('<p>Test</p>', $text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithQuery()
	{
		$text = new Kirbytext($this->model(), '{{ page.slug }}');
		$this->assertSame('<p>test</p>', $text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithArray()
	{
		$text = new Kirbytext($this->model(), ['en' => 'Test']);
		$this->assertSame('<p>Test</p>', $text->value);
	}

}
