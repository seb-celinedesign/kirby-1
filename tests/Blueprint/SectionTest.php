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
			id: 'test'
		);

		$this->assertSame('test', $section->id);
	}
}
