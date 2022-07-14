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

	public function __construct(
		public ModelOption|null $changeSlug = null,
		public ModelOption|null $changeStatus = null,
		public ModelOption|null $changeTemplate = null,
		public ModelOption|null $changeTitle = null,
		public ModelOption|null $create = null,
		public ModelOption|null $delete = null,
		public ModelOption|null $duplicate = null,
		public ModelOption|null $preview = null,
		public ModelOption|null $read = null,
		public ModelOption|null $update = null,
	) {
	}
}
