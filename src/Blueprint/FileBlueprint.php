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

	public function __construct(
		/** required */
		File $model,
		string $id,
		string $type,

		/** optional */
		array $accept = [],
		string|array|bool|null $image = null,
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

		$this->accept  = new Accept(...$accept);
		$this->image   = new Image($image);
		$this->options = new FileOptions(...$options);
	}
}
