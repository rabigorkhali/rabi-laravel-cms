<?php

namespace App\Services;

use App\Models\PostCategory;

class PostCategoryService extends Service
{
    public function __construct(PostCategory $model)
    {
        parent::__construct($model);
    }
}
