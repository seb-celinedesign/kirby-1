<?php

namespace Kirby\Blueprint;

/**
 * File options
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class FileOptions extends ModelOptions
{
	public function __construct(
		public ModelOption|null $changeName = null,
		public ModelOption|null $create = null,
		public ModelOption|null $delete = null,
		public ModelOption|null $read = null,
		public ModelOption|null $replace = null,
		public ModelOption|null $update = null,
	) {
	}
}
