<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\PageOptions
 */
class PageOptionsTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$options = new PageOptions;

		$this->assertInstanceOf(ModelOption::class, $options->changeSlug);
		$this->assertInstanceOf(ModelOption::class, $options->changeStatus);
		$this->assertInstanceOf(ModelOption::class, $options->changeTemplate);
		$this->assertInstanceOf(ModelOption::class, $options->changeTitle);
		$this->assertInstanceOf(ModelOption::class, $options->create);
		$this->assertInstanceOf(ModelOption::class, $options->delete);
		$this->assertInstanceOf(ModelOption::class, $options->duplicate);
		$this->assertInstanceOf(ModelOption::class, $options->preview);
		$this->assertInstanceOf(ModelOption::class, $options->read);
		$this->assertInstanceOf(ModelOption::class, $options->update);
	}
}
