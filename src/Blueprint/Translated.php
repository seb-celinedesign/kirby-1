<?php

namespace Kirby\Blueprint;

use Kirby\Toolkit\I18n;

/**
 * Translatable Blueprint Option
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Translated extends Property
{
	public array $translations;

	public function __construct(string|array|null $value = null, string|null $default = null)
	{
		$this->translations = match (true) {
			// nothing provided
			$value === null => [],

			// from string
			is_string($value) === true => ['en' => $value],

			// from array
			default => $value
		};

		// current language
		$locale = I18n::locale();

		// inject language from translation file
		if (isset($this->translations['*']) === true) {
			$this->translations = [
				$locale => I18n::translate($this->translations['*'])
			];
		}

		$this->default = $default;
		$this->value   =
			$this->translations[$locale] ??
			$this->translations['en'] ??
			$this->default;
	}
}
