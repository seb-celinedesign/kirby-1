<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\InfoField
 */
class InfoFieldTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$field = new InfoField(
			id: 'test',
		);

		$this->assertSame('info', $field->type);
		$this->assertInstanceOf(Label::class, $field->label);
		$this->assertInstanceOf(Help::class, $field->help);
		$this->assertInstanceOf(Kirbytext::class, $field->text);
		$this->assertInstanceOf(Theme::class, $field->theme);
	}
}
