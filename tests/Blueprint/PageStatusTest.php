<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\PageStatus
 */
class PageStatusTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$status = new PageStatus();

		$this->assertInstanceOf(PageStatusOption::class, $status->draft);
		$this->assertInstanceOf(PageStatusOption::class, $status->unlisted);
		$this->assertInstanceOf(PageStatusOption::class, $status->listed);
	}
}
