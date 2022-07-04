<?php

namespace Kirby\Blueprint;

class TestProperty extends Property
{
	public $value;
}

/**
 * @covers \Kirby\Blueprint\Property
 */
class PropertyTest extends TestCase
{
	/**
	 * @covers ::__toString
	 * @covers ::toString
	 */
	public function testToString()
	{
		$prop = new TestProperty();
		$prop->value = 'foo';
		$this->assertSame('foo', $prop->toString());
		$this->assertSame('foo', $prop->__toString());

		$prop = new TestProperty();
		$prop->value = 1;
		$this->assertSame('1', $prop->toString());
		$this->assertSame('1', $prop->__toString());
	}

	/**
	 * @covers ::value
	 */
	public function testValue()
	{
		$prop = new TestProperty();
		$this->assertNull($prop->value());

		$prop = new TestProperty();
		$prop->value = 'foo';
		$this->assertSame('foo', $prop->value());
	}
}
