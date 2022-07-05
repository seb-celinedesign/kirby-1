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
		$section = new InfoField(
			section: $this->section(['type' => 'fields']),
			id: 'test',
			type: 'info'
		);

		$this->assertSame('Test', $section->label->value);
		$this->assertNull($section->text->value);
		$this->assertSame('plain', $section->theme->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testHelp()
	{
		$section = new InfoField(
			section: $this->section(['type' => 'fields']),
			id: 'test',
			help: '{{ page.slug }}',
			type: 'info'
		);

		$this->assertSame('<p>test</p>', $section->help->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testLabel()
	{
		$section = new InfoField(
			section: $this->section(['type' => 'fields']),
			id: 'test',
			label: 'My Info Section',
			type: 'info'
		);

		$this->assertSame('My Info Section', $section->label->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testText()
	{
		$section = new InfoField(
			section: $this->section(['type' => 'fields']),
			id: 'test',
			label: 'My Info Section',
			text: '{{ page.slug }}',
			type: 'info'
		);

		$this->assertSame('<p>test</p>', $section->text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testTheme()
	{
		$section = new InfoField(
			section: $this->section(['type' => 'fields']),
			id: 'test',
			theme: 'negative',
			type: 'info'
		);

		$this->assertSame('negative', $section->theme->value);
	}
}
