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
		$label = new Label();

		$this->assertNull($label->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithString()
	{
		$label = new Label('My Label');

		$this->assertSame('My Label', $label->value);
	}

	/**
	 * @covers ::fallback
	 */
	public function testFallback()
	{
		$label = Label::fallback('test');

		$this->assertSame('Test', $label->value);
	}
}
