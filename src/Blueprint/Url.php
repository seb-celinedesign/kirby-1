<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Url option with query string superpowers
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Url extends Property
{
	public function __construct(
		public string|null $value = null,
		public string|null $default = null,
		public bool $disabled = false
	) {
		parent::__construct(
			default: $default,
			value: $value
		);

		$this->disabled = $disabled;
	}

	public function render(ModelWithContent $model): string|false
	{
		if ($this->disabled === true) {
			return false;
		}

		if ($this->value !== null) {
			return $model->toSafeString($this->value);
		}

		return $this->value;
	}
}
