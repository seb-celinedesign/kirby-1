<?php

namespace Kirby\Blueprint;

class Help extends Text
{
	public function __construct(Section|Field $feature, string|array|null $value)
	{
		parent::__construct(
			model: $feature->model,
			value: $value,
			kirbytext: true
		);
	}
}
