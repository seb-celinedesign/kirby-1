<?php

namespace Kirby\Blueprint;

class Option
{
    public Translated $text;
    public Translated $value;

    public function __construct(string|array|null $value, string|array|null $text = null)
    {
        $this->value = new Translated($value);
        $this->text  = new Translated($text ?? $value);
    }

    public function toArray(): array
    {
        return [
            'text'  => $this->text->value,
            'value' => $this->value->value
        ];
    }
}
