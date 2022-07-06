<?php

namespace Kirby\Blueprint;

use Kirby\Cms\Page;

/**
 * Page blueprint
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PageBlueprint extends Blueprint
{
	public PageNavigation $navigation;
	public string|null $num;
	public PageOptions $options;
	public PageStatus $status;

	public function __construct(
		/** required */
		Page $model,
		string $id,
		string $type,

		/** optional */
		string|array|bool|null $image = null,
		array $navigation = [],
		string|int|null $num = null,
		array $options = [],
		array $status = [],
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

		$this->image      = new Image($image);
		$this->navigation = new PageNavigation($model, ...$navigation);
		$this->num        = $num;
		$this->options    = new PageOptions(...$options);
		$this->status     = new PageStatus($model, ...$status);
	}
}
