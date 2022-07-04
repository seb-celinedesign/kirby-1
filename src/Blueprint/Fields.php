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

	/**
	 * @param \Kirby\Blueprint\Section $section
	 * @param array $fields
	 */
	public function __construct(Section $section, array $fields = [])
	{
		foreach ($fields as $id => $field) {
			$field['section'] = $section;
			$field['id']    ??= $id;

			$field = Autoload::field($field);

			$this->__set($field->id, $field);
		}
	}
}
