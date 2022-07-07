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
class FileOptions
{
	public ModelOption $changeName;
	public ModelOption $create;
	public ModelOption $delete;
	public ModelOption $read;
	public ModelOption $replace;
	public ModelOption $update;

	public function __construct(
		bool|array|null $changeName = null,
		bool|array|null $create = null,
		bool|array|null $delete = null,
		bool|array|null $read = null,
		bool|array|null $replace = null,
		bool|array|null $update = null,
	) {
		$this->changeName = ModelOption::factory($changeName);
		$this->create     = ModelOption::factory($create);
		$this->delete     = ModelOption::factory($delete);
		$this->read       = ModelOption::factory($read);
		$this->replace    = ModelOption::factory($replace);
		$this->update     = ModelOption::factory($update);
	}
}
