<?php

namespace Kirby\Blueprint;

use Kirby\Cms\App;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
	protected $app;

	public function app(array $props = [])
	{
		return $this->app = new App(array_replace_recursive([
			'roots' => [
				'index' => '/dev/null'
			]
		], $props));
	}

	public function setUp(): void
	{
		$this->app();
	}
}
