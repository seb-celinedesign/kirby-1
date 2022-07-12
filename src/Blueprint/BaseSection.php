<?php

namespace Kirby\Blueprint;

/**
 * Base Section
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class BaseSection extends Section
{
	public Help $help;
	public Label $label;

	public function __construct(
		string $id,
		Help $help = null,
		Label $label = null
	) {
		parent::__construct($id);

		$this->help  = $help  ?? new Help();
		$this->label = $label ?? Label::fallback($id);
	}

	public static function polyfill(array $props): array
	{
		$props = parent::polyfill($props);

		// convert old headlines to labels
		if (isset($props['headline']) === true) {
			$props['label'] = $props['headline'];
			unset($props['headline']);
		}

		return $props;
	}
}
