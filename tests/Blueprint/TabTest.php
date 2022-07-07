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
	public function testIcon()
	{
		$tab = new Tab(
			blueprint: $this->blueprint(),
			id: 'test',
			icon: 'edit',
		);

		$this->assertSame('edit', $tab->icon);
	}

	/**
	 * @covers ::__construct
	 */
	public function testLabel()
	{
		$tab = new Tab(
			blueprint: $this->blueprint(),
			id: 'test',
			label: 'My Tab',
		);

		$this->assertSame('My Tab', $tab->label->value);
	}

	public function testToArray()
	{
		$tab = new Tab(
			blueprint: $this->blueprint(),
			id: 'test',
			label: 'My Tab'
		);

		$expected = [
			'columns' => [],
			'icon'    => null,
			'id'      => 'test',
			'label'   => 'My Tab'
		];

		$this->assertSame($expected, $tab->toArray());
	}

}
