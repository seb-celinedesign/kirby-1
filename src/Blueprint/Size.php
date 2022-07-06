<?php

namespace Kirby\Blueprint;

/**
 * Size option for sections and fields
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Size extends Enumeration
{
	public function __construct(string|null $value = null, string $default = 'auto')
	{
		parent::__construct(
			default: $default,
			value: $value,
			allowed: [
				'auto',
				'tiny',
				'small',
				'medium',
				'large',
				'huge'
			]
		);
	}
}
