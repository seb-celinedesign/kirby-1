<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Tab
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Tab extends Node
{
	public function __construct(
		public string $id,
		public Label|null $label = null,
		public Icon|null $icon = null,
		public Columns|null $columns = null
	) {
		$this->label ??= Label::fallback($id);
	}

	/**
	 * Collects all fields from all columns
	 */
	public function fields(): ?Fields
	{
		return $this->sections()?->fields();
	}

	public function render(ModelWithContent $model, bool $active = false): array
	{
		if ($active === true) {
			return [
				'columns' => $this->columns?->render($model),
				'id'      => $this->id,
			];
		}

		return [
			'icon'  => $this->icon?->value,
			'id'    => $this->id,
			'label' => $this->label->render($model)
		];
	}

	/**
	 * Tabs can use shortcuts for fields and sections
	 * without properly wrapping them in a fields section
	 * or columns. The polyfill will wrap them properly.
	 */
	public static function polyfill(array $props): array
	{
		$props = Blueprint::polyfillFields($props);
		$props = Blueprint::polyfillSections($props);

		return parent::polyfill($props);
	}

	/**
	 * Collects all sections from all columns
	 */
	public function sections(): ?Sections
	{
		return $this->columns?->sections();
	}
}
