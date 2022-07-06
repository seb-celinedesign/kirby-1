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
	public Enumeration $converter;

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
	public string|null $icon;

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
	 *
	 */
	public string|null $value;

	public function __construct(
		/**	required */
		Section $section,
		string $id,
		string $type,

		/** optional */
		string|array|null $after = null,
		string|null $autocomplete = null,
		bool $autofocus = false,
		string|array|null $before = null,
		string|null $converter = null,
		bool $counter = true,
		string|null $default = null,
		bool $disabled = false,
		string|array|null $help = null,
		string|null $icon = null,
		string|array|null $label = null,
		int|null $maxlength = null,
		int|null $minlength = null,
		string|null $pattern = null,
		string|array|null $placeholder = null,
		bool $required = false,
		bool $spellcheck = false,
		bool $translate = true,
		string|null $value = null,
		array|null $when = null,
		string|null $width = null,
	) {
		parent::__construct(
			autofocus: $autofocus,
			disabled: $disabled,
			help: $help,
			id: $id,
			label: $label,
			required: $required,
			section: $section,
			translate: $translate,
			type: $type,
			when: $when,
			width: $width
		);

		$this->after        = new Text($this->model, $after);
		$this->autocomplete = $autocomplete;
		$this->before       = new Text($this->model, $before);
		$this->converter    = new Enumeration($converter, [null, 'lower', 'slug', 'ucfirst', 'upper']);
		$this->counter      = $counter;
		$this->default      = $default;
		$this->icon         = $icon;
		$this->maxlength    = $maxlength;
		$this->minlength    = $minlength;
		$this->pattern      = $pattern;
		$this->placeholder  = new Text($this->model, $placeholder);
		$this->spellcheck   = $spellcheck;
		$this->value        = $value;
	}
}
