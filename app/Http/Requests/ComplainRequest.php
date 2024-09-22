<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplainRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'number' => 'required|numeric',
            'flat' => 'required|string|max:255',
            'apartment' => 'required|string|max:255',
            'descriptions' => 'nullable|string',
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'number.required' => 'The number field is required.',
            'flat.required' => 'The flat field is required.',
            'apartment.required' => 'The apartment field is required.',
        ];
    }
}
