<?php

namespace App\Http\Controllers\qiyun\resource;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Crypt;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;



class resourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //获取本周周一开始时间
        $w=date('w');

        $start_time = strtotime('today -'.($w?($w - 1):6).' day');
        //本周开始时间
        $start_day = Date('Y-m-d H:i:s',$start_time);
        //本周结束时间
        // $end_day = Date('Y-m-d H:i:s',$start_time + 604799);
        $weekResNum = DB::table('resource')
                     ->where('created_at','>', $start_day)
                     ->count();
        //资源个数
        $resNum = DB::table('resource')->count();


        /*获取侧边导航栏数据*/
        //获取学段 小初高
        if( $sections = DB::table('studysection') -> select('id', 'sectionName') -> where('parentId',1) -> skip(0) -> take(3) -> get() ){
            foreach ($sections as $key => &$value) {
                //获取学科
                if( $value->subjects = DB::table('studysubject')->select('id','subjectName')->where('parentId',$value->id)->skip(0)->take(4)->get() ){
                    foreach ($value->subjects as $key2 => &$value2) {
                        //获取版本
                        $value2->editions = DB::table('studyedition')->select('id','editionName')->where('parentId',$value2->id)->skip(0)->take(15)->get();
                    }
                }
            }             
        }

        //拓展
        //获取小初高
        if( $expandSections = DB::table('studysection') -> select('id','sectionName') -> where('parentId',1) -> skip(0) -> take(4) -> get() ){
            foreach($expandSections as $k => &$v){
                //获取类别
                $v -> types = DB::table('expandResourceSel') -> select('id','selName') -> where('pid',$v->id) -> skip(0) -> take(15) -> get();
            }
        }


        return view('qiyun/resource/resource',['weekResNum'=>$weekResNum,'resNum'=>$resNum,'sections'=>$sections,'expands'=>$expandSections]);
    }

    public function uploadResource()
    {   
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
        return view('qiyun/resource/uploadResource');
    }
    

    //执行资源上传
    public function douploadResource(Request $request)
    {   
        /*
        if(Auth::user()){   
            if(Auth::user()->type == 1){   
                //获取文件后缀名
                $ext = strrchr($_FILES['Filedata']['name'],'.');

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
            }else{ 
                echo 2;  //不是教师 2
            }
        }else{
            //请登录 1
            echo 1;
        }
        */
  
  
        //获取文件后缀名
        $ext = strrchr($_FILES['Filedata']['name'],'.');

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

    //资源封面上传
    public function douploadResourcePic(Request $request){
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

    //获取上传资源信息接口
    public function douploadResourceInfo(){
        $arr = json_decode(file_get_contents('php://input'),true);
        // dd($arr);
        if(Auth::user()){   
            if(Auth::user()->type == 1){  
                if (!$arr['resourcePath']) {
                    echo 3; //请选择资源
                }else{ //执行添加代码
                    if(DB::table('resource')->where('userId',Auth::user()->id)->where('resourceTitle',$arr['resourceTitle'])->first()) {//判断资源是否唯一
                        echo 6;
                    }else{
                        if($arr['isexpand'] == 1) {
                            //添加移动端查询条件-开始
                            $arr['gradeType'] = DB::table('studygrade')->select('gradeType')->where('id', $arr['resourceGrade'])->first()->gradeType;
                            $arr['subjectType'] = DB::table('studysubject')->select('subjectType')->where('id', $arr['resourceSubject'])->first()->subjectType;
                            $arr['editionType'] = DB::table('studyedition')->select('editionType')->where('id', $arr['resourceEdition'])->first()->editionType;
                            //添加移动端查询条件-结束
                        }
                        $arr['userId'] = Auth::user()->id;
                        $arr['resourceAuthor'] = Auth::user()->realname;
                        $arr['resourceFormat'] = substr(strrchr($arr['resourcePath'], '.'), 1);
                        $arr['created_at'] = date('Y-m-d H:i:s');
                        $arr['updated_at'] = date('Y-m-d H:i:s');

                        if ($id = DB::table('resource')->insertGetId($arr)) {
                            //资源添加成功则向系统消息插入一条消息
                            $systemMsg = DB::table('system_message')->insertGetId(['resourceId' => $id, 'userId' => Auth::user()->id, 'messageTitle' => '共同提升，切磋水平', 'resourceType' => 0, 'type' => 0, 'url' => "/resource/resourceDetail/{$id}", 'isOpen' => 0, 'addTime' => time(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                            $userMsg = DB::table('user_message')->insertGetId(['resourceId' => $id, 'userId' => Auth::user()->id, 'messageTitle' => '成功创建', 'resourceType' => 0, 'type' => 0, 'isOpen' => 0, 'addTime' => Carbon::now()]);
                            if ($systemMsg && $userMsg) {
                                echo json_encode(['status' => 4, 'resId' => $id]); //添加成功
                            }
                        } else {
                            echo 5; //添加失败
                        }
                    }
                }
            }else{ 
                echo 2;  //不是教师 2
            }
        }else{
            //请登录 1
            echo 1;

        }
    }

    
    //获取资源类型选项接口
    public function getResourceType(){
        $resourcetype = DB::select('select id,resourceTypeName from resourcetype');
        echo json_encode($resourcetype);
    }

    //获取资源学段选项
    public function getStudySection(){
        $studysection = DB::select('select id,sectionName from studysection where parentId = 1');
        echo json_encode($studysection);
    }

    //获取资源学课选项
    public function getStudySubject($id){
        $studysubject = DB::select('select id,subjectName from studysubject where parentId = ?',[$id]);
        echo json_encode($studysubject);
    }

    //获取资源版本选项
    public function getStudyEdition($id){
        $studyedition = DB::select('select id,editionName from studyedition where parentId = ?',[$id]);
        echo json_encode($studyedition);
    }

    //获取资源册别选项
    public function getStudyGrade($id){
        $studygrade = DB::select('select id,gradeName from studygrade where parentId = ?',[$id]);
        echo json_encode($studygrade);
    }

    //获取资源教材目录选项
    public function getStudyChapter($id){
        $studychapter = DB::select("select id,chapterName,path from chapter where parentGradeId = ? order by concat(path,'-',id)",[$id]);

        foreach ($studychapter as $key => &$value) {
            $pre = '';
            $num = count(explode('-',$value->path));
            for($i = 0;$i < $num;$i++){
                $pre .= '|----';
            }

            $value->chapterName = $pre.$value->chapterName;
        }
        // dd($studychapter);
        echo json_encode($studychapter);
    }




    //跳转资源列表页
    public function resourceList($sectionId = 0,$subjectId =0,$editionId =0){
        switch($sectionId){
            case 1:
                $menu = '小学资源';
                break;
            case 2:
                $menu = '初中资源';
                break;
            case 3:
                $menu = '高中资源';
                break;
            case 4:
                $menu = '拓展资源';
                break;
        }
        return view('qiyun/resource/resourceList',['sectionId'=>$sectionId,'subjectId'=>$subjectId,'editionId'=>$editionId,'menu'=>$menu]);
    } 

    /**
     *资源列表页首次加载数据
     * 
     * $sectionId = 0; 默认为0，没有选择学段
     * $subjectId = 0; 默认为0，没有选择学科
     * $editionId = 0; 默认为0，没有选择版本
     * @return \Illuminate\Http\Response
     */
    public function resourceListLoad()
    {
        $arr = json_decode(file_get_contents('php://input'),true);
        $sectionId = $arr['sectionId'];
        $subjectId = $arr['subjectId'];
        $editionId = $arr['editionId'];

        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage-1)*$perPageNum;                  //跳过条数

        //获取 学段id
        $studysectionId = $sectionId;
        //学科 (根据传入过来的学段id 查出学科)
        $studysubject = DB::select('select id,subjectName from studysubject where parentId = ?', [$studysectionId]);
          if($subjectId == 0){
              //没有选择学科，查出学科第一个id
              $studysubjectId = $studysubject[0]->id;            
          }else{
              //有选择学科
              $studysubjectId = $subjectId;
              //获取学科id 并 将选择的学科置前
              foreach ($studysubject as $key =>$value) {
                    if ($value->id == $studysubjectId) {
                        unset($studysubject[$key]);
                        array_unshift($studysubject, $value);
                    }
              }
          }
        $subjectlen = count($studysubject);
        $studysubject1 = array();
        $studysubject2 = array();
        for($i = 0;$i<$subjectlen;$i++){
            if($i < 16){
                $studysubject1[] = $studysubject[$i];
            }else{
                $studysubject2[] = $studysubject[$i];
            }
        }
        
        //版本 
        $studyedition = DB::select("select id,editionName from studyedition where parentId = $studysubjectId");
          if($editionId ==0){
              //没有选择版本,查出第一个版本id
              $studyeditionId = $studyedition[0]->id;            
          }else{
              //获取学段id 并 将有选择版本置前
              $studyeditionId = $editionId;
              foreach ($studyedition as $key =>$value) {
                    if ($value->id == $studyeditionId) {
                        unset($studyedition[$key]);
                        array_unshift($studyedition, $value);
                    }
              }
          }
        

        $editionlen = count($studyedition);
        $studyedition1 = array();
        $studyedition2 = array();
        for($i = 0;$i<$editionlen;$i++){
            if($i < 13){
                $studyedition1[] = $studyedition[$i];
            }else{
                $studyedition2[] = $studyedition[$i];
            }
        }

        //册别
        $studygrade = DB::select("select id,gradeName from studygrade where parentId = $studyeditionId");  
          $studygradeId = $studygrade[0]->id;

        $gradelen = count($studygrade);
        $studygrade1 = array();
        $studygrade2 = array();
        for($i = 0;$i<$gradelen;$i++){
            if($i < 9){
                $studygrade1[] = $studygrade[$i];
            }else{
                $studygrade2[] = $studygrade[$i];
            }
        }


          
        // 教材目录
        $chapter = DB::select("select id,chapterName,parentId from chapter where path = '0' and  parentGradeId = $studygradeId ");
        
        $chapterarr = array();

        $a = 0;
        foreach($chapter as $v){
            $ids = array();
            $chapterarr[$a]['chapterTitle'] = $v -> chapterName;

            $chapterlist = DB::select("select id,chapterName from chapter where parentId = ($v->id)");
            foreach($chapterlist as $val){             
                // $chapterarr[$a]['chapterContent'][$val -> id]= $val -> chapterName;
                $chapterarr[$a]['chapterContent'][] = array('id'=>$val -> id,'chapterName'=>$val -> chapterName);
                $ids[] = $val -> id;
            }
            array_push($ids,$v->id);
            $chapterarr[$a]['chapterChildIds'] = implode(",",$ids);
            unset($ids);
            $a++;
        }

        // 资源类型
        $resourcetype = DB::select("select id,resourceTypeName from resourcetype where status = 0");

        $sum = DB::table('resource') -> where('resourceSection',$studysectionId) -> where('resourceSubject',$studysubjectId)-> where('resourceEdition',$studyeditionId) -> where('resourceGrade',$studygradeId) ->where('resourceCheck',0) -> count();  //总记录数
        
        //资源
        // $resource = DB::select("select * from resource where  resourceSection = $studysectionId and resourceSubject = $studysubjectId and resourceEdition = $studyeditionId and resourceGrade = $studygradeId order by id desc limit 5");
        // DB::connection()->enableQueryLog();
        // $resource = DB::select("select * from resource where  resourceSection = $studysectionId and resourceSubject = $studysubjectId and resourceEdition = $studyeditionId and resourceGrade = $studygradeId limit 5");
        $resource = DB::select("select * from resource where  resourceSection = $studysectionId and resourceSubject = $studysubjectId and resourceEdition = $studyeditionId and resourceGrade = $studygradeId and resourceCheck = 0 limit $passNUm,$perPageNum  ");
        // var_dump(DB::getQueryLog());


        if ($resource) {
            foreach ($resource as $key => &$value) {
                $size = @filesize('.'.$value->resourcePath);
                $size = self::format_bytes($size);
                $value -> size = $size;
                $value -> resourceFormat = substr(strstr($value->resourcePath,'.'),1);
            }
        }

        //总数
        if($resourcetype){
            $resourcetype[0]->resourceTypeName = $resourcetype[0]->resourceTypeName.'('.$sum .')';
        }

        $arrs = array('count'=>$sum,'subject' => $studysubject1,'subject2' => $studysubject2,'edition'=>$studyedition1,'edition2'=>$studyedition2,'grade'=>$studygrade1,'grade2'=>$studygrade2,'chapter'=>$chapterarr,'resourcetype'=>$resourcetype,'resource'=>$resource);
         
        if($resource){
            $arrs['status'] = true;
            $arrs['trueCount'] = true;
        }else{
            $arrs['status'] = false;
            $arrs['trueCount'] = false;
            $arrs['count'] = 1;
        }

        echo  json_encode($arrs);
        // return view('qiyun/resource/resourceList',['arrs'=>$arrs]);
    }

    public function resourceListSelect()
    {
        $arr = json_decode(file_get_contents('php://input'),true);
        //取出点击类型
        $level = $arr['level'];
        //学科id
        $studysubjectId = $arr['subject'];
        //版本id
        $studyeditionId = $arr['edition'];
        // 册别id
        $studygradeId   = $arr['grade'];
        //素材
        $chapters        = $arr['chapter'];
        //教材类型
        $resourceType= $arr['resourceType'];
        //order by
        $orderBy        = $arr['orderBy'];

        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage-1)*$perPageNum;                  //跳过条数

        if($level == 1){
            
            //版本 
            $studyedition = DB::select("select id,editionName from studyedition where parentId = $studysubjectId");
              //查出第一个版本id
              $studyeditionId = $studyedition[0]->id;

            $editionlen = count($studyedition);
            $studyedition1 = array();
            $studyedition2 = array();
            for($i = 0;$i<$editionlen;$i++){
                if($i < 13){
                    $studyedition1[] = $studyedition[$i];
                }else{
                    $studyedition2[] = $studyedition[$i];
                }
            }

            //册别
            $studygrade = DB::select("select id,gradeName from studygrade where parentId = $studyeditionId");  
              $studygradeId = $studygrade[0]->id;

            $gradelen = count($studygrade);
            $studygrade1 = array();
            $studygrade2 = array();
            for($i = 0;$i<$gradelen;$i++){
                if($i < 9){
                    $studygrade1[] = $studygrade[$i];
                }else{
                    $studygrade2[] = $studygrade[$i];
                }
            }

              
            // 教材目录

            $chapter = DB::select("select id,chapterName,parentId from chapter where path = '0' and  parentGradeId = $studygradeId");
            
            $chapterarr = array();
            $a = 0;
            foreach($chapter as $v){
                $ids = array();
                $chapterarr[$a]['chapterTitle'] = $v -> chapterName;
                $chapterlist = DB::select("select id,chapterName from chapter where parentId = ($v->id)");
                foreach($chapterlist as $val){             
                    // $chapterarr[$a]['chapterContent'][$val -> id]= $val -> chapterName;
                    $chapterarr[$a]['chapterContent'][] = array('id'=>$val -> id,'chapterName'=>$val -> chapterName);
                    $ids[] = $val -> id;
                }
                array_push($ids,$v->id);
                $chapterarr[$a]['chapterChildIds'] = implode(",",$ids);
                unset($ids);
                $a++;
            }

             
            // 资源类型
            $resourcetype = DB::select("select id,resourceTypeName from resourcetype where status = 0");
            // dd($resourcetype);

            $sum = DB::table('resource') -> where('resourceSubject',$studysubjectId) -> where('resourceEdition',$studyeditionId)-> where('resourceGrade',$studygradeId) ->where('resourceCheck',0) -> count();  //总记录数
            
            //资源
            $resource = DB::select("select * from resource where   resourceSubject = $studysubjectId and resourceEdition = $studyeditionId and resourceGrade = $studygradeId and resourceCheck = 0 limit $passNUm,$perPageNum ");
            // dd($resource);

            if ($resource) {
                foreach ($resource as $key => &$value) {
                    $size = @filesize('.'.$value->resourcePath);
                    $size = self::format_bytes($size);
                    $value -> size = $size;
                    $value -> resourceFormat = substr(strstr($value->resourcePath,'.'),1);
                }
            }

            //总数
            if($resourcetype){
                $resourcetype[0]->resourceTypeName = $resourcetype[0]->resourceTypeName.'('.$sum.')';
            }

            $arrs = array('level'=>$level,'count'=>$sum,'edition'=>$studyedition1,'edition2'=>$studyedition2,'grade'=>$studygrade1,'grade2'=>$studygrade2,'chapter'=>$chapterarr,'resourcetype'=>$resourcetype,'resource'=>$resource);
        
            if($resource){
                $arrs['status'] = true;
                $arrs['trueCount'] = true;
            }else{
                $arrs['status'] = false;
                $arrs['trueCount'] = false;
                $arrs['count'] = 1;
            }

        }elseif($level == 2){
            
            // 版本 
            $studyedition = DB::select("select id,editionName from studyedition where parentId = $studysubjectId");
              //查出第一个版本id
              // $studyeditionId = $studyedition[0]->id;

            $editionlen = count($studyedition);
            $studyedition1 = array();
            $studyedition2 = array();
            for($i = 0;$i<$editionlen;$i++){
                if($i < 13){
                    $studyedition1[] = $studyedition[$i];
                }else{
                    $studyedition2[] = $studyedition[$i];
                }
            }

            //册别
            $studygrade = DB::select("select id,gradeName from studygrade where parentId = $studyeditionId");  
              $studygradeId = $studygrade[0]->id;

            $gradelen = count($studygrade);
            $studygrade1 = array();
            $studygrade2 = array();
            for($i = 0;$i<$gradelen;$i++){
                if($i < 9){
                    $studygrade1[] = $studygrade[$i];
                }else{
                    $studygrade2[] = $studygrade[$i];
                }
            }

              
            // 教材目录
            $chapter = DB::select("select id,chapterName,parentId from chapter where path = '0' and parentGradeId = $studygradeId");
            
            $chapterarr = array();
            $a = 0;
            foreach($chapter as $v){
                $ids = array();
                $chapterarr[$a]['chapterTitle'] = $v -> chapterName;
                $chapterlist = DB::select("select id,chapterName from chapter where parentId = ($v->id)");
                foreach($chapterlist as $val){             
                    // $chapterarr[$a]['chapterContent'][$val -> id]= $val -> chapterName;
                    $chapterarr[$a]['chapterContent'][] = array('id'=>$val -> id,'chapterName'=>$val -> chapterName);
                    $ids[] = $val -> id;
                }
                array_push($ids,$v->id);
                $chapterarr[$a]['chapterChildIds'] = implode(",",$ids);
                unset($ids);                
                $a++;
            }

             
            // 资源类型
            $resourcetype = DB::select("select id,resourceTypeName from resourcetype where status = 0");
            // dd($resourcetype);

            $sum = DB::table('resource') -> where('resourceSubject',$studysubjectId) -> where('resourceEdition',$studyeditionId)-> where('resourceGrade',$studygradeId) ->where('resourceCheck',0) -> count();  //总记录数

            //资源
            $resource = DB::select("select * from resource where   resourceSubject = $studysubjectId and resourceEdition = $studyeditionId and resourceGrade = $studygradeId and resourceCheck = 0 limit $passNUm,$perPageNum ");
            // dd($resource);

            if ($resource) {
                foreach ($resource as $key => &$value) {
                    $size = @filesize('.'.$value->resourcePath);
                    $size = self::format_bytes($size);
                    $value -> size = $size;
                    $value -> resourceFormat = substr(strstr($value->resourcePath,'.'),1);
                }
            }


            //总数
            if($resourcetype){
                $resourcetype[0]->resourceTypeName = $resourcetype[0]->resourceTypeName.'('.$sum.')';
            }

            $arrs = array('level'=>$level,'count'=>$sum,'edition'=>$studyedition1,'edition2'=>$studyedition2,'grade'=>$studygrade1,'grade2'=>$studygrade2,'chapter'=>$chapterarr,'resourcetype'=>$resourcetype,'resource'=>$resource);
        
            if($resource){
                $arrs['status'] = true;
                $arrs['trueCount'] = true;
            }else{
                $arrs['status'] = false;
                $arrs['trueCount'] = false;
                $arrs['count'] = 1;
            }

        }elseif($level == 3){
            
            // 版本 
            $studyedition = DB::select("select id,editionName from studyedition where parentId = $studysubjectId");
              //查出第一个版本id
              // $studyeditionId = $studyedition[0]->id;

            $editionlen = count($studyedition);
            $studyedition1 = array();
            $studyedition2 = array();
            for($i = 0;$i<$editionlen;$i++){
                if($i < 13){
                    $studyedition1[] = $studyedition[$i];
                }else{
                    $studyedition2[] = $studyedition[$i];
                }
            }

            //册别
            $studygrade = DB::select("select id,gradeName from studygrade where parentId = $studyeditionId");  
              // $studygradeId = $studygrade[0]->id;

            $gradelen = count($studygrade);
            $studygrade1 = array();
            $studygrade2 = array();
            for($i = 0;$i<$gradelen;$i++){
                if($i < 9){
                    $studygrade1[] = $studygrade[$i];
                }else{
                    $studygrade2[] = $studygrade[$i];
                }
            }

            // dd($studygrade);

              
            // 教材目录
            $chapter = DB::select("select id,chapterName,parentId from chapter where path = '0' and parentGradeId = $studygradeId");
            
            $chapterarr = array();
            $a = 0;
            foreach($chapter as $v){
                $ids = array();
                $chapterarr[$a]['chapterTitle'] = $v -> chapterName;
                $chapterlist = DB::select("select id,chapterName from chapter where parentId = ($v->id)");
                foreach($chapterlist as $val){             
                    // $chapterarr[$a]['chapterContent'][$val -> id]= $val -> chapterName;
                    $chapterarr[$a]['chapterContent'][] = array('id'=>$val -> id,'chapterName'=>$val -> chapterName);
                    $ids[] = $val -> id;
                }
                array_push($ids,$v->id);
                $chapterarr[$a]['chapterChildIds'] = implode(",",$ids);
                unset($ids);                
                $a++;
            }

            // dd($chapterarr);
            
            // 资源类型
            $resourcetype = DB::select("select id,resourceTypeName from resourcetype where status = 0");
            // dd($resourcetype);
            
            $sum = DB::table('resource') -> where('resourceSubject',$studysubjectId) -> where('resourceEdition',$studyeditionId)-> where('resourceGrade',$studygradeId) ->where('resourceCheck',0) -> count();  //总记录数
            
            //资源
            $resource = DB::select("select * from resource where   resourceSubject = $studysubjectId and resourceEdition = $studyeditionId and resourceGrade = $studygradeId and resourceCheck = 0 limit $passNUm,$perPageNum ");
            // dd($resource);

            if ($resource) {
                foreach ($resource as $key => &$value) {
                    $size = @filesize('.'.$value->resourcePath);
                    $size = self::format_bytes($size);
                    $value -> size = $size;
                    $value -> resourceFormat = substr(strstr($value->resourcePath,'.'),1);
                }
            }

            //总数
            if($resourcetype){
                $resourcetype[0]->resourceTypeName = $resourcetype[0]->resourceTypeName.'('.$sum.')';
            }

            $arrs = array('level'=>$level,'count'=>$sum,'edition'=>$studyedition1,'edition2'=>$studyedition2,'grade'=>$studygrade1,'grade2'=>$studygrade2,'chapter'=>$chapterarr,'resourcetype'=>$resourcetype,'resource'=>$resource);
        
            if($resource){
                $arrs['status'] = true;
                $arrs['trueCount'] = true;
            }else{
                $arrs['status'] = false;
                $arrs['trueCount'] = false;
                $arrs['count'] = 1;
            }

        }else{
            
            //版本 
            $studyedition = DB::select("select id,editionName from studyedition where parentId = $studysubjectId");
              

            $editionlen = count($studyedition);


            $studyedition1 = array();
            $studyedition2 = array();
            for($i = 0;$i<$editionlen;$i++){
                if($i < 13){
                    $studyedition1[] = $studyedition[$i];
                }else{
                    $studyedition2[] = $studyedition[$i];
                }
            }

            //册别
            $studygrade = DB::select("select id,gradeName from studygrade where parentId = $studyeditionId");  
              

            $gradelen = count($studygrade);
            $studygrade1 = array();
            $studygrade2 = array();
            for($i = 0;$i<$gradelen;$i++){
                if($i < 9){
                    $studygrade1[] = $studygrade[$i];
                }else{
                    $studygrade2[] = $studygrade[$i];
                }
            }

            // dd($studygrade);

              
            // 教材目录
            $chapter = DB::select("select id,chapterName,parentId from chapter where path = '0' and parentGradeId = $studygradeId");
            
            $chapterarr = array();
            $a = 0;
            foreach($chapter as $v){
                $ids = array();
                $chapterarr[$a]['chapterTitle'] = $v -> chapterName;
                $chapterlist = DB::select("select id,chapterName from chapter where parentId = ($v->id)");
                foreach($chapterlist as $val){             
                    // $chapterarr[$a]['chapterContent'][$val -> id]= $val -> chapterName;
                    $chapterarr[$a]['chapterContent'][] = array('id'=>$val -> id,'chapterName'=>$val -> chapterName);
                    $ids[] = $val -> id;
                }
                array_push($ids,$v->id);
                $chapterarr[$a]['chapterChildIds'] = implode(",",$ids);
                unset($ids);
                $a++;
            }
            // unset($a);
            // dd($chapterarr);
            
             
            // 资源类型
            $resourcetype = DB::select("select id,resourceTypeName from resourcetype where status = 0");
            // dd($resourcetype);

            if($sum = DB::select("select id as sum from resource where  resourceSubject = $studysubjectId and resourceEdition = $studyeditionId and resourceGrade = $studygradeId  and resourceCheck = 0 $chapters  $resourceType $orderBy ")){  //总记录数
                $sum = count($sum);
            }

            //资源
            $resource = DB::select("select * from resource where  resourceSubject = $studysubjectId and resourceEdition = $studyeditionId and resourceGrade = $studygradeId and resourceCheck = 0 $chapters  $resourceType $orderBy limit $passNUm,$perPageNum  ");
            // dd($resource);

            if ($resource) {
                foreach ($resource as $key => &$value) {
                    $size = @filesize('.'.$value->resourcePath);
                    $size = self::format_bytes($size);
                    $value -> size = $size;
                    $value -> resourceFormat = substr(strstr($value->resourcePath,'.'),1);
                }
            }

            //总数
            if($resourcetype){
                $resourcetype[0]->resourceTypeName = $resourcetype[0]->resourceTypeName.'('.$sum.')';
            }

            // $arrs = array('subject' => $studysubject1,'subject2' => $studysubject2,'edition'=>$studyedition1,'edition2'=>$studyedition2,'grade'=>$studygrade1,'grade2'=>$studygrade2,'chapter'=>$chapterarr,'resourcetype'=>$resourcetype,'resource'=>$resource);
            $arrs = array('level'=>$level,'count'=>$sum,'edition'=>$studyedition1,'edition2'=>$studyedition2,'grade'=>$studygrade1,'grade2'=>$studygrade2,'chapter'=>$chapterarr,'resourcetype'=>$resourcetype,'resource'=>$resource);

            if($resource){
                $arrs['status'] = true;
                $arrs['trueCount'] = true;
            }else{
                $arrs['status'] = false;
                $arrs['trueCount'] = false;
                $arrs['count'] = 1;
            }

        }

        $arrs = json_encode($arrs);
        echo $arrs;
    }

    //计算文件大小类
    function format_bytes($size) { 
        $units = array(' B', ' KB', ' MB', ' GB', ' TB'); 
        for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024; 
        return round($size, 2).$units[$i]; 
    } 


    //拓展资源列表页
    public function expandResourceList($paraa = 0,$parab = 0,$parac = 0){
        return view('qiyun/resource/expandResourceList',['paraa'=>$paraa,'parab'=>$parab,'parac'=>$parac]);
    }
    /*拓展资源列表首次加载接口
     * $paraa = 0; 默认为0，
     * $parab = 0; 默认为0，没有选择学段
     * $parac = 0; 默认为0，没有选择类别
     */
    public function expandResourceListLoad(){
        $arr = json_decode(file_get_contents('php://input'),true);
        $paraa = $arr['paraa'];
        $parab = $arr['parab'];  //学段id
        $parac = $arr['parac'];  //类别id
        $where = $arr['where'];  //资源类型
        $order = $arr['order'];  //排序类型

        $nowPage = $arr['pageIndex'];          //当前页码
        $perPageNum = $arr['pageSize'];        //每页显示条数
        $passNUm = ($nowPage-1)*$perPageNum;   //跳过条数


        //查询所有学段
        $section = DB::table('studysection')->select('id','sectionName') -> where('parentId',1) ->get();
         if($parab == 0){ //没有选择学段，查出第一个学段id
             $studysectionId = $section[0]->id;
         }else{//有选择学段
             $studysectionId = $parab;
             //获取学段id，并将选择的学段置前
             foreach($section as $key => $value){
                 if($value->id == $studysectionId){
                     unset($section[$key]);
                     array_unshift($section,$value);
                 }
             }
         }

        //查询拓展类别
        $type = DB::table('expandResourceSel')->select('id','selName') ->where('pid',$studysectionId) ->get();
         if($parac == 0){ //没有选取类别，查出第一个类别id
             $typeId = $type[0]->id;
         }else{//有选取类别，获取类别id，并将选择的类别置前
             $typeId = $parac;
             foreach($type as $key => $value){
                 if($value->id == $typeId){
                     unset($type[$key]);
                     array_unshift($type,$value);
                 }
             }
         }



        //拓展资源
        $resource = DB::select(" select * from resource where isexpand = 2 AND resourceSection = $studysectionId AND expandId = $typeId AND resourceCheck = 0 $where $order limit $passNUm,$perPageNum ");
        $sum = DB::table('resource')->where('isexpand',2)->where('resourceSection',$studysectionId)->where('expandId',$typeId)->where('resourceCheck',0)->count();
        
        if($resource){
            foreach ($resource as $key => &$value) {
                $size = @filesize('.'.$value->resourcePath);
                $size = self::format_bytes($size);
                $value -> size = $size;
                $value -> resourceFormat = substr(strstr($value->resourcePath,'.'),1);
            }
        }

        // 资源类型
        if( $resourcetype = DB::select("select id,resourceTypeName from resourcetype where status = 0" )){
           $resourcetype[0]->resourceTypeName = $resourcetype[0]->resourceTypeName.'('.$sum .')';
        }

        $arrs = array('section'=>$section,'type'=>$type,'resourcetype'=>$resourcetype,'resource'=>$resource,'count'=>$sum);

        if($resource){
            $arrs['status'] = true;
            $arrs['trueCount'] = true;
        }else{
            $arrs['status'] = false;
            $arrs['trueCount'] = false;
            $arrs['count'] = 1;
        }

        echo json_encode($arrs);

    }

    //资源详情
    public function resourceDetail($id = 1)
    {   
        if (Auth::user()) {
            if ($resDetail = DB::select('select id,userId,resourceSection,resourceSubject,resourceEdition,resourceGrade,expandId,resourceTitle,created_at,size,resourceAuthor,resourceClick,resourceView,resourceIntro,resourcePath,resourceClick,resourceFav,resourceShare,isexpand from resource where id = ?', [$id])) {
                //计算文件大小
                $size = @filesize('.'.$resDetail[0]->resourcePath);
                $size = self::format_bytes($size);
                $resDetail[0]->size = $size;
                

                //浏览数加一
                DB::table('resource')->where('id',$id)->increment('resourceView',1);

                //获取文件后缀
                $type = strstr($resDetail[0]->resourcePath,'.');

                if(!in_array($type,['.mp4','.avi','.rmvb','.wmv','.3gp','.flv','.mpg','.mp3','.ogg','.jpg','.jpeg','.gif','.png','.bmp'])){
                    if(strstr($resDetail[0]->resourcePath,"http")){
                        $resDetail[0]->resourcePath = urlencode($resDetail[0]->resourcePath);
                    }else{
                        $resDetail[0]->resourcePath = urlencode('http://'.$_SERVER['HTTP_HOST'].'/'.$resDetail[0]->resourcePath);
                    }
                }

                //获取文件类型 
                $ida = $resDetail[0]->resourceSection;
                $section = DB::table('studysection')->select('sectionName')->where('id',$ida) -> first() ->sectionName;
                if($resDetail[0]->isexpand ==1) {
                    $idb = $resDetail[0]->resourceSubject;
                    $idc = $resDetail[0]->resourceEdition;
                    $idd = $resDetail[0]->resourceGrade;
                    $subject = DB::table('studysubject')->select('subjectName')->where('id', $idb)->first()->subjectName;
                    $edition = DB::table('studyedition')->select('editionName')->where('id', $idc)->first()->editionName;
                    $grade   = DB::table('studygrade')->select('gradeName')->where('id', $idd)->first()->gradeName;
                    $expandSel = false;

                    //相关资源推荐
                    $expandRes = DB::table('resource')->select('id','resourceTitle','resourceFav','resourceView','created_at')->where('resourceCheck',0)->where('resourceSection',$ida)->where('resourceSubject',$idb)->where('resourceEdition',$idc)->where('id', '<>', $id)->orderBy('resourceFav','desc')->orderBy('resourceView','desc')->orderBy('created_at','desc')->limit(6)->get();
                }else{
                    $idd = $resDetail[0]->expandId;
                    $subject = false;
                    $edition = false;
                    $grade   = false;
                    $expandSel = DB::table('expandResourceSel')->select('selName')->where('id', $idd)->first()->selName;

                    //相关资源推荐
                    $expandRes = DB::table('resource')->select('id','resourceTitle','resourceFav','resourceView','created_at')->where('resourceCheck',0)->where('isexpand',2)->where('resourceSection',$ida)->where('expandId',$idd)->where('id', '<>', $id)->orderBy('resourceFav','desc')->orderBy('resourceView','desc')->orderBy('created_at','desc')->limit(6)->get();
                }
                

                return view('qiyun/resource/resourceDetail',['resDetail'=>$resDetail[0],'resourceId'=>$id,'type'=>$type,'section'=>$section,'subject'=>$subject,'edition'=>$edition,'grade'=>$grade,'expandSel'=>$expandSel,'expandRes'=>$expandRes]);
            }
        }else{
            //return back()-> with('status', 0);  //未登录
            return redirect('/');
        }
    }

    //获取 点赞 分享 收藏 接口 
    public function getResourceFavDetail($id){
        if ($resDetail = DB::select('select id,resourceClick,resourceFav,resourceShare,resourceType from resource where id = ?', [$id])) {
            $resDetail[0]->resourceFav = DB::table('resourcestore')->where('resourceId',$id)->where('type',0)->count();
            echo json_encode($resDetail);        
        }    
    
    }

    //资源详情页 点赞 收藏 分享 接口
    public function doClick($resourceId){
        if (Auth::user()) {
            $userId = Auth::user()->id;
            if ($res = DB::select("select id from resource_click where resourceId = $resourceId and userId = $userId ")) { //判断该用户如果有点赞 则 取消点赞 ， 没有点赞则点赞
                // DB::table('resource_click')->where('id', $res[0]->id)->delete();
                // DB::table('resource') -> where('id',$resourceId) ->decrement('resourceClick',1);
                echo 1; //取消点赞 成功
            }else{
                DB::table('resource_click')->insert(['resourceId' => $resourceId, 'userId' => $userId]);
                DB::table('resource') -> where('id',$resourceId) ->increment('resourceClick',1);
                echo 3; //点赞 成功 
            }
        }else{
            //请登录
            echo 2;
        }
    }

    public function doFav($resourceId,$resourceType){
        if (Auth::user()) {
            $userId = Auth::user()->id;
            if ($res = DB::select("select id from resourcestore where resourceId = $resourceId and type = 0 and userId = $userId ")) { //判断该用户如果有点赞 则 取消点赞 ， 没有点赞则点赞
                // dd($res);
                DB::table('resourcestore')->where('id', $res[0]->id)->delete();
                 DB::table('resource') -> where('id',$resourceId) ->decrement('resourceFav',1);
                echo 1; //取消点赞 收藏
            }else{
                $restitle = DB::table('resource') -> select('resourceTitle') -> where('id',$resourceId) -> first() -> resourceTitle;
                DB::table('resourcestore')->insert(['resourceId' => $resourceId,'resourcetitle'=>$restitle, 'userId' => $userId,'type'=>0,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);
                DB::table('resource') -> where('id',$resourceId) ->increment('resourceFav',1);
                echo 3; //收藏 成功 
            }
        }else{
            //请登录
            echo 2;
        }
    }

    /**
     * 相关资源推荐
     *
     */
    // public function getOtherResurce()
    // {
    //     $otherRes = DB::select('select id,resourceTitle,created_at,resourceFav,resourceView from resource order by resourceFav desc,resourceView desc,created_at desc limit 6');

    //     if($otherRes){
    //         $arr = array('type' => true,'other'=>$otherRes);
    //     }else{
    //         $arr = array('type' => false,'other'=>'');
    //     }
    //     echo json_encode($arr);
    // }

    /**
     * 
     *
     * 
     * 
     */
    public function getResourceCommet()
    {
        $arr = json_decode(file_get_contents('php://input'),true);   
        $id = $arr['id'];

        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage-1)*$perPageNum;                  //跳过条数
        $sum = DB::table('resourcecomment') -> where('resourceId',$id) -> count();  //总记录数




        $res = DB::select("select id,commentContent,username,created_at from resourcecomment where resourceId = ? order by created_at desc limit $passNUm,$perPageNum ",[$id]);
        $arr = array();
        if($res){   
            foreach ($res as $key => $value) {
                $pic = DB::table('users') -> select('pic') -> where('username','=',$value->username) -> first();

                $arr[$key]['id'] = $value -> id;
                $arr[$key]['picture'] = $pic -> pic;
                $arr[$key]['author'] = $value -> username;
                $arr[$key]['content'] = $value  -> commentContent;
                $arr[$key]['create_at'] = $value  -> created_at;
                $arr[$key]['username'] = Auth::user()->username;

            }

            $comment = [
                'type' => true,
                'count' => $sum,
                'comment' => $arr,
                'commentCount' => count($arr)
            ];
        }else{
            $comment = [
                'type' => false,
                'comment' => $arr,
                'commentCount' => count($arr)
            ];
        }
        echo json_encode($comment);
        // dd($arr);
         
        // $arr = [
        //     "type" => true,
        //     "comment" => [
        //         ["id" => "1", "score" => "5", "create_at" => "2015-12-10", "author" => "杨小小小朋友", "picture" => "/image/qiyun/research/lessonDetail/headImg/diaosi.jpg", "content" => "哇塞~  这个资源真的好棒啊~"],
        //         ["id" => "1", "score" => "2", "create_at" => "2015-12-09", "author" => "守望者123", "picture" => "/image/qiyun/resource/f.png", "content" => "这个确实可以给我很多帮助~~  赞一个~~"],
        //         ["id" => "1", "score" => "3", "create_at" => "2015-12-04", "author" => "我吃西红柿", "picture" => "/image/qiyun/resource/tx.png", "content" => "不错。很专业，谢谢分享。很专业。"],
        //         ["id" => "1", "score" => "2", "create_at" => "2015-12-03", "author" => "李梦梦", "picture" => "/image/qiyun/research/lessonDetail/headImg/wck.jpg", "content" => "还不错了，如果能在详细一些，我想会更好~"],
        //         ["id" => "1", "score" => "4", "create_at" => "2015-11-24", "author" => "小白同学~~", "picture" => "/image/qiyun/resource/resourceDetail/tx.png", "content" => "挺好的，下载回家慢慢看~  哈哈哈~~~~"]
        //     ]
        // ];
        // //  用户评论总数
        // $arr['commentCount'] = count($arr['comment']);
        // echo json_encode($arr);
    }
    
    //前台 删除评论
    public function delResourceCommet($id){
        if (DB::table('resourcecomment')->where('id',$id)->delete()) {
            echo 1; //删除成功
        }else{
            echo 2; //删除失败
        }
        
    }


    //评论资源
    public function addResourceCommet(){
        $array = json_decode(file_get_contents('php://input'),true);   
        // dd($array);
        if(Auth::user()){
            if($array['comment']){
                $arr['commentContent'] = $array['comment'];
                $arr['resourceId'] = $array['resourceId'];
                $arr['username'] = Auth::user()->username;
                $arr['created_at'] = date("Y-m-d H:i:s");
                $arr['updated_at'] = date("Y-m-d H:i:s");

                if(DB::table('resourcecomment')->insertGetId($arr)){
                    //添加成功
                    // return back()-> with('status', 1);
                    // return back();
                    echo 1;
                }else{
                    //添加失败
                    // return back()-> with('status', 0);
                    echo 0;
                }                
            }else{//评论不能为空
                // return back()-> with('status', 3);
                echo 3;
            }
 
        }else{
            //请登录
            // return back()-> with('status', 2);
            // return redirect('/');
            echo 2;

        }
        


        // dd($_POST);
    }

    //获取小学资源 小学1 语文1 数学2 英语3 
    public function getPrimaryRes()
    {
        
        //小学语文
        $schinese = DB::select("select id,resourceTitle,resourcePic from resource where resourceSection=1 AND resourceSubject =1 AND isexpand = 1 and resourceCheck = 0 limit 10");
        //小学数学
        $smath = DB::select("select id,resourceTitle,resourcePic from resource where resourceSection=1 AND resourceSubject =2 AND isexpand = 1 and resourceCheck = 0 limit 10");
        //小学英语
        $senglish = DB::select("select id,resourceTitle,resourcePic from resource where resourceSection=1 AND resourceSubject =3 AND isexpand = 1 and resourceCheck = 0 limit 10");

        if($schinese || $smath || $senglish){
            $res = array('status'=>true,'schinese'=>$schinese,'smath'=>$smath,'senglish'=>$senglish);
        }else{
            $res = array('status'=>false,'schinese'=>$schinese,'smath'=>$smath,'senglish'=>$senglish);
        }
        // $res = array('schinese'=>$schinese,'smath'=>$smath,'senglish'=>$senglish);
        echo json_encode($res);
        // dd($res);
    }

    //获取初中资源 初中2 语文4 数学5 英语6
    public function getJuniorRes()
    {
        
        //初中语文
        $mchinese = DB::select("select id,resourceTitle,resourcePic from resource where resourceSection=2 AND resourceSubject =4 AND isexpand = 1 and resourceCheck = 0 limit 10");
        //初中数学
        $mmath = DB::select("select id,resourceTitle,resourcePic from resource where resourceSection=2 AND resourceSubject =5 AND isexpand = 1 and resourceCheck = 0 limit 10");
        //初中英语
        $menglish = DB::select("select id,resourceTitle,resourcePic from resource where resourceSection=2 AND resourceSubject =6 AND isexpand = 1 and resourceCheck = 0 limit 10");

        if($mchinese || $mmath || $menglish){
            $res = array('status'=>true,'mchinese'=>$mchinese,'mmath'=>$mmath,'menglish'=>$menglish);
        }else{
            $res = array('status'=>false,'mchinese'=>$mchinese,'mmath'=>$mmath,'menglish'=>$menglish);
        }


        // $res = array('mchinese'=>$mchinese,'mmath'=>$mmath,'menglish'=>$menglish);
        echo json_encode($res);
        // dd($res);
    }    
    //获取高中资源 高中3 语文7 数学8 英语9
    public function getSeniorRes()
    {
        //高中语文
        $hchinese = DB::select("select id,resourceTitle,resourcePic from resource where resourceSection=3 AND resourceSubject =7 AND isexpand = 1 and resourceCheck = 0 limit 10");
        //高中数学
        $hmath = DB::select("select id,resourceTitle,resourcePic from resource where resourceSection=3 AND resourceSubject =8 AND isexpand = 1 and resourceCheck = 0 limit 10");
        //高中英语
        $henglish = DB::select("select id,resourceTitle,resourcePic from resource where resourceSection=3 AND resourceSubject =9 AND isexpand = 1 and resourceCheck = 0 limit 10");

        if($hchinese || $hmath || $henglish){
            $res = array('status'=>true,'hchinese'=>$hchinese,'hmath'=>$hmath,'henglish'=>$henglish);
        }else{
            $res = array('status'=>false,'hchinese'=>$hchinese,'hmath'=>$hmath,'henglish'=>$henglish);
        }

        // $res = array('hchinese'=>$hchinese,'hmath'=>$hmath,'henglish'=>$henglish);
        echo json_encode($res);
        // dd($res);
    }  

    //获取拓展资源 拓展2  小学1 初中2  高中3
    public function getExpandRes()
    {
        //拓展小学
        $echinese = DB::select("select id,resourceTitle,resourcePic from resource where resourceSection=1 AND isexpand = 2 and resourceCheck = 0 limit 10");
        //拓展初中
        $emath = DB::select("select id,resourceTitle,resourcePic from resource where resourceSection=2 AND isexpand = 2 and resourceCheck = 0 limit 10");
        //拓展高中
        $eenglish = DB::select("select id,resourceTitle,resourcePic from resource where resourceSection=3 AND isexpand = 2 and resourceCheck = 0 limit 10");

        if($echinese || $emath || $eenglish){
            $res = array('status'=>true,'echinese'=>$echinese,'emath'=>$emath,'eenglish'=>$eenglish);
        }else{
            $res = array('status'=>false,'echinese'=>$echinese,'emath'=>$emath,'eenglish'=>$eenglish);
        }

        // $res = array('hchinese'=>$hchinese,'hmath'=>$hmath,'henglish'=>$henglish);
        echo json_encode($res);
        // dd($res);
    } 







    //最新资源排行
    public function getResOrdTime(){
        $newstRes = DB::select("select id,resourceTitle from resource where resourceCheck = 0 order by created_at desc limit 8");
        if($newstRes){
            $res = array('status'=>true,'newstRes'=>$newstRes);
        }else{
            $res = array('status'=>false,'newstRes'=>$newstRes);
        }
        echo json_encode($res);
        // dd($res);
    }

    //最热资源排行
    public function getResOrdFav(){
        $hotRes = DB::select("select id,resourceTitle from resource where resourceCheck = 0 order by resourceFav desc limit 8");
        if($hotRes){
            $res = array('status'=>true,'hotRes'=>$hotRes);
        }else{
            $res = array('status'=>false,'hotRes'=>$hotRes);
        }
        echo json_encode($res);
        // dd($res);
    }

    //教师贡献排行
    public function getResOrdTea(){
        // $res = DB::select("select id,realname from users limit 8");
        $nameArr = array(); 
        $aa = DB::select("select userId,count(userId) as num from resource  group by userId  order by num desc limit 8");

        if($aa){
            foreach ($aa as $key => $value) {
                // dd($value);
                $user = DB::select("select id,realname from users where id = '$value->userId' ");
                if($user) {
                    $m = $user[0]->id;
                    $n = $user[0]->realname;
                    $bb = array('userId' => $m, 'realname' => $n, 'resNum' => $value->num);
                }
                array_push($nameArr,$bb);
            }

            $res = array('status'=>true,'teaName'=>$nameArr);
        }else{
            $res = array('status'=>false,'teaName'=>$nameArr);
        }

        echo json_encode($res);
        // dd($res);
    }


    /**
     * 举报
     *
     */
    public function doinformant()
    {
        $arr = json_decode(file_get_contents('php://input'),true);
        if(DB::table('resourceinformant')->where(['userId'=>Auth::user()->id,'resourceId'=>$arr['resourceId']])->first()){
//            dd('举报过');

            echo 1;  //该用户对该资源已举报过
        }else{
//            dd('没举报过');

            $arr['userId'] = Auth::user()->id;
            $arr['created_at'] = date("Y-m-d H:i:s",time());
            $arr['updated_at'] = date("Y-m-d H:i:s",time());
            if(DB::table('resourceinformant')->insertGetId($arr)){
                echo 2;  //举报成功
            }else{
                echo 3;  //失败
            }
        }

    }
}
