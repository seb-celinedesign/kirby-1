<?php

namespace Kirby\Blueprint;

/**
 * Section
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Section extends Node
{
	public function __construct(
		public string $id
	) {
	}
}
