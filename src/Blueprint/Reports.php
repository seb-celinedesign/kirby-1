<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Reports
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Reports extends Collection
{
	public const TYPE = Report::class;

	public static function factory(
		ModelWithContent $model,
		array|string $reports = []
	): static
	{
		$collection = new static;

		// resolve report queries
		if (is_string($reports) === true) {
			$reports = (array)$model->query($reports);
		}

		foreach ($reports as $id => $report) {
			$report = Report::factory($model, $id, $report);
			$collection->__set($report->id, $report);
		}

		return $collection;
	}
}
