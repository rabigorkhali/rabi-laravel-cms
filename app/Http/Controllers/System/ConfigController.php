<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ResourceController;
use App\Services\ConfigService;

class ConfigController extends ResourceController
{
    public function __construct(private readonly ConfigService $configService)
    {
        parent::__construct($configService);
    }

    public function storeValidationRequest()
    {
        return 'App\Http\Requests\System\ConfigRequest';
    }

    public function moduleName()
    {
        return 'configs';
    }

    public function viewFolder()
    {
        return 'backend.system.config';
    }
    
}
