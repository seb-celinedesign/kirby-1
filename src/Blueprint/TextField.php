<?php

namespace Kirby\Blueprint;

/**
 * Text field
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class TextField extends InputField
{
	public function __construct(
		string $id,
		public After|null $after = null,
		public string|null $autocomplete = null,
		public Before|null $before = null,
		public Converter|null $converter = null,
		public bool $counter = true,
		public string|null $default = null,
		public Icon|null $icon = null,
		public int|null $maxlength = null,
		public int|null $minlength = null,
		public string|null $pattern = null,
		public Placeholder|null $placeholder = null,
		public bool $spellcheck = false,
		public string|null $value = null,
		...$args
	) {
		parent::__construct($id, ...$args);

		$this->validations->add('maxlength', $this->maxlength);
		$this->validations->add('minlength', $this->minlength);
		$this->validations->add('match', $this->pattern);
	}
}
