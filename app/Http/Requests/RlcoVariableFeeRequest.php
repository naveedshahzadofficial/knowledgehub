<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RlcoVariableFeeRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'unit' => 'nullable|string|max:255',
            'unit_quantity' => 'nullable|numeric|min:0|max:99999999999.99',
            'price' => 'required|numeric|min:0|max:99999999999.99',
            'status' => 'required|boolean',
            'order' => 'nullable|integer|min:0',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'unit.string' => 'The unit must be a valid string.',
            'unit_quantity.numeric' => 'The unit quantity must be a valid number.',
            'unit_quantity.min' => 'The unit quantity must be at least 0.',
            'unit_quantity.max' => 'The unit quantity may not be greater than 11 digits with 2 decimal places.',
            'price.required' => 'The price field is required',
            'price.numeric' => 'The price must be a valid number.',
            'price.min' => 'The price must be at least 0.',
            'price.max' => 'The price may not be greater than 11 digits with 2 decimal places.',
            'status.required' => 'The status field is required.',
            'status.boolean' => 'The status must be true or false.',
            'order.required' => 'The order field is required.',
            'order.integer' => 'The order must be an integer.',
            'order.min' => 'The order must be at least 0.',
        ];
    }
}
