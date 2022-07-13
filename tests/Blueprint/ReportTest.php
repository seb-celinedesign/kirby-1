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

		$this->assertInstanceOf(Text::class, $report->info);
		$this->assertInstanceOf(Label::class, $report->label);
		$this->assertInstanceOf(Url::class, $report->link);
		$this->assertInstanceOf(Theme::class, $report->theme);
		$this->assertInstanceOf(Text::class, $report->value);
	}
}
