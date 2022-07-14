<?php

namespace Kirby\Blueprint;

/**
 * Stats section
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class StatsSection extends BaseSection
{
	public function __construct(
		public string $id,
		public Reports|Promise|null $reports = null,
		public Size|null $size = null,
		...$args
	) {
		parent::__construct($id, ...$args);
	}
}
