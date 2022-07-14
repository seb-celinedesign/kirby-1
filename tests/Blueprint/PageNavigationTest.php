<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\PageNavigation
 */
class PageNavigationTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$navigation = new PageNavigation();

		$this->assertNull($navigation->sortBy);
		$this->assertNull($navigation->status);
		$this->assertNull($navigation->template);
	}

	/**
	 * @covers ::__construct
	 */
	public function testSortBy()
	{
		$navigation = new PageNavigation(
			sortBy: 'title desc'
		);

		$this->assertSame('title desc', $navigation->sortBy);
	}

	/**
	 * @covers ::factory
	 */
	public function testFactoryWithStatus()
	{
		// single
		$navigation = PageNavigation::factory([
			'status' => 'listed'
		]);

		$this->assertSame(['listed'], $navigation->status);

		// wildcard
		$navigation = PageNavigation::factory([
			'status' => 'all'
		]);

		$this->assertSame(['*'], $navigation->status);

		// array
		$navigation = PageNavigation::factory([
			'status' => ['draft', 'listed']
		]);

		$this->assertSame(['draft', 'listed'], $navigation->status);
	}

	/**
	 * @covers ::__construct
	 */
	public function testTemplate()
	{
		// single
		$navigation = PageNavigation::factory([
			'template' => 'article'
		]);

		$this->assertSame(['article'], $navigation->template);

		// wildcard
		$navigation = PageNavigation::factory([
			'template' => 'all'
		]);

		$this->assertSame(['*'], $navigation->template);

		// array
		$navigation = PageNavigation::factory([
			'template' => ['article', 'video']
		]);

		$this->assertSame(['article', 'video'], $navigation->template);
	}
}
