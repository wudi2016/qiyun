<?php

namespace App\Http\Controllers\qiyun\admin\school;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Auth;

class SchoolController extends Controller
{
    //-----------------------------------------------------------------
    //-------------------------区县学校表-------------------------------
    //-----------------------------------------------------------------
    /**
     * 学校列表
     */
    public function schoolList(Request $request){
        $query = DB::table('school as sl');
        if($request['type'] == 1){
            $query = $query->where('sl.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){
            $query = $query->where('sl.schoolName','like','%'.trim($request['search']).'%');
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
        if($request['organizeid']){
            $query = $query->where('sl.organizeid',$request['organizeid']);
            $state['organizeid'] = $request['organizeid'];
            $state['cityall'] = DB::table('city')->where('parent_id',$request['organizeid'])->select('id','city_name')->get();
            $state['schoolall'] = DB::table('school')->where('organizeid',$request['organizeid'])->select('id','schoolName')->get();
        }
        if($request['cityId']){
            $query = $query->where('sl.cityId',$request['cityId']);
            $state['cityId'] = $request['cityId'];
            $state['countryall'] = DB::table('county')->where('parent_id',$request['cityId'])->select('id','county_name')->get();
            $state['schoolall'] = DB::table('school')->where('cityId',$request['cityId'])->select('id','schoolName')->get();
        }
        if($request['countryId']){
            $query = $query->where('sl.countryId',$request['countryId']);
            $state['countryId'] = $request['countryId'];
            $state['schoolall'] = DB::table('school')->where('countryId',$request['countryId'])->select('id','schoolName')->get();
        }
        if($request['schoolid']){
            $query = $query->where('sl.id',$request['schoolid']);
            $state['schoolid'] = $request['schoolid'];
        }

        if(Auth::user()->level() > 6){
            $data = $query
                ->leftJoin('city as c','sl.cityId','=','c.id')
                ->leftJoin('county as cou','sl.countryId','=','cou.id')
                ->leftJoin('organize as o','sl.organizeid','=','o.id')
                ->orderBy('sl.id','desc');
            $export = $data->select('sl.schoolName as 学校名称', 'sl.schoolIntro as 学校介绍', 'sl.schoolTel as 学校联系方式', 'o.organize_name as 省', 'c.city_name as 市', 'cou.county_name as 区县', 'sl.principal as 校长')->get();
            $data = $data->select('sl.*','c.city_name','cou.county_name','o.organize_name')->paginate(15);
            $data->organizes = DB::table('organize')->select('id','organize_name')->get();
        }
        if(Auth::user()->level() == 6){
            $data = $query
                ->leftJoin('organize as o','sl.organizeid','=','o.id')
                ->leftJoin('city as c','sl.cityId','=','c.id')
                ->leftJoin('county as cou','sl.countryId','=','cou.id')
                ->where('sl.organizeid',Auth::user()->organizeID)
                ->orderBy('sl.id','desc');
            $export = $data->select('sl.schoolName as 学校名称', 'sl.schoolIntro as 学校介绍', 'sl.schoolTel as 学校联系方式', 'o.organize_name as 省', 'c.city_name as 市', 'cou.county_name as 区县', 'sl.principal as 校长')->get();
            $data = $data->select('sl.*','o.organize_name')->paginate(15);
            foreach($data as &$val){
                if($val->cityId){
                    $citys = DB::table('city')->where('id',$val->cityId)->select('city_name')->first();
                    $val->city_name = $citys->city_name;
                }else{
                    $val->city_name = null;
                }
                if($val->countryId){
                    $countys = DB::table('county')->where('id',$val->countryId)->select('county_name')->first();
                    $val->county_name = $countys->county_name;
                }else{
                    $val->county_name = null;
                }
            }
            $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();

        }
        if(Auth::user()->level() == 5){
            $data = $query
                ->leftJoin('city as c','sl.cityId','=','c.id')
                ->leftJoin('county as cou','sl.countryId','=','cou.id')
                ->leftJoin('organize as o','sl.organizeid','=','o.id')
                ->where('c.id',Auth::user()->organizeID)
                ->orderBy('sl.id','desc');
            $export = $data->select('sl.schoolName as 学校名称', 'sl.schoolIntro as 学校介绍', 'sl.schoolTel as 学校联系方式', 'o.organize_name as 省', 'c.city_name as 市', 'cou.county_name as 区县', 'sl.principal as 校长')->get();
            $data = $data->select('sl.*','c.city_name','cou.county_name','o.organize_name')->paginate(15);
            $data->countynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
        }
        if(Auth::user()->level() == 4){
            $data = $query
                ->leftJoin('city as c','sl.cityId','=','c.id')
                ->leftJoin('county as cou','sl.countryId','=','cou.id')
                ->leftJoin('organize as o','sl.organizeid','=','o.id')
                ->where('cou.id',Auth::user()->organizeID)
                ->orderBy('sl.id','desc');
            $export = $data->select('sl.schoolName as 学校名称', 'sl.schoolIntro as 学校介绍', 'sl.schoolTel as 学校联系方式', 'o.organize_name as 省', 'c.city_name as 市', 'cou.county_name as 区县', 'sl.principal as 校长')->get();
            $data = $data->select('sl.*','c.city_name','cou.county_name','o.organize_name')->paginate(15);
            $data->schoolnames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
        }
        if(Auth::user()->level() == 3){
            $data = $query
                ->leftJoin('city as c','sl.cityId','=','c.id')
                ->leftJoin('county as cou','sl.countryId','=','cou.id')
                ->leftJoin('organize as o','sl.organizeid','=','o.id')
                ->where('sl.id',Auth::user()->organizeID)
                ->orderBy('sl.id','desc');
            $export = $data->select('sl.schoolName as 学校名称', 'sl.schoolIntro as 学校介绍', 'sl.schoolTel as 学校联系方式', 'o.organize_name as 省', 'c.city_name as 市', 'cou.county_name as 区县', 'sl.principal as 校长')->get();
            $data = $data->select('sl.*','c.city_name','cou.county_name','o.organize_name')->paginate(15);
        }
        $data->type = $request['type'];
        $data->states = $state;
        $export = json_encode($export);
        return view('qiyun.admin.school.schoolList',['data'=>$data,'export'=>$export]);
    }

    /**
     *添加学校
     */
    public function addSchool(){
        if(Auth::user()->level() > 6){
            $data = DB::table('organize')
                ->select('id','organize_name')
                ->get();
        }
        if(Auth::user()->level() == 6){
            $data = DB::table('organize')->where('id',Auth::user()->organizeID)->select('id as organizeid','organize_name')->first();
            $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
        }
        if(Auth::user()->level() == 5){
            $data = DB::table('city as c')
                ->leftJoin('organize as o','c.parent_id','=','o.id')
                ->select('c.id as cityid','c.city_name','o.id as organizeid','o.organize_name')
                ->first();
            $data->countynames = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
        }
        if(Auth::user()->level() == 4){
            $data = DB::table('county as cou')
                ->leftJoin('city as c','cou.parent_id','=','c.id')
                ->leftJoin('organize as o','c.parent_id','=','o.id')
                ->where('cou.id',Auth::user()->organizeID)
                ->select('cou.id as countyid','cou.county_name','c.id as cityid','c.city_name','o.id as organizeid','o.organize_name')
                ->first();
        }

        return view('qiyun.admin.school.addSchool',['data'=>$data]);
    }

    /**
     * 接收ajax传过来的单位查出此单位下的所有市级
     */
    public function city(Request $request){
        $data = DB::table('city')->where('parent_id',$request['id'])->get();
        echo json_encode($data);
    }

    /**
     *接收ajax传过来的市级查出此市级下的所的区县
     */
    public function county(Request $request){
        $data = DB::table('county')->where('parent_id',$request['id'])->get();
        echo json_encode($data);
    }

    /**
     *接收ajax传过来的区县查出此区县下的所有学校
     */
    public function schools(Request $request){
        $data = DB::table('school')->where('countryId',$request['id'])->where('cityId','!=',0)->where('countryId','!=',0)->select('id','schoolName')->get();
        echo json_encode($data);
    }

    /**
     *接收ajax传过来的省级查出此省级下的所有学校
     */
    public function organizeschools(Request $request){
        $data = DB::table('school')->where('organizeid',$request['id'])->select('id','schoolName')->get();
        echo json_encode($data);
    }

    /**
     *接收ajax传过来的市级查出此市级下的所有学校
     */
    public function citychools(Request $request){
        $data = DB::table('school')->where('cityId',$request['id'])->where('cityId','!=',0)->select('id','schoolName')->get();
        echo json_encode($data);
    }

    /**
     *执行添加学校
     */
    public function doAddSchool(Request $request){
        if(Auth::user()->level() > 6){
            if(!$request['organizeid'] && !$request['cityId'] && !$request['countryId']){
                return redirect()->back()->withErrors('省、市、县至少选一个');
            }
        }
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token');
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if($request->hasFile('pic')){ //判断文件是否存在
            if($request->file('pic')->isValid()){ //判断文件在上传过程中是否出错
                $name = $request->file('pic')->getClientOriginalName();//获取图片名
                $entension = $request->file('pic')->getClientOriginalExtension();//上传文件的后缀
                $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
                if($request->file('pic')->move('./image/qiyun/school/schoolimgs',$newname)){
                    $data['pic'] = '/image/qiyun/school/schoolimgs/'.$newname;
                }else{
                    return redirect()->back()->withInput()->withErrors('文件保存失败');
                }

            }else{
                return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
            }
        }
        if(DB::table('school')->insert($data)){
            return redirect('admin/message')->with(['status'=>'学校添加成功','redirect'=>'school/schoolList']);
        }else{
            return redirect()->back()->withInput($request->all())->withErrors('学校添加失败');
        }
    }

    /**
     *学校编辑页
     */
    public function editSchool($id){
        if(Auth::user()->level() > 6){
            $data = DB::table('school')->where('id',$id)->first();
            $data->organizename = DB::table('organize')->select('id','organize_name')->get();//取出所有的单位
            $data->citys = DB::table('city')->where('parent_id',$data->organizeid)->select('id','city_name')->get();
            $data->countys = DB::table('county')->where('parent_id',$data->cityId)->select('id','county_name')->get();
        }
        if(Auth::user()->level() == 6){
            $data = DB::table('school')->where('id',$id)->first();
            $organizenames = DB::table('organize')->where('id',Auth::user()->organizeID)->select('organize_name')->first();
            $data->organize_name = $organizenames->organize_name;
            $data->citys =  DB::table('city')->where('parent_id',$data->organizeid)->select('id','city_name')->get();
            $data->countys = DB::table('county')->where('parent_id',$data->cityId)->select('id','county_name')->get();
        }
        if(Auth::user()->level() == 5){
            $data = DB::table('school as s')
                ->leftJoin('organize as o','s.organizeid','=','o.id')
                ->leftJoin('city as c','s.cityId','=','c.id')
                ->where('s.id',$id)
                ->select('s.*','o.organize_name','c.city_name')
                ->first();
            $data->countys = DB::table('county')->where('parent_id',Auth::user()->organizeID)->select('id','county_name')->get();
        }
        if(Auth::user()->level() <= 4){
            $data = DB::table('school as s')
                ->leftJoin('organize as o','s.organizeid','=','o.id')
                ->leftJoin('city as c','s.cityId','=','c.id')
                ->leftJoin('county as cou','countryId','=','cou.id')
                ->where('s.id',$id)
                ->select('s.*','o.organize_name','c.city_name','cou.county_name')
                ->first();
        }
        return view('qiyun.admin.school.editSchool',['data'=>$data]);
    }

    /**
     *学校编辑
     */
    public function doEditSchool(Request $request){
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput()->withErrors($validator);
        }
        $data = $request->except('_token','original_pic','urlPath');
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        if($request->hasFile('pic')){ //判断文件是否存在
            if($request->file('pic')->isValid()){ //判断文件在上传过程中是否出错
                $name = $request->file('pic')->getClientOriginalName();//获取图片名
                $entension = $request->file('pic')->getClientOriginalExtension();//上传文件的后缀
                $newname = md5(date('ymdhis'.$name)).'.'.$entension;//拼接新的图片名
                if($request->file('pic')->move('./image/qiyun/school/schoolimgs',$newname)){
                    $data['pic'] = '/image/qiyun/school/schoolimgs/'.$newname;
                    //删除之前的图片
//                    $file = '.'.$request['original_pic'];
//                    unlink($file);
                }else{
                    return redirect()->back()->withInput()->withErrors('文件保存失败');
                }

            }else{
                return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
            }
        }
        if(DB::table('school')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'学校修改成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('学校修改失败');
        }
    }

    /**
     *删除学校
     */
    public function delSchool($id){
        if(DB::table('informationreport')->where('parentId',$id)->get()){
            return redirect()->back()->withInput()->withErrors('此学校下面有年度信息,请先删除年度信息');
        }
        if(DB::table('schooldepartment')->where('parent_id',$id)->get()){
            return redirect()->back()->withInput()->withErrors('此学校下面有部门信息,请先删除部门信息');
        }
        if(DB::table('schoolteachgroup')->where('parentId',$id)->get()){
            return redirect()->back()->withInput()->withErrors('此学校下面有教研组信息,请先删除教研组信息');
        }
        if(DB::table('schoolgrade')->where('parentId',$id)->get()){
            return redirect()->back()->withInput()->withErrors('此学校下面有年级信息,请先删除年级信息');
        }
        $data = DB::table('school')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'学校删除成功','redirect'=>$_SERVER['HTTP_REFERER']]);
        }else{
            return redirect()->back()->withInput()->withErrors('学校删除失败');
        }
    }

    /**
     *多项删除学校
     */
    public function delSchools(Request $request){
//        $ids = $request['id'];
//        $data = '';
//        dump($ids);
//        for($i=0;$i<count($ids);$i++){
//            $year = DB::table('informationreport')->where('parentId',$ids[$i])->get();
//            $term = DB::table('schooldepartment')->where('parent_id',$ids[$i])->get();
//            $depart = DB::table('schoolteachgroup')->where('parentId',$ids[$i])->get();
//            $grade = DB::table('schoolgrade')->where('parentId',$ids[$i])->get();
//            if($year || $term || $depart || $grade){
//                $data = 1;
//                continue;
//            }else{
//                dump('del');
//                $data = DB::table('school')->where('id',$ids[$i])->delete();
//            }
//        }
//        if($data){
//            return redirect('admin/message')->with(['status'=>'学校修删除成功','redirect'=>'school/schoolList']);
//        }else{
//            return redirect()->back()->withInput()->withErrors('学校修删除失败');
//        }
        dd($request->all());
        if(DB::table('school')->whereIn('id',$request['id'])->delete()){
            return redirect('admin/message')->with(['status'=>'学校修删除成功','redirect'=>'school/schoolList']);
        }else{
            return redirect()->back()->withInput()->withErrors('学校修删除失败');
        }
    }



    /**
     * 表单验证
     */
    protected function validator(array $data)
    {
        $rules = [
//            'organizeid'=>'required',
//            'cityId'=>'required',
            'schoolName'=>'required',
            'schoolIntro' => 'required',
            'schoolTel' => 'required',
            'principal'=>'required',
        ];

        $messages = [
//            'organizeid.required' => '请选择单位',
//            'cityId.required' => '请选择市',
            'schoolName.required' => '请填写学校名称',
            'schoolIntro.required' => '请填写学校简介',
            'schoolTel.required' => '请填写学校联系方式',
            'principal.required' => '请填写校长姓名',
        ];
        return Validator::make( $data, $rules, $messages );
    }
}
