<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ResourceController;
use App\Services\RoleService;
use App\Services\UserService;

class RoleController extends ResourceController
{
    public function __construct(private readonly RoleService $thisService)
    {
        parent::__construct($thisService);
    }

    public function storeValidationRequest()
    {
        return 'App\Http\Requests\System\RoleRequest';
    }

    public function moduleName()
    {
        return 'roles';
    }

    public function viewFolder()
    {
        return 'backend.system.role';
    }

}
