<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post_category_id' => 'required|exists:post_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|max:300|unique:posts,slug,'.$this->id,
            'seo_title' => 'nullable|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|max:12400',
            'status' => 'required|integer|in:0,1',
        ];
    }
}
