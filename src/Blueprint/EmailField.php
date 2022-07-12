<?php

namespace Kirby\Blueprint;

use Kirby\Toolkit\I18n;

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
		$args['autocomplete'] ??= 'email';
		$args['icon']         ??= new Icon('email');
		$args['placeholder']  ??= new Placeholder(
			I18n::translate('email.placeholder')
		);

		parent::__construct(...$args);
	}
}
