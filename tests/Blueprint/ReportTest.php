<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Report
 */
class ReportTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$report = new Report('test');

		$this->assertNull($report->info);
		$this->assertInstanceOf(Label::class, $report->label);
		$this->assertNull($report->link);
		$this->assertNull($report->theme);
		$this->assertNull($report->value);
	}
}
