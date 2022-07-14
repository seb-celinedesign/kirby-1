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

		$this->assertNull($blueprint->image);
		$this->assertNull($blueprint->num);
		$this->assertNull($blueprint->navigation);
		$this->assertNull($blueprint->options);
		$this->assertNull($blueprint->preview);
		$this->assertNull($blueprint->status);
	}
}
