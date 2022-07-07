<?php

namespace Kirby\Blueprint;

use Kirby\Cms\Page;

/**
 * @covers \Kirby\Blueprint\PageBlueprint
 */
class PageBlueprintTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$blueprint = new PageBlueprint(
			model: $page = $this->model(),
			id: 'test',
		);

		$this->assertSame($page, $blueprint->model);
		$this->assertSame('page', $blueprint->type);

		$this->assertInstanceOf(Image::class, $blueprint->image);
		$this->assertNull($blueprint->num);
		$this->assertInstanceOf(PageNavigation::class, $blueprint->navigation);
		$this->assertInstanceOf(PageOptions::class, $blueprint->options);
		$this->assertInstanceOf(Url::class, $blueprint->preview);
		$this->assertInstanceOf(PageStatus::class, $blueprint->status);
	}

	public function testStatusForHomePage()
	{
		$page = new Page(['slug' => 'home']);

		$blueprint = new PageBlueprint(
			model: $page,
			id: 'test',
		);

		$this->assertTrue($blueprint->status->draft->disabled);
	}
}
