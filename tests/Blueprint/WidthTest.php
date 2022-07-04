<?php

namespace Kirby\Blueprint;

/**
 * @covers \Kirby\Blueprint\Width
 */
class WidthTest extends EnumerationTestCase
{
	public const CLASSNAME = Width::class;

	protected $allowed = [
		'1/1',
		'1/2',
		'1/3',
		'1/4',
		'2/3',
		'3/4'
	];

	protected $default = '1/1';
}
