<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	protected $redirectPath = '/';
	protected $loginPath = '/error';
    protected $username = 'username';
	
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            // 'username' => 'required|max:12|unique:users',
            'password' => 'min:6',
            'email' => 'unique:users',
            'phone' => 'unique:users',
            'IDcard' => 'unique:users',
        ];

        $messages = [
            // 'username.required' => '请输入用户名',
            'username.max' => '用户名最多12位',
            'username.unique' => '该用户名已被注册',
            'password.required' => '请输入密码',
            'password.confirmed' => '两次密码不一致',
            'password.min' => '密码不得小于6位',
            'email.unique' => '该邮箱已被注册',
            'phone.unique' => '该电话已被注册',
            'IDcard.unique' => '该身份证件号已被注册',
        ];

        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'username' => $data['username'],
        //     'phone' => $data['phone'],
        //     'realname' => $data['realname'],
        //     'password' => bcrypt($data['password']),
        //     'school' => $data['school'],
        // ]);
        $data['password'] = bcrypt($data['password']);
        // dd($data);
        $data = array_filter($data);
        return User::create($data);
    }
}
