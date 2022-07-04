<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;

class PageBlueprint extends Blueprint
{
    public string|null $num;
    public PageOptions $options;
    public PageStatus $status;

    public function __construct(
        /** Parent */
        ModelWithContent $model,
        string $id,
        string|array|null $title,
        array $tabs = [],

        /** Custom **/
        string|int|null $num = null,
        array $options = [],
        array $status = []
    ) {
        parent::__construct(
            model: $model,
            id: $id,
            title: $title,
            tabs: $tabs
        );

        $this->num     = $num;
        $this->options = new PageOptions($options);
        $this->status  = new PageStatus($model, ...$status);
    }
}
