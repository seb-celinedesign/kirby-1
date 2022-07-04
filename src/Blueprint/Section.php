<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Section
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Section extends Node
{
	/**
	 * @var \Kirby\Blueprint\Column
	 */
	public Column $column;

	/**
	 * @var \Kirby\Cms\ModelWithContent
	 */
	public ModelWithContent $model;

	/**
	 * @var string
	 */
	public string $type;

	/**
	 * @param \Kirby\Blueprint\Column $column
	 * @param string $id
	 * @param string $type
	 */
	public function __construct(
		Column $column,
		string $id,
		string $type,
	) {
		parent::__construct($id);

		$this->column = $column;
		$this->model  = $this->column->tab->blueprint->model;
		$this->type   = $type;
	}
}
