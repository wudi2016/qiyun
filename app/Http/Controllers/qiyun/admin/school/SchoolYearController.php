<?php

namespace App\Http\Controllers\qiyun\admin\school;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Auth;

class SchoolYearController extends Controller
{
    /**
     *学校年度信息列表
     */
    public function schoolYearList(Request $request){
        $query = DB::table('informationreport as in');
        if($request['type'] == 1){
            $query = $query->where('in.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){
            $query = $query->where('s.schoolName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){
            $query = $query->where('in.reportName','like','%'.trim($request['search']).'%');
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
//        if($request['organizeid']){
//            $query = $query->where('s.organizeid',$request['organizeid']);
//            $state['organizeid'] = $request['organizeid'];
//            $state['cityall'] = DB::table('city')->where('parent_id',$request['organizeid'])->select('id','city_name')->get();
//            $state['schoolall'] = DB::table('school')->where('organizeid',$request['organizeid'])->select('id','schoolName')->get();
//        }
//        if($request['cityId']){
//            $query = $query->where('s.cityId',$request['cityId']);
//            $state['cityId'] = $request['cityId'];
//            $state['countryall'] = DB::table('county')->where('parent_id',$request['cityId'])->select('id','county_name')->get();
//            $state['schoolall'] = DB::table('school')->where('cityId',$request['cityId'])->select('id','schoolName')->get();
//        }
//        if($request['countryId']){
//            $query = $query->where('s.countryId',$request['countryId']);
//            $state['countryId'] = $request['countryId'];
//            $state['schoolall'] = DB::table('school')->where('countryId',$request['countryId'])->select('id','schoolName')->get();
//        }
        require realpath(base_path('public')).'/admin/php/organ_city_county.php';
        if($request['schoolid']){
            $query = $query->where('s.id',$request['schoolid']);
            $state['schoolid'] = $request['schoolid'];
            $state['yearall'] = DB::table('informationreport')->where('parentId',$request['schoolid'])->select('id','reportName')->get();
        }
        if($request['yearid']){
            $query = $query->where('in.id',$request['yearid']);
            $state['yearid'] = $request['yearid'];
        }

        if(Auth::user()->level() > 6){
            $data = $query
                ->leftJoin('school as s','in.parentId','=','s.id')
                ->select('in.*','s.schoolName')
                ->orderBy('in.id','desc')
                ->paginate(15);
            $data->organizes = DB::table('organize')->select('id','organize_name')->get();
        }
        switch(Auth::user()->level()){
            case 6:
                $data = $query
                    ->leftJoin('school as s','in.parentId','=','s.id')
                    ->where('s.organizeid',Auth::user()->organizeID)
                    ->select('in.*','s.schoolName')
                    ->orderBy('in.id','desc')
                    ->paginate(15);
                $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
                break;
            case 5:
                $data = $query
                    ->leftJoin('school as s','in.parentId','=','s.id')
                    ->where('s.cityId',Auth::user()->organizeID)
                    ->select('in.*','s.schoolName')
                    ->orderBy('in.id','desc')
                    ->paginate(15);
                $data->countynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
                break;
            case 4:
                $data = $query
                    ->leftJoin('school as s','in.parentId','=','s.id')
                    ->where('s.countryId',Auth::user()->organizeID)
                    ->select('in.*','s.schoolName')
                    ->orderBy('in.id','desc')
                    ->paginate(15);
                $data->schoolnames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
            case 3:
                $data = $query
                    ->leftJoin('school as s','in.parentId','=','s.id')
                    ->where('s.id',Auth::user()->organizeID)
                    ->select('in.*','s.schoolName')
                    ->orderBy('in.id','desc')
                    ->paginate(15);
                $data->yearnames = DB::table('informationreport')->where('parentId',Auth::user()->organizeID)->select('id','reportName')->get();
                break;
        }
        $data->type = $request['type'];
        $data->states = $state;
//        dd($data);
        return view('qiyun.admin.schoolYear.schoolYearList',['data'=>$data]);
    }

    /**
     *添加学校年度信息页
     */
    public function addSchoolYear(){
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
        return view('qiyun.admin.schoolYear.addSchoolYear',['data'=>$data]);
    }

    /**
     *执行添加学校年度信息
     */
    public function doAddSchoolYear(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $data = $request->except('_token');
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('informationreport')->insert($data)){
            return redirect('admin/message')->with(['status'=>'学校年度添加成功','redirect'=>'school/schoolYearList']);
        }else{
            return redirect()->back()->withInput($request->all())->withErrors('学校年度添加失败');
        }
    }

    /**
     *学校年度信息编辑页
     */
    public function editSchoolYear($id){
        $data = DB::table('informationreport as re')
            ->leftJoin('school as s','re.parentId','=','s.id')
            ->where('re.id',$id)
            ->select('re.*','s.id as schoolid','s.schoolName','s.organizeid','s.cityId','s.countryId')
            ->first();
        if($data->countryId){
            $data->schoolNames = DB::table('school')->where('countryId',$data->countryId)->select('id','schoolName')->get();
        }elseif($data->cityId){
            $data->schoolNames = DB::table('school')->where('cityId',$data->cityId)->select('id','schoolName')->get();
        }else{
            $data->schoolNames = DB::table('school')->where('organizeid',$data->organizeid)->select('id','schoolName')->get();
        }
        if(Auth::user()->level() > 6){
            $data->organizenames = DB::table('organize')->select('id','organize_name')->get();
            $data->citynames = DB::table('city')->where('parent_id',$data->organizeid)->select('id','city_name')->get();
            $data->countrynames = DB::table('county')->where('parent_id',$data->cityId)->select('id','county_name')->get();
        }
        switch(Auth::user()->level()){
            case 6:
                $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
                $data->countrynames = DB::table('county')->where('parent_id',$data->cityId)->select('id','county_name')->get();
                break;
            case 5:
                $data->countrynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
                break;
            case 4:
                $data->schoolNames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
            case 3:
                $schoolName = DB::table('school')->where('id',Auth::user()->organizeID)->select('id','schoolName')->first();
                $data->schoolName = $schoolName->schoolName;
                break;
        }
        return view('qiyun.admin.schoolYear.editSchoolYear',['data'=>$data]);
    }

    /**
     *执行学校年度信息编辑
     */
    public function doEditSchoolYear(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token','urlPath');
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if(DB::table('informationreport')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'学校年度信息修改修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('学校年度信息修改失败');
        }
    }

    /**
     *删除学校年度信息
     */
    public function delSchoolYear($id){
        if(DB::table('informationterm')->where('parentId',$id)->get()){
            return redirect()->back()->withInput()->withErrors('此年度下面有学期信息,请先删除学期信息');
        }
        $data = DB::table('informationreport')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'学校年度信息删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('学校年度信息删除失败');
        }
    }






    /**
     * 表单验证
     */
    protected function validator(array $data)
    {
        $rules = [
            'parentId' => 'required',
            'reportName'=>'required',
            'startTime'=>'required',
            'endTime'=>'required',
            'reportTitle' => 'required',
            'reportBody' => 'required',
            'reportYear'=>'required',
        ];

        $messages = [
            'parentId.required' => '请选择学校',
            'reportName.required' => '请填写年度名称',
            'startTime.required' => '请填写开始时间',
            'endTime.required' => '请填写结束时间',
            'reportTitle.required' => '请填写年度信息报告标题',
            'reportBody.required' => '请填写年度信息报告内容',
            'reportYear.required'=>'请填写年度信息报告年'
        ];
        return Validator::make( $data, $rules, $messages );
    }
}
