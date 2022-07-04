<?php

namespace Kirby\Blueprint;

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
	 * @param string $id
	 */
	public function __construct(string $id)
	{
		$this->id = $id;
	}
}
