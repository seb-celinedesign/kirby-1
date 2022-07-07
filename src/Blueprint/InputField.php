<?php

namespace Kirby\Blueprint;

/**
 * Base class for all saveable fields
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class InputField extends Field
{
	/**
	 * Sets the focus on this field when the form loads. Only the first field with this option gets focused
	 */
	public bool $autofocus;

	/**
	 * If true, the field is no longer editable and will not be saved
	 */
	public bool $disabled;

	/**
	 * The field label can be set as string or associative array with translations
	 */
	public Label $label;

	/**
	 * Optional help text below the field
	 */
	public Kirbytext $help;

	/**
	 * If true, the field has to be filled in correctly to be saved.
	 */
	public bool $required;

	/**
	 * If false, the field will be disabled in non-default languages and cannot be translated. This is only relevant in multi-language setups.
	 */
	public bool $translate;

	public function __construct(
		/** required */
		Section $section,
		string $id,

		/** optional */
		bool $autofocus = false,
		bool $disabled = false,
		string|array|null $label = null,
		string|array|null $help = null,
		bool $required = false,
		bool $translate = true,
		array|null $when = null,
		string|null $width = null
	) {
		parent::__construct(
			id: $id,
			section: $section,
			when: $when,
			width: $width
		);

		$this->autofocus  = $autofocus;
		$this->disabled   = $disabled;
		$this->label      = new Label($this, $label);
		$this->help       = new Kirbytext($this->model, $help);
		$this->required   = $required;
		$this->translate  = $translate;
	}
}
