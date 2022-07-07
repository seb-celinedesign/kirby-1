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
		$info = new InfoField(
			section: $this->section(),
			id: 'test',
		);

		$this->assertSame('info', $info->type);
		$this->assertSame('Test', $info->label->value);
		$this->assertNull($info->text->value);
		$this->assertSame('plain', $info->theme->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testHelp()
	{
		$info = new InfoField(
			section: $this->section(),
			id: 'test',
			help: '{{ page.slug }}',
		);

		$this->assertSame('<p>test</p>', $info->help->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testLabel()
	{
		$info = new InfoField(
			section: $this->section(),
			id: 'test',
			label: 'My Info Section',
		);

		$this->assertSame('My Info Section', $info->label->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testText()
	{
		$info = new InfoField(
			section: $this->section(),
			id: 'test',
			label: 'My Info Section',
			text: '{{ page.slug }}',
		);

		$this->assertSame('<p>test</p>', $info->text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testTheme()
	{
		$info = new InfoField(
			section: $this->section(),
			id: 'test',
			theme: 'negative',
		);

		$this->assertSame('negative', $info->theme->value);
	}
}
