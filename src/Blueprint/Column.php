<?php

namespace Kirby\Blueprint;

class Column
{
	public string $id;
	public Sections $sections;
	public Tab $tab;
	public Width $width;

	public function __construct(
		Tab $tab,
		string $id,
		string $width,
		array $sections = []
	) {
		$this->id       = $id;
		$this->tab      = $tab;
		$this->sections = new Sections($this, $sections);
		$this->width    = new Width($width);
	}
}
