<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

class Text extends Translated
{
	public bool $kirbytext;
	public ModelWithContent $model;

	public function __construct(ModelWithContent $model, string|array|null $value, bool $kirbytext = false)
	{
		parent::__construct($value);

		$this->kirbytext = $kirbytext;
		$this->model     = $model;

		if ($this->value === null) {
			return;
		}

		// resolve template strings
		$this->value = $this->model->toSafeString($this->value);

		// parse Kirbytext in the value
		if ($this->kirbytext === true) {
			$this->value = $this->model->kirby()->kirbytext($this->value);
		}
	}
}
