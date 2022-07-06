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

	public function __construct(
		/** required */
		Site $model,
		string $id,
		string $type,

		/** optional */
		array $options = [],
		array $tabs = [],
		string|array|null $title = null,
	) {
		parent::__construct(
			model: $model,
			id: $id,
			title: $title,
			tabs: $tabs,
			type: $type
		);

		$this->options = new SiteOptions(...$options);
	}
}
