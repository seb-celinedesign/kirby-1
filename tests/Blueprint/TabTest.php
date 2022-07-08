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
	 * @covers ::fields
	 */
	public function testFields()
	{
		$tab = new Tab(
			blueprint: $this->blueprint(),
			id: 'test',
			columns: [
				[
					'sections' => [
						'a' => [
							'type' => 'fields',
							'fields' => [
								'a' => [
									'type' => 'text'
								]
							]
						]
					]
				],
				[
					'sections' => [
						'b' => [
							'type' => 'fields',
							'fields' => [
								'b' => [
									'type' => 'text'
								]
							]
						]
					]
				]
			]
		);

		$this->assertCount(2, $tab->fields());
		$this->assertSame('a', $tab->fields()->first()->id);
		$this->assertSame('b', $tab->fields()->last()->id);
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

	/**
	 * @covers ::sections
	 */
	public function testSections()
	{
		$tab = new Tab(
			blueprint: $this->blueprint(),
			id: 'test',
			columns: [
				[
					'sections' => [
						'a' => [
							'type' => 'info'
						]
					]
				],
				[
					'sections' => [
						'b' => [
							'type' => 'info'
						]
					]
				]
			]
		);

		$this->assertCount(2, $tab->sections());
		$this->assertSame('a', $tab->sections()->first()->id);
		$this->assertSame('b', $tab->sections()->last()->id);
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
