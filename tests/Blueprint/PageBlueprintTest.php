<?php

namespace Kirby\Blueprint;

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
			id: 'test',
		);

		$this->assertInstanceOf(Image::class, $blueprint->image);
		$this->assertNull($blueprint->num);
		$this->assertInstanceOf(PageNavigation::class, $blueprint->navigation);
		$this->assertInstanceOf(PageOptions::class, $blueprint->options);
		$this->assertInstanceOf(Url::class, $blueprint->preview);
		$this->assertInstanceOf(PageStatus::class, $blueprint->status);
	}
}
