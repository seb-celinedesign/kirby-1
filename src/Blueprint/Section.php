<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

class Section
{
	public Column $column;
	public string $id;
	public ModelWithContent $model;
	public string $type;

	public function __construct(
		Column $column,
		string $id,
		string $type,
	) {
		$this->column = $column;
		$this->id     = $id;
		$this->model  = $this->column->tab->blueprint->model;
		$this->type   = $type;
	}
}
