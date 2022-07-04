<?php

namespace Kirby\Blueprint;

class Fields extends Collection
{
    const TYPE = Field::class;

    public function __construct(Section $section, array $fields = [])
    {
        foreach ($fields as $id => $field) {
            $field['section'] = $section;
            $field['id']    ??= $id;

            $field = Autoload::field($field);

            $this->__set($field->id, $field);
        }
    }
}
