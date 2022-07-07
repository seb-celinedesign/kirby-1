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
	public PageStatusOption $draft;
	public PageStatusOption $unlisted;
	public PageStatusOption $listed;

	public function __construct(
		string|array|bool|null $draft = null,
		string|array|bool|null $unlisted = null,
		string|array|bool|null $listed = null
	) {
		$this->draft    = PageStatusOption::factory('draft', $draft);
		$this->unlisted = PageStatusOption::factory('unlisted', $unlisted);
		$this->listed   = PageStatusOption::factory('listed', $listed);
	}
}
