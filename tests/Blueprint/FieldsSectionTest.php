<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\FieldsSection
 */
class FieldsSectionTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$section = new FieldsSection(
			id: 'test',
		);

		$this->assertNull($section->fields);
	}
}
