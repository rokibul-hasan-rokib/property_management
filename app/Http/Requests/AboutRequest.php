<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
            'quality' => 'required|string|max:255', // Validate quality field
            'rate' => 'required|string|max:255', // Validate rate field (can be numeric if needed)
            'security' => 'required|string|max:255', // Validate security field
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'An image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2MB.',
            'quality.required' => 'The quality field is required.',
            'rate.required' => 'The rate field is required.',
            'security.required' => 'The security field is required.',
        ];
    }
}
