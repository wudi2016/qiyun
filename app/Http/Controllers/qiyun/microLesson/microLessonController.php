<?php

namespace App\Http\Controllers\qiyun\microLesson;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Crypt;
use Intervention\Image\ImageManagerStatic as Image;




class microLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 1)
    {
        /********取有多少个微课数********/
        $courseNum = DB::select(' select count(id) as num from mini_lesson ');
        /**********统计本周更新数量*********/
        // 本周起始时间
        $start = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d") - date("w") + 1, date("Y")));
        $start1 = strtotime($start);
        $start1 = $start1*1000;
        $stop = date("Y-m-d H:i:s", mktime(23, 59, 59, date("m"), date("d") - date("w") + 7, date("Y")));
        $stop1 = strtotime($stop);
        $stop1 = $stop1*1000;
        // $weekNum = DB::select(' select count(*) as num from mini_lesson as ml 
        //                         join mini_lesson_comment as mlc on ml.user_id = mlc.parentId where
        //                         ml.addTime > "$start" and ml.addTime < "$stop"  ');
        $weekNum = DB::select("select count(*) as num1 from  mini_lesson where 
            addTime between $start1 and $stop1");      //UNIX_TIMESTAMP(addTime)

        /*********取section-grade-subject表对应关系数据*********/
        //获取 学段id
        $sectionId = $id;

        //班级 (根据传入过来的学段id 查出班级)
        $grade = DB::table('mini_tag_grade')
            ->where('parentId', '=', $sectionId)
            ->get();
        // 获取班级第一个id
        $gradeId = $grade[0]->id;
        $gradelen = count($grade);
        for ($i = 0; $i < $gradelen; $i++) {
            $resgrade[] = $grade[$i];
        }
        // dd($resgrade);

        //学科 
        $subject = DB::table('mini_tag_subject')
            ->where('parentId', '=', $gradeId)
            ->get();

        //获取学科第一个id
        $subjectId = $subject[0]->id;
        $subjectlen = count($subject);
        for ($i = 0; $i < $subjectlen; $i++) {
            $ressubject[] = $subject[$i];
        }

        // 详细信息
        $detailinfo = DB::table('mini_lesson as ml')
            ->join('mini_tag_section as mts', 'ml.tag1', '=', 'mts.id')
            ->select('ml.id as id', 'path', 'coverPic', 'author', 'lessontime', 'lessonName as lessontitle', 'lessondes','addTime')
            ->where('ml.tag1', '=', $id)
            ->orderBy('addTime','desc')
            ->limit(3)
            ->get();

        $arrs = array('grade' => $resgrade, 'subject' => $ressubject, 'detailinfo' => $detailinfo, 'courseNum' => $courseNum[0]->num, 'weekNum' => $weekNum[0]->num1);
        // dd($arrs);
        $arrs = json_encode($arrs);
        
        return view('qiyun/microLesson/microLesson')->with('arrs', $arrs);

    }

    //微课列表选择 接口
    public function microLessonListSelect(){
        //获取 提交过来的参数，根据level字段判断查询类型。
        //当 level 为1时，跟据 section 字段，查出 年级，科目，微课;      
        //当 level 为2时，跟据 section，grade 字段，查出 科目，微课;     
        //当 level 为3时，跟据 section，grade ，subject字段，查出 微课;  
        //最后，在每种情况中，如果查出微课，status 为true 否则为false
        
        $arr = json_decode(file_get_contents('php://input'), true);
        // 获取数组中用到的值
        $level = $arr['level'];
        $sections = $arr['section'];   //学段
        $grades = $arr['grade'];       //年级  
        $subjects = $arr['subject'];   //学科

        // 判断level为1时(level为层数)
        if ($level == 1) {
            $sectionId = $sections;
            if ($sectionId) {
                // 班级
                $grade = DB::table('mini_tag_grade')
                    ->where('parentId', '=', $sectionId)
                    ->get();
                // 获取班级第一个id
                $gradeId = $grade[0]->id;
                // $resgrade = array();
                $gradelen = count($grade);
                for ($i = 0; $i < $gradelen; $i++) {
                    $resgrade[] = $grade[$i];
                }
                
                // 学科
                $subject = DB::table('mini_tag_subject')
                    ->where('parentId', '=', $gradeId)
                    ->get();
                // 获取学科第一个id
                $subjectId = $subject[0]->id;
                $ressubject = array();
                $subjectlen = count($subject);
                for ($i = 0; $i < $subjectlen; $i++) {
                    $ressubject[] = $subject[$i];
                }
                // 详细信息  
                $detailinfo = DB::table('mini_lesson as ml')
                    ->join('mini_tag_section as mts', 'ml.tag1', '=', 'mts.id')
                    ->select('ml.id','ml.user_id', 'path', 'coverPic', 'author', 'lessontime', 'lessonName as lessontitle', 'lessondes','addTime')
                    ->where('ml.tag1', '=', $sectionId)
                    ->orderBy('addTime','desc')
                    ->limit(3)
                    ->get();
                if ($detailinfo) {
                    $arrs = array('status' => true, 'grade' => $resgrade, 'subject' => $ressubject, 'detailinfo' => $detailinfo);
                } else {
                    $arrs = array('status' => false, 'grade' => $resgrade, 'subject' => $ressubject, 'detailinfo' => $detailinfo);
                }
                echo json_encode($arrs);
            }
        }
  
 
        //当level为2时 
        if ($level == 2) {
            $sectionId = $sections;
            $gradeId = $grades;

            if ($sectionId) {
                // 班级
                $grade = DB::table('mini_tag_grade')
                    ->where('parentId', '=', $sectionId)
                    ->get();
                $gradelen = count($grade);
                for ($i = 0; $i < $gradelen; $i++) {
                    $resgrade[] = $grade[$i];
                }

                // 学科
                $subject = DB::table('mini_tag_subject')
                    ->where('parentId', '=', $gradeId)
                    ->get();  

                $subjectlen = count($subject);
                for ($i = 0; $i < $subjectlen; $i++) {
                    $ressubject[] = $subject[$i];
                }

                // 详细信息
                $detailinfo = DB::table('mini_tag_grade as mtg')
                        ->join('mini_tag_subject as mts2','mtg.id','=','mts2.parentId')
                        ->join('mini_lesson as ml','mts2.id','=','ml.tag3')
                        ->select('ml.id','ml.user_id', 'path', 'coverPic', 'author', 'lessontime', 'lessonName as lessontitle', 'lessondes','addTime')
                        ->where('mts2.parentId','=',$gradeId)
                        ->orderBy('addTime','desc')
                        ->limit(3)
                        ->get();

                if ($detailinfo) {
                    $arrs1 = array('status' => true,  'subject' => $ressubject, 'detailinfo' => $detailinfo);
                } else {
                    $arrs1 = array('status' => false,  'subject' => $ressubject, 'detailinfo' => $detailinfo);
                }

                echo json_encode($arrs1);
            }
        }

        // $arrs1 = json_encode($arrs1);


        // 当level为3时
        if($level ==3){
            $subjectId = $subjects;
            if($subjectId){
                 //学科下面的详细信息
                $detailinfo = DB::table('mini_tag_section as mts')
                    ->join('mini_tag_grade as mtg', 'mts.id', '=', 'mtg.parentId')
                    ->join('mini_tag_subject as mts2', 'mtg.id', '=', 'mts2.parentId')
                    ->join('mini_lesson as ml', 'mts2.id', '=', 'ml.tag3')
                    ->select('ml.id','ml.user_id', 'path', 'coverPic', 'author', 'lessontime', 'lessonName as lessontitle', 'lessondes','addTime')
                    ->where('mts2.id','=',$subjectId)
                    ->orderBy('addTime','desc')
                    ->limit(3)
                    ->get();    

                if($detailinfo){
                    $arrs2 = array( 'status' => true ,'detailinfo' => $detailinfo);
                }else{
                    $arrs2 = array( 'status' => false , 'detailinfo' => $detailinfo);
                }
                echo json_encode($arrs2);  
            }

        }


    }


    /**
     * 微课详细信息
     */
    public function microLessonDetail($id){

        if(Auth::user()){
            // 添加浏览量
            DB::table('mini_lesson')->where('id',$id)->increment('viewNum',1);

            $res = DB::table('mini_lesson')
                ->select('id','lessonName as lessonTitle','lessonTime','author','likeNum','viewNum','lessonDes','addTime','path','tag1','tag2','tag3')
                ->where('id','=',$id)
                ->get();
            // dd($res);
            if($res){
                $arra = array();
                foreach($res as $val){
                    // 创建时间
                    // $create_at = date('Y-m-d H:i:s', $val->addTime); 
                    $create_at =  $val->addTime; 
                    // 课程时长转换为分钟
                    $fenTime = round(($val->lessonTime)/(1000*60));
					
                    // 计算path路径下视频文件的大小
                    $sizename = $val->path;
                    $web = "test.zuren8.com";
                    // 分别判断web端和pc端
                    if(strpos($sizename,$web)){
                        $sizename = explode("com",$sizename);
                        $filesize = floor(filesize('.'.$sizename[1])/1024);
                    }else{
                        $filesize = floor(filesize('.'.$sizename)/1024);
                    }
                    $arra[] = array(
                        'id' => $val->id,
                        'title' => $val->lessonTitle,
                        'author' => $val->author,
                        'score' => $fenTime,        //课程时长
                        'description' => $val->lessonDes,   //简介
                        'fav' => $val ->likeNum,             //点赞数
                        'viewnum' => $val ->viewNum,                //浏览量
                        // 'create_at' => $val->addTime,       
                        'create_at' => $create_at,
                        'src' => $val->path,
						'type' => substr(strrchr($val->path,'.'), 1),
                        'filesize' => $filesize             //文件大小，KB
                    );
                }
                $arr = $arra;
            }
            $arr[0]['lessonId'] = $id;
            // dd($res[0]->tag3);
            // 微课详情页相关课程推荐
            $courserec = DB::table('mini_lesson')
                ->where('tag1','=',$res[0]->tag1)
                ->where('tag2','=',$res[0]->tag2)
                ->where('tag3','=',$res[0]->tag3)
                ->select('id', 'lessonName as lessonTitle', 'viewNum', 'likeNum', 'addTime')
                ->orderBy('likeNum','desc')
                ->orderBy('viewNum','desc')
                ->orderBy('addTime','desc')
                ->limit(5)
                ->get();
        
            // dd($courserec);
        
        }else{
             return redirect('/');
        }
            
        
        return view('qiyun/microLesson/microLessonDetail',$arr[0])->with('courserec',$courserec);
    }




    // //微课详情页相关课程推荐
    // public function getOtherResurce(){
    //     $courserec = DB::table('mini_lesson')
    //         ->select('id', 'lessonName as lessonTitle', 'viewNum', 'likeNum', 'addTime')
    //         ->limit(5)
    //         ->get();
    //     if ($courserec) {
    //         $arra = array();
    //         foreach ($courserec as $key => $val) {
    //             $addTimes = explode(" ", ($val->addTime)/1000);
    //             $arra[] = array(
    //                 'id' => $val->id,
    //                 'title' => $val->lessonTitle,
    //                 'score' => $val->likeNum,
    //                 'view' => $val->viewNum,
    //                 'create_at' => date('Y-m-d',$addTimes[0]),
    //             );
    //         }
    //         $courserec = $arra;
    //     }
    //     // dd($courserec);
    //     $arr = array('type' => true, 'other' => $courserec);
    //     echo json_encode($arr);
    // }
    




    //获取 点赞 分享 收藏 接口 
    public function getMicLessonFavDetail($id){
        $resdetail = DB::table('mini_lesson')
                    ->select('id','likeNum','favNum','shareNum')
                    ->where('id',$id)
                    ->get();
        if($resdetail){
            $resdetail[0]->favNum = DB::table('resourcestore') -> where('type',5) -> where('resourceId',$id) ->count();
    
            echo json_encode($resdetail);
        }
    }

    /*
    /
    /微课详情页 点赞 收藏 分享 接口
    /
    */
    //点赞
    public function doClick($id){
  
        if(Auth::user()){
            $userId = Auth::user()->id;
            $res = DB::table('mini_lesson_clickLike')
                    ->where('lesson_id',$id)
                    ->where('user_id',$userId)
                    ->get();
            if($res){
                // DB::table('mini_lesson_clickLike')->where('id',$res[0]->id)->delete();
                // DB::table('mini_lesson')->where('id',$id) ->decrement('likeNum',1);
                echo 1;  //取消点赞
            }else{
                DB::table('mini_lesson_clickLike')->insert(['lesson_id' => $id ,'user_id' => $userId]);
                DB::table('mini_lesson')->where('id',$id)->increment('likeNum',1);
                echo 3;  //点赞成功 +1
            }
        }else{
            echo 2;   //未登录
        }

    }


    //收藏
    public function doFav($id){
        
        if(Auth::user()){
            $userId = Auth::user()->id;
            $res = DB::table('resourcestore')
                    ->where('resourceId',$id)
                    ->where('userId',$userId)
                    ->get();
            if($res){
                DB::table('resourcestore')->where('id',$res[0]->id)->delete();
                // DB::table('mini_lesson')->where('id',$id) ->decrement('favNum',1);
                echo 1;
            }else{          
                $addTime =Carbon::now();
                $update = Carbon::now();
                $resourceTitle = DB::table('mini_lesson')->where('id',$id)->select('lessonName')->first();
                $resourceTitle = $resourceTitle ->lessonName;
                DB::table('resourcestore')->insert(['resourceId' => $id , 'type' => 5, 'userId' => $userId , 'created_at' => $addTime , 'updated_at' => $update , 'resourceTitle' => $resourceTitle ]);
                DB::table('mini_lesson')->where('id',$id)->increment('favNum',1);
                echo 3;
            }
        }else{
            echo 2;
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    //微课中心页推荐
    public function getRecommend(){

        // 微课点击数(最热)
        if ($res = DB::select('select id,user_id,path,coverPic,author,lessontime,lessonName as lessonTitle,lessondes from mini_lesson order by viewNum desc limit 3 ')) {
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
                     "src" => $val->path, 
                     'picture' => $val->coverPic,
                     'teacher' => $val->author, 
                     'time' => $lessontimeall,
                     'title' => $val->lessonTitle,
                     'content' => $val->lessondes
                );
            }
            $arr1 = $arra;
        }

        // 微课点赞数(精品)
        if ($res = DB::select('select id,user_id,path,coverPic,author,lessontime,lessonName as lessonTitle,lessondes from mini_lesson order by likeNum desc limit 3 ')) {
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
                    "src" => $val->path, 
                    'picture' => $val->coverPic,
                    'teacher' => $val->author, 
                    'time' => $lessontimeall, 
                    'title' => $val->lessonTitle, 
                    'content' => $val->lessondes
                );
            }
            $arr2 = $arra;
        }

        // 微课最新课程(最新)
        if ($res = DB::select('select id,ml.user_id,path,coverPic,author,lessontime,lessonName as lessonTitle,lessondes,ml.addTime from mini_lesson as ml  order by ml.addTime desc limit 3 ')) {
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
                    "src" => $val->path, 
                    'picture' => $val->coverPic, 
                    'teacher' => $val->author, 
                    'time' => $lessontimeall, 
                    'title' => $val->lessonTitle, 
                    'content' => $val->lessondes
                    );
            }
            $arr3 = $arra;
        }

        $arr = array();
        $arr['hot'] = $arr1;
        $arr['competitiveProducts'] = $arr2;
        $arr['new'] = $arr3;

        $arrs = array('type' => true, 'recommend' => $arr);
        // dd($arrs);
        echo json_encode($arrs);


    }



    //添加微课评论
    public function addMicCommet()
    {
        $array = json_decode(file_get_contents('php://input'),true);   
        if(Auth::user()){
            if($array['microlessonComment']){
                $arr['content'] = $array['microlessonComment'];
                $arr['parentId'] = $array['micLessonId'];
                $arr['user_id'] = Auth::user()->id;
                $arr['picture'] = Auth::user()->pic;
                $arr['addTime'] = time()*1000;
                
                if (DB::table('mini_lesson_comment')->insert($arr)) {
                    //添加成功
                    echo 1;
                }else{
                    //添加失败
                    echo 0;
                }

            }else{
                //添加失败
                // return back()-> with('status', 0);
                echo 3; //不能为空
            }
        }else{
            //请登录
            // return back()-> with('status', 2);
            // return redirect('/');
            echo 2;
        }        
    }

    //微课详情页评论
    public function getResourceCommet(){
        $user_id = Auth::user()->id;

        $arr = json_decode(file_get_contents('php://input'),true);   
        $id = $arr['id'];

        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage-1)*$perPageNum;                  //跳过条数
        $sum = DB::table('mini_lesson_comment') -> where('parentId',$id) -> count();  //总记录数


        // 评论信息
        $detail = DB::table('mini_lesson as ml')
                ->join('mini_lesson_comment as mlc', 'ml.id', '=', 'mlc.parentId')
                ->join('users','mlc.user_id','=','users.id')
                ->select('mlc.id', 'mlc.addTime', 'mlc.content', 'mlc.picture', 'ml.author', 'mlc.parentId','users.username','users.pic')
                ->where('mlc.parentId', '=', $id)
                ->orderby('mlc.addTime','desc')
                // ->limit($passNUm,$perPageNum)
                ->skip($passNUm)->take($perPageNum)
                ->get();
        // dd($detail);
        if ( $detail ) {
            $arra = array();
            foreach ($detail as $key => $val) {
                $addTime = date("Y-m-d ", $val->addTime/1000);
                $arra[] = array('id' => $val->id,
                    'create_at' => $addTime,
                    'author' => $val->username,
                    // 'picture' => $val->picture,
                    'picture' => $val->pic,
                    'content' => $val->content,
                    'username' => Auth::user()->username
                );
            }
            $comment = $arra;

            // 统计评论总数
            $commentcount = count($arra);
            $arr = array('type' => true,'count'=>$sum ,'comment' => $comment, 'commentCount' => $commentcount);
        }else{
            $arr = array('type' => false);
        }


        echo json_encode($arr);

    }

    //前台 删除评论
    public function delMicCommet($id){
        if (DB::table('mini_lesson_comment')->where('id',$id)->delete()) {
            echo 1; //删除成功
        }else{
            echo 2; //删除失败
        }
        
    }


    /**
     * 微课发布添加接口
     */
    public function microLessonAdd(Request $request){
        $arr = json_decode(file_get_contents('php://input'),true);
        // dd($arr);
        //获取用户
        $data['user_id'] = Auth::user()->id;
        $data['lessonName'] = $arr['name'];             //微课名称
        $data['lessonDes'] =  $arr['descirpt'];               //微课简介
        $data['pctype'] =  $arr['type'];              //课程类型
        if($arr['headPic']){
            $data['logo'] =  $arr['headPic'];
        }else{
            $data['logo'] = '/image/qiyun/microLesson/2.png';
        }
        // $data['logo'] =  $arr['headPic'];
        // $data['coverPic'] =  $arr['coverPic'];
        if($arr['coverPic']){
            $data['coverPic'] =  $arr['coverPic'];
        }else{
            $data['coverPic'] = '/image/qiyun/microLesson/2.png';
        }
        $data['path'] =  $arr['path'];
        $data['tag1'] =  $arr['section'];
        $data['tag2'] =  $arr['grade'];
        $data['tag3'] =  $arr['subject'];
        $data['addTime'] = $arr['addTime'];
        $data['author'] = Auth::user()->realname;

        if(DB::table('mini_lesson')->where('user_id',$data['user_id'])->where('lessonName',$data['lessonName'])->first()){
            echo json_encode(['status'=>'yes']);
            exit;
        }      
        //插入微课表
        if( $lessonId = DB::table('mini_lesson')->insertGetId($data)){
            //微课添加成功则向系统消息插入一条消息
            $sysMsg = DB::table('system_message')->insertGetId(['resourceId'=>$lessonId,'userId'=>Auth::user()->id,'messageTitle'=>'共同提升，切磋水平','resourceType'=>5,'type'=>0,'url'=>"/microLesson/microLessonDetail/{$lessonId}",'isOpen'=>0,'addTime'=>time(),'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
            $userMsg = DB::table('user_message')->insertGetId(['resourceId'=>$lessonId,'userId'=>Auth::user()->id,'messageTitle'=>'成功创建','resourceType'=>5,'type'=>0,'isOpen'=>0,'addTime'=>Carbon::now()]);
            if($sysMsg && $userMsg){
                echo json_encode(['status'=>true,'id'=>$lessonId]);
            }
        }else{
            echo json_encode(['status'=>false]);
        }

    }





    /**
     *微课发布展示页面
     */

    public function microLessonPost($id = 1){
        //判断是否登录 及是否 是老师
        if(Auth::user()){
            if(Auth::user()->type != 1){
                //不是教师
                return back() ->with('status', 2);
            }
        }else{
            //请登录 1
            return back() ->with('status', 1);
        }

        
        /*********取section-grade-subject表对应关系数据*********/
        //获取 学段id
        $sectionId = $id;

        //班级 (根据传入过来的学段id 查出班级)
        $grade = DB::table('mini_tag_grade')
            ->where('parentId', '=', $sectionId)
            ->get();
        // 获取班级第一个id
        $gradeId = $grade[0]->id;
        $gradelen = count($grade);
        for ($i = 0; $i < $gradelen; $i++) {
            $resgrade[] = $grade[$i];
        }
        // dd($resgrade);

        //学科 
        $subject = DB::table('mini_tag_subject')
            ->where('parentId', '=', $gradeId)
            ->get();

        //获取学科第一个id
        $subjectId = $subject[0]->id;
        $subjectlen = count($subject);
        for ($i = 0; $i < $subjectlen; $i++) {
            $ressubject[] = $subject[$i];
        }


        $arrs = array('grade' => $resgrade,'subject' => $ressubject);
        $arrs = json_encode($arrs);
        return view('qiyun/microLesson/microLessonPost')->with('arrs',$arrs);
    }



    /**
     * 微课联动接口
     */
    public function microLessonSelect(){

         //获取 提交过来的参数，根据level字段判断查询类型。
        //当 level 为1时，跟据 section 字段，查出 年级，科目;      
        //当 level 为2时，跟据 section，grade 字段，查出 科目;      
        //最后，在每种情况中，如果查出微课，status 为true 否则为false
        $arr = json_decode(file_get_contents('php://input'), true);
        // 获取数组中用到的值
        $level = $arr['level'];
        $sections = $arr['section'];   //学段
        $grades = $arr['grade'];       //年级  
        $subjects = $arr['subject'];   //学科
        // 判断level为1时(level为层数)
        if ($level == 1) {
            $sectionId = $sections;
            if ($sectionId) {
                // 班级
                $grade = DB::table('mini_tag_grade')
                    ->where('parentId', '=', $sectionId)
                    ->get();
                // 获取班级第一个id
                $gradeId = $grade[0]->id;
                // $resgrade = array();
                $gradelen = count($grade);
                for ($i = 0; $i < $gradelen; $i++) {
                    $resgrade[] = $grade[$i];
                }
                // 学科
                $subject = DB::table('mini_tag_subject')
                    ->where('parentId', '=', $gradeId)
                    ->get();
                // 获取学科第一个id
                $subjectId = $subject[0]->id;
                $ressubject = array();
                $subjectlen = count($subject);
                for ($i = 0; $i < $subjectlen; $i++) {
                    $ressubject[] = $subject[$i];
                }
           
                $arrs = array('status' => true, 'grade' => $resgrade, 'subject' => $ressubject);
                echo json_encode($arrs);
            }

        }



        //当level为2时 
        if ($level == 2) {
            $sectionId = $sections;
            $gradeId = $grades;
            
            if ($sectionId) {
                // 班级
                $grade = DB::table('mini_tag_grade')
                    ->where('parentId', '=', $sectionId)
                    ->get();
                $gradelen = count($grade);
                for ($i = 0; $i < $gradelen; $i++) {
                    $resgrade[] = $grade[$i];
                }

                // 学科
                $subject = DB::table('mini_tag_subject')
                    ->where('parentId', '=', $gradeId)
                    ->get();  
                $subjectlen = count($subject);
                for ($i = 0; $i < $subjectlen; $i++) {
                    $ressubject[] = $subject[$i];
                }
              
                $arrs1 = array('status' => true,  'subject' => $ressubject);
              
                echo json_encode($arrs1);
            }
        }


  

    }

    //微课  上传接口
    public function doMicroLessonPost(Request $request){
        if(Auth::user()){
            if(Auth::user()->type == 1){
                //获取文件后缀名
                $ext = strrchr($_FILES['Filedata']['name'],'.');
                if($request->hasFile('Filedata')){
                    if ($request->file('Filedata')->isValid()) {
                        $newname = time().$ext;
                        if($request->file('Filedata')->move('./uploads/micLesson/',$newname)){
                            echo '/uploads/micLesson/'.$newname;
                        }
                    }
                }else{
                    echo 0;  //没有文件上传 0
                }
            }else{
                echo 2;  //不是教师 2
            }
        }else{
            //请登录 1
            echo 1;
        }
    }

    // 微课头 微课封面 上传接口
    public function doMicroLessonPicPost(Request $request){
        //获取文件后缀名
        $ext = strrchr($_FILES['Filedata']['name'],'.');

        if($request->hasFile('Filedata')){
            if ($request->file('Filedata')->isValid()) {
                $newname = time().$ext;
                if($request->file('Filedata')->move('./uploads/micLesson/',$newname)){
                    
                    $img = Image::make( realpath(base_path('public')) .'/uploads/micLesson/'.$newname) -> resize(162,135);
                    $img -> save( realpath(base_path('public')) .'/uploads/micLesson/small'.$newname);
                    echo '/uploads/micLesson/small'.$newname;

                    if(file_exists(realpath(base_path('public')) .'/uploads/micLesson/'.$newname)){
                        unlink(realpath(base_path('public')) .'/uploads/micLesson/'.$newname);
                    }
                }
            }
        }else{
            echo 0;  //没有文件上传
        }
    }



   
    // public function doMicroLessonPicPost(Request $request){

    //     $ext = strrchr($_FILES['Filedata']['name'],'.');
  
    //     if($request->hasFile('Filedata')){
    //         if ($request->file('Filedata')->isValid()) {
    //             $newname = time().$ext;
    //             if($request->file('Filedata')->move('./uploads/microlesson/',$newname)){
    //                 echo '/uploads/appmicrolesson/'.$newname;
    //             }
    //         }
    //     }else{
    //         echo 0;  //没有文件上传 0
    //     }

    // }


    // 微课投诉接口
    public function microLessonComplain(Request $request){
        $arr = json_decode(file_get_contents('php://input'),true);   

        if (DB::table('mini_lesson_complain')->where(['user_id'=>Auth::user()->id,'parentId'=>$arr['micLessonId']])->first()) {
            echo 1;  //已举报过
        }else{
            $data['user_id'] = \Auth::user() ->id;
            $addTime = Carbon::now();
            $addTime = (strtotime($addTime)*1000);
            $data['parentId'] = $arr['micLessonId'];
            $data['content'] = $arr['content'];
            $data['type'] = $arr['type'];
            $data['addTime'] = $addTime;
            if(DB::table('mini_lesson_complain')->insert($data)){
                echo 2;  //ok
            }else{
                echo 3;  //error
            }         
        }

    }


    /**
     * 微课列表页
     */
    public function microLessonList(){

        return view('qiyun/microLesson/microLessonList');
    }



    //获取微课选项接口
    public function getSelMenus(){
        //小学
        $primary = DB::table('mini_tag_grade')
                 ->select('id','gradeName as name','parentId as sectionId')
                 ->where('parentId','=','1')
                 ->distinct()
                 ->get();
        //初中
        $junior = DB::table('mini_tag_grade')
                ->select('id','gradeName as name','parentId as sectionId')
                ->where('parentId','=','2')
                ->get();
        //高中
        $high = DB::table('mini_tag_grade')
                ->select('id','gradeName as name','parentId as sectionId')
                ->where('parentId','=','3')
                ->get();

        $arr = array('primary'=>$primary,'junior'=>$junior,'high'=>$high);
        echo json_encode($arr);
    }


    //首次加载列表页获取微课接口
    public function getMicLessons(){
        $arr = json_decode(file_get_contents('php://input'),true);
        //$seltype = $arr['seltype'];  //选择类型 1-3 表示选择的是小初高，4是类型，5是排序
        $wherea  = $arr['grade'];    //年级 及 id
        $whereb  = $arr['micType'];  //微课类型
        $order   = $arr['order'];  //排序类型
        $count   = DB::select("select count(*) as count from mini_lesson $wherea $whereb $order")[0]->count; //符合条件总数
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNum = ($nowPage-1)*$perPageNum;                  //跳过条数

        $array = DB::select("select * from mini_lesson $wherea $whereb $order limit $passNum,$perPageNum");

        if($array){
            $filesize = "1024";
            foreach ($array as $key => $val) {
                 $addTime = date("Y-m-d ", $val->addTime/1000);
                 $arra[] = array(
                     "id"=>$val->id,
                     "lessonName" => $val->lessonName,       //标题
                     'lessonDes' => $val->lessonDes,         //简介
                     'viewNum' => $val->viewNum,             //浏览
                     'favNum' => $val->favNum,               //收藏
                     'addTime' => $addTime,                  //添加时间
                     'author' => $val->author,               //作者
                     'likeNum' => $val->likeNum,             //点赞
                     'size'  => $filesize,
                     'coverPic' => $val->coverPic
                 );
            }
            $array = $arra;
        }
        if($array){
            echo json_encode(['status'=>true,'data'=>$array,'count'=>$count]);
        }else{
            echo json_encode(['status'=>false]);
        }
    }


}

   