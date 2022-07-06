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
			model: $model = $this->model(),
			id: 'test'
		);

		$this->assertSame($model, $column->model);
		$this->assertSame('test', $column->id);
		$this->assertSame('Test', $column->label->value);
		$this->assertFalse($column->mobile);
		$this->assertSame('left', $column->align->value);
		$this->assertNull($column->type);
		$this->assertNull($column->value);
		$this->assertNull($column->width);
	}
}
