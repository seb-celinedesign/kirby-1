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
			section: $this->section(),
			id: 'test'
		);

		$this->assertInstanceOf(Label::class, $field->label);
		$this->assertInstanceOf(Kirbytext::class, $field->help);

		$this->assertFalse($field->autofocus);
		$this->assertFalse($field->required);
		$this->assertTrue($field->translate);
	}
}
