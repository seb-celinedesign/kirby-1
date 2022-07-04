<?php

namespace Kirby\Blueprint;

use Kirby\Toolkit\Str;

class Label extends Translated
{
    public function __construct(string|array|null $translations, ?string $default = null)
    {
        if ($default !== null) {
            $this->default = Str::ucfirst($default);
        }

        parent::__construct($translations);
    }
}
