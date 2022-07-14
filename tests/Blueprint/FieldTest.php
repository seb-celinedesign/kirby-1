<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Field
 */
class FieldTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$field = new Field(
			id: 'test',
		);

		$this->assertSame('test', $field->id);
	}

	/**
	 * @covers ::validate
	 */
	public function testValidate()
	{
		$field = new Field(
			id: 'test',
		);

		$this->assertTrue($field->validate($this->model()));
	}
}
