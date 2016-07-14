<?php

namespace App\Http\Requests\lesson;

use App\Http\Requests\Request;

class lessonTotalRequest extends Request
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
            'lessonName'=>'required',
            'title'=>'required',
            'descript'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'lessonName.required' => '请填写共案名称',
            'title.required' => '请填写共案标题',
            'descript.required' => '请填写描述',
        ];
    }
}
