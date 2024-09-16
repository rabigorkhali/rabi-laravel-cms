<?php

namespace App\Services;

use App\Models\User;

class ProfileService extends Service
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function indexPageData($request)
    {
        return [
            'thisData' => authUser(),
            'id' => authUser()->id
        ];
    }
    public function update($request, $id)
    {
        $data = $request->except('_token', 'password');
        $password = trim($request->get('password'));
        if ($password) {
            $data['password'] = bcrypt($password);
        }
        $update = $this->itemByIdentifier($id);
        $imagePath = $update->image ?? null;
        $logoPath = $update->logo ?? null;
        if ($request->hasFile('image')) {
            if ($imagePath && file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath() . '/' . strtolower(class_basename(get_class($this->model)))), $filename);
            $data['image'] = getImageUploadFirstLevelPath() . '/' . strtolower(class_basename(get_class($this->model))) . '/' . $filename;
        }
        $update->fill($data)->save();
        $update = $this->itemByIdentifier($id);

        return $update;
    }

    public function changePasswordUpdate($request)
    {
        $password = trim($request->get('password'));
        if ($password) {
            $data['password'] = bcrypt($password);
        }
        $id= authUser()->id;
        $update = $this->itemByIdentifier($id);
        $update->fill($data)->save();
        $update = $this->itemByIdentifier($id);
        return $update;
    }
}
