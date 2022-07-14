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
	use Promising;

	public function __construct(
		public string|null $id = null,
		public Text|null $info = null,
		public Label|null $label = null,
		public Url|null $link = null,
		public Theme|null $theme = null,
		public Text|null $value = null,
	) {
		$this->label ??= Label::fallback($id);
	}
}
