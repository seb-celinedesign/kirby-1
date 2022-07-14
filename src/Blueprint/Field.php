<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Base field class
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Field extends Node
{
	public function __construct(
		public string $id,
		public When|null $when = null,
		public Width|null $width = null,
	) {
	}

	public function submit(ModelWithContent $model, mixed $value = null): mixed
	{
		return $value;
	}

	public function validate(ModelWithContent $model, mixed $value = null): bool
	{
		return true;
	}
}
