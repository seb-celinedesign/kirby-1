<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

/**
 * Base element for all blueprint features
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Node
{
	/**
	 * @var string
	 */
	public string $id;

	/**
	 * @var \Kirby\Cms\ModelWithContent
	 */
	public ModelWithContent $model;

	/**
	 * @param string $id
	 */
	public function __construct(string $id, ModelWithContent $model)
	{
		$this->id    = $id;
		$this->model = $model;
	}
}
