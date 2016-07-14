<?php

namespace App\Http\Controllers\qiyun\admin\baseset;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Validator;
use Auth;

class SubjectController extends Controller{

	/**
	 * 学科设置列表
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
        $label['grade'] = null;
        $label['subject'] = null;
        $label['cityinfo'] = null;
        $label['countyinfo'] = null;
        $label['schoolinfo'] = null;
        $label['gradeinfo'] = null;
        $label['subjectinfo'] = null;
        // 取出公共部分
		    $common = DB::table('schoolsubject as ss')
						   ->leftjoin('schoolgrade as sg','sg.id','=','ss.parentId')
                           ->leftjoin('school as s','s.id','=','sg.parentId')
                           ->leftjoin('county as co','co.id','=','s.countryId')
                           ->leftjoin('city as ci','ci.id','=','co.parent_id')
                           ->leftjoin('organize as o','o.id','=','ci.parent_id')
                           ->select('ss.*','sg.gradeName','s.schoolName','co.county_name','ci.city_name','o.organize_name');
        // 查询
        if($request['flag'] == 1){ 
            $common = $common->where('subjectName','like','%'.trim($request['ln']).'%');
        }
        $label['organize'] = $request->organize;
        $label['city'] = $request->city;
        $label['county'] = $request->county;
        $label['school'] = $request->school;
        $label['grade'] = $request->grade;
        $label['subject'] = $request->subject;
        $label['cityinfo'] = DB::table('city')->where('parent_id',$request['organize'])->select('id','city_name')->get();
        $label['countyinfo'] = DB::table('county')->where('parent_id',$request['city'])->select('id','county_name')->get();     
        $label['gradeinfo'] = DB::table('schoolgrade')->where('parentId',$request['school'])->select('id','gradeName')->get();
        $label['subjectinfo'] = DB::table('schoolsubject')->where('parentId',$request['school'])->select('id','subjectName')->get(); 
        //考虑省市县不同种情况 
        if($request['subject']){
            $common = $common->where('ss.id',$request['subject']);
            $label['schoolinfo'] = DB::table('school')->where('countryId',$request['county'])->select('id','schoolName')->get();
        }
        if($request['grade']){
            $common = $common->where('sg.id',$request['grade']);
            $label['schoolinfo'] = DB::table('school')->where('countryId',$request['county'])->select('id','schoolName')->get(); 
        }
        if($request['school']){
            $common = $common->where('s.id',$request['school']);
            $label['schoolinfo'] = DB::table('school')->where('countryId',$request['county'])->where('status',1)->select('id','schoolName')->get();   
        }
        if($request['county']){
            $common = $common->where('co.id',$request['county']);
            $label['schoolinfo'] = DB::table('school')->where('countryId',$request['county'])->where('status',1)->select('id','schoolName')->get();
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
              // 年级管理员
              case 2:
              		$query = $common
              				->where('sg.id',\Auth::user() -> organizeID );
              break;
          }


		$data->flag = $request['flag'];
		$data->labels = $label;
		return view('qiyun/admin/baseset/subjectList')->with('data',$data)->with('organize',$organize);
	}



	/**
	 * 添加页面
	 */
	public function addsubject(){
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
	            case 2:
	            	  $data = DB::table('schoolgrade as sg')
	            	  			->join('school as s','s.id','=','sg.parentId')
	            	  			->join('city as ci','s.cityId','=','ci.id')
	                            ->join('county as co','s.countryId','=','co.id')
	                            ->join('organize as o','s.organizeid','=','o.id')
	                            ->select('sg.*','s.id as schoolid','s.schoolName','ci.id as ciid','ci.city_name','o.id as organizeid','o.organize_name','co.id as countyid','co.county_name')
	                            ->where('sg.id',Auth::user()->organizeID)
	                            ->get();
      		}
		return view('qiyun/admin/baseset/subjectadd')->with('data',$data);
	}


	/**
	 * 添加功能
	 */
	public function addsubjectexe(Request $request){
		// 验证
		$validator = $this -> validator($request->all());
	    if ($validator -> fails()){
	        return Redirect()->back()->withInput($request->all())->withErrors($validator);
	    }
		$data = $request->except('_token');

		$parentId = $request['gradeName'];
		foreach($parentId as $parent){
			$arr[] = ['subjectName'=>$data['subjectName'],'parentId'=>$parent,'created_at'=>Carbon::now()];
		}
		// dd($data);
		$res = DB::table('schoolsubject')->insert($arr);
		if($res){
        	return redirect('admin/message')->with(['status'=>'添加成功','redirect'=>'baseset/subjectList']);
        }else{
          	return redirect()->back()->withInput($request->all())->withErrors('添加失败');
        }
		
	}




	/**
	 * 学科编辑页
	 */
	public function editsubject($id){

			$common = DB::table('schoolsubject as ss')
				->join('schoolgrade as sg','sg.id','=','ss.parentId')
				->join('school as s','s.id','=','sg.parentId')
				->join('county as co','co.id','=','s.countryId')
				->join('city as ci','ci.id','=','co.parent_id')
				->join('organize as o','o.id','=','ci.parent_id')
				->select('ss.*','sg.id as gradeid','sg.gradeName','s.id as schoolid','s.schoolName','co.id as countyid','co.county_name','ci.id as cityid','ci.city_name','o.id as organizeid','o.organize_name')
				->where('ss.id',$id);

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
		
		return view('qiyun/admin/baseset/subjectEdit')->with('data',$data); 		
	}


	/**
	 * 学科编辑方法
	 */
	public function editsubjectsub(Request $request){
		 // 验证
        $validator = $this -> validator_edit($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput($request->all())->withErrors($validator);
        }
		// $data = $request->except('_token','id');
		$data['parentId'] = $request['grade'];
		$data['subjectName'] = $request['subjectName'];
		$data['status'] = $request['status'];
		$data['updated_at'] = Carbon::now();
		$res = DB::table('schoolsubject')->where('id',$request['id'])->update($data);
		if($res){
        	return redirect('admin/message')->with(['status'=>'编辑成功','redirect'=>'baseset/subjectList']);
        }else{
          	return redirect()->back()->withInput($request->all())->withErrors('编辑失败');
        }
	}



	/**
	 * 学科删除
	 */
	public function delsubject($id){
		//取出备课组长，任课老师，学科分组parentId
		$schoollessonleader = DB::table('schoollessonleader')->where('parentId',$id)->get();
		$schoolteachers = DB::table('schoolteachers')->where('subjectid',$id)->get();
		$subjectmember = DB::table('subjectmember')->where('parentId',$id)->get();
		if($schoollessonleader){
			return redirect('admin/message')->with(['status'=>'子表中有数据，请先删除子表中的数据','redirect'=>'baseset/subjectList']);
		}elseif($schoolteachers){
			return redirect('admin/message')->with(['status'=>'子表中有数据，请先删除子表中的数据','redirect'=>'baseset/subjectList']);
		}elseif($subjectmember){
			return redirect('admin/message')->with(['status'=>'子表中有数据，请先删除子表中的数据','redirect'=>'baseset/subjectList']);
		}else{
			$data = DB::table('schoolsubject')->where('id',$id)->delete();
			if($data){
				return redirect('admin/message')->with(['status'=>'删除成功','redirect'=>'baseset/subjectList']);
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
            'subjectName' => 'required',
            'gradeName'	=> 'required'
        ];

        $messages = [
            'subjectName.required' => '请填写学科名称',
            'gradeName.required'	=>	'请选择年级'
  
        ];
        return Validator::make( $data, $rules, $messages );
    }


     /**
     * 验证(编辑)
     */
    protected function validator_edit(array $data){
        $rules = [
            'subjectName'=>'required',
        ];

        $messages = [
            'subjectName.required' => '请填写学科名称',
        ];
        return Validator::make( $data, $rules, $messages );
    }




}