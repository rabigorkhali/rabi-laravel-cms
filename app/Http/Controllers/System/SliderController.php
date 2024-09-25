<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ResourceController;
use App\Services\PageService;
use App\Services\SliderService;
use App\Services\UserService;

class SliderController extends ResourceController
{
    public function __construct(private readonly SliderService $thisService)
    {
        parent::__construct($thisService);
    }

    public function storeValidationRequest()
    {
        return 'App\Http\Requests\System\SliderRequest';
    }

    public function moduleName()
    {
        return 'sliders';
    }

    public function viewFolder()
    {
        return 'backend.system.slider';
    }

}
