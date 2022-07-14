<?php

namespace Kirby\Blueprint;

/**
 * Email field
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class EmailField extends TextField
{
	public function __construct(...$args)
	{
		parent::__construct(...$args);

		$this->autocomplete ??= 'email';
		$this->icon         ??= new Icon('email');
		$this->placeholder  ??= new Placeholder(['*' => 'email.placeholder']);

		$this->validations->add('email');
	}
}
