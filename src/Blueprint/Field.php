<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

class Field
{
    public string $id;
    public ModelWithContent $model;
    public Section $section;
    public string $type;

    public function __construct(
        Section $section,
        string $id,
        string $type,
    ) {
        $this->id      = $id;
        $this->model   = $section->model;
        $this->section = $section;
        $this->type    = $type;
    }
}
