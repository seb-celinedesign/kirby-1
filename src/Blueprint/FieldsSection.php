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
	public string $type = 'fields';

	public function __construct(
		string $id,
		Fields $fields = null,
	) {
		$this->id     = $id;
		$this->fields = $fields ?? new Fields();
	}
}
