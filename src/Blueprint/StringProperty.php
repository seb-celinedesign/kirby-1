<?php

namespace Kirby\Blueprint;

/**
 * String Property
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class StringProperty extends Property
{
	public string|null $default;
	public string|null $value;

	public function __construct(string|null $value = null, string|null $default = null)
	{
		$this->default = $default;
		$this->value   = $value ?? $default;
	}
}
