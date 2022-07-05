<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Text
 */
class TextTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$text = new Text($this->model());
		$this->assertNull($text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithString()
	{
		$text = new Text($this->model(), 'Test');
		$this->assertSame('Test', $text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithQuery()
	{
		$text = new Text($this->model(), '{{ page.slug }}');
		$this->assertSame('test', $text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithArray()
	{
		$text = new Text($this->model(), ['en' => 'Test']);
		$this->assertSame('Test', $text->value);
	}

}
