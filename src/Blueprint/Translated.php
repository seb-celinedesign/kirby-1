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
class Translated extends StringProperty
{
	public array $translations;

	public function __construct(string|array|null $value = null, string|null $default = null)
	{
		$translations = match (true) {
			// nothing provided
			$value === null => [],

			// from string
			is_string($value) === true => ['en' => $value],

			// from array
			default => $value
		};

		$this->default      = $default;
		$this->translations = $translations;
		$this->value        = $this->get(I18n::locale());
	}

	public function __get(string $name): ?string
	{
		return $this->get($name);
	}

	public function get(string $name): ?string
	{
		return $this->translations[$name] ?? $this->translations['en'] ?? $this->default;
	}
}
