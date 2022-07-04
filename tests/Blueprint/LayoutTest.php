<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Layout
 */
class LayoutTest extends EnumerationTestCase
{
	public const CLASSNAME = Layout::class;

	protected $allowed = [
		'cards',
		'cardlets',
		'list',
		'table',
	];

	protected $default = 'list';
}
