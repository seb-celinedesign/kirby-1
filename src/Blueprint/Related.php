<?php

namespace Kirby\Blueprint;

use Kirby\Cms\ModelWithContent;
use Kirby\Exception\InvalidArgumentException;
use Kirby\Exception\NotFoundException;

class Related
{
    public string|null $query;
    public ModelWithContent $model;
    public ModelWithContent $related;

    public function __construct(ModelWithContent $model, ?string $query = null)
    {
        $this->model = $model;
        $this->query = $query;

        if ($query === null) {
            $this->related = $model;
            return;
        }

        $this->related = $this->model->query($query);

        if (empty($this->related) === true) {
            throw new NotFoundException('The parent for the query "' . $this->query . '" cannot be found');
        }

        if (is_a($this->related, 'Kirby\Cms\ModelWithContent') === false) {
            throw new InvalidArgumentException('The parent is invalid. You must choose the site, a page, a file or user as parent.');
        }
    }
}
