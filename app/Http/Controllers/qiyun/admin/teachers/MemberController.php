<?php

namespace App\Http\Controllers\qiyun\admin\teachers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MemberController extends Controller
{
    /**
     *协作组成员列表
     */
    public function index(Request $request){
        $query  = DB::table('departmenttech as d');
        if($request['type'] == 1){ //根据自增id查询
            $query = $query->where('d.id',trim($request['search']));
        }
        if($request['type'] == 2){ //根据教研组名称查询
            $query = $query->where('t.techResearchName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //根据用户id查询
            $query = $query->where('d.userId',trim($request['search']));
        }
        $data = $query
            ->leftJoin('users as u','d.userId','=','u.id')
            ->leftjoin('techresearch as t','d.parentId','=','t.id')
            ->select('d.*','t.techResearchName','u.realname')
            ->orderBy('d.id','desc')
            ->paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.member.memberList',['data'=>$data]);
    }

    /**
     * 协作组成员表编辑页
     */
    public function memberEdit($id){
        $data = DB::table('departmenttech as d')
            ->leftJoin('users as u','d.userId','=','u.id')
            ->leftjoin('techresearch as t','d.parentId','=','t.id')
            ->select('d.*','t.techResearchName','u.realname','u.username')
            ->where('d.id',$id)
            ->first();
        $parentId['id'] = $data->parentId;
        $data->tenames = DB::table('techresearch')->where('author','<>',$data->username)->select('id','techResearchName')->get();
        return view('qiyun.admin.member.editMember',['data'=>$data]);
    }

    /**
     *协作组成员编辑
     */
    public function doMemberEdit(Request $request){
        $data['parentId'] = $request['parentId'];
        $data['userId'] = $request['userId'];
//        $data['isManage'] = $request['isManage'];
        $data['status'] = $request['status'];
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('departmenttech')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'协作组成员修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协作组成员修改失败!');
        }
    }
    public function delMember($id){
        $data = DB::table('departmenttech')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'协作组成员删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('协作组成员删除失败！');
        }
    }
}
