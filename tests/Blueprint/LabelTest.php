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
		$node  = new Node(id: 'test', model: $this->model());
		$label = new Label($node);

		$this->assertSame('Test', $label->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithString()
	{
		$node  = new Node(id: 'test', model: $this->model());
		$label = new Label($node, 'My Label');

		$this->assertSame('My Label', $label->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithQuery()
	{
		$node  = new Node(id: 'test', model: $this->model());
		$label = new Label($node, '{{ page.slug }}');

		$this->assertSame('test', $label->value);
	}
}
