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
	/**
	 * @var \Kirby\Blueprint\Translated
	 */
	public Translated $text;

	/**
	 * @var string|integer|float|null
	 */
	public string|int|float|null $value;

	/**
	 * @param string|integer|float|null|null $value
	 * @param string|array|null|null $text
	 */
	public function __construct(string|int|float|null $value = null, string|array|null $text = null)
	{
		$this->value = $value;
		$this->text  = new Translated($text ?? $value);
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'text'  => $this->text->value,
			'value' => $this->value
		];
	}
}
