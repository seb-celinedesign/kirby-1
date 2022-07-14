<?php

namespace Kirby\Validation;

/**
 * @covers \Kirby\Validation\Validations
 */
class ValidationsTest extends TestCase
{
	/**
	 * @covers ::add
	 */
	public function testAdd()
	{
		$v = new Validations();

		// simpel
		$validation = $v->add('minlength', 5, 'Test message');

		$this->assertSame('minlength', $validation->handler);
		$this->assertSame([5], $validation->args);
		$this->assertSame('Test message', $validation->message);

		// validation object
		$validation = $v->add('minlength', new Validation('minlength', [5], 'Test message'));

		$this->assertSame('minlength', $validation->handler);
		$this->assertSame([5], $validation->args);
		$this->assertSame('Test message', $validation->message);

		// custom validator
		$validation = $v->add('custom', $callback = function ($value) {
			return $value === 'bar';
		}, 'Test message');

		$this->assertSame($callback, $validation->handler);
		$this->assertSame([], $validation->args);
		$this->assertSame('Test message', $validation->message);
	}

	/**
	 * @covers ::get
	 */
	public function testGet()
	{
		$v = new Validations();
		$validation = $v->add('minlength', 5, 'Test message');

		$this->assertSame($validation, $v->get('minlength'));
	}

	/**
	 * @covers ::__unset
	 */
	public function testUnset()
	{
		$v = new Validations();
		$v->add('minlength', 5);

		$this->assertInstanceOf(Validation::class, $v->get('minlength'));

		$v->remove('minlength');

		$this->assertNull($v->get('minlength'));
	}

	/**
	 * @covers ::errors
	 */
	public function testErrors()
	{
		$v = new Validations();

		$v->add('email');
		$v->add('minlength', 10);

		$this->assertSame([], $v->errors('test@getkirby.com'));
	}

	/**
	 * @covers ::errors
	 */
	public function testErrorsWithInvalidValue()
	{
		$v = new Validations();

		$v->add('email');
		$v->add('minlength', 10);

		$expected = [
			'email'     => 'Please enter a valid email address',
			'minlength' => 'Please enter a longer value. (min. 10 characters)'
		];

		$this->assertSame($expected, $v->errors('test'));
	}

	/**
	 * @covers ::validate
	 */
	public function testValidate()
	{
		$v = new Validations();

		$v->add('email');
		$v->add('minlength', 10);

		$this->assertTrue($v->validate('test@getkirby.com'));
	}

	/**
	 * @covers ::validate
	 */
	public function testValidateWithInvalidValue()
	{
		$v = new Validations();

		$v->add('email');
		$v->add('minlength', 10);

		$this->expectException('Kirby\Exception\InvalidArgumentException');
		$this->expectExceptionMessage('Please enter a longer value. (min. 10 characters)');

		$v->validate('a@b.com');
	}
}
