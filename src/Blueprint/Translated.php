<?php

namespace Kirby\Blueprint;

class Translated extends Property
{
    public array $translations;

    public function __construct(string|array|null $translations)
    {
        if ($translations === null) {
            $translations = [];
        }

        if (is_string($translations) === true) {
            $translations = ['en' => $translations];
        }

        $this->translations = $translations;
        $this->value        = $this->get('en');
    }

    public function __get(string $name): ?string
    {
        return $this->get($name);
    }

    public function get(string $name): ?string
    {
        return $this->translations[$name] ?? $this->translations['en'] ?? $this->default;
    }
}
