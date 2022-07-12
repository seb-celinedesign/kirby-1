<?php

namespace Kirby\Blueprint;

/**
 * Page Status
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PageStatus extends Enumeration
{
	public function __construct(string|null $value = null, string $default = 'draft')
	{
		parent::__construct(
			default: $default,
			value: $value,
			allowed: [
				'draft',
				'unlisted',
				'listed',
			]
		);
	}
}
