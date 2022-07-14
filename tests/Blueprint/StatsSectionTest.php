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

		$this->assertNull($section->reports);
		$this->assertNull($section->size);
	}
}
