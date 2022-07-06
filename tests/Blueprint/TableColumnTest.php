<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\TableColumn
 */
class TableColumnTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$column = new TableColumn(
			parent: $section = $this->section(),
			id: 'test'
		);

		$this->assertSame($section, $column->parent);
		$this->assertSame('test', $column->id);
		$this->assertSame('Test', $column->label->value);
		$this->assertFalse($column->mobile);
		$this->assertSame('left', $column->align->value);
		$this->assertNull($column->type);
		$this->assertNull($column->value);
		$this->assertNull($column->width);
	}
}
