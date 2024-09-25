<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ResourceController;
use App\Services\PostCategoryService;

class PostCategoryController extends ResourceController
{
    public function __construct(private readonly PostCategoryService $thisService)
    {
        parent::__construct($thisService);
    }

    public function storeValidationRequest()
    {
        return 'App\Http\Requests\System\PostCategoryRequest';
    }

    public function moduleName()
    {
        return 'post-categories';
    }

    public function viewFolder()
    {
        return 'backend.system.post-category';
    }

}
