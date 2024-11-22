<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRlcoFeeRuleRequest extends FormRequest
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
            'category' => 'required|max:255',
            'calculation_type' => 'required',
            'rate' => 'required|numeric|min:0|max:99999999999.99',  // Up to 11 digits with 2 decimals
            'minimum_fee' => 'required|numeric|min:0|max:99999999999.99',  // Up to 11 digits with 2 decimals
            'fixed_fee' => 'nullable|numeric|min:0|max:99999999999.99', // Optional, but valid if provided
            'unit' => 'nullable|max:255',  // Optional field, but if present, max length of 255
            'percentage' => 'nullable|numeric|min:0|max:100', // Percentage validation
            'order' => 'required|integer|min:0',
            'status' => 'required|boolean',  // Accepts 0 or 1 (true or false)
        ];
    }

    /**
     * Get the custom messages for the validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'rlco_fee_type_id.required' => 'RLCO Fee Type ID is required.',
            'rlco_fee_type_id.digits' => 'RLCO Fee Type ID must be a valid number.',
            'category.required' => 'Category is required.',
            'category.max' => 'Category cannot exceed 255 characters.',
            'calculation_type.required' => 'Calculation Type is required.',
            'rate.required' => 'Rate is required.',
            'rate.numeric' => 'Rate must be a valid number.',
            'rate.min' => 'Rate cannot be less than 0.',
            'rate.max' => 'Rate cannot exceed 11 digits and 2 decimal places.',
            'minimum_fee.required' => 'Minimum Fee is required.',
            'minimum_fee.numeric' => 'Minimum Fee must be a valid number.',
            'minimum_fee.min' => 'Minimum Fee cannot be less than 0.',
            'minimum_fee.max' => 'Minimum Fee cannot exceed 11 digits and 2 decimal places.',
            'fixed_fee.numeric' => 'Fixed Fee must be a valid number.',
            'fixed_fee.min' => 'Fixed Fee cannot be less than 0.',
            'fixed_fee.max' => 'Fixed Fee cannot exceed 11 digits and 2 decimal places.',
            'unit.max' => 'Unit cannot exceed 255 characters.',
            'percentage.numeric' => 'The percentage must be a valid number.',
            'percentage.min' => 'The percentage cannot be less than 0.',
            'percentage.max' => 'The percentage cannot exceed 100.',
            'order.required' => 'Order is required.',
            'order.integer' => 'Order must be a valid integer.',
            'order.min' => 'Order cannot be less than 0.',
            'status.required' => 'Status is required.',
            'status.boolean' => 'Status must be 0 or 1.',
        ];
    }
}
