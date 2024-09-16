<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => 'required|string',
            'password' => 'required|nullable|string|min:8|confirmed',
        ];
        return $validation;
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->current_password) {
                // Check if the current password matches the authenticated user's password
                if (!Hash::check($this->current_password, $this->user()->password)) {
                    $validator->errors()->add('current_password', 'The current password is incorrect.');
                }
            }
        });
    }

}
