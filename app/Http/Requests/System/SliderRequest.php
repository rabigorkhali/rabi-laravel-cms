<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:300',
            'banner' => 'required|image|max:10240',
            'position' => 'required|integer',
            'go_to_link' => 'nullable|url',
            'button_text' => 'nullable|string|max:50',
            'status' => 'required|boolean',
        ];
        if ($this->method() == 'PUT') {
            $validation['banner'] = 'nullable|image|max:10240';
        }
        return $validation;
    }

    public
    function messages()
    {
        return [
            'role_id.exists' => 'The selected role is invalid.',
        ];
    }

    /**
     * Custom attribute names for validation errors.
     *
     * @return array
     */
    public
    function attributes()
    {
        return [
            'role_id' => 'role',
        ];
    }
}
