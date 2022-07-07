<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;
use Throwable;

/**
 * Base element for all blueprint features
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Node
{
	use ArrayConverter;

	public function __construct(
		public ModelWithContent $model,
		public string $id
	) {
	}
}
