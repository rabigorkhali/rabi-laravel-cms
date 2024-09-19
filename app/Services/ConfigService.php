<?php

namespace App\Services;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Config;

class ConfigService extends Service
{
    public function __construct(Config $model)
    {
        parent::__construct($model);
    }

    public function indexPageData($request)
    {
        return [
            'thisData' => $this->first(),
            'id' => $this->model->max('id')
        ];
    }

    public function store($request)
    {
        $data = $request->except('_token');
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['logo'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
        }

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['favicon'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
        }
        if ($request->hasFile('bank_qr')) {
            $file = $request->file('bank_qr');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['bank_qr'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
        }

        return $this->model->create($data);
    }

    public function update($request, $id)
    {
        $data = $request->except('_token');
        $update = $this->itemByIdentifier($id);
        $faviconPath = $update->favicon ?? null;
        $logoPath = $update->logo ?? null;
        $bankQrPath = $update->bank_qr ?? null;
        if ($request->hasFile('favicon')) {
            if ($faviconPath && file_exists(public_path($faviconPath))) {
                unlink(public_path($faviconPath));
            }
            $file = $request->file('favicon');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['favicon'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
        }
        if ($request->hasFile('bank_qr')) {
            if ($bankQrPath && file_exists(public_path($bankQrPath))) {
                unlink(public_path($bankQrPath));
            }
            $file = $request->file('bank_qr');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['bank_qr'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
        }
        if ($request->hasFile('logo')) {
            if ($logoPath && file_exists(public_path($logoPath))) {
                unlink(public_path($logoPath));
            }
            $file = $request->file('logo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['logo'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
        }
        $update->fill($data)->save();
        $update = $this->itemByIdentifier($id);

        return $update;
    }

}
