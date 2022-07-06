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
class SiteOptions
{
	public ModelOption $changeTitle;
	public ModelOption $update;

	public function __construct(
		bool|array|null $changeTitle = null,
		bool|array|null $update = null,
	) {
		$this->changeTitle = new ModelOption($changeTitle);
		$this->update      = new ModelOption($update);
	}
}
