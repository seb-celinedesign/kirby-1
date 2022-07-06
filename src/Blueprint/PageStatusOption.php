<?php

namespace Kirby\Blueprint;

use Kirby\Exception\InvalidArgumentException;
use Kirby\Toolkit\I18n;
use Kirby\Toolkit\Str;

/**
 * Page Status Option
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PageStatusOption
{
	public Translated $description;
	public bool $disabled;
	public string $id;
	public Translated $label;

	public function __construct(
		string $id,
		string|array|bool|null $option = null
	) {
		if (in_array($id, ['draft', 'unlisted', 'listed']) === false) {
			throw new InvalidArgumentException('The status must be draft, unlisted or listed');
		}

		$option = match (true) {
			// disabled
			$option === false => [
				'disabled' => true
			],
			// use default values for the status
			$option === null, $option === true => [
				'label'       => I18n::translate('page.status.' . $id),
				'description' => I18n::translate('page.status.' . $id . '.description')
			],
			// simple string for label
			is_string($option) === true => [
				'label' => $option,
			],
			// proper array definition
			default => $option
		};

		$this->id          = $id;
		$this->disabled    = $option['disabled'] ?? false;
		$this->label       = new Translated($option['label'] ?? Str::ucfirst($id));
		$this->description = new Translated($option['description'] ?? null);
	}
}
