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
			section: $section = $this->section(),
			id: 'test',
		);

		$this->assertSame($section, $field->section);
		$this->assertInstanceOf('Kirby\Cms\Page', $field->model);
		$this->assertSame('test', $field->id);
	}
}
