<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Label
 */
class TranslatedTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$translated = new Translated();

		$this->assertSame([], $translated->translations);
		$this->assertNull($translated->default);
		$this->assertNull($translated->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithString()
	{
		$translated = new Translated('Test');
		$this->assertSame('Test', $translated->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithArray()
	{
		$translated = new Translated(['en' => 'Test']);
		$this->assertSame('Test', $translated->value);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithFallback()
	{
		$translated = new Translated([], 'Test');
		$this->assertSame('Test', $translated->value);
	}
}
