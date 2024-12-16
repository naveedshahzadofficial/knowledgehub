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
            'is_tabular'=> 'required',
            'is_add_more'=> 'required_if:is_tabular,1',
            'form_name' => 'required|max:255',
            'form_sub_heading' => 'sometimes|nullable',
            'form_order' => 'required',
            'rlco_ids' => 'required|array|min:1',
            'form_status' => 'required',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->input('is_tabular') == '0') {
            $this->merge(['is_add_more' => '0',]);
        }
    }
}
