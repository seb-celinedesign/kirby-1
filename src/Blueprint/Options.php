<?php

namespace Kirby\Blueprint;

class Options extends Collection
{
	const TYPE = Option::class;

	public function __construct(array|string $options)
	{
		foreach ($options as $key => $option) {

			if (is_string($option) === true) {
				if (is_string($key) === true) {
					$option = ['value' => $key, 'text' => $option];
				} else {
					$option = ['value' => $option];
				}
			}

			$option = new Option(...$option);
			$this->__set($option->value, $option);
		}
	}
}
