<?php

namespace App\Http\Controllers\qiyun\admin\microlesson;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon;

class IndexController extends Controller
{
  
    /**
     * 微课列表
     */
    public function index(Request $request){
        $query = DB::table('mini_lesson as ml')
                ->join('users','ml.user_id','=','users.id')
                ->select('ml.*','users.username');
          // 查询
        if($request['flag'] == 1){ 
            $query = $query->where('ml.lessonName','like','%'.trim($request['ln']).'%');
        }
        if($request['flag'] == 2){
            $query = $query->where('users.username','like','%'.trim($request['ln']).'%');
        }
        if($request['flag'] == 3){
            $query = $query->where('ml.lessonTitle','like','%'.trim($request['ln']).'%');
        }
        $data = $query->orderby('ml.id','desc')->paginate(15);
        $data->flag = $request['flag'];
        return view('qiyun/admin/microlesson/index/microlessonList')->with('data',$data);
    }

    /**
    *微课编辑页
    */
    public function editmicro($id){
        $data = DB::table('mini_lesson')->where('id',$id)->first();
        return view('qiyun/admin/microlesson/index/editmicrolesson')->with('data',$data);
    }



     /**
     * 微课添加页
     */
    public function addmicro(Request $request){
        // 取学段
        $section = DB::table('mini_tag_section')->select('id','sectionName')->get();
        $userinfo = DB::table('users')->select('id','realname')->where('type',1)->get();
        return view('qiyun/admin/microlesson/index/microlessonAdd')->with('section',$section)->with('userinfo',$userinfo);
    }


    // ajax取年级
    public function sectiongrade(Request $request){
         $grade = DB::table('mini_tag_grade')->where('parentId',$request['id'])->get();
         echo json_encode($grade);
    }

    // ajax取学科
    public function gradesubject(Request $request){
        $subject = DB::table('mini_tag_subject')->where('parentId',$request['id'])->get();
        echo json_encode($subject);
    }

    //上传接口
    public function doAddmicrolesson(Request $request){

        $ext = strrchr($_FILES['Filedata']['name'],'.');
  
        if($request->hasFile('Filedata')){
            if ($request->file('Filedata')->isValid()) {
                $newname = time().$ext;
                if($request->file('Filedata')->move('./uploads/appmicrolesson/',$newname)){
                    echo '/uploads/appmicrolesson/'.$newname;
                }
            }
        }else{
            echo 0;  //没有文件上传 0
        }

    }

     /**
     * 添加方法
     */
    public function addmicrosub(Request $request){
        $userId = \Auth::user()->id;
        $data = $request->except('_token','section','grade','subject');
        $data['tag1'] = $request['section'];
        $data['tag2'] = $request['grade'];
        $data['tag3'] = $request['subject'];
        $data['user_id'] = $request['author'];
        $userinfo = DB::table('users')->where('id',$request['author'])->select('realname')->first();
        $data['author'] = $userinfo->realname;
        $addTime = Carbon\Carbon::now();
        $addTime = strtotime($addTime)*1000;
        $data['addTime'] = $addTime;

        // 验证标题不能重复
        if(DB::table('mini_lesson')->where('user_id',$data['user_id'])->where('lessonName',$data['lessonName'])->first()){
            return redirect()->back()->withErrors('微课名称不能重复,请重新填写');
        }
        // dd($data);exit;
        $res = DB::table('mini_lesson')->insert($data);
        if($res){
            return redirect('admin/message')->with(['status'=>'添加成功','redirect'=>'microlesson/microlessonList']);
        }else{
            return redirect()->back()->withInput($request->all())->withErrors('添加失败');
        }

    }


    /**
     * 微课详情页
     */
    public function detailmicrolesson($id){
        $data = DB::table('mini_lesson as ml')
                ->join('mini_tag_section as mtsn','ml.tag1','=','mtsn.id')
                ->join('mini_tag_grade as mtg','mtsn.id','=','mtg.parentId')
                ->join('mini_tag_subject as mts','mtg.id','=','mts.parentId')
                ->join('users','users.id','=','ml.user_id')
                ->select('ml.*','mtsn.sectionName','mtg.gradeName','mts.subjectName','users.username')
                ->where('ml.id',$id)
                ->first();
        return view('qiyun/admin/microlesson/index/detailmicrolesson')->with('data',$data);
    }



    /**
    *微课编辑
    */
    public function editmicrosub(Request $request){
        $data['lessonName'] = $request['lessonName'];
        $data['lessonTitle'] = $request['lessonTitle'];
        $data['lessonDes'] = $request['lessonDes'];
        $data['author'] = $request['author'];
        $data['path'] = $request['path'];
        $data['viewNum'] = $request['viewNum'];
        $data['likeNum'] = $request['likeNum'];
        $data['type'] = $request['type'];
        $data['status'] = $request['status'];

        // 文件上传
        if($request->hasFile('logo')){ //判断文件是否存在
            if($request->file('logo')->isValid()){ //判断文件在上传过程中是否出错
                $name = $request->file('logo')->getClientOriginalName();//获取图片名
                $entension = $request->file('logo')->getClientOriginalExtension();//上传文件的后缀
                // 设置上传音视频的所有格式
                $allowed_types = array('jpg','png','gif','jpeg');
                if(!in_array($entension,$allowed_types)){
                    echo "请上传图片格式";
                    die();
                }else{
                    $newname = date('ymdhms').'.'.$entension;//拼接新的图片名
                    if($request->file('logo')->move('./image/qiyun/research/microlesson/top',$newname)){
                        $data['logo'] = '/image/qiyun/research/microlesson/top/'.$newname;
                    }else{
                        return redirect()->back()->withInput()->withErrors('文件保存失败');
                    }
                }        
            }else{
                return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
            }
        }

        $res = DB::table('mini_lesson')->where('id',$request['id'])->update($data);
        // dd($res);
        if($res !== false){
            return redirect('admin/message')->with(['status'=>'微课表修改成功','redirect'=>'microlesson/microlessonList']);
        }else{
            return redirect()->back()->withInput()->withErrors('微课表修改失败');
        }



    }


    /**
     * 微课删除
     */
    public function delmicro($id){
        $data = DB::table('mini_lesson')->where('id',$id)->delete();
        if($data){
            // 删除微课成功时，同时删除收藏表中相关数据
            $collect = DB::table('resourcestore')
                        ->where('resourceId',$id)
                        ->where('type',5)
                        ->where('userId',\Auth::user()->id)
                        ->delete();
            // 删除评论过此微课的评论表中的数据
            DB::table('mini_lesson_comment')->where('parentId',$id)->delete();
            return redirect('admin/message')->with(['status'=>'微课删除成功','redirect'=>'microlesson/microlessonList']);
        }else{
            return redirect()->back()->withInput()->withErrors('微课删除失败！');
        }
    }






}
