<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\SiteBlueprint
 */
class SiteBlueprintTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$blueprint = new SiteBlueprint(
			model: $site = $this->site(),
			id: 'test',
			type: 'site'
		);

		$this->assertSame($site, $blueprint->model);

		$this->assertInstanceOf(SiteOptions::class, $blueprint->options);
	}

}
