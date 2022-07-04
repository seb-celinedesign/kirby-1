<?php

namespace Kirby\Blueprint;

class Theme extends Enumeration
{
	public array $allowed = [
		'info',
		'negative',
		'none',
		'notice',
		'plain',
		'positive',
	];

	public string|null $default = 'plain';
}
