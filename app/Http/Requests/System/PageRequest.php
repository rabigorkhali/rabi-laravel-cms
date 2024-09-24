<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title' => 'required|max:255',
            'slug' => 'required|max:300|unique:pages,slug,'.$this->id,
            'body' => 'required|max:10000',
            'status' => 'nullable|boolean',
        ];
        return $validation;
    }
}
