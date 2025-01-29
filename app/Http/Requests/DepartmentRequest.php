<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartmentRequest extends FormRequest
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
            'department_id' => 'sometimes|nullable',
            'department_name' => [
                'required',
                Rule::unique('departments', 'department_name')->ignore($this->department),
                'max:255'
            ],
            'department_display_name' => 'sometimes|nullable',
            'province_id' => 'required',
            'category_id' => 'required',
            'department_scope' => 'required',
            'department_remark' => 'sometimes|nullable',
            'department_status' => 'required',
        ];
    }
}
