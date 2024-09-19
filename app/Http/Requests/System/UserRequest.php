<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:users,email,' . $this->id,
            'password' => 'required|nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'mobile_number' => 'required|string|max:15|min:10',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|string|in:male,female,other',
            'country' => 'required|string|in:nepal,india',
            'address' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id',
        ];
        if ($this->method() == 'PUT' && $this->id == authUser()->id) {
            unset($validation['role_id']);
        }

        if ($this->method() == 'PUT') {
            $validation['password'] = 'nullable|string|min:8|confirmed';
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
