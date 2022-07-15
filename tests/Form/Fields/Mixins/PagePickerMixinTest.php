<?php

namespace Kirby\Form\Fields;

use Kirby\Cms\App;
use Kirby\Cms\Page;
use Kirby\Form\Field;

class PagePickerMixinTest extends TestCase
{
	public function setUp(): void
	{
		$this->app = new App([
			'roots' => [
				'index' => '/dev/null'
			]
		]);

		// otherwise all pages won't be readable
		$this->app->impersonate('kirby');
	}

	public function testPagesWithoutParent()
	{
		Field::$types = [
			'test' => [
				'mixins'  => ['pagepicker'],
				'methods' => [
					'pages' => function () {
						return $this->pagepicker();
					}
				]
			]
		];

		$app = $this->app->clone([
			'site' => [
				'children' => [
					[
						'slug' => 'a',
						'content' => ['uuid' => 'uuid-page-a'],
					],
					[
						'slug' => 'b',
						'content' => ['uuid' => 'uuid-page-b'],
					],
					[
						'slug' => 'c',
						'content' => ['uuid' => 'uuid-page-c'],
					],
				],
				'content' => [
					'title' => 'Test'
				]
			]
		]);

		$app->impersonate('kirby');

		$field = $this->field('test', [
			'model' => $this->app->site()
		]);

		$response = $field->pages();
		$pages    = $response['data'];
		$model    = $response['model'];

		$this->assertEquals('Test', $model['title']);
		$this->assertNull($model['id']);
		$this->assertNull($model['parent']);

		$this->assertCount(3, $pages);
		$this->assertEquals('page://uuid-page-a', $pages[0]['id']);
		$this->assertEquals('page://uuid-page-b', $pages[1]['id']);
		$this->assertEquals('page://uuid-page-c', $pages[2]['id']);
	}

	public function testPagesWithParent()
	{
		Field::$types = [
			'test' => [
				'mixins'  => ['pagepicker'],
				'methods' => [
					'pages' => function () {
						return $this->pagepicker([
							'parent' => 'a'
						]);
					}
				]
			]
		];

		$app = $this->app->clone([
			'site' => [
				'children' => [
					[
						'slug' => 'a',
						'children' => [
							[
								'slug' => 'aa',
								'content' => ['uuid' => 'uuid-page-aa'],
							]
						]
					],
					['slug' => 'b'],
					['slug' => 'c'],
				],
				'content' => [
					'title' => 'Test'
				]
			]
		]);

		$app->impersonate('kirby');

		$field = $this->field('test', [
			'model' => $this->app->site()
		]);

		$response = $field->pages();
		$pages    = $response['data'];
		$model    = $response['model'];

		$this->assertEquals('a', $model['title']);
		$this->assertEquals('a', $model['id']);
		$this->assertNull($model['parent']);

		$this->assertCount(1, $pages);
		$this->assertEquals('page://uuid-page-aa', $pages[0]['id']);
	}

	public function testPageChildren()
	{
		Field::$types = [
			'test' => [
				'mixins'  => ['pagepicker'],
				'methods' => [
					'pages' => function () {
						return $this->pagepicker([
							'query' => 'page.children'
						]);
					}
				]
			]
		];

		$page = new Page([
			'slug' => 'test',
			'children' => [
				[
					'slug' => 'a',
					'content' => ['uuid' => 'uuid-page-a'],
					'children' => [
						['slug' => 'aa'],
						['slug' => 'ab'],
						['slug' => 'ac'],
					]
				],
				[
					'slug' => 'b',
					'content' => ['uuid' => 'uuid-page-b'],
				],
				[
					'slug' => 'c',
					'content' => ['uuid' => 'uuid-page-c'],
				],
			]
		]);

		$field = $this->field('test', [
			'model' => $page
		]);

		$response = $field->pages();
		$pages    = $response['data'];
		$model    = $response['model'];

		$this->assertCount(3, $model);
		$this->assertNull($model['id']);
		$this->assertNull($model['parent']);
		$this->assertSame('test', $model['title']);

		$this->assertCount(3, $pages);
		$this->assertSame('page://uuid-page-a', $pages[0]['id']);
		$this->assertSame('page://uuid-page-b', $pages[1]['id']);
		$this->assertSame('page://uuid-page-c', $pages[2]['id']);
	}

	public function testPageChildrenWithoutSubpages()
	{
		Field::$types = [
			'test' => [
				'mixins'  => ['pagepicker'],
				'methods' => [
					'pages' => function () {
						return $this->pagepicker([
							'query'    => 'page.children',
							'subpages' => false
						]);
					}
				]
			]
		];

		$page = new Page([
			'slug' => 'test',
			'children' => [
				[
					'slug' => 'a',
					'content' => ['uuid' => 'uuid-page-a'],
					'children' => [
						['slug' => 'aa'],
						['slug' => 'ab'],
						['slug' => 'ac'],
					]
				],
				[
					'slug' => 'b',
					'content' => ['uuid' => 'uuid-page-b']
				],
				[
					'slug' => 'c',
					'content' => ['uuid' => 'uuid-page-c']
				],
			]
		]);

		$field = $this->field('test', [
			'model' => $page
		]);

		$response = $field->pages();
		$pages    = $response['data'];
		$model    = $response['model'];

		$this->assertNull($model);
		$this->assertCount(3, $pages);
		$this->assertEquals('page://uuid-page-a', $pages[0]['id']);
		$this->assertEquals('page://uuid-page-b', $pages[1]['id']);
		$this->assertEquals('page://uuid-page-c', $pages[2]['id']);
	}

	public function testMap()
	{
		Field::$types = [
			'test' => [
				'mixins'  => ['pagepicker'],
				'methods' => [
					'pages' => function () {
						return $this->pagepicker([
							'query' => 'page.children',
							'map'   => function ($page) {
								return $page->id();
							}
						]);
					}
				]
			]
		];

		$page = new Page([
			'slug' => 'test',
			'children' => [
				['slug' => 'a'],
				['slug' => 'b'],
				['slug' => 'c'],
			]
		]);

		$field = $this->field('test', [
			'model' => $page
		]);

		$response = $field->pages();
		$pages    = $response['data'];

		$this->assertEquals(['test/a', 'test/b', 'test/c'], $pages);
	}
}
