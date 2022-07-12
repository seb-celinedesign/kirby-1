<?php

namespace Kirby\Blueprint;

class TableColumn extends Node
{
	public TableColumnAlignment $align;
	public Label $label;
	public bool $mobile;
	public string|null $type;
	public string|null $value;
	public string|null $width;

	public function __construct(
		string $id,
		TableColumnAlignment $align = null,
		Label $label = null,
		bool $mobile = false,
		string|null $type = null,
		string|null $value = null,
		string|null $width = null
	) {
		parent::__construct(
			id: $id
		);

		$this->align  = $align ?? new TableColumnAlignment();
		$this->label  = $label ?? Label::fallback($id);
		$this->mobile = $mobile;
		$this->type   = $type;
		$this->value  = $value;
		$this->width  = $width;
	}
}
