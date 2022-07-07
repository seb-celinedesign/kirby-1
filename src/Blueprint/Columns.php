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
	public const TYPE = Column::class;

	public static function factory(Tab $tab, array $columns = []): Columns
	{
		$collection = new static;

		foreach ($columns as $id => $column) {
			$column['tab']  = $tab;
			$column['id'] ??= $id;

			$collection->__set($column['id'], new Column(...$column));
		}

		return $collection;
	}
}
