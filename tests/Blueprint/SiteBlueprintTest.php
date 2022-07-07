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
		);

		$this->assertSame($site, $blueprint->model);
		$this->assertSame('site', $blueprint->type);

		$this->assertInstanceOf(SiteOptions::class, $blueprint->options);
		$this->assertInstanceOf(Url::class, $blueprint->preview);
	}
}
