<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Kirbytext option
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Kirbytext extends Text
{
	public function render(ModelWithContent $model): mixed
	{
		if ($value = parent::render($model)) {
			return $model->kirby()->kirbytext($value);
		}

		return $value;
	}
}
