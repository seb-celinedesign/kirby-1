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
	/**
	 * The field type
	 */
	public string $type;

	public When $when;
	public Width $width;

	public function __construct(
		string $id,
		When $when = null,
		Width $width = null,
	) {
		$this->id    = $id;
		$this->when  = $when  ?? new When();
		$this->width = $width ?? new Width();
	}

	public function submit(ModelWithContent $model, $value)
	{
		return $value;
	}

	public function validate(ModelWithContent $model, $value): bool
	{
		return true;
	}
}
