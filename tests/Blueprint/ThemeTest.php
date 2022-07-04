<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Theme
 */
class ThemeTest extends EnumerationTestCase
{
	const CLASSNAME = Theme::class;

	protected $allowed = [
		'info',
		'negative',
		'none',
		'notice',
		'plain',
		'positive'
	];

	protected $default = 'plain';
}
