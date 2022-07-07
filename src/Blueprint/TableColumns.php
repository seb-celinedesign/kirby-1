<?php

namespace Kirby\Blueprint;

class TableColumns extends Collection
{
	public const TYPE = TableColumn::class;

	public function __construct(Section|Field $parent, array $columns = [])
	{
		foreach ($columns as $id => $column) {
			$column['parent'] = $parent;
			$column['id']   ??= $id;

			$column = new TableColumn(...$column);

			$this->__set($column->id, $column);
		}
	}
}
