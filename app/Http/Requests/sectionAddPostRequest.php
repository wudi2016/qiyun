<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class sectionAddPostRequest extends Request
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
            'sectionName' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'sectionName.required' => '学段名必填',
        ];
    }
}
