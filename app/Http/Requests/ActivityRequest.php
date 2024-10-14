<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActivityRequest extends FormRequest
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
            'activity_name' => [
                'required',
                Rule::unique('activities', 'activity_name')->ignore($this->activity),
                'max:255'
            ],
            'activity_icon' => 'sometimes|nullable',
            'activity_order' => 'required',
            'activity_status' => 'required',
        ];

    }
}
