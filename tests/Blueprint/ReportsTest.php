<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Reports
 */
class ReportsTest extends TestCase
{
	/**
	 * @covers ::factory
	 */
	public function testFactory()
	{
		$reports = Reports::factory([
			'a' => [],
			'b' => []
		]);

		$this->assertCount(2, $reports);
		$this->assertSame('a', $reports->first()->id);
		$this->assertSame('b', $reports->last()->id);
	}

	/**
	 * @covers ::factory
	 */
	public function testFactoryWithQuery()
	{
		$promise = Reports::factory('page.reports');

		$this->assertInstanceOf(Promise::class, $promise);
		$this->assertSame(Reports::class, $promise->class);
		$this->assertSame('page.reports', $promise->query);
	}
}
