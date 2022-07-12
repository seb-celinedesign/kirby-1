<?php

namespace Kirby\Blueprint;

/**
 * Info section
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class InfoSection extends BaseSection
{
	public Kirbytext $text;
	public Theme $theme;
	public string $type = 'info';

	public function __construct(
		string $id,
		Kirbytext $text = null,
		Theme $theme = null,
		...$args
	) {
		parent::__construct($id, ...$args);

		$this->text  = $text  ?? new Kirbytext();
		$this->theme = $theme ?? new Theme();
	}
}
