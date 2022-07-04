<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

class Text extends Translated
{
    public function __construct(string|array|null $translations, ModelWithContent $model)
    {
        parent::__construct($translations);
    }
}
