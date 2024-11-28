<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRlcoUserInputRequest extends FormRequest
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
            'input_name' => 'required|string|max:255',
            'input_label' => 'required|string|max:255',
            'minimum_value' => 'nullable|max:99999999999.99',
            'maximum_value' => 'nullable|max:99999999999.99',
            'input_type' => 'required|string|max:255',
            'validation_rules' => 'nullable|string|max:1000',
            'status' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'input_name.required' => 'The Input Name is required.',
            'input_name.max' => 'The Input Name cannot exceed 255 characters.',

            'input_label.required' => 'The Input Label is required.',
            'input_label.max' => 'The Input Label cannot exceed 255 characters.',

            'input_type.required' => 'The Input Type is required.',
            'input_type.max' => 'The Input Type cannot exceed 255 characters.',

            'validation_rules.max' => 'The Validation Rules cannot exceed 1000 characters.',

            'status.required' => 'The Status field is required.',
            'status.boolean' => 'The Status must be either active (1) or inactive (0).',
        ];
    }
}
