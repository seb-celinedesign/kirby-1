<?php

namespace Kirby\Blueprint;

/**
 * Model Option
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class ModelOption
{
	public array $permissions;

	public function __construct(
		bool|array|null $permissions = null
	)
	{
		// sanitize permissions
		$this->permissions = match (true) {
			// allow for all
			$permissions === true  => ['*' => true],
			// block for all
			$permissions === false => ['*' => false],
			// use global options
			$permissions === null  => ['*' => null],
			// custom array definition per role
			default => $permissions
		};
	}
}
