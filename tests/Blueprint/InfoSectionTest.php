<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\InfoSection
 */
class InfoSectionTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$section = new InfoSection(
			column: $this->column(),
			id: 'test',
		);

		$this->assertSame('info', $section->type);
		$this->assertSame('Test', $section->label->value);
		$this->assertNull($section->text->value);
		$this->assertSame('plain', $section->theme->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testHelp()
	{
		$section = new InfoSection(
			column: $this->column(),
			id: 'test',
			help: '{{ page.slug }}',
		);

		$this->assertSame('<p>test</p>', $section->help->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testLabel()
	{
		$section = new InfoSection(
			column: $this->column(),
			id: 'test',
			label: 'My Info Section',
		);

		$this->assertSame('My Info Section', $section->label->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testText()
	{
		$section = new InfoSection(
			column: $this->column(),
			id: 'test',
			label: 'My Info Section',
			text: '{{ page.slug }}',
		);

		$this->assertSame('<p>test</p>', $section->text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testTheme()
	{
		$section = new InfoSection(
			column: $this->column(),
			id: 'test',
			theme: 'negative',
		);

		$this->assertSame('negative', $section->theme->value);
	}
}
