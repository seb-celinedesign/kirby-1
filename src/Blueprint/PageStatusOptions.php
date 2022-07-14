<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Page Status Options
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PageStatusOptions extends Component
{
	public function __construct(
		public PageStatusOption|null $draft    = null,
		public PageStatusOption|null $unlisted = null,
		public PageStatusOption|null $listed   = null
	) {
		$this->draft    ??= new PageStatusOption('draft');
		$this->unlisted ??= new PageStatusOption('unlisted');
		$this->listed   ??= new PageStatusOption('listed');
	}

	public static function factory(array $props): static
	{
		foreach ($props as $id => $option) {
			$props[$id] = PageStatusOption::prefab($id, $option);
		}

		return new static(...$props);
	}

	public function render(ModelWithContent $model): array|false
	{
		return array_filter([
			'draft'    => $this->draft?->render($model),
			'unlisted' => $this->unlisted?->render($model),
			'listed'   => $this->listed?->render($model),
		]);
	}
}
