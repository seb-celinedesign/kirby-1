<?php

namespace Kirby\Blueprint;

/**
 * Image object for sections and fields
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Image
{
	/**
	 * @var string
	 */
	public string $back;

	/**
	 * @var boolean
	 */
	public bool $cover;

	/**
	 * @var boolean
	 */
	public bool $disabled;

	/**
	 * @var string|null
	 */
	public string|null $query;

	/**
	 * @var string
	 */
	public string $ratio;

	/**
	 * @param array $image
	 */
	public function __construct(array|string|bool $image = [])
	{
		if ($image === false) {
			$image = ['disabled' => true];
		}

		if ($image === true) {
			$image = [];
		}

		if (is_string($image) === true) {
			$image = ['query' => $image];
		}

		$this->back     = $image['back'] ?? 'black';
		$this->cover    = $image['cover'] ?? false;
		$this->disabled = $image['disabled'] ?? false;
		$this->query    = $image['query'] ?? null;
		$this->ratio    = $image['ratio'] ?? '1/1';
	}
}
