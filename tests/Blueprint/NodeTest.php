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
		$node = new Node('test');
		$this->assertSame('test', $node->id);
	}
}
