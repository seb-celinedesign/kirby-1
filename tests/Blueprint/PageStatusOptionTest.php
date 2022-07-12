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
		$this->assertSame('Draft', $option->label->value);
		$this->assertNull($option->description->value);
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
	public function testFactoryWithNull()
	{
		$option = PageStatusOption::factory('draft');

		$this->assertFalse($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame('Draft', $option->label->value);
		$this->assertSame('The page is in draft mode and only visible for logged in editors or via secret link', $option->description->value);
	}

	/**
	 * @covers ::factory
	 */
	public function testFactoryWithTrue()
	{
		$option = PageStatusOption::factory('draft', true);

		$this->assertFalse($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame('Draft', $option->label->value);
		$this->assertSame('The page is in draft mode and only visible for logged in editors or via secret link', $option->description->value);
	}

	/**
	 * @covers ::factory
	 */
	public function testFactoryWithFalse()
	{
		$option = PageStatusOption::factory('draft', false);

		$this->assertTrue($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertNull($option->label->value);
		$this->assertNull($option->description->value);
	}

	/**
	 * @covers ::factory
	 */
	public function testFactoryWithString()
	{
		$option = PageStatusOption::factory('draft', 'In draft mode');

		$this->assertFalse($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame('In draft mode', $option->label->value);
		$this->assertNull($option->description->value);
	}

	/**
	 * @covers ::factory
	 */
	public function testConstructWithArray()
	{
		$option = PageStatusOption::factory('draft', [
			'label'       => $label = 'In draft mode',
			'description' => $descr = 'The page is still in draft mode'
		]);

		$this->assertFalse($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame($label, $option->label->value);
		$this->assertSame($descr, $option->description->value);
	}
}
