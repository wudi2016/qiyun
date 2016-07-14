<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class CreateUserRequest extends Request
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
//            'username' => 'required|min:3|max:15',
//            'password' => 'required',
//            'email' => 'required',
//            'phone' => 'required|min:11|max:11'

            'realname' => 'required',
//            'password' => 'required|min:6|max:15',
            'phone' => 'required',
            'IDcard' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'realname.required' => '请输入用户名',
//            'realname.unique' => '该用户名已被注册',
//            'password.required' => '请输入密码',
//            'password.confirmed' => '两次密码不一致',
//            'password.min' => '密码不得小于6位',
//            'password.max' => '密码不得大于15位',
            'phone.required' => '电话不能为空',
            'IDcard.required' => '身份证件号不能为空',
        ];
    }
}
