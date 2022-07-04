<?php

namespace Kirby\Blueprint;

class Tab
{
    public Blueprint $blueprint;
    public Columns $columns;
    public string|null $icon;
    public string $id;
    public Translated $label;

    public function __construct(
        Blueprint $blueprint,
        string $id,
        string|array|null $label = null,
        string|null $icon = null,
        array $columns = []
    ) {
        $this->blueprint = $blueprint;
        $this->columns   = new Columns($this, $columns);
        $this->icon      = $icon;
        $this->id        = $id;
        $this->label     = new Label($label, $id);
    }

}
