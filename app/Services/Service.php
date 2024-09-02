<?php

namespace App\Services;

use Illuminate\Support\Facades\Schema;

class Service
{
    /**
     * Stores the model used for service.
     *
     * @var Eloquent object
     */
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    // get all data

    public function getAllData($data, $selectedColumns = [], $pagination = true)
    {
        $keyword = $data->get('keyword');
        $show = $data->get('show');
        $query = $this->query();
        if (count($selectedColumns) > 0) {
            $query->select($selectedColumns);
        }
        $table = $this->model->getTable();
        if ($keyword) {
            if (Schema::hasColumn($table, 'name')) {
                $query->orWhereRaw('LOWER(name) LIKE ?', ['%'.strtolower($keyword).'%']);
            }
            if (Schema::hasColumn($table, 'title')) {
                $query->orWhereRaw('LOWER(title) LIKE ?', ['%'.strtolower($keyword).'%']);
            }
        }
        if ($pagination) {
            return $query->orderBy('created_at', 'DESC')->paginate($show ?? 10);
        } else {
            return $query->orderBy('created_at', 'DESC')->get();
        }
    }

    // find model by its identifier

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function first()
    {
        return $this->model->first();
    }

    // store single record

    public function store($request)
    {
        $data = $request->except('_token');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['image'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['logo'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
        }

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['banner'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
        }

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['thumbnail_image'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
        }

        return $this->model->create($data);
    }

    // update record

    public function update($request, $id)
    {
        $data = $request->except('_token');
        $update = $this->itemByIdentifier($id);
        $imagePath = $update->image ?? null;
        $logoPath = $update->logo ?? null;
        $bannerPath = $update->banner ?? null;
        $thumbnailImage = $update->thumbnail_image ?? null;
        if ($request->hasFile('image')) {
            if ($imagePath && file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['image'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
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

        if ($request->hasFile('banner')) {
            if ($bannerPath && file_exists(public_path($bannerPath))) {
                unlink(public_path($bannerPath));
            }
            $file = $request->file('banner');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['banner'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
        }

        if ($request->hasFile('thumbnail_image')) {
            if ($thumbnailImage && file_exists(public_path($thumbnailImage))) {
                unlink(public_path($thumbnailImage));
            }

            $file = $request->file('thumbnail_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path(getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model)))), $filename);
            $data['thumbnail_image'] = getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/'.$filename;
        }

        $update->fill($data)->save();
        $update = $this->itemByIdentifier($id);

        return $update;
    }

    // delete a record

    public function delete($request, $id)
    {
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

    // Get intem by its identifier

    public function itemByIdentifier($id)
    {
        return $this->model->findOrFail($id);
    }

    // Data for index page

    public function indexPageData($request)
    {
        return [
            'thisDatas' => $this->getAllData($request),
        ];
    }

    // Data for create page

    public function createPageData($request)
    {
        return [];
    }

    // Data for edit page
    public function editPageData($request, $id)
    {
        return [
            'thisData' => $this->itemByIdentifier($id),
        ];
    }

    // get query for modal

    public function query()
    {
        return $this->model->query();
    }
}
