<?php

namespace Kirby\Blueprint;

use Kirby\Toolkit\I18n;
use ValueError;

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
			throw new ValueError('The status must be draft, unlisted or listed');
		}

		$option = match($option) {
			// disabled
			false => [
				'disabled' => true
			],
			// default
			null, true => [
				'label'       => I18n::translate('page.status.' . $id),
				'description' => I18n::translate('page.status.' . $id . '.description')
			],
			// simple string for label
			is_string($option) === true => [
				'label' => $option,
			]
		};

		$this->id          = $id;
		$this->disabled    = $option['disabled'] ?? false;
		$this->label       = new Translated($option['label'] ?? $id);
		$this->description = new Translated($option['description'] ?? null);
	}

}
