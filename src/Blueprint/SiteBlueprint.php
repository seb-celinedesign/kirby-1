<?php

namespace Kirby\Blueprint;

use Kirby\Cms\Site;

/**
 * Site blueprint
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class SiteBlueprint extends Blueprint
{
	public function __construct(
		public SiteOptions|null $options = null,
		public Url|null $preview = null,
		...$args
	) {
		parent::__construct('site', ...$args);
	}
}
