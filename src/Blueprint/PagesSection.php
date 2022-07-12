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
	public PageStatus $status;
	public array $templates;
	public string $type = 'pages';

	public function __construct(
		string $id,
		PageStatus $status = null,
		array $templates = [],
		...$args
	)
	{
		parent::__construct($id, ...$args);

		$this->status    = $status ?? new PageStatus;
		$this->templates = $templates;
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
