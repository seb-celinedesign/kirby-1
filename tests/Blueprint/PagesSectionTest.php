<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\PagesSection
 */
class PagesSectionTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$section = new PagesSection(
			id: 'test'
		);

		$this->assertNull($section->status);
		$this->assertSame([], $section->templates);
	}

	/**
	 * @covers ::polyfill
	 */
	public function testPolyfill()
	{
		$props = PagesSection::polyfill([
			'headline' => 'Test',
			'template' => 'test'
		]);

		$this->assertArrayNotHasKey('headline', $props);
		$this->assertArrayNotHasKey('template', $props);
		$this->assertSame('Test', $props['label']);
		$this->assertSame(['test'], $props['templates']);
	}
}
