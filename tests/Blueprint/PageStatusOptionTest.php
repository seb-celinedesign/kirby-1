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
		$this->assertSame('The page is in draft mode and only visible for logged in editors or via secret link', $option->description->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithTrue()
	{
		$option = new PageStatusOption('draft', true);

		$this->assertFalse($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame('Draft', $option->label->value);
		$this->assertSame('The page is in draft mode and only visible for logged in editors or via secret link', $option->description->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithFalse()
	{
		$option = new PageStatusOption('draft', false);

		$this->assertTrue($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame('Draft', $option->label->value);
		$this->assertNull($option->description->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithString()
	{
		$option = new PageStatusOption('draft', 'In draft mode');

		$this->assertFalse($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame('In draft mode', $option->label->value);
		$this->assertNull($option->description->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithArray()
	{
		$option = new PageStatusOption('draft', [
			'label'       => $label = 'In draft mode',
			'description' => $descr = 'The page is still in draft mode'
		]);

		$this->assertFalse($option->disabled);
		$this->assertSame('draft', $option->id);
		$this->assertSame($label, $option->label->value);
		$this->assertSame($descr, $option->description->value);
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

}
