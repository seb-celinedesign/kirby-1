<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Label
 */
class LabelTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$node  = new Node('test');
		$label = new Label($node);

		$this->assertSame('Test', $label->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithLabel()
	{
		$node  = new Node('test');
		$label = new Label($node, 'My Label');

		$this->assertSame('My Label', $label->value);
	}
}
