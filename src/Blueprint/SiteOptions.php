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
	public ModelOption $changeTitle;
	public ModelOption $update;

	public function __construct(
		ModelOption $changeTitle = null,
		ModelOption $update = null,
	) {
		$this->changeTitle = $changeTitle ?? new ModelOption();
		$this->update      = $update      ?? new ModelOption();
	}
}
