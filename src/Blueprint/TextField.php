<?php

namespace Kirby\Blueprint;

class TextField extends InputField
{
	public Translated $after;
	public Translated $before;
	public string|null $converter;
	public bool $counter;
	public string|null $default;
	public string|null $icon;
	public int|null $maxlength;
	public int|null $minlength;
	public string|null $pattern;
	public string|null $value;

	public function __construct(
		Section $section,
		string $id,
		string $type,

		/** parent props */
		bool $autofocus = false,
		string|array|null $label = null,
		string|array|null $help = null,
		bool $required = false,
		bool $spellcheck = false,

		/** custom props */
		string|array|null $after = null,
		string|array|null $before = null,
		string|null $converter = null,
		bool $counter = true,
		string|null $default = null,
		string|null $icon = null,
		int|null $maxlength = null,
		int|null $minlength = null,
		string|null $pattern = null,
		string|null $value = null,
	) {
		parent::__construct(
			section: $section,
			id: $id,
			type: $type,
			autofocus: $autofocus,
			help: $help,
			label: $label,
			required: $required,
			spellcheck: $spellcheck
		);

		$this->after     = new Translated($after);
		$this->before    = new Translated($before);
		$this->converter = new Enumeration($converter, [null, 'lower', 'slug', 'ucfirst', 'upper']);
		$this->counter   = $counter;
		$this->default   = $default;
		$this->icon      = $icon;
		$this->maxlength = $maxlength;
		$this->minlength = $minlength;
		$this->pattern   = $pattern;
		$this->value     = $value;
	}
}
