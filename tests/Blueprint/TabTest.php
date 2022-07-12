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
			id: 'test'
		);

		$this->assertSame('test', $tab->id);
		$this->assertInstanceOf(Label::class, $tab->label);
		$this->assertInstanceOf(Icon::class, $tab->icon);
		$this->assertInstanceOf(Columns::class, $tab->columns);
	}

	/**
	 * @covers ::fields
	 */
	public function testFields()
	{
		$tab = new Tab(
			id: 'test',
			columns: new Columns([
				new Column(
					id: 'a',
					sections: new Sections([
						new FieldsSection(
							id: 'a',
							fields: new Fields([
								new TextField(id: 'a'),
								new TextField(id: 'b')
							])
						)
					])
				)
			])
		);

		$this->assertCount(2, $tab->fields());
		$this->assertSame('a', $tab->fields()->first()->id);
		$this->assertSame('b', $tab->fields()->last()->id);
	}

	/**
	 * @covers ::sections
	 */
	public function testSections()
	{
		$tab = new Tab(
			id: 'test',
			columns: new Columns([
				new Column(
					id: 'a',
					sections: new Sections([
						new InfoSection(id: 'a')
					])
				),
				new Column(
					id: 'b',
					sections: new Sections([
						new InfoSection(id: 'b')
					])
				)
			])
		);

		$this->assertCount(2, $tab->sections());
		$this->assertSame('a', $tab->sections()->first()->id);
		$this->assertSame('b', $tab->sections()->last()->id);
	}

	public function testToArray()
	{
		$tab = new Tab(
			id: 'test',
			label: new Label('My Tab')
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
