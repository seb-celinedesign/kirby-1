<?php

namespace Kirby\Blueprint;

/**
 * Columns
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Columns extends Collection
{
	const TYPE = Column::class;

	/**
	 * @param \Kirby\Blueprint\Tab $tab
	 * @param array $columns
	 */
	public function __construct(Tab $tab, array $columns = [])
	{
		foreach ($columns as $id => $column) {
			$column['tab']  = $tab;
			$column['id'] ??= $id;

			$this->__set($column['id'], new Column(...$column));
		}
	}
}
