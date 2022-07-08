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
			model: $model = $this->model(),
			id: 'test'
		);

		$this->assertSame($model, $blueprint->model);
		$this->assertSame('test', $blueprint->id);
		$this->assertSame('Test', $blueprint->title->value);
		$this->assertInstanceOf(Tabs::class, $blueprint->tabs);
		$this->assertCount(0, $blueprint->tabs);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithTitle()
	{
		$blueprint = new Blueprint(
			model: $this->model(),
			id: 'test',
			title: 'My blueprint',
		);

		$this->assertSame('My blueprint', $blueprint->title->value);
	}

	/**
	 * @covers ::columns
	 */
	public function testColumns()
	{
		$blueprint = new Blueprint(
			model: $this->model(),
			id: 'test',
			tabs: [
				'content' => [
					'columns' => [
						'a' => []
					]
				],
				'seo' => [
					'columns' => [
						'b' => []
					]
				]
			]
		);

		$this->assertCount(2, $blueprint->columns());
		$this->assertSame('a', $blueprint->columns()->first()->id);
		$this->assertSame('b', $blueprint->columns()->last()->id);
	}

	/**
	 * @covers ::fields
	 */
	public function testFields()
	{
		$blueprint = new Blueprint(
			model: $this->model(),
			id: 'test',
			tabs: [
				'content' => [
					'columns' => [
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
						]
					]
				],
				'seo' => [
					'columns' => [
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
				]
			]
		);

		$this->assertCount(2, $blueprint->fields());
		$this->assertSame('a', $blueprint->fields()->first()->id);
		$this->assertSame('b', $blueprint->fields()->last()->id);
	}

	/**
	 * @covers ::sections
	 */
	public function testSections()
	{
		$blueprint = new Blueprint(
			model: $this->model(),
			id: 'test',
			tabs: [
				'content' => [
					'columns' => [
						[
							'sections' => [
								'a' => [
									'type' => 'info'
								]
							]
						]
					]
				],
				'seo' => [
					'columns' => [
						[
							'sections' => [
								'b' => [
									'type' => 'info'
								]
							]
						]
					]
				]
			]
		);

		$this->assertCount(2, $blueprint->sections());
		$this->assertSame('a', $blueprint->sections()->first()->id);
		$this->assertSame('b', $blueprint->sections()->last()->id);
	}
}
