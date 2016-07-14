<?php

namespace App\Http\Controllers\qiyun\admin\organization;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon;
use Validator;
use Auth;

class countyController extends Controller{

	/**
	 * 县区显示列表 
	 */
	public function index(Request $request){
			// 首次加载默认省份下拉框选项
			$organize = DB::table('organize')->get();
			// 用于下拉框定位功能
			$label = [];
			$label['organize'] = null;
			$label['city'] = null;
			$label['cityinfo'] = null;
			$label['county'] = null;
			$label['countyinfo'] = null;
			// 提取出公共部分
			$query = DB::table('organize as o')
	                		->rightjoin('city as ci','o.id','=','ci.parent_id')
	                		->rightjoin('county as co','co.parent_id','=','ci.id')
	                		->select('co.*','ci.city_name','o.organize_name');
	        // 搜索
	        if($request['flag'] == 1){ 
        		$query = $query->where('county_name','like','%'.trim($request['ln']).'%');
        	}
        	if($request['flag'] == 2){ 
            	$query = $query->where('county_tel','like','%'.trim($request['ln']).'%');
        	}
    		$label['organize'] = $request->organize;
        	$label['city'] = $request->city;
        	$label['county'] = $request->county;
        	$label['cityinfo'] = DB::table('city')->where('parent_id',$request['organize'])->select('id','city_name')->get();
        	$label['countyinfo'] = DB::table('county')->where('parent_id',$request['city'])->select('id','county_name')->get();
        	//考虑省市县不同种情况 
        	if($request['county']){
            	$query = $query->where('co.id',$request['county']);
            }elseif($request['city']){
            	$query = $query->where('ci.id',$request['city']);
            }elseif($request['organize']){
            	$query = $query->where('o.id',$request['organize']);
            }else{
            	$query = $query;
            }
			switch ( \Auth::user() -> level() ) {
				// root管理员
            	case 8:      
            	$query = $query;                                                                      
	                $data = $query->orderBy('id','desc')->paginate(15);
	                break;
                // admin管理员
                case 7:                                                                             
	                $query = $query;
	                $data = $query->orderBy('id','desc')->paginate(15);
	                break;
				// 省级单位管理员
				case 6:											
					$query = $query->where('o.id',\Auth::user()-> organizeID);
					$data = $query->orderBy('id','desc')->paginate(15);
					$data->city = DB::table('city')->where('parent_id',\Auth::user()->organizeID)->select('id','city_name')->get();
				break;
				// 市区单位管理员
				case 5:
			        $query = $query->where('ci.id',\Auth::user()-> organizeID);
					$data = $query->orderBy('id','desc')->paginate(15);
					$data->county = DB::table('county')->where('parent_id',\Auth::user()->organizeID)->select('id','county_name')->get();
			    break;
			    // 县级管理员
			    case 4:
			    	$query = $query->where('co.id',\Auth::user()-> organizeID);
					$data = $query->orderBy('id','desc')->paginate(15);
			    break;
       		}
		
		$data->flag = $request['flag'];
		$data->labels = $label;
		return view('qiyun/admin/organization/countyList')->with('data',$data)->with('organize',$organize); 
	}


	/**
	 * 县区添加页
	 */
	public function addcounty(){
		// admin root
		if(Auth::user()->level() > 6){
            $data = DB::table('organize')->select('id','organize_name')->get();
        }
        // 省级
        if(Auth::user()->level() == 6){
            $data = DB::table('organize')->where('id',Auth::user()->organizeID)->select('id as organizeid','organize_name')->first();
            $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
        }
        // 市级
        if(Auth::user()->level() == 5){
            $data = DB::table('city as ci')
                ->join('organize as o','ci.parent_id','=','o.id')
                ->select('ci.id as cityid','ci.city_name','o.id as organizeid','o.organize_name')
                ->where('ci.id',Auth::user()->organizeID)
                ->first();
        }


		// dd($data);
        return view('qiyun/admin/organization/countyadd')->with('data',$data);
	}


	/**
	 * ajax联动(获取城市)
	 */
	public function ajaxcity(Request $request){
		$data = DB::table('city')->where('parent_id',$request['id'])->get();
        echo json_encode($data);
	}


	/**
	 * ajax联动(获取县)
	 */
	public function ajaxcounty(Request $request){
		$data = DB::table('county')->where('parent_id',$request['id'])->get();
		echo json_encode($data);
	}


	/**
	 * 县区添加方法
	 */
	public function addcountyexe(Request $request){
			if(Auth::user()->level() > 6){
	            if(!$request['organizeid']){
	                return redirect()->back()->withErrors('请先选择省份');
	            }
	            if(!$request['cityId']){
	            	return redirect()->back()->withErrors('请先选择市区');
	            }
	        }

	        if(Auth::user()->level() == 6){
	        	if(!$request['cityId']){
	            	return redirect()->back()->withErrors('请先选择市区');
	            }
	        }
			$validator = $this -> validator($request->all());
		    if ($validator -> fails()){
		        return Redirect()->back()->withInput($request->all())->withErrors($validator);
		    }
		    $isMobile="/^(?:13\d|15\d)\d{5}(\d{3}|\*{3})$/";   
	        $isPhone="/^((0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/";
			if(!preg_match($isMobile,$request['county_tel']) && !preg_match($isPhone,$request['county_tel'])){
				 return Redirect()->back()->withErrors("请填写正确的手机或电话号码");
			}
		    $data = $request->except('_token','organizeid','cityId');
			$data['parent_id'] = $request['cityId'];
			// dd($data);exit;
			$res = DB::table('county')->insert($data);
			if($res){
				return redirect('admin/message')->with(['status'=>'添加成功','redirect'=>'organization/countyList']);
			}else{
				return redirect()->back()->withInput($request->all())->withErrors('添加失败');
			}		
	}


	/**
	 * 县区编辑页
	 */
	public function editcounty($id){
		if(\Auth::user() -> level() > 6){
			$data = DB::table('county as c')
			->join('city as ci','ci.id','=','c.parent_id')
			->join('organize as o','o.id','=','ci.parent_id')
			->select('c.*','ci.id as cityid','ci.city_name','o.id as organizeid','o.id as organize_name')
			->where('c.id',$id)
			->first();
			$data->organize_name = DB::table('organize')->select('id','organize_name')->get();
			$data->cityname = DB::table('city')->where('parent_id',$data->organizeid)->select('id','city_name')->get();
		}
		if(\Auth::user() -> level() == 6){
			$data = DB::table('county as c')
				->join('city as ci','ci.id','=','c.parent_id')
				->join('organize as o','o.id','=','ci.parent_id')
				->select('c.*','ci.id as cityid','ci.city_name','o.id as organizeid','o.id as organize_name')
				->where('c.id',$id)
				->first();
			$data->organizename = DB::table('organize')->where('id',Auth::user()->organizeID)->select('id as organizeid','organize_name')->first();
			$data->cityname = DB::table('city')->where('parent_id',$data->organizeid)->select('id','city_name')->get();
		}

		if(\Auth::user() -> level() == 5 ){
				$data = DB::table('county as co')
				->join('city as ci','ci.id','=','co.parent_id')
				->join('organize as o','o.id','=','ci.parent_id')
				->select('co.*','ci.id as cityid','ci.city_name','o.id as organizeid','o.id as organize_name')
				->where('co.id',$id)
				->first();
			$data->organizename = DB::table('organize as o')
								->join('city as ci','ci.parent_id','=','o.id')
								->select('o.id as organizeid','o.organize_name')
								->where('ci.id',Auth::user()->organizeID)
								->first();
			// $data->cityname = DB::table('city')->where('parent_id',$data->organizeid)->select('id','city_name')->get();
		}

		if(\Auth::user() -> level() == 4 ){
				$data = DB::table('county as co')
				->join('city as ci','ci.id','=','co.parent_id')
				->join('organize as o','o.id','=','ci.parent_id')
				->select('co.*','ci.id as cityid','ci.city_name','o.id as organizeid','o.id as organize_name')
				->where('co.id',$id)
				->first();
			$data->organizename = DB::table('organize as o')
								->join('city as ci','ci.parent_id','=','o.id')
								->join('county as co','co.parent_id','=','ci.id')
								->select('o.id as organizeid','o.organize_name')
								->where('co.id',Auth::user()->organizeID)
								->first();

		}

		

		return view('qiyun/admin/organization/countyEdit')->with('data',$data);
	}


	/**
	 * 县区编辑
	 */
	public function editcountysub(Request $request){
		// 验证
        $validator = $this -> validator_edit($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $isMobile="/^(?:13\d|15\d)\d{5}(\d{3}|\*{3})$/";   
        $isPhone="/^((0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/";
		if(!preg_match($isMobile,$request['county_tel']) && !preg_match($isPhone,$request['county_tel'])){
			 return Redirect()->back()->withErrors("请填写正确的手机或电话号码");
		}
        if(\Auth::user() -> level() > 6){
        	$data = $request->except('_token','id','organize','city');
        	$data['parent_id'] = $request['city'];
        }
        if(\Auth::user() -> level() == 6){
        	$data = $request->except('_token','id','organizeid','city');
        	$data['parent_id'] = $request['city'];
        }
        if(\Auth::user() -> level() == 5){
        	$data = $request->except('_token','id','organizeid','city');
        	$data['parent_id'] = $request['city'];
        }
        if(\Auth::user() -> level() == 4){
        	$data = $request->except('_token','id','organizeid','city');
        	$data['parent_id'] = $request['city'];
        }

		// dd($data);exit();
		$res = DB::table('county')->where('id',$request['id'])->update($data);	
		if($res !==false){
            return redirect('admin/message')->with(['status'=>'修改成功','redirect'=>'organization/countyList']);
        }else{
            return redirect()->back()->withInput()->withErrors('修改失败');
        }
	}


	/**
	 * 县区删除
	 */
	public function delcounty($id){
        $data = DB::table('county')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'删除成功','redirect'=>'organization/countyList']);
        }else{
            return redirect()->back()->withInput()->withErrors('删除失败！');
        }
    }


  	/**
     * 验证(添加)
     */
    protected function validator(array $data){
        $rules = [
            // 'parent_id' => 'required',
            // 'cityId'=>'required',
            'county_name'=>'required',
            'county_intro'=>'required',
            // 'county_tel' => 'required|numeric',
        ];

        $messages = [
            // 'parent_id.required' => '请填写省级单位名称',
            // 'cityId.required' => '请填写单位介绍名称',
            'county_name.required' => '请填写县教育局名称',
            'county_intro.required' => '请填写县区介绍',
            'county_tel.required' => '请填写电话',
            // 'county_tel.numeric' => '请填写正确电话'
        ];
        return Validator::make( $data, $rules, $messages );
    }


	/**
     * 验证(编辑)
     */
    protected function validator_edit(array $data){
        $rules = [
            'county_name'=>'required',
            'county_intro'=>'required',
            'county_tel' => 'required',
        ];

        $messages = [
            'county_name.required' => '请填写县教育局名称',
            'county_intro.required' => '请填写县区介绍',
            'county_tel.required' => '请填写电话'
        ];
        return Validator::make( $data, $rules, $messages );
    }




}