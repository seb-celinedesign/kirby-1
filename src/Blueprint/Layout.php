<?php

namespace Kirby\Blueprint;

/**
 * Layout option
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Layout extends Enumeration
{
	public function __construct(string|null $value = null, string $default = 'list')
	{
		parent::__construct(
			default: $default,
			value: $value,
			allowed: [
				'cards',
				'cardlets',
				'list',
				'table'
			]
		);
	}
}
