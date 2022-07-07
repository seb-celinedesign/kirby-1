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
			column: $this->column(),
			id: 'test',
			fields: [
				'info' => [
					'type' => 'info'
				]
			]
		);

		$this->assertSame('fields', $section->type);
		$this->assertInstanceOf('Kirby\Blueprint\Fields', $section->fields);
		$this->assertInstanceOf('Kirby\Blueprint\InfoField', $section->fields->first());
	}
}
