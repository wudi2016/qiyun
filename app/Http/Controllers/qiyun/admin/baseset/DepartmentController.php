<?php

namespace App\Http\Controllers\qiyun\admin\baseset;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon;
use Validator;
use Auth;

class DepartmentController extends Controller{
  
  	/**
  	 * 部门设置列表
  	 */
    public function index(Request $request){
        // 首次加载默认省份下拉框选项
        $organize = DB::table('organize')->get();
        // 用于下拉框定位功能
        $label = [];
        $label['organize'] = null;
        $label['city'] = null;
        $label['county'] = null;
        $label['school'] = null;
        $label['departName'] = null;
        $label['cityinfo'] = null;
        $label['countyinfo'] = null;
        $label['schoolinfo'] = null;
        $label['departinfo'] = null;
        // 取出公共部分
        $common = DB::table('schooldepartment as sd')
                           ->join('school as s','s.id','=','sd.parent_id')
                           ->join('county as co','co.id','=','s.countryId')
                           ->join('city as ci','ci.id','=','co.parent_id')
                           ->join('organize as o','o.id','=','ci.parent_id')
                           ->select('sd.*','s.schoolName','co.county_name','ci.city_name','o.organize_name');
        // 查询
        if($request['flag'] == 1){ 
            $common = $common->where('sd.departName','like','%'.trim($request['ln']).'%');
        }
        $label['organize'] = $request->organize;
        $label['city'] = $request->city;
        $label['county'] = $request->county;
        $label['school'] = $request->school;
        $label['departName'] = $request->departName;
        $label['cityinfo'] = DB::table('city')->where('parent_id',$request['organize'])->select('id','city_name')->get();
        $label['countyinfo'] = DB::table('county')->where('parent_id',$request['city'])->select('id','county_name')->get();
        // $label['schoolinfo'] = DB::table('school')->where('countryId',$request['school'])->select('id','schoolName')->get();
        $label['departinfo'] = DB::table('schooldepartment')->where('parent_id',$request['school'])->select('id','departName')->get();         
        //考虑省市县不同种情况 
        if($request['departName']){
            $common = $common->where('sd.id',$request['departName']);
            $label['schoolinfo'] = DB::table('school')->where('countryId',$request['county'])->select('id','schoolName')->get(); 
        }
        if($request['school']){
            $common = $common->where('s.id',$request['school']);
            $label['schoolinfo'] = DB::table('school')->where('countryId',$request['county'])->select('id','schoolName')->get();
        }
        if($request['county']){
            $common = $common->where('co.id',$request['county']);
            $label['schoolinfo'] = DB::table('school')->where('countryId',$request['county'])->select('id','schoolName')->get();
        }elseif($request['city']){
            $common = $common->where('ci.id',$request['city']);
            $label['schoolinfo'] = DB::table('school')->where('cityId',$request['city'])->select('id','schoolName')->get();
        }elseif($request['organize']){
            $common = $common->where('o.id',$request['organize']);
            $label['schoolinfo'] = DB::table('school')->where('organizeid',$request['organize'])->select('id','schoolName')->get();
        }else{
            $common = $common;
        }

        switch ( \Auth::user() -> level() ) {
              // root管理员                                                                             
              case 8:
                    $query = $common;
                    $data = $query->orderBy('id','desc')->paginate(15);
              break;
              // admin管理员
              case 7:                                                                             
                    $query = $common;
                    $data = $query->orderBy('id','desc')->paginate(15);
              break;
              // 省级单位管理员
              case 6:                                       
                    $query = $common
                           ->where('o.id',\Auth::user() -> organizeID );
                    $data = $query->orderBy('id','desc')->paginate(15);  
                    $data->city = DB::table('city')->where('parent_id',\Auth::user()->organizeID)->select('id','city_name')->get();         
              break;
              // 市区单位管理员
              case 5:
                    $query = $common
                           ->where('ci.id',\Auth::user() -> organizeID );
                     $data = $query->orderBy('id','desc')->paginate(15);
                     $data->county = DB::table('county')->where('parent_id',\Auth::user()->organizeID)->select('id','county_name')->get();               
              break;
              // 县级管理员
              case 4:
                    $query = $common
                           ->where('co.id',\Auth::user() -> organizeID );
                    $data = $query->orderBy('id','desc')->paginate(15);
                    $data->school = DB::table('school')->where('countryId',\Auth::user()->organizeID)->select('id','schoolName')->get();       
              break;
              // 校级管理员
              case 3:
                    $query = $common
                           ->where('s.id',\Auth::user() -> organizeID );
                    $data = $query->orderBy('id','desc')->paginate(15);

              break;
          }
        $data->flag = $request['flag'];
        $data->labels = $label;
        // dd($data);exit();
        return view('qiyun/admin/baseset/departmentList')->with('data',$data)->with('organize',$organize);
    }

    /**
     * 添加部门页
     */
    public function adddep(){
      switch ( \Auth::user() -> level() ) {
            case 8:
                  $data = DB::table('organize')->select('id','organize_name')->get();
                  break;
            case 7:
                  $data = DB::table('organize')->select('id','organize_name')->get();
                  break;
            case 6:
                  $data = DB::table('organize')
                            ->select('id','organize_name')
                            ->where('id',Auth::user()->organizeID)
                            ->get();
                  break;
            case 5:
                  $data = DB::table('city as ci')
                            ->join('organize as o','o.id','=','ci.parent_id')
                            ->select('ci.id','ci.city_name','o.id as organizeid','o.organize_name')
                            ->where('ci.id',Auth::user()->organizeID)
                            ->get();
                  break;   
            case 4:
                  $data = DB::table('county as co')
                            ->join('city as ci','ci.id','=','co.parent_id')
                            ->join('organize as o','o.id','=','ci.parent_id')
                            ->select('co.*','ci.id as ciid','ci.city_name','o.id as organizeid','o.organize_name')
                            ->where('co.id',Auth::user()->organizeID)
                            ->get();
                  break;
            case 3:
                  $data = DB::table('school as s')
                            ->join('city as ci','s.cityId','=','ci.id')
                            ->join('county as co','s.countryId','=','co.id')
                            ->join('organize as o','s.organizeid','=','o.id')
                            ->select('s.*','ci.id as ciid','ci.city_name','o.id as organizeid','o.organize_name','co.id as countyid','co.county_name')
                            ->where('s.id',Auth::user()->organizeID)
                            ->get();
                  break;
      }
      
    	return view('qiyun/admin/baseset/depadd')->with('data',$data);
    }

    /**
     * 添加部门方法
     */
    public function adddepexe(Request $request){
      // 验证
      $validator = $this -> validator($request->all());
      if ($validator -> fails()){
          return Redirect()->back()->withInput($request->all())->withErrors($validator);
      }
    	// $data = $request->except('_token');
      $data['parent_id'] = $request['school'];
      $data['departName'] = $request['departName'];
      $data['created_at'] = Carbon\Carbon::now();
    	$res = DB::table('schooldepartment')->insert($data);
  		if($res){
  			return redirect('admin/message')->with(['status'=>'添加成功','redirect'=>'baseset/departmentList']);
  		}else{
  			return redirect()->back()->withInput($request->all())->withErrors('添加失败');
  		}
    }


    /**
     * 部门编辑页
     */
    public function editdep($id){

       $common = DB::table('schooldepartment as sd')
                        ->join('school as s','s.id','=','sd.parent_id')
                        ->join('city as ci','s.cityId','=','ci.id')
                        ->join('county as co','s.countryId','=','co.id')
                        ->join('organize as o','s.organizeid','=','o.id')
                        ->select('sd.*','s.id as schoolid','s.schoolName','ci.id as cityid','ci.city_name','o.id as organizeid','o.organize_name','co.id as countyid','co.county_name')
                        ->where('sd.id',$id);

        switch ( \Auth::user() -> level() ) {
            case 8:
                   $data = $common
                          ->first();
                  break;
            case 7:
                   $data = $common
                          ->first();
                  break;
            case 6:
                  $data = $common
                          ->where('o.id',\Auth::user() -> organizeID )
                          ->first();
                  break;
            case 5:
                  $data = $common
                          ->where('ci.id',\Auth::user() -> organizeID )
                          ->first();
                  break;
            case 4:
                  $data = $common
                          ->where('co.id',\Auth::user() -> organizeID )
                          ->first();
                  break;
            case 3:
                  $data = $common
                          ->where('s.id',\Auth::user() -> organizeID )
                          ->first();
                  break;
        }
        // dd($data);
       
      // 取组织表等关联信息
      $data->organize_name = DB::table('organize')->select('id','organize_name')->get();
      $data->city_name = DB::table('city')->where('parent_id',$data->organizeid)->select('id','city_name')->get();
      $data->county_name = DB::table('county')->where('parent_id',$data->cityid)->select('id','county_name')->get();
      $data->schoolName = DB::table('school')->where('countryId',$data->countyid)->select('id','schoolName')->get();
    	return view('qiyun/admin/baseset/depEdit')->with('data',$data);		

    }


    /**
     * 部门编辑方法
     */
    public function editdepsub(Request $request){
      // 验证
      $validator = $this -> validator_edit($request->all());
      if ($validator -> fails()){
          return Redirect()->back()->withInput($request->all())->withErrors($validator);
      }
    	// $data = $request->except('_token','id');
      $data['departName'] = $request['departName'];
      $data['parent_id'] = $request['school'];
      $data['updated_at'] = Carbon\Carbon::now();
      $data['status'] = $request['status'];
    	$res = DB::table('schooldepartment')->where('id',$request['id'])->update($data);
  		if($res){
  			return redirect('admin/message')->with(['status'=>'编辑成功','redirect'=>'baseset/departmentList']);
  		}else{
  			return redirect()->back()->withInput($request->all())->withErrors('编辑失败');
  		}
    }


    /**
	 * 部门删除
	 */
	public function deldep($id){
        //取出部门负责人表和部门分组表中的parent_id
        $schooldepartmentleader = DB::table('schooldepartmentleader')->where('parentId',$id)->get();
        $departmentmember = DB::table('departmentmember')->where('parentId',$id)->get();
        if($schooldepartmentleader){
            return redirect('admin/message')->with(['status'=>'子表中有数据，请先删除子表中数据','redirect'=>'baseset/departmentList']);
        }elseif($departmentmember){
            return redirect('admin/message')->with(['status'=>'子表中有数据，请先删除子表中数据','redirect'=>'baseset/departmentList']);
        }else{
            $data = DB::table('schooldepartment')->where('id',$id)->delete();
            if($data){
                return redirect('admin/message')->with(['status'=>'删除成功','redirect'=>'baseset/departmentList']);
            }else{
                return redirect()->back()->withInput()->withErrors('删除失败！');
            }
        }
    }



    /**
     * 验证(添加)
     */
    protected function validator(array $data){
        $rules = [
            'school' => 'required',
            'departName'=>'required',
        ];

        $messages = [
            'school.required' => '请选择对应学校',
            'departName.required' => '请填写部门名称',
        ];
        return Validator::make( $data, $rules, $messages );
    }


     /**
     * 验证(编辑)
     */
    protected function validator_edit(array $data){
        $rules = [
            'departName'=>'required',
        ];

        $messages = [
            'departName.required' => '请填写部门名称',
        ];
        return Validator::make( $data, $rules, $messages );
    }





}



