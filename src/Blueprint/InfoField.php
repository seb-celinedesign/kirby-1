<?php

namespace Kirby\Blueprint;

/**
 * Info field
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class InfoField extends Field
{
	public Kirbytext $help;
	public Label $label;
	public Kirbytext $text;
	public Theme $theme;
	public string $type = 'info';

	public function __construct(
		Section $section,
		string $id,
		string|array|null $help = null,
		string|array|null $label = null,
		string|array|null $text = null,
		string|null $theme = null,
	) {
		parent::__construct(
			section: $section,
			id: $id
		);

		$this->help  = new Kirbytext($this->model, $help);
		$this->label = new Label($this, $label);
		$this->text  = new Kirbytext($this->model, $text);
		$this->theme = new Theme($theme);
	}
}
