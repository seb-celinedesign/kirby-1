<?php

namespace Kirby\Blueprint;

use Kirby\Cms\User;

/**
 * User blueprint
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class UserBlueprint extends Blueprint
{
	public Image $image;
	public UserOptions $options;

	public function __construct(
		/** required */
		User $model,
		string $id,
		string $type,

		/** optional */
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

		$this->image   = new Image($image);
		$this->options = new UserOptions(...$options);
	}
}
