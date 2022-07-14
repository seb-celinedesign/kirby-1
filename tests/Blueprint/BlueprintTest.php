<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Blueprint
 */
class BlueprintTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$blueprint = new Blueprint(
			id: 'test'
		);

		$this->assertSame('test', $blueprint->id);
		$this->assertInstanceOf(Label::class, $blueprint->label);
		$this->assertNull($blueprint->tabs);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithLabel()
	{
		$blueprint = new Blueprint(
			id: 'test',
			label: new Label('My blueprint'),
		);

		$this->assertSame('My blueprint', $blueprint->label->value);
	}

	/**
	 * @covers ::columns
	 */
	public function testColumns()
	{
		$blueprint = new Blueprint(
			id: 'test',
			tabs: new Tabs([
				new Tab(
					id: 'content',
					columns: new Columns([
						new Column(id: 'a')
					])
				),
				new Tab(
					id: 'seo',
					columns: new Columns([
						new Column(id: 'b')
					])
				)
			])
		);

		$this->assertCount(2, $blueprint->columns());
		$this->assertSame('a', $blueprint->columns()->first()->id);
		$this->assertSame('b', $blueprint->columns()->last()->id);
	}

	/**
	 * @covers ::columns
	 */
	public function testColumnsWithoutTabs()
	{
		$blueprint = new Blueprint('test');
		$this->assertNull($blueprint->columns());
	}

	/**
	 * @covers ::fields
	 */
	public function testFields()
	{
		$blueprint = new Blueprint(
			id: 'test',
			tabs: new Tabs(
				[
					new Tab(
						id: 'content',
						columns: new Columns([
							new Column(
								id: 'a',
								sections: new Sections([
									new FieldsSection(
										id: 'a',
										fields: new Fields([
											new InfoField(id: 'a')
										])
									)
								])
							),
							new Column(
								id: 'b',
								sections: new Sections([
									new FieldsSection(
										id: 'b',
										fields: new Fields([
											new InfoField(id: 'b')
										])
									)
								])
							)
						])
					)
				]
			)
		);

		$this->assertCount(2, $blueprint->fields());
		$this->assertSame('a', $blueprint->fields()->first()->id);
		$this->assertSame('b', $blueprint->fields()->last()->id);
	}

	/**
	 * @covers ::fields
	 */
	public function testFieldsWithoutTabs()
	{
		$blueprint = new Blueprint('test');
		$this->assertNull($blueprint->fields());
	}

	/**
	 * @covers ::sections
	 */
	public function testSections()
	{
		$blueprint = new Blueprint(
			id: 'test',
			tabs: new Tabs([
				new Tab(
					id: 'content',
					columns: new Columns([
						new Column(
							id: 'a',
							sections: new Sections([
								new InfoSection(id: 'a')
							])
						)
					])
				),
				new Tab(
					id: 'seo',
					columns: new Columns([
						new Column(
							id: 'b',
							sections: new Sections([
								new InfoSection(id: 'b')
							])
						)
					])
				)
			])
		);

		$this->assertCount(2, $blueprint->sections());
		$this->assertSame('a', $blueprint->sections()->first()->id);
		$this->assertSame('b', $blueprint->sections()->last()->id);
	}

	/**
	 * @covers ::sections
	 */
	public function testSectionsWithoutTabs()
	{
		$blueprint = new Blueprint('test');
		$this->assertNull($blueprint->sections());
	}
}
