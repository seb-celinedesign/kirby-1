<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Base class for all saveable fields
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class InputField extends BaseField
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
	 * If true, the field has to be filled in correctly to be saved.
	 */
	public bool $required;

	/**
	 * If false, the field will be disabled in non-default languages and cannot be translated. This is only relevant in multi-language setups.
	 */
	public bool $translate;

	public function __construct(
		string $id,
		bool $autofocus = false,
		bool $disabled = false,
		bool $required = false,
		bool $translate = true,
		...$args
	) {
		parent::__construct($id, ...$args);

		$this->autofocus = $autofocus;
		$this->disabled  = $disabled;
		$this->required  = $required;
		$this->translate = $translate;
	}

}
