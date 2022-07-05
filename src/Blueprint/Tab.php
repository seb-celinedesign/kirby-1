<?php

namespace Kirby\Blueprint;

/**
 * Tab
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Tab extends Node
{
	/**
	 * @var \Kirby\Blueprint\Blueprint
	 */
	public Blueprint $blueprint;

	/**
	 * @var \Kirby\Blueprint\Columns
	 */
	public Columns $columns;

	/**
	 * @var string|null
	 */
	public string|null $icon;

	/**
	 * @var \Kirby\Blueprint\Translated
	 */
	public Translated $label;

	/**
	 * @param \Kirby\Blueprint\Blueprint $blueprint
	 * @param string $id
	 * @param string|array|null|null $label
	 * @param string|null|null $icon
	 * @param array $columns
	 */
	public function __construct(
		Blueprint $blueprint,
		string $id,
		string|array|null $label = null,
		string|null $icon = null,
		array $columns = []
	) {
		parent::__construct(
			id: $id,
			model: $blueprint->model,
		);

		$this->blueprint = $blueprint;
		$this->columns   = new Columns($this, $columns);
		$this->icon      = $icon;
		$this->id        = $id;
		$this->label     = new Label($this, $label);
	}
}
