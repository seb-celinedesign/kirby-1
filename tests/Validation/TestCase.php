<?php

namespace Kirby\Validation;

use Kirby\Cms\App;

class TestCase extends \PHPUnit\Framework\TestCase
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

	public function setUp(): void
	{
		$this->app();
	}

}
