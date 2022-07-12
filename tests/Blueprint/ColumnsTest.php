<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Columns
 */
class ColumnsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$columns = Columns::factory([
			'a' => [],
			'b' => [],
		]);

		$this->assertSame('a', $columns->first()->id);
		$this->assertSame('b', $columns->last()->id);
	}
}
