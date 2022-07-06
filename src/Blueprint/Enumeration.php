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
	public array $allowed = [];
	public string|null $default = null;
	public string|null $value;

	public function __construct(string|null $value = null, array $allowed = [], string|null $default = null)
	{
		$this->allowed = $allowed;
		$this->default = $default;
		$this->value   = $value ?? $default;

		if (in_array($this->value, $this->allowed) === false) {
			throw new InvalidArgumentException('The given value is not allowed. Allowed values: ' . implode(', ', $this->allowed));
		}
	}
}
