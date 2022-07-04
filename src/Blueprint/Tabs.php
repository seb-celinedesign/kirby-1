<?php

namespace Kirby\Blueprint;

class Tabs extends Collection
{
	const TYPE = Tab::class;

	public function __construct(Blueprint $blueprint, array $tabs = [])
	{
		foreach ($tabs as $id => $tab) {
			$tab['blueprint'] = $blueprint;
			$tab['id']      ??= $id;

			$this->__set($tab['id'], new Tab(...$tab));
		}
	}
}
