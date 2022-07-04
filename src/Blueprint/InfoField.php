<?php

namespace Kirby\Blueprint;

class InfoField extends Field
{
    public Label $label;
    public Text $text;
    public Theme $theme;

    public function __construct(
        Section $section,
        string $id,
        string $type,
        string|array|null $label = null,
        string|array|null $text = null,
        string|null $theme = null,
    ) {
        parent::__construct($section, $id, $type);

        $this->label = new Label($label, $id);
        $this->text  = new Text($text, $this->model);
        $this->theme = new Theme($theme);
    }
}
