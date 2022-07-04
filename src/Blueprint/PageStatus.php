<?php

namespace Kirby\Blueprint;

use Kirby\Cms\Page;

class PageStatus
{
	public Page $page;
	public PageStatusOption $draft;
	public PageStatusOption $unlisted;
	public PageStatusOption $listed;

	public function __construct(
		Page $page,
		string|array|null $draft = null,
		string|array|null $unlisted = null,
		string|array|null $listed = null
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
