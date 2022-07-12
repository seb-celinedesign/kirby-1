<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Autoload
 */
class AutoloadTest extends TestCase
{
	public function testBlueprint()
	{
		$blueprint = Autoload::blueprint([
			'id'   => 'test',
			'type' => 'page',
		]);

		$this->assertInstanceOf(PageBlueprint::class, $blueprint);
	}

	public function testField()
	{
		$field = Autoload::field([
			'id'   => 'test',
			'type' => 'info',
		]);

		$this->assertInstanceOf(InfoField::class, $field);
	}

	public function testSection()
	{
		$section = Autoload::section([
			'id'   => 'test',
			'type' => 'info',
		]);

		$this->assertInstanceOf(InfoSection::class, $section);
	}

	public function testType()
	{
		$section = Autoload::type('section', [
			'id'   => 'test',
			'type' => 'info',
		]);

		$this->assertInstanceOf(InfoSection::class, $section);
	}
}
