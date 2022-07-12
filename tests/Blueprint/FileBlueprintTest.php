<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\FileBlueprint
 */
class FileBlueprintTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$blueprint = new FileBlueprint(
			id: 'test',
		);

		$this->assertSame('file', $blueprint->type);

		$this->assertInstanceOf(Accept::class, $blueprint->accept);
		$this->assertInstanceOf(Image::class, $blueprint->image);
		$this->assertInstanceOf(FileOptions::class, $blueprint->options);
		$this->assertInstanceOf(Url::class, $blueprint->preview);
	}
}
