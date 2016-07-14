<?php

namespace App\Http\Controllers\qiyun\member;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Controllers\Auth\AuthController;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class memberController extends AuthController
{
    /**
     * 注册首页
     */
    public function register()
    {
        return view('qiyun/member/register');
    }

    /**
     *
     * 执行添加
     */
    public function addMember(Request $request)
    {   
        // dd($request);
        $validator = $this -> validator($request -> all());
        if ($validator->fails()) {
            return Redirect() -> back() -> withInput($request->except('password')) -> withErrors($this->formatValidationErrors($validator));
        }
        
        \Auth::login($this->create($request->except('childNick')));


        if ($arr = $request->childNick) {
            foreach ($arr as $key => $value) {
                $id = DB::table('parent_childs')->insertGetId(
                    ['parentId' => \Auth::user()->id, 'childNick' => $value]
                );
            }
        }
        
        return view('qiyun/member/registSuccess');
    }

    public function addImg(Request $request){
        //获取文件后缀名
        $ext = strrchr($_FILES['Filedata']['name'],'.');

        if($request->hasFile('Filedata')){
            if ($request->file('Filedata')->isValid()) {
                $newname = time().$ext;
                if($request->file('Filedata')->move('./uploads/heads/',$newname)){
                    
                    $img = Image::make( realpath(base_path('public')) .'/uploads/heads/'.$newname) -> resize(89,120);
                    $img -> save( realpath(base_path('public')) .'/uploads/heads/small'.$newname);
                    echo '/uploads/heads/small'.$newname;

                    if(file_exists(realpath(base_path('public')) .'/uploads/heads/'.$newname)){
                        unlink(realpath(base_path('public')) .'/uploads/heads/'.$newname);
                    }
                }
            }
        }else{
            echo 0;  //没有文件上传
        }
    }

    /**
     * 找回密码
     *
     */
    public function retrievePassword(Request $request)
    {
        return view('qiyun/member/retrievePassword');
        
    }

    /**
     * 查询手机号是否存在 接口
     *
     */
    public function getPhones($phone)
    {
        if ($user = DB::table('users')->where('phone', $phone)->first()) {
            echo 1; //用户存在
        }else{
            echo 0; //用户不存在
        }

    }

    /**
     * 修改密码 接口
     *
     */
    public function changePassword()
    {
        $arr = json_decode(file_get_contents('php://input'),true);
        if (DB::table('users')->where('phone', $arr['phone'])->update(['password' => bcrypt($arr['password'])])) {
            echo 1; //修改成功
        }else{
            echo 0; //修改失败
        }
    }

}
