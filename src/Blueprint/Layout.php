<?php

namespace Kirby\Blueprint;

class Layout extends Enumeration
{
    public array $allowed = [
        'cards',
        'cardlets',
        'list',
        'table'
    ];

    public string|null $default = 'list';
}
