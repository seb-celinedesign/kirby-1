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

		$this->assertInstanceOf(Sections::class, $column->sections);
		$this->assertCount(0, $column->sections);
		$this->assertSame('test', $column->id);
		$this->assertInstanceOf(Width::class, $column->width);
		$this->assertSame('1/1', $column->width->value);
	}
}
