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
			tab: $tab = $this->tab(),
			id: 'test',
		);

		$this->assertSame($tab, $column->tab);
		$this->assertInstanceOf('Kirby\Blueprint\Sections', $column->sections);
		$this->assertCount(0, $column->sections);
		$this->assertSame('test', $column->id);
		$this->assertSame('1/1', $column->width->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithWidth()
	{
		$column = new Column(
			tab: $this->tab(),
			id: 'test',
			width: '1/2'
		);

		$this->assertSame('1/2', $column->width->value);
	}
}
