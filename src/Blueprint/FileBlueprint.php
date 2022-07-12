<?php

namespace Kirby\Blueprint;

use Kirby\Cms\File;

/**
 * File blueprint
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class FileBlueprint extends Blueprint
{
	public Accept $accept;
	public Image $image;
	public FileOptions $options;
	public Url $preview;
	public string $type = 'file';

	public function __construct(
		string $id,
		Accept $accept = null,
		Image $image = null,
		Label $label = null,
		FileOptions $options = null,
		Url $preview = null,
		Tabs $tabs = null,
	) {
		parent::__construct(
			id: $id,
			label: $label,
			tabs: $tabs
		);

		$this->accept  = $accept  ?? new Accept();
		$this->image   = $image   ?? new Image();
		$this->options = $options ?? new FileOptions();
		$this->preview = $preview ?? new Url();
	}
}
