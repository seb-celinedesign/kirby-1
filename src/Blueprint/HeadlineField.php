<?php

namespace Kirby\Blueprint;

/**
 * Headline field
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class HeadlineField extends BaseField
{
	public const TYPE = 'headline';

	public function __construct(
		public string $id,
		public bool $numbered = true,
		...$args
	) {
		parent::__construct($id, ...$args);
	}
}
