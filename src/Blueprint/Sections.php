<?php

namespace Kirby\Blueprint;

use TypeError;

class Sections extends Collection
{
	const TYPE = Section::class;

	public function __construct(Column $column, array $sections = [])
	{
		foreach ($sections as $id => $section) {
			$section['column'] = $column;
			$section['id']   ??= $id;

			$section = Autoload::section($section);

			$this->__set($section->id, $section);
		}
	}
}
