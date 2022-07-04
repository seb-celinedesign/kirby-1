<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Option
 */
class OptionTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$option = new Option();

		$this->assertNull($option->value);
		$this->assertNull($option->text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithValue()
	{
		// string
		$option = new Option('test');
		$this->assertSame('test', $option->value);
		$this->assertSame('test', $option->text->value);

		// int
		$option = new Option(1);
		$this->assertSame(1, $option->value);
		$this->assertSame('1', $option->text->value);

		// float
		$option = new Option(1.1);
		$this->assertSame(1.1, $option->value);
		$this->assertSame('1.1', $option->text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithValueAndText()
	{
		// string
		$option = new Option('test', 'Test Option');
		$this->assertSame('test', $option->value);
		$this->assertSame('Test Option', $option->text->value);

		// array
		$option = new Option('test', ['en' => 'Test Option']);
		$this->assertSame('test', $option->value);
		$this->assertSame('Test Option', $option->text->value);
	}

	/**
	 * @covers ::toArray
	 */
	public function testToArray()
	{
		$option   = new Option('test', 'Test Option');
		$expected = [
			'text'  => 'Test Option',
			'value' => 'test',
		];

		$this->assertSame($expected, $option->toArray());
	}
}
