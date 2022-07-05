<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;
use Kirby\Exception\InvalidArgumentException;
use Kirby\Exception\NotFoundException;

/**
 * Related model option
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Related
{
	/**
	 * @var string|null
	 */
	public string|null $query;

	/**
	 * @var \Kirby\Cms\ModelWithContent
	 */
	public ModelWithContent $model;

	/**
	 * @var \Kirby\Cms\ModelWithContent
	 */
	public ModelWithContent $related;

	/**
	 * @param \Kirby\Cms\ModelWithContent $model
	 * @param string|null $query
	 */
	public function __construct(ModelWithContent $model, string|null $query = null)
	{
		$this->model = $model;
		$this->query = $query;

		if ($query === null) {
			$this->related = $model;
			return;
		}

		$related = $this->model->query($query);

		if (empty($related) === true) {
			throw new NotFoundException('The result for the query "' . $this->query . '" is empty');
		}

		if (is_a($related, ModelWithContent::class) === false) {
			throw new InvalidArgumentException('The result for the query "' . $this->query . '" is invalid. You must choose the site, a page, a file or a user.');
		}

		$this->related = $related;
	}
}
