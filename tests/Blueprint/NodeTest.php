<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Node
 */
class NodeTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$node = new Node(
			id: 'test',
			model: $model = $this->model()
		);

		$this->assertSame('test', $node->id);
		$this->assertSame($model, $node->model);
	}
}
