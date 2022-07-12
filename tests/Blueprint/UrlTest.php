<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Url
 */
class UrlTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$url = new Url();

		$this->assertFalse($url->disabled);
		$this->assertNull($url->value);
	}

	public function testDefault()
	{
		$url = new Url(value: null, default: '/foo');
		$this->assertSame('/foo', $url->value);
	}

	public function testDisabled()
	{
		$url = new Url(value: '/foo', disabled: true);
		$this->assertTrue($url->disabled);
	}

	public function testToString()
	{
		$url = new Url(value: '/foo');
		$this->assertSame('/foo', $url->toString());
		$this->assertSame('/foo', (string)$url);
	}
}
