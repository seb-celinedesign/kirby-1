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
	public Page $page;
	public PageStatusOption $draft;
	public PageStatusOption $unlisted;
	public PageStatusOption $listed;

	public function __construct(
		Page $page,
		string|array|bool|null $draft = null,
		string|array|bool|null $unlisted = null,
		string|array|bool|null $listed = null
	) {
		$this->page     = $page;
		$this->draft    = new PageStatusOption('draft', $draft);
		$this->unlisted = new PageStatusOption('unlisted', $unlisted);
		$this->listed   = new PageStatusOption('listed', $listed);

		if ($this->page->isHomeOrErrorPage() === true) {
			$this->draft->disabled = true;
		}
	}
}
