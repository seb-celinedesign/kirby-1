<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\EmailField
 */
class EmailFieldTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$field = new EmailField(
			id: 'test',
		);

		$this->assertSame('email', $field->autocomplete);
		$this->assertSame('email', $field->icon->value);
		$this->assertSame('mail@example.com', $field->placeholder->value);
	}

	/**
	 * @covers ::validate
	 */
	public function testValidate()
	{
		$field = new EmailField('test');
		$page  = $this->model();

		$this->assertTrue($field->validate($page));
		$this->assertTrue($field->validate($page, 'test@getkirby.com'));
	}

	/**
	 * @covers ::validate
	 */
	public function testValidateWithInvalidEmail()
	{
		$field = new EmailField('test');
		$page  = $this->model();

		$this->assertValidationError('Please enter a valid email address');
		$field->validate($page, 'test');
	}
}
