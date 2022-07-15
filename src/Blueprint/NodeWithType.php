<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Node with type
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class NodeWithType extends Node
{
	public const TYPE = 'node';

	public function render(ModelWithContent $model): array
	{
		$render = parent::render($model);

		// always add id and type to the result
		$render['id']   ??= $this->id;
		$render['type'] ??= static::TYPE;

		ksort($render);

		return $render;
	}
}
