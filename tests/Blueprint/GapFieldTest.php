<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\GapField
 */
class GapFieldTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$field = new GapField(
			id: 'test',
		);

		$this->assertSame('test', $field->id);
	}
}
