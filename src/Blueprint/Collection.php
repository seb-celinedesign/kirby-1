<?php

namespace Kirby\Blueprint;

use Kirby\Toolkit\Collection as BaseCollection;
use TypeError;

class Collection extends BaseCollection
{
	const TYPE = 'stdClass';

	public function __set(string $key, $value)
	{
		if (is_a($value, static::TYPE) === false) {
			throw new TypeError('Each value in the collection must be an instance of ' . static::TYPE);
		}

		parent::__set($key, $value);
	}

}
