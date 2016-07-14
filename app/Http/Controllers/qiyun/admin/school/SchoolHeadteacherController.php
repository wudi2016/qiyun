<?php

namespace App\Http\Controllers\qiyun\admin\school;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Auth;
use Session;

class SchoolHeadteacherController extends Controller
{
    /**
     *班主任列表
     */
    public function schoolHeadteaherList(Request $request){
        $query = DB::table('schoolheadteacher as h');
        if($request['type'] == 1){
            $query = $query->where('h.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //学校名称查询
            $query = $query->where('s.schoolName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //年级名称查询
            $query = $query->where('g.gradeName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //班级名称查询
            $query = $query->where('c.classname','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 5){ //班主任查询
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
            $query = $query->where('c.parentId',$request['gradeid']);
            $state['gradeid'] = $request['gradeid'];
            $state['classall'] = DB::table('schoolclass')->where('parentId',$request['gradeid'])->select('id','classname')->get();
        }
        if($request['classid']){
            $query = $query->where('c.id',$request['classid']);
            $state['classid'] = $request['classid'];
        }

        if(Auth::user()->level() > 6){
            $data = $query
                ->leftJoin('users','h.uid','=','users.id')
                ->leftJoin('schoolclass as c','h.classid','=','c.id') //关联班级
                ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                ->leftJoin('school as s','g.parentId','=','s.id') //年度表关联学校表
//                ->select('h.*','s.schoolName','g.gradeName','c.classname','users.realname')
                ->orderBy('h.id','desc');
//                ->paginate(15);
            $export = $data->select('h.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'c.classname as 班级名称', 'users.realname as 班主任', 'h.status as 状态(0:锁定1:激活)', 'h.created_at as 创建时间', 'h.updated_at as 修改时间')->get();
            $data = $data->select('h.*','s.schoolName','g.gradeName','c.classname','users.realname')->paginate(15);
            $data->organizes = DB::table('organize')->select('id','organize_name')->get();
        }
        switch(Auth::user()->level()){
            case 6:
                $data = $query
                    ->leftJoin('users','h.uid','=','users.id')
                    ->leftJoin('schoolclass as c','h.classid','=','c.id') //关联班级
                    ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //年度表关联学校表
                    ->where('s.organizeid',Auth::user()->organizeID)
                    ->orderBy('h.id','desc');
                $export = $data->select('h.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'c.classname as 班级名称', 'users.realname as 班主任', 'h.status as 状态(0:锁定1:激活)', 'h.created_at as 创建时间', 'h.updated_at as 修改时间')->get();
                $data = $data->select('h.*','s.schoolName','g.gradeName','c.classname','users.realname')->paginate(15);
                $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
                break;
            case 5:
                $data = $query
                    ->leftJoin('users','h.uid','=','users.id')
                    ->leftJoin('schoolclass as c','h.classid','=','c.id') //关联班级
                    ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //年度表关联学校表
                    ->where('s.cityId',Auth::user()->organizeID)
                    ->orderBy('h.id','desc');
                $export = $data->select('h.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'c.classname as 班级名称', 'users.realname as 班主任', 'h.status as 状态(0:锁定1:激活)', 'h.created_at as 创建时间', 'h.updated_at as 修改时间')->get();
                $data = $data->select('h.*','s.schoolName','g.gradeName','c.classname','users.realname')->paginate(15);
                $data->countynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
                break;
            case 4:
                $data = $query
                    ->leftJoin('users','h.uid','=','users.id')
                    ->leftJoin('schoolclass as c','h.classid','=','c.id') //关联班级
                    ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //年度表关联学校表
                    ->where('s.countryId',Auth::user()->organizeID)
                    ->orderBy('h.id','desc');
                $export = $data->select('h.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'c.classname as 班级名称', 'users.realname as 班主任', 'h.status as 状态(0:锁定1:激活)', 'h.created_at as 创建时间', 'h.updated_at as 修改时间')->get();
                $data = $data->select('h.*','s.schoolName','g.gradeName','c.classname','users.realname')->paginate(15);
                $data->schoolnames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
            case 3:
                $data = $query
                    ->leftJoin('users','h.uid','=','users.id')
                    ->leftJoin('schoolclass as c','h.classid','=','c.id') //关联班级
                    ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //年度表关联学校表
                    ->where('s.id',Auth::user()->organizeID)
                    ->orderBy('h.id','desc');
                $export = $data->select('h.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'c.classname as 班级名称', 'users.realname as 班主任', 'h.status as 状态(0:锁定1:激活)', 'h.created_at as 创建时间', 'h.updated_at as 修改时间')->get();
                $data = $data->select('h.*','s.schoolName','g.gradeName','c.classname','users.realname')->paginate(15);
                $data->gradenames = DB::table('schoolgrade')->where('parentId',Auth::user()->organizeID)->select('id','gradeName')->get();
                break;
            case 2:
                $data = $query
                    ->leftJoin('users','h.uid','=','users.id')
                    ->leftJoin('schoolclass as c','h.classid','=','c.id') //关联班级
                    ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //年度表关联学校表
                    ->where('g.id',Auth::user()->organizeID)
                    ->orderBy('h.id','desc');
                $export = $data->select('h.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'c.classname as 班级名称', 'users.realname as 班主任', 'h.status as 状态(0:锁定1:激活)', 'h.created_at as 创建时间', 'h.updated_at as 修改时间')->get();
                $data = $data->select('h.*','s.schoolName','g.gradeName','c.classname','users.realname')->paginate(15);
                $data->classnames = DB::table('schoolclass')->where('parentId',Auth::user()->organizeID)->select('id','classname')->get();
                break;
        }

        $data->type = $request['type'];
        $data->states = $state;
        $export = json_encode($export);
        return view('qiyun.admin.schoolHeadteacher.schoolHeadteacherList',['data'=>$data,'export'=>$export]);
    }

    /**
     *添加班主任页
     */
    public function addSchoolHeadteaher(){
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
            case 2:
                $data = DB::table('schoolgrade as g')
                    ->leftJoin('school as s','g.parentId','=','s.id')
                    ->where('g.id',Auth::user()->organizeID)
                    ->select('g.parentId','s.schoolName','g.id','g.gradeName')
                    ->first();
                $data->schoolClass = DB::table('schoolclass')->where('parentId',$data->id)->select('id','classname')->get();
                $names = DB::table('users')->where('schoolId',$data->parentId)->where('type',1)->select('id','realname')->get();
                break;
        }
        return view('qiyun.admin.schoolHeadteacher.addSchoolHeadteacher',['data'=>$data,'names'=>$names]);
    }

    /**
     *根据ajax传过来的Id查出此学校下的所有老师
     */
    public function ajaxallteachers(Request $request){
        $query = DB::table('users');
        if($request['type'] == 2){ //账号
            $query->where('username','like','%'.$request['search'].'%');
        }
        if($request['type'] == 3){ //姓名
            $query->where('realname','like','%'.$request['search'].'%');
        }
        $data = $query
            ->where('schoolId',$request['id'])
            ->where('type',1)
            ->select('id','username','realname')
            ->get();
        echo json_encode($data);
    }

    /**
     *执行添加班主任
     */
    public function doAddSchoolHeadteaher(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            $citys = DB::table('city')->where('parent_id',$request['organize'])->select('id','city_name')->get();
            $countys = DB::table('county')->where('parent_id',$request['city'])->select('id','county_name')->get();

            if($request['city'] && !$request['county']){
                $schools = DB::table('school')->where('cityId',$request['city'])->select('id','schoolName')->get();
            }elseif($request['county']){
                $schools = DB::table('school')->where('countryId',$request['county'])->select('id','schoolName')->get();
            }else{
                $schools = DB::table('school')->where('organizeid',$request['organize'])->select('id','schoolName')->get();
            }
            $grades = DB::table('schoolgrade')->where('parentId',$request['school'])->select('id','gradeName')->get();
            $classes = DB::table('schoolclass')->where('parentId',$request['gradeid'])->select('id','classname')->get();
            $teachers = DB::table('users')->where('schoolId',$request['school'])->where('type',1)->select('id','username','realname')->get();
            return Redirect()->back()->withInput()->withErrors($validator)
                ->with(Session::flash('citys',$citys))
                ->with(Session::flash('countys',$countys))
                ->with(Session::flash('schools', $schools))
                ->with(Session::flash('grades', $grades))
                ->with(Session::flash('classes',$classes))
                ->with(Session::flash('teachers',$teachers));
        }
//        $data = $request->except('_token','school','gradeid');
        $data['classid'] = $request['classid'];
        $data['uid'] = $request['uid'];
        $data['status'] = $request['status'];
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('schoolheadteacher')->insert($data)){
            return redirect('admin/message')->with(['status'=>'班主任添加成功','redirect'=>'school/schoolHeadteaherList']);
        }else{
            return redirect()->back()->withInput()->withErrors('班主任添加失败');
        }
    }

    /**
     *编辑班主任页
     */
    public function editSchoolHeadteaher($id){
        $data = DB::table('schoolheadteacher as h')
            ->leftJoin('users','h.uid','=','users.id')
            ->leftJoin('schoolclass as c','h.classid','=','c.id') //关联班级
            ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
            ->leftJoin('school as s','g.parentId','=','s.id') //年度表关联学校表
            ->select('h.*','s.id as schoolid','s.organizeid','s.cityId','s.countryId','s.schoolName','g.id as gradeid','g.gradeName','c.classname','users.realname')
            ->where('h.id',$id)
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
        $data->classnames = DB::table('schoolclass')->where('parentId',$data->gradeid)->select('id','classname')->get();
        return view('qiyun.admin.schoolHeadteacher.editSchoolHeadteacher',['data'=>$data]);
    }

    /**
     *执行班主任编辑
     */
    public function doEditSchoolHeadteaher(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token','school','gradeid','urlPath');
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('schoolheadteacher')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'班主任信息修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('班主任信息修改失败');
        }
    }

    /**
     *删除班主任
     */
    public function delSchoolHeadteaher($id){
        $data = DB::table('schoolheadteacher')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'班主任删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('班主任删除失败');
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
            'classid' => 'required',
            'uid' => 'required',
        ];

        $messages = [
            'school.required' => '请选择学校',
            'gradeid.required' => '请选择年级',
            'classid.required' => '请选择班级',
            'uid.required' => '请选择班主任',
        ];
        return Validator::make( $data, $rules, $messages );
    }
}
