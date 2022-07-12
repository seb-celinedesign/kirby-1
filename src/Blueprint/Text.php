<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Text option
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Text extends Translated
{
	public function render(ModelWithContent $model): mixed
	{
		if ($this->value !== null) {
			return $model->toSafeString($this->value);
		}

		return $this->value;
	}
}
