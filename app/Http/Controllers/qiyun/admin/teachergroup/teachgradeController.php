<?php

namespace App\Http\Controllers\qiyun\admin\teachergroup;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Validator;
use Auth;

class teachgradeController extends Controller{


	/**
	 * 年级分组列表
	 */
	public function teachgradeList(Request $request){
        // 首次加载默认省份下拉框选项
        $organize = DB::table('organize')->get();
        // 用于下拉框定位功能
        $label = [];
        $label['organize'] = null;
        $label['city'] = null;
        $label['county'] = null;
        $label['school'] = null;
        $label['grade'] = null;
        $label['cityinfo'] = null;
        $label['countyinfo'] = null;
        $label['schoolinfo'] = null;
        $label['gradeinfo'] = null;
    		$common = DB::table('grademember as gm')
    				->leftjoin('users','users.id','=','gm.userId')
    				->leftjoin('schoolgrade as sg','sg.id','=','gm.parentId')
    				->leftjoin('school as s','s.id','=','sg.parentId')
    				->leftjoin('county as co','co.id','=','s.countryId')
    				->leftjoin('city as ci','ci.id','=','co.parent_id')
    				->leftjoin('organize as o','o.id','=','ci.parent_id')
    				->select('gm.*','users.username','users.realname','sg.gradeName','s.schoolName','co.county_name','ci.city_name','o.organize_name');
        // 查询
        if($request['flag'] == 1){
          $common = $common->where('username','like','%'.trim($request['ln']).'%');
        }
        if($request['flag'] == 2){
          $common = $common->where('realname','like','%'.trim($request['ln']).'%');
        } 
        $label['organize'] = $request->organize;
        $label['city'] = $request->city;
        $label['county'] = $request->county;
        $label['school'] = $request->school;
        $label['grade'] = $request->grade;
        $label['cityinfo'] = DB::table('city')->where('parent_id',$request['organize'])->select('id','city_name')->get();
        $label['countyinfo'] = DB::table('county')->where('parent_id',$request['city'])->select('id','county_name')->get();     
        $label['gradeinfo'] = DB::table('schoolgrade')->where('parentId',$request['school'])->select('id','gradeName')->get();
        //考虑省市县不同种情况 
        if($request['grade']){
            $common = $common->where('sg.id',$request['grade']);
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
                    $data->grade = DB::table('schoolgrade')->where('parentId',\Auth::user()->organizeID)->select('id','gradeName')->get();               
              break;
          }	
		$data->flag = $request['flag'];
    $data->labels = $label;
		return view('qiyun/admin/teachergroup/teachgradeList')->with('data',$data)->with('organize',$organize);
	}


	/**
	 * 添加页
	 */
	public function addteachgrade(){

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
		// 取user表teacher信息
		$teacherinfo = DB::table('users')->where('type',1)->select('id','username','realname')->get();
		return view('qiyun/admin/teachergroup/teachgradeadd')->with('data',$data)->with('teacherinfo',$teacherinfo);
	}



	// organize  --->  city
  public function ajaxorganizes(Request $request){
    $organize_city = DB::table('city')->where('parent_id',$request['id'])->get();
    $organize_school = DB::table('school')->where('organizeid',$request['id'])->get();
    // dd($organize_city);
    $arr = array($organize_city,$organize_school); 
    echo json_encode($arr);
  }

  // city  --->  county
  public function ajaxcitys(Request $request){
    $city_county = DB::table('county')->where('parent_id',$request['id'])->get();
    $city_school = DB::table('school')->where('cityId',$request['id'])
//        ->where('countryId','!=',0)
        ->where('cityId','!=',0)
        ->get();
    $arr = array($city_county,$city_school);
    echo json_encode($arr);
  }

	// county ---> school
	public function ajaxcountys(Request $request){
		$county_school = DB::table('school')->where('countryId',$request['id'])
            ->where('status',1)
            ->where('countryId','!=',0)
            ->where('cityId','!=',0)
            ->get();
		echo json_encode($county_school);
	}

	// school --> grade
	public function ajaxschools(Request $request){
		$school_grade = DB::table('schoolgrade')->where('parentId',$request['id'])->get();
		echo json_encode($school_grade);
	}

	// school --> depart
	public function ajaxdeparts(Request $request){
		$school_depart = DB::table('schooldepartment')->where('parent_id',$request['id'])->get();
		echo json_encode($school_depart);
	}

	// grade  --> subject
	public function ajaxgrades(Request $request){
		$grade_subject = DB::table('schoolsubject')->where('parentId',$request['id'])->get();
		echo json_encode($grade_subject);
	}

  // school  --> classroom
  public function ajaxclassroom(Request $request){
    $school_classroom = DB::table('schoolclassroom')->where('parentId',$request['id'])->get();
    echo json_encode($school_classroom);
  }

  // school  --> ajaxteachgroup
  public function ajaxteachgroup(Request $request){
    $school_teachgroup = DB::table('schoolteachgroup')->where('parentId',$request['id'])->get();
    echo json_encode($school_teachgroup);
  }


	/**
	 * 添加方法
	 */
	public function addteachgradeexe(Request $request){
		// 验证
		$validator = $this -> validator($request->all());
	    if ($validator -> fails()){
	        return Redirect()->back()->withInput($request->all())->withErrors($validator);
	    }
		$data = $request->except('_token');
		$userId = $data['userId'];
		foreach($userId as $user){
      if( DB::table('grademember')->where('userId',$user)->first()){
          $res = DB::table('grademember')->where('userId',$user)->update( ['parentId'=>$data['grade'],'updated_at'=>Carbon::now()]);
          DB::table('subjectmember')->where('userId',$user)->delete();
      }else{
          $res = DB::table('grademember')->insert( ['parentId'=>$data['grade'],'userId'=>$user,'created_at'=>Carbon::now()]);
      }
		}
     // 更新用户表中信息
    foreach($userId as $user){
        $arr[] = ['userId'=>$user,'gradeId'=>$data['grade']];
        $userupdategrade = DB::table('users')->where('id',$user)->update(['gradeId' => $data['grade']]);
    }

		if($res){
        	return redirect('admin/message')->with(['status'=>'添加成功','redirect'=>'teachergroup/teachgradeList']);
        }else{
          	return redirect()->back()->withInput($request->all())->withErrors('添加失败');
        }
	}


	/**
	 * 编辑页
	 */
	public function editteachgrade($id){

		$common = DB::table('grademember as gm')
				->join('users','users.id','=','gm.userId')
				->join('schoolgrade as sg','sg.id','=','gm.parentId')
				->join('school as s','s.id','=','sg.parentId')
				->join('county as co','co.id','=','s.countryId')
				->join('city as ci','ci.id','=','co.parent_id')
				->join('organize as o','o.id','=','ci.parent_id')
				->select('gm.*','users.id as uid','users.username','users.realname','sg.id as gradeid','sg.gradeName','s.id as schoolid','s.schoolName','co.id as countyid','co.county_name','ci.id as cityid','ci.city_name','o.id as organizeid','o.organize_name')
				->where('gm.id',$id);

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
		$data->gradeName = DB::table('schoolgrade')->where('parentId',$data->schoolid)->select('id','gradeName')->get();

		// 取user表teacher信息
		$teacherinfo = DB::table('users')->where('type',1)->select('id','username','realname')->get();
		return view('qiyun/admin/teachergroup/teachgradeedit')->with('data',$data)->with('teacherinfo',$teacherinfo);
	}


	/**
	 * 编辑方法
	 */
	public function editteachgradesub(Request $request){
		// 验证
    $validator = $this -> validator_edit($request->all());
    if ($validator -> fails()){
        return Redirect()->back()->withInput($request->all())->withErrors($validator);
    } 
        // $data = $request->except('_token');
		$data['parentId'] = $request['grade'];
		$data['userId'] = $request['uid'];
		$data['status'] = $request['status'];
		$data['updated_at'] = date('Y-m-d H:i:s',time());
    // dd($data);
    $grademember = DB::table('grademember')->where('userId',$data['userId'])->first()->parentId;
    if($data['parentId'] == $grademember){
        $res = DB::table('grademember')->where('id',$request['id'])->update($data);
    }else{
        $res = DB::table('grademember')->where('id',$request['id'])->update($data);
        // 如果年级不同，删除学科分组表中的数据
        DB::table('subjectmember')->where('userId',$data['userId'])->delete();
        $arr = DB::table('users')->where('id',$data['userId'])->update(['subjectId'=>'','classId'=>'']);
    }
    // 更新用户表中信息
    $userupdategrade = DB::table('users')->where('id',$data['userId'])->update(['gradeId' => $data['parentId']]);
		if($res){
        	return redirect('admin/message')->with(['status'=>'编辑成功','redirect'=>'teachergroup/teachgradeList']);
        }else{
          	return redirect()->back()->withInput($request->all())->withErrors('编辑失败');
        }
	}




	/**
	 * 年级删除 
	 */
	public function delteachgrade($id){
    $userId = DB::table('grademember')->where('id',$id)->select('userId')->first()->userId;
		$data = DB::table('grademember')->where('id',$id)->delete();
		if($data){
          // 删除时，同时删除users表中gradeid
          $arr = DB::table('users')->where('id',$userId)->update(['gradeId'=>'','classId' => '','subjectId' =>'']);
          $arr1 = DB::table('subjectmember')->where('userId',$userId)->delete();
        	return redirect('admin/message')->with(['status'=>'删除成功','redirect'=>'teachergroup/teachgradeList']);
	    }else{
	        return redirect()->back()->withInput()->withErrors('删除失败！');
	    }
	}



	/**
     * 验证(添加)
     */
    protected function validator(array $data){
        $rules = [
            'grade' => 'required',
            'userId'	=> 'required'
        ];

        $messages = [
            'grade.required' => '请选择年级',
            'userId.required'	=>	'请选择搜索条件'
  
        ];
        return Validator::make( $data, $rules, $messages );
    }


     /**
     * 验证(编辑)
     */
    protected function validator_edit(array $data){
        $rules = [
            // 'userId'=>'required',
        ];

        $messages = [
            // 'userId.required' => '请选择教师',
        ];
        return Validator::make( $data, $rules, $messages );
    }




}