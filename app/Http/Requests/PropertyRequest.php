<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'place'          => 'required|string|max:255',
            'image'          => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming image upload with validation
            'rent'           => 'required|numeric|min:0|max:999999.99',
            'house_details'  => 'required|string|max:255',
            'bed'            => 'integer|min:0',
            'washroom'       => 'integer|min:0',
            'belcony'        => 'integer|min:0',
            'kitchen'        => 'integer|min:1', // kitchen should be at least 1
        ];
    }

    public function messages()
    {
        return [
            'place.required'         => 'The place field is required.',
            'image.required'         => 'An image is required.',
            'image.image'            => 'The file must be an image.',
            'image.mimes'            => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'rent.required'          => 'The rent field is required.',
            'house_details.required' => 'House details are required.',
            'bed.integer'            => 'The bed count must be an integer.',
            'washroom.integer'       => 'The washroom count must be an integer.',
            'kitchen.integer'        => 'The kitchen count must be an integer.',
        ];
    }
}
