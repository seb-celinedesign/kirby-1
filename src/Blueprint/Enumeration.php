<?php

namespace Kirby\Blueprint;

use Kirby\Exception\InvalidArgumentException;

/**
 * Enumeration
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Enumeration extends Property
{
	public function __construct(
		public string|null $value = null,
		public array $allowed = [],
		public string|null $default = null
	) {
		parent::__construct($value ?? $default, $default);

		if (in_array($this->value, $this->allowed) === false) {
			throw new InvalidArgumentException('The given value "' . $this->value . '" is not allowed. Allowed values: ' . implode(', ', $this->allowed));
		}
	}
}
