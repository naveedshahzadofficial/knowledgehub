<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormFieldRequest extends FormRequest
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
            'field_label' => 'required|max:255',
            'field_type' => 'required',
            'is_required' => 'required',
            'field_group' => 'sometimes|nullable',
            'field_options' => 'sometimes|nullable|array',
            'field_order' => 'required',
            'field_status' => 'required',
        ];
    }
}
