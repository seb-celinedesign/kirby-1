<?php

namespace Kirby\Blueprint;

class TableColumn extends Node
{
	public Enumeration $align;
	public Label $label;
	public bool $mobile;
	public Section|Field $parent;
	public string|null $type;
	public string|null $value;
	public string|null $width;

	public function __construct(
		/** required */
		Section|Field $parent,
		string $id,

		/** optional */
		string|null $align = null,
		string|array|null $label = null,
		bool $mobile = false,
		string|null $type = null,
		string|null $value = null,
		string|null $width = null
	) {
		parent::__construct(
			model: $parent->model,
			id: $id
		);

		$this->align  = new Enumeration($align, ['left', 'center', 'right'], 'left');
		$this->label  = new Label($this, $label);
		$this->mobile = $mobile;
		$this->parent = $parent;
		$this->type   = $type;
		$this->value  = $value;
		$this->width  = $width;
	}
}
