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
	/**
	 * @param \Kirby\Cms\ModelWithContent $model
	 * @param string|array|null|null $value
	 */
	public function __construct(ModelWithContent $model, string|array|null $value = null)
	{
		parent::__construct(
			model: $model,
			value: $value
		);

		// parse kirbytext
		if ($this->value !== null) {
			$this->value = $this->model->kirby()->kirbytext($this->value);
		}
	}
}
