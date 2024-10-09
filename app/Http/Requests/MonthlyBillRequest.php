<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonthlyBillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',  // Validates if user_id exists in the users table
            'bill_name' => 'required|string|max:255',
            'bill_month' => 'required|date',  // Validates if it's a valid date
            'bill_house' => 'required|string|max:255',
            'bill_electrity' => 'required|string|max:255',
            'status' => 'nullable|in:0,1',  // Validates that status can be either 0 or 1
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
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user ID is invalid.',
            'bill_name.required' => 'The bill name is required.',
            'bill_month.required' => 'The bill month is required.',
            'bill_month.date' => 'The bill month must be a valid date.',
            'bill_house.required' => 'The bill house is required.',
            'bill_electrity.required' => 'The bill electricity is required.',
            'status.in' => 'The status must be either active (1) or inactive (0).',
        ];
    }
}