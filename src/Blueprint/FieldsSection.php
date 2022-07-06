<?php

namespace Kirby\Blueprint;

/**
 * Fields section
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class FieldsSection extends Section
{
	public Fields $fields;

	public function __construct(
		public Column $column,
		public string $id,
		string $type,
		array $fields = [],
	) {
		parent::__construct(
			column: $column,
			id: $id,
			type: $type
		);

		$this->fields = new Fields($this, $fields);
	}
}
