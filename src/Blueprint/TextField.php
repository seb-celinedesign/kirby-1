<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

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
	/**
	 * Optional text that will be shown after the input
	 */
	public Text $after;

	/**
	 * Sets the HTML5 autocomplete mode for the input
	 */
	public string|null $autocomplete;

	/**
	 * Optional text that will be shown before the input
	 */
	public Text $before;

	/**
	 * The field value will be converted with the selected converter before the value gets saved. Available converters: `lower`, `upper`, `ucfirst`, `slug`
	 */
	public Converter $converter;

	/**
	 * Shows or hides the character counter in the top right corner
	 */
	public bool $counter;

	/**
	 * Default value for the field, which will be used when a page/file/user is created
	 */
	public string|null $default;

	/**
	 * Changes the email icon to something custom
	 */
	public Icon $icon;

	/**
	 * Maximum number of allowed characters
	 */
	public int|null $maxlength;

	/**
	 * Minimum number of required characters
	 */
	public int|null $minlength;

	/**
	 * A regular expression, which will be used to validate the input
	 */
	public string|null $pattern;

	/**
	 * Optional placeholder value that will be shown when the field is empty
	 */
	public Text $placeholder;

	/**
	 * If `false`, spellcheck will be switched off
	 */
	public bool $spellcheck;

	/**
	 * The field type is used to load the right component
	 */
	public string $type = 'text';

	/**
	 * The string value for the field
	 */
	public string|null $value;

	public function __construct(
		string $id,
		After $after = null,
		string|null $autocomplete = null,
		Before $before = null,
		Converter $converter = null,
		bool $counter = true,
		string|null $default = null,
		Icon $icon = null,
		int|null $maxlength = null,
		int|null $minlength = null,
		string|null $pattern = null,
		Placeholder $placeholder = null,
		bool $spellcheck = false,
		string|null $value = null,
		...$args
	) {
		parent::__construct($id, ...$args);

		$this->after        = $after ?? new After();
		$this->autocomplete = $autocomplete;
		$this->before       = $before ?? new Before();
		$this->converter    = $converter ?? new Converter();
		$this->counter      = $counter;
		$this->default      = $default;
		$this->icon         = $icon ?? new Icon();
		$this->maxlength    = $maxlength;
		$this->minlength    = $minlength;
		$this->pattern      = $pattern;
		$this->placeholder  = $placeholder ?? new Placeholder();
		$this->spellcheck   = $spellcheck;
		$this->value        = $value;
	}

	public function validate(ModelWithContent $model, $value): bool
	{
		return parent::validate($model, $value);
	}
}
