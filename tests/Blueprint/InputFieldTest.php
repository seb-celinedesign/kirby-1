<?php

namespace Kirby\Blueprint;

use Kirby\Validation\Validations;

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

		$this->assertSame('test', $field->id);
		$this->assertFalse($field->autofocus);
		$this->assertNull($field->help);
		$this->assertInstanceOf(Label::class, $field->label);
		$this->assertFalse($field->required);
		$this->assertTrue($field->translate);
		$this->assertInstanceOf(Validations::class, $field->validations);
		$this->assertNull($field->width);
		$this->assertNull($field->when);
	}

	/**
	 * @covers ::validate
	 */
	public function testValidate()
	{
		$field = new InputField('test');
		$page  = $this->model();

		$this->assertTrue($field->validate($page));
		$this->assertTrue($field->validate($page, 'Foo'));
	}

	/**
	 * @covers ::validate
	 */
	public function testValidateWhenRequired()
	{
		$field = new InputField('test', required: true);
		$page  = $this->model();

		$this->assertTrue($field->validate($page, 'Foo'));
	}

	/**
	 * @covers ::validate
	 */
	public function testValidateWhenRequiredAndEmpty()
	{
		$field = new InputField('test', required: true);
		$page  = $this->model();

		$this->assertValidationError('Please enter something');
		$field->validate($page);
	}
}
