<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ResourceController;
use App\Services\ProfileService;

class ProfileController extends ResourceController
{
    public function __construct(private readonly ProfileService $ProfileService)
    {
        parent::__construct($ProfileService);
    }

    public function storeValidationRequest()
    {
        return 'App\Http\Requests\System\ProfileRequest';
    }

    public function moduleName()
    {
        return 'profile';
    }

    public function viewFolder()
    {
        return 'backend.system.profile';
    }

}
