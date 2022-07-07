<?php

namespace Kirby\Blueprint;

use Kirby\Toolkit\Str;

/**
 * Accept rules for uploaded files
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Accept
{
	use ArrayConverter;

	public array $extension;
	public int|null $maxheight;
	public int|null $maxsize;
	public int|null $maxwidth;
	public array $mime;
	public int|null $minheight;
	public int|null $minsize;
	public int|null $minwidth;
	public string|null $orientation;
	public array $type;

	public function __construct(
		array|string|null $extension = null,
		int|null $maxheight = null,
		int|null $maxsize = null,
		int|null $maxwidth = null,
		array|string|null $mime = null,
		int|null $minheight = null,
		int|null $minsize = null,
		int|null $minwidth = null,
		string|null $orientation = null,
		array|string|null $type = null
	) {
		$this->extension   = Str::split($extension);
		$this->mime        = Str::split($mime);
		$this->maxheight   = $maxheight;
		$this->maxsize     = $maxsize;
		$this->maxwidth    = $maxwidth;
		$this->minheight   = $minheight;
		$this->minsize     = $minsize;
		$this->minwidth    = $minwidth;
		$this->orientation = $orientation;
		$this->type        = Str::split($type);
	}

	public static function factory(string|array $accept = [])
	{
		if (is_string($accept) === true) {
			$accept = ['mime' => $accept];
		}

		return new static(...$accept);
	}
}
