<?php

namespace App\Http\Controllers\qiyun\admin\microlesson;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ComplainController extends Controller{

	/**
	 * 微课投诉列表
	 */
	public function index(Request $request){
		
		$query = DB::table('mini_lesson as ml')
				->join('mini_lesson_complain as mlc','ml.id','=','mlc.parentId')
				->join('users as u','mlc.user_id','=','u.id')
				->select('mlc.id','u.username','ml.lessonName','mlc.parentId','mlc.type','mlc.addTime','mlc.content');

		// 查询
		if($request['flag'] == 1){
			$query = $query->where('u.username','like','%'.trim($request['ln']).'%');
		}
		if($request['flag'] == 2){
			$query = $query->where('ml.lessonName','like','%'.trim($request['ln']).'%');
		}
		$data = $query->orderby('id','desc')->paginate(15);
		$data->flag = $request['flag'];
		// dd($data);
		return view('qiyun/admin/microlesson/complain/microlessonComplainList')->with('data',$data);

	}



	/**
	 * 编辑页
	 */
	public function editcomplain($id){
		$data = DB::table('mini_lesson as ml')
					->join('mini_lesson_complain as mlc','ml.id','=','mlc.parentId')
					->join('users as u','mlc.user_id','=','u.id')
					->select('mlc.id','u.username','ml.lessonName','mlc.parentId','mlc.type','mlc.addTime','mlc.content')
					->where('mlc.id',$id)
					->first();
        return view('qiyun/admin/microlesson/complain/microlessonComplainedit')->with('data',$data);
	}


	/**
	 * 编辑方法
	 */
	public function editcomplainsub(Request $request){

		$data = $request->except('_token','id');
		$res = DB::table('mini_lesson_complain')->where('id',$request['id'])->update($data);
        // dd($res);
        if($res !== false){
            return redirect('admin/message')->with(['status'=>'修改成功','redirect'=>'microlesson/microlessonComplainList']);
        }else{
            return redirect()->back()->withInput()->withErrors('修改失败');
        }
	}




	/**
	 * 删除投诉
	 */
	public function delcomplain($id){
		$data = DB::table('mini_lesson_complain')->where('id',$id)->delete();
		if($data){
            return redirect('admin/message')->with(['status'=>'删除成功','redirect'=>'microlesson/microlessonComplainList']);
        }else{
            return redirect()->back()->withInput()->withErrors('删除失败！');
        }
	}



}