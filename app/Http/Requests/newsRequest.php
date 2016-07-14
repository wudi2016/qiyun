<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class newsRequest extends Request
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
            'title'=>'required|max:30',
            'description'=>'required',
            'source'=>'required',
            'author'=>'required',
            'typeId'=>'required',
            'content'=>'required',
            'clickNum'=>'integer',
            'favNum'=>'integer',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => '新闻标题必填',
            'title.max'=>'新闻标题不超过30',
            'description.required'=>'新闻描述必填',
            'source.required'=>'请填写新闻来源',
            'author.required'=>'请填写作者',
            'typeId.required'=>'请选择新闻分类',
            'content.required'=>'请填写新闻内容',
            'clickNum.integer'=>'点击数必须为整型',
            'favNum.integer'=>'粉丝数必须为整型',
        ];
    }
}
