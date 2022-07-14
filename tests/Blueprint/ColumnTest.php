<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Column
 */
class ColumnTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$column = new Column(
			id: 'test'
		);

		$this->assertSame('test', $column->id);
		$this->assertNull($column->sections);
		$this->assertNull($column->width);
	}
}
