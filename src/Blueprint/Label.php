<?php

namespace Kirby\Blueprint;

use Kirby\Toolkit\Str;

/**
 * Label
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Label extends Text
{
	public static function fallback(string $id): static
	{
		return new static(Str::ucfirst($id));
	}
}
