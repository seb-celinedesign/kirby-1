<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;
use Kirby\Validation\Validations;

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
	public const TYPE = 'input';

	public function __construct(
		public string $id,
		public bool $autofocus = false,
		public bool $disabled = false,
		public bool $required = false,
		public bool $translate = true,
		public Validations|null $validations = null,
		...$args
	) {
		parent::__construct($id, ...$args);

		$this->validations ??= new Validations();
		$this->validations->add('required', $this->required);
	}

	public function validate(ModelWithContent $model, mixed $value = null): bool
	{
		// don't validate at all if the field does not have any validations
		if ($this->validations === null) {
			return true;
		}

		// only validate the required state when the value is empty
		if ($value === null) {
			return $this->validations->get('required')?->validate($value) ?? true;
		}

		return $this->validations->validate($value);
	}
}
