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
		Site $model,
		string $id,
		array $options = [],
		string|bool|null $preview = null,
		array $tabs = [],
		string|array|null $title = null,
	) {
		parent::__construct(
			id: $id,
			model: $model,
			tabs: $tabs,
			title: $title,
		);

		$this->options = new SiteOptions(...$options);
		$this->preview = Url::factory($model, $preview);
	}
}
