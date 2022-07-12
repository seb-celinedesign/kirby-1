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
	public SiteOptions $options;
	public Url $preview;
	public string $type = 'site';

	public function __construct(
		Label $label = null,
		SiteOptions $options = null,
		Url $preview = null,
		Tabs $tabs = null,
	) {
		parent::__construct(
			id: 'site',
			label: $label,
			tabs: $tabs,
		);

		$this->options = $options ?? new SiteOptions();
		$this->preview = $preview ?? new Url();
	}
}
