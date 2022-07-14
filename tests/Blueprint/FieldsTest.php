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
		$fields = Fields::factory([
			'a' => [
				'type' => 'info'
			],
			'b' => [
				'type' => 'text'
			],
		]);

		$this->assertSame('a', $fields->first()->id);
		$this->assertInstanceOf(InfoField::class, $fields->first());
		$this->assertSame('b', $fields->last()->id);
		$this->assertInstanceOf(TextField::class, $fields->last());
	}
}
