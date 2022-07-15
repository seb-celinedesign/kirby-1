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
	public const TYPE = 'user';

	public function __construct(
		public string $id,
		public Image|null $image = null,
		public Label|null $label = null,
		public UserOptions|null $options = null,
		public Permissions|null $permissions = null,
		public Tabs|null $tabs = null,
		...$args
	) {
		parent::__construct($id, ...$args);
	}
}
