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
	public Reports|Promise $reports;
	public Size $size;
	public string $type = 'stats';

	public function __construct(
		string $id,
		Reports|Promise $reports = null,
		Size $size = null,
		...$args
	) {
		parent::__construct($id, ...$args);

		$this->reports = $reports ?? new Reports();
		$this->size    = $size    ?? new Size();
	}
}
