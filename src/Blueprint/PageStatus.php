<?php

namespace Kirby\Blueprint;

use Kirby\Cms\Page;

/**
 * Page Status
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PageStatus
{
	use Exporter;

	public PageStatusOption $draft;
	public PageStatusOption $unlisted;
	public PageStatusOption $listed;

	public function __construct(
		PageStatusOption $draft = null,
		PageStatusOption $unlisted = null,
		PageStatusOption $listed = null
	) {
		$this->draft    = $draft    ?? new PageStatusOption('draft');
		$this->unlisted = $unlisted ?? new PageStatusOption('unlisted');
		$this->listed   = $listed   ?? new PageStatusOption('listed');
	}

	public static function factory(array $props): static
	{
		foreach ($props as $id => $option) {
			$props[$id] = PageStatusOption::factory($id, $option);
		}

		return new static(...$props);
	}

}
