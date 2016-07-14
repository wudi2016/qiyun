<?php

namespace App\Http\Requests\lesson;

use App\Http\Requests\Request;

class lessonArticleRequest extends Request
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
            'title'=>'required',
            'content'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => '请填写文章标题',
            'content.required' => '请填写文章内容',
        ];
    }
}
