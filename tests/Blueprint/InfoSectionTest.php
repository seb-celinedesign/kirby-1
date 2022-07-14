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

		$this->assertInstanceOf(Label::class, $section->label);
		$this->assertNull($section->help);
		$this->assertNull($section->text);
		$this->assertNull($section->theme);
	}
}
