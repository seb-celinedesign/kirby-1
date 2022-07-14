<?php

namespace Kirby\Blueprint;

/**
 * Page blueprint
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PageBlueprint extends Blueprint
{
	public function __construct(
		public string $id,
		public Image|null $image = null,
		public PageNavigation|null $navigation = null,
		public string|null $num = null,
		public PageOptions|null $options = null,
		public Url|null $preview = null,
		public PageStatusOptions|null $status = null,
		...$args
	) {
		parent::__construct($id, ...$args);
	}
}
