<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Related
 */
class RelatedTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$related = new Related(
			model: $model = $this->model()
		);

		$this->assertSame($model, $related->model);
		$this->assertSame($model, $related->related);
		$this->assertNull($related->query);
	}

	/**
	 * @covers ::__construct
	 */
	public function testQuery()
	{
		$related = new Related(
			model: $this->model(),
			query: 'page.site'
		);

		$this->assertInstanceOf('Kirby\Cms\Site', $related->related);
	}

	/**
	 * @covers ::__construct
	 */
	public function testQueryWithEmptyResult()
	{
		$this->expectException('Kirby\Exception\NotFoundException');
		$this->expectExceptionMessage('The result for the query "page.children.first" is empty');

		new Related(
			model: $this->model(),
			query: 'page.children.first'
		);
	}

	/**
	 * @covers ::__construct
	 */
	public function testQueryWithInvalidResult()
	{
		$this->expectException('Kirby\Exception\InvalidArgumentException');
		$this->expectExceptionMessage('The result for the query "kirby.languages" is invalid. You must choose the site, a page, a file or a user');

		new Related(
			model: $this->model(),
			query: 'kirby.languages'
		);
	}
}
