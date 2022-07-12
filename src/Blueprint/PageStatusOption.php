<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;
use Kirby\Exception\InvalidArgumentException;
use Kirby\Toolkit\I18n;

/**
 * Page Status Option
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PageStatusOption extends Component
{
	public Text $description;
	public bool $disabled;
	public string $id;
	public Label $label;

	public function __construct(
		string $id,
		Text $description = null,
		bool $disabled = false,
		Label $label = null,
	) {
		if (in_array($id, ['draft', 'unlisted', 'listed']) === false) {
			throw new InvalidArgumentException('The status must be draft, unlisted or listed');
		}

		$this->id          = $id;
		$this->disabled    = $disabled;
		$this->label       = $label 	  ?? new Label(I18n::translate('page.status.' . $id));
		$this->description = $description ?? new Text(I18n::translate('page.status.' . $id . '.description'));
	}

	public static function prefab(string $id, array|string|bool|null $option = null): static
	{
		$option = match (true) {
			// disabled
			$option === false => [
				'disabled' => true
			],

			// use default values for the status
			$option === null, $option === true => [],

			// simple string for label. the description will be unset
			is_string($option) === true => [
				'label' 	  => $option,
				'description' => null
			],

			// already defined as array definition
			default => $option
		};

		$option['id'] = $id;

		return static::factory($option);
	}

	public function render(ModelWithContent $model): array|false
	{
		if ($this->disabled === true) {
			return false;
		}

		return [
			'description' => $this->description->render($model),
			'label'       => $this->label->render($model)
		];
	}
}
