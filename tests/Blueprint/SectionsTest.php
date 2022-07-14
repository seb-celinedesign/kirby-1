<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Sections
 */
class SectionsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$sections = Sections::factory([
			'a' => [
				'type' => 'info'
			],
		]);

		$this->assertSame('a', $sections->first()->id);
	}
}
