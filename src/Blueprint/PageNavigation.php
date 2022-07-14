<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Setup for the prev/next buttons in the Panel
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PageNavigation extends Component
{
	public function __construct(
		public string|null $sortBy = null,
		public array|null $status = null,
		public array|null $template = null
	) {
	}

	public static function factory(array $props): static
	{
		return new static(
			sortBy:   $props['sortBy'] ?? null,
			status:   static::factoryForOption($props['status']   ?? null),
			template: static::factoryForOption($props['template'] ?? null),
		);
	}

	/**
	 * Converts multiple ways to write an option (string, wildcard, array)
	 * into a clean final array of options.
	 */
	public static function factoryForOption(array|string|null $option): array|null
	{
		// convert given option to clean array
		return match (true) {
			// fallback
			$option === null => null,

			// wildcard
			$option === 'all', $option === '*' => ['*'],

			// wrap single option
			is_string($option) === true => [$option],

			// convert an empty option array into null
			empty($option) === true => null,

			// array of options
			default => $option
		};
	}

	public function render(ModelWithContent $model): mixed
	{
		// fill in the defaults from the page
		return [
			'sortBy'   => $this->sortBy,
			'status'   => $this->status   ?? [$model->status()],
			'template' => $this->template ?? [$model->intendedTemplate()->name()],
		];
	}
}
