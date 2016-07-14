<?php

namespace App\Http\Controllers\qiyun\admin\organization;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Validator;
use Auth;

class cityController extends Controller{

	/**
	 *	城市显示
	 */
	public function index(Request $request){
		$organize = DB::table('organize')->get();
		$label = [];
		$label['organize'] = null;
		$label['city'] = null;
		$label['cityinfo'] = null;

		switch ( \Auth::user() -> level() ) {
			// admin管理员
            case 8: 
        		$query = DB::table('organize as o')
            		->rightjoin('city as ci','o.id','=','ci.parent_id')
            		->select('ci.*','o.organize_name'); 
            		// 查询
				    if($request['flag'] == 1){ 
			        	$query = $query->where('city_name','like','%'.trim($request['ln']).'%');
			        }
			        if($request['flag'] == 2){ 
			            $query = $query->where('city_tel','like','%'.trim($request['ln']).'%');
			        }   
            		if($request['city']){
            			$query = $query->where('ci.id',$request['city']);
            			$label['organize'] = $request->organize;
            			$label['city'] = $request->city;
            			$label['cityinfo'] = DB::table('city')->where('parent_id',$request['organize'])->select('id','city_name')->get();
                	}elseif($request['organize']){
                		$query = $query->where('o.id',$request['organize']);
                		$label['organize'] = $request->organize;
                		$label['cityinfo'] = DB::table('city')->where('parent_id',$request['organize'])->select('id','city_name')->get();
                	}else{
                		$query =$query;
                		$label['organize'] = null;
                	}    
                	$data = $query->orderBy('id','desc')->paginate(15);                                                    
                break;
            // admin管理员
            case 7:                                                                       
                $query = DB::table('organize as o')
            		->rightjoin('city as ci','o.id','=','ci.parent_id')
            		->select('ci.*','o.organize_name');            
            		if($request['city']){
            			$query = $query->where('ci.id',$request['city']);
            			$label['organize'] = $request->organize;
            			$label['city'] = $request->city;
            			$label['cityinfo'] = DB::table('city')->where('parent_id',$request['organize'])->select('id','city_name')->get();
            		// dd($label['organize']);
                	}elseif($request['organize']){
                		$query = $query->where('o.id',$request['organize']);
                		$label['organize'] = $request->organize;
                		$label['cityinfo'] = DB::table('city')->where('parent_id',$request['organize'])->select('id','city_name')->get();
                	}else{
                		$query =$query;
                		$label['organize'] = null;
                	}            
                	$data = $query->orderBy('id','desc')->paginate(15);                                            
                break;
			//省级单位管理员
			case 6:																				
				$organizeId = \Auth::user() -> organizeID;
				$query = DB::table('city as ci')
						->join('organize as o','o.id','=','ci.parent_id')
			            ->where('ci.parent_id','=',$organizeId)
						->select('ci.*','o.organize_name');
				if($request['city']){
					$query = $query->where('ci.id',$request['city']);
					$label['city'] = $request->city;
				}else{
					$query = $query;
				}
				$data = $query->orderBy('id','desc')->paginate(15);
				$data->city = DB::table('city')->where('parent_id',$organizeId)->select('id','city_name')->get();
				break;
			case 5:
			// 市区级管理员
				$cityId = \Auth::user() -> organizeID;
		        $query = DB::table('city as c')
		        		->join('organize as o','o.id','=','c.parent_id')
		                ->join('users','c.id','=','users.organizeID')
		                ->join('role_user','role_user.user_id','=','users.id')
		                ->join('roles','roles.id','=','role_user.role_id')
		                ->where('c.id','=', $cityId)
		                ->where('roles.id','=','4')
		                ->select('c.*','o.organize_name')
		                ->distinct();
		                $data = $query->orderBy('id','desc')->paginate(15);
		        break;
        }

        	
		$data->flag = $request['flag'];
		$data->labels = $label;
		return view('qiyun/admin/organization/cityList')->with('data',$data)->with('organize',$organize);
	}


	/**
	 * 城市添加页
	 */
	public function addcity(){
		if(\Auth::user() -> level() > 6){
			$data = DB::table('organize')->get();
		}
		// 省级管理员
		if(Auth::user()->level() == 6){
            $data = DB::table('organize')->where('id',Auth::user()->organizeID)->select('id as organizeid','organize_name')->first();
            $data->citynames = DB::table('city')->where('parent_id',Auth::user()->organizeID)->select('id','city_name')->get();
        }
        return view('qiyun/admin/organization/cityadd')->with('data',$data);
	}

	/**
	 * 城市添加方法
	 */
	public function addcityexe(Request $request){
		if(Auth::user()->level() > 6){
            if(!$request['organizeid']){
                return redirect()->back()->withErrors('请先选择省份');
            }
        }
		 // 验证
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $isMobile="/^(?:13\d|15\d)\d{5}(\d{3}|\*{3})$/";   
        $isPhone="/^((0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/";
		if(!preg_match($isMobile,$request['city_tel']) && !preg_match($isPhone,$request['city_tel'])){
			 return Redirect()->back()->withErrors("请填写正确的手机或电话号码");
		}
		$data = $request->except('_token','organizeid');
		$data['parent_id'] = $request['organizeid'];
		// dd($data);exit;
        $res = DB::table('city')->insert($data);
        if($res){
            return redirect('admin/message')->with(['status'=>'添加成功','redirect'=>'organization/cityList']);
        }else{
            return redirect()->back()->withInput($request->all())->withErrors('添加失败');
        }

	}


	/**
	 * 城市编辑页
	 */
	public function editcity($id){
		if(\Auth::user() -> level() > 6){
				$data = DB::table('city as ci')
						->join('organize as o','o.id','=','ci.parent_id')
						->select('ci.*','o.id as organizeid','o.organize_name','ci.id as cityid','ci.city_name','ci.city_intro')
						->where('ci.id',$id)
						->first();
				$data->organize_name = DB::table('organize')->select('id','organize_name')->get();
				$data->citys = DB::table('city')->where('parent_id',$data->organizeid)->select('id','city_name')->get();
		}
		if(\Auth::user() -> level() == 6){
				$data = DB::table('city as ci')
						->join('organize as o','o.id','=','ci.parent_id')
						->select('ci.*','o.id as organizeid','o.organize_name','ci.id as cityid','ci.city_name','ci.city_intro')
						->where('ci.id',$id)
						->first();
				$data->organizename = DB::table('organize')->select('id','organize_name')->get();
				$data->cityname = DB::table('city')->where('parent_id',$data->organizeid)->select('id','city_name')->get();
		}
		if(\Auth::user() ->level() == 5 ){
				$data = DB::table('county as co')
						->join('city as ci','ci.id','=','co.parent_id')
						->join('organize as o','o.id','=','ci.parent_id')
						->select('ci.*','o.organize_name','o.id as organizeid')
						->where('ci.id',$id)
						->first();
		}
		

		return view('qiyun/admin/organization/cityEdit')->with('data',$data);
	}


	/**
	 * 城市编辑
	 */
	public function editcitysub(Request $request){
		 // 验证
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $isMobile="/^(?:13\d|15\d)\d{5}(\d{3}|\*{3})$/";   
        $isPhone="/^((0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/";
		if(!preg_match($isMobile,$request['city_tel']) && !preg_match($isPhone,$request['city_tel'])){
			 return Redirect()->back()->withErrors("请填写正确的手机或电话号码");
		}
        if(\Auth::user() -> level() > 6){
			$data = $request->except('_token','id','organize');
			$data['parent_id'] = $request['organize'];
		}
		if(\Auth::user() -> level() == 6){
			$data = $request->except('_token','id','organize','cityname');
			$data['parent_id'] = $request['organize'];
			// $data['city_name'] = $request['cityname'];
		}
		if(\Auth::user() -> level() == 5 ){
			$data = $request->except('_token','organize');
			$data['parent_id'] = $request['organize'];
		}

		

        // dd($data);exit();
		$res = DB::table('city')->where('id',$request['id'])->update($data);	
		if($res !==false){
            return redirect('admin/message')->with(['status'=>'修改成功','redirect'=>'organization/cityList']);
        }else{
            return redirect()->back()->withInput()->withErrors('修改失败');
        }

	}


	/**
	 * 城市删除
	 */
	public function delcity($id){
		$county = DB::table('county')->where('parent_id',$id)->get();
		if($county){
			return redirect('admin/message')->with(['status'=>'子表中有数据，请先删除子表数据','redirect'=>'organization/cityList']);
		}else{
			$data = DB::table('city')->where('id',$id)->delete();
			if($data){
				return redirect('admin/message')->with(['status'=>'删除成功','redirect'=>'organization/cityList']);
			}else{
				return redirect()->back()->withInput()->withErrors('删除失败！');
			}
		}
    }


     /**
     * 验证
     */
    protected function validator(array $data){
        $rules = [
            'city_name' => 'required',
            'city_intro'=>'required',
            'city_tel'=>'required',    
        ];

        $messages = [
            'city_name.required' => '请填写市教育局名称',
            'city_intro.required' => '请填写城市信息',
            'city_tel.required' => '请填写电话',
            // 'city_tel.numeric'  => '请填写正确电话号码',   
        ];
        return Validator::make( $data, $rules, $messages );
    }



}
