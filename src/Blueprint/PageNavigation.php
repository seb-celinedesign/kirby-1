<?php

namespace Kirby\Blueprint;

use Kirby\Cms\Page;

/**
 * Setup for the prev/next buttons in the Panel
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PageNavigation
{
	public Page $page;
	public string|null $sortBy;
	public array $status;
	public array $template;

	public function __construct(
		Page $page,
		string|null $sortBy = null,
		string|array|null $status = null,
		string|array|null $template = null
	)
	{
		$this->sortBy   = $sortBy;
		$this->status   = $this->option($status, $page->status());
		$this->template = $this->option($template, $page->intendedTemplate()->name());
	}

	/**
	 * Converts multiple ways to write an option (string, wildcard, array)
	 * into a clean final array of options.
	 */
	public function option(array|string|null $option, string $default = null)
	{
		// convert given option to clean array
		return match (true) {
			// fallback
			$option === null => [$default],

			// wildcard
			$option === 'all', $option === '*' => ['*'],

			// wrap single option
			is_string($option) === true => [$option],

			// array of options
			default => $option
		};
	}
}
