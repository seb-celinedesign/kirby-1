<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Section
 */
class SectionTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$section = new Section(
			column: $column = $this->column(),
			id: 'test'
		);

		$this->assertSame($column, $section->column);
		$this->assertInstanceOf('Kirby\Cms\Page', $section->model);
		$this->assertSame('test', $section->id);
	}
}
