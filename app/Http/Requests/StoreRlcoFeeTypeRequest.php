<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRlcoFeeTypeRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'applicable_to' => 'integer|min:1',
            'order' => 'integer|min:0',
            'status' => 'required|boolean', // Accepts 0 or 1 for boolean
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Title is required.',
            'name.max' => 'Title cannot exceed 255 characters.',
            'description.max' => 'Description cannot exceed 255 characters.',
            'applicable_to.integer' => 'Applicable is required.',
            'applicable_to.min' => 'Applicable is required.',
            'order.integer' => 'Order must be a valid integer.',
            'order.min' => 'Order cannot be less than 0.',
            'status.required' => 'Status is required.',
            'status.boolean' => 'Status must be 0 or 1.',
        ];
    }
}
