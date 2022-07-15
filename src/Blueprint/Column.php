<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Column
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Column extends Node
{
	public function __construct(
		public string $id,
		public Width|null $width = null,
		public Sections|null $sections = null
	) {
	}

	public function fields(): ?Fields
	{
		return $this->sections?->fields();
	}

	/**
	 * Columns can define fields without a proper
	 * wrapping fields section. The polyfill will
	 * automatically wrap the fields.
	 */
	public static function polyfill(array $props): array
	{
		$props = Blueprint::polyfillFields($props);

		return parent::polyfill($props);
	}

	public function render(ModelWithContent $model): array
	{
		return [
			'sections' => $this->sections?->render($model) ?? [],
			'width'    => $this->width?->value ?? '1/1'
		];
	}
}
