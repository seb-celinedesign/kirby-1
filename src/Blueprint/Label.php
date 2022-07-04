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
class Label extends Translated
{
	/**
	 * @param \Kirby\Blueprint\Node $node
	 * @param string|array|null|null $translations
	 */
	public function __construct(
		Node $node,
		string|array|null $translations = null,
	) {
		parent::__construct(
			translations: $translations,
			default: Str::ucfirst($node->id)
		);
	}
}
