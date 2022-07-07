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
			column: $this->column(),
			id: 'test'
		);

		$this->assertInstanceOf(TableColumns::class, $section->columns);
		$this->assertInstanceOf(Text::class, $section->empty);
		$this->assertInstanceOf(Kirbytext::class, $section->help);
		$this->assertInstanceOf(Image::class, $section->image);
		$this->assertInstanceOf(Text::class, $section->info);
		$this->assertInstanceOf(Label::class, $section->label);
		$this->assertInstanceOf(Layout::class, $section->layout);
		$this->assertInstanceOf(Related::class, $section->parent);
		$this->assertInstanceOf(Size::class, $section->size);
		$this->assertInstanceOf(Text::class, $section->text);
	}
}
