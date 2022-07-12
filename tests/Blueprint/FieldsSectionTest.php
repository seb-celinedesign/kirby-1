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

		$this->assertSame('fields', $section->type);
		$this->assertInstanceOf(Fields::class, $section->fields);
	}
}
