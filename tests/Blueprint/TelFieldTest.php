<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\TelField
 */
class TelFieldTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$field = new TelField(
			id: 'test',
		);

		$this->assertSame('test', $field->id);
		$this->assertSame('tel', $field->autocomplete);
		$this->assertSame('phone', $field->icon->value);
	}
}
