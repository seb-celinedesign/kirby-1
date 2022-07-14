<?php

namespace Kirby\Blueprint;

/**
 * Tel field
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class TelField extends TextField
{
	public function __construct(...$args)
	{
		parent::__construct(...$args);

		$this->autocomplete ??= 'tel';
		$this->icon         ??= new Icon('phone');
	}
}
