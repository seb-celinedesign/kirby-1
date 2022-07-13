<?php

namespace Kirby\Blueprint;

use Kirby\Cms\Field;
use Kirby\Cms\ModelWithContent;
use Kirby\Exception\InvalidArgumentException;
use Kirby\Toolkit\A;

/**
 * Promise
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Promise
{
	public function __construct(
		public string $query,
		public string $class
	) {
	}

	public function render(ModelWithContent $model): mixed
	{
		return $this->resolve($model)->render($model);
	}

	public function resolve(ModelWithContent $model)
	{
		$class  = $this->class;
		$result = $model->query($this->query);

		// stringify content fields
		if (is_a($result, Field::class) === true) {
			$result = (string)$result;
		}

		// all other objects have to be the expected result
		if (is_object($result) === true) {
			if (is_a($result, $this->class) === false) {
				throw new InvalidArgumentException('The result of the query "' . $this->query . '" must be an instance of ' . $this->class . '. The query returned a ' . get_class($result) . ' object instead.');
			}

			return $result;
		}

		return $class::factory(A::wrap($result));
	}
}
