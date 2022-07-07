<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Fields
 */
class FieldsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$fields = Fields::factory($section = $this->section(), [
			'a' => [
				'type' => 'info'
			],
			'b' => [
				'type' => 'text'
			],
		]);

		$this->assertSame('a', $fields->first()->id);
		$this->assertSame($section, $fields->first()->section);
		$this->assertSame('info', $fields->first()->type);

		$this->assertSame('b', $fields->last()->id);
		$this->assertSame($section, $fields->last()->section);
		$this->assertSame('text', $fields->last()->type);
	}
}
