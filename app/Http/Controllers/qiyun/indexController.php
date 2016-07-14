<?php

namespace App\Http\Controllers\qiyun;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Newstype;
use App\Lessonsubject;
use App\Resource;
use DB;
use Auth;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('qiyun/index') -> with( 'user', $request -> user() );
    }
    public function indexs(Request $request)
    {
        return back() -> with( 'loginErrot', true );
    }

    public function getSchoolInfo(){
        if(Auth::check()){
            $schoolId = Auth::user() -> schoolId;
            $gradeId = Auth::user() -> gradeId;
            $classId = Auth::user() -> classId;

            $school = DB::table('school')->select('schoolName')->where('id',$schoolId)->first();
            //$grade = DB::table('schoolgrade')->select('gradeName')->where('id',$gradeId)->first();
            $class = DB::table('schoolclass')->select('classname')->where('id',$classId)->first();

            if($school){
                $schoolName = $school->schoolName;
            }else{
                $schoolName = '';
            }


            if($class){
                $className = $class->classname;
            }else{
                $className = '';
            }
        }else{
            $schoolName = '';
            $className = '';
        }

        echo json_encode(array('schoolName'=>$schoolName,'className'=>$className));
    }

    //搜索
    public function search(Request $request){
        $type = $request->searchType;
        $value = $request->searchValue;
        session(['searchValue' => $value]);
        return view('qiyun/search',['searchType'=>$type,'searchValue'=>$value]);
    }

    //搜索 资讯
    public function searchNews(){
        $arr = json_decode(file_get_contents('php://input'),true);   
        
        $searchValue = $arr['searchValue'];                   //搜索条件
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage-1)*$perPageNum;                  //跳过条数
        $sum = DB::table('news') -> where('title','like',"%$searchValue%") ->where('status',0) -> count();  //总记录数

        if ($resa = DB::select("select id,title,created_at from news  where status = 0 and  title like '%{$arr['searchValue']}%'    order By created_at desc limit $passNUm,$perPageNum ")) {   
            $arr = array('status' => true,'type'=>false,'count'=>$sum,'resoults' => $resa);
        }else{
            $arr = array('status' => false);
        }
        echo json_encode($arr);
    }
    //搜索 资源
    public function searchResorces(){
        $arr = json_decode(file_get_contents('php://input'),true);   

        $searchValue = $arr['searchValue'];                   //搜索条件
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage-1)*$perPageNum;                  //跳过条数
        $sum = DB::table('resource') -> where('resourceTitle','like',"%$searchValue%") -> where('resourceCheck',0) -> count();  //总记录数


        if ($resa = DB::select("select id,resourceTitle as title,created_at from resource where resourceCheck = 0 and resourceTitle like '%{$arr['searchValue']}%'   order By created_at desc limit $passNUm,$perPageNum ")) {
            $arr = array('status' => true,'type'=>false,'count'=>$sum,'resoults' => $resa);
        }else{
            $arr = array('status' => false);
        }
        echo json_encode($arr);
    }
    //搜索 微课
    public function searchMicLessons(){
        $arr = json_decode(file_get_contents('php://input'),true);   

        $searchValue = $arr['searchValue'];                   //搜索条件
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage-1)*$perPageNum;                  //跳过条数
        $sum = DB::table('mini_lesson') -> where('lessonName','like',"%$searchValue%") -> count();  //总记录数


        if ($resa = DB::select("select id,lessonName as title,addTime as created_at from mini_lesson where lessonName like '%{$arr['searchValue']}%'   order By addTime desc limit $passNUm,$perPageNum ")) {
            
            foreach ($resa as $key => &$value) {
                $value -> created_at =  date('Y-m-d H:i:s',($value->created_at)/1000);
            }

            $arr = array('status' => true,'type'=>true,'count'=>$sum,'resoults' => $resa);
        }else{
            $arr = array('status' => false);
        }
        echo json_encode($arr);
    }        


    //获取用户资源 微课 教研 数量 接口
    public function getNUm()
    {
        if(\Auth::check()){
            $userId = \Auth::user()->id;
            $realname = \Auth::user()->realname;

            $resourceNum = DB::table('resource') -> where('userId',$userId) -> count();
            $micLessonNum = DB::table('mini_lesson') -> where('user_id',$userId) -> count();
            $researchNum = DB::table('department_theme') -> where('userId',$userId) -> count();

            if (\Auth::user()->type != 1) {
                $resourceNum = DB::table('resource') -> count();
                $micLessonNum = DB::table('mini_lesson') -> count();
            }

            $arr = ['type' => true,'resourceNum' => $resourceNum,'micLessonNum'=>$micLessonNum,'researchNum'=>$researchNum];
        }else{
            $arr = ["type" => false];
        }

        echo json_encode($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNews($type)
    {
        if($res = Newstype::find($type)->news()->where('status',0)->orderBy('id', 'desc') ->skip(0) -> take(7)->get()){
            $arra = array();
            foreach($res as $v){
                $arra[] = array('info'=>$v->title,'id'=>$v->id);
            }
            
            $arr = ['type' => true,'education' => $arra];
        }else{
            $arr = ["type" => false];
        }

        // dd($arr);
        echo json_encode($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getResearch()
    {
        $res = Lessonsubject::take(4)->orderBy('lessonFav', 'desc')->get();
        $arra = array();
        foreach ($res as $key => $v) {
            $arra[] = array('id'=>$v->id,'title'=>$v->lessonSubjectName);
        }
        $arr = ['type' => true,'research' => $arra];
        // dd($arr);

        echo json_encode($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getResource()
    {
        $res = Resource::where('resourceCheck',0)->take(7)->orderBy('resourceView', 'desc')->get();
        $arra = array();
        foreach ($res as $key => $v) {
            $arra[] = array('id'=>$v->id,'title'=>$v->resourceTitle,'resourcePath' => $v -> resourcePath);
        }
        $arr = ['type' => true,'resource' => $arra];
        // dd($arr);
        echo json_encode($arr);
    }
    //优质资源接口
    public function getFavResource()
    {
        $res = Resource::where('resourceCheck',0)->take(6)->orderBy('resourceClick', 'desc')->get();
        $arra = array();
        foreach ($res as $key => $v) {
            $arra[] = array('id'=>$v->id,'title'=>$v->resourceTitle,'resourcePic' => $v -> resourcePic);
        }
        $arr = ['type' => true,'resource' => $arra];
        // dd($arr);
        echo json_encode($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getMicroVideo()
    {
        if ($res = DB::select('select id,path,logo,author,lessontime,lessonName,lessondes from mini_lesson order by likeNum desc limit 9 ')) {
            $arra = array();
            foreach ($res as $key => $val) {
                // 把lessontime转换为时间格式
                    $lessontime = $val ->lessontime;
                    $lessontimeh = ($lessontime/1000/60/60)%60;
                    $lessontimem = ($lessontime/1000/60)%60;
                    $lessontimes = ($lessontime/1000%60);
                    $lessontimeall = $lessontimeh.":".$lessontimem.":".$lessontimes;
                $arra[] = array(
                    'id' => $val->id, 
                    'image' => $val->logo,
                    'teacher' => $val->author, 
                    'time' => $lessontimeall, 
                    'title' => $val->lessonName
                );
            }
            $arr = array('type'=>true,'microVideo'=>$arra);
        }else{
            $arr = array('type'=>false);
        }


        // $arr = [
        //     "type" => true,
        //     "microVideo" => [
        //         ["id" => "9", "image" => "/videoTemp/highSchool/video_3.jpg", "teacher" => "陆老师", "time" => "09:23:56", "title" => "高中语文新课程研修 3-1"],
        //         ["id" => "7", "image" => "/videoTemp/highSchool/video_1.jpg", "teacher" => "韩老师", "time" => "09:23:56", "title" => "高中语文新课程研修 1-1"],
        //         ["id" => "8", "image" => "/videoTemp/highSchool/video_2.jpg", "teacher" => "刘老师", "time" => "09:23:56", "title" => "高中语文新课程研修 2-1"],
        //         ["id" => "6", "image" => "/videoTemp/middleSchool/video_3.jpg", "teacher" => "周老师", "time" => "09:23:56", "title" => "九年级语文上[人教版]第二单元 《敬业与乐业》"],
        //         ["id" => "2", "image" => "/videoTemp/primarySchool/video_2.jpg", "teacher" => "韩老师", "time" => "11:22:11", "title" => "小学一年级语文上册 aoe新课程 学拼音 动画课"],
        //         ["id" => "3", "image" => "/videoTemp/primarySchool/video_3.jpg", "teacher" => "韩老师", "time" => "11:22:11", "title" => "小学一年级语文上册 aoe新课程 学拼音 实体课"],
        //         ["id" => "3", "image" => "/videoTemp/primarySchool/video_3.jpg", "teacher" => "韩老师", "time" => "11:22:11", "title" => "小学一年级语文上册 aoe新课程 学拼音 实体课"],
        //         ["id" => "7", "image" => "/videoTemp/highSchool/video_1.jpg", "teacher" => "韩老师", "time" => "09:23:56", "title" => "高中语文新课程研修 1-1"],
        //         ["id" => "9", "image" => "/videoTemp/highSchool/video_3.jpg", "teacher" => "陆老师", "time" => "09:23:56", "title" => "高中语文新课程研修 3-1"]
        //     ]
        // ];
        // dd($arr);
        echo json_encode($arr);
    }



    /**
     *微课名师排行
     */
    public function getPersonalSpace(){        
          $res = DB::select("select u.id,u.realname,u.pic,s.schoolName from mini_lesson as ml
                                join users as u on  ml.user_id = u.id
                                join school as s on u.schoolId = s.id
                                where u.type=1
                                group by(ml.user_id) order by count('ml.user_id') desc  "
                        );
          
        // $res = DB::select("select u.id,u.realname,u.pic,s.schoolName,ss.subjectName from mini_lesson as ml
        //                         join users as u on  ml.user_id = u.id
        //                         join school as s on u.schoolId = s.id
        //                         join schoolsubject as ss on ss.parentId = u.id 
        //                         where u.type=1
        //                         group by(ml.user_id) order by count('ml.user_id') desc limit 6 "
        //                 );

        if($res){
            $arra = array();
            foreach ($res as $val) {
               $arra[] = array(
                   'image' => $val->pic, 
                   'name' => $val->realname,
                   'school' => $val->schoolName,
                   // 'class' => $val->subjectName,  
                );
            }
            $arr = array('type'=>true,'teacher'=>$arra);
        }else{
            $arr = array('type'=>false);
        }
        // dd($arr);
        echo json_encode($arr);

    }

    /**
     * 获取教师协作组接口
     *
     */
    public function getTechResearch()
    {
        // if ($res = DB::select('select id,techResearchName,pic,author from techresearch order by id desc limit 5')) {
        if ($res = DB::select('select t.id,t.techResearchName,t.pic,t.author,count(*) from techresearch t LEFT JOIN departmenttech d ON t.id = d.parentId GROUP BY t.id order by count(*) desc limit 5')) {
            $arr = array('type'=>true,'techresearch'=>$res);
        }else{
            $arr = array('type'=>false);
        }
        echo json_encode($arr);
    }

    /**
     * 获取协同备课接口
     *
     */
    public function getLessonSubject()
    {
        if ($res = DB::select('select id,lessonSubjectName,pic,lessonSubjecAuthor from lessonsubject order by id desc limit 5')) {
            $arr = array('type'=>true,'lessonsubject'=>$res);
        }else{
            $arr = array('type'=>false);
        }
        echo json_encode($arr);
    }

    /**
     * 获取评课议课接口
     *
     */
    public function getEvaluta()
    {
        // if ($res = DB::select('select id,evaluatName,evaluatPic,evaluatAuthor from evaluat order by id desc limit 5')) {
        if ($res = DB::select('select e.id,e.evaluatName,e.evaluatPic,e.evaluatAuthor,count(*) from evaluat e LEFT JOIN evaluatMember m ON e.id = m.parentId GROUP BY e.id ORDER BY count(*) desc limit 5')) {
            $arr = array('type'=>true,'evaluat'=>$res);
        }else{
            $arr = array('type'=>false);
        }
        echo json_encode($arr);
    }

    /**
     * 获取评课议课接口
     *
     */
    public function getDepartmentTheme()
    {
        if ($res = DB::select('select department_theme.id as id,department_theme.name as title,department_theme.pic as pic,users.realname as name from department_theme,users where department_theme.userId = users.id order by department_theme.id desc limit 5')) {
            $arr = array('type'=>true,'departmenttheme'=>$res);
        }else{
            $arr = array('type'=>false);
        }
        echo json_encode($arr);
    }
}
