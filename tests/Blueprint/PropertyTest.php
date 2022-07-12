<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Property
 */
class PropertyTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$prop = new Property();
		$this->assertNull($prop->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithValue()
	{
		$prop = new Property('test');
		$this->assertSame('test', $prop->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithDefault()
	{
		$prop = new Property(null, 'test');
		$this->assertSame('test', $prop->value);
	}
}
