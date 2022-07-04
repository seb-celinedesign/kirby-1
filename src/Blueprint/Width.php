<?php

namespace Kirby\Blueprint;

class Width extends Enumeration
{
    public array $allowed = [
        '1/1',
        '1/2',
        '1/3',
        '1/4',
        '2/3',
        '3/4',
    ];

    public string|null $default = '1/1';
}
