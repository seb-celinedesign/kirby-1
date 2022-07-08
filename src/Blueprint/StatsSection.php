<?php

namespace Kirby\Blueprint;

/**
 * Stats section
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class StatsSection extends Section
{
	public Kirbytext $help;
	public Label $label;
	public Reports $reports;
	public Size $size;
	public string $type = 'stats';

	public function __construct(
		Column $column,
		string $id,
		string|array|null $help = null,
		string|array|null $label = null,
		string|array $reports = [],
		string|array|null $size = 'large',
	) {
		parent::__construct(
			column: $column,
			id: $id
		);

		$this->help    = new Kirbytext($this->model, $help);
		$this->label   = new Label($this, $label);
		$this->reports = Reports::factory($this->model, $reports);
		$this->size    = new Size($size);
	}
}
