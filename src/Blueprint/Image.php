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
	public string $back;
	public string|null $color;
	public bool $cover;
	public bool $disabled;
	public string|null $icon;
	public string|null $query;
	public string $ratio;

	public function __construct(array|string|bool|null $image = null)
	{
		$image = match (true) {
			// default image setup
			$image === true, $image === null => [],

			// disabled image
			$image === false => [
				'disabled' => true
			],

			// image query
			is_string($image) === true => [
				'query' => $image
			],

			// array definition
			default => $image
		};

		$this->back     = $image['back']     ?? 'black';
		$this->color    = $image['color']    ?? null;
		$this->cover    = $image['cover']    ?? false;
		$this->disabled = $image['disabled'] ?? false;
		$this->icon     = $image['icon']     ?? null;
		$this->query    = $image['query']    ?? null;
		$this->ratio    = $image['ratio']    ?? '1/1';
	}
}
