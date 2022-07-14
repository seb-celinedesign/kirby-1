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
	 * @covers ::factory
	 */
	public function testFactoryWithValueAndText()
	{
		// string
		$option = Option::factory([
			'value' => 'test',
			'text'  => 'Test Option'
		]);

		$this->assertSame('test', $option->value);
		$this->assertSame('Test Option', $option->text->value);

		// array
		$option = Option::factory([
			'value' => 'test',
			'text'  => [
				'en' => 'Test Option'
			]
		]);

		$this->assertSame('test', $option->value);
		$this->assertSame('Test Option', $option->text->value);
	}

	/**
	 * @covers ::render
	 */
	public function testRender()
	{
		$option = Option::factory([
			'value' => 'test',
			'text'  => 'Test Option'
		]);

		$expected = [
			'text'  => 'Test Option',
			'value' => 'test',
		];

		$this->assertSame($expected, $option->render($this->model()));
	}
}
