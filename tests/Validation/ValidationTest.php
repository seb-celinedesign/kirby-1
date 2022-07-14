<?php

namespace Kirby\Validation;

/**
 * @covers \Kirby\Validation\Validation
 */
class ValidationTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$v = new Validation('minlength');

		$this->assertSame('minlength', $v->handler);
		$this->assertSame([], $v->args);
		$this->assertNull($v->message);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithArgs()
	{
		$v = new Validation('minlength', [5]);

		$this->assertSame([5], $v->args);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithMessage()
	{
		$v = new Validation('minlength', message: 'Too short');
		$this->assertSame('Too short', $v->message);
	}

	public function testValidate()
	{
		$v = new Validation('email');
		$this->assertTrue($v->validate('test@getkirby.com'));
	}

	public function testValidateWithInvalidResult()
	{
		$v = new Validation('email');

		$this->expectException('Kirby\Exception\InvalidArgumentException');
		$this->expectExceptionMessage('Please enter a valid email address');

		$v->validate('test');
	}

	public function testValidateWithArgs()
	{
		$v = new Validation('minlength', [6]);
		$this->assertTrue($v->validate('long string'));
	}

	public function testValidateWithArgsAndInvalidResult()
	{
		$v = new Validation('minlength', [6]);

		$this->expectException('Kirby\Exception\InvalidArgumentException');
		$this->expectExceptionMessage('Please enter a longer value. (min. 6 characters)');

		$v->validate('short');
	}

	public function testValidateWithCustomHandler()
	{
		$v = new Validation(function ($value) {
			return $value === 'foo';
		});

		$this->assertTrue($v->validate('foo'));
	}

	public function testValidateWithCustomHandlerWithInvalidValue()
	{
		$v = new Validation(function ($value) {
			return $value === 'foo';
		});

		$this->expectException('Kirby\Exception\InvalidArgumentException');
		$this->expectExceptionMessage('Please enter a correct value');

		$v->validate('bar');
	}
}
