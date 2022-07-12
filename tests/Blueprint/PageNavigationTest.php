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
	 * @covers ::__construct
	 */
	public function testStatus()
	{
		// single
		$navigation = new PageNavigation(
			status: 'listed'
		);

		$this->assertSame(['listed'], $navigation->status);

		// wildcard
		$navigation = new PageNavigation(
			status: 'all'
		);

		$this->assertSame(['*'], $navigation->status);

		// array
		$navigation = new PageNavigation(
			status: ['draft', 'listed']
		);

		$this->assertSame(['draft', 'listed'], $navigation->status);
	}

	/**
	 * @covers ::__construct
	 */
	public function testTemplate()
	{
		// single
		$navigation = new PageNavigation(template: 'article');
		$this->assertSame(['article'], $navigation->template);

		// wildcard
		$navigation = new PageNavigation(template: 'all');
		$this->assertSame(['*'], $navigation->template);

		// array
		$navigation = new PageNavigation(template: ['article', 'video']);
		$this->assertSame(['article', 'video'], $navigation->template);
	}
}
