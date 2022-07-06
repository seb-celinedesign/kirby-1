<?php

namespace Kirby\Blueprint;

/**
 * Theme option for sections and fields
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Theme extends Enumeration
{
	public function __construct(string|null $value = null, string $default = 'plain')
	{
		parent::__construct(
			default: $default,
			value: $value,
			allowed: [
				'info',
				'negative',
				'none',
				'notice',
				'plain',
				'positive',
			]
		);
	}
}
