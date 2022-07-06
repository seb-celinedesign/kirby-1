<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

class PageBlueprint extends Blueprint
{
	public string|null $num;
	public PageOptions $options;
	public PageStatus $status;

	public function __construct(
		/** required */
		ModelWithContent $model,
		string $id,
		string $type,

		/** optional */
		string|int|null $num = null,
		array $options = [],
		array $status = [],
		array $tabs = [],
		string|array|null $title = null,
	) {
		parent::__construct(
			model: $model,
			id: $id,
			title: $title,
			tabs: $tabs,
			type: $type
		);

		$this->num     = $num;
		$this->options = new PageOptions($options);
		$this->status  = new PageStatus($model, ...$status);
	}
}
