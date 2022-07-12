<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\StatsSection
 */
class StatsSectionTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$section = new StatsSection(
			id: 'test',
		);

		$this->assertSame('stats', $section->type);
		$this->assertInstanceOf(Reports::class, $section->reports);
		$this->assertInstanceOf(Size::class, $section->size);
	}
}
