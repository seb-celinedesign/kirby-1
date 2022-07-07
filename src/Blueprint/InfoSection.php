<?php

namespace Kirby\Blueprint;

/**
 * Info section
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class InfoSection extends Section
{
	public Kirbytext $help;
	public Label $label;
	public Kirbytext $text;
	public Theme $theme;
	public string $type = 'info';

	public function __construct(
		Column $column,
		string $id,
		string|array|null $help = null,
		string|array|null $label = null,
		string|array|null $text = null,
		string|null $theme = null,
	) {
		parent::__construct(
			column: $column,
			id: $id
		);

		$this->help  = new Kirbytext($this->model, $help);
		$this->label = new Label($this, $label);
		$this->text  = new Kirbytext($this->model, $text);
		$this->theme = new Theme($theme);
	}
}
