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
}
