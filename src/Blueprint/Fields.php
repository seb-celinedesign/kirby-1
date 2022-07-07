<?php

namespace Kirby\Blueprint;

/**
 * Fields
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Fields extends Collection
{
	public const TYPE = Field::class;

	public static function factory(Section $section, array $fields = []): static
	{
		$collection = new static;

		foreach ($fields as $id => $field) {
			$field['section'] = $section;
			$field['id']    ??= $id;

			$field = Autoload::field($field);

			$collection->__set($field->id, $field);
		}

		return $collection;
	}
}
