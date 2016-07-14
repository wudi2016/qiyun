<?php

namespace App\Http\Controllers\qiyun\admin\microlesson;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CommentController extends Controller{
  
   	/**
     * 微课评论管理页面
     */
    public function index(Request $request){
        // where('lessonName','like','%'.$request['ln'].'%')->
        $data = DB::table('mini_lesson_comment as mlc')
        		->join('users as u','u.id','=','mlc.user_id')
        		->join('mini_lesson as ml','mlc.parentId','=','ml.id')
        		->select('mlc.id','u.username','mlc.content','ml.lessonName','mlc.status','mlc.addTime','mlc.picture')
        		->where('u.username','like','%'.$request['ui'].'%')
        		->orderby('mlc.id','desc')
        		->paginate(8);
       	// dd($data);
   		return view('qiyun/admin/microlesson/comment/microlessonCommentList')->with('data',$data);
   }



   /**
    * 编辑评论页
    */
   public function editcomment($id){
   		$data = DB::table('mini_lesson_comment as mlc')
              ->join('mini_lesson as ml','ml.id','=','mlc.parentId')
              ->join('users','users.id','=','mlc.user_id')
              ->select('mlc.*','users.username','ml.lessonName')
              ->where('mlc.id',$id)
              ->first();
      
   		return view('qiyun/admin/microlesson/comment/microlessonCommentEdit')->with('data',$data);
   }



   /**
   	*编辑评论
    */
   	public function editcommentsub(Request $request){

   		$data['content'] = $request['content'];

   		$res = DB::table('mini_lesson_comment')->where('id',$request['id'])->update($data);
        if($res !== false){
            return redirect('admin/message')->with(['status'=>'微课评论修改成功','redirect'=>'microlesson/microlessonCommentList']);
        }else{
            return redirect()->back()->withInput()->withErrors('微课评论修改失败');
        }
   	}



    /**
     * 删除评论信息
     */
    public function delcomment($id){
        $data = DB::table('mini_lesson_comment')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'微课评论删除成功','redirect'=>'microlesson/microlessonCommentList']);
        }else{
            return redirect()->back()->withInput()->withErrors('微课评论删除失败！');
        }
    }


    /**
     * 详情页面
     */
    public function detailcomment($id){
        $data = DB::table('mini_lesson_comment as mlc ')
              ->join('users as u','u.id','=','mlc.user_id')
              ->join('mini_lesson as ml','mlc.parentId','=','ml.id')
              ->select('mlc.id','u.username','mlc.content','ml.lessonName','mlc.status','mlc.addTime','mlc.picture')
              ->where('mlc.id',$id)
              ->first();
        return view('qiyun/admin/microlesson/comment/detailcomment')->with('data',$data);
    }



}