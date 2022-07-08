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
		$url = new Url($this->model());

		$this->assertFalse($url->disabled);
		$this->assertNull($url->value);
	}

	public function testDefault()
	{
		$url = new Url(model: $this->model(), value: null, default: '/foo');
		$this->assertSame('/foo', $url->value);
	}

	public function testDisabled()
	{
		$url = new Url(model: $this->model(), value: '/foo', disabled: true);
		$this->assertTrue($url->disabled);
	}

	public function testToString()
	{
		$url = new Url(model: $this->model(), value: '/foo');
		$this->assertSame('/foo', $url->toString());
		$this->assertSame('/foo', (string)$url);
	}

	public function testToStringWhenDisabled()
	{
		$url = new Url(model: $this->model(), value: '/foo', disabled: true);
		$this->assertSame('', $url->toString());
		$this->assertSame('', (string)$url);
	}

	public function testFactoryWithQuery()
	{
		$url = Url::factory(model: $this->model(), value: 'https://getkirby.com/{{ page.slug }}');
		$this->assertSame('https://getkirby.com/test', $url->value);
	}

	public function testFactoryWithFalse()
	{
		$url = Url::factory(model: $this->model(), value: false);

		$this->assertTrue($url->disabled);
		$this->assertNull($url->value);
	}

	public function testFactoryWithTrue()
	{
		// no default
		$url = Url::factory(model: $this->model(), value: true);
		$this->assertNull($url->value);

		// with default
		$url = Url::factory(model: $this->model(), value: true, default: '/foo');
		$this->assertSame('/foo', $url->value);
	}
}
