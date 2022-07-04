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
			'id'    => 'test',
			'model' => $this->model(),
			'type'  => 'page',
		]);

		$this->assertInstanceOf(PageBlueprint::class, $blueprint);
	}

	public function testField()
	{
		$field = Autoload::field([
			'section' => $this->section(),
			'id'      => 'test',
			'type'    => 'info',
		]);

		$this->assertInstanceOf(InfoField::class, $field);
	}

	public function testSection()
	{
		$section = Autoload::section([
			'column' => $this->column(),
			'id'     => 'test',
			'type'   => 'info',
		]);

		$this->assertInstanceOf(InfoSection::class, $section);
	}

	public function testType()
	{
		$section = Autoload::type('section', [
			'column' => $this->column(),
			'id'     => 'test',
			'type'   => 'info',
		]);

		$this->assertInstanceOf(InfoSection::class, $section);
	}

}
