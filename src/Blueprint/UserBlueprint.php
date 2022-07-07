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
	public Permissions $permissions;
	public string $type = 'user';

	public function __construct(
		User $model,
		string $id,
		string|array|bool|null $image = null,
		array $options = [],
		array $permissions = [],
		array $tabs = [],
		string|array|null $title = null,
	) {
		parent::__construct(
			id: $id,
			model: $model,
			tabs: $tabs,
			title: $title,
		);

		$this->image       = Image::factory($image);
		$this->options     = new UserOptions(...$options);
		$this->permissions = new Permissions(...$permissions);
	}
}
