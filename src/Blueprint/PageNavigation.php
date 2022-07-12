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
	public string|null $sortBy;
	public array|null $status;
	public array|null $template;

	public function __construct(
		string|null $sortBy = null,
		string|array|null $status = null,
		string|array|null $template = null
	) {
		$this->sortBy   = $sortBy;
		$this->status   = $this->option($status);
		$this->template = $this->option($template);
	}

	/**
	 * Converts multiple ways to write an option (string, wildcard, array)
	 * into a clean final array of options.
	 */
	public function option(array|string|null $option)
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
