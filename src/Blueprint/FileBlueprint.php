<?php

namespace Kirby\Blueprint;

use Kirby\Cms\File;

/**
 * File blueprint
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class FileBlueprint extends Blueprint
{
	public const TYPE = 'file';

	public function __construct(
		public string $id,
		public Accept|null $accept = null,
		public Image|null $image = null,
		public FileOptions|null $options = null,
		public Url|null $preview = null,
		public Tabs|null $tabs = null,
		...$args
	) {
		parent::__construct($id, ...$args);
	}
}
