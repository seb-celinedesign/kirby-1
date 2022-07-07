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
			section: $this->section(),
			id: 'test'
		);

		$this->assertSame('email', $field->type);
		$this->assertSame('email', $field->autocomplete);
		$this->assertSame('email', $field->icon);
		$this->assertSame('email.placeholder', $field->placeholder->value);
	}
}
