<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Promise
 */
class PromiseTest extends TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function testConstruct()
	{
		$promise = new Promise('page.title', Component::class);

		$this->assertSame('page.title', $promise->query);
		$this->assertSame(Component::class, $promise->class);
	}

	/**
	 * @covers ::render
	 */
	public function testRender()
	{
		$promise = new Promise('page.title', Label::class);
		$label   = $promise->render($this->model());

		$this->assertSame('test', $label);
	}

	/**
	 * @covers ::resolve
	 */
	public function testResolveField()
	{
		$promise = new Promise('page.title', Label::class);
		$label   = $promise->resolve($this->model());

		$this->assertInstanceOf(Label::class, $label);
		$this->assertSame('test', $label->value);
	}

	/**
	 * @covers ::resolve
	 */
	public function testResolveString()
	{
		$promise = new Promise('page.slug', Label::class);
		$label   = $promise->resolve($this->model());

		$this->assertInstanceOf(Label::class, $label);
		$this->assertSame('test', $label->value);
	}

	/**
	 * @covers ::resolve
	 */
	public function testResolveObject()
	{
		$promise = new Promise('page.children', 'Kirby\Cms\Pages');
		$pages   = $promise->resolve($this->model());

		$this->assertInstanceOf('Kirby\Cms\Pages', $pages);
	}

	public function testResolveInvalidObject()
	{
		$this->expectException('Kirby\Exception\InvalidArgumentException');
		$this->expectExceptionMessage('The result of the query "page.files" must be an instance of Kirby\Cms\Pages. The query returned a Kirby\Cms\Files object instead');

		$promise = new Promise('page.files', 'Kirby\Cms\Pages');
		$promise->resolve($this->model());
	}
}
