<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\StringProperty
 */
class StringPropertyTest extends TestCase
{
	/**
	 * @covers ::__toString
	 * @covers ::toString
	 */
	public function testToString()
	{
		$prop = new StringProperty();
		$prop->value = 'foo';
		$this->assertSame('foo', $prop->toString());
		$this->assertSame('foo', $prop->__toString());

		$prop = new StringProperty();
		$prop->value = 1;
		$this->assertSame('1', $prop->toString());
		$this->assertSame('1', $prop->__toString());
	}

	/**
	 * @covers ::value
	 */
	public function testValue()
	{
		$prop = new StringProperty();
		$this->assertNull($prop->value());

		$prop = new StringProperty();
		$prop->value = 'foo';
		$this->assertSame('foo', $prop->value());
	}
}
