<?php

namespace Kirby\Blueprint;

use Kirby\Cms\Collection as BaseCollection;
use TypeError;

/**
 * Typed collection
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Collection extends BaseCollection
{
	/**
	 * The expected object type
	 */
	public const TYPE = Node::class;

	public function __construct(array $data = [])
	{
		$this->set($data);
	}

	public function __set(string $key, $value): void
	{
		if (is_a($value, static::TYPE) === false) {
			throw new TypeError('Each value in the collection must be an instance of ' . static::TYPE);
		}

		parent::__set($key, $value);
	}
}
