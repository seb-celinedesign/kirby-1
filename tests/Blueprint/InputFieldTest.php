<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\InputField
 */
class InputFieldTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$field = new InputField(
			id: 'test'
		);

		$this->assertFalse($field->autofocus);
		$this->assertInstanceOf(Help::class, $field->help);
		$this->assertInstanceOf(Label::class, $field->label);
		$this->assertFalse($field->required);
		$this->assertTrue($field->translate);
		$this->assertInstanceOf(Width::class, $field->width);
		$this->assertInstanceOf(When::class, $field->when);
	}
}
