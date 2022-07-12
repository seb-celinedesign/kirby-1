<?php

namespace Kirby\Blueprint;

/**
 * Alignment for columns
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class TableColumnAlignment extends Enumeration
{
	public function __construct(string|null $value = null, string $default = 'left')
	{
		parent::__construct(
			default: $default,
			value: $value,
			allowed: [
				'left',
				'center',
				'right'
			]
		);
	}
}
