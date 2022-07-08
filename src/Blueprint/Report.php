<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Report
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Report extends Node
{
	public Text $info;
	public Label $label;
	public Url $link;
	public Text $theme;
	public Text $value;

	public function __construct(
		ModelWithContent $model,
		string $id,
		string|array|null $info = null,
		string|array|null $label = null,
		string|array|null $link = null,
		string|array|null $theme = null,
		string|array|null $value = null,
	)
	{
		parent::__construct(
			model: $model,
			id: $id
		);

		$this->info  = new Text($model, $info);
		$this->label = new Label($this, $label);
		$this->link  = new Url($model, $link);
		$this->theme = new Text($model, $theme);
		$this->value = new Text($model, $value);
	}

	public static function factory(
		ModelWithContent $model,
		string $id,
		array|string $report
	): static
	{
		// resolve queries for reports
		if (is_string($report) === true) {
			$report = (array)$model->query($report);
		}

		return new Report($model, $report['id'] ?? $id, ...$report);
	}

}
