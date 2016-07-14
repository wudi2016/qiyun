<?php

namespace App\Http\Controllers\qiyun\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class indexController extends Controller
{
     //后台首页
    public function index()
    {   
        // return view('admin.index', ['user' => User::findOrFail($id)]);
        return view('qiyun.admin.index');
    }
    public function login(){
        return view('auth.login');
    }
}
