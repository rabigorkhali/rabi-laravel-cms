<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ResourceController;
use App\Services\PageService;
use App\Services\UserService;

class PageController extends ResourceController
{
    public function __construct(private readonly PageService $thisService)
    {
        parent::__construct($thisService);
    }

    public function storeValidationRequest()
    {
        return 'App\Http\Requests\System\PageRequest';
    }

    public function moduleName()
    {
        return 'pages';
    }

    public function viewFolder()
    {
        return 'backend.system.page';
    }

}
