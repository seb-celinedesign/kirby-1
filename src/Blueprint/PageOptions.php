<?php

namespace Kirby\Blueprint;

use Kirby\Cms\Page;

/**
 * Page options
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PageOptions extends ModelOptions
{
	public const ALIASES = [
		'status'   => 'changeStatus',
		'template' => 'changeTemplate',
		'title'    => 'changeTitle',
		'url'      => 'changeSlug',
	];

	public ModelOption $changeSlug;
	public ModelOption $changeStatus;
	public ModelOption $changeTemplate;
	public ModelOption $changeTitle;
	public ModelOption $create;
	public ModelOption $delete;
	public ModelOption $duplicate;
	public ModelOption $preview;
	public ModelOption $read;
	public ModelOption $update;

	public function __construct(
		ModelOption $changeSlug = null,
		ModelOption $changeStatus = null,
		ModelOption $changeTemplate = null,
		ModelOption $changeTitle = null,
		ModelOption $create = null,
		ModelOption $delete = null,
		ModelOption $duplicate = null,
		ModelOption $preview = null,
		ModelOption $read = null,
		ModelOption $update = null,
	) {
		$this->changeSlug     = $changeSlug ?? new ModelOption();
		$this->changeStatus   = $changeStatus ?? new ModelOption();
		$this->changeTemplate = $changeTemplate ?? new ModelOption();
		$this->changeTitle    = $changeTitle ?? new ModelOption();
		$this->create         = $create ?? new ModelOption();
		$this->delete         = $delete ?? new ModelOption();
		$this->duplicate      = $duplicate ?? new ModelOption();
		$this->preview        = $preview ?? new ModelOption();
		$this->read           = $read ?? new ModelOption();
		$this->update         = $update ?? new ModelOption();
	}
}
