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
		$sections = new Sections($column = $this->column(), [
			'a' => [
				'type' => 'info'
			],
		]);

		$this->assertSame('a', $sections->first()->id);
		$this->assertSame($column, $sections->first()->column);
		$this->assertSame('info', $sections->first()->type);
	}
}
