<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

class Blueprint
{
    public ModelWithContent $model;
    public string $id;
    public Tabs $tabs;
    public Label $title;

    public function __construct(
        ModelWithContent $model,
        string $id,
        string|array|null $title,
        array $tabs = []
    ) {
        $this->id    = $id;
        $this->model = $model;
        $this->title = new Label($title, $id);
        $this->tabs  = new Tabs($this, $tabs);
    }

}
