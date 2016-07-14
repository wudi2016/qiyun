<?php

namespace App\Http\Controllers\qiyun\research;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Request;
use Auth;
use App\Http\Requests;
// use App\Http\Controllers\Controller;
use App\Techresearch;
use App\Departmenttech;
use App\Lessonsubject;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

header("Content-type:text/html;charset=utf-8");

class researchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()) {
            if (Auth::user()->type == '1') {
                return view('qiyun/research/research');
            } else {
                return back()->with('checkResearch', 2); //不是老师
            }
        } else {
            return back()->with('checkResearch', 1); //未登录
        }

    }

    // 判断是否登录，是否是教师的公共接口
    public function isTeacher()
    {
        if (Auth::user()) {
            if (Auth::user()->type == '1') {
                echo json_encode(['status' => '1']);
            } else {
                echo json_encode(['status' => '2']);
            }
        } else {
            echo json_encode(['status' => '3']);
        }
    }

    // 唯一性判断
    public function isOnlyThis()
    {
        $info = json_decode(file_get_contents('php://input'), true);
        if (DB::table($info['table'])->where($info['fieldName'], $info['value'])->first()) {
            echo json_encode(['status' => '1']); // 已存在
        } else {
            echo json_encode(['status' => '2']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeGroup()
    {
        return view('qiyun/research/makeGroup');
    }


    // 创建教研组
    public function addGroup(Request $request)
    {

        if (Auth::user()) {

            if (Auth::user()->type == 1) {
                // 文件上传
                if ($request->hasFile('myPhoto')) { //判断文件是否存在
                    if ($request->file('myPhoto')->isValid()) { //判断文件在上传过程中是否出错
                        $name = $request->file('myPhoto')->getClientOriginalName();//获取图片名
                        $entension = $request->file('myPhoto')->getClientOriginalExtension();//上传文件的后缀
                        // 设置上传音视频的所有格式
                        // $allowed_types = array('jpg', 'png', 'gif', 'jpeg','JPG');
                        // if (!in_array($entension, $allowed_types)) {
                        //     echo "请上传图片格式";
                        //     die();
                        // } else {
                        $newname = date('YmdHis', time()) . rand(0000, 1000) . '.' . $entension;//拼接新的图片名
                        if ($request->file('myPhoto')->move('./uploads/research/makeGroup/', $newname)) {
                            $arr['myPhoto'] = '/uploads/research/makeGroup/' . $newname;
                        } else {
                            return redirect()->back()->withInput()->withErrors('文件保存失败');
                        }
                        // }
                    } else {
                        return redirect()->back()->withInput()->withErrors('文件在上传过程中出错');
                    }
                }

                $arr = array(
                    'pic' => $arr['myPhoto'],
                    'techResearchName' => $_POST['name'],
                    'author' => DB::table('users')->where('id', Auth::user()->id)->first()->username,
                    'isOpen' => $_POST['groupType'],
                    'description' => $_POST['desc'],
                    'created_at' => date('Y-m-d H:i:s', time()),
                    'status' => '0');
                // 入库
                if ($id = DB::table('techresearch')->insertGetId($arr)) {
                    // 添加系统消息和个人消息
                    $sysMsg = DB::table('system_message')->insertGetId(['resourceId' => $id, 'userId' => Auth::user()->id, 'messageTitle' => '共同提升，切磋水平', 'resourceType' => 1, 'type' => 0, 'url' => "/research/techGroupInfo/{$id}", 'isOpen' => 0, 'addTime' => time(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                    $userMsg = DB::table('user_message')->insertGetId(['resourceId' => $id, 'userId' => Auth::user()->id, 'messageTitle' => '成功创建', 'resourceType' => 1, 'type' => 0, 'isOpen' => 0, 'addTime' => Carbon::now()]);
                    if ($sysMsg && $userMsg) {
                        return Redirect()->to('/research/groupList'); //创建成功
                    }
                } else {
                    return back()->with('status', 4); //创建失败
                }
            } else {
                return back()->with('status', 2);  //不是教师 2
            }
        } else {
            //请登录 1
            return Redirect()->to('/');;
        }

    }


    // 添加教研组成员
    public function insertTeachGruop()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (Auth::user()) {
            // 多选，将字符串分割，取到各个userId
            $usersId = explode(',', rtrim($data['member'], ','));
            foreach ($usersId as $val) {
                // 这里只是将邀请的信息给教师发送过去，当被邀请的人同意后，方可进行加入教研组
                DB::table('user_message')->insertGetId(['fromuserId' => Auth::user()->id, 'resourceId' => $data['id'], 'userId' => $val, 'messageTitle' => '邀请你加入', 'resourceType' => 1, 'type' => 7, 'isOpen' => 0, 'addTime' => Carbon::now()]);
            }
            echo json_encode(['status' => '1']);
        } else {
            echo json_encode(['status' => '2']);
        }
    }

    //  判断是否已经是成员 或 已经发送邀请
    public function isRealMember($id)
    {
        $techId = json_decode(file_get_contents('php://input'), true);
        $author = DB::table('techresearch')->where('id', $techId)->first();
        $username = DB::table('users')->where('id', $id)->first();
        if ($author->author == $username->username) {//  判断是否是创建者
            echo json_encode(['status' => '4']);
        } else {
            $res = DB::table('departmenttech')->where(['userId' => $id, 'parentId' => $techId])->first();
            if ($res) {
                echo json_encode(['status' => '1']);  // 已经是成员
            } else {
                if (DB::table('user_message')->where(['userId' => $id, 'resourceId' => $techId, 'isOpen' => '0'])->first()) {
                    echo json_encode(['status' => '2']); // 已经发送通知
                } else {
                    echo json_encode(['status' => '3']);  // 正常进行
                }
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function makeLesson()
    {
        return view('qiyun/research/makeLesson');
    }

    //  协同备课列表页
    public function lessonList()
    {
        return view('qiyun/research/lessonList');
    }

    //  协同备课列表页数据接口
    public function getLessonList()
    {

        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数
        $sum = DB::table('lessonsubject')->where('status', 0)->count();  //总记录数
        $count = [
            'subjects' => DB::table('lessonsubject')->count(),
            'cases' => DB::table('lessonsubjects')->count(),
            'resources' => DB::table('lessonsubject_resource')->count(),
            'articles' => DB::table('lessonsubject_article')->count(),
            'images' => DB::table('lessonsubject_image')->count(),
            'videos' => DB::table('lessonsubject_video')->count(),
            'topics' => DB::table('lessonsubject_topic')->count()
        ];

        if ($res = DB::table('lessonsubject')->select('id', 'lessonSubjectName as lessonName', 'lessonSubjectTarget as lessonDesc', 'lessonSubjecAuthor as lessonAuthor', 'pic', 'beginTime', 'endTime')->where('status', '0')->orderBy('id', 'desc')->skip($passNUm)->take($perPageNum)->get()) {
            foreach ($res as $key => &$value) {
                $value->beginTime = explode(' ', $value->beginTime);
                array_pop($value->beginTime);
                $value->endTime = explode(' ', $value->endTime);
                array_pop($value->endTime);
                $value->article = DB::table('lessonsubject_article')->where('lessonId', $value->id)->count();
                $value->resource = DB::table('lessonsubject_resource')->where('lessonId', $value->id)->count();
                $value->images = DB::table('lessonsubject_image')->where('lessonId', $value->id)->count();
                $value->videos = DB::table('lessonsubject_video')->where('lessonId', $value->id)->count();
            }
            $arr = ['status' => true, 'lessonList' => $res, 'lessonCount' => $count, 'total' => $sum];
        } else {
            //没有结果
            $arr = ['status' => false, 'lessonList' => $res, 'lessonCount' => $count];
        }
        echo json_encode($arr);
    }

    //  协同备课详情页
    public function lessonDetail($id)
    {
        DB::table('lessonsubject')->where('id', $id)->increment('lessonView', 1);
        if (Auth::user()) {
            if (Auth::user()->type == '1') {
                $arr = [];
                // $res = DB::select('select id,pic,lessonSubjectName,created_at,beginTime,endTime,lessonSubjecAuthor,lessonGrade from lessonsubject where id = ?', [$id]);
                $res = DB::table('lessonsubject as ls')
                    ->join('users as u', 'u.username', '=', 'ls.lessonSubjecAuthor')
                    ->join('studysection as sec', 'ls.lessonSection', '=', 'sec.id')
                    ->join('studysubject as sub', 'ls.lessonSubject', '=', 'sub.id')
                    ->join('studyedition as edi', 'ls.lessonEdition', '=', 'edi.id')
                    ->join('studygrade as gra', 'ls.lessonGrade', '=', 'gra.id')
                    ->join('chapter as cha', 'ls.lessonChapter', '=', 'cha.id')
                    ->select('ls.id', 'ls.pic', 'ls.lessonSubjectName', 'ls.created_at', 'ls.beginTime', 'ls.endTime', 'ls.lessonSubjecAuthor', 'sec.sectionName', 'sub.subjectName', 'edi.editionName', 'gra.gradeName', 'cha.chapterName')
                    ->where('ls.id', $id)
                    ->get();

                foreach ($res as $key => $val) {
                    $arr['id'] = $val->id;
                    $arr['picture'] = $val->pic;
                    $arr['title'] = $val->lessonSubjectName;
                    $arr['create_at'] = $val->created_at;
                    $arr['startTime'] = explode(" ", $val->beginTime)[0];
                    $arr['endTime'] = explode(" ", $val->endTime)[0];
                    $arr['author'] = $val->lessonSubjecAuthor;
                    $arr['resource'] = $val->sectionName . $val->subjectName . $val->editionName . $val->gradeName . '/' . $val->chapterName;
                    // $arr['plan'] = "共同提升水平，切磋教学技能";
                }
                return view('qiyun/research/lessonDetail')->with("lessonDetail", json_encode($arr));
            } else {
                return back()->with('checkResearch2', 2); //不是老师
            }
        } else {
            return back()->with('checkResearch2', 1); //未登录
        }


    }


    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function getGroup()
    {
        if ($res = Techresearch::select('techResearchName', 'pic', 'id')->orderBy('id', 'desc')->where('status', '0')->skip(0)->take(3)->get()) {
            $arra = array();
            foreach ($res as $v) {
                $members = DB::select("select count(*) as members from departmenttech where parentId = $v->id and status = '1'");
                $lessons = DB::select("select count(*) as lessons from lessonsubject where techResearch = $v->id");
                $arra[] = array('id' => $v->id, 'image' => $v->pic, 'groupName' => $v->techResearchName, 'members' => $members[0]->members, 'lessons' => $lessons[0]->lessons);
            }
            $arr = ['type' => true, 'group' => $arra];
        } else {
            $arr = ["type" => false];
        }

        echo json_encode($arr);
    }

    /**
     * Update the specified resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function getSubject()
    {
        if ($res = Lessonsubject::select('lessonSubjectName', 'lessonSubjecAuthor', 'techResearch', 'beginTime as created_at', 'endTime as updated_at', "id")->where('status', '0')->orderBy('id', 'desc')->skip(0)->take(3)->get()) {
            foreach ($res as $v) {
                $members = @DB::select("select techResearchName  from techresearch where id = $v->techResearch");
                $arra[] = array('subjectTitle' => $v->lessonSubjectName, 'subjectAuthor' => $v->lessonSubjecAuthor, 'group' => $members[0]->techResearchName, 'startTime' => strstr($v->created_at, ' ', true), 'endTime' => strstr($v->updated_at, ' ', true), "id" => $v->id);
            }
            $arr = ['type' => true, 'subject' => $arra];
        } else {
            $arr = ["type" => false];
        }
        // dd($arr);
        echo json_encode($arr);
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function getEvaluation()
    {
        $members = DB::select("select id,evaluattype,evaluatPic as image,evaluatAuthor as evaluationAuthor,evaluatName as evaluationTitle,beginTime as startTime,endTime from evaluat where status = '0' order By id desc limit 3");
        // dd($members);

        if ($members) {

            foreach ($members as $key => &$value) {
                $value->evaluationAuthor = DB::table('users')->select('realname')->where('username', '=', @$value->evaluationAuthor)->get()[0]->realname;
                $value->evaluattype = DB::table('evaluatType')->select('evaluatTypeName')->where('id', '=', @$value->evaluattype)->get()[0]->evaluatTypeName;
            }
            $arr = [
                "type" => true,
                "evaluation" => $members
            ];
        } else {
            $arr = [
                "type" => false
            ];
        }

        echo json_encode($arr);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function getTheme()
    {
        $res = DB::select("select id,create_at,pic as image,name as themeTitle,`describe` as themeContent,peoplenum as themeNumber from department_theme order By id desc limit 3");
        if ($res) {
            foreach ($res as $val) {
                if ($val->themeNumber == null) {
                    $val->themeNumber = '0';
                }
            }
            $arr = [
                "type" => true,
                "theme" => $res
            ];
        } else {
            $arr = [
                "type" => false
            ];
        }
        // $arr = [
        //     "type" => true,
        //     "theme" => [
        //         ["image" => "/image/qiyun/research/6.png", "themeTitle" => "想练好英语口语吗？来吧，咱们一起用英语对话想练好英语口语吗？", "themeContent" => "有同学问：为什么我学了那么多年英语，但是还是不会说？面对歪果仁只敢说“哈喽”，“骨朵儿白”？来吧，咱们一起用英语对话想练好英语口语吗？来吧，咱们一起用英语对话想练好英语口语吗？", "themeNumber" => "2200"],
        //         ["image" => "/image/qiyun/research/7.png", "themeTitle" => "语言训练：文学稿件播音时停连的方式", "themeContent" => "语言表达训练中，为了让停连的表达方式与文章内容更加贴切，停连的方式是要有所要求的。最惧怕春风的,莫过于积雪了。", "themeNumber" => "456"],
        //         ["image" => "/image/qiyun/research/8.png", "themeTitle" => "【阅读理解】每日一题，考试必过！", "themeContent" => "我的童年春光记忆,是与一个老哑巴联系在一起的。在一个偏僻而又冷寂的小镇,一个有缺陷的生命,他们的名字就像秋日蝴蝶的羽翼一样脆弱,", "themeNumber" => "1213"]
        //     ]
        // ];
        echo json_encode($arr);
    }


    /**
     * 协作组列表页
     */
    public function groupList()
    {
        return view('qiyun/research/groupList');
    }


    /**
     * 教研组列表页数据接口
     */
    public function getGroupList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数
        $sum = DB::table('techresearch')->where('status', 0)->count();  //总记录数
        // 协作组总数
        $groupNum = DB::table('techresearch')
            ->where('status', '0')
            ->count('id');

        // 成员组总数
        $memberNum = DB::table('techresearch as t')
            ->leftJoin('departmenttech as d', 't.id', '=', 'd.parentId')
            ->where(['t.status' => '0', 'd.status' => '1'])
            ->count();
        // 协备总数
        $lessonsubject = DB::table('techresearch as t')
            ->leftJoin('lessonsubject as l', 't.id', '=', 'l.techResearch')
            ->where(['t.status' => '0', 'l.status' => '0'])
            ->count();

        // 协作组列表信息
        $res = DB::table('techresearch')->where('status', 0)->orderBy('id', 'desc')->skip($passNUm)->take($perPageNum)->get();
//        $res = DB::select("select * from techresearch where status = 0 order By id desc limit $passNUm,$perPageNum ");
        if ($res) {
            $arra = array();
            foreach ($res as $key => $val) {
                $member = DB::table('departmenttech as d')
                    ->where('d.parentId', '=', $val->id)
                    ->where('status', '1')
                    ->count();
                $xiebei = DB::table('lessonsubject as ls')
                    ->where('ls.techResearch', '=', $val->id)
                    ->where('status', '0')
                    ->count();
                $arra[] = array('id' => $val->id,
                    "techResearchName" => $val->techResearchName,
                    'author' => DB::table('users')->where('username', $val->author)->first()->realname,
                    'pic' => $val->pic,
                    'member' => $member,
                    'xiebei' => $xiebei,
                    'isOpen' => $val->isOpen
                );
            }
            $arr1 = $arra;
        } else {
            $arr1 = '';
        }
        // 统计数据
        $count = array();
        $count['groupNum'] = $groupNum;
        $count['memberNum'] = $memberNum;
        $count['xiebeiNum'] = $lessonsubject;
        // 教研组列表数据
        $groupList = $arr1;

        $arrs = array('type' => true, 'count' => $count, 'groupList' => $groupList, 'total' => $sum);
        // dd($arrs);
        echo json_encode($arrs);
    }


    // 判断申请人是否是管理员
    public function isManager($id)
    {
        $type = json_decode(file_get_contents('php://input'), true);
        switch ($type) {
            case '1': // 申请加入协作组
                if (Auth::user()) {
                    if (Auth::user()->username == DB::table('techresearch')->where(['id' => $id])->first()->author) { // 是否是创建者
                        echo json_encode(['status' => '2']);
                    } else if (DB::table('departmenttech')->where(['parentId' => $id, 'userId' => Auth::user()->id])->first()) { // 判断是否已经是成员
                        echo json_encode(['status' => '5']);
                    } else if (DB::table('user_message')->where(['resourceId' => $id, 'fromuserId' => Auth::user()->id, 'type' => '1'])->get()) { // 判断是否已经申请加入
                        echo json_encode(['status' => '1']);
                    } else {
                        echo json_encode(['status' => '4']);
                    }
                } else {
                    echo json_encode(['status' => '3']);
                }
                break;
            case '2': // 申请加入协同备课
                if (Auth::user()) {
                    $techResearch = DB::table('lessonsubject')->where('id', $id)->first()->techResearch;
                    if (Auth::user()->username == DB::table('lessonsubject')->where(['id' => $id])->first()->lessonSubjecAuthor) {
                        echo json_encode(['status' => '2']);
                    } else if (DB::table('departmenttech')->where(['parentId' => $techResearch, 'userId' => Auth::user()->id])->first()) {
                        echo json_encode(['status' => '5']);
                    } else if (DB::table('user_message')->where(['resourceId' => $id, 'fromuserId' => Auth::user()->id, 'type' => '1'])->get()) {
                        echo json_encode(['status' => '1']);
                    } else if (Auth::user()->username == DB::table('lessonsubject')->where(['id' => $id])->first()->lessonSubjectCreate) {
                        echo json_encode(['status' => '6']);
                    } else {
                        echo json_encode(['status' => '4']);
                    }
                } else {
                    echo json_encode(['status' => '3']);
                }
                break;
        }

    }

    // 判断是否是成员
    public function isMember()
    {
        $info = json_decode(file_get_contents('php://input'), true);
        if ($info['type'] == '3') {
            if (Auth::user()) {
                $lessonSubjecAuthor = DB::table('lessonsubject')->where('id', $info['id'])->first()->lessonSubjecAuthor;
                $lessonSubjectCreate = DB::table('lessonsubject')->where('id', $info['id'])->first()->lessonSubjectCreate;
                if ((Auth::user()->username == $lessonSubjecAuthor) || (Auth::user()->username == $lessonSubjectCreate)) {
                    echo json_encode(['status' => '1']);
                } else {
                    echo json_encode(['status' => '2']);
                }
            } else {
                echo json_encode(['status' => '3']);
            }
        } else {
            if (Auth::user()) {
                $techResearch = DB::table('lessonsubject')->where('id', $info['id'])->first()->techResearch;
                $lessonSubjecAuthor = DB::table('lessonsubject')->where('id', $info['id'])->first()->lessonSubjecAuthor;
                $lessonSubjectCreate = DB::table('lessonsubject')->where('id', $info['id'])->first()->lessonSubjectCreate;
                if (DB::table('departmenttech')->where(['parentId' => $techResearch, 'userId' => Auth::user()->id])->first() || (Auth::user()->username == $lessonSubjecAuthor) || (Auth::user()->username == $lessonSubjectCreate)) {
                    echo json_encode(['status' => '1']);
                } else {
                    echo json_encode(['status' => '2']);
                }
            } else {
                echo json_encode(['status' => '3']);
            }
        }
    }

    // 申请加入教研协作组接口
    public function applyGroup()
    {
        //获取提交过来的id   （ 成功后 输出true ，失败false）
        $data = json_decode(file_get_contents('php://input'), true);
        $flag = DB::table('techresearch')->where('id', $data['resourceId'])->first()->isOpen;
        if ($flag == '0') {
            $username = DB::table('techresearch')->where('id', $data['resourceId'])->first()->author;
            $userId = DB::table('users')->where('username', $username)->first()->id;
            $data['userId'] = $userId;
            $data['fromuserId'] = Auth::user()->id;
            $data['isOpen'] = '0';
            $data['addTime'] = Carbon::now();
            if (DB::table('user_message')->insertGetId($data)) {
                echo json_encode(['status' => '1']);
            } else {
                echo json_encode(['status' => '2']);
            }
        } elseif ($flag == '1') {
            $info['parentId'] = $data['resourceId'];
            $info['userId'] = Auth::user()->id;
            $info['isManage'] = '0';
            $info['status'] = '1';
            $info['created_at'] = Carbon::now();
            if (DB::table('departmenttech')->insertGetId($info)) {
                $username = DB::table('techresearch')->where('id', $data['resourceId'])->first()->author;
                $userId = DB::table('users')->where('username', $username)->first()->id;
                $data['userId'] = $userId;
                $data['fromuserId'] = Auth::user()->id;
                $data['isOpen'] = '0';
                $data['type'] = '2';
                $data['addTime'] = Carbon::now();
                if (DB::table('user_message')->insertGetId($data)) {
                    echo json_encode(['status' => '3']);
                } else {
                    echo json_encode(['status' => '2']);
                }
            }
        }

    }

    // 申请加入协同备课接口
    public function applyLesson()
    {
        //获取提交过来的id   （ 成功后 输出true ，失败false）
        $data = json_decode(file_get_contents('php://input'), true);
        $username = DB::table('lessonsubject')->where('id', $data['resourceId'])->first()->lessonSubjecAuthor;
        $userId = DB::table('users')->where('username', $username)->first()->id;
        $data['userId'] = $userId;
        $data['fromuserId'] = Auth::user()->id;
        $data['isOpen'] = '0';
        $data['addTime'] = Carbon::now();
        if (DB::table('user_message')->insertGetId($data)) {
            echo json_encode(['status' => '1']);
        } else {
            echo json_encode(['status' => '2']);
        }
    }

    /**
     * 教研组信息页
     */
    public function techGroupInfo()
    {
        if (Auth::user()) {
            if (Auth::user()->type == '1') {
                // return view('qiyun/research/research');
                return view('qiyun/research/techGroupInfo');
            } else {
                return back()->with('checkResearch2', 2); //不是老师
            }
        } else {
            return back()->with('checkResearch2', 1); //未登录
        }
    }


    /**
     * 教研组详细信息数据接口
     */
    public function getTechGroupInfo($id)
    {
        // 协作详细信息
        $info = DB::table('techresearch')
            ->where('id', '=', $id)
            ->get();
        if ($info) {
            $arra = array();
            foreach ($info as $key => $val) {
                // 只保留年月日
                $created_ats = explode(" ", $val->created_at);
                // 统计成员数
                $member = DB::table('departmenttech as d')
                    ->where('d.parentId', '=', $val->id)
                    ->where('d.status', '1')
                    ->count();
                $arra = array('id' => $val->id,
                    "techResearchName" => $val->techResearchName,
                    'author' => $val->author,
                    'pic' => $val->pic,
                    'created_at' => $created_ats[0],
                    'member' => $member,
                    'description' => $val->description
                );
            }
            $techgpinfo = $arra;
            // dd($techgpinfo);
        }

        // 成员列表memberList
        // 通过协作组id取出成员表parentid
        $depparent = DB::table('departmenttech as d')
            ->join('users', 'users.id', '=', 'd.userId')
            ->where('d.parentId', '=', $id)
            ->where('d.status', '1')
            ->get();

        if ($depparent) {
            $arra = array();
            foreach ($depparent as $key => $val) {
                $arra[] = array('id' => $val->id, 'headPic' => $val->pic, 'name' => $val->username);
            }
            $memberList = $arra;
        } else {
            $memberList = '';
        }
        $arrs = array('type' => true, 'techGpInfo' => $techgpinfo, 'memberList' => $memberList);

        echo json_encode($arrs);

    }


    /**
     * 组内活动接口
     */
    public function intraActivity($id)
    {
        $res = DB::table('lessonsubject')->where('techResearch', $id)->select('id', 'pic', 'lessonSubjectName', 'lessonSubjectTarget')->get();
        if ($res) {
            foreach ($res as $val) {
                $arr['subjectActivity'][] = $val;
            }
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }
        echo json_encode($arr);
    }

    /**
     * 共案发布图片页面
     */
    public function publishCommonCase($id)
    {
        return view('qiyun/research/publishCommonCase', ['id' => $id]);
    }

    /**
     * 执行共案发布图片页面
     */
    public function doPublishCommonCase()
    {
        // 获取用户id
        if (Auth::user()) {
            $data['editerName'] = Auth::user()->realname;
            // 获取协同备课id
            $data['parentId'] = $_POST['id'];
            $data['lessonName'] = $_POST['name'];
            $data['descript'] = $_POST['description'];
            $data['resourceUrl'] = $_POST['evaluatPath'];
            $data['created_at'] = date('Y-m-d H:i:s', time());
            $data['type'] = strstr($_POST['evaluatPath'], '.');
            $res = DB::table('lessonsubjects')->insert($data);
            if ($res) {
                return Redirect()->to('/research/lessonDetail/' . $_POST['id']);
            } else {
                return back()->with('status', '2');
            }
        } else {
            return back()->with('status', '3');
        }
    }

    /**
     * 共案下载
     */
    public function doDownloadCommonCase($id)
    {
        if ($path = DB::table('lessonsubjects')->select('resourceUrl')->where('id', $id)->first()) {

            $filename = realpath(base_path('public')) . $path->resourceUrl;
            return response()->download($filename);
        }
    }

    /**
     * 协同备课发布图片页面
     */
    public function publishPic($id)
    {
        return view('qiyun/research/publishPic');
    }

    /**
     * 协同备课添加图片
     */
    public function insertPic($id)
    {
        // 获取用户id
        if (Auth::user()) {
            $data['userId'] = Auth::user()->id;
            $data['lessonId'] = $id;
            $data['create_at'] = Carbon::now();    // 时间
            $data['update_at'] = Carbon::now();    // 时间
            // 上传多图图片
            if ($_FILES['file']['error'] == '0') {

                $entension = explode('/', $_FILES['file']['type']);
                $entension = strtolower(array_pop($entension));

                // 设置上传音视频的所有格式
                $allowed_types = array('jpg', 'png', 'gif', 'jpeg');
                if (!in_array($entension, $allowed_types)) {
                    echo "请上传图片格式";
                    exit;
                } else {
                    $newname = date('YmdHis', time()) . mt_rand(0000, 9999) . '.' . $entension;//拼接新的图片名
                    $path = './image/qiyun/research/publishPic/';
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $path . $newname)) {
                        $data['imgurl'] = ltrim($path, '.') . $newname;
                    }
                }
            }
            $res = DB::table('lessonsubject_image')->insert($data);
            if ($res) {
                echo json_encode(['status' => '1']);
            } else {
                echo json_encode(['status' => '2']);
            }
        } else {
            echo json_encode(['status' => '3']);
        }
    }


    /**
     * 协同备课发布音视频页面
     */
    public function publishAudio($id)
    {
        return view('qiyun/research/publishAudio');
    }

    /**
     * 协同备课添加音视频
     */
    public function insertAudio()
    {
        $info = json_decode(file_get_contents('php://input'), true);
        // 获取用户id
        if (Auth::user()) {
            $data['userId'] = Auth::user()->id;
            // 获取协同备课id
            $data['lessonId'] = $info['id'];
            $data['name'] = $info['name'];
            $data['describes'] = $info['description'];
            $data['url'] = $info['evaluatPath'];
            $data['create_at'] = Carbon::now();
            $data['update_at'] = Carbon::now();
            $res = DB::table('lessonsubject_video')->insert($data);
            if ($res) {
                echo json_encode(['status' => '1']);
            } else {
                echo json_encode(['status' => '2']);
            }
        } else {
            echo json_encode(['status' => '3']);
        }
    }


    /**
     * 协同备课发布资源页面
     */
    public function publishResource($id)
    {
        return view('qiyun/research/publishResource');
    }

    /**
     * 协同备课添加资源
     */
    public function insertResource()
    {
        $info = json_decode(file_get_contents('php://input'), true);
        // 获取用户id
        if (Auth::user()) {
            $data['userid'] = Auth::user()->id;
            $data['lessonId'] = $info['id'];                   // 主表id
            $data['name'] = $info['name'];                     // 名称
            $data['describes'] = $info['description'];          // 描述
            $data['create_at'] = Carbon::now();    // 时间
            $data['update_at'] = Carbon::now();    // 时间
            $data['resourceurl'] = $info['evaluatPath'];
            $res = DB::table('lessonsubject_resource')->insert($data);
            if ($res) {
                echo json_encode(['status' => '1']);
            } else {
                echo json_encode(['status' => '2']);
            }
        } else {
            echo json_encode(['status' => '3']);
        }
    }


    /**
     * 协同备课发表话题
     */
    public function insertTopic()
    {
        // 获取用户id
        if (Auth::user()) {
            $data = json_decode(file_get_contents('php://input'), true);
            $data['userid'] = Auth::user()->id;
            $data['create_at'] = Carbon::now();    // 时间
            $data['update_at'] = Carbon::now();    // 时间
            $res = DB::table('lessonsubject_topic')->insert($data);
            if ($res) {
                echo json_encode(['status' => '1']);
            } else {
                echo json_encode(['status' => '2']);
            }
        } else {
            echo json_encode(['status' => '3']);
        }
    }


    /**
     * 教研评课列表页
     */
    public function evaluationList()
    {
        return view('qiyun/research/evaluationList');
    }

    /**
     * 教研评课列表页数据接口
     */
    public function getEvaluationList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数
        $sum = DB::table('evaluat')->where('status', '0')->count();  //总记录数
        $data = DB::table('evaluat as e')
            ->leftJoin('evaluatType as t', 'e.evaluatType', '=', 't.id')
            ->leftJoin('users as u', 'u.username', '=', 'e.evaluatAuthor')
            ->select('e.id', 'e.evaluatName', 't.evaluatTypeName', 'u.realname', 'e.beginTime', 'e.endTime', 'e.evaluatPic')
            ->where('e.status', '0')
            ->orderBy('e.id', 'desc')
            ->skip($passNUm)
            ->take($perPageNum)
            ->get();
        $arr = [];
        if ($data) {
            foreach ($data as $val) {
                $begin = explode(" ", $val->beginTime);
                $end = explode(" ", $val->endTime);
                //取每一个评课对应的分数值
                $result = DB::table('evaluaResult')->where('evaluatId', $val->id)->get();
                if ($result) {
                    $score = null;
                    foreach ($result as $item) {
                        $score += $item->score;
                        $nums = $item->nums;
                    }
                    $arr['evaluation'][] = ['id' => $val->id, 'evaluationName' => $val->evaluatName, 'typeName' => $val->evaluatTypeName, 'teacherName' => $val->realname, 'start_time' => $begin[0], 'end_time' => $end[0], 'pic' => $val->evaluatPic, 'score' => round($score / $nums, 1), 'nums' => $nums];
                } else {
                    $arr['evaluation'][] = ['id' => $val->id, 'evaluationName' => $val->evaluatName, 'typeName' => $val->evaluatTypeName, 'teacherName' => $val->realname, 'start_time' => $begin[0], 'end_time' => $end[0], 'pic' => $val->evaluatPic, 'score' => '100', 'nums' => '0'];
                }
            }
            $arr['total'] = $sum;
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }

        echo json_encode($arr);
    }

    /**
     * 教研评课详细信息页
     */
    public function evaluationInfo()
    {
        if (Auth::user()) {
            if (Auth::user()->type == '1') {
                return view('qiyun/research/evaluationInfo');
            } else {
                return back()->with('checkResearch2', 2); //不是老师
            }
        } else {
            return back()->with('checkResearch2', 1); //未登录
        }
    }

    /**
     * 教研评课详细信息数据接口
     */
    public function getEvaluationInfo($id)
    {
        DB::table('evaluat')->where('id', $id)->increment('evaluatView', 1);
        $arr = [];
        //评课详情
        $data = DB::table('evaluat as e')
            ->leftJoin('evaluatType as t', 'e.evaluatType', '=', 't.id')
            ->leftJoin('users as u', 'u.username', '=', 'e.evaluatAuthor')
            ->leftJoin('studysection as sec', 'e.evaluatSection', '=', 'sec.id')
            ->leftJoin('studysubject as sub', 'e.evaluatSubject', '=', 'sub.id')
            ->leftJoin('studyedition as edi', 'e.evaluatEdition', '=', 'edi.id')
            ->leftJoin('studygrade as gra', 'e.evaluatGrade', '=', 'gra.id')
            ->leftJoin('chapter as cha', 'e.evaluatChapter', '=', 'cha.id')
            ->select('e.id', 'e.evaluatName', 'e.created_at', 'e.beginTime', 'e.evaluatDirection', 'e.endTime', 'e.evaluatTmpId', 't.evaluatTypeName', 'u.realname', 'u.pic', 'sec.sectionName', 'sub.subjectName', 'edi.editionName', 'gra.gradeName', 'cha.chapterName')
            ->where('e.id', $id)
            ->first();

        $arr['evaluationInfo'] = [
            'id' => $id,
            'evaluationName' => $data->evaluatName,
            'teacherName' => $data->realname,
            'teacherPic' => $data->pic,
            'lessonName' => $data->sectionName . $data->subjectName . $data->editionName . $data->gradeName . '/' . $data->chapterName,
            'typeName' => $data->evaluatTypeName,
            'techTime' => explode(" ", $data->created_at)[0],
            'start_time' => explode(" ", $data->beginTime)[0],
            'end_time' => explode(" ", $data->endTime)[0],
            'evaluatTmpId' => $data->evaluatTmpId,
            'mainDirection' => $data->evaluatDirection,
        ];
//        dd($arr);
        //教案/课件列表
        $res = DB::table('evaluaCourseware')->where('parentId', $id)->orderBy('created_at', 'desc')->limit(3)->get();
        if ($res) {
            $arr['state']['resource'] = true;
            foreach ($res as $val) {
                if ($val->evaluatFomat == 'mp4') {
                    $arr['resource'][] = [
                        'id' => $val->id, 'resourceName' => $val->evaluatCourseName . '.' . $val->evaluatFomat, 'resourceSize' => $val->evaluatSize . 'k', 'uploadTime' => $val->created_at, 'evaluatPath' => $val->evaluatPath, 'pic' => '/image/qiyun/research/evaluationInfo/5.png'
                    ];
                } else if ($val->evaluatFomat == 'pdf') {
                    $arr['resource'][] = [
                        'id' => $val->id, 'resourceName' => $val->evaluatCourseName . '.' . $val->evaluatFomat, 'resourceSize' => $val->evaluatSize . 'k', 'uploadTime' => $val->created_at, 'evaluatPath' => $val->evaluatPath, 'pic' => '/image/qiyun/research/evaluationInfo/10.png'
                    ];
                } else if ($val->evaluatFomat == 'word') {
                    $arr['resource'][] = [
                        'id' => $val->id, 'resourceName' => $val->evaluatCourseName . '.' . $val->evaluatFomat, 'resourceSize' => $val->evaluatSize . 'k', 'uploadTime' => $val->created_at, 'evaluatPath' => $val->evaluatPath, 'pic' => '/image/qiyun/research/evaluationInfo/7.png'
                    ];
                } else {
                    $arr['resource'][] = [
                        'id' => $val->id, 'resourceName' => $val->evaluatCourseName . '.' . $val->evaluatFomat, 'resourceSize' => $val->evaluatSize . 'k', 'uploadTime' => $val->created_at, 'evaluatPath' => $val->evaluatPath, 'pic' => '/image/qiyun/research/evaluationInfo/7.png'
                    ];
                }
            }
        } else {
            $arr['state']['resource'] = false;
        }

        //关键点评
        $info = json_decode(file_get_contents('php://input'), true);
        $nowPage = $info['pageIndex'];                         //当前页码
        $perPageNum = $info['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数
        $sum = DB::table('evaluatComment')->where(['evaluatId' => $id, 'checks' => '0'])->count();  //总记录数
        $message = DB::table('evaluatComment as com')
            ->leftJoin('users as u', 'com.username', '=', 'u.username')
            ->select('com.id', 'u.realname', 'u.pic', 'com.commentContent', 'com.created_at')
            ->where(['com.evaluatId' => $id, 'com.checks' => '0'])
            ->orderBy('com.created_at', 'desc')
            ->skip($passNUm)
            ->take($perPageNum)
            ->get();
        if ($message) {
            $arr['state']['comment'] = true;
            $arr['total'] = $sum;
            foreach ($message as $val) {
                if ($val->commentContent != '') {
                    $arr['comment'][] = [
                        'commentPerson' => $val->realname, 'commentPic' => $val->pic, 'content' => $val->commentContent, 'commentTime' => $val->created_at
                    ];
                }

            }
        } else {
            $arr['state']['comment'] = false;
        }
        echo json_encode($arr);
    }

    //  获取评分页相关信息
    public function getMarkInfo($id)
    {
        $arr = [];
        //评课详情
        $data = DB::table('evaluat as e')
            ->leftJoin('evaluatType as t', 'e.evaluatType', '=', 't.id')
            ->leftJoin('users as u', 'u.username', '=', 'e.evaluatAuthor')
            ->leftJoin('studysection as sec', 'e.evaluatSection', '=', 'sec.id')
            ->leftJoin('studysubject as sub', 'e.evaluatSubject', '=', 'sub.id')
            ->leftJoin('studyedition as edi', 'e.evaluatEdition', '=', 'edi.id')
            ->leftJoin('studygrade as gra', 'e.evaluatGrade', '=', 'gra.id')
            ->leftJoin('chapter as cha', 'e.evaluatChapter', '=', 'cha.id')
            ->select('e.id', 'e.evaluatName', 'e.created_at', 'e.beginTime', 'e.evaluatDirection', 'e.endTime', 'e.evaluatTmpId', 't.evaluatTypeName', 'u.realname', 'u.pic', 'sec.sectionName', 'sub.subjectName', 'edi.editionName', 'gra.gradeName', 'cha.chapterName')
            ->where('e.id', $id)
            ->first();

        $arr['evaluationInfo'] = [
            'id' => $id,
            'evaluationName' => $data->evaluatName,
            'teacherName' => $data->realname,
            'teacherPic' => $data->pic,
            'lessonName' => $data->sectionName . $data->subjectName . $data->editionName . $data->gradeName . '/' . $data->chapterName,
            'typeName' => $data->evaluatTypeName,
            'techTime' => explode(" ", $data->created_at)[0],
            'start_time' => explode(" ", $data->beginTime)[0],
            'end_time' => explode(" ", $data->endTime)[0],
            'evaluatTmpId' => $data->evaluatTmpId,
            'mainDirection' => $data->evaluatDirection,
        ];
        echo json_encode($arr);
    }

    /**
     * 评课详情(添加评论)
     */
    public function addEvaluatComment(Request $request)
    {

        if (Auth::user()) {
            $input = $request->except('_token');
            $input['username'] = Auth::user()->username;
            $input['created_at'] = Carbon::now();
            $input['checks'] = '0';
            $rec = DB::table('evaluatComment')->insertGetId($input);
            if ($rec) {
                return back()->with('status', '1');
            } else {
                return back()->with('status', '2');
            }
        } else {
            return back()->with('status', '3');
        }

    }

    /**
     * 添加教研评课页
     */
    public function addEvaluation()
    {
        return view('qiyun/research/addEvaluation');
    }


    /**
     * 添加教研评课信息接口
     */
    public function insertEvaluation(Request $request)
    {
        $input = $request->except('lessonTime');//得到过滤lessonTime字段后的数组
        //判断主备人是自己，还是别人
        if (isset(Auth::user()->id)) {
            if ($input['evaluatAuthor'] == 'a') {
                $input['evaluatAuthor'] = Auth::user()->username;
            } else {
                $id = $request->evaluatAuthor;
                $input['evaluatAuthor'] = DB::table('users')->select('username')->where('id', $id)->first()->username;
            }
            $input['evaluatCreate'] = Auth::user()->username;
            $input['created_at'] = Carbon::now();
            $input['updated_at'] = Carbon::now();
            $input['status'] = '0';
            if ($input['isOpen'] !== '0') {
                $usersId = explode(',', rtrim($input['isOpen'], ','));
                $input['isOpen'] = '1';
            } else {
                $input['isOpen'] = '0';
            }
            $res = DB::table('evaluat')->insertGetId($input);
            if ($res) {
                if (isset($usersId)) {
                    foreach ($usersId as $val) {
                        // 这里只是将邀请的信息给教师发送过去，当被邀请的人同意后，方可进行评分
                        // DB::table('evaluatMember')->insert(['parentId' => $res, 'userId' => $val, 'isManage' => '0', 'status' => '0', 'created_at' => Carbon::now()]);
                        DB::table('user_message')->insertGetId(['fromuserId' => $id, 'resourceId' => $res, 'userId' => $val, 'messageTitle' => '邀请你参与', 'resourceType' => 3, 'type' => 7, 'isOpen' => 0, 'addTime' => Carbon::now()]);
                    }
                }
                $sysMsg = DB::table('system_message')->insertGetId(['resourceId' => $res, 'userId' => Auth::user()->id, 'messageTitle' => '共同提升，切磋水平', 'resourceType' => 3, 'type' => 0, 'url' => "/research/evaluationInfo/{$res}", 'isOpen' => 0, 'addTime' => time(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                $userMsg = DB::table('user_message')->insertGetId(['resourceId' => $res, 'userId' => Auth::user()->id, 'messageTitle' => '成功发起', 'resourceType' => 3, 'type' => 0, 'isOpen' => 0, 'addTime' => Carbon::now()]);
                if ($sysMsg && $userMsg) {
                    echo json_encode(['status' => '1', 'msg' => $res]);
                }
            } else {
                echo json_encode(['status' => '2', 'msg' => '发起失败！']);
            }
        } else {
            echo json_encode(['status' => '3', 'msg' => '请先登录！']);
        }
    }

    //  各项平均分接口
    public function avgContent($id)
    {
        //  判断是否已经有过评分
        $data = DB::table('evaluaResult')->where('evaluatId', $id)->get();
        if ($data) {// 有则查找该评课的评分表
            $data = DB::table('evaluaResult as res')
                ->join('evaluatTmpContent as con', 'res.evaluatIdTmpContentId', '=', 'con.id')
                ->select('res.evaluatIdTmpContentId', 'res.score', 'res.nums', 'con.evaluatTmpContentName')
                ->where('res.evaluatId', $id)
                ->where('con.status', 0)
                ->get();
            $total = 0;
            foreach ($data as $val) {
                $total += $val->score / $val->nums;
                $nums = $val->nums;
                $arr[] = [
                    'id' => $val->evaluatIdTmpContentId,
                    'evaluatTmpContentName' => $val->evaluatTmpContentName,
                    'score' => round(($val->score / $val->nums) / (100 / count($data)) * 100, 2) . "%"
                ];
            }
            $res['content'] = $arr;
            $res['status'] = true;
            $res['total'] = round($total, 1);
            $res['nums'] = $nums;
        } else { // 没有则查此评课使用的模板的模板内容
            $data = DB::table('evaluat as eva')
                ->join('evaluaTemp as tem', 'tem.id', '=', 'eva.evaluatTmpId')
                ->join('evaluatTmpContent as con', 'eva.evaluatTmpId', '=', 'con.parentId')
                ->select('con.evaluatTmpContentName')
                ->where('eva.id', $id)
                ->where('con.status', 0)
                ->get();
            foreach ($data as $val) {
                $arr[] = [
                    'evaluatTmpContentName' => $val->evaluatTmpContentName,
                    'score' => round((100 / count($data)) / (100 / count($data)) * 100, 2) . "%"
                ];
            }
            $res['content'] = $arr;
            $res['status'] = true;
            $res['total'] = '100';
            $res['nums'] = '0';
        }
        echo json_encode($res);
    }

    //  评课详情我要评分页面---模板内容接口
    public function tmpContent($id)
    {
        $data = DB::table('evaluat as eva')
            ->join('evaluaTemp as tem', 'tem.id', '=', 'eva.evaluatTmpId')
            ->join('evaluatTmpContent as con', 'eva.evaluatTmpId', '=', 'con.parentId')
            ->select('con.id', 'con.evaluatTmpContentName')
            ->where('eva.id', $id)
            ->where('con.status', 0)
            ->get();
        $arr = [];
        if ($data) {
            foreach ($data as $val) {
                $arr[] = ['id' => $val->id, 'evaluatTmpContentName' => $val->evaluatTmpContentName];
            }
            $res['content'] = $arr;
            $res['status'] = true;
            $data = DB::table('evaluaResult')->where('evaluatId', $id)->get();
            if ($data) {
                $score = 0;
                foreach ($data as $val) {
                    $score += $val->score;
                    $nums = $val->nums;
                }
                $total = $score / $nums;
                $res['total'] = round($total, 1);
            } else {
                $res['total'] = '100';
            }
        } else {
            $res['status'] = false;
        }
        echo json_encode($res);
    }

    /**
     * 评课详情我要评分页面
     */
    public function mark($id)
    {
        return view('qiyun/research/mark');
    }

    // 判断评分的次数
    public function iMark()
    {
        if (Auth::user()) { // 登录
            $evaluatId = json_decode(file_get_contents('php://input'), true);
            $flag = DB::table('evaluat')->where('id', $evaluatId)->first()->isOpen;
            $evaluatAuthor = DB::table('evaluat')->where('id', $evaluatId)->first()->evaluatAuthor;
            if ($evaluatAuthor == Auth::user()->username) { // 登录为主备人
                echo json_encode(['status' => '6']);
            } else {
                if ($flag == '0') { // 公开评课
                    $res = DB::table('evaluaResult')->where('evaluatId', $evaluatId)->first();
                    if ($res) {
                        $users = explode(',', $res->userId);
                        if (in_array(Auth::user()->id, $users)) {
                            echo json_encode(['status' => '1']); // 已评论
                        } else {
                            echo json_encode(['status' => '3']); // 可参与评分
                        }
                    } else {
                        echo json_encode(['status' => '3']); // 可参与评分
                    }
                } elseif ($flag == '1') { // 邀请评课
                    if (DB::table('evaluat')->where('id', $evaluatId)->first()->evaluatCreate == Auth::user()->username) {
                        $res = DB::table('evaluaResult')->where('evaluatId', $evaluatId)->first();
                        if ($res) {
                            $users = explode(',', $res->userId);
                            if (in_array(Auth::user()->id, $users)) {
                                echo json_encode(['status' => '1']); // 已评论
                            } else {
                                echo json_encode(['status' => '3']); // 可参与评分
                            }
                        } else {
                            echo json_encode(['status' => '3']); // 可参与评分
                        }

                    } else {
                        if (DB::table('user_message')->where(['resourceId' => $evaluatId, 'userId' => Auth::user()->id, 'resourceType' => '3'])->first()) {
                            if (DB::table('evaluatMember')->where(['parentId' => $evaluatId, 'userId' => Auth::user()->id])->first()) {
                                $res = DB::table('evaluaResult')->where('evaluatId', $evaluatId)->first();
                                if ($res) {
                                    $users = explode(',', $res->userId);
                                    if (in_array(Auth::user()->id, $users)) {
                                        echo json_encode(['status' => '1']); // 已评论
                                    } else {
                                        echo json_encode(['status' => '3']); // 可参与评分
                                    }
                                } else {
                                    echo json_encode(['status' => '3']); // 可参与评分
                                }
                            } else {
                                echo json_encode(['status' => '5', 'userId' => Auth::user()->id]);  // 未接受邀请
                            }
                        } else {
                            echo json_encode(['status' => '4']);  // 没有被邀请
                        }
                    }
                }
            }

        } else {
            echo json_encode(['status' => '2']); // 未登录
        }
    }

    /**
     * 评分添加接口
     */
    public function addMark(Request $request)
    {
        //判断用户是否登录
        if (Auth::user()) {
            $input = $request->except('_token', 'evaluatId');
            // 判断是否是第一次评分！
            $res = DB::table('evaluaResult')->where('evaluatId', $_POST['evaluatId'])->first();
            if (!$res) { // 第一次评分就在evaluaResult表中执行插入操作
                //拆分request过来的数据，分别向评课评论和打分结果表
                //$arr = [];
                for ($i = 0; $i < count($input); $i++) {
                    if (is_numeric(key($input))) {
                        $arr[] = [
                            'evaluatId' => $_POST['evaluatId'],
                            'evaluatIdTmpContentId' => key($input),
                            'score' => current($input),
                            'nums' => '1',
                            'userId' => Auth::user()->id,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ];
                    }
                    next($input);
                }
                $resu = DB::table('evaluaResult')->insert($arr);
            } else { // 不是第一次则执行更新操作
                array_pop($input);
                foreach ($input as $key => $val) {
                    $val = round($val, 1);
                    $userId = $res->userId . ',' . Auth::user()->id;
                    $resu = DB::update("update evaluaResult set score = score + $val,nums = nums + 1,userId = \"$userId\" where evaluatId = {$_POST['evaluatId']} and evaluatIdTmpContentId = $key");
                }
            }
            //组装插入评论表的数据
            if (!empty($_POST['commentContent'])) {
                $username = DB::table('users')->where('id', Auth::user()->id)->first()->username;
                $data = ['evaluatId' => $_POST['evaluatId'], 'commentContent' => $_POST['commentContent'], 'username' => $username, 'created_at' => Carbon::now(), 'checks' => '0'];
                $rec = DB::table('evaluatComment')->insert($data);
            } else {
                $rec = true;
            }
            if ($resu && $rec) {
                return Redirect()->to('/research/evaluationInfo/' . $_POST['evaluatId']);
            } else {
                return back()->with('status', '2');
            }
        } else {
            return back()->with('status', '3');
        }

    }

    // 判断是否是创建者或授课人
    public function isAuthor($id)
    {
        if (Auth::user()) {
            $evaluatAuthor = DB::table('evaluat')->where('id', $id)->first()->evaluatAuthor;
            $evaluatCreate = DB::table('evaluat')->where('id', $id)->first()->evaluatCreate;
            if ((Auth::user()->username != $evaluatAuthor) && (Auth::user()->username != $evaluatCreate)) {
                echo json_encode(['status' => '1']);
            } else {
                echo json_encode(['status' => '2']);
            }
        } else {
            echo json_encode(['status' => '3']);
        }
    }

    // 判断是否是创建者或授课人
    public function isGroupAuthor()
    {
        $id = json_decode(file_get_contents('php://input'), true);
        if (Auth::user()) {
            $author = DB::table('techresearch')->where('id', $id)->first()->author;
            if ($author == Auth::user()->username) {
                echo json_encode(['status' => '1']);
            } else {
                echo json_encode(['status' => '2']);
            }
        } else {
            echo json_encode(['status' => '3']);
        }
    }

    /**
     * 上传课件页面
     */
    public function uploadCourse($id)
    {
        return view('qiyun/research/uploadCourse');
    }

    /**
     * 插入课件操作
     */
    public function insertCourse()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (Auth::user()) {
            $ext = explode('.', $data['evaluatPath']);
            $size = filesize('.' . $data['evaluatPath']);
            //将获取到的信息插入到数据库
            $arr = [];
            $arr['parentId'] = $data['id'];
            $arr['evaluatCourseName'] = $data['name'];
            $arr['evaluatPath'] = $data['evaluatPath'];
            $arr['evaluatFomat'] = $ext[1];
            $arr['evaluatSize'] = round($size / 1024);
            $arr['created_at'] = Carbon::now();
            $rec = DB::table('evaluaCourseware')->insertGetId($arr);
            if ($rec) {
                echo json_encode(['status' => '1']);
            } else {
                echo json_encode(['status' => '2']);
            }
        } else {
            echo json_encode(['status' => '3']);
        }

    }

    /**
     * 选择评课自备人页面（按区查询）
     */
    public function conditionCounty()
    {
        //选择自备人(按区查询)
        $data = DB::table('county')->select('id', 'county_name')->where('status', 1)->get();
        $arr = [];
        if ($data) {
            foreach ($data as $val) {
                $arr[] = ['id' => $val->id, 'county_name' => $val->county_name];
            }
        }
        echo json_encode($arr);
    }

    /**
     * 选择评课自备人页面（按学校查询）
     */
    public function conditionSchool($id)
    {
        //选择自备人(按学校查询)
        $data = DB::table('school')->select('id', 'schoolName')->where(['status' => 1, 'countryId' => $id])->where('countryId', '<>', 0)->get();
        $arr = [];
        if ($data) {
            foreach ($data as $val) {
                $arr[] = ['id' => $val->id, 'schoolName' => $val->schoolName];
            }
        }
        echo json_encode($arr);
    }

    /**
     * 选择评课自备人页面（按学科查询）
     */
    public function conditionSubject($id)
    {
        //获取学校的id,查询对应的学科内容
        $data = DB::table('schoolsubject')
            ->join('schoolgrade', 'schoolgrade.id', '=', 'schoolsubject.parentId')
            ->select('schoolsubject.id', 'schoolsubject.subjectName', 'schoolgrade.gradeName')
            ->where(['schoolgrade.parentId' => $id, 'schoolsubject.status' => 1])
            ->get();
        $arr = [];
        if ($data) {
            foreach ($data as $val) {
                $arr[] = ['id' => $val->id, 'subjectName' => $val->gradeName . $val->subjectName];
            }
        }
        echo json_encode($arr);
    }

    /**
     * 选择评课自备人页面（按条件查询）
     */

    public function conditionSelect()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $type = $data['type'];
        $arr = [];
        switch ($type) {
            case 1:
                $countyId = $data['countyId'];
                $data = DB::table('users')->select('id', 'realname', 'username')->where('countyId', $countyId)->where('type', 1)->get();
                if ($data) {
                    foreach ($data as $val) {
                        $arr[] = ['id' => $val->id, 'realname' => $val->realname, 'username' => $val->username];
                    }
                    echo json_encode(['status' => true, 'msg' => $arr]);
                }
                break;
            case 2:
                $countyId = $data['countyId'];
                $schoolId = $data['schoolId'];
                $data = DB::table('users')->select('id', 'realname', 'username')->where(['schoolId' => $schoolId, 'type' => 1, 'countyId' => $countyId])->get();
                if ($data) {
                    foreach ($data as $val) {
                        $arr[] = ['id' => $val->id, 'realname' => $val->realname, 'username' => $val->username];
                    }
                    echo json_encode(['status' => true, 'msg' => $arr]);
                }
                break;
            case 3:
                $countyId = $data['countyId'];
                $schoolId = $data['schoolId'];
                $subjectId = $data['subjectId'];
                $data = DB::table('users')->select('id', 'realname', 'username')->where(['type' => 1, 'countyId' => $countyId, 'schoolId' => $schoolId, 'subjectId' => $subjectId])->get();
                if ($data) {
                    foreach ($data as $item) {
                        $arr[] = ['id' => $item->id, 'realname' => $item->realname, 'username' => $item->username];
                    }
                    echo json_encode(['status' => true, 'msg' => $arr]);
                }
                break;
            default:
                echo json_encode(['status' => false]);
        }

    }

    /**
     * 选择评课自备人页面（精确查询）
     */
    public function selectMainMan()
    {
        //选择自备人  （精确查询结果Ajax返回）
        $username = json_decode(file_get_contents('php://input'), true);
        $data = DB::table('users')->select('id', 'username', 'realname')->where('type', 1)->where('username', 'like', '%' . $username['username'] . '%')->get();
        $arr = [];
        if ($data) {
            foreach ($data as $val) {
                $arr[] = ['id' => $val->id, 'username' => $val->username, 'realname' => $val->realname];
            }
//            dd($arr);
            return response()->json(
                [
                    'status' => true,
                    'msg' => $arr
                ]
            );

        } else {
            return response()->json(
                [
                    'status' => false
                ]
            );
        }
    }

    /**
     * 协作组查询（精确查询）
     */
    public function selectGroup()
    {
        //选择协作组  （精确查询结果Ajax返回）
        $group = json_decode(file_get_contents('php://input'), true);
        $data = DB::table('techresearch')->select('id', 'techResearchName')->where('status', 0)->where('techResearchName', 'like', '%' . $group['groupName'] . '%')->get();
        $arr = [];
        if ($data) {
            foreach ($data as $val) {
                $arr[] = ['id' => $val->id, 'groupName' => $val->techResearchName];
            }
            return response()->json(
                [
                    'status' => true,
                    'info' => $arr
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => false
                ]
            );
        }
    }

    //  添加协同备课
    public function insertLessonSubject()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        //判断主备人是自己，还是别人
        if (isset(Auth::user()->id)) {
            if ($data['lessonSubjecAuthor'] == 'a') {
                $data['lessonSubjecAuthor'] = Auth::user()->username;
            } else {
                $id = $data['lessonSubjecAuthor'];
                $data['lessonSubjecAuthor'] = DB::table('users')->select('username')->where('id', $id)->first()->username;
            }
            $data['lessonSubjectCreate'] = Auth::user()->username;
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            $data['status'] = '0';
            $data['lessonView'] = '0';
            $res = DB::table('lessonsubject')->insertGetId($data);
            if ($res) {
                $sysMsg = DB::table('system_message')->insertGetId(['resourceId' => $res, 'userId' => Auth::user()->id, 'messageTitle' => '共同提升，切磋水平', 'resourceType' => 2, 'type' => 0, 'url' => "/research/lessonDetail/{$res}", 'isOpen' => 0, 'addTime' => time(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                $userMsg = DB::table('user_message')->insertGetId(['resourceId' => $res, 'userId' => Auth::user()->id, 'messageTitle' => '成功发起', 'resourceType' => 2, 'type' => 0, 'isOpen' => 0, 'addTime' => Carbon::now()]);
                if ($sysMsg && $userMsg) {
                    echo json_encode(['status' => '1', 'msg' => $res]);
                }
            } else {
                echo json_encode(['status' => '2', 'msg' => '发起失败！']);
            }
        } else {
            echo json_encode(['status' => '3', 'msg' => '请先登录！']);
        }
    }

    //  添加自定义模板名称
    public function insertTplName()
    {
        if (Auth::user()) {
            $data = json_decode(file_get_contents('php://input'), true);
            if (DB::table('evaluaTemp')->where(['evaluatTmpName' => $data['evaluatTmpName'], 'evaluatTmpUsername' => Auth::user()->username])->get()) {
                echo json_encode(['status' => '4']);
            } else {
                $data['evaluatTmpUsername'] = Auth::user()->username;
                $data['evaluatTmpState'] = '1';
                $data['created_at'] = Carbon::now();
                $data['updated_at'] = Carbon::now();
                $res = DB::table('evaluaTemp')->insertGetId($data);
                if ($res) {
                    echo json_encode(['status' => '1', 'id' => $res]);
                } else {
                    echo json_encode(['status' => '2']);
                }
            }
        } else {
            echo json_encode(['status' => '3']);
        }

    }

    //  获取自定义模板名称
    public function getTplName()
    {
        $evaluatTmpUsername = DB::table('users')->where('id', Auth::user()->id)->first()->username;
        $data = DB::table('evaluaTemp')->where('evaluatTmpUsername', $evaluatTmpUsername)->get();
        if ($data) {
            foreach ($data as $val) {
                $arr[] = ['id' => $val->id, 'evaluatTmpName' => $val->evaluatTmpName];
            }
            $res = ['arr' => $arr, 'status' => true];
        } else {
            $res = ['status' => false];
        }
        echo json_encode($res);
    }

    //  删除自定义模板
    public function delTplName($id)
    {
        $res = DB::table('evaluaTemp')->delete($id);
        if ($res) {
            $result = DB::table('evaluatTmpContent')->where('parentId', $id)->first();
            if ($result) {
                $resu = DB::table('evaluatTmpContent')->where('parentId', $id)->delete();
                if ($resu) {
                    echo json_encode(['status' => true]);
                } else {
                    echo json_encode(['status' => false]);
                }
            } else {
                echo json_encode(['status' => true]);
            }
        }
    }

    //  获取自定义模板内容项的条数
    public function getCountTpl($id)
    {
        $res = DB::table('evaluatTmpContent')->where('parentId', $id)->count();
        echo json_encode(['count' => $res]);
    }

    //  添加自定义模板内容
    public function insertMyTpl($id)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $data['parentId'] = $id;
        $data['status'] = '0';
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        $res = DB::table('evaluatTmpContent')->insertGetId($data);
        if ($res) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    //  获取自定义模板评分内容项
    public function getTplContent($id)
    {

        $data = DB::table('evaluatTmpContent')->where('parentId', $id)->get();
        if ($data) {
            foreach ($data as $val) {
                $arr[] = ['id' => $val->id, 'evaluatTmpContentName' => $val->evaluatTmpContentName];
            }
            $name = DB::table('evaluaTemp')->where('id', $id)->first();
            $res = ['content' => $arr, 'name' => $name, 'status' => true];
        } else {
            $name = DB::table('evaluaTemp')->where('id', $id)->first();
            $res = ['status' => false, 'name' => $name];
        }
        echo json_encode($res);
    }

    //  删除自定义模板评分内容项
    public function delTplContent($id)
    {
        $tplId = json_decode(file_get_contents('php://input'), true);
        $res = DB::table('evaluatTmpContent')->where('id', $id)->delete();
        if ($res) {
            if (DB::table('evaluaResult')->where('evaluatIdTmpContentId', $id)->delete()) {
                $num = DB::table('evaluaResult')->where('evaluatId', $tplId)->count();
                $newData['score'] = 100 / $num;
                DB::table('evaluaResult')->where('evaluatId', $tplId)->update(['score' => $newData['score']]);
            }
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    //  修改自定义模板评分内容项
    public function editTplContent($id)
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $res = DB::table('evaluatTmpContent')->where('id', $id)->update($arr);
        if ($res) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }


    //获取资源类型选项接口
    public function getEvaluatType()
    {
        $evaluattype = DB::select('select id,evaluatTypeName from evaluatType where status = 0');
        echo json_encode($evaluattype);
    }

    //获取资源学段选项
    public function getStudySection()
    {
        $studysection = DB::select('select id,sectionName from studysection where parentId = 1');
        echo json_encode($studysection);
    }

    //获取资源学课选项
    public function getStudySubject($id)
    {
        $studysubject = DB::select('select id,subjectName from studysubject where parentId = ?', [$id]);
        echo json_encode($studysubject);
    }

    //获取资源版本选项
    public function getStudyEdition($id)
    {
        $studyedition = DB::select('select id,editionName from studyedition where parentId = ?', [$id]);
        echo json_encode($studyedition);
    }

    //获取资源册别选项
    public function getStudyGrade($id)
    {
        $studygrade = DB::select('select id,gradeName from studygrade where parentId = ?', [$id]);
        echo json_encode($studygrade);
    }

    //获取资源教材目录选项
    public function getStudyChapter($id)
    {
        $studychapter = DB::select("select id,chapterName,path from chapter where parentGradeId = ? order by concat(path,'-',id)", [$id]);

        foreach ($studychapter as $key => &$value) {
            $pre = '';
            $num = count(explode('-', $value->path));
            for ($i = 0; $i < $num; $i++) {
                $pre .= '|----';
            }

            $value->chapterName = $pre . $value->chapterName;
        }
        // dd($studychapter);
        echo json_encode($studychapter);
    }

    /**
     * 主题研讨列表页
     */
    public function subjectList()
    {
        return view('/qiyun/research/subjectList');
    }

    /**
     * 获取主题列表页信息接口
     */
    public function getSubjectList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数
        $sum = DB::table('department_theme')->count();  //总记录数

        $data = DB::table('department_theme as dep')
            ->leftJoin('users as u', 'dep.userId', '=', 'u.id')
            ->select('dep.id', 'dep.name', 'dep.describe', 'dep.pic', 'dep.peoplenum', 'u.realname', 'dep.create_at')
            ->orderBy('dep.id', 'desc')
            ->skip($passNUm)
            ->take($perPageNum)
            ->get();
        $arr = [];
        if ($data) {
            foreach ($data as $val) {
                if ($val->peoplenum == null) {
                    $arr['subjectList'][] = [
                        'id' => $val->id, 'name' => $val->name, 'describe' => $val->describe, 'pic' => $val->pic, 'peoplenum' => '0', 'author' => $val->realname, 'create_at' => $val->create_at
                    ];
                } else {
                    $arr['subjectList'][] = [
                        'id' => $val->id, 'name' => $val->name, 'describe' => $val->describe, 'pic' => $val->pic, 'peoplenum' => $val->peoplenum, 'author' => $val->realname, 'create_at' => $val->create_at
                    ];
                }
            }
            $arr['total'] = $sum;
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }
        echo json_encode($arr);
    }

    /**
     * 发起主题研讨页
     */
    public function addSubject()
    {
        return view('/qiyun/research/addSubject');
    }

    /**
     * 添加主题研讨
     */
    public function insertSubject(Request $request)
    {
        if (Auth::user()) {
            //上传图片
            $ext = strtolower(strrchr($_FILES['pic']['name'], '.'));//获取后缀名
            //过滤后缀名
            if ($ext != ".jpg" && $ext != ".jpeg" && $ext != ".png" && $ext != ".gif") {
                echo "请上传正确的图片格式！";
            }
            $data = [];
            //图片最大不超过2M
            if (ceil(($_FILES['pic']['size']) / 1024) < 2048) {
                if ($request->hasFile('pic')) {
                    if ($request->file('pic')->isValid()) {
                        $newname = time() . rand(1000, 9999) . $ext;
                        if ($request->file('pic')->move('./image/qiyun/research/subjectList/', $newname)) {
                            $data['status'] = true;
                            $data['msg'] = '上传成功';
                            echo json_encode($data);
                        } else {
                            $data['status'] = false;
                            $data['move'] = "移动文件失败！";
                            echo json_encode($data);
                        }
                    }
                } else {
                    echo 0;  //没有文件上传
                }
            } else {
                $data['status'] = false;
                $data['size'] = "上传文件不能大于2M";
                echo json_encode($data);
            }

            //获取表单的输入项
            $arr = [];
            $arr['name'] = $_POST['name'];
            $arr['describe'] = $_POST['describe'];
            $arr['pic'] = "/image/qiyun/research/subjectList/" . $newname;
            $arr['userId'] = Auth::user()->id;
            $arr['create_at'] = Carbon::now();
            $arr['peoplenum'] = '0';
            $res = DB::table('department_theme')->insertGetId($arr);
            if ($res) {
                $sysMsg = DB::table('system_message')->insertGetId(['resourceId' => $res, 'userId' => Auth::user()->id, 'messageTitle' => '共同提升，切磋水平', 'resourceType' => 4, 'type' => 0, 'url' => "/research/subjectInfo/{$res}", 'isOpen' => 0, 'addTime' => time(), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                $userMsg = DB::table('user_message')->insertGetId(['resourceId' => $res, 'userId' => Auth::user()->id, 'messageTitle' => '成功创建', 'resourceType' => 4, 'type' => 0, 'isOpen' => 0, 'addTime' => Carbon::now()]);
                if ($sysMsg && $userMsg) {
                    return Redirect()->to('/research/subjectList');
                }
            } else {
                return back()->with('status', '2');
            }
        } else {
            return Redirect()->to('/');
        }

    }

    /**
     * 主题研讨详细信息页面
     */
    public function subjectInfo($id)
    {
        if (Auth::user()) {
            if (Auth::user()->type == '1') {
                return view('/qiyun/research/subjectInfo');
            } else {
                return back()->with('checkResearch2', 2); //不是老师
            }
        } else {
            return back()->with('checkResearch2', 1); //未登录
        }
    }

    /**
     * 主题研讨详细信息页面数据接口
     */
    public function getSubjectInfo($id)
    {
        $arr = [];
        $rec = DB::table('department_theme')->where('id', $id)->first();
        if ($rec) {
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }
        $realname = DB::table('users')->select('realname')->where('id', $rec->userId)->first();
        $topicnum = DB::table('department_topic')->where('themeId', $rec->id)->count();
        $articlenum = DB::table('department_article')->where('themeId', $rec->id)->count();
        $imagesnum = DB::table('department_images')->where('themeId', $rec->id)->count();
        $resourcenum = DB::table('department_resource')->where('themeId', $rec->id)->count();
        $videonum = DB::table('department_videos')->where('themeId', $rec->id)->count();
        if ($rec->peoplenum == null) {
            $arr['subjectCount'] = ['peoplenum' => '0', 'topicnum' => $topicnum, 'articlenum' => $articlenum, 'imagesnum' => $imagesnum, 'resourcenum' => $resourcenum, 'videonum' => $videonum];
        } else {
            $arr['subjectCount'] = ['peoplenum' => $rec->peoplenum, 'topicnum' => $topicnum, 'articlenum' => $articlenum, 'imagesnum' => $imagesnum, 'resourcenum' => $resourcenum, 'videonum' => $videonum];
        }
        $arr['subjectInfo'] = ['name' => $rec->name, 'pic' => $rec->pic, 'create_at' => explode(' ', $rec->create_at)[0], 'author' => $realname->realname, 'describe' => $rec->describe];
        //主题图片
        $res = DB::table('department_images')
            ->select('imgurl')
            ->where('themeId', $rec->id)
            ->orderBy('create_at', 'desc')
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();
        if ($res) {
            $arr['state']['subjectImage'] = true;
            foreach ($res as $val) {
                $arr['subjectImage'][] = ['pic' => $val->imgurl];
            }
        } else {
            $arr['state']['subjectImage'] = false;
        }
        //主题文章
        $res = DB::table('department_article')
            ->select('id', 'title')
            ->where('themeId', $rec->id)
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();
        if ($res) {
            $arr['state']['subjectArticle'] = true;
            foreach ($res as $val) {
                $arr['subjectArticle'][] = ['id' => $val->id, 'title' => $val->title];
            }
        } else {
            $arr['state']['subjectArticle'] = false;
        }
        //相关视频
        $res = DB::table('department_videos')
            ->select('id', 'name', 'url')
            ->where('themeId', $rec->id)
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();
        if ($res) {
            $arr['state']['subjectVideo'] = true;
            foreach ($res as $val) {
                $arr['subjectVideo'][] = ['id' => $val->id, 'name' => $val->name, 'url' => $val->url];
            }
        } else {
            $arr['state']['subjectVideo'] = false;
        }
        //subjectResource专题资源
        $res = DB::table('department_resource')
            ->select('id', 'name', 'resourceUrl')
            ->where('themeId', $rec->id)
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();
        if ($res) {
            $arr['state']['subjectResource'] = true;
            foreach ($res as $val) {
                $arr['subjectResource'][] = ['id' => $val->id, 'name' => $val->name, 'resourceUrl' => $val->resourceUrl];
            }
        } else {
            $arr['state']['subjectResource'] = false;
        }
        //subjectResource话题
        $res = DB::table('department_topic')
            ->select('id', 'title')
            ->where('themeId', $rec->id)
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();
        if ($res) {
            $arr['state']['subjectTopic'] = true;
            foreach ($res as $val) {
                $arr['subjectTopic'][] = ['id' => $val->id, 'title' => $val->title];
            }
        } else {
            $arr['state']['subjectTopic'] = false;
        }
        echo json_encode($arr);
    }

    // 主题研讨图片列表页
    public function getSubjectImage($id)
    {
        $data = DB::table('department_images')->where('themeId', $id)->get();
        if ($data) {
            $status = '1';
        } else {
            $status = '2';
        }
        return view('/qiyun/research/subjectImageList', compact('data', 'status'));
    }

    // 主题研讨文章信息页
    public function articleInfo($id)
    {
        $resa = DB::select("select id,title from department_article where id<$id order by id DESC limit 1");
        $resb = DB::select("select id,title from department_article where id>$id order by id ASC limit 1");
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
        return view('/qiyun/research/articleInfo', ['datas' => $arr]);
    }

    // 主题研讨文章信息页接口
    public function getArticleInfo($id)
    {
        $arr = DB::table('department_article')
            ->leftJoin('users', 'users.id', '=', 'department_article.userId')
            ->select('users.realname', 'department_article.*')
            ->where('department_article.id', $id)
            ->first();
        if ($arr) {
            echo json_encode(['status' => true, 'content' => $arr]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

//    // 主题研讨文章列表页接口
//    public function getArticleList($id)
//    {
//        $list = DB::table('department_article')->orderBy('id', 'desc')->limit(16)->get();
//        if ($list) {
//            echo json_encode(['status' => true, 'list' => $list]);
//        } else {
//            echo json_encode(['status' => false]);
//        }
//    }

    // 主题研讨话题信息页
    public function topicInfo($id)
    {
        $resa = DB::select("select id,title from department_topic where id<$id order by id DESC limit 1");

        $resb = DB::select("select id,title from department_topic where id>$id order by id ASC limit 1");

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
        return view('/qiyun/research/topicInfo', ['datas' => $arr]);
    }

    // 主题研讨话题信息页接口
    public function getTopicInfo($id)
    {
        $arr = DB::table('department_topic')
            ->leftJoin('users', 'users.id', '=', 'department_topic.userId')
            ->select('users.realname', 'department_topic.*')
            ->where('department_topic.id', $id)
            ->first();
        if ($arr) {
            echo json_encode(['status' => true, 'content' => $arr]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

//    // 主题研讨话题列表页接口
//    public function getTopicList($id)
//    {
//        $arr = json_decode(file_get_contents('php://input'), true);
//        $nowPage = $arr['pageIndex'];                         //当前页码
//        $perPageNum = $arr['pageSize'];                       //每页显示条数
//        $passNUm = ($nowPage - 1) * $perPageNum;              //跳过条数
//        $sum = DB::table('department_theme')->count();        //总记录数
//        $list = DB::table('department_topic')->orderBy('id', 'desc')->skip($passNUm)->take($perPageNum)->get();
//        if ($list) {
//            echo json_encode(['status' => true, 'list' => $list, 'total' => $sum]);
//        } else {
//            echo json_encode(['status' => false]);
//        }
//    }


    /**
     * 主题研讨发表话题
     */

    public function insertSubjectTopic(Request $request)
    {
        if (Auth::user()) {
            $res1 = DB::table('department_topic')->where(['themeId' => $request->themeId, 'userId' => Auth::user()->id])->get();
            $res2 = DB::table('department_images')->where(['themeId' => $request->themeId, 'userId' => Auth::user()->id])->get();
            $res3 = DB::table('department_resource')->where(['themeId' => $request->themeId, 'userId' => Auth::user()->id])->get();
            $res4 = DB::table('department_topic')->where(['themeId' => $request->themeId, 'userId' => Auth::user()->id])->get();
            $res5 = DB::table('department_videos')->where(['themeId' => $request->themeId, 'userId' => Auth::user()->id])->get();
            if ($res1 || $res2 || $res3 || $res4 || $res5) {
                $data = $request->except('_token');
                $data['userId'] = Auth::user()->id;
                $data['create_at'] = Carbon::now();
                $data['update_at'] = Carbon::now();
                $id = DB::table('department_topic')->insertGetId($data);
                if ($id) {
                    return Redirect()->to('/research/subjectInfo/' . $request->themeId);
                }
            } else {
                $data = $request->except('_token');
                $data['userId'] = Auth::user()->id;
                $data['create_at'] = Carbon::now();
                $data['update_at'] = Carbon::now();
                $id = DB::table('department_topic')->insertGetId($data);
                $res = DB::table('department_theme')->where('id', $_POST['themeId'])->increment('peoplenum', 1);
                if ($id && $res) {
                    return Redirect()->to('/research/subjectInfo/' . $request->themeId);
                }
            }
        } else {
            return back()->with('status', '3');
        }


    }

    /**
     * 主题研讨添加图片页
     */
    public function subjectImage($id)
    {
        return view('/qiyun/research/subjectImage');
    }

    /**
     * 主题研讨添加图片页
     */
    public function insertSubjectImage($id)
    {
        if (Auth::user()) {
            // 获取用户id
            $data['userId'] = Auth::user()->id;
            $data['themeId'] = $id;
            $data['create_at'] = Carbon::now();
            $data['update_at'] = Carbon::now();
            // 上传多图图片
            if ($_FILES['file']['error'] == '0') {

                $entension = explode('/', $_FILES['file']['type']);
                $entension = array_pop($entension);

                // 设置上传音视频的所有格式
                $allowed_types = array('jpg', 'png', 'gif', 'jpeg');
                if (!in_array($entension, $allowed_types)) {
                    echo "请上传图片格式";
                    die();
                } else {
                    $newname = date('YmdHis', time()) . rand(0000, 9999) . '.' . $entension;//拼接新的图片名
                    $path = './image/qiyun/research/publishPic/';
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $path . $newname)) {
                        $data['imgurl'] = ltrim($path, '.') . $newname;
                    }
                }
            }
            $res1 = DB::table('department_topic')->where(['themeId' => $id, 'userId' => Auth::user()->id])->get();
            $res2 = DB::table('department_images')->where(['themeId' => $id, 'userId' => Auth::user()->id])->get();
            $res3 = DB::table('department_resource')->where(['themeId' => $id, 'userId' => Auth::user()->id])->get();
            $res4 = DB::table('department_topic')->where(['themeId' => $id, 'userId' => Auth::user()->id])->get();
            $res5 = DB::table('department_videos')->where(['themeId' => $id, 'userId' => Auth::user()->id])->get();
            if ($res1 || $res2 || $res3 || $res4 || $res5) {
                $res = DB::table('department_images')->insertGetId($data);
                if ($res) {
                    echo json_encode(['status' => '1']);
                } else {
                    echo json_encode(['status' => '2']);
                }
            } else {
                $id = DB::table('department_images')->insertGetId($data);
                $res = DB::table('department_theme')->where('id', $_POST['themeId'])->increment('peoplenum', 1);
                if ($id && $res) {
                    echo json_encode(['status' => '1']);
                }
            }
        } else {
            echo json_encode(['status' => '3']);
        }

    }


    /**
     * 主题研讨添加文章页
     */
    public function subjectArticle($id)
    {
        return view('/qiyun/research/subjectArticle');
    }

    /**
     * 主题研讨添加文章页
     */
    public function insertSubjectArticle(Request $request)
    {
        if (Auth::user()) {
            $input = $request->except('_token');
            $input['userId'] = Auth::user()->id;
            $input['create_at'] = Carbon::now();
            $input['update_at'] = Carbon::now();
            $res1 = DB::table('department_topic')->where(['themeId' => $request->themeId, 'userId' => Auth::user()->id])->get();
            $res2 = DB::table('department_images')->where(['themeId' => $request->themeId, 'userId' => Auth::user()->id])->get();
            $res3 = DB::table('department_resource')->where(['themeId' => $request->themeId, 'userId' => Auth::user()->id])->get();
            $res4 = DB::table('department_topic')->where(['themeId' => $request->themeId, 'userId' => Auth::user()->id])->get();
            $res5 = DB::table('department_videos')->where(['themeId' => $request->themeId, 'userId' => Auth::user()->id])->get();
            if ($res1 || $res2 || $res3 || $res4 || $res5) {
                $res = DB::table('department_article')->insertGetId($input);
                if ($res) {
                    return Redirect()->to('/research/subjectInfo/' . $request->themeId);
                } else {
                    return back()->with('status', '2');
                }
            } else {
                $id = DB::table('department_article')->insertGetId($input);
                $res = DB::table('department_theme')->where('id', $_POST['themeId'])->increment('peoplenum', 1);
                if ($id && $res) {
                    return Redirect()->to('/research/subjectInfo/' . $request->themeId);
                }
            }
        } else {
            return back()->with('status', '3');
        }
    }

    /**
     * 主题研讨添加视频页
     */
    public function subjectAudio($id)
    {
        return view('/qiyun/research/subjectAudio');
    }

    /**
     * 主题研讨添加视频页
     */
    public function insertSubjectAudio()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        if (Auth::user()) {
            //获取音视频名字和内容并插入到数据库
            $input['userId'] = Auth::user()->id;
            $input['url'] = $arr['evaluatPath'];
            $input['themeId'] = $arr['id'];
            $input['describe'] = $arr['describe'];
            $input['name'] = $arr['name'];
            $input['create_at'] = Carbon::now();
            $input['update_at'] = Carbon::now();
            $res1 = DB::table('department_topic')->where(['themeId' => $arr['id'], 'userId' => Auth::user()->id])->get();
            $res2 = DB::table('department_images')->where(['themeId' => $arr['id'], 'userId' => Auth::user()->id])->get();
            $res3 = DB::table('department_resource')->where(['themeId' => $arr['id'], 'userId' => Auth::user()->id])->get();
            $res4 = DB::table('department_topic')->where(['themeId' => $arr['id'], 'userId' => Auth::user()->id])->get();
            $res5 = DB::table('department_videos')->where(['themeId' => $arr['id'], 'userId' => Auth::user()->id])->get();
            if ($res1 || $res2 || $res3 || $res4 || $res5) {
                $res = DB::table('department_videos')->insertGetId($input);
                if ($res) {
                    echo json_encode(['status' => '1']);
                } else {
                    echo json_encode(['status' => '2']);
                }
            } else {
                $id = DB::table('department_videos')->insertGetId($input);
                $res = DB::table('department_theme')->where('id', $arr['id'])->increment('peoplenum', 1);
                if ($id && $res) {
                    echo json_encode(['status' => '1']);
                }
            }
        } else {
            echo json_encode(['status' => '3']);
        }

    }


    /**
     * 主题研讨添加资源页
     */
    public function subjectResource($id)
    {
        return view('/qiyun/research/subjectResource');
    }

    /**
     * 主题研讨添加资源页
     */
    public function insertSubjectResource()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        if (Auth::user()) {
            //获取上传资源的资源信息，并插入到数据库
            $input['userId'] = Auth::user()->id;
            $input['resourceUrl'] = $arr['evaluatPath'];
            $input['themeId'] = $arr['id'];
            $input['describe'] = $arr['describe'];
            $input['name'] = $arr['name'];
            $input['create_at'] = Carbon::now();
            $input['update_at'] = Carbon::now();
            $res1 = DB::table('department_topic')->where(['themeId' => $arr['id'], 'userId' => Auth::user()->id])->get();
            $res2 = DB::table('department_images')->where(['themeId' => $arr['id'], 'userId' => Auth::user()->id])->get();
            $res3 = DB::table('department_resource')->where(['themeId' => $arr['id'], 'userId' => Auth::user()->id])->get();
            $res4 = DB::table('department_topic')->where(['themeId' => $arr['id'], 'userId' => Auth::user()->id])->get();
            $res5 = DB::table('department_videos')->where(['themeId' => $arr['id'], 'userId' => Auth::user()->id])->get();
            if ($res1 || $res2 || $res3 || $res4 || $res5) {
                $res = DB::table('department_resource')->insertGetId($input);
                if ($res) {
                    echo json_encode(['status' => '1']);
                } else {
                    echo json_encode(['status' => '2']);
                }
            } else {
                $id = DB::table('department_resource')->insertGetId($input);
                $res = DB::table('department_theme')->where('id', $arr['id'])->increment('peoplenum', 1);
                if ($id && $res) {
                    echo json_encode(['status' => '1']);
                }
            }
        } else {
            echo json_encode(['status' => '3']);
        }
    }

    public function doUpload(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->type == 1) {
                //获取文件后缀名
                $ext = strrchr($_FILES['Filedata']['name'], '.');
                if ($request->hasFile('Filedata')) {
                    if ($request->file('Filedata')->isValid()) {
                        $newname = time() . $ext;
                        if ($request->file('Filedata')->move('./uploads/research/', $newname)) {
                            echo '/uploads/research/' . $newname;
                        }
                    }
                } else {
                    echo 0;  //没有文件上传 0
                }
            } else {
                echo 2;  //不是教师 2
            }
        } else {
            //请登录 1
            echo 1;
        }

    }

    // 教研课件信息浏览
    public function evaluatCourse($id)
    {
        $resDetail = DB::table('evaluaCourseware')->where('id', $id)->first();
        //计算文件大小
        $resDetail->evaluatSize = self::format_kb($resDetail->evaluatSize);
        $resDetail->evaluatName = DB::table('evaluat')->select('evaluatName')->where('id', $resDetail->parentId)->first()->evaluatName;
        $resDetail->evaluatDirection = DB::table('evaluat')->select('evaluatDirection')->where('id', $resDetail->parentId)->first()->evaluatDirection;
        //获取文件类型
        $type = '.' . $resDetail->evaluatFomat;
        return view('qiyun/research/evaluatCourse', ['resDetail' => $resDetail, 'videoId' => $id, 'type' => $type]);

    }

    // 教研课件信息浏览
    public function evaluatCourseList($id)
    {
        return view('qiyun/research/evaluatCourseList');
    }

    public function getEvaluatCourseList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数
        $sum = DB::table('evaluaCourseware')->where('parentId', $arr['parentId'])->count();  //总记录数
        //  教研课件列表信息
        $res = DB::table('evaluaCourseware')->select('id', 'evaluatCourseName', 'evaluatFomat', 'evaluatSize', 'created_at')->where('parentId', $arr['parentId'])->orderBy('id', 'desc')->skip($passNUm)->take($perPageNum)->get();
        if ($res) {
            foreach ($res as $val) {
                if ($val->evaluatFomat == 'mp4') {
                    $info['evaluatCourseList'][] = [
                        'id' => $val->id, 'evaluatCourseName' => $val->evaluatCourseName . '.' . $val->evaluatFomat, 'evaluatSize' => $val->evaluatSize . 'KB', 'created_at' => $val->created_at, 'pic' => '/image/qiyun/research/evaluationInfo/5.png'
                    ];
                } else if ($val->evaluatFomat == 'pdf') {
                    $info['evaluatCourseList'][] = [
                        'id' => $val->id, 'evaluatCourseName' => $val->evaluatCourseName . '.' . $val->evaluatFomat, 'evaluatSize' => $val->evaluatSize . 'KB', 'created_at' => $val->created_at, 'pic' => '/image/qiyun/research/evaluationInfo/10.png'
                    ];
                } else if ($val->evaluatFomat == 'word') {
                    $info['evaluatCourseList'][] = [
                        'id' => $val->id, 'evaluatCourseName' => $val->evaluatCourseName . '.' . $val->evaluatFomat, 'evaluatSize' => $val->evaluatSize . 'KB', 'created_at' => $val->created_at, 'pic' => '/image/qiyun/research/evaluationInfo/7.png'
                    ];
                } else {
                    $info['evaluatCourseList'][] = [
                        'id' => $val->id, 'evaluatCourseName' => $val->evaluatCourseName . '.' . $val->evaluatFomat, 'evaluatSize' => $val->evaluatSize . 'KB', 'created_at' => $val->created_at, 'pic' => '/image/qiyun/research/evaluationInfo/7.png'
                    ];
                }
            }
            $info['total'] = $sum;
            $info['status'] = true;
        } else {
            $info['status'] = false;
        }

        echo json_encode($info);
    }

    // 获取相关评课信息
    public function getRelevantEvaluat()
    {
        $data = DB::table('evaluat')->orderBy('evaluatView', 'desc')->limit(6)->select('id', 'evaluatName', 'evaluatView', 'created_at')->get();
        if ($data) {
            foreach ($data as $val) {
                $arr['other'][] = $val;
            }
            $arr['type'] = true;
            echo json_encode($arr);
        }
    }


    // 备课资源列表
    public function lessonResourseList($id)
    {
        return view('qiyun/research/lessonResourseList');
    }

    public function getLessonResourseList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数
        $sum = DB::table('lessonsubject_resource')->where('lessonId', $arr['lessonId'])->count();  //总记录数
        //  教研课件列表信息
        $res = DB::table('lessonsubject_resource')->select('id', 'name', 'resourceurl', 'create_at')->where('lessonId', $arr['lessonId'])->orderBy('id', 'desc')->skip($passNUm)->take($perPageNum)->get();
        if ($res) {
            foreach ($res as $val) {
                $type = strtolower(strstr($val->resourceurl, '.'));
                if ($type == '.mp4') {
                    $info['lessonResourseList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->resourceurl)), 'pic' => '/image/qiyun/research/evaluationInfo/5.png'
                    ];
                } else if ($type == '.pdf') {
                    $info['lessonResourseList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->resourceurl)), 'pic' => '/image/qiyun/research/evaluationInfo/10.png'
                    ];
                } else if ($type == '.word') {
                    $info['lessonResourseList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->resourceurl)), 'pic' => '/image/qiyun/research/evaluationInfo/7.png'
                    ];
                } else if ($type == '.jpg') {
                    $info['lessonResourseList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->resourceurl)), 'pic' => '/image/qiyun/research/lessonDetail/add/jpg.png'
                    ];
                } else {
                    $info['lessonResourseList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->resourceurl)), 'pic' => '/image/qiyun/research/lessonDetail/add/ppt.png'
                    ];
                }
            }
            $info['total'] = $sum;
            $info['status'] = true;
        } else {
            $info['status'] = false;
        }
        echo json_encode($info);
    }

    // 备课视频列表
    public function lessonVideoList($id)
    {
        return view('qiyun/research/lessonVideoList');
    }

    public function getLessonVideoList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数
        $sum = DB::table('lessonsubject_video')->where('lessonId', $arr['lessonId'])->count();  //总记录数
        //  教研课件列表信息
        $res = DB::table('lessonsubject_video')->select('id', 'name', 'url', 'create_at')->where('lessonId', $arr['lessonId'])->orderBy('id', 'desc')->skip($passNUm)->take($perPageNum)->get();
        if ($res) {
            foreach ($res as $val) {
                $type = strstr($val->url, '.');
                if ($type == '.mp4') {
                    $info['lessonVideoList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->url)), 'pic' => '/image/qiyun/research/evaluationInfo/5.png'
                    ];
                } else if ($type == '.pdf') {
                    $info['lessonVideoList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->url)), 'pic' => '/image/qiyun/research/evaluationInfo/10.png'
                    ];
                } else if ($type == '.word') {
                    $info['lessonVideoList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->url)), 'pic' => '/image/qiyun/research/evaluationInfo/7.png'
                    ];
                } else {
                    $info['lessonVideoList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->url)), 'pic' => '/image/qiyun/research/evaluationInfo/7.png'
                    ];
                }
            }
            $info['total'] = $sum;
            $info['status'] = true;
        } else {
            $info['status'] = false;
        }
        echo json_encode($info);
    }

    // 备课话题列表
    public function lessonTopicList($id)
    {
        return view('qiyun/research/lessonTopicList');
    }

    public function getLessonTopicList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;              //跳过条数
        $sum = DB::table('lessonsubject_topic')->where('lessonId', $arr['lessonId'])->count();  //总记录数
        //  教研课件列表信息
        $res = DB::table('lessonsubject_topic as l')
            ->leftJoin('users as u', 'u.id', '=', 'l.userId')
            ->select('l.id', 'l.title', 'u.realname', 'l.create_at')
            ->where('lessonId', $arr['lessonId'])
            ->orderBy('id', 'desc')
            ->skip($passNUm)->take($perPageNum)->get();
        if ($res) {
            foreach ($res as $val) {
                $info['lessonTopicList'][] = [
                    'id' => $val->id, 'name' => $val->realname, 'create_at' => $val->create_at, 'title' => $val->title
                ];
            }
            $info['total'] = $sum;
            $info['status'] = true;
        } else {
            $info['status'] = false;
        }
        echo json_encode($info);
    }

    // 获取相关备课信息
    public function getRelevantSubject()
    {
        $data = DB::table('lessonsubject')->where('status', '0')->orderBy('lessonView', 'desc')->limit(6)->select('id', 'lessonSubjectName', 'lessonView', 'created_at')->get();
        if ($data) {
            foreach ($data as $val) {
                $arr['other'][] = $val;
            }
            $arr['type'] = true;
            echo json_encode($arr);
        }
    }

    //计算文件大小方法
    function format_kb($size)
    {
        $units = array(' KB', ' MB', ' GB', ' TB');
        for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
        return round($size, 2) . $units[$i];
    }

    //计算文件大小方法
    function format_bytes($size)
    {
        $units = array('B', ' KB', ' MB', ' GB', ' TB');
        for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
        return round($size, 2) . $units[$i];
    }

    // 主题视频详情
    public function subjectVideoDetail($id)
    {
        $resDetail = DB::table('department_videos')->where('id', $id)->first();
        //计算文件大小
        $size = @filesize('.' . $resDetail->url);
        $resDetail->size = self::format_bytes($size);
        $resDetail->resourceAuthor = DB::table('users')->select('realname')->where('id', $resDetail->userId)->first()->realname;

        //获取文件类型
        $type = strstr($resDetail->url, '.');
        return view('qiyun/research/subjectVideoDetail', ['resDetail' => $resDetail, 'videoId' => $id, 'type' => $type]);
    }

    public function getRelevantDepartment()
    {
        $data = DB::table('department_theme')->orderBy('peoplenum', 'desc')->limit(6)->select('id', 'name', 'peoplenum', 'create_at')->get();
        if ($data) {
            foreach ($data as $val) {
                $arr['other'][] = $val;
            }
            $arr['type'] = true;
            echo json_encode($arr);
        }
    }

    // 主题资源详情
    public function subjectResourceDetail($id)
    {

        $resDetail = DB::table('department_resource')->where('id', $id)->first();
        //计算文件大小
        $size = @filesize('.' . $resDetail->resourceUrl);
        $resDetail->size = self::format_bytes($size);
        $resDetail->resourceAuthor = DB::table('users')->select('realname')->where('id', $resDetail->userId)->first()->realname;

        //获取文件类型
        $type = strstr($resDetail->resourceUrl, '.');
        return view('qiyun/research/subjectResourceDetail', ['resDetail' => $resDetail, 'videoId' => $id, 'type' => $type]);
    }

    //  主题资源列表页
    public function subjectResourceList($id)
    {
        return view('qiyun/research/subjectResourceList');
    }

    public function getSubjectResourceList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;              //跳过条数
        $sum = DB::table('department_resource')->where('themeId', $arr['themeId'])->count();  //总记录数
        //  教研课件列表信息
        $res = DB::table('department_resource')->select('id', 'name', 'resourceUrl', 'create_at')->where('themeId', $arr['themeId'])->orderBy('id', 'desc')->skip($passNUm)->take($perPageNum)->get();
        if ($res) {
            foreach ($res as $val) {
                $type = strstr($val->resourceUrl, '.');
                if ($type == '.mp4') {
                    $info['subjectResourceList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->resourceUrl)), 'pic' => '/image/qiyun/research/evaluationInfo/5.png'
                    ];
                } else if ($type == '.pdf') {
                    $info['subjectResourceList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->resourceUrl)), 'pic' => '/image/qiyun/research/evaluationInfo/10.png'
                    ];
                } else if ($type == '.word') {
                    $info['subjectResourceList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->resourceUrl)), 'pic' => '/image/qiyun/research/evaluationInfo/7.png'
                    ];
                } else {
                    $info['subjectResourceList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->resourceUrl)), 'pic' => '/image/qiyun/research/evaluationInfo/7.png'
                    ];
                }
            }
            $info['total'] = $sum;
            $info['status'] = true;
        } else {
            $info['status'] = false;
        }
        echo json_encode($info);
    }

    //  主题视频列表页
    public function subjectVideoList($id)
    {
        return view('qiyun/research/subjectVideoList');
    }

    public function getSubjectVideoList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;              //跳过条数
        $sum = DB::table('department_videos')->where('themeId', $arr['themeId'])->count();  //总记录数
        //  教研课件列表信息
        $res = DB::table('department_videos')->select('id', 'name', 'url', 'create_at')->where('themeId', $arr['themeId'])->orderBy('id', 'desc')->skip($passNUm)->take($perPageNum)->get();
        if ($res) {
            foreach ($res as $val) {
                $type = strstr($val->url, '.');
                if ($type == '.mp4') {
                    $info['subjectVideoList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->url)), 'pic' => '/image/qiyun/research/evaluationInfo/5.png'
                    ];
                } else if ($type == '.pdf') {
                    $info['subjectVideoList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->url)), 'pic' => '/image/qiyun/research/evaluationInfo/10.png'
                    ];
                } else if ($type == '.word') {
                    $info['subjectVideoList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->url)), 'pic' => '/image/qiyun/research/evaluationInfo/7.png'
                    ];
                } else {
                    $info['subjectVideoList'][] = [
                        'id' => $val->id, 'name' => $val->name . $type, 'created_at' => $val->create_at, 'size' => self::format_bytes(@filesize('.' . $val->url)), 'pic' => '/image/qiyun/research/evaluationInfo/7.png'
                    ];
                }
            }
            $info['total'] = $sum;
            $info['status'] = true;
        } else {
            $info['status'] = false;
        }
        echo json_encode($info);
    }

    //  主题话题列表页
    public function subjectTopicList($id)
    {
        return view('qiyun/research/subjectTopicList');
    }

    public function getSubjectTopicList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;              //跳过条数
        $sum = DB::table('department_topic')->where('themeId', $arr['themeId'])->count();  //总记录数
        //  教研课件列表信息
        $res = DB::table('department_topic as d')
            ->leftJoin('users as u', 'u.id', '=', 'd.userId')
            ->select('d.id', 'd.title', 'u.realname', 'd.create_at')
            ->where('themeId', $arr['themeId'])
            ->orderBy('id', 'desc')
            ->skip($passNUm)
            ->take($perPageNum)
            ->get();
        if ($res) {
            foreach ($res as $val) {
                $info['subjectTopicList'][] =
                    ['id' => $val->id, 'name' => $val->title, 'author' => $val->realname, 'created_at' => $val->create_at];
            }
            $info['total'] = $sum;
            $info['status'] = true;
        } else {
            $info['status'] = false;
        }
        echo json_encode($info);
    }

    //  主题文章列表页
    public function subjectArticleList($id)
    {
        return view('qiyun/research/subjectArticleList');
    }

    public function getSubjectArticleList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;              //跳过条数
        $sum = DB::table('department_article')->where('themeId', $arr['themeId'])->count();  //总记录数
        //  教研课件列表信息
        $res = DB::table('department_article as d')
            ->leftJoin('users as u', 'u.id', '=', 'd.userId')
            ->select('d.id', 'd.title', 'u.realname', 'd.create_at')
            ->where('themeId', $arr['themeId'])
            ->orderBy('id', 'desc')
            ->skip($passNUm)
            ->take($perPageNum)
            ->get();
        if ($res) {
            foreach ($res as $val) {
                $info['subjectArticleList'][] =
                    ['id' => $val->id, 'name' => $val->title, 'author' => $val->realname, 'created_at' => $val->create_at];
            }
            $info['total'] = $sum;
            $info['status'] = true;
        } else {
            $info['status'] = false;
        }
        echo json_encode($info);
    }
}
