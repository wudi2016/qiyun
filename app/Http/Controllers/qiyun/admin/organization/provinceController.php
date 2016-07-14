<?php

namespace App\Http\Controllers\qiyun\admin\organization;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon;
use Validator;


class provinceController extends Controller{
  

    /**
     * 单位信息列表
     */
    public function index(Request $request){
        // // 获取权限判断id
 
        switch ( \Auth::user() -> level() ) {
            // admin管理员
            case 8:                                                                             
                $query = DB::table('organize');
                break;
            // admin管理员
            case 7:
                $query = DB::table('organize');
                break;
            // 单位管理员
            case 6:
            // 获取权限判断id
                $organizeId = \Auth::user() -> organizeID;
                // dd($organizeId);
                $query = DB::table('organize as o')
                        ->join('users','o.id','=','users.organizeID')
                        ->join('role_user','role_user.user_id','=','users.id')
                        ->join('roles','roles.id','=','role_user.role_id')
                        ->where('o.id','=',$organizeId)
                        ->select('o.*')
                        ->distinct();
                break;
        }


                          
        // 查询
        if($request['flag'] == 1){ 
            $query = $query->where('organize_name','like','%'.trim($request['ln']).'%');
        }
        if($request['flag'] == 2){ 
            $query = $query->where('organize_tel','like','%'.trim($request['ln']).'%');
        }
        $data = $query->orderBy('id','desc')->paginate(15);
        $data->flag = $request['flag'];
        return view('qiyun/admin/organization/provinceList')->with('data',$data);
    }


    /**
     * 单位信息添加页
     */
    public function addpro(){
        $data = DB::table('organize')->get();
        return view('qiyun/admin/organization/proadd')->with('data',$data);
    }


    /**
     * 单位信息添加
     */
    public function addproexe(Request $request){
        // 验证
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        // 验证电话
        $isMobile="/^(?:13\d|15\d)\d{5}(\d{3}|\*{3})$/";   
        $isPhone="/^((0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/";
        if(!preg_match($isMobile,$request['organize_tel']) && !preg_match($isPhone,$request['organize_tel'])){
             return Redirect()->back()->withErrors("请填写正确的手机或电话号码");
        }
        // 验证邮编
        $postcode =  "/^[0-9]{6}$/";
        if(!preg_match($postcode,$request['postcode'])){
             return Redirect()->back()->withErrors("请填写正确的邮编");
        }
         // 验证传真
        $faxes = "/^((0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/";
        if(!preg_match($faxes,$request['faxes'])){
            return Redirect()->back()->withErrors("请填写正确的传真"); 
        }
        $data = $request->except('_token');
        $data['created_at'] = Carbon\Carbon::now();
        // $data['updated_at'] = Carbon\Carbon::now();
        // dd($data);exit();
        $res = DB::table('organize')->insert($data);
        if($res){
            return redirect('admin/message')->with(['status'=>'添加成功','redirect'=>'organization/provinceList']);
        }else{
            return redirect()->back()->withInput($request->all())->withErrors('添加失败');
        }
    }


    /**
     * 单位信息修改页
     */
    public function editpro($id){
        $data = DB::table('organize')->where('id',$id)->first();
        return view('qiyun/admin/organization/proEdit')->with('data',$data);
    }


    /*
     *单位信息修改
     */
    public function editprosub(Request $request){
        // 验证
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput($request->all())->withErrors($validator);
        }
       
        if(\Auth::user() -> level() >6 ){
             // $data = $request->except('_token');
            $data['organize_name'] = $request['organize_name'];
            $data['organize_intro'] = $request['organize_intro'];  
            $data['organize_tel'] = $request['organize_tel'];
            $data['address'] = $request['address'];
            $data['postcode'] = $request['postcode'];
            $data['faxes'] = $request['faxes'];
            $data['updated_at'] = Carbon\Carbon::now();
        }
        if(\Auth::user() -> level() == 6 ){
            $data = $request->except('_token','id','organize');
            $data['updated_at'] = Carbon\Carbon::now();
        }
        
        $isMobile="/^(?:13\d|15\d)\d{5}(\d{3}|\*{3})$/";   
        $isPhone="/^((0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/";
        if(!preg_match($isMobile,$request['organize_tel']) && !preg_match($isPhone,$request['organize_tel'])){
             return Redirect()->back()->withErrors("请填写正确的手机或电话号码");
        }
        // 验证邮编
        $postcode =  "/^[0-9]{6}$/";
        if(!preg_match($postcode,$request['postcode'])){
             return Redirect()->back()->withErrors("请填写正确的邮编");
        }
        // 验证传真
        $faxes = "/^((0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/";
        if(!preg_match($faxes,$request['faxes'])){
            return Redirect()->back()->withErrors("请填写正确的传真"); 
        }

        // dd($data);
        $res = DB::table('organize')->where('id',$request['id'])->update($data);
        if($res !==false){
            return redirect('admin/message')->with(['status'=>'修改成功','redirect'=>'organization/provinceList']);
        }else{
            return redirect()->back()->withInput()->withErrors('修改失败');
        }

    }


    /**
     * 单位删除
     */
    public function delpro($id){
        $city = DB::table('city')->where('parent_id',$id)->get();
        if($city){
            return redirect('admin/message')->with(['status'=>'子表中有数据，请先删除子表数据','redirect'=>'organization/provinceList']);
        }else{
            $data = DB::table('organize')->where('id',$id)->delete();
            if($data){
                return redirect('admin/message')->with(['status'=>'删除成功','redirect'=>'organization/provinceList']);
            }else{
                return redirect()->back()->withInput()->withErrors('删除失败！');
            }
        }
    }




    /**
     * 验证
     */
    protected function validator(array $data){
        $rules = [
            // 'organize_name' => 'required',
            'organize_intro'=>'required',
            'organize_tel'=>'required',
            'address'=>'required',
            'postcode' => 'required',
            'faxes' => 'required',
        ];

        $messages = [
            // 'organize_name.required' => '请填写省级单位名称',
            'organize_intro.required' => '请填写单位介绍名称',
            'organize_tel.required' => '请填写电话',
            // 'organize_tel.numeric'  => '请填写正确电话号码',
            'address.required' => '请填写地址',
            'postcode.required' => '请填写邮编',
            'faxes.required' => '请填写传真'
        ];
        return Validator::make( $data, $rules, $messages );
    }


}
