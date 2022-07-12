<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\InfoSection
 */
class InfoSectionTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$section = new InfoSection(
			id: 'test',
		);

		$this->assertSame('info', $section->type);
		$this->assertInstanceOf(Label::class, $section->label);
		$this->assertInstanceOf(Help::class, $section->help);
		$this->assertInstanceOf(Kirbytext::class, $section->text);
		$this->assertInstanceOf(Theme::class, $section->theme);
	}
}
