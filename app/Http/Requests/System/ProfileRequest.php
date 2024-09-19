<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|max:255|unique:users,email,' . authUser()->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'mobile_number' => 'required|string|max:15|min:10',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|string|in:male,female,other',
            'address' => 'required|string|max:255',
        ];
        return $validation;
    }

}
