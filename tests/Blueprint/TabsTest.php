<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Tabs
 */
class TabsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$tabs = Tabs::factory([
			'a' => [],
			'b' => []
		]);

		$this->assertSame('a', $tabs->first()->id);
		$this->assertSame('A', $tabs->first()->label->value);

		$this->assertSame('b', $tabs->last()->id);
		$this->assertSame('B', $tabs->last()->label->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithProps()
	{
		$tabs = Tabs::factory([
			'a' => [
				'label' => 'Tab A',
				'icon'  => 'edit'
			],
		]);

		$this->assertSame('a', $tabs->first()->id);
		$this->assertSame('Tab A', $tabs->first()->label->value);
		$this->assertSame('edit', $tabs->first()->icon->value);
	}
}
