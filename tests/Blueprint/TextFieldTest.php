<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\TextField
 */
class TextFieldTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$field = new TextField(
			id: 'test',
		);

		$this->assertNull($field->after);
		$this->assertNull($field->autocomplete);
		$this->assertNull($field->before);
		$this->assertNull($field->converter);
		$this->assertTrue($field->counter);
		$this->assertNull($field->default);
		$this->assertNull($field->icon);
		$this->assertNull($field->maxlength);
		$this->assertNull($field->minlength);
		$this->assertNull($field->pattern);
		$this->assertNull($field->placeholder);
		$this->assertFalse($field->spellcheck);
		$this->assertNull($field->value);
	}

	/**
	 * @covers ::validate
	 */
	public function testValidateMaxlength()
	{
		$field = new TextField('test', maxlength: 4);
		$page  = $this->model();

		$this->assertTrue($field->validate($page));
		$this->assertTrue($field->validate($page, 'test'));
	}

	/**
	 * @covers ::validate
	 */
	public function testValidateMaxlengthInvalid()
	{
		$field = new TextField('test', maxlength: 4);
		$page  = $this->model();

		$this->assertValidationError('Please enter a shorter value. (max. 4 characters)');
		$field->validate($page, 'A much longer value');
	}

	/**
	 * @covers ::validate
	 */
	public function testValidateMinlength()
	{
		$field = new TextField('test', minlength: 4);
		$page  = $this->model();

		$this->assertTrue($field->validate($page));
		$this->assertTrue($field->validate($page, 'test'));
	}

	/**
	 * @covers ::validate
	 */
	public function testValidateMinlengthInvalid()
	{
		$field = new TextField('test', minlength: 4);
		$page  = $this->model();

		$this->assertValidationError('Please enter a longer value. (min. 4 characters)');
		$field->validate($page, 'foo');
	}

	/**
	 * @covers ::validate
	 */
	public function testValidatePattern()
	{
		$field = new TextField('test', pattern: '!^foo$!');
		$page  = $this->model();

		$this->assertTrue($field->validate($page));
		$this->assertTrue($field->validate($page, 'foo'));
	}

	/**
	 * @covers ::validate
	 */
	public function testValidatePatternInvalid()
	{
		$field = new TextField('test', pattern: '!^foo$!');
		$page  = $this->model();

		$this->assertValidationError('The value does not match the expected pattern');
		$field->validate($page, 'bar');
	}
}
