<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Enumeration
 */
class EnumerationTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$enum = new Enumeration(
			value: 'test',
			allowed: [
				'test'
			]
		);

		$this->assertSame('test', $enum->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithDefaultValue()
	{
		$enum = new Enumeration(
			value: null,
			default: 'test',
			allowed: [
				'test'
			]
		);

		$this->assertSame('test', $enum->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithInvalidValue()
	{
		$this->expectException('Kirby\Exception\InvalidArgumentException');
		$this->expectExceptionMessage('The given value is not allowed. Allowed values: a, b');

		new Enumeration(
			value: 'c',
			allowed: ['a', 'b']
		);
	}
}
