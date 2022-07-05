<?php

namespace Kirby\Blueprint;

class ModelsSection extends Section
{
	public TableColumns $columns;
	public Text $empty;
	public Kirbytext $help;
	public Label $label;
	public Layout $layout;
	public Related $parent;

	public function __construct(
		public Tab $tab,
		public string $id,
		string|array|null $label = null,
		array $columns = [],
		string|array|null $empty = null,
		public bool $flip = false,
		string|array|null $help = null,
		string|array|bool $image = [],
		string|array|null $info = null,
		string $layout = null,
		public int $limit = 20,
		public int|null $max = null,
		public int $min = 0,
		public int $page = 1,
		string|null $parent = null,
		public bool $search = false,
		string|null $size = null,
		public bool $sortable = true,
		public string|null $sortBy = null,
		string|array|null $text = null
	) {
		parent::__construct($tab, $id, $label);

		$this->columns = new TableColumns($columns);
		$this->empty   = new Text($this->model, $empty);
		$this->help    = new Kirbytext($this->model, $help);
		$this->image   = new Image($image);
		$this->info    = new Text($this->model, $info);
		$this->label   = new Label($this, $label);
		$this->layout  = new Layout($layout);
		$this->parent  = new Related($this->model, $parent);
		$this->size    = new Size($size);
		$this->text    = new Text($this->model, $text);
	}
}
