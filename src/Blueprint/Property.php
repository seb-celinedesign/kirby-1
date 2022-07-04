<?php

namespace Kirby\Blueprint;

/**
 * Property
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
abstract class Property
{
	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return $this->toString();
	}

	/**
	 * @return string
	 */
	public function toString(): string
	{
		return (string)$this->value() ?? '';
	}

	/**
	 * @return mixed
	 */
	public function value()
	{
		return $this->value;
	}
}
