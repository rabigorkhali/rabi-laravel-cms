<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ResourceController;
use App\Services\PostService;

class PostController extends ResourceController
{
    public function __construct(private readonly PostService $thisService)
    {
        parent::__construct($thisService);
    }

    public function storeValidationRequest()
    {
        return 'App\Http\Requests\System\PostRequest';
    }

    public function moduleName()
    {
        return 'posts';
    }

    public function viewFolder()
    {
        return 'backend.system.post';
    }

}
