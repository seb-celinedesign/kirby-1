<?php

namespace Kirby\Blueprint;

use Kirby\Cms\App;
use Kirby\Cms\File;
use Kirby\Cms\Page;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
	protected $app;

	public function app(array $props = [])
	{
		return $this->app = new App(array_replace_recursive([
			'roots' => [
				'index' => '/dev/null'
			],
			'users' => [
				[
					'email' => 'test@getkirby.com',
					'role'  => 'admin'
				]
			]
		], $props));
	}

	public function blueprint(array $props = [])
	{
		return new Blueprint(
			...array_merge(
				[
					'model' => $this->model(),
					'id'    => 'test',
					'type'  => 'test'
				],
				$props
			)
		);
	}

	public function column(array $props = [])
	{
		return new Column(
			...array_merge(
				[
					'tab' => $this->tab(),
					'id'  => 'test'
				],
				$props
			)
		);
	}

	public function file()
	{
		return new File([
			'filename' => 'test.jpg',
			'parent'   => $this->model()
		]);
	}

	public function model()
	{
		return new Page(['slug' => 'test']);
	}

	public function section(array $props = [])
	{
		return new Section(
			...array_merge(
				[
					'column' => $this->column(),
					'id'     => 'test',
					'type'   => 'fields'
				],
				$props
			)
		);
	}

	public function setUp(): void
	{
		$this->app();
	}

	public function site()
	{
		return $this->app->site();
	}

	public function tab(array $props = [])
	{
		return new Tab(
			...array_merge(
				[
					'blueprint' => $this->blueprint(),
					'id'        => 'test'
				],
				$props
			)
		);
	}

	public function user()
	{
		return $this->app->user('test@getkirby.com');
	}
}
