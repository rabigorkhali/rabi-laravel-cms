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
    protected $fullImageUploadPath;

    public function __construct($model)
    {
        $this->model = $model;
        $this->fullImageUploadPath=getImageUploadFirstLevelPath().'/'.strtolower(class_basename(get_class($this->model))).'/';
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
        if ($request->file('image')) {
            $data['image'] = $this->fullImageUploadPath . uploadImage($this->fullImageUploadPath, 'image', true, 300, null);
        }

        if ($request->file('logo')) {
            $data['logo'] = $this->fullImageUploadPath . uploadImage($this->fullImageUploadPath, 'logo', true, 300, null);
        }

        if ($request->file('banner')) {
            $data['banner'] = $this->fullImageUploadPath . uploadImage($this->fullImageUploadPath, 'banner', true, 300, null);
        }

        if ($request->file('thumbnail_image')) {
            $data['thumbnail_image'] = $this->fullImageUploadPath . uploadImage($this->fullImageUploadPath, 'thumbnail_image', true, 300, null);
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
                removeImage($imagePath);
            }
            $data['image'] = $this->fullImageUploadPath . uploadImage($this->fullImageUploadPath, 'image', true, 300, null);
        }
        if ($request->hasFile('logo')) {
            if ($logoPath && file_exists(public_path($logoPath))) {
                removeImage($logoPath);
            }
            $data['logo'] = $this->fullImageUploadPath . uploadImage($this->fullImageUploadPath, 'logo', true, 300, null);
        }
        if ($request->hasFile('banner')) {
            if ($bannerPath && file_exists(public_path($bannerPath))) {
                removeImage($bannerPath);
            }
            $data['banner'] = $this->fullImageUploadPath . uploadImage($this->fullImageUploadPath, 'banner', true, 300, null);
        }
        if ($request->hasFile('thumbnail_image')) {
            if ($thumbnailImage && file_exists(public_path($thumbnailImage))) {
                removeImage($thumbnailImage);
            }
            $data['thumbnail_image'] = $this->fullImageUploadPath . uploadImage($this->fullImageUploadPath, 'thumbnail_image', true, 300, null);
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
            removeImage($imagePath);
        }
        if ($logoPath && file_exists(public_path($logoPath))) {
            removeImage($logoPath);
        }
        if ($bannerPath && file_exists(public_path($bannerPath))) {
            removeImage($bannerPath);
        }
        if ($thumbnailImage && file_exists(public_path($thumbnailImage))) {
            removeImage($thumbnailImage);
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
