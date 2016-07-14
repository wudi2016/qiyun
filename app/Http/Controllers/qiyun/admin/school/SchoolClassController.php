<?php

namespace App\Http\Controllers\qiyun\admin\school;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Auth;

class SchoolClassController extends Controller
{
    /**
     *班级列表
     */
    public function schoolClassList(Request $request){
        $query = DB::table('schoolclass as c');
        if($request['type'] == 1){
            $query = $query->where('c.id','like','%'.trim($request['search']).'%');
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
                ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                ->select('c.*','s.schoolName','g.gradeName')
                ->orderBy('c.id','desc')
                ->paginate(15);
            $data->organizes = DB::table('organize')->select('id','organize_name')->get();
        }
        switch(Auth::user()->level()){
            case 6:
                $data = $query
                    ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                    ->where('s.organizeid',Auth::user()->organizeID)
                    ->select('c.*','s.schoolName','g.gradeName')
                    ->orderBy('c.id','desc')
                    ->paginate(15);
                $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
                break;
            case 5:
                $data = $query
                    ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                    ->where('s.cityId',Auth::user()->organizeID)
                    ->select('c.*','s.schoolName','g.gradeName')
                    ->orderBy('c.id','desc')
                    ->paginate(15);
                $data->countynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
                break;
            case 4:
                $data = $query
                    ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                    ->where('s.countryId',Auth::user()->organizeID)
                    ->select('c.*','s.schoolName','g.gradeName')
                    ->orderBy('c.id','desc')
                    ->paginate(15);
                $data->schoolnames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
            case 3:
                $data = $query
                    ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                    ->where('s.id',Auth::user()->organizeID)
                    ->select('c.*','s.schoolName','g.gradeName')
                    ->orderBy('c.id','desc')
                    ->paginate(15);
                $data->gradenames = DB::table('schoolgrade')->where('parentId',Auth::user()->organizeID)->select('id','gradeName')->get();
                break;
            case 2:
                $data = $query
                    ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
                    ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
                    ->where('g.id',Auth::user()->organizeID)
                    ->select('c.*','s.schoolName','g.gradeName')
                    ->orderBy('c.id','desc')
                    ->paginate(15);
                $data->classnames = DB::table('schoolclass')->where('parentId',Auth::user()->organizeID)->select('id','classname')->get();
                break;
        }

        $data->type = $request['type'];
        $data->states = $state;
//        dd($data);
        return view('qiyun.admin.schoolClass.schoolClassList',['data'=>$data]);
    }

    /**
     *添加班级页
     */
    public function addSchoolClass(){
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
                $data->schoolGrades = DB::table('schoolgrade')->where('parentId',Auth::user()->organizeID)->select('id','gradeName')->get();
                break;
            case 2:
                $data = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->first();
                $data->schoolGrades = DB::table('schoolgrade')->where('parentId',Auth::user()->organizeID)->select('id','gradeName')->get();
                $data = DB::table('schoolgrade as g')
                    ->leftJoin('school as s','g.parentId','=','s.id')
                    ->where('g.id',Auth::user()->organizeID)
                    ->select('g.id as gradeid','g.gradeName','s.id','s.schoolName')
                    ->first();
                break;
        }
        return view('qiyun.admin.schoolClass.addSchoolClass',['data'=>$data]);
    }

    /**
     *执行添加班级
     */
    public function doAddSchoolClass(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token','school');
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('schoolclass')->insert($data)){
            return redirect('admin/message')->with(['status'=>'班级添加成功','redirect'=>'school/schoolClassList']);
        }else{
            return redirect()->back()->withInput()->withErrors('班级添加失败');
        }
    }

    /**
     *班级编辑页
     */
    public function editSchoolClass($id){
        $data = DB::table('schoolclass as c')
            ->leftJoin('schoolgrade as g','c.parentId','=','g.id') // 关联年级id
            ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
            ->where('c.id',$id)
            ->select('c.*','s.id as schoolid','s.organizeid','s.cityId','s.countryId','s.schoolName','g.id as gradeid','g.gradeName')
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

            $data->gradeNames = DB::table('schoolgrade')->where('parentId',$data->schoolid)->select('id','gradeName')->get();
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
        return view('qiyun.admin.schoolClass.editSchoolClass',['data'=>$data]);
    }

    /**
     *执行班级编辑
     */
    public function doEditSchoolClass(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token','school','urlPath');
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('schoolclass')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'班级信息修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('班级信息修改失败');
        }
    }

    /**
     *删除班级
     */
    public function delSchoolClass($id){
        if(DB::table('schoolheadteacher')->where('classid',$id)->get()){
            return redirect()->back()->withInput()->withErrors('此班级下面有班主任信息,请先删除班主任信息');
        }
        $data = DB::table('schoolclass')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'班级信息删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('班级信息删除失败');
        }
    }


    /**
     * 表单验证
     */
    protected function validator(array $data)
    {
        $rules = [
            'school'=>'required',
            'parentId' => 'required',
            'classname' => 'required',
        ];

        $messages = [
            'school.required' => '请选择学校',
            'parentId.required' => '请选择年级',
            'classname.required' => '请填写班级名称',
        ];
        return Validator::make( $data, $rules, $messages );
    }
}
