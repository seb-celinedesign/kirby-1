<?php

namespace Kirby\Blueprint;

use stdClass;

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
			$a = new stdClass,
			$b = new stdClass,
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
		$this->expectExceptionMessage('Each value in the collection must be an instance of stdClass');

		new Collection([
			$this->blueprint(),
		]);
	}
}
