<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation = [
            'name' => 'required|max:255',
            'slug' => 'required|max:300|unique:post_categories,slug,'.$this->id,
            'status' => 'nullable|boolean',
        ];
        return $validation;
    }
}
