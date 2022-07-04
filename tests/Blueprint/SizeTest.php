<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Size
 */
class SizeTest extends EnumerationTestCase
{
	const CLASSNAME = Size::class;

	protected $allowed = [
		'auto',
		'tiny',
		'small',
		'medium',
		'large',
		'huge'
	];

	protected $default = 'auto';
}
