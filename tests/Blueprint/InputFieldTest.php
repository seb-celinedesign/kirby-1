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
			section: $this->section(['type' => 'fields']),
			id: 'test',
			type: 'input'
		);

		$this->assertInstanceOf(Label::class, $field->label);
		$this->assertInstanceOf(Kirbytext::class, $field->help);

		$this->assertSame('input', $field->type);
		$this->assertFalse($field->autofocus);
		$this->assertFalse($field->required);
		$this->assertTrue($field->translate);
	}

}
