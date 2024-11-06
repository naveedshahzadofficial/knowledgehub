<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'form_table_row_id' => ['required_if:form.is_tabular,true'],
            'form_table_column_id' => ['required_if:form.is_tabular,true'],
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
