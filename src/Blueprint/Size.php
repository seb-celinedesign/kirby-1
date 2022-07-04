<?php

namespace Kirby\Blueprint;

class Size extends Enumeration
{
	public array $allowed = [
		'auto',
		'tiny',
		'small',
		'medium',
		'large',
		'huge'
	];

	public string|null $default = 'auto';
}
