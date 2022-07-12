<?php

namespace Kirby\Blueprint;

/**
 * Page blueprint
 *
 * @package   Kirby Blueprint
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://opensource.org/licenses/MIT
 */
class PageBlueprint extends Blueprint
{
	public Image $image;
	public PageNavigation $navigation;
	public string|null $num;
	public PageOptions $options;
	public Url $preview;
	public PageStatusOptions $status;
	public string $type = 'page';

	public function __construct(
		string $id,
		Image $image = null,
		Label $label = null,
		PageNavigation $navigation = null,
		string|null $num = null,
		PageOptions $options = null,
		Url $preview = null,
		PageStatusOptions $status = null,
		Tabs $tabs = null,
	) {
		parent::__construct(
			id: $id,
			label: $label,
			tabs: $tabs
		);

		$this->image      = $image ?? new Image();
		$this->navigation = $navigation ?? new PageNavigation();
		$this->num        = $num;
		$this->options    = $options ?? new PageOptions();
		$this->preview    = $preview ?? new Url();
		$this->status     = $status ?? new PageStatusOptions();
	}
}
