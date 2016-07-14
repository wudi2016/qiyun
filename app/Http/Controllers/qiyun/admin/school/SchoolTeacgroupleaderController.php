<?php

namespace App\Http\Controllers\qiyun\admin\school;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Auth;

class SchoolTeacgroupleaderController extends Controller
{
    /**
     *教研组长列表
     */
    public function schoolTeacgroupleaderList(Request $request){
        $query = DB::table('schoolteacgroupleader as l');
        if($request['type'] == 1){
            $query = $query->where('l.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //学校名称查询
            $query = $query->where('s.schoolName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //教研组名称查询
            $query = $query->where('t.teachgroupName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //负责人查询
            $query = $query->where('users.realname','like','%'.trim($request['search']).'%');
        }
        $state = array(
            'organizeid'=>null,
            'cityId'=>null,
            'cityall'=>null,
            'countryId'=>null,
            'countryall'=>null,
            'schoolid'=>null,
            'schoolall'=>null,
        );
        //多条件筛选
        require realpath(base_path('public')).'/admin/php/organ_city_county.php';
        if($request['schoolid']){
            $query = $query->where('s.id',$request['schoolid']);
            $state['schoolid'] = $request['schoolid'];
        }

        if(Auth::user()->level() > 6){
            $data = $query
                ->leftJoin('users','l.uid','=','users.id')
                ->leftJoin('schoolteachgroup as t','l.parentId','=','t.id')
                ->leftJoin('school as s','t.parentId','=','s.id')
//                ->select('l.*','s.schoolName','t.teachgroupName','users.realname')
                ->orderBy('l.id','desc');
//                ->paginate(15);
            $export = $data->select('l.id', 's.schoolName as 学校名称', 't.teachgroupName as 教研组名称', 'users.realname as 组长', 'l.status as status(0:锁定1:激活)', 'l.created_at as 创建时间', 'l.updated_at as 修改时间')->get();
            $data = $data->select('l.*','s.schoolName','t.teachgroupName','users.realname')->paginate(15);
            $data->organizes = DB::table('organize')->select('id','organize_name')->get();
        }
        switch(Auth::user()->level()){
            case 6:
                $data = $query
                    ->leftJoin('users','l.uid','=','users.id')
                    ->leftJoin('schoolteachgroup as t','l.parentId','=','t.id')
                    ->leftJoin('school as s','t.parentId','=','s.id')
                    ->where('s.organizeid',Auth::user()->organizeID)
                    ->orderBy('l.id','desc');
                $export = $data->select('l.id', 's.schoolName as 学校名称', 't.teachgroupName as 教研组名称', 'users.realname as 组长', 'l.status as status(0:锁定1:激活)', 'l.created_at as 创建时间', 'l.updated_at as 修改时间')->get();
                $data = $data->select('l.*','s.schoolName','t.teachgroupName','users.realname')->paginate(15);
                $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
                break;
            case 5:
                $data = $query
                    ->leftJoin('users','l.uid','=','users.id')
                    ->leftJoin('schoolteachgroup as t','l.parentId','=','t.id')
                    ->leftJoin('school as s','t.parentId','=','s.id')
                    ->where('s.cityId',Auth::user()->organizeID)
                    ->orderBy('l.id','desc');
                $export = $data->select('l.id', 's.schoolName as 学校名称', 't.teachgroupName as 教研组名称', 'users.realname as 组长', 'l.status as status(0:锁定1:激活)', 'l.created_at as 创建时间', 'l.updated_at as 修改时间')->get();
                $data = $data->select('l.*','s.schoolName','t.teachgroupName','users.realname')->paginate(15);
                $data->countynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
                break;
            case 4:
                $data = $query
                    ->leftJoin('users','l.uid','=','users.id')
                    ->leftJoin('schoolteachgroup as t','l.parentId','=','t.id')
                    ->leftJoin('school as s','t.parentId','=','s.id')
                    ->where('s.countryId',Auth::user()->organizeID)
                    ->orderBy('l.id','desc');
                $export = $data->select('l.id', 's.schoolName as 学校名称', 't.teachgroupName as 教研组名称', 'users.realname as 组长', 'l.status as status(0:锁定1:激活)', 'l.created_at as 创建时间', 'l.updated_at as 修改时间')->get();
                $data = $data->select('l.*','s.schoolName','t.teachgroupName','users.realname')->paginate(15);
                $data->schoolnames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
            case 3:
                $data = $query
                    ->leftJoin('users','l.uid','=','users.id')
                    ->leftJoin('schoolteachgroup as t','l.parentId','=','t.id')
                    ->leftJoin('school as s','t.parentId','=','s.id')
                    ->where('s.id',Auth::user()->organizeID)
                    ->orderBy('l.id','desc');
                $export = $data->select('l.id', 's.schoolName as 学校名称', 't.teachgroupName as 教研组名称', 'users.realname as 组长', 'l.status as status(0:锁定1:激活)', 'l.created_at as 创建时间', 'l.updated_at as 修改时间')->get();
                $data = $data->select('l.*','s.schoolName','t.teachgroupName','users.realname')->paginate(15);
                break;
        }
        $data->type = $request['type'];
        $data->states = $state;
        $export = json_encode($export);
        return view('qiyun.admin.schoolTeacgroupleader.schoolTeacgroupleaderList',['data'=>$data,'export'=>$export]);
    }

    /**
     *添加教研组长页
     */
    public function addSchoolTeacgroupleader(){
        if(Auth::user()->level() > 6){
            $data = DB::table('organize')->select('id','organize_name')->get();
            $names = DB::table('users')->where('type',1)->select('id','realname')->get();
        }
        switch(Auth::user()->level()){
            case 6:
                $data = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
                $names = DB::table('users')->where('type',1)->select('id','realname')->get();
                break;
            case 5:
                $data = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
                $names = DB::table('users')->where('type',1)->select('id','realname')->get();
                break;
            case 4:
                $data = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
                $names = DB::table('users')->where('type',1)->select('id','realname')->get();
                break;
            case 3:
                $data = DB::table('school')->where('id',Auth::user()->organizeID)->select('id','schoolName')->first();
                $data->schoolteachgroup = DB::table('schoolteachgroup')->where('parentId',$data->id)->select('id','teachgroupName')->get();
                $names = DB::table('users')->where('schoolId',Auth::user()->organizeID)->where('type',1)->select('id','realname')->get();
                break;
        }

        return view('qiyun.admin.schoolTeacgroupleader.addSchoolTeacgroupleader',['data'=>$data,'names'=>$names]);
    }

    /**
     *根据ajax传的学校id查出此学校下所有的教研组
     */
    public function ajaxSchoolTeacgroupleader(Request $request){
        $data = DB::table('schoolteachgroup')->select('id','teachgroupName')->where('parentId',$request['id'])->get();
        echo json_encode($data);
    }

    /**
     * 执行添加教研组长
     */
    public function doAddSchoolTeacgroupleader(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        foreach($request['uid'] as $val){
            $data = DB::table('schoolteacgroupleader')->insert(
                [
                    'parentId'=>$request['parentId'],
                    'uid'=>$val,
                    'status'=>$request['status'],
                    'created_at'=>date('Y-m-d H:i:s',time()),
                    'updated_at'=>date('Y-m-d H:i:s',time()),
                ]
            );
        }
        if($data){
            return redirect('admin/message')->with(['status'=>'教研组长添加成功','redirect'=>'school/schoolTeacgroupleaderList']);
        }else{
            return redirect()->back()->withInput()->withErrors('教研组长添加失败');
        }
    }

    /**
     *教研组长编辑页
     */
    public function editSchoolTeacgroupleader($id){
        $data = DB::table('schoolteacgroupleader as l')
            ->leftJoin('users','l.uid','=','users.id')
            ->leftJoin('schoolteachgroup as t','l.parentId','=','t.id')
            ->leftJoin('school as s','t.parentId','=','s.id')
            ->select('l.*','s.id as schoolid','s.organizeid','s.cityId','s.countryId','s.schoolName','t.teachgroupName','users.realname')
            ->where('l.id',$id)
            ->first();
        if($data->countryId){
            $data->schoolNames = DB::table('school')->where('countryId',$data->countryId)->select('id','schoolName')->get();
        }elseif($data->cityId){
            $data->schoolNames = DB::table('school')->where('cityId',$data->cityId)->select('id','schoolName')->get();
        }else{
            $data->schoolNames = DB::table('school')->where('organizeid',$data->organizeid)->select('id','schoolName')->get();
        }

        if(Auth::user()->level() > 6){
//            $data->schoolNames = DB::table('school')->select('id','schoolName')->get();
            $data->organizenames = DB::table('organize')->select('id','organize_name')->get();
            $data->citynames = DB::table('city')->where('parent_id',$data->organizeid)->select('id','city_name')->get();
            $data->countrynames = DB::table('county')->where('parent_id',$data->cityId)->select('id','county_name')->get();
        }
        switch(Auth::user()->level()){
            case 6:
//                $data->schoolNames = DB::table('school')->where('organizeid',Auth::user()->organizeID)->select('id','schoolName')->get();
                $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
                $data->countrynames = DB::table('county')->where('parent_id',$data->cityId)->select('id','county_name')->get();
                break;
            case 5:
//                $data->schoolNames = DB::table('school')->where('cityId',Auth::user()->organizeID)->select('id','schoolName')->get();
                $data->countrynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
                break;
            case 4:
                $data->schoolNames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
        }
        $data->teachgroupNames = DB::table('schoolteachgroup')->select('id','teachgroupName')->where('parentId',$data->schoolid)->get();
        return view('qiyun.admin.schoolTeacgroupleader.editSchoolTeacgroupleader',['data'=>$data]);
    }

    /**
     *执行教研组长编辑
     */
    public function doEditSchoolTeacgroupleader(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token','school','urlPath');
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('schoolteacgroupleader')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'教研组长信息修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研组长信息修改失败');
        }
    }

    /**
     *删除教研组长
     */
    public function delSchoolTeacgroupleader($id){
        $data = DB::table('schoolteacgroupleader')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'教研组长删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('教研组长删除失败');
        }
    }



    /**
     * 表单验证
     */
    protected function validator(array $data)
    {
        $rules = [
            'school'=>'required',
            'parentId'=>'required',
            'uid' => 'required',
        ];

        $messages = [
            'school.required' => '请选择学校',
            'parentId.required' => '请选择教研组名称',
            'uid.required' => '请选择至少一名教研组长',
        ];
        return Validator::make( $data, $rules, $messages );
    }
}
