<?php

namespace App\Http\Controllers\qiyun\admin\school;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Auth;

class SchoolGradeleaderController extends Controller
{
    /**
     *年级组长列表
     */
    public function schoolGradeleaderList(Request $request){
        $query = DB::table('schoolgradeleader as l');
        if($request['type'] == 1){
            $query = $query->where('l.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //学校名称查询
            $query = $query->where('s.schoolName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //年级名称查询
            $query = $query->where('g.gradeName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //年级组长查询
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
            'gradeid'=>null,
            'gradeall'=>null,
            'classid'=>null,
            'classall'=>null,
        );
        //多条件筛选
        require realpath(base_path('public')).'/admin/php/organ_city_county.php';
        if($request['schoolid']){
            $query = $query->where('s.id',$request['schoolid']);
            $state['schoolid'] = $request['schoolid'];
            $state['gradeall'] = DB::table('schoolgrade')->where('parentId',$request['schoolid'])->select('id','gradeName')->get();
        }
        if($request['gradeid']){
            $query = $query->where('g.id',$request['gradeid']);
            $state['gradeid'] = $request['gradeid'];
            $state['classall'] = DB::table('schoolclass')->where('parentId',$request['gradeid'])->select('id','classname')->get();
        }

        if(Auth::user()->level() > 6){
            $data = $query
                ->leftJoin('users','l.uid','=','users.id')
                ->leftJoin('schoolgrade as g','l.gradeid','=','g.id') // 关联年级id
                ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
//                ->select('l.*','s.schoolName','g.gradeName','users.realname')
                ->orderBy('l.id','desc');
//                ->paginate(15);
            $export = $data->select('l.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'users.realname as 年级组长', 'l.status as 状态(0:锁定1:激活)', 'l.created_at as 创建时间', 'l.updated_at as 修改时间')->get();
            $data = $data->select('l.*','s.schoolName','g.gradeName','users.realname')->paginate(15);
            $data->organizes = DB::table('organize')->select('id','organize_name')->get();
        }
        switch(Auth::user()->level()){
            case 6:
                $data = $query
                    ->leftJoin('users','l.uid','=','users.id')
                    ->leftJoin('schoolgrade as g','l.gradeid','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                    ->where('s.organizeid',Auth::user()->organizeID)
                    ->orderBy('l.id','desc');
                $export = $data->select('l.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'users.realname as 年级组长', 'l.status as 状态(0:锁定1:激活)', 'l.created_at as 创建时间', 'l.updated_at as 修改时间')->get();
                $data = $data->select('l.*','s.schoolName','g.gradeName','users.realname')->paginate(15);
                $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
                break;
            case 5:
                $data = $query
                    ->leftJoin('users','l.uid','=','users.id')
                    ->leftJoin('schoolgrade as g','l.gradeid','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                    ->where('s.cityId',Auth::user()->organizeID)
                    ->orderBy('l.id','desc');
                $export = $data->select('l.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'users.realname as 年级组长', 'l.status as 状态(0:锁定1:激活)', 'l.created_at as 创建时间', 'l.updated_at as 修改时间')->get();
                $data = $data->select('l.*','s.schoolName','g.gradeName','users.realname')->paginate(15);
                $data->countynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
                break;
            case 4:
                $data = $query
                    ->leftJoin('users','l.uid','=','users.id')
                    ->leftJoin('schoolgrade as g','l.gradeid','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                    ->where('s.countryId',Auth::user()->organizeID)
                    ->orderBy('l.id','desc');
                $export = $data->select('l.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'users.realname as 年级组长', 'l.status as 状态(0:锁定1:激活)', 'l.created_at as 创建时间', 'l.updated_at as 修改时间')->get();
                $data = $data->select('l.*','s.schoolName','g.gradeName','users.realname')->paginate(15);
                $data->schoolnames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
            case 3:
                $data = $query
                    ->leftJoin('users','l.uid','=','users.id')
                    ->leftJoin('schoolgrade as g','l.gradeid','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                    ->where('s.id',Auth::user()->organizeID)
                    ->orderBy('l.id','desc');
                $export = $data->select('l.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'users.realname as 年级组长', 'l.status as 状态(0:锁定1:激活)', 'l.created_at as 创建时间', 'l.updated_at as 修改时间')->get();
                $data = $data->select('l.*','s.schoolName','g.gradeName','users.realname')->paginate(15);
                $data->gradenames = DB::table('schoolgrade')->where('parentId',Auth::user()->organizeID)->select('id','gradeName')->get();
                break;
        }
        $data->type = $request['type'];
        $data->states = $state;
        $export = json_encode($export);
        return view('qiyun.admin.schoolGradeleader.schoolGradeleaderList',['data'=>$data,'export'=>$export]);
    }

    /**
     *添加年级组长
     */
    public function addSchoolGradeleader(){
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
                $data->schoolGrade = DB::table('schoolgrade')->where('parentId',$data->id)->select('id','gradeName')->get();
                $names = DB::table('users')->where('schoolId',Auth::user()->organizeID)->where('type',1)->select('id','realname')->get();
                break;
        }
        return view('qiyun.admin.schoolGradeleader.addSchoolGradeleader',['data'=>$data,'names'=>$names]);
    }

    /**
     *执行添加年级组长
     */
    public function doAddSchoolGradeleader(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        foreach($request['uid'] as $val){
            $data = DB::table('schoolgradeleader')->insert(
                [
                    'gradeid'=>$request['gradeid'],
                    'uid'=>$val,
                    'status'=>$request['status'],
                    'created_at'=>date('Y-m-d H:i:s',time()),
                    'updated_at'=>date('Y-m-d H:i:s',time()),
                ]
            );
        }
        if($data){
            return redirect('admin/message')->with(['status'=>'年级组长添加成功','redirect'=>'school/schoolGradeleaderList']);
        }else{
            return redirect()->back()->withInput()->withErrors('年级组长添加失败');
        }
    }

    /**
     *年级组长编辑页
     */
    public function editSchoolGradeleader($id){
        $data = DB::table('schoolgradeleader as l')
            ->leftJoin('users','l.uid','=','users.id')
            ->leftJoin('schoolgrade as g','l.gradeid','=','g.id') // 关联年级id
            ->leftJoin('school as s','g.parentId','=','s.id') //年度表关联学校表
            ->select('l.*','s.id as schoolid','s.organizeid','s.cityId','s.countryId','s.schoolName','g.id as gradeid','g.gradeName','users.realname')
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
        $data->gradeNames = DB::table('schoolgrade')->where('parentId',$data->schoolid)->select('id','gradeName')->get();
        return view('qiyun.admin.schoolGradeleader.editSchoolGradeleader',['data'=>$data]);
    }

    /**
     *执行年级组长编辑
     */
    public function doEitSchoolGradeleader(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token','school','urlPath');
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('schoolgradeleader')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'年级组长信息修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('年级组长信息修改失败');
        }
    }

    /**
     *删除年级组长
     */
    public function delSchoolGradeleader($id){
        $data = DB::table('schoolgradeleader')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'年级组长删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('年级组长删除失败');
        }
    }


    /**
     * 表单验证
     */
    protected function validator(array $data)
    {
        $rules = [
            'school'=>'required',
            'gradeid' => 'required',
            'uid' => 'required',
        ];

        $messages = [
            'school.required' => '请选择学校',
            'gradeid.required' => '请选择年级',
            'uid.required' => '请选择年级组长',
        ];
        return Validator::make( $data, $rules, $messages );
    }
}
