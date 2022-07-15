<?php

namespace Kirby\Blueprint;

use Kirby\Toolkit\A;

/**
 * Pages section
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PagesSection extends ModelsSection
{
	public const TYPE = 'pages';

	public function __construct(
		public string $id,
		public PageStatus|null $status = null,
		public array $templates = [],
		...$args
	) {
		parent::__construct($id, ...$args);
	}

	public static function polyfill(array $props): array
	{
		// support single template option
		if (isset($props['template']) === true) {
			$props['templates'] = A::wrap($props['template']);
			unset($props['template']);
		}

		return parent::polyfill($props);
	}
}
