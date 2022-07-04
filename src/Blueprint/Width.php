<?php

namespace Kirby\Blueprint;

/**
 * Width option for sections and fields
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Width extends Enumeration
{
	/**
	 * @param string|null $value
	 * @param string $default
	 */
	public function __construct(string|null $value = null, string $default = '1/1')
	{
		parent::__construct(
			default: $default,
			value: $value,
			allowed: [
				'1/1',
				'1/2',
				'1/3',
				'1/4',
				'2/3',
				'3/4',
			]
		);
	}
}
