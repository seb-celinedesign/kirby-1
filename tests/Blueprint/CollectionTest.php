<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Collection
 */
class CollectionTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$collection = new Collection([
			$a = new Component(),
			$b = new Component(),
		]);

		$this->assertCount(2, $collection);
		$this->assertSame($a, $collection->first());
		$this->assertSame($b, $collection->last());
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithInvalidObject()
	{
		$this->expectException('TypeError');
		$this->expectExceptionMessage('Each value in the collection must be an instance of Kirby\Blueprint\Component');

		new Collection([
			new \stdClass(),
		]);
	}
}
