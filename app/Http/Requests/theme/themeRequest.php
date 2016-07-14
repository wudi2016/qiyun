<?php

namespace App\Http\Requests\theme;

use App\Http\Requests\Request;

class themeRequest extends Request
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
            'name'=>'required',
            'describe'=>'required',
            'peoplenum'=>'integer',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '请填写主题名称',
            'describe.required' => '请填写主题导读',
            'peoplenum.integer' => '参与人数为整型',
        ];
    }
}
