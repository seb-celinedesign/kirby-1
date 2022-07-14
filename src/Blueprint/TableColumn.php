<?php

namespace Kirby\Blueprint;

class TableColumn extends Node
{
	public function __construct(
		public string $id,
		public TableColumnAlignment|null $align = null,
		public Label|null $label = null,
		public bool $mobile = false,
		public string|null $type = null,
		public string|null $value = null,
		public string|null $width = null
	) {
		$this->label ??= Label::fallback($id);
	}
}
