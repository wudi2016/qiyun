<?php

namespace App\Http\Controllers\qiyun\research;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class lessonDetailController extends Controller
{


    /**
     * 共案列表接口
     */
    public function getCommomCase($id)
    {

        $res = DB::table('lessonsubjects')
            ->select('id', 'title', 'lessonName', 'type', 'created_at', 'editerName', 'updated_at', 'status', 'resourceUrl')
            ->where('parentId', '=', $id)
            ->get();
        if ($res) {
            foreach ($res as $key => $val) {
                $arra[] = array(
                    'id' => $val->id,
                    'title' => $val->title,
                    'resourceTitle' => $val->lessonName,
                    'resourceFormat' => $val->type,
                    'created_at' => strstr($val->created_at, ' ', true),
                    'lastEdit' => $val->editerName,
                    'updated_at' => $val->updated_at,
                    'status' => $val->status == 0 ? '可编辑' : '不可编辑',
                    'resourceUrl' => $val->resourceUrl
                );
            }
            $arr = array('type' => true, 'commomCase' => $arra);
        } else {
            $arr = array('type' => false);
        }

        echo json_encode($arr);

    }


    /**
     * 文章接口
     */
    public function getRealArticle($id)
    {

        $article = DB::table('lessonsubject_article')
            ->select('id', 'title', 'create_at')
            ->where('lessonId', '=', $id)
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();
        if ($article) {
            $arra = array();
            foreach ($article as $val) {
                $arra[] = array(
                    'id' => $val->id,
                    'title' => $val->title,
                    'created_at' => $val->create_at
                );
            }
            $arr = array('type' => true, 'realArticle' => $arra);
        } else {
            $arr = array('type' => false);
        }

        echo json_encode($arr);
    }


    /**
     * 资源接口
     */
    public function getArticle($id)
    {

        $resource = DB::table('lessonsubject_resource')
            ->select('id', 'name', 'resourceurl', 'create_at')
            ->where('lessonId', '=', $id)
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();

        if ($resource) {
            $arra = array();
            foreach ($resource as $val) {
                // 计算资源大小，KB
                $filename = $val->resourceurl;
                $filesize = abs(@filesize('.' . $filename));
                $filesize = ceil($filesize / 1024);
                $type = explode('.', $val->resourceurl);
                if (strtolower($type['1']) == 'jpg') {
                    $arra[] = array(
                        'id' => $val->id,
                        'size' => $filesize,   //大小，结果为KB
                        'title' => $val->name,
                        'created_at' => $val->create_at,
                        'pic' => '/image/qiyun/research/lessonDetail/add/jpg.png'
                    );
                } elseif (strtolower($type['1']) == 'mp4') {
                    $arra[] = array(
                        'id' => $val->id,
                        'size' => $filesize,   //大小，结果为KB
                        'title' => $val->name,
                        'created_at' => $val->create_at,
                        'pic' => '/image/qiyun/research/lessonDetail/add/mp4.png'
                    );
                } elseif (strtolower($type['1']) == 'pdf') {
                    $arra[] = array(
                        'id' => $val->id,
                        'size' => $filesize,   //大小，结果为KB
                        'title' => $val->name,
                        'created_at' => $val->create_at,
                        'pic' => '/image/qiyun/research/lessonDetail/add/pdf.png'
                    );
                } elseif (strtolower($type['1']) == 'word') {
                    $arra[] = array(
                        'id' => $val->id,
                        'size' => $filesize,   //大小，结果为KB
                        'title' => $val->name,
                        'created_at' => $val->create_at,
                        'pic' => '/image/qiyun/research/lessonDetail/add/d.png'
                    );
                } else {
                    $arra[] = array(
                        'id' => $val->id,
                        'size' => $filesize,   //大小，结果为KB
                        'title' => $val->name,
                        'created_at' => $val->create_at,
                        'pic' => '/image/qiyun/research/lessonDetail/add/ppt.png'
                    );
                }

            }
            $arr = array('type' => true, 'article' => $arra);
        } else {
            $arr = array('type' => false);
        }

        echo json_encode($arr);
    }


    /**
     * 图片接口
     */
    public function getImage($id)
    {

        $image = DB::table('lessonsubject_image')
            ->select('id', 'imgurl')
            ->where('lessonId', '=', $id)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();

        if ($image) {
            $arra = array();
            foreach ($image as $val) {
                $arra[] = array(
                    'id' => $val->id,
                    'picture' => $val->imgurl
                );
            }
            $arr = array('type' => true, 'image' => $arra);
        } else {
            $arr = array('type' => false);
        }

        echo json_encode($arr);
    }

    public function imageList($id)
    {
        // 图片列表页
        $data = DB::table('lessonsubject_image')->where('lessonId', $id)->get();
        if ($data) {
            $status = '1';
        } else {
            $status = '2';
        }
        return view('/qiyun/research/imageList', compact('data', 'status'));
    }


    /**
     *视频接口
     */
    public function getVideo($id)
    {

        $video = DB::table('lessonsubject_video')
            ->select('id', 'url')
            ->where('lessonId', '=', $id)
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();

        if ($video) {
            $arra = array();
            foreach ($video as $val) {
                $arra[] = array(
                    'id' => $val->id,
                    'picture' => $val->url,
                    // 'videoName' => $val ->name
                );
            }
            $arr = array('type' => true, 'video' => $arra);
        } else {
            $arr = array('type' => false);
        }

        echo json_encode($arr);

    }

    /**
     *话题接口
     */
    public function getTopic($id)
    {

        $topic = DB::table('lessonsubject_topic as l')
            ->leftJoin('users as u', 'u.id', '=', 'l.userId')
            ->select('l.id', 'l.title', 'u.realname', 'l.create_at', 'l.content')
            ->where('lessonId', '=', $id)
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();

        if ($topic) {
            $arra = array();
            foreach ($topic as $val) {
                $arra[] = array(
                    'id' => $val->id,
                    'title' => $val->title,
                    'author' => $val->realname,
                    'create_at' => $val->create_at,
                );
            }
            $arr = array('type' => true, 'topic' => $arra);
        } else {
            $arr = array('type' => false);
        }

        echo json_encode($arr);

    }


    /**
     *相关协备
     */
    public function getRelevant($id)
    {

        $res = DB::table('lessonsubject')
            ->select('id', 'lessonSubjectName', 'lessonView')
//            ->orderBy('lessonFav','desc')
            ->limit(5)
            ->orderBy('lessonView', 'desc')
            ->get();
        if ($res) {
            foreach ($res as $val) {
                $arra[] = array(
                    'id' => $val->id,
                    'title' => $val->lessonSubjectName     //备课主题名称
                );
            }
            $arr = array('type' => true, 'relevant' => $arra);
        } else {
            $arr = array('type' => false);
        }
        echo json_encode($arr);

    }


    /**
     * 协备统计接口
     */
    public function getCount($id)
    {

        // 共案统计
        $commoncase = DB::table('lessonsubject as ls')
            ->join('lessonsubjects as lss', 'ls.id', '=', 'lss.parentId')
            ->select('lss.id')
            ->where('lss.parentId', '=', $id)
            ->count();

        // 文案统计
        $article = DB::table('lessonsubject as ls')
            ->join('lessonsubject_article as lsa', 'ls.id', '=', 'lsa.lessonId')
            ->select('lsa.id')
            ->where('lsa.lessonId', '=', $id)
            ->count();


        // 资源
        $resource = DB::table('lessonsubject as ls')
            ->join('lessonsubject_resource as lsr', 'ls.id', '=', 'lsr.lessonId')
            ->select('lsr.id')
            ->where('lsr.lessonId', '=', $id)
            ->count();


        // 图片
        $image = DB::table('lessonsubject as ls')
            ->join('lessonsubject_image as lsi', 'ls.id', '=', 'lsi.lessonId')
            ->select('lsi.id')
            ->where('lsi.lessonId', '=', $id)
            ->count();

        // 视频
        $video = DB::table('lessonsubject as ls')
            ->join('lessonsubject_video as lsv', 'ls.id', '=', 'lsv.lessonId')
            ->select('lsv.id')
            ->where('lsv.lessonId', '=', $id)
            ->count();

        // 话题
        $topic = DB::table('lessonsubject as ls')
            ->join('lessonsubject_topic as lst', 'ls.id', '=', 'lst.lessonId')
            ->select('lst.id')
            ->where('lst.lessonId', '=', $id)
            ->count();
        $arra = array();

        $arra['singleCase'] = $commoncase;
        $arra['document'] = $commoncase;
        $arra['resource'] = $resource;
        $arra['image'] = $image;
        $arra['video'] = $video;
        $arra['topic'] = $topic;

        $arr[] = $arra;

        $arr = array('type' => true, 'count' => $arr);
        echo json_encode($arr);

    }


    /**
     * 教案组成员
     */
    public function getGroupMember($id)
    {

        $res = DB::table('departmenttech')
            ->select('userId')
            ->where('parentId', '=', $id)
            ->get();
        if ($res) {
            foreach ($res as $val) {
                $arra[] = $val->userId;
            }
            // 转成字符串
            $ids = implode(',', $arra);
            // 查看是否在字符串之中
            $member = DB::select("select id,realname,pic from users where id in ($ids)");
            if ($member) {
                foreach ($member as $val) {
                    $arras[] = array(
                        'id' => $val->id,
                        'name' => $val->realname,
                        'picture' => $val->pic
                    );
                }
                $arr = array('type' => true, 'groupMember' => $arras);
            } else {
                $arr = array('type' => false);
            }
        } else {
            $arr = array('type' => false);
        }
        echo json_encode($arr);
    }

    public function getLessonMember($id)
    {
        $techResearch = DB::table('lessonsubject')->where('id', $id)->first()->techResearch;
        $res = DB::table('departmenttech')
            ->select('userId')
            ->where('parentId', '=', $techResearch)
            ->get();
        if ($res) {
            foreach ($res as $val) {
                $arra[] = $val->userId;
            }
            // 转成字符串
            $ids = implode(',', $arra);
            // 查看是否在字符串之中
            $member = DB::select("select id,realname,pic from users where id in ($ids)");
            if ($member) {
                foreach ($member as $val) {
                    $arras[] = array(
                        'id' => $val->id,
                        'name' => $val->realname,
                        'picture' => $val->pic
                    );
                }
                $arr = array('type' => true, 'lessonMember' => $arras);
            } else {
                $arr = array('type' => false);
            }
        } else {
            $arr = array('type' => false);
        }
        echo json_encode($arr);
    }



    //
    //个案列表接口(暂无)
    //
    public function getSingleCase($id)
    {
        // $arr = [
        //     "type" => true,
        //     "singleCase" => [
        //         ["id" => "1", "title" => "一去二三里", "resourceTitle" => "《一去二三里》教学设计.doc", "resourceFormat" => "doc", "created_at" => "2015-11-15", "lastEdit" => "王莉", "updated_at" => "2015-11-24 15:10", "status" => '可编辑']
        //     ]
        // ];
        // echo json_encode($arr);        
    }



    //
    //内容接口 初备 反思 (暂无)
    //
    public function getContent($id)
    {
        $arr = [
            "type" => true,
            "content" => [
                [
                    "firstPrepare" => "初备内容初备内容初备内容初备内容初备内容初备内容初备内容初备内容初备内容初备内容初备内容初备内容初备内容初备内容",
                    "reflect" => "反思内容反思内容反思内容反思内容反思内容反思内容反思内容反思内容反思内容反思内容反思内容反思内容反思内容反思内容反思内容"
                ]
            ]
        ];
        echo json_encode($arr);
    }


    //计算文件大小类
    function format_bytes($size)
    {
        $units = array(' B', ' KB', ' MB', ' GB', ' TB');
        for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
        return round($size, 2) . $units[$i];
    }


    //个案列表资源详情
    public function resourceDetail($id)
    {
        $resDetail = DB::select("select id,name as resourceTitle,describes,create_at,userId,resourceurl from lessonsubject_resource where id = ?", [$id]);
        //计算文件大小
        $size = @filesize('.' . $resDetail[0]->resourceurl);
        $size = self::format_bytes($size);
        $resDetail[0]->size = $size;

        $resDetail[0]->resourceAuthor = DB::table('users')->select('realname')->where('id', $resDetail[0]->userId)->first()->realname;

        //获取文件类型
        $type = strstr($resDetail[0]->resourceurl, '.');

        return view('qiyun/research/resourceDetail', ['resDetail' => $resDetail[0], 'resourceId' => $id, 'type' => $type]);
    }

    //个案列表图片详情
    public function imageDetail($id)
    {
        $resDetail = DB::select("select id,create_at,userId,imgurl as resourceurl from lessonsubject_image where id = ?", [$id]);

        //计算文件大小
        $size = @filesize('.' . $resDetail[0]->resourceurl);
        $size = self::format_bytes($size);
        $resDetail[0]->size = $size;

        $resDetail[0]->resourceAuthor = DB::table('users')->select('realname')->where('id', $resDetail[0]->userId)->first()->realname;

        //获取文件类型
        $type = strstr($resDetail[0]->resourceurl, '.');

        return view('qiyun/research/imageDetail', ['resDetail' => $resDetail[0], 'resourceId' => $id, 'type' => $type]);
    }

    //个案列表视频详情
    public function videoDetail($id)
    {
        $resDetail = DB::select("select id,describes,name as resourceTitle,create_at,userId,url as resourceurl from lessonsubject_video where id = ?", [$id]);

        //计算文件大小
        $size = @filesize('.' . $resDetail[0]->resourceurl);
        $size = self::format_bytes($size);
        $resDetail[0]->size = $size;
        // dd($resDetail);
        $resDetail[0]->resourceAuthor = DB::table('users')->select('realname')->where('id', $resDetail[0]->userId)->first()->realname;

        //获取文件类型
        $type = strstr($resDetail[0]->resourceurl, '.');

        return view('qiyun/research/videoDetail', ['resDetail' => $resDetail[0], 'resourceId' => $id, 'type' => $type]);
    }

    // 个案列表话题详情
    public function topicDetail($id)
    {
        $resa = DB::select("select id,title from lessonsubject_topic where id<$id order by id DESC limit 1");

        $resb = DB::select("select id,title from lessonsubject_topic where id>$id order by id ASC limit 1");

        if ($resa) {
            $arr['prev'] = $resa[0];
        } else {
            $arr['prev'] = false;
        }
        if ($resb) {
            $arr['next'] = $resb[0];
        } else {
            $arr['next'] = false;
        }
        return view('/qiyun/research/topicDetail', ['datas' => $arr]);
    }

    public function getTopicDetail($id)
    {

        $topic = DB::table('lessonsubject_topic as l')
            ->leftJoin('users as u', 'u.id', '=', 'l.userId')
            ->select('l.id', 'l.title', 'u.realname', 'l.create_at', 'l.content')
            ->where('l.id', '=', $id)
            ->first();

        if ($topic) {
            $arr = array('type' => true, 'content' => $topic);
        } else {
            $arr = array('type' => false);
        }

        echo json_encode($arr);

    }

}
