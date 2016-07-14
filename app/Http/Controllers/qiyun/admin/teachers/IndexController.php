<?php

namespace App\Http\Controllers\qiyun\admin\teachers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;

class IndexController extends Controller
{
    /**
     *教师协作组列表页
     */
    public function index(Request $request){
        $query = DB::table('techresearch');
        if($request['type'] == 1){ //根据自增id查询
            $query = $query->where('id',trim($request['search']));
        }
        if($request['type'] == 2){ //根据教研组名称查询
            $query = $query->where('techResearchName','like','%'.trim($request['search']).'%');
        }
        $data = $query->orderBy('id','desc')->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.teachers.teacherList',['data'=>$data]);
    }

    /**
     *教师协作组编辑页
     */
    public function teacherEdit($id){
        $data = DB::table('techresearch')->where('id',$id)->first();
        return view('qiyun.admin.teachers.editTeacher',['data'=>$data]);

    }

    /**
     * 教师协作组编辑
     */
    public function doTeacherEdit(Request $request){
        $url = $request['url'];
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data['techResearchName'] = $request['techResearchName'];
        $data['isOpen'] = $request['isOpen'];
        $data['isJoin'] = $request['isJoin'];
        $data['description'] = $request['description'];
        $data['status'] = $request['status'];
        $data['updated_at'] = date('Y--m-d H:i:s',time());
        if($request->hasFile('pic')){ //判断文件是否存在
            $entension = $request->file('pic')->getClientOriginalExtension();//上传文件的后缀
            if(strtolower($entension) == 'png' || strtolower($entension) == 'jpg' || strtolower($entension) == 'jpeg'|| strtolower($entension) == 'gif'){
                if($request->file('pic')->isValid()){ //判断文件在上传过程中是否出错
                    $name = $request->file('pic')->getClientOriginalName();//获取图片名
//                    $entension = $request->file('pic')->getClientOriginalExtension();//上传文件的后缀
                    $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
                    if($request->file('pic')->move('./image/qiyun/research/makeGroup',$newname)){
                        $data['pic'] = '/image/qiyun/research/makeGroup/'.$newname;
                        //删除之前的图片
//                        $file = '.'.$request['original_pic'];
//                        unlink($file);
                    }else{
                        return redirect()->back()->withInput()->withErrors('文件保存失败');
                    }
                }else{
                    return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
                }
            }else{
                return redirect()->back()->withInput()->withErrors('图片格式不正确');
            }
        }

        if(DB::table('techresearch')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'教师协作组修改成功','redirect'=>$url]);
        }else{
            return redirect()->back()->withInput()->withErrors('教师协作组修改失败');
        }
    }

    /**
     *教师协作组删除
     */
    public function delTeacher($id){
        $url = $_SERVER['HTTP_REFERER'];
        if(DB::table('lessonsubject')->where('techResearch',$id)->get()){
            return redirect()->back()->withInput()->withErrors('此协作组下有备课,请先删除备课');
        }
        $data = DB::table('techresearch')->where('id',$id)->delete();
        if($data){
            DB::table('departmenttech')->where('parentId',$id)->delete();
            return redirect('admin/message')->with(['status'=>'教师协作组删除成功','redirect'=>$url]);
        }else{
            return redirect()->back()->withInput()->withErrors('教师协作组删除失败！');
        }
    }



    /**
     * 表单验证
     */
    protected function validator(array $data)
    {
        $rules = [
            'techResearchName'=>'required|max:40',
            'description'=>'required',
        ];

        $messages = [
            'techResearchName.required' => '请填写名称',
            'techResearchName.max'=>'标题最长不超过40',
            'description.required' => '请填写简介',
        ];
        return Validator::make( $data, $rules, $messages );
    }
}
