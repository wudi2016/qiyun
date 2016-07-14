<?php

namespace App\Http\Controllers\qiyun\admin\resource;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\sectionAddPostRequest;
use App\Http\Requests\resComEditPostRequest;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;



class resourceController extends Controller
{
    /**
     * 
     * 学段列表
     * 
     */
    public function sectionList(Request $request){
        $query = DB::table('studysection') -> where('parentId','1') -> orderBy('id', 'desc');
        // dd($request['type']);
        if($request['type'] == 2){ //根据自增id查询
            $query = $query->where('id',trim($request['search']));
        }
        if($request['type'] == 3){ //根据学段名称查询
            $query = $query->where('sectionName','like','%'.trim($request['search']).'%');
        }
        $data = $query -> paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.resource.sectionList',['data'=>$data]);
    }

    
    // 添加学段
    
    public function sectionAdd(){
        return view('qiyun.admin.resource.sectionAdd');
    }
    public function sectionDoAdd(sectionAddPostRequest $request){

        $id = DB::table('studysection')->insertGetId(
            ['sectionName' => $request -> sectionName, 'parentId' => 1]
        );        

        if($id){
            //添加成功
            return back()-> with('status', 1);
        }else{
            //添加失败
            return back()-> with('status', 0);
        }
    }

    
    // 编辑学段
     
    public function sectionEdit($id){
        $res = DB::table('studysection')->select('id', 'sectionName') -> where('id',$id) ->get();
        return view('qiyun.admin.resource.sectionEdit',['data'=>$res[0]]);
    }
    public function sectionDoEdit(sectionAddPostRequest $request){
      
        if(DB::table('studysection') -> where('id', $request->id) -> update(['sectionName' => $request->sectionName])){
            //修改成功
            return back()-> with('status', 1);
        }else{
            //修改失败
            return back()-> with('status', 0);
        }
    } 

    
    //删除学段
     
    public function sectionDel($id){
        if (DB::table('studysubject')->where('parentId',$id)->first()) {
                //该学段下有学科
                return back()-> with('status', 2);
        }else{
            if(DB::table('studysection')->where('id',$id)->delete()){
                //删除成功
                return back()-> with('status', 1);
            }else{
                //删除失败
                return back()-> with('status', 0);
            }            
        }
    }



    /**
     * 
     * 学科列表
     * 
     */
    public function subjectList(Request $request){
        
        $res = DB::table('studysubject as subject')
            ->join('studysection as section', 'subject.parentId', '=', 'section.id')
            ->select('section.sectionName as sectionName','subject.subjectName as subjectName', 'subject.id as id')
            ->where('section.parentId','=',1)
            -> orderBy('subject.id', 'desc'); 

        if($request['type'] == 2){ //根据自增id查询
            $query = $res->where('subject.id',trim($request['search']));
        }
        if($request['type'] == 3){ //根据所属学段名称查询
            $query = $res->where('section.sectionName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据学科名称查询
            $query = $res->where('subject.subjectName','like','%'.trim($request['search']).'%');
        }
        $data = $res -> paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.resource.subjectList',['data'=>$data]);
    }

   
    // 添加学科
     
    public function subjectAdd(){
        return view('qiyun.admin.resource.subjectAdd');
    }
    //查询所有学段 接口
    public function getSection(){
        if($res = DB::table('studysection')->select('sectionName', 'id') -> where('parentId',1) ->get()){
            echo json_encode($res);
        }

    }

    public function subjectDoAdd(){
        $arr = json_decode(file_get_contents('php://input'),true);
        
        $id = DB::table('studysubject')->insertGetId(
            ['subjectName' => $arr['subjectName'], 'parentId' => $arr['resourceSection']]
        );        

        if($id){
            //添加成功
            echo 1;
        }else{
            //添加失败
            echo 0;
        }
    }

    //编辑学科
    public function subjectEdit($id){
        return view('qiyun.admin.resource.subjectEdit');
    }

    //查询要修改的学科信息接口
    public function getSubjectInfo($id){
        // $res = DB::table('studysubject')->select('id', 'subjectName','parentId') -> where('id',$id) ->get();
        $res = DB::table('studysubject as subject')
            ->join('studysection as section', 'subject.parentId', '=', 'section.id')
            ->select('section.sectionName as sectionName','section.id as sectionid','subject.subjectName as subjectName', 'subject.id as subjectid')
            ->where('subject.id','=',$id)
            ->get();
        echo json_encode($res[0]);
    }

    //执行编辑
    public function subjectDoEdit(){
        $arr = json_decode(file_get_contents('php://input'),true);

        if(DB::table('studysubject') -> where('id', $arr['subjectid']) -> update(['subjectName' => $arr['subjectName'],'parentId'=>$arr['resourceSection']])){
            //修改成功
            echo 1;
        }else{
            //修改失败
            echo 0;
        }        
    }

    //删除学科
    public function subjectDel($id){

        if (DB::table('studyedition')->where('parentId',$id)->first()) {
                //该学科下有版本
                return back()-> with('status', 2);
        }else{
            if(DB::table('studysubject')->where('id',$id)->delete()){
                //删除成功
                return back()-> with('status', 1);
            }else{
                //删除失败
                return back()-> with('status', 0);
            }         
        }       
    }



    /**
     * 
     * 版本列表
     * 
     */
    public function editionList(Request $request){
        $res = DB::table('studyedition as edition')
            ->join('studysubject as subject','edition.parentId', '=','subject.id')
            ->join('studysection as section', 'subject.parentId', '=', 'section.id')
            ->select('section.sectionName as sectionName','subject.subjectName as subjectName','edition.editionName as editionName', 'edition.id as id')
            ->where('section.parentId','=',1)
            -> orderBy('edition.id', 'desc'); 
        
        if($request['type'] == 2){ //根据自增id查询
            $query = $res->where('edition.id',trim($request['search']));
        }
        if($request['type'] == 3){ //根据所属学段名称查询
            $query = $res->where('section.sectionName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据所属学科查询
            $query = $res->where('subject.subjectName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 5){ //根据版本名称查询
            $query = $res->where('edition.editionName','like','%'.trim($request['search']).'%');
        }        
        $data = $res -> paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.resource.editionList',['data'=>$data]);

    }
    
    //添加版本
    public function editionAdd(){
        return view('qiyun.admin.resource.editionAdd');
    }

    //查询所有学科 接口
    public function getSubject($id){
        if($res = DB::table('studysubject')->select('subjectName', 'id') -> where('parentId',$id) ->get()){
            echo json_encode($res);
        }

    }

    //查询拓展类型接口
    public function getExpandSel($id){
        if($res = DB::table('expandResourceSel')->select('selName', 'id') -> where('pid',$id) ->get()){
            echo json_encode($res);
        }
    }

    public function editionDoAdd(){
        $arr = json_decode(file_get_contents('php://input'),true);
        
        $id = DB::table('studyedition')->insertGetId(
            ['editionName' => $arr['editionName'], 'parentId' => $arr['resourceSubject']]
        );        

        if($id){
            //添加成功
            echo 1;
        }else{
            //添加失败
            echo 0;
        }
    }

    //编辑版本
    public function editionEdit($id){
        return view('qiyun.admin.resource.editionEdit');
    }

    //查询要修改的版本信息接口
    public function getEditionInfo($id){
        $res = DB::table('studyedition as edition')
            ->join('studysubject as subject','edition.parentId', '=','subject.id')
            ->join('studysection as section', 'subject.parentId', '=', 'section.id')
            ->select('section.sectionName as sectionName','section.id as sectionid','subject.subjectName as subjectName','subject.id as subjectid','edition.editionName as editionName', 'edition.id as id')
            ->where('edition.id','=',$id)
            ->get(); 
        echo json_encode($res[0]);
    }

    //执行编辑
    public function editionDoEdit(){
        $arr = json_decode(file_get_contents('php://input'),true);

        if(DB::table('studyedition') -> where('id', $arr['editionid']) -> update(['editionName' => $arr['editionName'],'parentId'=>$arr['resourceSubject']])){
            //修改成功
            echo 1;
        }else{
            //修改失败
            echo 0;
        }        
    }    

    //删除版本
    public function editionDel($id){

        if (DB::table('studygrade')->where('parentId',$id)->first()) {
                //该版本下有册别
                return back()-> with('status', 2);
        }else{

            if(DB::table('studyedition')->where('id',$id)->delete()){
                //删除成功
                return back()-> with('status', 1);
            }else{
                //删除失败
                return back()-> with('status', 0);
            }          
        }        
    }



    /**
     * 
     * 册别列表
     * 
     */
    public function gradeList(Request $request){
        $res = DB::table('studygrade as grade')
            ->join('studyedition as edition','grade.parentId','=','edition.id')
            ->join('studysubject as subject','edition.parentId', '=','subject.id')
            ->join('studysection as section', 'subject.parentId', '=', 'section.id')
            ->select('section.sectionName as sectionName','subject.subjectName as subjectName','edition.editionName as editionName','grade.gradeName as gradeName', 'grade.id as id')
            ->where('section.parentId','=',1)
            -> orderBy('grade.id', 'desc'); 

        if($request['type'] == 2){ //根据自增id查询
            $query = $res->where('grade.id',trim($request['search']));
        }
        if($request['type'] == 3){ //根据所属学段名称查询
            $query = $res->where('section.sectionName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据所属学科查询
            $query = $res->where('subject.subjectName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 5){ //根据版本名称查询
            $query = $res->where('edition.editionName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 6){ //根据册别名称查询
            $query = $res->where('grade.gradeName','like','%'.trim($request['search']).'%');
        }                
        $data = $res -> paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.resource.gradeList',['data'=>$data]);

    }

    //添加册别
    public function gradeAdd(){
        return view('qiyun.admin.resource.gradeAdd');
    }

    //查询所有版本 接口
    public function getEdition($id){
        if($res = DB::table('studyedition')->select('editionName', 'id') -> where('parentId',$id) ->get()){
            echo json_encode($res);
        }

    }

    public function gradeDoAdd(){
        $arr = json_decode(file_get_contents('php://input'),true);
        
        $id = DB::table('studygrade')->insertGetId(
            ['gradeName' => $arr['gradeName'], 'parentId' => $arr['resourceEdition']]
        );        

        if($id){
            //添加成功
            echo 1;
        }else{
            //添加失败
            echo 0;
        }
    }


    //编辑册别
    public function gradeEdit($id){
        return view('qiyun.admin.resource.gradeEdit');
    }

    //查询要修改的册别信息接口
    public function getGradeInfo($id){
        $res = DB::table('studygrade as grade')
            ->join('studyedition as edition','grade.parentId','=','edition.id')
            ->join('studysubject as subject','edition.parentId', '=','subject.id')
            ->join('studysection as section', 'subject.parentId', '=', 'section.id')
            ->select('section.sectionName as sectionName','section.id as sectionid','subject.subjectName as subjectName','subject.id as subjectid','edition.editionName as editionName','edition.id as editionid','grade.gradeName as gradeName', 'grade.id as id')
            ->where('grade.id','=',$id)
            ->get(); 
        echo json_encode($res[0]);
    }

    //执行编辑
    public function gradeDoEdit(){
        $arr = json_decode(file_get_contents('php://input'),true);

        if(DB::table('studygrade') -> where('id', $arr['gradeid']) -> update(['gradeName' => $arr['gradeName'],'parentId'=>$arr['resourceEdition']])){
            //修改成功
            echo 1;
        }else{
            //修改失败
            echo 0;
        }        
    } 

    //删除册别
    public function gradeDel($id){

        if (DB::table('chapter')->where('parentGradeId',$id)->first() || DB::table('resource')->where('resourceGrade',$id)->first()) {
                //该册别下有教材目录 或 资源
                return back()-> with('status', 2);
        }else{

            if(DB::table('studygrade')->where('id',$id)->delete()){
                //删除成功
                return back()-> with('status', 1);
            }else{
                //删除失败
                return back()-> with('status', 0);
            }         
        }        
    }


    /**
     * 
     * 教材目录列表
     * 
     */
    public function chapterList(Request $request){
        $res = DB::table('chapter')
            ->join('studygrade as grade','chapter.parentGradeId','=','grade.id')
            ->join('studyedition as edition','grade.parentId','=','edition.id')
            ->join('studysubject as subject','edition.parentId', '=','subject.id')
            ->join('studysection as section', 'subject.parentId', '=', 'section.id')
            ->select('section.sectionName as sectionName','subject.subjectName as subjectName','edition.editionName as editionName','grade.gradeName as gradeName','chapter.chapterName as chapterName', 'chapter.id as id')
            ->where('section.parentId','=',1)
            ->orderBy('chapter.id', 'desc');
        
        if($request['type'] == 2){ //根据自增id查询
            $query = $res->where('chapter.id',trim($request['search']));
        }
        if($request['type'] == 3){ //根据所属学段名称查询
            $query = $res->where('section.sectionName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据所属学科查询
            $query = $res->where('subject.subjectName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 5){ //根据版本名称查询
            $query = $res->where('edition.editionName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 6){ //根据册别名称查询
            $query = $res->where('grade.gradeName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 7){ //根据教材目录查询
            $query = $res->where('chapter.chapterName','like','%'.trim($request['search']).'%');
        }                  
        $data = $res -> paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.resource.chapterList',['data'=>$data]);

    }

    //添加教材目录
    public function chapterAdd(){
        return view('qiyun.admin.resource.chapterAdd');
    }

    //查询所有册别 接口
    public function getGrade($id){
        if($res = DB::table('studygrade')->select('gradeName', 'id') -> where('parentId',$id) ->get()){
            echo json_encode($res);
        }

    }

    //查询所有教材目录选项 接口
    public function getChapter($id){
        $studychapter = DB::select("select id,chapterName,path from chapter where parentGradeId = ? order by concat(path,'-',id)",[$id]);

        foreach ($studychapter as $key => &$value) {
            $pre = '';
            $num = count(explode('-',$value->path));
            for($i = 0;$i < $num;$i++){
                $pre .= '|----';
            }

            $value->chapterName = $pre.$value->chapterName;
        }
        echo json_encode($studychapter);
    }

    public function chapterDoAdd(){
        $arr = json_decode(file_get_contents('php://input'),true);
        
        if($arr['resourceChapter'] == 0){
            $path = 0;
        }else{

            if($res = DB::select("select path from chapter where id = ? ",[$arr['resourceChapter']])){
                $path = $res[0] -> path .'-'.$arr['resourceChapter'];
            }         
        }

        $id = DB::table('chapter')->insertGetId(
            ['chapterName' => $arr['chapterName'], 'parentId' => $arr['resourceChapter'],'parentGradeId' => $arr['resourceGrade'],'path' => $path]
        );        

        if($id){
            //添加成功
            echo 1;
        }else{
            //添加失败
            echo 0;
        }
    }

    //编辑教材目录
    public function chapterEdit($id){
        return view('qiyun.admin.resource.chapterEdit');
    }

    //查询要修改的教材目录信息  接口
    public function getChapterInfo($id){
        $res = DB::table('chapter')
            ->join('studygrade as grade','chapter.parentGradeId','=','grade.id')
            ->join('studyedition as edition','grade.parentId','=','edition.id')
            ->join('studysubject as subject','edition.parentId', '=','subject.id')
            ->join('studysection as section', 'subject.parentId', '=', 'section.id')
            ->select('section.sectionName as sectionName','section.id as sectionid','subject.subjectName as subjectName','subject.id as subjectid','edition.editionName as editionName','edition.id as editionid','grade.gradeName as gradeName','grade.id as gradeid','chapter.chapterName as chapterName','chapter.parentId as chapterid', 'chapter.id as id')
            ->where('chapter.id','=',$id)
            ->get(); 
        echo json_encode($res[0]);
    }

    //执行编辑
    public function chapterDoEdit(){
        $arr = json_decode(file_get_contents('php://input'),true);
        
        // dd($arr);

        if($arr['resourceChapter'] == 0){
            $path = 0;
        }else{

            if($res = DB::select("select path from chapter where id = ? ",[$arr['resourceChapter']])){
                $path = $res[0] -> path .'-'.$arr['resourceChapter'];
            }         
        }

        if(DB::table('chapter') -> where('id', $arr['id']) -> update( ['parentGradeId' =>$arr['resourceGrade'],'chapterName' => $arr['chapterName'],'parentId'=>$arr['resourceChapter'],'path'=>$path] )){
            //修改成功
            echo 1;
        }else{
            //修改失败
            echo 0;
        }        
    } 

    //删除教材目录
    public function chapterDel($id){

        if (DB::table('chapter')->where('parentId',$id)->first() || DB::table('resource')->where('resourceChapter',$id)->first()) {
                //该目录下有子目录 或 资源
                return back()-> with('status', 2);
        }else{

            if(DB::table('chapter')->where('id',$id)->delete()){
                //删除成功
                return back()-> with('status', 1);
            }else{
                //删除失败
                return back()-> with('status', 0);
            }        
        }           
    }


    /**
     *
     * 拓展资源类别列表
     *
     */
     public function expandResSelList(Request $request){
         $res = DB::table('expandResourceSel as ers')
             ->join('studysection as section', 'ers.pid', '=', 'section.id')
             ->select('section.sectionName as sectionName','ers.selName as selName', 'ers.id as id')
             ->where('section.parentId','=',1)
             -> orderBy('ers.id', 'desc');

         if($request['type'] == 2){ //根据自增id查询
             $query = $res->where('ers.id',trim($request['search']));
         }
         if($request['type'] == 3){ //根据所属学段名称查询
             $query = $res->where('section.sectionName','like','%'.trim($request['search']).'%');
         }
         if($request['type'] == 4){ //根据类别名称查询
             $query = $res->where('ers.selName','like','%'.trim($request['search']).'%');
         }
         $data = $res -> paginate(15);
         $data->type = $request['type'];
         return view('qiyun.admin.resource.expandResSelList',['data'=>$data]);

     }

    // 添加拓展资源类别

    public function expandResSelAdd(){
        return view('qiyun.admin.resource.expandResSelAdd');
    }

    public function expandResSelDoAdd(){
        $arr = json_decode(file_get_contents('php://input'),true);

        $id = DB::table('expandResourceSel')->insertGetId(
            ['selName' => $arr['selName'], 'pid' => $arr['resourceSection']]
        );

        if($id){
            //添加成功
            echo 1;
        }else{
            //添加失败
            echo 0;
        }
    }

    //编辑拓展资源类别
    public function expandResSelEdit($id){
        return view('qiyun.admin.resource.expandResSelEdit');
    }

    //查询要修改的拓展资源的类别信息接口
    public function getExpandResSelInfo($id){
        // $res = DB::table('studysubject')->select('id', 'subjectName','parentId') -> where('id',$id) ->get();
        $res = DB::table('expandResourceSel as ers')
            ->join('studysection as section', 'ers.pid', '=', 'section.id')
            ->select('section.sectionName as sectionName','section.id as sectionid','ers.selName as selName', 'ers.id as id')
            ->where('ers.id','=',$id)
            ->first();
//        dd($res);
        echo json_encode($res);
    }

    //执行编辑
    public function expandResSelDoEdit(){
        $arr = json_decode(file_get_contents('php://input'),true);

        if(DB::table('expandResourceSel') -> where('id', $arr['id']) -> update(['selName' => $arr['selName'],'pid'=>$arr['resourceSection']])){
            //修改成功
            echo 1;
        }else{
            //修改失败
            echo 0;
        }
    }

    //删除拓展资源类别
    public function expandResSelDel($id){

        if (DB::table('resource')->where('expandId',$id)->first()) {
            //该类别下有拓展资源
            return back()-> with('status', 2);
        }else{
            if(DB::table('expandResourceSel')->where('id',$id)->delete()){
                //删除成功
                return back()-> with('status', 1);
            }else{
                //删除失败
                return back()-> with('status', 0);
            }
        }
    }


    /**
     * 
     * 资源列表
     * 
     */
    public function resourceList(Request $request){
        $res = DB::table('resource')
            // ->join('chapter','resource.resourceChapter','=','chapter.id')
            ->join('studygrade as grade','resource.resourceGrade','=','grade.id')
            ->join('studyedition as edition','resource.resourceEdition','=','edition.id')
            ->join('studysubject as subject','resource.resourceSubject', '=','subject.id')
            ->join('studysection as section', 'resource.resourceSection', '=', 'section.id')
            // ->select('section.sectionName as sectionName','subject.subjectName as subjectName','edition.editionName as editionName','grade.gradeName as gradeName','chapter.chapterName as chapterName','resource.id as id','resourceTitle','resourceAuthor','resourceStatus','resourceCheck','created_at')->orderBy('id', 'desc');
            ->select('section.sectionName as sectionName','subject.subjectName as subjectName','edition.editionName as editionName','grade.gradeName as gradeName','resource.id as id','resourceTitle','resourceAuthor','resourceStatus','resourceCheck','created_at')->orderBy('id', 'desc');
        
        if($request['type'] == 2){ //根据自增id查询
            $query = $res->where('resource.id',trim($request['search']));
        }
        if($request['type'] == 3){ //根据资源标题
            $query = $res->where('resourceTitle','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据作者
            $query = $res->where('resourceAuthor','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 5){ //根据学段名称查询
            $query = $res->where('section.sectionName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 6){ //根据学科名称查询
            $query = $res->where('subject.subjectName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 7){ //根据版本名称查询
            $query = $res->where('edition.editionName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 8){ //根据册别名称查询
            $query = $res->where('grade.gradeName','like','%'.trim($request['search']).'%');
        }       
        //if($request['type'] == 9){ //根据教材目录查询
        //    $query = $res->where('chapter.chapterName','like','%'.$request['search'].'%');
        //}


        $data = $res -> paginate(15);

        $data->type = $request['type'];

        return view('qiyun.admin.resource.resourceList',['data'=>$data]);
    } 

    //拓展资源列表
    public function expandResourceList(Request $request){
//        dd('cnm');
        $res = DB::table('resource')
            ->join('studysection as section','resource.resourceSection', '=', 'section.id')
            ->join('expandResourceSel as exp','resource.expandId','=','exp.id')
            ->select('resource.id as id','section.sectionName as sectionName','exp.selName as selName','resourceTitle','resourceAuthor','resourceStatus','resourceCheck','created_at')->orderBy('id','desc');

        if($request['type'] == 2){ //根据自增id查询
            $query = $res->where('resource.id',trim($request['search']));
        }
        if($request['type'] == 3){ //根据资源标题
            $query = $res->where('resourceTitle','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){ //根据作者
            $query = $res->where('resourceAuthor','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 5){ //根据学段名称查询
            $query = $res->where('section.sectionName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 6){ //根据拓展类别查询
            $query = $res->where('exp.selName','like','%'.trim($request['search']).'%');
        }


        $data = $res -> paginate(15);
        $data->type = $request['type'];
        return view('qiyun.admin.resource.expandResourceList',['data'=>$data]);

    }

    //添加资源
    public function resourceAdd(){
        // dd('添加资源');
      
        return view('qiyun.admin.resource.resourceAdd');
        
    }

    //获取资源类型接口
    public function getResourceType(){
        if($res = DB::table('resourcetype')->select('resourceTypeName', 'id') -> where('id','<>',1) ->get()){
            echo json_encode($res);
        }
    }

    //资源上传接口
    public function doAddResource(Request $request){
        // exit;
        //获取文件后缀名
        $ext = strrchr($_FILES['Filedata']['name'],'.');
        // $ext = $request->file('Filedata')->getExtension();
        
        if($request->hasFile('Filedata')){
            if ($request->file('Filedata')->isValid()) {
                $newname = time().$ext;
                if($request->file('Filedata')->move('./uploads/resource/',$newname)){
                    echo '/uploads/resource/'.$newname;
                }
            }
        }else{
            echo 0;  //没有文件上传 0
        }

    }

    //资源封面上传接口
    public function doAddResourcePic(Request $request){
        //获取文件后缀名
        $ext = strrchr($_FILES['Filedata']['name'],'.');

        if($request->hasFile('Filedata')){
            if ($request->file('Filedata')->isValid()) {
                $newname = time().$ext;
                if($request->file('Filedata')->move('./uploads/resource/',$newname)){
                    
                    $img = Image::make( realpath(base_path('public')) .'/uploads/resource/'.$newname) -> resize(170,128);
                    $img -> save( realpath(base_path('public')) .'/uploads/resource/small'.$newname);
                    echo '/uploads/resource/small'.$newname;

                    if(file_exists(realpath(base_path('public')) .'/uploads/resource/'.$newname)){
                        unlink(realpath(base_path('public')) .'/uploads/resource/'.$newname);
                    }
                }
            }
        }else{
            echo 0;  //没有文件上传
        }
    }

    //再次选择资源 ，删除上次选择资源 接口
    public function delLastUpload(){
        $arr = json_decode(file_get_contents('php://input'),true);
        if ($arr) {
            unlink($arr['lastUpload']);
        }
    }
 

    //资源信息上传接口
    public function doAddResourceInfo(){
        $arr = json_decode(file_get_contents('php://input'),true);

        if(DB::table('resource')->where('userId',Auth::user()->id)->where('resourceTitle',$arr['resourceTitle'])->first()) {//判断资源是否唯一
            echo 6;
            exit;
        }

        if($arr['isexpand'] == 1) {
            //添加移动端查询条件-开始
            $arr['gradeType'] = DB::table('studygrade')->select('gradeType')->where('id', $arr['resourceGrade'])->first()->gradeType;
            $arr['subjectType'] = DB::table('studysubject')->select('subjectType')->where('id', $arr['resourceSubject'])->first()->subjectType;
            $arr['editionType'] = DB::table('studyedition')->select('editionType')->where('id', $arr['resourceEdition'])->first()->editionType;
            //添加移动端查询条件-结束
        }
        $arr['userId'] = Auth::user() -> id;
        $arr['resourceAuthor'] = Auth::user() -> realname;
        $arr['created_at'] = date('Y-m-d H:i:s',time());
        $arr['updated_at'] = date('Y-m-d H:i:s',time());
        $arr['resourceCheck'] = 0;
        
        if(DB::table('resource')->insert($arr)){
            if($arr['isexpand'] == 1){
                echo 1; //普通资源添加成功
            }else{
                echo 2; //拓展资源添加成功
            }
        }else{
            echo 0;
        }
    }

    //删除资源
    public function resourceDel($id){

        //删除成功
        if($res = DB::table('resource') -> select('resourcePic','resourcePath') -> where('id',$id) -> get()){
            //删除封面图
            if ($res[0]->resourcePic != '/image/qiyun/resource/pre.png') {
                if(file_exists(realpath(base_path('public')) .$res[0]->resourcePic)){
                    unlink(realpath(base_path('public')) .$res[0]->resourcePic);
                }
            }
            //删除资源
            if(file_exists(realpath(base_path('public')) .$res[0]->resourcePath)){
                unlink(realpath(base_path('public')) .$res[0]->resourcePath);
            }
            //删除资源评论表
            DB::table('resourcecomment')->where('resourceId',$id)->delete();
            //删除资源点赞表
            DB::table('resource_click')->where('resourceId',$id)->delete();
            //删除资源举报表
            DB::table('resourceinformant')->where('resourceId',$id)->delete();
        }

        if(DB::table('resource')->where('id',$id)->delete()){
            return back()-> with('status', 1);
        }else{
            //删除失败
            return back()-> with('status', 0);
        } 
    }

    //多选资源删除
    public function resourceMultiDel(Request $request){
//        dd($request['resIds']);
        if($request['resIds']){
            foreach($request['resIds'] as $id){
                if($res = DB::table('resource') -> select('resourcePic','resourcePath') -> where('id',$id) -> get()){
                    //删除封面图
                    if ($res[0]->resourcePic != '/image/qiyun/resource/pre.png') {
                        if(file_exists(realpath(base_path('public')) .$res[0]->resourcePic)){
                            unlink(realpath(base_path('public')) .$res[0]->resourcePic);
                        }
                    }
                    //删除资源
                    if(file_exists(realpath(base_path('public')) .$res[0]->resourcePath)){
                        unlink(realpath(base_path('public')) .$res[0]->resourcePath);
                    }
                    //删除资源评论
                    DB::table('resourcecomment')->where('resourceId',$id)->delete();
                }
            }

            if(DB::table('resource')->whereIn('id',$request['resIds'])->delete()){
                return back()-> with('status', 1);
            }else{
                //删除失败
                return back()-> with('status', 0);
            }
        }else{
            return back();
        }
    }

    //获取资源其所有评论
    public function resourceComment(Request $request,$id){

        $res = DB::table('resourcecomment') -> select('id','username','commentContent','checks','created_at') -> where('resourceId',$id);

        if($request['type'] == 2){ //根据自增id查询
            $query = $res->where('id',$request['search']);
        }
        if($request['type'] == 3){ //根据评论者
            $query = $res->where('username','like','%'.$request['search'].'%');
        }
        if($request['type'] == 4){ //根据审核状态
            if($request['search'] == '通过'){
                $query = $res->where('checks',0);
            }else{
                $query = $res->where('checks',1);
            }

        }

        $data = $res -> paginate(15);

        $data->type = $request['type'];
        $data->resourceId = $id;

        return view('qiyun.admin.resource.resourceComment',['data'=>$data]);

    }

    //编辑评论
    public function resourceCommentEdit($id,$resId){
        $res = DB::table('resourcecomment') -> select('id','commentContent') -> where('id',$id) -> get();   
        return view('qiyun.admin.resource.resourceCommentEdit',['data'=>$res[0],'resId'=>$resId]);
    } 


    public function resourceCommentDoEdit(resComEditPostRequest $request){
      
        if(DB::table('resourcecomment') -> where('id', $request->id) -> update(['commentContent' => $request->commentContent])){
            //修改成功
            return back()-> with('status', $request->resId);
        }else{
            //修改失败
            return back()-> with('status', 0);
        }
    } 

    //删除评论
    public function resourceCommentDel($id){
        
        if(DB::table('resourcecomment')->where('id',$id)->delete()){
            //删除成功
            return back()-> with('status', 1);
        }else{
            //删除失败
            return back()-> with('status', 0);
        }
    }



    //举报资源列表
    public function resourceInformantList(Request $request){

        $query = DB::table('resourceinformant as i');
        if($request['type'] == 1){
            $query = $query->where('i.id','like','%'.$request['search'].'%');
        }
        $data = $query
            ->leftJoin('users as u','i.userId','=','u.id')
            ->leftJoin('resource as r','i.resourceId','=','r.id')
            ->select('i.*','r.resourceTitle','u.realname','r.id as rid')
            ->orderBy('id', 'desc')
            ->paginate(15);
        foreach($data as &$val){
            switch($val->type){
                case 0:
                    $val->types = '广告营销';
                    break;
                case 1:
                    $val->types = '抄袭内容';
                    break;
                case 2:
                    $val->types = '分类错误';
                    break;
                case 3:
                    $val->types = '暴力色情';
                    break;
                case 4:
                    $val->types = '政治敏感';
                    break;
                default:
                    $val->types = '其他';
                    break;
            }
        }
        $data->type = $request['type'];
        return view('qiyun.admin.resource.resourceInformantList',['data'=>$data]);

    }

    //编辑资源举报
    public function resourceInformantEdit($id){
        $data = DB::table('resourceinformant as i')
            ->leftJoin('users as u','i.userId','=','u.id')
            ->leftJoin('resource as r','i.resourceId','=','r.id')
            ->select('i.*','r.resourceTitle','u.realname','r.id as rid')
            ->where('i.id',$id)
            ->first();
        switch($data->type){
            case 0:
                $data->types = '广告营销';
                break;
            case 1:
                $data->types = '抄袭内容';
                break;
            case 2:
                $data->types = '分类错误';
                break;
            case 3:
                $data->types = '暴力色情';
                break;
            case 4:
                $data->types = '政治敏感';
                break;
            default:
                $data->types = '其他';
                break;
        }
        return view('qiyun.admin.resource.resourceInformantEdit',['data'=>$data]);
    }
    //执行举报编辑
    public function doResourceInformantEdit(Request $request){
        $data = $request->except('_token');
        $arr['updated_at'] = date('Y-m-d H:i:s',time());
        $arr['status'] = $request -> status;
        if(DB::table('resourceinformant')->where('id',$request['id'])->update($arr)){
            return redirect('admin/message')->with(['status'=>'资源举报修改成功','redirect'=>'resource/resourceInformantList']);
        }else{
            return redirect()->back()->withInput()->withErrors('资源举报修改失败');
        }
    }
    
    //删除举报
    public function resourceInformantDel($id){
        $data = DB::table('resourceinformant')->where('id',$id)->delete();
        if($data){
            return redirect('admin/message')->with(['status'=>'资源举报删除成功','redirect'=>'resource/resourceInformantList']);
        }else{
            return redirect()->back()->withInput()->withErrors('资源举报删除失败');
        }
    }


    //资源审核
    public function resourceStatus($id,$status){
        DB::table('resource')->where('id',$id)->update(['resourceCheck'=>$status]);
        return back();
    }



}
