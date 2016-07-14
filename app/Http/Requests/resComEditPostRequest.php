<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class resComEditPostRequest extends Request
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
            'commentContent' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'commentContent.required' => '评论内容不能为空！',
        ];
    }
}
