<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\SiteOptions
 */
class SiteOptionsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$options = new SiteOptions();

		$this->assertNull($options->changeTitle);
		$this->assertNull($options->update);
	}
}
