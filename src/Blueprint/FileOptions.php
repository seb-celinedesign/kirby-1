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
	public ModelOption $changeName;
	public ModelOption $create;
	public ModelOption $delete;
	public ModelOption $read;
	public ModelOption $replace;
	public ModelOption $update;

	public function __construct(
		ModelOption $changeName = null,
		ModelOption $create = null,
		ModelOption $delete = null,
		ModelOption $read = null,
		ModelOption $replace = null,
		ModelOption $update = null,
	) {
		$this->changeName = $changeName ?? new ModelOption();
		$this->create     = $create ?? new ModelOption();
		$this->delete     = $delete ?? new ModelOption();
		$this->read       = $read ?? new ModelOption();
		$this->replace    = $replace ?? new ModelOption();
		$this->update     = $update ?? new ModelOption();
	}
}
