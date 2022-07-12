<?php

namespace Kirby\Blueprint;

/**
 * Base Field
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class BaseField extends Field
{
	public Help $help;
	public Label $label;

	public function __construct(
		string $id,
		Help $help = null,
		Label $label = null,
		When $when = null,
		Width $width = null,
	) {
		parent::__construct(
			id: $id,
			when: $when,
			width: $width
		);

		$this->help  = $help  ?? new Help();
		$this->label = $label ?? Label::fallback($id);
	}
}
