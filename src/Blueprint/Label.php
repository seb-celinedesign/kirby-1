<?php

namespace Kirby\Blueprint;

use Kirby\Toolkit\Str;

/**
 * Node label
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Label extends Text
{
	public function __construct(
		Node $node,
		string|array|null $value = null
	) {
		parent::__construct(
			model: $node->model,
			value: $value,
			default: Str::ucfirst($node->id)
		);
	}
}
