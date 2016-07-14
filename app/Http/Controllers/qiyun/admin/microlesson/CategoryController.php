<?php

namespace App\Http\Controllers\qiyun\admin\microlesson;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;

class CategoryController extends Controller{

  /***********************学段列表************************/
	/**
    * 学段列表页
    */
   
	public function index(){

		$data = DB::table('mini_tag_section')->paginate(5);

		return view('qiyun/admin/microlesson/category/microlessonCategoryList')->with('data',$data);
	}


   /**
    * 学段编辑页
    */
   public function editsection($id){
   		$data = DB::table('mini_tag_section')->where('id',$id)->first();
   		return view('qiyun/admin/microlesson/category/sectionedit')->with('data',$data);
   }


    /**
   	*学段编辑方法
    */
   	public function editsectionsub(Request $request){

   		$data['sectionName'] = $request['sectionName'];

   		$res = DB::table('mini_tag_section')->where('id',$request['id'])->update($data);
        if($res !== false){
            return redirect('admin/message')->with(['status'=>'学段编辑修改成功','redirect'=>'microlesson/microlessonCategoryList']);
        }else{
            return redirect()->back()->withInput()->withErrors('学段编辑修改失败');
        }
   	}



    /**
     * 删除信息
     */
    public function delsection($id){
        $mini_grade = DB::table('mini_tag_grade')->where('parentId',$id)->get();
        if($mini_grade){
            return redirect('admin/message')->with(['status'=>'学段子表中有数据，请先删除子表数据','redirect'=>'microlesson/microlessonCategoryList']);
        }else{
            $data = DB::table('mini_tag_section')->where('id',$id)->delete();
            if($data){
                return redirect('admin/message')->with(['status'=>'学段删除成功','redirect'=>'microlesson/microlessonCategoryList']);
            }else{
                return redirect()->back()->withInput()->withErrors('学段评论删除失败！');
            }
        }
    }




    /***********************班级列表************************/

    /**
     * 班级列表页
     */
    public function listgrade($id){
    	$data = DB::table('mini_tag_grade as mtg')
            ->join('mini_tag_section as mts','mts.id','=','mtg.parentId')
			->where('mtg.parentId',$id)
            ->select('mtg.*','mts.sectionName')
			->paginate(8);
		
    	return view('qiyun/admin/microlesson/category/grade')->with('data',$data);
    }


    /**
     * 班级编辑页
     */
    public function editgrade($id){
   		$data = DB::table('mini_tag_grade')->where('id',$id)->first();
   		return view('qiyun/admin/microlesson/category/gradeedit')->with('data',$data);
    }


    /**
    *班级编辑方法
    */
    public function editgradesub(Request $request){

      $data['gradeName'] = $request['gradeName'];
      // ->join('mini_tag_subject as mts','mtg.id','=','mts.parentId')
      $res = DB::table('mini_tag_grade as mtg')
            ->where('id',$request['id'])
            ->update($data);

      if($res !== false){
          return redirect('admin/message')->with(['status'=>'班级编辑修改成功','redirect'=>'microlesson/microlessonCategoryList']);
      }else{
          return redirect()->back()->withInput()->withErrors('班级编辑修改失败');
      }

    }

    /**
    * 删除信息
    */
   
    public function delgrade($id){
        $mini_subject = DB::table('mini_tag_subject')->where('parentId',$id)->get();
        if($mini_subject){
            return redirect('admin/message')->with(['status'=>'班级表中子表有数据，请先删除子表中数据','redirect'=>'microlesson/microlessonCategoryList']);
        }else{
            $data = DB::table('mini_tag_grade')->where('id',$id)->delete();
            if($data){
                return redirect('admin/message')->with(['status'=>'班级删除成功','redirect'=>'microlesson/microlessonCategoryList']);
            }else{
                return redirect()->back()->withInput()->withErrors('班级评论删除失败！');
            }
        }
    }



    /***********************学科列表************************/

    /**
     * 学科列表页
     */
    public function listsubject($id){
    	$data = DB::table('mini_tag_subject as mts')
            ->join('mini_tag_grade as mtg','mtg.id','=','mts.parentId')
            ->join('mini_tag_section as mtse','mtse.id','=','mtg.parentId')
    		->where('mts.parentId',$id)
            ->select('mts.*','mtg.gradeName','mtse.sectionName')
    		->paginate(8);

    	return view('qiyun/admin/microlesson/category/subject')->with('data',$data);	
    }


    /**
     * 学科添加页
     */
    public function addsubject(Request $request){
        // 获取学段
        $section = DB::table('mini_tag_section')->select('id','sectionName')->get();
        return view('qiyun/admin/microlesson/category/subjectadd')->with('section',$section);
    }

    /**
     * ajax联动
     */
    public function ajaxgrade(Request $request){
        $grade = DB::table('mini_tag_grade')->where('parentId',$request['id'])->get();
        echo json_encode($grade);
    }

    /**
     * ajax验证学科名称
     */
    public function ajaxname(Request $request){
        $subject = $request['subjectname'];
        $sectionId = $request['sectionid'];
        $gradeId = $request['gradeid'];
        
        $subjectname = DB::table('mini_tag_section as mts')
                        ->join('mini_tag_grade as mtg','mts.id','=','mtg.parentId')
                        ->join('mini_tag_subject as mtsj','mtg.id','=','mtsj.parentId')
                        ->where('mts.id',$sectionId)
                        ->where('mtg.id',$gradeId)
                        ->where('subjectName',$subject)
                        ->select('mtsj.subjectName')
                        ->get();
        if($subjectname){
            echo json_encode(['status'=>true]);
        }else{
            echo json_encode(['status'=>false]);
        }
    }


    /**
     * 学科添加方法
     */
    public function addsubjectsub(Request $request){
        // 验证
        $validator = $this -> validator($request->all());
        if ($validator -> fails()){
            return Redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        $data = $request->except('_token','section','grade');
        $data['parentId'] = $request['grade'];
        $data['subjectName'] = $request['subjectName'];
        $arr = array("语文","数学","英语");
        if(in_array($data['subjectName'],$arr)){
            if($data['subjectName'] == '语文'){
                $data['subjectType'] = '1';
            }
            if($data['subjectName'] == '数学'){
                $data['subjectType'] = '2';
            }
            if($data['subjectName'] == '英语'){
                $data['subjectType'] = '3';
            }
        }else{
            return redirect()->back()->withErrors('请填写正确的学科');
        }
        // dd($data);exit();
        $res = DB::table('mini_tag_subject')->insert($data);
        if($res !== false){
            return redirect('admin/message')->with(['status'=>'学科添加成功','redirect'=>"microlesson/microlessonCategoryList"]);
        }else{
            return redirect()->back()->withInput()->withErrors('学科添加失败');
        }
    }



    /**
     * 学科编辑页
     */
    public function editsubject($id){
    	$data = DB::table('mini_tag_subject')->where('id',$id)->first();
    	return view('qiyun/admin/microlesson/category/subjectedit')->with('data',$data);
    }

    /**
   	*学科编辑方法
    */
   	public function editsubjectsub(Request $request){
        $subjectparentId = DB::table('mini_tag_subject as mts')->get();
   		  $data['subjectName'] = $request['subjectName'];

   		$res = DB::table('mini_tag_subject')->where('id',$request['id'])->update($data);
        if($res !== false){
            return redirect('admin/message')->with(['status'=>'学科编辑成功','redirect'=>"microlesson/microlessonCategoryList"]);
        }else{
            return redirect()->back()->withInput()->withErrors('学科编辑失败');
        }
   	}

    /**
    * 删除信息
    */
    public function delsubject($id){
        $data = DB::table('mini_tag_subject')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'学段删除成功','redirect'=>'microlesson/microlessonCategoryList']);
        }else{
            return redirect()->back()->withInput()->withErrors('学段删除失败！');
        }
    }


    /**
     * 验证(添加)
     */
    protected function validator(array $data){
        $rules = [
            'subjectName' => 'required',
            'grade'       => 'required'
        ];

        $messages = [
            'subjectName.required' => '请填写学科名称',  
            'grade.required'       => '请选择年级' 
        ];
        return Validator::make( $data, $rules, $messages );
    }



}