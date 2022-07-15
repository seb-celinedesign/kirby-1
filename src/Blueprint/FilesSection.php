<?php

namespace Kirby\Blueprint;

/**
 * Files section
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class FilesSection extends ModelsSection
{
	public const TYPE = 'files';

	public function __construct(
		public string $id,
		public string|null $template,
		...$args
	) {
		parent::__construct($id, ...$args);
	}
}
