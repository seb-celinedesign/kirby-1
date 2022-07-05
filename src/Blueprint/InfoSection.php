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
	/**
	 * @var \Kirby\Blueprint\Help
	 */
	public Help $help;

	/**
	 * @var \Kirby\Blueprint\Label
	 */
	public Label $label;

	/**
	 * @var \Kirby\Blueprint\Text
	 */
	public Text $text;

	/**
	 * @var \Kirby\Blueprint\Theme
	 */
	public Theme $theme;

	/**
	 * @param \Kirby\Blueprint\Column $column
	 * @param string $id
	 * @param string $type
	 * @param string|array|null|null $label
	 * @param string|array|null|null $text
	 * @param string|null|null $theme
	 */
	public function __construct(
		Column $column,
		string $id,
		string $type,
		string|array|null $help = null,
		string|array|null $label = null,
		string|array|null $text = null,
		string|null $theme = null,
	) {
		parent::__construct(
			column: $column,
			id: $id,
			type: $type
		);

		$this->help  = new Help($this, $help);
		$this->label = new Label($this, $label);
		$this->theme = new Theme($theme);

		// info block text
		$this->text = new Text(
			model: $this->model,
			value: $text,
			kirbytext: true
		);
	}
}
