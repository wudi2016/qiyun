<?php

namespace App\Http\Controllers\qiyun\admin\school;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Auth;

class SchoolTermController extends Controller
{
    /**
     *学期列表
     */
    public function schoolTermList(Request $request){
        $query = DB::table('informationterm as t');
        if($request['type'] == 1){
            $query = $query->where('t.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){ //学校名称查询
            $query = $query->where('s.schoolName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){ //年度名称查询
            $query = $query->where('r.reportName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //学期名称查询
            $query = $query->where('t.termName','like','%'.trim($request['search']).'%');
        }

        $state = array(
            'organizeid'=>null,
            'cityId'=>null,
            'cityall'=>null,
            'countryId'=>null,
            'countryall'=>null,
            'schoolid'=>null,
            'schoolall'=>null,
            'yearid'=>null,
            'yearall'=>null,
        );

        //多条件筛选
        require realpath(base_path('public')).'/admin/php/organ_city_county.php';
        if($request['schoolid']){
            $query = $query->where('s.id',$request['schoolid']);
            $state['schoolid'] = $request['schoolid'];
            $state['yearall'] = DB::table('informationreport')->where('parentId',$request['schoolid'])->select('id','reportName')->get();
        }
        if($request['yearid']){
            $query = $query->where('t.parentId',$request['yearid']);
            $state['yearid'] = $request['yearid'];
        }

        if(Auth::user()->level() > 6){
            $data = $query
                ->leftJoin('informationreport as r','t.parentId','=','r.id')
                ->leftJoin('school as s','r.parentId','=','s.id')
                ->select('t.*','r.reportName','s.schoolName')
                ->orderBy('t.id','desc')
                ->paginate(15);
            $data->organizes = DB::table('organize')->select('id','organize_name')->get();
        }
        switch(Auth::user()->level()){
            case 6:
                $data = $query
                    ->leftJoin('informationreport as r','t.parentId','=','r.id')
                    ->leftJoin('school as s','r.parentId','=','s.id')
                    ->where('s.organizeid',Auth::user()->organizeID)
                    ->select('t.*','r.reportName','s.schoolName')
                    ->orderBy('t.id','desc')
                    ->paginate(15);
                $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
                break;
            case 5:
                $data = $query
                    ->leftJoin('informationreport as r','t.parentId','=','r.id')
                    ->leftJoin('school as s','r.parentId','=','s.id')
                    ->where('s.cityId',Auth::user()->organizeID)
                    ->select('t.*','r.reportName','s.schoolName')
                    ->orderBy('t.id','desc')
                    ->paginate(15);
                $data->countynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
                break;
            case 4:
                $data = $query
                    ->leftJoin('informationreport as r','t.parentId','=','r.id')
                    ->leftJoin('school as s','r.parentId','=','s.id')
                    ->where('s.countryId',Auth::user()->organizeID)
                    ->select('t.*','r.reportName','s.schoolName')
                    ->orderBy('t.id','desc')
                    ->paginate(15);
                $data->schoolnames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
            case 3:
                $data = $query
                    ->leftJoin('informationreport as r','t.parentId','=','r.id')
                    ->leftJoin('school as s','r.parentId','=','s.id')
                    ->where('s.id',Auth::user()->organizeID)
                    ->select('t.*','r.reportName','s.schoolName')
                    ->orderBy('t.id','desc')
                    ->paginate(15);
                $data->yearnames = DB::table('informationreport')->where('parentId',Auth::user()->organizeID)->select('id','reportName')->get();
        }

        $data->type = $request['type'];
        $data->states = $state;
        return view('qiyun.admin.schoolTerm.schoolTermList',['data'=>$data]);
    }

    /**
     *添加学期
     */
    public function addSchoolTerm(){
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
                $data->schoolYear = DB::table('informationreport')->where('parentId',$data->id)->select('id','reportName')->get();
                break;
        }
        return view('qiyun.admin.schoolTerm.addSchoolTerm',['data'=>$data]);
    }

    /**
     *根据ajax传过来的学校id查出id下所有的年度
     */
    public function ajaxSchoolYear(Request $request){
        $data = DB::table('informationreport')->where('parentId',$request['id'])->select('id','reportName')->get();
        echo json_encode($data);
    }

    /**
     *根据ajax传过来的年度id查出此年度下的所有学期
     */
    public function ajaxSchoolTerm(Request $request){
        $data = DB::table('informationterm')->where('parentId',$request['id'])->select('id','termName')->get();
        echo json_encode($data);
    }

    /**
     *根据ajax传过来的学校id查出此学校下的所有年级
     */
    public function ajaxSchoolGrade(Request $request){
        $data = DB::table('schoolgrade')->where('parentId',$request['id'])->select('id','gradeName')->get();
        echo json_encode($data);
    }


    /**
     *根据ajax传过来的年级id查出此年级下的所有班级
     */
    public function ajaxSchoolClass(Request $request){
        $data = DB::table('schoolclass')->where('parentId',$request['id'])->select('id','classname')->get();
        echo json_encode($data);
    }
    /**
     *根据ajax传过来的年级id查出此年级下的所有学科
     */
    public function ajaxSchoolSubject(Request $request){
        $data = DB::table('schoolsubject')->where('parentId',$request['id'])->select('id','subjectName')->get();
        echo json_encode($data);
    }

    /**
     * 执行添加学期
     */
    public function doAddSchoolTerm(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token','school');
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('informationterm')->insert($data)){
            return redirect('admin/message')->with(['status'=>'学期添加成功','redirect'=>'school/schoolTermList']);
        }else{
            return redirect()->back()->withInput()->withErrors('学期添加失败');
        }
    }

    /**
     *学期编辑页
     */
    public function editSchoolTerm($id){
        $data = DB::table('informationterm as t')
            ->leftJoin('informationreport as r','t.parentId','=','r.id')
            ->leftJoin('school as s','r.parentId','=','s.id')
            ->where('t.id',$id)
            ->select('t.*','r.reportTitle as yearreportTitle','s.id as schoolid','s.organizeid','s.cityId','s.countryId','s.schoolName')
            ->first();
        if($data->countryId){
            $data->schoolNames = DB::table('school')->where('countryId',$data->countryId)->select('id','schoolName')->get();
        }elseif($data->cityId){
            $data->schoolNames = DB::table('school')->where('cityId',$data->cityId)->select('id','schoolName')->get();
        }else{
            $data->schoolNames = DB::table('school')->where('organizeid',$data->organizeid)->select('id','schoolName')->get();
        }

        if(Auth::user()->level() > 6){
//            $data->schoolNames = DB::table('school')->select('id','schoolName')->get();//取出所有学校
            $data->organizenames = DB::table('organize')->select('id','organize_name')->get();
            $data->citynames = DB::table('city')->where('parent_id',$data->organizeid)->select('id','city_name')->get();
            $data->countrynames = DB::table('county')->where('parent_id',$data->cityId)->select('id','county_name')->get();
        }
        switch(Auth::user()->level()){
            case 6:
//                $data->schoolNames = DB::table('school')->where('organizeid',Auth::user()->organizeID)->select('id','schoolName')->get();//取出所有学校
                $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
                $data->countrynames = DB::table('county')->where('parent_id',$data->cityId)->select('id','county_name')->get();
                break;
            case 5:
//                $data->schoolNames = DB::table('school')->where('cityId',Auth::user()->organizeID)->select('id','schoolName')->get();//取出所有学校
                $data->countrynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
                break;
            case 4:
                $data->schoolNames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();//取出所有学校
                break;
            case 3:
                $data->schoolNames = DB::table('school')->where('id',Auth::user()->organizeID)->select('id','schoolName')->get();//取出所有学校
                break;
        }
        //取出该学校下的所有年度
        $data->schoolYears = DB::table('informationreport')
            ->where('parentId',$data->schoolid)
            ->select('id','reportName')
            ->get();
//        dd($data);
        return view('qiyun.admin.schoolTerm.editSchoolTerm',['data'=>$data]);
    }

    /**
     *执行学期编辑
     */
    public function doEditSchoolTerm(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token','school','urlPath');
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('informationterm')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'学期信息修改修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('学期信息修改失败');
        }
    }

    /**
     *删除学期编辑
     */
    public function delSchoolTerm($id){
        $data = DB::table('informationterm')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'学期信息删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('学期信息删除失败');
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
            'termName' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
            'reportTitle' => 'required',
            'reportBody' => 'required',
            'reportTermTime'=>'required',
        ];

        $messages = [
            'school.required' => '请选择学校',
            'parentId.required' => '请选择年度名称',
            'termName.required' => '请填写学期名称',
            'startTime.required' => '请填写学期开始日期',
            'endTime.required' => '请填写学期结束日期',
            'reportTitle.required' => '请填写学期信息报告标题',
            'reportBody.required' => '请填写学期信息报告内容',
            'reportTermTime.required'=>'请填写学期信息报告年'
        ];
        return Validator::make( $data, $rules, $messages );
    }
}
