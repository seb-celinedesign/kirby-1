<?php

namespace Kirby\Blueprint;

class Image
{
    public string $back;
    public bool $cover;
    public bool $disabled;
    public string|null $query;
    public string $ratio;

    public function __construct(array|string|bool $image = [])
    {
        if ($image === false) {
            $image = ['disabled' => true];
        }

        if ($image === true) {
            $image = [];
        }

        if (is_string($image) === true) {
            $image = ['query' => $image];
        }

        $this->back     = $image['back'] ?? 'black';
        $this->cover    = $image['cover'] ?? false;
        $this->disabled = $image['disabled'] ?? false;
        $this->query    = $image['query'] ?? null;
        $this->ratio    = $image['ratio'] ?? '1/1';
    }
}
