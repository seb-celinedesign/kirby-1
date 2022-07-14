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
class Option extends Component
{
	public function __construct(
		public string|int|float $value,
		public Translated|null $text = null
	) {
		$this->text ??= new Translated($value);
	}

	public static function factory(array $props): static
	{
		return new static(
			// passing null will create an empty option
			value: $props['value'] ?? '',

			// only add the text if it's passed in the array
			text: isset($props['text']) ? new Translated($props['text']) : null
		);
	}
}
