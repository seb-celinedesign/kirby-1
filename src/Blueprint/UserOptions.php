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
class UserOptions
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
		$this->changeEmail    = new ModelOption($changeEmail);
		$this->changeLanguage = new ModelOption($changeLanguage);
		$this->changeName     = new ModelOption($changeName);
		$this->changePassword = new ModelOption($changePassword);
		$this->changeRole     = new ModelOption($changeRole);
		$this->create         = new ModelOption($create);
		$this->delete         = new ModelOption($delete);
		$this->update         = new ModelOption($update);
	}
}
