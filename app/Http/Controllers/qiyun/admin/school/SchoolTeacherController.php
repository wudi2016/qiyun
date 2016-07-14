<?php

namespace App\Http\Controllers\qiyun\admin\school;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Auth;

class SchoolTeacherController extends Controller
{
    /**
     *任课老师列表
     */
    public function schoolTeacherList(Request $request){
        $query = DB::table('schoolteachers as teac');
        if($request['type'] == 1){
            $query = $query->where('teac.id','like','%'.trim($request['search']).'%');
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
        if($request['type'] == 5){ //任课老师查询
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
            'subjectid'=>null,
            'subjectall'=>null,
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
            $state['subjectall'] = DB::table('schoolsubject')->where('parentId',$request['gradeid'])->select('id','subjectName')->get();
        }
        if($request['classid']){
            $query = $query->where('c.id',$request['classid']);
            $state['classid'] = $request['classid'];
        }
        if($request['subjectid']){
            $query = $query->where('sub.id',$request['subjectid']);
            $state['subjectid'] = $request['subjectid'];
        }

        if(Auth::user()->level() > 6){
            $data = $query
                ->leftJoin('users','teac.uid','=','users.id')
                ->leftJoin('schoolsubject as sub','teac.subjectid','=','sub.id') //关联学科
                ->leftJoin('schoolclass as c','teac.classid','=','c.id') //关联班级
                ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
//                ->select('teac.*','s.schoolName','g.gradeName','c.classname','sub.subjectName','users.realname')
                ->orderBy('teac.id','desc');
//                ->paginate(15);
            $export = $data->select('teac.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'c.classname as 班级名称', 'sub.subjectName as 学科', 'users.realname as 老师', 'teac.status as 状态(0:锁定1:激活)', 'teac.created_at as 创建时间', 'teac.updated_at as 修改时间')->get();
            $data = $data->select('teac.*','s.schoolName','g.gradeName','c.classname','sub.subjectName','users.realname')->paginate(15);
            $data->organizes = DB::table('organize')->select('id','organize_name')->get();
        }
        if(Auth::user()->level() == 6){
            $data = $query
                ->leftJoin('users','teac.uid','=','users.id')
                ->leftJoin('schoolsubject as sub','teac.subjectid','=','sub.id') //关联学科
                ->leftJoin('schoolclass as c','teac.classid','=','c.id') //关联班级
                ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                ->where('s.organizeid',Auth::user()->organizeID)
                ->orderBy('teac.id','desc');
            $export = $data->select('teac.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'c.classname as 班级名称', 'sub.subjectName as 学科', 'users.realname as 老师', 'teac.status as 状态(0:锁定1:激活)', 'teac.created_at as 创建时间', 'teac.updated_at as 修改时间')->get();
            $data = $data ->select('teac.*','s.schoolName','g.gradeName','c.classname','sub.subjectName','users.realname')->paginate(15);
            $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
        }
        if(Auth::user()->level() == 5){
            $data = $query
                ->leftJoin('users','teac.uid','=','users.id')
                ->leftJoin('schoolsubject as sub','teac.subjectid','=','sub.id') //关联学科
                ->leftJoin('schoolclass as c','teac.classid','=','c.id') //关联班级
                ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                ->where('s.cityId',Auth::user()->organizeID)
                ->orderBy('teac.id','desc');
            $export = $data->select('teac.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'c.classname as 班级名称', 'sub.subjectName as 学科', 'users.realname as 老师', 'teac.status as 状态(0:锁定1:激活)', 'teac.created_at as 创建时间', 'teac.updated_at as 修改时间')->get();
            $data = $data ->select('teac.*','s.schoolName','g.gradeName','c.classname','sub.subjectName','users.realname')->paginate(15);
            $data->countynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
        }
        if(Auth::user()->level() == 4){
            $data = $query
                ->leftJoin('users','teac.uid','=','users.id')
                ->leftJoin('schoolsubject as sub','teac.subjectid','=','sub.id') //关联学科
                ->leftJoin('schoolclass as c','teac.classid','=','c.id') //关联班级
                ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                ->where('s.countryId',Auth::user()->organizeID)
                ->orderBy('teac.id','desc');
            $export = $data->select('teac.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'c.classname as 班级名称', 'sub.subjectName as 学科', 'users.realname as 老师', 'teac.status as 状态(0:锁定1:激活)', 'teac.created_at as 创建时间', 'teac.updated_at as 修改时间')->get();
            $data = $data ->select('teac.*','s.schoolName','g.gradeName','c.classname','sub.subjectName','users.realname')->paginate(15);
            $data->schoolnames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
        }
        if(Auth::user()->level() == 3){
            $data = $query
                ->leftJoin('users','teac.uid','=','users.id')
                ->leftJoin('schoolsubject as sub','teac.subjectid','=','sub.id') //关联学科
                ->leftJoin('schoolclass as c','teac.classid','=','c.id') //关联班级
                ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                ->where('s.id',Auth::user()->organizeID)
                ->orderBy('teac.id','desc');
            $export = $data->select('teac.id', 's.schoolName as 学校名称', 'g.gradeName as 年级名称', 'c.classname as 班级名称', 'sub.subjectName as 学科', 'users.realname as 老师', 'teac.status as 状态(0:锁定1:激活)', 'teac.created_at as 创建时间', 'teac.updated_at as 修改时间')->get();
            $data = $data ->select('teac.*','s.schoolName','g.gradeName','c.classname','sub.subjectName','users.realname')->paginate(15);
            $data->gradenames = DB::table('schoolgrade')->where('parentId',Auth::user()->organizeID)->select('id','gradeName')->get();
        }
        $data->type = $request['type'];
        $data->states = $state;
        $export = json_encode($export);
//        dd($data);
        return view('qiyun.admin.schoolTeacher.schoolTeacherList',['data'=>$data,'export'=>$export]);
    }

    /**
     *添加任课老师
     */
    public function addSchoolTeacher(){
        if(Auth::user()->level() > 6){
            $data = DB::table('organize')->select('id','organize_name')->get();
        }
        switch(Auth::user()->level()){
            case 6:
                $data = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
                break;
            case 5:
                $data = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
                break;
            case 4:
                $data = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
            case 3:
                $data = DB::table('school')->where('id',Auth::user()->organizeID)->select('id','schoolName')->first();
                $data->shoolGrade = DB::table('schoolgrade')->where('parentId',$data->id)->select('id','gradeName')->get();
                break;
        }
        $names = DB::table('subjectmember as subm')
            ->leftJoin('users as u','subm.userId','=','u.id')
            ->select('u.id','u.realname')
            ->get();
//        dd($data);
        return view('qiyun.admin.schoolTeacher.addSchoolTeacher',['data'=>$data,'names'=>$names]);
    }

    /**
     *根据ajax传过来的年级id查出此年级下的所有老师
     */
    public function ajaxTeachers(Request $request){
        $subids = DB::table('schoolsubject')->where('parentId',$request['schoolgradeid'])->lists('id');
        $data = DB::table('subjectmember as subm')
            ->leftJoin('users as u','subm.userId','=','u.id')
            ->whereIn('parentId',$subids)
            ->where('parentId',$request['schoolsubjectid'])
            ->select('subm.id','subm.userId','u.realname')
            ->get();
        echo json_encode($data);
    }

    /**
     *执行添加任课老师
     */
    public function doAddSchoolTeacher(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        foreach($request['uid'] as $val){
            $data = DB::table('schoolteachers')->insert(
                ['subjectid'=>$request['subjectid'],
                    'classid'=>$request['classid'],
                    'uid'=>$val,
                    'status'=>$request['status'],
                    'created_at'=>date('Y-m-d H:i:s',time()),
                    'updated_at'=>date('Y-m-d H:i:s',time()),
                ]
            );
        }
        if($data){
            return redirect('admin/message')->with(['status'=>'任课老师添加成功','redirect'=>'school/schoolTeacherList']);
        }else{
            return redirect()->back()->withInput()->withErrors('任课老师添加失败');
        }
    }

    /**
     *任课老师编辑页
     */
    public function editSchoolTeacher($id){
        $data = DB::table('schoolteachers as teac')
            ->leftJoin('users','teac.uid','=','users.id')
            ->leftJoin('schoolsubject as sub','teac.subjectid','=','sub.id') //关联学科
            ->leftJoin('schoolclass as c','teac.classid','=','c.id') //关联班级
            ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
            ->leftJoin('school as s','g.parentId','=','s.id') //年度表关联学校表
            ->select('teac.*','s.id as schoolid','s.organizeid','s.cityId','s.countryId','s.schoolName','g.id as gradeid','g.gradeName','c.classname','sub.subjectName','users.realname')
            ->where('teac.id',$id)
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
        $data->schoolsubjects = DB::table('schoolsubject')->where('parentId',$data->gradeid)->select('id','subjectName')->get();
//        dd($data);
        return view('qiyun.admin.schoolTeacher.editSchoolTeacher',['data'=>$data]);

    }

    /**
     *执行任课老师编辑
     */
    public function doEditSchoolTeacher(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token','school','gradeid','urlPath');
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('schoolteachers')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'任课老师信息修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('任课老师信息修改失败');
        }
    }

    /**
     *删除任课老师
     */
    public function delSchoolTeacher($id){
        $data = DB::table('schoolteachers')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'任课老师删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('任课老师删除失败');
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
            'subjectid' => 'required',
            'uid' => 'required',
        ];

        $messages = [
            'school.required' => '请选择学校',
            'gradeid.required' => '请选择年级',
            'classid.required' => '请选择班级',
            'subjectid.required' => '请选择学科',
            'uid.required' => '请选择至少一名任课老师',
        ];
        return Validator::make( $data, $rules, $messages );
    }
}
