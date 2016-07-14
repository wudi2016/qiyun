<?php

namespace App\Http\Controllers\qiyun\admin\microlesson;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class CollectController extends Controller{

	/**
	 * 微课收藏显示
	 */
	public function index(Request $request){
		$query = DB::table('mini_lesson as ml')
					->join('resourcestore as r','ml.id','=','r.resourceId')
					->join('users as u','u.id','=','userId')
					->select('r.*','ml.lessonName','u.username')
					->where('r.type',5);
		  // 查询
        if($request['flag'] == 1){ 
            $query = $query->where('ml.lessonName','like','%'.trim($request['ln']).'%');
        }
        if($request['flag'] == 2){
            $query = $query->where('u.username','like','%'.trim($request['ln']).'%');
        }
		$data = $query->orderBy('r.id','desc')->paginate(8);
		$data->flag = $request['flag'];
		return view('qiyun/admin/microlesson/collect/microlessoncollectList')->with('data',$data);
	}



	/**
	 * 修改页
	 */
	// public function editcollect($id){
	// 	return view('qiyun/admin/microlesson/microlessoncollect/microlessoncollectedit');
	// }





	
	/**
	 * 删除
	 */
	public function delcollect($id){
		$data = DB::table('resourcestore')->where('id',$id)->delete();
		if($data){
            return redirect('admin/message')->with(['status'=>'删除成功','redirect'=>'microlesson/microlessonCollectList']);
        }else{
            return redirect()->back()->withInput()->withErrors('删除失败！');
        }
	}


}