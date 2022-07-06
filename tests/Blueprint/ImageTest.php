<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Image
 */
class ImageTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$image = new Image();

		$this->assertSame('black', $image->back);
		$this->assertNull($image->color);
		$this->assertFalse($image->cover);
		$this->assertFalse($image->disabled);
		$this->assertNull($image->icon);
		$this->assertNull($image->query);
		$this->assertSame('1/1', $image->ratio);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithBool()
	{
		$image = new Image(false);
		$this->assertTrue($image->disabled);

		$image = new Image(true);
		$this->assertFalse($image->disabled);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstructWithString()
	{
		$image = new Image('page.cover');
		$this->assertSame('page.cover', $image->query);
	}
}
