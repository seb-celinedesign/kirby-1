<?php

namespace Kirby\Blueprint;

class InfoSection extends Section
{
	public Label $label;
	public Text $text;
	public Theme $theme;

	public function __construct(
		Column $column,
		string $id,
		string $type,
		string|array|null $label = null,
		string|array|null $text = null,
		string|null $theme = null,
	) {
		parent::__construct(
			column: $column,
			id: $id,
			type: $type
		);

		$this->label = new Label($this, $label);
		$this->text  = new Text($text, $this->model);
		$this->theme = new Theme($theme);
	}
}
