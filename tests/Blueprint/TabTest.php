<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Tab
 */
class TabTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$tab = new Tab(
			blueprint: $blueprint = $this->blueprint(),
			id: 'test'
		);

		$this->assertSame($blueprint, $tab->blueprint);
		$this->assertSame('test', $tab->id);
		$this->assertSame('Test', $tab->label->value);
		$this->assertNull($tab->icon);
		$this->assertInstanceOf(Columns::class, $tab->columns);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithTitle()
	{
		$blueprint = new Blueprint(
			model: $this->model(),
			id: 'test',
			title: 'My blueprint'
		);

		$this->assertSame('My blueprint', $blueprint->title->value);
	}
}
