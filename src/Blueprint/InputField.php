<?php

namespace Kirby\Blueprint;

class InputField extends Field
{
	public bool $autofocus;
	public bool $disabled;
	public Label $label;
	public Text $help;
	public bool $required;
	public bool $spellcheck;

	public function __construct(
		Section $section,
		string $id,
		string $type,

		/** custom props */
		bool $autofocus = false,
		string|array|null $label = null,
		string|array|null $help = null,
		bool $required = false,
		bool $spellcheck = false
	) {
		parent::__construct(
			section: $section,
			id: $id,
			type: $type
		);

		$this->autofocus = $autofocus;
		$this->label = new Label($label, $id);
		$this->help = new Text($help, $this->model);
		$this->required = $required;
		$this->spellcheck = $spellcheck;
	}
}
