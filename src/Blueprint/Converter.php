<?php

namespace Kirby\Blueprint;

/**
 * The field value will be converted with the selected converter before the value gets saved. Available converters: `lower`, `upper`, `ucfirst`, `slug`
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
