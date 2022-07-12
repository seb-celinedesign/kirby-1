<?php

namespace Kirby\Blueprint;

/**
 * String converter options
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Converter extends Enumeration
{
	public function __construct(string|null $value = null, string $default = null)
	{
		parent::__construct(
			default: $default,
			value: $value,
			allowed: [
				null,
				'lower',
				'slug',
				'ucfirst',
				'upper',
			]
		);
	}
}
