<?php

namespace Kirby\Cms;

use Kirby\Http\Uri;
use Kirby\Toolkit\Str;

/**
 * Represents the uri protocol for an UUID
 *
 * ```
 * // pure UUIDs
 * site://
 * user://user-id
 * page://HhX1YtRR2ImG6h4
 * file://HhX1YtRR2ImG6h4
 * block://HhX1YtRR2ImG6h4
 * struct://HhX1YtRR2ImG6h4
 *
 * // mixed UUIDs for caching
 * page://HhX1YtRR2ImG6h4/filename.jpg
 * page://HhX1YtRR2ImG6h4/myField/AzX1YtTY2ImGh23
 * ```
 *
 * @package   Kirby Cms
 * @author    Nico Hoffmann <nico@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://getkirby.com/license
 */
class UuidProtocol extends Uri
{
	/**
	 * supported schemes
	 */
	public static array $schemes = [
		'site',
		'page',
		'file',
		'user',
		'block',
		'struct'
	];

	public function __construct($props = [], array $inject = [])
	{
		// treat `site://` differently:
		// there is no host for site type, rest is always the path
		if (
			is_string($props) === true &&
			Str::startsWith($props, 'site://') === true
		) {
			return parent::__construct([
				'scheme' => 'site',
				'host'   => '',
				'path' 	 => Str::after($props, 'site://')
			]);
		}

		return parent::__construct($props, $inject);
	}

	/**
	 * Custom base method to ensure that
	 * scheme is always included
	 */
	public function base(): string|null
	{
		return $this->scheme . '://' . $this->host;
	}

	/**
	 * Returns the UUIDv4 part of the UUID protocol
	 */
	public function host(): string|null
	{
		return $this->host;
	}

	/**
	 * Return the full UUID string
	 */
	public function toString(bool $scheme = true): string
	{
		$url = parent::toString();

		// correction for site protocols,
		// since site has no host
		$url = Str::replace($url, ':///', '://');

		if ($scheme === false) {
			$url = Str::after($url, '://');
		}

		return $url;
	}

	/**
	 * Returns the scheme as model type
	 */
	public function type(): string
	{
		return $this->scheme;
	}
}
