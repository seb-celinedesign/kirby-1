<?php

namespace Kirby\Blueprint;

class FieldsSection extends Section
{
	public Fields $fields;

	public function __construct(
		public Column $column,
		public string $id,
		string $type,
		array $fields = [],
	) {
		parent::__construct(
			column: $column,
			id: $id,
			type: $type
		);

		$this->fields = new Fields($this, $fields);
	}
}
