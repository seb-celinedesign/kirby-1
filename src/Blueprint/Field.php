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
	 * @var \Kirby\Cms\ModelWithContent
	 */
	public ModelWithContent $model;

	/**
	 * @var \Kirby\Blueprint\Section
	 */
	public Section $section;

	/**
	 * @var string
	 */
	public string $type;

	/**
	 * @param \Kirby\Blueprint\Section $section
	 * @param string $id
	 * @param string $type
	 */
	public function __construct(
		Section $section,
		string $id,
		string $type,
	) {
		parent::__construct($id);

		$this->model   = $section->model;
		$this->section = $section;
		$this->type    = $type;
	}
}
