<?php

namespace App\Http\Controllers\api\QiYunAPP;

use Illuminate\Http\Request;
use Illuminate\Message\Messages;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class QiYunAppController extends Controller
{
    private $number = 5;

    private function getSkip( $page, $number ) { return ( $page - 1 ) * $number; }

    /**
     * 用户登录
     *
     * @param  string   username
     * @param  string   password
     * @return  json
     */
    public function userLogin()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $userInfo = \DB::table('users') -> where( [ 'username' => $request['username'], 'type' => $request['type'] ] ) -> orWhere( [ 'phone' => $request['username'], 'type' => $request['type'] ] ) -> first();
        if ( $userInfo )
            if ( \Hash::check( $request['password'], $userInfo -> password ) )
                return Response() -> json([ "type" => true, "data" => $userInfo ]);
            else
                return Response() -> json([ "type" => false, "data" => "密码错误" ]);
        else
            return Response() -> json([ "type" => false, "data" => "用户不存在" ]);
    }


    /**
     * 用户上传微课
     *
     * @param  string   username
     * @param  string   password
     * @param  string   phone
     * @param  string   pic
     * @return  json
     */
    public function userAddweike()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $arrayPics = $request['datalist'];
        $totaltimes = 0;
        for ( $a= 0; $a < count($arrayPics); $a++ ) {
            $totaltimes = $totaltimes + $arrayPics[$a]['times'];
        }
        $weikeInfo = [
            "user_id" => $request['userid'],
            "type" => 1,
            "lessonName" => $request['name'],
            "lessonTime" =>  $totaltimes,
            "author" => $request['author'],
            "lessonTitle" => $request['title'],
            "logo" => $request['pic'],
            "isHead" => $request['isHead'],
            "tag1" => $request['tag1'],
            "tag2" => $request['tag2'],
            "tag3" => $request['tag3'],
            "lessonDes" => $request['des'],
            "addTime" => $request['addTime'],
            "gradeType" => $request['gradeType'],
            "subjectType" => $request['subjectType']
        ];
        $resultId = \DB::table('mini_lesson') -> insertGetId($weikeInfo);

        if ( $resultId ) {
            for ( $i = 0; $i < count($arrayPics); $i++ ) {
                $hahaInfo = [
                    "pic" => $arrayPics[$i]['img'],
                    "soundpath" => $arrayPics[$i]['audio'],
                    "times" => $arrayPics[$i]['times'],
                    "parentId" => intval($resultId),
                    "addTime" => time()
                ];
                $result = \DB::table('mini_lesson_record') -> insert($hahaInfo);
            }
            return Response() -> json(["type" => $resultId, "data" => $hahaInfo]);
        } else {
            return Response() -> json(["type" => false,"resultId" =>$resultId , "data" => $arrayPics]);
        }
    }



    /**
     * 用户上传微课视频
     *
     * @param  string   username
     * @param  string   password
     * @param  string   phone
     * @param  string   pic
     * @return json
     */
    public function userAddVideo()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $arrayPics = $request['datalist'];
        $weikeInfo = [
            "user_id" => $request['userid'],
            "type" => 0,
            "lessonName" => $request['name'],
            "lessonTime" =>  $arrayPics[0]['lessonTime'],
            "lessonTitle" => $request['title'],
            "author" => $request['author'],
            "logo" => $request['pic'],
            "lessonDes" => $request['des'],
            "isHead" => $request['isHead'],
            "tag1" => $request['tag1'],
            "tag2" => $request['tag2'],
            "tag3" => $request['tag3'],
            "path" => $arrayPics[0]['videoUrl'],
            "addTime" => $request['addTime'],        
            "gradeType" => $request['gradeType'],
            "subjectType" => $request['subjectType']
        ];
        $resultId = \DB::table('mini_lesson') -> insertGetId($weikeInfo);
        if ( $resultId) {
            return Response() -> json(["type" => true, "data" => $weikeInfo ]);
        } else {
            return Response() -> json(["type" => false, "data" =>  $weikeInfo]);
        }
    }


    /**
     * 修改用户密码
     *
     * @param  int     uid
     * @param  string  oldPass
     * @param  string  newPass
     * @return json
     */
    public function modifyPassword()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $password = \DB::table('users') -> select("password") -> where('id', $request['uid']) -> first();
        if ( \Hash::check( $request['oldPass'], $password -> password ) )
            if ( \DB::table('users') -> where('id', $request['uid']) -> update([ "password" => bcrypt($request['newPass']) ]) )
                return Response() -> json(["type" => true, "info" => "modifySuccess"]);
            else
                return Response() -> json(["type" => false, "info" => "modifyFail"]);
        else
            return Response() -> json(false);
    }
    
    
    /**
     * 找回密码
     *
     * @param  string  phone
     * @param  string  password
     * @return json
     */
    public function findPassword()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $result = \DB::table('users') -> where('phone', $request['phone']) -> update([ "password" => \Crypt::encrypt($request['password']) ]);
        if ( $result )
            return Response() -> json(["type" => true, "info" => "Success"]);
        else
            return Response() -> json(["type" => false, "info" => "Fail"]);
    }


    /**
     * 获取用户消息列表
     *
     * @param  int     uid
     * @param  int     page
     * @return json
     */
    public function getMessageList($uid, $page)
    {
        $this -> number = 9;
        $messageList = \DB::table('mini_lesson_message') 
                        -> select("id", "content", "type", "addTime") -> where('user_id', $uid) -> orderBy("addTime", "desc") 
                        -> skip( $this -> getSkip( $page, $this -> number ) ) -> take( $this -> number ) -> get();
        if ( $messageList )
            return Response() -> json([ "type" => true, "data" => $messageList ]);
        else
            return Response() -> json([ "type" => false, "data" => "Fail" ]);
    }


    /**
     * 微课关键字搜索
     *
     * @param  string  keyWord
     * @param  int     page
     * @return json
     */
    public function lessonSearch()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $this -> number = 8;
        switch ( $request['type'] ) {
            case 0 :
                $result = \DB::table('resource') 
                        -> select("id", "resourceTitle as title", "resourcePic as logo", "resourceAuthor as author", "resourceClick as click", "resourceView as view", "created_at as addTime")
                        -> where('resourceTitle', 'like', '%'. $request['keyWord'] .'%')
                        -> orderBy("id", "desc") -> skip( $this -> getSkip( $request['page'], $this -> number ) ) -> take( $this -> number ) -> get();
                foreach ( $result as $key => $value ) $value -> src = '#/resourceView/' . $value -> id;
                break;
            case 1 :
                $result = \DB::table('mini_lesson') 
                        -> select("id", "lessonName as title", "logo", "author", "addTime", "viewNum as view", "likeNum as click") -> where('lessonName', 'like', '%'. $request['keyWord'] .'%')
                        -> orderBy("id", "desc") -> skip( $this -> getSkip( $request['page'], $this -> number ) ) -> take( $this -> number ) -> get();
                foreach ( $result as $key => $value ) $value -> src = '#/lessonView/' . $value -> id;
                break;
            case 2 :
                $result = \DB::table('users') 
                        -> join('schoolsubject', 'users.subjectId', '=', 'schoolsubject.id')
                        -> join('schoolgrade', 'users.gradeId', '=', 'schoolgrade.id')
                        -> select("users.id", "users.username", "schoolsubject.subjectName as subject", "schoolgrade.gradeName as grade", "users.pic") 
                        -> where('users.username', 'like', '%'. $request['keyWord'] .'%') -> where('users.type', 1)
                        -> orderBy("users.id", "desc") -> skip( $this -> getSkip( $request['page'], $this -> number ) ) -> take( $this -> number ) -> get();
                break;
        }
        if ( $result )
            return Response() -> json([ "type" => true, "data" => $result ]);
        else
            return Response() -> json([ "type" => false ]);
    }


    /**
     * 获取指定微课详细
     *
     * @param  int     lessonId
     * @return json
     */
    public function getLessonDetail($lessonId)
    {
        $lessonDetail = \DB::table('mini_lesson') -> join('users', 'mini_lesson.user_id', '=', 'users.id')
                        -> select("mini_lesson.*", "users.username", "users.pic") 
                        -> where('mini_lesson.id', $lessonId) -> first();
        if ( $lessonDetail )
            return Response() -> json([ "type" => true, "data" => $lessonDetail ]);
        else
            return Response() -> json([ "type" => false, "data" => "Fail" ]);
    }


    /**
     * 获取指定微课评论
     *
     * @param  int     lessonId
     * @param  int     page
     * @return json
     */
    public function getLessonComment($lessonId, $page)
    {
        $this -> number = 10;
        $lessonComment = \DB::table('mini_lesson_comment') 
                        -> join('users', 'mini_lesson_comment.user_id', '=', 'users.id')
                        -> select("mini_lesson_comment.content", "mini_lesson_comment.addTime", "users.username", "users.pic") 
                        -> where('mini_lesson_comment.parentId', $lessonId) -> orderBy("mini_lesson_comment.addTime", "desc") 
                        -> skip($this -> getSkip($page, $this -> number)) -> take($this -> number) -> get();
        if ( $lessonComment )
            return Response() -> json($lessonComment);
        else
            return Response() -> json(false);
    }

    /**
     * 获取指定资源评论
     *
     * @param  int     lessonId
     * @param  int     page
     * @return json
     */
    public function getResourceComment($lessonId, $page)
    {
        $this -> number = 10;
        $lessonComment = \DB::table('resourcecomment') 
                        -> join('users', 'resourcecomment.username', '=', 'users.username')
                        -> select("resourcecomment.commentContent", "resourcecomment.created_at", "users.username", "users.pic") 
                        -> where('resourcecomment.resourceId', $lessonId) -> orderBy("resourcecomment.id", "desc") 
                        -> skip($this -> getSkip($page, $this -> number)) -> take($this -> number) -> get();
        if ( $lessonComment )
            return Response() -> json($lessonComment);
        else
            return Response() -> json(false);
    }


    /**
     * 添加资源评论
     *
     * @return json
     */
    public function addResourceComment()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $request['created_at'] = Carbon::now();
        $request['updated_at'] = Carbon::now();
        $request['parentId'] = 0;
        $request['resourceId'] = intval( $request['resourceId'] );
        $result = \DB::table('resourcecomment') -> insert($request);
        if ( $result )
            return Response() -> json(["type" => true, "data" => "success"]);
        else
            return Response() -> json(["type" => false, "data" => "fail"]);
    }

    /**
     * 获取个人收藏微课
     *
     * @param  int     uid
     * @param  int     page
     * @return json
     */
    public function getPerFav($uid, $page)
    {
        $this -> number = 8; 
        $perFav = \DB::table('resourcestore')
                    -> select("id", "created_at", "type", "resourceId")
                    -> where( [ 'userId' => $uid, "type" => 0 ] )
                    -> orWhere( [ 'userId' => $uid, "type" => 5 ] )
                    -> orderBy( 'id', 'desc' ) -> skip($this -> getSkip($page, $this -> number)) -> take($this -> number) -> get();
        foreach ( $perFav as $key => $value ) {
            if ( $value -> type == 0 ) {
                $resource = \DB::table('resource') -> select('resourceTitle as title', 'resourceAuthor as author', 'resourcePic as pic', 'resourceView as viewNum', 'resourceClick as likeNum') -> where('id', $value -> resourceId) -> first();
                if ( $resource ) {
                    $resource -> src = '#/resourceView/' . $value -> resourceId;
                    foreach ($resource as $k => $v) $value -> $k = $v;
                } else {
                    unset( $perFav[$key] );
                }
            } else {
                $resource = \DB::table('mini_lesson') -> select('lessonName as title', 'lessonTitle as author', 'logo as pic', 'viewNum', 'likeNum') -> where('id', $value -> resourceId) -> first();
                if ( $resource ) {
                    $resource -> src = '#/lessonView/' . $value -> resourceId;
                    foreach ($resource as $k => $v) $value -> $k = $v;
                } else {
                    unset( $perFav[$key] );
                }
            }
        }
        $perFav = array_merge( $perFav );
        if ( $perFav ) 
            return Response() -> json( [ "type" => true, "info" => $perFav ] );
        else 
            return Response() -> json( [ "type" => false, "info" => "null" ] );
    }


    /**
     * 获取发布联动标签
     *
     * @param  int     sectionId
     * @param  int     gradeId
     * @return json
     */
    public function getTag()
    {
        $tag = \DB::table('mini_tag_section')
                    -> join('mini_tag_grade', 'mini_tag_section.id', '=', 'mini_tag_grade.parentId') 
                    -> join('mini_tag_subject', 'mini_tag_grade.id', '=', 'mini_tag_subject.parentId')
                    -> select("mini_tag_section.id as sectionId", 'mini_tag_section.sectionName', 'mini_tag_grade.id as gradeId', 'mini_tag_grade.gradeName', 'mini_tag_grade.gradeType', 'mini_tag_subject.id as subjectId', 'mini_tag_subject.subjectName', 'mini_tag_subject.subjectType') -> get();
        $result = [];
        foreach ( $tag as $key => $val ) {
            $result[$val -> sectionId] = [ "name" => $val -> sectionName, "type" => $val -> sectionId, "sub" => [] ];
        }
        $result[] = [ "name" => '', "type" => '', "sub" => [] ];
        $result[] = [ "name" =>'', "type" => '', "sub" => [] ];
        $result[] = [ "name" => '', "type" => '', "sub" => [] ];

        foreach ( $tag as $key => $val ) {
            $result[$val -> sectionId]['sub'][$val -> gradeId] = [ "name" => $val -> gradeName, "gType" => $val -> gradeType, "type" => $val -> gradeId, "sub" => [] ];
        }
        foreach ( $tag as $key => $val ) {
            $result[$val -> sectionId]['sub'][$val -> gradeId]['sub'][$val -> subjectId] = [ "name" => $val -> subjectName, "gType" => $val -> subjectType, "type" => $val -> subjectId ];
        }

        $result = array_merge($result);

        foreach ( $result as $key => $val ) {
            $result[$key]['sub'][] = [ "name" => '', "type" => '', "sub" => [] ];
            $result[$key]['sub'][]= [ "name" =>'', "type" => '', "sub" => [] ];
            $result[$key]['sub'][] =  [ "name" => '', "type" => '', "sub" => [] ];

            $result[$key]['sub'] = array_merge($result[$key]['sub']);

            foreach ( $result[$key]['sub'] as $k => $v ) {
                $result[$key]['sub'][$k]['sub'][] = [ "name" => '', "type" => ''];
                $result[$key]['sub'][$k]['sub'][]= [ "name" =>'', "type" => '' ];
                $result[$key]['sub'][$k]['sub'][] =  [ "name" => '', "type" => ''];
                $result[$key]['sub'][$k]['sub'] = array_merge($result[$key]['sub'][$k]['sub']);
                
            }
        }

        return Response() -> json($result);
    }


    /**
     * 获取验证码
     *
     * @param  string  telephone
     * @param  int     gradeId
     * @return json
     */
    public function getMessage(Messages $message, $telephone, $key_1, $key_2)
    {
        $message -> mobile = $telephone;
        $code = str_shuffle(mt_rand(100, 999). "" .mt_rand(100, 999));
        $content = $message -> content[$key_1][$key_2][0] . $code . $message -> content[$key_1][$key_2][1];
        $result = $message -> sendSMS($code, $content);
        $result = explode(":", $result);
        if ( $result[0] == "success" )
            return Response() -> json(["type" => true, "info" => $code]);
        else
            return Response() -> json(["type" => false, "info" => "sendFail"]);
    }


    /**
     * 查询手机号唯一
     *
     * @param  string   password
     * @return json
     */
    public function findUnique()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $result = \DB::table('users') -> select('id') -> where($request) -> first();
        if ( $result )
            return Response() -> json(true);
        else
            return Response() -> json(false);
    }


    /**
     * 上传图片
     *
     * @param  file   image
     * @return json
     */
    public function uploadImage()
    {
        if ( !isset( $_FILES['file'] ) || ( $_FILES['file']['tmp_name'] == '' ) ) 
            return Response() -> json( [ "type" => false, "info" => "Please choose a file" ] );
        $uploadfile =  $_FILES['file']['name'];
        $newName = date('YmdHis', time()) . $uploadfile;
        $uploadfilename = $_FILES['file']['tmp_name']; 
        if ( move_uploaded_file( $uploadfilename, $_SERVER['DOCUMENT_ROOT'] . "/image/QiYunAPP/headImage/" . $newName ) )
            return Response() -> json( [ "type" => true, "path" => "/image/QiYunAPP/headImage/".$newName ] );
        else
            return Response() -> json( [ "type" => false, "info" => "上传失败" ] );
    }
    
    
    /**
     * 意见反馈
     *
     * @param  int      uid
     * @param  string   content
     * @return  json
     */
    public function feedBack()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $feedBack = [
            "user_id" => $request['uid'],
            "content" => $request['content'],
            "contact" => $request['contact'],
            "addtime" => $request['time']
        ];
        $result = \DB::table('mini_lesson_feedback') -> insert($feedBack);
        if ( $result )
            return Response() -> json(["type" => true, "data" => "success"]);
        else
            return Response() -> json(["type" => false, "data" => "backFail"]);
    }
    
    
    /**
     * 添加评论
     *
     * @param  int      uid
     * @param  int      parentId
     * @param  int      addTime
     * @param  string   content
     * @return json
     */
    public function addComment()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $feedBack = [
            "user_id" => $request['user_id'],
            "parentId" => $request['parentId'],
            "content" => $request['content'],
            "addTime" => $request['time']
        ];
        $result = \DB::table('mini_lesson_comment') -> insert($feedBack);
        if ( $result )
            return Response() -> json([ "type" => true, "data" => "success" ]);
        else
            return Response() -> json([ "type" => false, "data" => "backFail" ]);
    }
    
        
    /**
     * 修改个人信息
     *
     * @param  int      uid
     * @param  string   username
     * @param  string   intro
     * @param  string   pic
     * @param  int      flowSwitch
     * @return json
     */
    public function editUserInfo()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $data = [];
        foreach ( $request['data'] as $key => $val ) { $data[$key] = $val; }
        $result = \DB::table('users') -> where('id', $request['uid']) -> update( $data );
        if ( $result ) {
            return Response() -> json(["type" => true, "info" => "Success"]);
        } else {
            return Response() -> json(["type" => false, "info" => "Fail"]);
        }
    }
    
    
    
    /**
     * 获取课件数据
     *
     * @param  int   lessonId
     * @return json
     */
    public function getAudioAndImage($lessonId)
    {
        $record = \DB::table('mini_lesson_record') -> select("pic", "soundpath", "times") -> where('parentId', $lessonId) -> orderBy("addTime", "asc") -> get();
        if ( $record ) {
            $result = [];
            foreach ( $record as $key => $value ) { foreach ( $value as $k => $v ) { if ( $v == '' || $v == null ) { $v = null; } $result[$k][$key] = $v; } }
            $totalTime = 0;
            foreach ( $result['times'] as $key => $value) { $totalTime += $value; }
            $result['totalTime'] = $totalTime;
            return Response() -> json([ "type" => true, "data" => $result ]);
        } else {
            return Response() -> json([ "type" => false, "data" => "Fail" ]);
        }
    }
    
    
    /**
     * 微课点赞接口
     *
     * @param  int   lessonId
     * @return json
     */
    public function clickLike($lessonId, $type, $table)
    {
        $operation = intval( $type ) ? '+' : '-';
        $result = \DB::statement('update mini_lesson set '. $table .' = '. $table .' '. $operation .' 1 where id = '. $lessonId);
        if ( $result )
            return Response() -> json(["type" => true, "info" => "Success"]);
        else
            return Response() -> json(["type" => false, "info" => "Fail"]);
    }

    /**
     * 资源点赞接口
     *
     * @param  int   lessonId
     * @return json
     */
    public function resourceClickLike($resourceId, $type, $table)
    {
        $operation = intval( $type ) ? '+' : '-';
        $result = \DB::statement('update resource set '. $table .' = '. $table .' '. $operation .' 1 where id = '. $resourceId);
        if ( $result )
            return Response() -> json(["type" => true, "info" => "Success"]);
        else
            return Response() -> json(["type" => false, "info" => "Fail"]);
    }
    
    
    /**
     * 收藏接口
     *
     * @param  int   uid
     * @param  int   lessonId
     * @param  int   addTime
     * @param  int   type
     * @return json
     */
    public function myFavOrLike()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        
        switch ( intval( $request['type'] ) ) {
            case 0 :
                $result = \DB::table($request['table']) -> select("id") -> where( $request['data'] ) -> get();
                $info = "select";
                break;
            case 1 :
                $result = \DB::table($request['table']) -> insert( $request['data'] );
                $info = "insert";
                break;
            case 2 :
                $result = \DB::table($request['table']) -> where( $request['data'] ) -> delete();
                $info = "delete";
                break;
            default: 
                break;
        }
        
        if ( $result ) {
            return Response() -> json([ "type" => true, "info" => $info ]);
        } else {
            return Response() -> json([ "type" => false, "info" => "Fail" ]);
        }
        
    }


    /**
     * 获取我的资源
     *
     * @return  json
     */
    public function getMyResource ()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $where = [];
        foreach ( $request['data'] as $key => $value ) {
            if ( $value !== true )
                $where[$key] = $value;
        }
        $this -> number = 8;
        switch ( intval( $request['type'] ) ) {
            case 0 :
                $result = \DB::table('resource') 
                        -> select("id", "resourceTitle", "resourcePic", "resourceView", "resourceClick", "resourceAuthor", "created_at", "resourcePath") -> where($where) -> orderBy("id", "desc") 
                        -> skip( $this -> getSkip( $request['page'], $this -> number ) ) -> take( $this -> number ) -> get();
                break;
            case 1 :
                $result = \DB::table('resource') -> where($where) -> delete();
                break;
        }
        if ( $result )
            return Response() -> json([ "type" => true, "data" => $result ]);
        else
            return Response() -> json([ "type" => false ]);
    }

    /**
     * 获取我的微课
     *
     * @return  json
     */
    public function getMyLesson ()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $where = [];
        foreach ( $request['data'] as $key => $value ) {
            if ( $value !== true )
                $where[$key] = $value;
        }
        $this -> number = 8;
        switch ( intval( $request['type'] ) ) {
            case 0 :
                $result = \DB::table('mini_lesson') 
                        -> select("id","lessonName", "addTime", "logo", "viewNum", "likeNum", "author")  -> where($where) -> orderBy("id", "desc") 
                        -> skip( $this -> getSkip( $request['page'], $this -> number ) ) -> take( $this -> number ) -> get();
                break;
            case 1 :
                $result = \DB::table('mini_lesson') -> where($where) -> delete();
                break;
        }
        if ( $result )
            return Response() -> json([ "type" => true, "data" => $result ]);
        else
            return Response() -> json([ "type" => false ]);
    }

     /**
     * 获取用户信息
     *
     * @param  int      userID
     * @return  json
     */
    public function getUserInfo($userID)
    {
        $result = \DB::table('users') -> select('users.username', 'users.pic') -> where('users.id', $userID) -> first();
        if ( $result )
            return Response() -> json([ "type" => true, "data" => $result ]);
        else
            return Response() -> json([ "type" => false ]);
    }

    /**
     * 获取总数
     *
     * @param  int      userID
     * @return  json
     */
    public function getCount($userID, $type)
    {
        switch ( $type ) {
            case 'resource': $where = [ 'resource', 'userId' ]; break;
            case 'lesson': $where = [ 'mini_lesson', 'user_id' ]; break;
        }
        $result = \DB::table($where[0]) -> where($where[1], $userID) -> count();
        if ( $result )
            return Response() -> json([ "type" => true, "data" => $result ]);
        else
            return Response() -> json([ "type" => false ]);
    }

     /**
     * 获取资源详情
     *
     * @param  int      userID
     * @return  json
     */
    public function getResourceDetail($resourceID)
    {
        $result = \DB::table('resource') -> join('users', 'resource.userId', '=', 'users.id')
                        -> select("resource.*", "users.username", "users.pic") 
                        -> where('resource.id',  $resourceID) -> first();
        if ( $result )
            return Response() -> json([ "type" => true, "data" => $result ]);
        else
            return Response() -> json([ "type" => false ]);
    }

    /**
     * 获取版本信息
     *
     * @param  string    varsionInfo
     * @return  json
     */
    public function getAppVersion()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $versionInfo = file_get_contents( $_SERVER['DOCUMENT_ROOT']  . '/AppVersion/QiYunVersion.txt' );
        if ( $request['info'] != $versionInfo )
            return Response() -> json([ "type" => true, "info" => $versionInfo ]);
        else
            return Response() -> json([ "type" => false ]);
    }

}
