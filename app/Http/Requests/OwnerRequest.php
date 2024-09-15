<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validates image upload
            'designation' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'image.required' => 'An image is required.',
            'image.image' => 'The file must be a valid image.',
            'designation.required' => 'The designation field is required.',
            'description.required' => 'The description field is required.',
        ];
    }
}
