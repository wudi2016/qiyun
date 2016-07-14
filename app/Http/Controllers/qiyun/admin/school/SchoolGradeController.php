<?php

namespace App\Http\Controllers\qiyun\admin\school;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Auth;

class SchoolGradeController extends Controller
{
    /**
     *年级列表
     */
    public function schoolGradeList(Request $request){
        $query = DB::table('schoolgrade as g'); //年级表
        if($request['type'] == 1){
            $query = $query->where('g.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //学校名称查询
            $query = $query->where('s.schoolName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //年级名称查询
            $query = $query->where('g.gradeName','like','%'.trim($request['search']).'%');
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
                ->leftJoin('school as s','g.parentId','=','s.id')
                ->select('g.*','s.schoolName')
                ->orderBy('g.id','desc')
                ->paginate(15);
            $data->organizes = DB::table('organize')->select('id','organize_name')->get();
        }
        switch(Auth::user()->level()){
            case 6:
                $data = $query
                    ->leftJoin('school as s','g.parentId','=','s.id')
                    ->where('s.organizeid',Auth::user()->organizeID)
                    ->select('g.*','s.schoolName')
                    ->orderBy('g.id','desc')
                    ->paginate(15);
                $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
                break;
            case 5:
                $data = $query
                    ->leftJoin('school as s','g.parentId','=','s.id')
                    ->where('s.cityId',Auth::user()->organizeID)
                    ->select('g.*','s.schoolName')
                    ->orderBy('g.id','desc')
                    ->paginate(15);
                $data->countynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
                break;
            case 4:
                $data = $query
                    ->leftJoin('school as s','g.parentId','=','s.id')
                    ->where('s.countryId',Auth::user()->organizeID)
                    ->select('g.*','s.schoolName')
                    ->orderBy('g.id','desc')
                    ->paginate(15);
                $data->schoolnames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
            case 3:
                $data = $query
                    ->leftJoin('school as s','g.parentId','=','s.id')
                    ->where('s.id',Auth::user()->organizeID)
                    ->select('g.*','s.schoolName')
                    ->orderBy('g.id','desc')
                    ->paginate(15);
                break;
            case 2:
                $data = $query
                    ->leftJoin('school as s','g.parentId','=','s.id')
                    ->where('g.id',Auth::user()->organizeID)
                    ->select('g.*','s.schoolName')
                    ->orderBy('g.id','desc')
                    ->paginate(15);
                break;
        }
        $data->type = $request['type'];
        $data->states = $state;
        return view('qiyun.admin.schoolGrade.schoolGradeList',['data'=>$data]);
    }

    /**
     *添加年级信息页
     */
    public function addSchoolGrade(){
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
                break;
        }
        return view('qiyun.admin.schoolGrade.addSchoolGrade',['data'=>$data]);
    }

    /**
     *执行添加年级信息
     */
    public function doAddSchoolGrade(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token','school','yearid');
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('schoolgrade')->insert($data)){
            return redirect('admin/message')->with(['status'=>'年级添加成功','redirect'=>'school/schoolGradeList']);
        }else{
            return redirect()->back()->withInput()->withErrors('年级添加失败');
        }
    }

    /**
     *年级编辑页
     */
    public function editSchoolGrade($id){
        $data = DB::table('schoolgrade as g')
            ->leftJoin('school as s','g.parentId','=','s.id') //关联学校表
            ->select('g.*','s.id as schoolid','s.organizeid','s.cityId','s.countryId','s.schoolName')
            ->where('g.id',$id)
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
//        dd($data);
        return view('qiyun.admin.schoolGrade.editSchoolGrade',['data'=>$data]);
    }

    /**
     *执行年级编辑
     */
    public function doEditSchoolGrade(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token','urlPath');
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('schoolgrade')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'年级信息修改修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('年级信息修改失败');
        }
    }

    /**
     *删除年级
     */
    public function delSchoolGrade($id){
        if(DB::table('schoolclass')->where('parentId',$id)->get()){
            return redirect()->back()->withInput()->withErrors('此年级下面有班级信息,请先删除班级信息');
        }
        if(DB::table('schoolgradeleader')->where('gradeid',$id)->get()){
            return redirect()->back()->withInput()->withErrors('此年级下面有年级组长信息,请先删除年级组长信息');
        }
        if(DB::table('schoolsubject')->where('parentId',$id)->get()){
            return redirect()->back()->withInput()->withErrors('此年级下面有学科信息,请先删除学科信息');
        }
        $data = DB::table('schoolgrade')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'年级信息删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('年级信息删除失败');
        }
    }


    /**
     * 表单验证
     */
    protected function validator(array $data)
    {
        $rules = [
            'parentId'=>'required',
            'gradeName' => 'required',
            'period' => 'required',
        ];

        $messages = [
            'parentId.required' => '请选择学校',
            'gradeName.required' => '请填写年级名称',
            'period.required' => '请选选择所属学段',
        ];
        return Validator::make( $data, $rules, $messages );
    }
}
