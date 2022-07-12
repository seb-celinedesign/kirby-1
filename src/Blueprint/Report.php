<?php

namespace Kirby\Blueprint;

/**
 * Report
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Report extends Component
{
	public Text $info;
	public Label $label;
	public Url $link;
	public Theme $theme;
	public Text $value;

	public function __construct(
		string $id,
		Text $info = null,
		Label $label = null,
		Url $link = null,
		Theme $theme = null,
		Text $value = null,
	) {
		$this->id    = $id;
		$this->info  = $info  ?? new Text();
		$this->label = $label ?? Label::fallback($id);
		$this->link  = $link  ?? new Url();
		$this->theme = $theme ?? new Theme();
		$this->value = $value ?? new Text();
	}
}
