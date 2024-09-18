<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
            'first_name' => 'required',
            'middle_name' => 'sometimes|nullable',
            'last_name' => 'required',
            'username' => ['required','string', 'max:100', Rule::unique('admins', 'username')->ignore($this->admin)],
            'mobile_no' => 'sometimes|nullable',
            'cnic_no' => 'sometimes|nullable',
            'email' => ['email', 'max:255', Rule::unique('admins', 'email')->ignore($this->admin)],
            'password' => [!empty($this->admin)?'sometimes':'required', 'confirmed'],
            'role_ids' => 'required|array|min:1',
            'department_id' => 'sometimes|nullable',
            'admin_status' => 'required',
        ];
    }
}
