<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

class ModelsSection extends BaseSection
{
	public TableColumns $columns;
	public Text $empty;
	public Image $image;
	public Text $info;
	public Layout $layout;
	public Related $parent;
	public Size $size;
	public Text $text;

	public function __construct(
		public string $id,
		Label $label = null,
		TableColumns $columns = null,
		Text $empty = null,
		public bool $flip = false,
		Help $help = null,
		Image $image = null,
		Text $info = null,
		Layout $layout = null,
		public int $limit = 20,
		public int|null $max = null,
		public int $min = 0,
		public int $page = 1,
		Related $parent = null,
		public bool $search = false,
		Size $size = null,
		public bool $sortable = true,
		public string|null $sortBy = null,
		Text $text = null
	) {
		parent::__construct(
			help: $help,
			id: $id,
			label: $label,
		);

		$this->columns = $columns ?? new TableColumns();
		$this->empty   = $empty   ?? new Text();
		$this->image   = $image   ?? new Image();
		$this->info    = $info    ?? new Text();
		$this->layout  = $layout  ?? new Layout();
		$this->parent  = $parent  ?? new Related();
		$this->size    = $size    ?? new Size();
		$this->text    = $text    ?? new Text();
	}

	public function render(ModelWithContent $model): array
	{
		return [
			'columns' => $this->columns->render($model),
			'empty'   => $this->empty->render($model),
			'help'    => $this->help->render($model),
			'layout'  => $this->layout->value,
			'size'    => $this->size->value,
		];
	}
}
