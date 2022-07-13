<?php

namespace Kirby\Blueprint;

/**
 * Node
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Node extends Component
{
	public function __construct(
		public string $id
	) {
	}
}
