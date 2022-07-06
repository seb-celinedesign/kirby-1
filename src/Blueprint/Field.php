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
	 * The parent section
	 */
	public Section $section;

	/**
	 * The field type
	 */
	public string $type;

	/**
	 * Conditions when the field will be shown
	 *
	 * @since 3.1.0
	 */
	public array|null $when;

	/**
	 * The width of the field in the field grid. Available widths: 1/1, 1/2, 1/3, 1/4, 2/3, 3/4
	 */
	public Width $width;

	public function __construct(
		Section $section,
		string $id,
		string $type,
		array|null $when = null,
		string|null $width = null,
		bool $translate = true,
	) {
		parent::__construct(
			id: $id,
			model: $section->model
		);

		$this->section   = $section;
		$this->translate = $translate;
		$this->type      = $type;
		$this->when      = $when;
		$this->width     = new Width($width);
	}
}
