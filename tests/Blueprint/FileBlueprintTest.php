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

		$this->assertNull($blueprint->accept);
		$this->assertNull($blueprint->image);
		$this->assertNull($blueprint->options);
		$this->assertNull($blueprint->preview);
	}
}
