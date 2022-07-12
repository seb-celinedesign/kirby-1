<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Related
 */
class RelatedTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$related = new Related();
		$this->assertNull($related->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithQuery()
	{
		$related = new Related('page.site');
		$this->assertSame('page.site', $related->value);
	}
}
