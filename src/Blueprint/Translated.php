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
	public string|null $default;

	public function __construct(string|array|null $translations = null, string|null $default = null)
	{
		if ($translations === null) {
			$translations = [];
		}

		if (is_string($translations) === true) {
			$translations = ['en' => $translations];
		}

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
