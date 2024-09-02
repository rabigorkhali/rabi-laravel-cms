<?php

namespace App\Services;

use App\Models\Config;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class UserService extends Service
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function indexPageData($request)
    {
        return [
            'roles' => Role::get(),
            'thisDatas' => $this->getAllData($request),
        ];
    }

    public function getAllData($data, $selectedColumns = [], $pagination = true)
    {
        $keyword = $data->get('keyword');
        $show = $data->get('show');
        $role = $data->get('role');
        $query = $this->query();
        if (count($selectedColumns) > 0) {
            $query->select($selectedColumns);
        }
        $table = $this->model->getTable();
        if ($keyword) {
            if (Schema::hasColumn($table, 'name')) {
                $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($keyword) . '%']);
            }
        }
        if ($role) {
            $query->where('role_id', $role);
        }
        if ($pagination) {
            return $query->orderBy('created_at', 'DESC')->paginate($show ?? 10);
        } else {
            return $query->orderBy('created_at', 'DESC')->get();
        }
    }

    public function createPageData($request)
    {
        return [
            'roles' => Role::get(),
        ];
    }

    // Data for edit page
    public function editPageData($request, $id)
    {
        return [
            'roles' => Role::get(),
            'thisData' => $this->itemByIdentifier($id),
        ];
    }

    public function store($request)
    {
        $data = $request->except('_token');
        $password = trim($request->get('password'));
        $data['password'] = bcrypt($password);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath() . '/' . strtolower(class_basename(get_class($this->model)))), $filename);
            $data['image'] = getImageUploadFirstLevelPath() . '/' . strtolower(class_basename(get_class($this->model))) . '/' . $filename;
        }
        return $this->model->create($data);
    }

    public function update($request, $id)
    {
        if ($id == authUser()->id) {
            $data = $request->except('_token', 'password', 'status', 'role_id');
        } else {
            $data = $request->except('_token', 'password');
        }
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

    public function delete($request, $id)
    {
        if ($id == authUser()->id) {
            $message['error']='You cannot delete yourself.';
            return $message;
        }
        $item = $this->itemByIdentifier($id);
        $imagePath = $item->image ?? null;
        $logoPath = $item->logo ?? null;
        $bannerPath = $update->banner ?? null;
        $thumbnailImage = $update->thumbnail_image ?? null;
        if ($imagePath && file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }
        if ($logoPath && file_exists(public_path($logoPath))) {
            unlink(public_path($logoPath));
        }
        if ($bannerPath && file_exists(public_path($bannerPath))) {
            unlink(public_path($bannerPath));
        }
        if ($thumbnailImage && file_exists(public_path($thumbnailImage))) {
            unlink(public_path($thumbnailImage));
        }
        return $item->delete();
    }

}
