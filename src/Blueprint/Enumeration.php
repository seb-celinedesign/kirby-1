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

	/**
	 * @var array
	 */
	public array $allowed = [];

	/**
	 * @var string|null
	 */
	public string|null $default = null;

	/**
	 * @var string|null
	 */
	public string|null $value;

	/**
	 * @param string|null $value
	 * @param array $allowed
	 * @param string|null $default
	 */
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
