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
			section: $this->section(['type' => 'fields']),
			id: 'test',
			type: 'text'
		);

		$this->assertInstanceOf(Text::class, $field->after);
		$this->assertNull($field->after->value);

		$this->assertNull($field->autocomplete);

		$this->assertInstanceOf(Text::class, $field->before);
		$this->assertNull($field->before->value);

		$this->assertInstanceOf(Enumeration::class, $field->converter);
		$this->assertNull($field->converter->value);

		$this->assertTrue($field->counter);
		$this->assertNull($field->default);
		$this->assertNull($field->icon);
		$this->assertNull($field->maxlength);
		$this->assertNull($field->minlength);
		$this->assertNull($field->pattern);

		$this->assertInstanceOf(Text::class, $field->placeholder);
		$this->assertNull($field->placeholder->value);

		$this->assertFalse($field->spellcheck);
		$this->assertNull($field->value);
	}

}
