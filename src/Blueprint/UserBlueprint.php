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
		string $id,
		Image $image = null,
		Label $label = null,
		UserOptions $options = null,
		Permissions $permissions = null,
		Tabs $tabs = null,
	) {
		parent::__construct(
			id: $id,
			label: $label,
			tabs: $tabs,
		);

		$this->image       = $image ?? new Image();
		$this->options     = $options ?? new UserOptions();
		$this->permissions = $permissions ?? new Permissions();
	}
}
