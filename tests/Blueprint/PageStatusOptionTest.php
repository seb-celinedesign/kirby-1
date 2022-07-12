<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\PageStatusOption
 */
class PageStatusOptionTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$option = new PageStatusOption('draft');

		$this->assertFalse($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertInstanceOf(Label::class, $option->label);
		$this->assertInstanceOf(Text::class, $option->description);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithInvalidId()
	{
		$this->expectException('Kirby\Exception\InvalidArgumentException');
		$this->expectExceptionMessage('The status must be draft, unlisted or listed');

		new PageStatusOption('drafts');
	}

	/**
	 * @covers ::factory
	 */
	public function testFactory()
	{
		$option = PageStatusOption::factory([
			'id'          => 'draft',
			'label'       => $label = 'In draft mode',
			'description' => $descr = 'The page is still in draft mode'
		]);

		$this->assertFalse($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame($label, $option->label->value);
		$this->assertSame($descr, $option->description->value);
	}

	/**
	 * @covers ::prefab
	 */
	public function testPrefabWithFalse()
	{
		$option = PageStatusOption::prefab('draft', false);

		$this->assertTrue($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame('Draft', $option->label->value);
		$this->assertSame('The page is in draft mode and only visible for logged in editors or via secret link', $option->description->value);
	}

	/**
	 * @covers ::prefab
	 */
	public function testPrefabWithNull()
	{
		$option = PageStatusOption::prefab('draft');

		$this->assertFalse($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame('Draft', $option->label->value);
		$this->assertSame('The page is in draft mode and only visible for logged in editors or via secret link', $option->description->value);
	}

	/**
	 * @covers ::prefab
	 */
	public function testPrefabWithString()
	{
		$option = PageStatusOption::prefab('draft', 'In draft mode');

		$this->assertFalse($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame('In draft mode', $option->label->value);
		$this->assertNull($option->description->value);
	}

	/**
	 * @covers ::prefab
	 */
	public function testPrefabWithTrue()
	{
		$option = PageStatusOption::prefab('draft', true);

		$this->assertFalse($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame('Draft', $option->label->value);
		$this->assertSame('The page is in draft mode and only visible for logged in editors or via secret link', $option->description->value);
	}
}
