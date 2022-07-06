<?php

namespace Kirby\Blueprint;

/**
 * Option for select fields, radio fields, etc
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Option
{
	public Translated $text;
	public string|int|float|null $value;

	public function __construct(string|int|float|null $value = null, string|array|null $text = null)
	{
		$this->value = $value;
		$this->text  = new Translated($text ?? $value);
	}

	public function toArray(): array
	{
		return [
			'text'  => $this->text->value,
			'value' => $this->value
		];
	}
}
