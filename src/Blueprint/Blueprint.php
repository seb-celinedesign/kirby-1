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
	/**
	 * @var \Kirby\Blueprint\Tabs
	 */
	public Tabs $tabs;

	/**
	 * @var \Kirby\Blueprint\Label
	 */
	public Label $title;

	/**
	 * @var string
	 */
	public string $type;

	/**
	 * @param \Kirby\Cms\ModelWithContent $model
	 * @param string $id
	 * @param string|array|null|null $title
	 * @param array $tabs
	 */
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
