<?php

namespace Kirby\Blueprint;

class Columns extends Collection
{
    const TYPE = Column::class;

    public function __construct(Tab $tab, array $columns = [])
    {
        foreach ($columns as $id => $column) {
            $column['tab']  = $tab;
            $column['id'] ??= $id;

            $this->__set($column['id'], new Column(...$column));
        }
    }
}
