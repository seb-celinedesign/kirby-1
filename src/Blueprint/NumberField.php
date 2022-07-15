<?php

namespace Kirby\Blueprint;

/**
 * Number field
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class NumberField extends InputField
{
	public const TYPE = 'number';

	public function __construct(
		public string $id,
		public After|null $after = null,
		public string|null $autocomplete = null,
		public Before|null $before = null,
		public int|float|null $default = null,
		public Icon|null $icon = null,
		public int|float|null $max = null,
		public int|float|null $min = null,
		public Placeholder|null $placeholder = null,
		public int|float|null $step = null,
		public int|float|null $value = null,
		...$args
	) {
		parent::__construct($id, ...$args);

		$this->validations->add('min', $this->min);
		$this->validations->add('max', $this->max);
	}
}
