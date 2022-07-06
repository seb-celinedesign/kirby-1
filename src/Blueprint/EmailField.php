<?php

namespace Kirby\Blueprint;

/**
 * Email field
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class EmailField extends TextField
{
	public function __construct(
		/**	required */
		Section $section,
		string $id,
		string $type,

		/** optional */
		string|array|null $after = null,
		string|null $autocomplete = 'email',
		bool $autofocus = false,
		string|array|null $before = null,
		string|null $default = null,
		bool $disabled = false,
		string|array|null $help = null,
		string|null $icon = 'email',
		string|array|null $label = null,
		int|null $maxlength = null,
		int|null $minlength = null,
		string|null $pattern = null,
		string|array|null $placeholder = 'email.placeholder',
		bool $required = false,
		bool $translate = true,
		string|null $value = null,
		array|null $when = null,
		string|null $width = null,
	)
	{
		parent::__construct(
			after: $after,
			autocomplete: $autocomplete,
			autofocus: $autofocus,
			before: $before,
			default: $default,
			disabled: $disabled,
			help: $help,
			icon: $icon,
			id: $id,
			label: $label,
			maxlength: $maxlength,
			minlength: $minlength,
			pattern: $pattern,
			placeholder: $placeholder,
			required: $required,
			section: $section,
			translate: $translate,
			type: $type,
			value: $value,
			when: $when,
			width: $width
		);
	}
}
