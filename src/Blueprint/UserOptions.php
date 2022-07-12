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
		ModelOption $changeEmail = null,
		ModelOption $changeLanguage = null,
		ModelOption $changeName = null,
		ModelOption $changePassword = null,
		ModelOption $changeRole = null,
		ModelOption $create = null,
		ModelOption $delete = null,
		ModelOption $update = null,
	) {
		$this->changeEmail    = $changeEmail ?? new ModelOption();
		$this->changeLanguage = $changeLanguage ?? new ModelOption();
		$this->changeName     = $changeName ?? new ModelOption();
		$this->changePassword = $changePassword ?? new ModelOption();
		$this->changeRole     = $changeRole ?? new ModelOption();
		$this->create         = $create ?? new ModelOption();
		$this->delete         = $delete ?? new ModelOption();
		$this->update         = $update ?? new ModelOption();
	}
}
