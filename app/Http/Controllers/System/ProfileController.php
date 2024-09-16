<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ResourceController;
use App\Http\Requests\System\ChangePasswordRequest;
use App\Services\ProfileService;
use Illuminate\Http\Request;

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
    public function changePassword()
    {
        try {
            $request = $this->defaultRequest();
            $request = app()->make($request);
            $data = $this->service->createPageData($request);
            $this->setModuleId($request->id);
            $data['breadcrumbs'] = $this->breadcrumbForForm('Change Password');
            return $this->renderView('change-password', $data);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong.']);
        }
    }
    public function changePasswordUpdate(ChangePasswordRequest $request)
    {
        try {
            $this->service->changePasswordUpdate($request);
            return redirect()->back()->withErrors(['success' => 'Password successfully updated.']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong.']);
        }
    }

}
