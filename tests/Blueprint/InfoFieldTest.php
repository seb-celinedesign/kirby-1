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
			section: $this->section(['type' => 'fields']),
			id: 'test',
			type: 'info'
		);

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
			section: $this->section(['type' => 'fields']),
			id: 'test',
			help: '{{ page.slug }}',
			type: 'info'
		);

		$this->assertSame('<p>test</p>', $info->help->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testLabel()
	{
		$info = new InfoField(
			section: $this->section(['type' => 'fields']),
			id: 'test',
			label: 'My Info Section',
			type: 'info'
		);

		$this->assertSame('My Info Section', $info->label->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testText()
	{
		$info = new InfoField(
			section: $this->section(['type' => 'fields']),
			id: 'test',
			label: 'My Info Section',
			text: '{{ page.slug }}',
			type: 'info'
		);

		$this->assertSame('<p>test</p>', $info->text->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testTheme()
	{
		$info = new InfoField(
			section: $this->section(['type' => 'fields']),
			id: 'test',
			theme: 'negative',
			type: 'info'
		);

		$this->assertSame('negative', $info->theme->value);
	}
}
