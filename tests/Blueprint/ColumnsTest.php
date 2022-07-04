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
		$columns = new Columns($tab = $this->tab(), [
			'a' => [],
			'b' => [],
		]);

		$this->assertSame('a', $columns->first()->id);
		$this->assertSame($tab, $columns->first()->tab);
		$this->assertSame('b', $columns->last()->id);
		$this->assertSame($tab, $columns->last()->tab);
	}
}
