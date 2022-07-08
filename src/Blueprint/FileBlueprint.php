<?php

namespace Kirby\Blueprint;

use Kirby\Cms\File;

/**
 * File blueprint
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class FileBlueprint extends Blueprint
{
	public Accept $accept;
	public Image $image;
	public FileOptions $options;
	public Url $preview;
	public string $type = 'file';

	public function __construct(
		/** required */
		File $model,
		string $id,

		/** optional */
		string|array $accept = [],
		string|array|bool|null $image = null,
		array $options = [],
		string|bool|null $preview = null,
		array $tabs = [],
		string|array|null $title = null,
	) {
		parent::__construct(
			model: $model,
			id: $id,
			title: $title,
			tabs: $tabs
		);

		$this->accept  = Accept::factory($accept);
		$this->image   = Image::factory($image);
		$this->options = new FileOptions(...$options);
		$this->preview = Url::factory($model, $preview, $model->url());
	}
}
