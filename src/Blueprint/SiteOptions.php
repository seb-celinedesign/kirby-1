<?php

namespace Kirby\Blueprint;

/**
 * Site options
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class SiteOptions extends ModelOptions
{
	public function __construct(
		public ModelOption|null $changeTitle = null,
		public ModelOption|null $update = null,
	) {
	}
}
