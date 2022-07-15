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
		$blueprint = new SiteBlueprint();

		$this->assertSame('site', $blueprint->id);
		$this->assertNull($blueprint->options);
		$this->assertNull($blueprint->preview);
	}

	/**
	 * @covers ::polyfill
	 */
	public function testPolyfill()
	{
		$props = SiteBlueprint::polyfill(['id' => 'test']);

		$this->assertArrayNotHasKey('id', $props);
	}
}
