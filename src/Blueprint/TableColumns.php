<?php

namespace Kirby\Blueprint;

class TableColumns extends Collection
{
	public const TYPE = TableColumn::class;

	public static function factory(Section|Field $parent, array $columns = []): static
	{
		$collection = new static;

		foreach ($columns as $id => $column) {
			$column['parent'] = $parent;
			$column['id']   ??= $id;

			$column = new TableColumn(...$column);

			$collection->__set($column->id, $column);
		}

		return $collection;
	}
}
