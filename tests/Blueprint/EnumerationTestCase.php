<?php

namespace Kirby\Blueprint;

class EnumerationTestCase extends TestCase
{
	const CLASSNAME = Enumeration::class;

	protected $default = null;
	protected $allowed = [];

	public function instance(...$args): Enumeration
	{
		$class = static::CLASSNAME;
		return new $class(...$args);
	}

	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$object = $this->instance();

		$this->assertSame($this->default, $object->value);
	}

	public function provideAllowed(): array
	{
		return array_map(function ($allowed) {
			return [$allowed];
		}, $this->allowed);
	}

	/**
	 * @dataProvider provideAllowed
	 */
	public function testAllowed(string $allowed)
	{
		$object = $this->instance($allowed);
		$this->assertSame($allowed, $object->value);
	}

	public function testUnallowed()
	{
		$this->expectException('Kirby\Exception\InvalidArgumentException');
		$this->instance('this-is-not-allowed');
	}
}
