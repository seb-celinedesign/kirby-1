<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\NumberField
 */
class NumberFieldTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$field = new NumberField(
			id: 'test',
		);

		$this->assertSame('test', $field->id);
		$this->assertNull($field->after);
		$this->assertNull($field->autocomplete);
		$this->assertNull($field->before);
		$this->assertNull($field->default);
		$this->assertNull($field->icon);
		$this->assertNull($field->max);
		$this->assertNull($field->min);
		$this->assertNull($field->placeholder);
		$this->assertNull($field->step);
		$this->assertNull($field->value);
	}

	/**
	 * @covers ::validate
	 */
	public function testValidateMax()
	{
		$field = new NumberField('test', max: 4);
		$page  = $this->model();

		$this->assertTrue($field->validate($page));
		$this->assertTrue($field->validate($page, 4));
	}

	/**
	 * @covers ::validate
	 */
	public function testValidateMaxInvalid()
	{
		$field = new NumberField('test', max: 4);
		$page  = $this->model();

		$this->assertValidationError('Please enter a value equal to or lower than 4');
		$field->validate($page, 5);
	}

	/**
	 * @covers ::validate
	 */
	public function testValidateMin()
	{
		$field = new NumberField('test', min: 4);
		$page  = $this->model();

		$this->assertTrue($field->validate($page));
		$this->assertTrue($field->validate($page, 4));
	}

	/**
	 * @covers ::validate
	 */
	public function testValidateMinInvalid()
	{
		$field = new NumberField('test', min: 4);
		$page  = $this->model();

		$this->assertValidationError('Please enter a value equal to or greater than 4');
		$field->validate($page, 3);
	}
}
