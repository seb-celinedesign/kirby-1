<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

class ModelsSection extends BaseSection
{
	public const TYPE = 'models';

	public function __construct(
		public string $id,
		public TableColumns|null $columns = null,
		public Text|null $empty = null,
		public bool $flip = false,
		public Image|null $image = null,
		public Text|null $info = null,
		public Layout|null $layout = null,
		public int $limit = 20,
		public int|null $max = null,
		public int $min = 0,
		public int $page = 1,
		public Related|null $parent = null,
		public bool $search = false,
		public Size|null $size = null,
		public bool $sortable = true,
		public string|null $sortBy = null,
		public Text|null $text = null,
		...$args
	) {
		parent::__construct($id, ...$args);
	}

	public function render(ModelWithContent $model): array
	{
		return [
			'help'  => $this->help?->render($model),
			'label' => $this->label->render($model),
		];
	}
}
