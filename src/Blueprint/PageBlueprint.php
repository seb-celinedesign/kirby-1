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
	public Image $image;
	public PageNavigation $navigation;
	public string|null $num;
	public PageOptions $options;
	public Url $preview;
	public PageStatus $status;
	public string $type = 'page';

	public function __construct(
		/** required */
		Page $model,
		string $id,

		/** optional */
		string|array|bool|null $image = null,
		array $navigation = [],
		string|int|null $num = null,
		array $options = [],
		string|bool|null $preview = null,
		array $status = [],
		array $tabs = [],
		string|array|null $title = null,
	) {
		parent::__construct(
			model: $model,
			id: $id,
			title: $title,
			tabs: $tabs
		);

		$this->image      = Image::factory($image);
		$this->navigation = new PageNavigation($model, ...$navigation);
		$this->num        = $num;
		$this->options    = new PageOptions(...$options);
		$this->preview    = Url::factory($model, $preview, $model->url());
		$this->status     = new PageStatus(...$status);

		if ($model->isHomeOrErrorPage() === true) {
			$this->status->draft->disabled = true;
		}
	}
}
