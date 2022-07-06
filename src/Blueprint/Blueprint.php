<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * The main blueprint class
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Blueprint extends Node
{
	public Tabs $tabs;
	public Label $title;
	public string $type;

	public function __construct(
		ModelWithContent $model,
		string $id,
		string $type,
		string|array|null $title = null,
		array $tabs = []
	) {
		parent::__construct(
			id: $id,
			model: $model
		);

		$this->title = new Label($this, $title);
		$this->tabs  = new Tabs($this, $tabs);
		$this->type  = $type;
	}
}
