<?php

namespace App\Services;

use App\Models\Page;
use App\Models\Role;

class PageService extends Service
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }
}
