<?php

namespace App\Http\Requests;

class FormRequest extends \Illuminate\Foundation\Http\FormRequest
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
            'form_name' => 'required|max:255',
            'form_order' => 'required',
            'rlco_ids' => 'required|array|min:1',
            'form_status' => 'required',
        ];
    }
}
