<?php

namespace Kirby\Blueprint;

/**
 * User options
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class UserOptions extends ModelOptions
{
	public ModelOption $changeEmail;
	public ModelOption $changeLanguage;
	public ModelOption $changeName;
	public ModelOption $changePassword;
	public ModelOption $changeRole;
	public ModelOption $create;
	public ModelOption $delete;
	public ModelOption $update;

	public function __construct(
		bool|array|null $changeEmail = null,
		bool|array|null $changeLanguage = null,
		bool|array|null $changeName = null,
		bool|array|null $changePassword = null,
		bool|array|null $changeRole = null,
		bool|array|null $create = null,
		bool|array|null $delete = null,
		bool|array|null $update = null,
	) {
		$this->changeEmail    = ModelOption::factory($changeEmail);
		$this->changeLanguage = ModelOption::factory($changeLanguage);
		$this->changeName     = ModelOption::factory($changeName);
		$this->changePassword = ModelOption::factory($changePassword);
		$this->changeRole     = ModelOption::factory($changeRole);
		$this->create         = ModelOption::factory($create);
		$this->delete         = ModelOption::factory($delete);
		$this->update         = ModelOption::factory($update);
	}
}
