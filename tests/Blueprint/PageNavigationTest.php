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
		$navigation = new PageNavigation(page: $this->model());

		$this->assertNull($navigation->sortBy);
		$this->assertSame(['unlisted'], $navigation->status);
		$this->assertSame(['default'], $navigation->template);
	}

	/**
	 * @covers ::__construct
	 */
	public function testSortBy()
	{
		$navigation = new PageNavigation(
			page: $this->model(),
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
			page: $this->model(),
			status: 'listed'
		);

		$this->assertSame(['listed'], $navigation->status);

		// wildcard
		$navigation = new PageNavigation(
			page: $this->model(),
			status: 'all'
		);

		$this->assertSame(['*'], $navigation->status);

		// array
		$navigation = new PageNavigation(
			page: $this->model(),
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
		$navigation = new PageNavigation(page: $this->model(), template: 'article');
		$this->assertSame(['article'], $navigation->template);

		// wildcard
		$navigation = new PageNavigation(page: $this->model(), template: 'all');
		$this->assertSame(['*'], $navigation->template);

		// array
		$navigation = new PageNavigation(page: $this->model(), template: ['article', 'video']);
		$this->assertSame(['article', 'video'], $navigation->template);
	}
}
