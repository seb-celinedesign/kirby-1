<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\HeadlineField
 */
class HeadlineFieldTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$field = new HeadlineField(
			id: 'test',
		);

		$this->assertTrue($field->numbered);
	}
}
