<?php

namespace Kirby\Blueprint;

/**
 * Tabs
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Tabs extends Collection
{
	public const TYPE = Tab::class;

	public function __construct(Blueprint $blueprint, array $tabs = [])
	{
		foreach ($tabs as $id => $tab) {
			$tab['blueprint'] = $blueprint;
			$tab['id']      ??= $id;

			$this->__set($tab['id'], new Tab(...$tab));
		}
	}
}
