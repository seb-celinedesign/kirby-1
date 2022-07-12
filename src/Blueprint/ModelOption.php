<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Model Option
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class ModelOption extends Component
{
	public function __construct(
		public array $permissions = ['*' => null]
	) {
	}

	public static function factory(array|bool|null $permissions = null): static
	{
		// sanitize permissions
		return new static(match (true) {
			// allow for all
			$permissions === true  => ['*' => true],
			// block for all
			$permissions === false => ['*' => false],
			// use global options
			$permissions === null  => ['*' => null],
			// custom array definition per role
			default => $permissions
		});
	}

	public function render(ModelWithContent $model): bool
	{
		// fetch the option for the current user
		if ($user = $model->kirby()->user()) {
			$role = $user->role()->id();

			return $this->permissions[$role] ?? $this->permissions['*'];
		}

		return false;
	}
}
