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
	public function __construct(
		public string $id,
		public Help|null $help = null,
		public Label|null $label = null,
		...$args,
	) {
		parent::__construct($id, ...$args);
		$this->label ??= Label::fallback($id);
	}
}
