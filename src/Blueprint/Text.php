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
	/**
	 * @var \Kirby\Cms\ModelWithContent
	 */
	public ModelWithContent $model;

	/**
	 * @param \Kirby\Cms\ModelWithContent $model
	 * @param string|array|null $value
	 * @param string|null $default
	 */
	public function __construct(ModelWithContent $model, string|array|null $value = null, string|null $default = null)
	{
		parent::__construct($value, $default);

		$this->model = $model;

		// resolve template strings
		if ($this->value !== null) {
			$this->value = $this->model->toSafeString($this->value);
		}
	}
}
