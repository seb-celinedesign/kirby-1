<?php

namespace Kirby\Blueprint;

use Kirby\Cms\File;
use Kirby\Cms\Page;
use Kirby\Cms\Site;
use Kirby\Cms\User;

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
		public Page|File|Site|User $model,
		public string|null $value = null,
		public bool $disabled = false
	) {
		$this->value = match (true) {
			// unset the value for disabled urls
			$disabled === true => null,

			// parse string queries
			is_string($value) === true => $model->toSafeString($value),

			// use the model url as default
			default => $model->url()
		};
	}

	public static function factory(
		Page|File|Site|User $model,
		string|bool|null $value = null,
		bool $disabled = false
	) {
		if ($value === false) {
			$disabled = true;
			$value    = null;
		}

		if ($value === true) {
			$value = null;
		}

		return new static(
			disabled: $disabled,
			model: $model,
			value: $value
		);
	}
}
