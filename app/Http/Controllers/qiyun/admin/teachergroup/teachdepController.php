<?php

namespace App\Http\Controllers\qiyun\admin\teachergroup;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Validator;
use Auth;

class teachdepController extends Controller{

	/**
	 * 部门成员信息列表
	 */
	public function teachdepList(Request $request){
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

    		$common = DB::table('departmentmember as dmm')
    			->leftjoin('users','users.id','=','dmm.userId')
    			->leftjoin('schooldepartment as sd','sd.id','=','dmm.parentId')
    			->leftjoin('school as s','s.id','=','sd.parent_id')
    			->leftjoin('county as co','co.id','=','s.countryId')
    			->leftjoin('city as ci','ci.id','=','co.parent_id')
    			->leftjoin('organize as o','o.id','=','ci.parent_id')
    			->select('dmm.*','users.username','users.realname','sd.departName','s.schoolName','co.county_name','ci.city_name','o.organize_name');
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
        $label['departName'] = $request->departName;
        $label['cityinfo'] = DB::table('city')->where('parent_id',$request['organize'])->select('id','city_name')->get();
        $label['countyinfo'] = DB::table('county')->where('parent_id',$request['city'])->select('id','county_name')->get();
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
                    $data->departName = DB::table('schooldepartment')->where('parent_id',\Auth::user()->organizeID)->select('id','departName')->get();               
              break;
          }

		$data->flag = $request['flag'];
    $data->labels = $label;
		return 	view('qiyun/admin/teachergroup/teachdepList')->with('data',$data)->with('organize',$organize);	
	}




	// 添加页
	public function addteachdep(){
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
		return view('qiyun/admin/teachergroup/teachdepadd')->with('data',$data)->with('teacherinfo',$teacherinfo);
	}



  // school->user
  public function schooluser(Request $request){
      $teacher = DB::table('users as u')
              ->join('school as s','u.schoolId','=','s.id')
              ->select('u.id','u.username')
              ->where('s.id',$request['id'])
              ->where('u.type',1)
              ->get();
      echo json_encode($teacher);
  }



	// ajaxuser联动
	public function ajaxuser(Request $request){
		if($request['flag'] == 1){
			$data = DB::table('users as u')
              ->join('school as s','s.id','=','u.schoolId')
              ->where('u.username','like','%'.$request['username'].'%')
              ->where('type',1)
              ->where('u.status',1)
              ->where('s.id',$request['schoolid'])
              ->select('u.id','u.username')
              ->get();
		  }
		if($request['flag'] == 2){
			$data = DB::table('users as u')
              ->join('school as s','s.id','=','u.schoolId')
              ->where('u.realname','like','%'.$request['username'].'%')
              ->where('type',1)
              ->where('u.status',1)
              ->where('s.id',$request['schoolid'])
              ->select('u.id','u.realname')
              ->get();
		}
		// dd($data);
		echo json_encode($data);
	}


	/**
	 * 添加功能
	 */
	public function addteachdepexe(Request $request){
		// 验证
		$validator = $this -> validator($request->all());
	    if ($validator -> fails()){
	        return Redirect()->back()->withInput($request->all())->withErrors($validator);
	    }
		$data = $request->except('_token');
    $userId = $data['userId'];

    foreach($userId as $user){
      if( DB::table('departmentmember')->where('userId',$user)->first()){
          $res = DB::table('departmentmember')->where('userId',$user)->update( ['parentId'=>$data['depart'],'updated_at'=>Carbon::now()]);
      }else{
          $res = DB::table('departmentmember')->insert( ['parentId'=>$data['depart'],'userId'=>$user,'created_at'=>Carbon::now()]);
      }
    }
    
     // 更新用户表中信息
    foreach($userId as $user){
        $userupdategrade = DB::table('users')->where('id',$user)->update(['departId' => $data['depart']]);
    }

		if($res){
        	return redirect('admin/message')->with(['status'=>'添加成功','redirect'=>'teachergroup/teachdepList']);
        }else{
          	return redirect()->back()->withInput($request->all())->withErrors('添加失败');
        }
	}


	/**
	 * 编辑页
	 */
	public function editteachdep($id){

		$common = $data = DB::table('departmentmember as dmm')
			->join('users','users.id','=','dmm.userId')
			->join('schooldepartment as sd','sd.id','=','dmm.parentId')
			->join('school as s','s.id','=','sd.parent_id')
			->join('county as co','co.id','=','s.countryId')
			->join('city as ci','ci.id','=','co.parent_id')
			->join('organize as o','o.id','=','ci.parent_id')
			->select('dmm.*','users.id as uid','users.username','users.realname','sd.id as sdid','sd.departName','s.id as schoolid','s.schoolName','co.id as countyid','co.county_name','ci.id as cityid','ci.city_name','o.id as organizeid','o.organize_name')
			->where('dmm.id',$id);

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
          $data->depart = DB::table('schooldepartment')->where('parent_id',$data->schoolid)->select('id','departName')->get();
		// 取user表teacher信息
		$teacherinfo = DB::table('users')->where('type',1)->select('id','username','realname')->get();
		return view('qiyun/admin/teachergroup/teachdepedit')->with('data',$data)->with('teacherinfo',$teacherinfo);
	}


	/**
	 * 编辑功能
	 */
	public function editteachdepsub(Request $request){
		// 验证
    $validator = $this -> validator_edit($request->all());
    if ($validator -> fails()){
        return Redirect()->back()->withInput($request->all())->withErrors($validator);
    }
    // $data = $request->except('_token');
    $data['parentId'] = $request['depart'];
		$data['userId'] = $request['uid'];
		$data['isManage'] = $request['isManage'];
		$data['status'] = $request['status'];
		$data['updated_at'] = Carbon::now();
    // dd($data);
		$res = DB::table('departmentmember')->where('id',$request['id'])->update($data);
    // 更新用户表中信息
    $userupdatedepart = DB::table('users')->where('id',$data['userId'])->update(['departId' => $data['parentId']]);
		if($res){
        	return redirect('admin/message')->with(['status'=>'编辑成功','redirect'=>'teachergroup/teachdepList']);
        }else{
          	return redirect()->back()->withInput($request->all())->withErrors('编辑失败');
        }
	}



	/**
	 * 部门成员删除
	 */
	public function delteachdep($id){
    $userId = DB::table('departmentmember')->where('id',$id)->select('userId')->first()->userId;
		$data = DB::table('departmentmember')->where('id',$id)->delete();
		if($data){
          // 删除时，同时删除users表中departid
          $arr = DB::table('users')->where('id',$userId)->update(['departId'=>'']);
        	return redirect('admin/message')->with(['status'=>'删除成功','redirect'=>'teachergroup/teachdepList']);
	    }else{
	        return redirect()->back()->withInput()->withErrors('删除失败！');
	    }
	}



	/**
     * 验证(添加)
     */
    protected function validator(array $data){
        $rules = [
            'depart' => 'required',
            'userId'	=> 'required'
        ];

        $messages = [
            'parentId.required' => '请选择部门',
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