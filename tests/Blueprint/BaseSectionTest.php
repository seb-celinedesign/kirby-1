<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\BaseSection
 */
class BaseSectionTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$section = new BaseSection('test');

		$this->assertSame('test', $section->id);
		$this->assertInstanceOf(Label::class, $section->label);
		$this->assertNull($section->help);
	}

	/**
	 * @covers ::polyfill
	 */
	public function testPolyfill()
	{
		$props = BaseSection::polyfill([
			'headline' => 'Test'
		]);

		$this->assertSame('Test', $props['label']);
		$this->assertArrayNotHasKey('headline', $props);
	}
}
