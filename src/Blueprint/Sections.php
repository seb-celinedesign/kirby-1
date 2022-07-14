<?php

namespace Kirby\Blueprint;

/**
 * Sections
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Sections extends Collection
{
	public const TYPE = Section::class;

	public static function factory(array $sections = []): static
	{
		$collection = new static();
		$collection->data = Autoload::collection('section', $sections);

		return $collection;
	}

	/**
	 * Collect all fields in all sections
	 */
	public function fields(): Fields
	{
		$fields = new Fields();

		foreach ($this->data as $section) {
			if (is_a($section, FieldsSection::class) === false) {
				continue;
			}

			foreach ($section->fields ?? [] as $field) {
				$fields->__set($field->id, $field);
			}
		}

		return $fields;
	}
}
