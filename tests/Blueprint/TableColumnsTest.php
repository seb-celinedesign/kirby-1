<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\TableColumns
 */
class TableColumnsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$columns = TableColumns::factory($parent = $this->section(), [
			'a' => []
		]);

		$this->assertInstanceOf(TableColumn::class, $columns->first());
		$this->assertSame($parent, $columns->first()->parent);
	}
}
