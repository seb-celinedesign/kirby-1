<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\ModelsSection
 */
class ModelsSectionTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$section = new ModelsSection(
			id: 'test'
		);

		$this->assertNull($section->columns);
		$this->assertNull($section->empty);
		$this->assertNull($section->help);
		$this->assertNull($section->image);
		$this->assertNull($section->info);
		$this->assertInstanceOf(Label::class, $section->label);
		$this->assertNull($section->layout);
		$this->assertNull($section->parent);
		$this->assertNull($section->size);
		$this->assertNull($section->text);
	}
}
