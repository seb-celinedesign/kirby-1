<?php

namespace Kirby\Blueprint;

/**
 * Url option with query string superpowers
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Url extends StringProperty
{
	public function __construct(
		public string|null $value = null,
		public string|null $default = null,
		public bool $disabled = false
	) {
		parent::__construct(
			default: $default,
			value: $value
		);

		$this->disabled = $disabled;
	}
}
