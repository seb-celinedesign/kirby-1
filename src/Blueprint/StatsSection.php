<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Stats section
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class StatsSection extends BaseSection
{
	public const TYPE = 'stats';

	public function __construct(
		public string $id,
		public Reports|Promise|null $reports = null,
		public Size|null $size = null,
		...$args
	) {
		parent::__construct($id, ...$args);
	}

	public function render(ModelWithContent $model): array
	{
		return [
			'help'  => $this->help?->render($model),
			'label' => $this->label?->render($model)
		];
	}
}
