<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;
use Kirby\Toolkit\A;

/**
 * Property
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class Property extends Component
{
	public function __construct(
		public string|null $value = null,
		public string|null $default = null
	) {
	}

	public static function factory(string|array|null $props = null)
	{
		return new static(...A::wrap($props));
	}

	public function render(ModelWithContent $model): mixed
	{
		return $this->value ?? $this->default;
	}
}
