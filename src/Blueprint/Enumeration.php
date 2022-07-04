<?php

namespace Kirby\Blueprint;

use Kirby\Exception\InvalidArgumentException;

/**
 * Enumeration
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Enumeration extends Property
{
    public array $allowed = [];
    public string|null $default = null;
    public string|null $value;

    public function __construct(?string $value = null, array $allowed = null, string $default = null)
    {
        $args = func_num_args();

        if ($args > 1) {
            $this->allowed = $allowed;
        }

        if ($args === 3) {
            $this->default = $default;
        }

        $value ??= $this->default;

        if (in_array($value, $this->allowed) === false) {
            throw new InvalidArgumentException('The given value is not allowed. Allowed values: ' . implode(', ', $this->allowed));
        }

        $this->value = $value;
    }
}
