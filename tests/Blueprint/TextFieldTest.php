<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\TextField
 */
class TextFieldTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$field = new TextField(
			id: 'test',
		);

		$this->assertSame('text', $field->type);
		$this->assertInstanceOf(After::class, $field->after);
		$this->assertNull($field->after->value);

		$this->assertNull($field->autocomplete);

		$this->assertInstanceOf(Before::class, $field->before);
		$this->assertNull($field->before->value);

		$this->assertInstanceOf(Converter::class, $field->converter);

		$this->assertTrue($field->counter);
		$this->assertNull($field->default);
		$this->assertInstanceOf(Icon::class, $field->icon);
		$this->assertNull($field->maxlength);
		$this->assertNull($field->minlength);
		$this->assertNull($field->pattern);

		$this->assertInstanceOf(Placeholder::class, $field->placeholder);
		$this->assertNull($field->placeholder->value);

		$this->assertFalse($field->spellcheck);
		$this->assertNull($field->value);
	}
}
