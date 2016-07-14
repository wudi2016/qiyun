<?php

namespace App\Http\Controllers\qiyun\perSpace;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Message\Messages;
use Intervention\Image\ImageManagerStatic as Image;

class perSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type, $id)
    {
        if(Auth::check()){
            $data = DB::table('organize')->get();
            if (\Auth::user()) {
                $info = DB::table('users')->where('id', $id)->first();
//            if($info) {
                if ($info->provinceId)
                    $info->citys = DB::table('city')->where('parent_id', $info->provinceId)->where('status', 1)->get();
                else
                    $info->citys = false;

                if ($info->cityId)
                    $info->countys = DB::table('county')->where('parent_id', $info->cityId)->where('status', 1)->get();
                else
                    $info->countys = false;

                if ($info->countyId)
                    $info->schools = DB::table('school')->where('countryId', $info->countyId)->where('status', 1)->get();
                else {
                    $info->schools = false;
                }

                if ($info->schoolId) {
                    $info->grades = DB::table('schoolgrade')->where('parentId', $info->schoolId)->where('status', 1)->get();
                    $info->reports = DB::table('informationreport')->where('parentId', $info->schoolId)->where('status', 1)->get();
                    $info->departs = DB::table('schooldepartment')->where('parent_id', $info->schoolId)->where('status', 1)->get();
                } else {
                    $info->grades = false;
                    $info->reports = false;
                    $info->departs = false;
                }

                if ($info->reportId)
                    $info->terms = DB::table('informationterm')->where('parentId', $info->reportId)->where('status', 1)->get();
                else
                    $info->terms = false;

                if ($info->gradeId) {
                    $info->classes = DB::table('schoolclass')->where('parentId', $info->gradeId)->where('status', 1)->get();
                    $info->subjects = DB::table('schoolsubject')->where('parentId', $info->gradeId)->where('status', 1)->get();
                } else {
                    $info->classes = false;
                    $info->subjects = false;
                }
                $info->nations = DB::table('user_nation')->get();
//            }
            }
            if ($type == 3) {       //学生
                return view('qiyun/perSpace/stuPerSpace', compact('data', 'info'));
            } else if ($type == 1) { //教师
                $info->tech = DB::table('department_theme')->where('userId', $id)->count();
                $info->resource = DB::table('resource')->where('userId', $id)->count();
                $info->microLesson = DB::table('mini_lesson')->where('user_id', $id)->count();
                return view('qiyun/perSpace/terPerSpace', compact('data', 'info'));
            } else {                //家长
                $data = DB::table('parent_childs')->where('parentId', $id)->get();
                return view('qiyun/perSpace/parPerSpace', compact('data', 'info'));
            }
        }else{
            return redirect('/');
        }

    }


    //获取个人信息接口
    public function getUserInfo()
    {
        if (Auth::user()) {
            $info = \Auth::user()->toArray();
        } else {
            echo '请先登录';
        }

//        dd($info);
        echo json_encode($info);
    }


    /**
     * 省份联动
     */
    public function province()
    {
        $id = $_POST['provinceId'];
        //城市
        $data = DB::table('city')->where('parent_id', $id)->where('status', 1)->get();
        if ($data) {
            foreach ($data as $val) {
                $arr['city'][] = ['id' => $val->id, 'city_name' => $val->city_name];
            }
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }
        //学校
        $data1 = DB::table('school as s')
            ->join('city as c', 'c.id', '=', 's.cityId')
            ->select('s.id', 's.schoolName')
            ->where('c.parent_id', $id)
            ->where('s.status', 1)
            ->get();
        if ($data1) {
            foreach ($data1 as $val) {
                $arr['school'][] = ['schoolId' => $val->id, 'schoolName' => $val->schoolName];
            }
            $arr['statusTwo'] = true;
        } else {
            // return response()->json(['status' => false]);
            $arr['statusTwo'] = false;
        }
        return response()->json($arr);
    }

    /**
     * 联动城市
     */
    public function city()
    {
        $id = $_POST['cityId'];
        //城市
        $data = DB::table('county')->where('parent_id', $id)->where('status', 1)->get();
        if ($data) {
            foreach ($data as $val) {
                $arr['county'][] = ['id' => $val->id, 'county_name' => $val->county_name];
            }
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }
        //学校
        $data = DB::table('school as s')
            ->where('s.cityId', $id)
            ->where('s.status', 1)
            ->get();
        if ($data) {
            foreach ($data as $val) {
                $arr['school'][] = ['schoolId' => $val->id, 'schoolName' => $val->schoolName];
            }
            $arr['statusTwo'] = true;
        } else {
            $arr['statusTwo'] = false;
        }
//        dd($arr);
        return response()->json($arr);
    }

    /**
     * 联动县区
     */
    public function county()
    {
        $id = $_POST['countyId'];
        //学校
        $data = DB::table('school as s')
            ->where('s.countryId', $id)
            ->where('s.status', 1)
            ->get();
        if ($data) {
            foreach ($data as $val) {
                $arr['school'][] = ['schoolId' => $val->id, 'schoolName' => $val->schoolName];
            }
            $arr['status'] = true;
        } else {
            return response()->json(['status' => false]);
        }
        return response()->json($arr);
    }

    /**
     * 联动学校
     */
    public function school()
    {
        $id = $_POST['schoolId'];
        //部门
        $data = DB::table('schooldepartment')->where(['parent_id' => $id, 'status' => 1])->get();
        if ($data) {
            foreach ($data as $val) {
                $arr['depart'][] = ['departId' => $val->id, 'departName' => $val->departName];
            }
            $arr['stat'] = true;
        } else {
            $arr['stat'] = false;
        }

        //年级
        $data = DB::table('schoolgrade')->where(['parentId' => $id, 'status' => 1])->get();
        if ($data) {
            foreach ($data as $val) {
                $arr['grade'][] = ['gradeId' => $val->id, 'gradeName' => $val->gradeName];
            }
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }

        //学校对应的年度
        $array = DB::table('informationreport')->where(['parentId' => $id, 'status' => 1])->get();
        if ($array) {
            foreach ($array as $val) {
                $arr['report'][] = ['id' => $val->id, 'reportName' => $val->reportName];
            }
            $arr['statusTwo'] = true;
        } else {
            $arr['statusTwo'] = false;
        }
        return response()->json($arr);
    }

    /**
     * 联动年度
     */
    public function report()
    {
        $id = $_POST['yearId'];
        //学期
        $data = DB::table('informationterm')->select('id', 'termName')->where(['parentId' => $id, 'status' => 1])->get();
//        dd($data);
        if ($data) {
            foreach ($data as $item) {
                $arr['term'][] = ['id' => $item->id, 'termName' => $item->termName];
            }
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }
        return response()->json($arr);
    }

    /**
     * 联动年级
     */
    public function grade()
    {
        $id = $_POST['gradeId'];
        //班级
        $data = DB::table('schoolclass')->where(['parentId' => $id, 'status' => 1])->get();
        // dd($data);

        if ($data) {
            $arr['status'] = true;
            foreach ($data as $val) {
                $arr['schoolclass'][] = ['schoolclassId' => $val->id, 'schoolclassName' => $val->classname];
            }
        } else {
            $arr['status'] = false;
        }

        //学科
        $array = DB::table('schoolsubject')->where(['parentId' => $id, 'status' => 1])->get();
        if ($array) {
            foreach ($array as $item) {
                $arr['subject'][] = ['subjectId' => $item->id, 'subjectName' => $item->subjectName];
            }
            $arr['statusTwo'] = true;
        } else {
            $arr['statusTwo'] = false;
        }

        return response()->json($arr);
    }

    //修改用户信息
    public function editUserInfo(Request $request)
    {
        $id = Auth::user()->id;             //获取用户ID
        $data = $request->except('_token', 'childNick');     //接收表单的值
        $data['updated_at'] = Carbon::now();
//        dd($data);
        //更新操作
        if (isset($_POST['childNick'])) {
            //分离childNick数据，分别修改用户和parent_childs表
            $affect = DB::table('users')->where('id', '=', $id)->update($data);
            $result = array_filter($_POST['childNick']);//是家长，过滤孩子账号的空字段
            if ($affect) {
                if ($result) {
                    $res = DB::table('parent_childs')->where('parentId', $id)->get();
                    if ($res) {
                        DB::table('parent_childs')->where('parentId', $id)->delete();
                        for ($i = 0; $i < count($result); $i++) {
                            $arr[] = ['parentId' => $id, 'childNick' => $result[$i]];
                        }
                        DB::table('parent_childs')->insert($arr);
                    } else {
                        for ($i = 0; $i < count($result); $i++) {
                            $arr[] = ['parentId' => $id, 'childNick' => $result[$i]];
                        }
                        DB::table('parent_childs')->insert($arr);
                    }

                }
                return back()->with('editMsg', '修改成功!');
            } else {
                return back()->with('editMsg', '修改失败!');
            }
        } else {
            $affect = DB::table('users')->where('id', '=', $id)->update($data);
            if ($affect) {
                //教师更新成功时，如果是已审核用户，就对相应的分组表操作
                if (\Auth::user()->type == 1 && \Auth::user()->checks == 1) {
                    //判断grademember有无数据，有就修改，没有就插入
                    if (!empty($data['gradeId'])) {
                        if (DB::table('grademember')->where(['userId' => $id])->get()) {
                            DB::table('grademember')->where(['userId' => $id])->update(['parentId' => $data['gradeId'], 'updated_at' => Carbon::now()]);
                        } else {
                            $arr = ['parentId' => $data['gradeId'], 'userId' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                            DB::table('grademember')->insert($arr);
                        }
                    } else {
                        if (DB::table('grademember')->where(['userId' => $id])->get()) {
                            DB::table('grademember')->where(['userId' => $id])->delete();
                        }
                    }

                    //判断subjectmember有无数据，有就修改，没有就插入
                    if (!empty($data['subjectId'])) {
                        if (DB::table('subjectmember')->where(['userId' => $id])->get()) {
                            DB::table('subjectmember')->where(['userId' => $id])->update(['parentId' => $data['subjectId'], 'updated_at' => Carbon::now()]);
                        } else {
                            $array = ['parentId' => $data['subjectId'], 'userId' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                            DB::table('subjectmember')->insert($array);
                        }
                    } else {
                        if (DB::table('subjectmember')->where(['userId' => $id])->get()) {
                            DB::table('subjectmember')->where(['userId' => $id])->delete();
                        }
                    }

                    //判断departmentmember有无数据，有就修改，没有就插入
                    if (!empty($data['departId'])) {
                        if (DB::table('departmentmember')->where(['userId' => $id])->get()) {
                            DB::table('departmentmember')->where(['userId' => $id])->update(['parentId' => $data['departId'], 'updated_at' => Carbon::now()]);
                        } else {
                            $array = ['parentId' => $data['departId'], 'userId' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                            DB::table('departmentmember')->insert($array);
                        }
                    } else {
                        if (DB::table('departmentmember')->where(['userId' => $id])->get()) {
                            DB::table('departmentmember')->where(['userId' => $id])->delete();
                        }
                    }
                }
                return back()->with('editMsg', '修改成功!');
            } else {
                return back()->with('editMsg', '修改失败!');
            }
        }


    }


    //收藏 接口
    public function getCollect()
    {
        //查到结果时 status 为true，否则为false
        $data = DB::table('resourcestore')->where('userId', Auth::user()->id)->orderBy('id', 'desc')->limit(10)->get();
        // dd($data);
        if ($data) {
            foreach ($data as $val) {
                switch ($val->type) {
                    case 0:
                        if (DB::table('resource')->where(['id' => $val->resourceId])->first()) {
                            $array['data'][] = ['id' => $val->id, 'title' => $val->resourcetitle, 'type' => '资源', 'time' => $val->created_at, 'url' => "/resource/resourceDetail/" . $val->resourceId, 'isdel' => true];
                        } else {
                            $array['data'][] = ['id' => $val->id, 'title' => $val->resourcetitle, 'type' => '资源', 'time' => $val->created_at, 'url' => "/resource/resourceDetail/" . $val->resourceId, 'isdel' => false];
                        }
                        break;
                    case 5:
                        if (DB::table('mini_lesson as mini')->where(['mini.id' => $val->resourceId])->first()) {
                            $array['data'][] = ['id' => $val->id, 'title' => $val->resourcetitle, 'type' => '微课', 'time' => $val->created_at, 'url' => "/microLesson/microLessonDetail/" . $val->resourceId, 'isdel' => true];
                        } else {
                            $array['data'][] = ['id' => $val->id, 'title' => $val->resourcetitle, 'type' => '微课', 'time' => $val->created_at, 'url' => "/microLesson/microLessonDetail/" . $val->resourceId, 'isdel' => false];
                        }
                        break;
                }
            }
            $array['status'] = true;
        } else {
            $array['status'] = false;
        }
//        dd($array);
        echo json_encode($array);
    }




    //删除收藏 接口
    // (多文件)
    public function mutidelCollect()
    {
        $ids = json_decode(file_get_contents('php://input'), true);  //angular 获取提交数据
//        dd($ids);  [109 => true,113 => false]
        if ($ids) {
            //当$ids的值都为false时，说明没有没有删除项
            $flag = 0;
            foreach ($ids as $key => $val) {
                $flag += intval($val);
            }

            $num = 0;//初始化删除收藏失败值
            foreach ($ids as $key => $val) {
                if ($val) {
                    if (!$affect = DB::table('resourcestore')->where(['id' => $key])->delete()) {
                        $num++;
                    }
                }
            }

            //判断flag的值
            if (!$flag) {
                echo json_encode(['stat' => true]);
            } else {
                if ($num > 0) {
                    echo json_encode(['status' => false, 'num' => $num]);
                } else {
                    echo json_encode(['status' => true]);
                }
            }
        } else {
            echo json_encode(['stat' => true]);
        }
    }


    //（单文件）
    public function delCollect()
    {
        //获取提交过来的id   （ 删除成功后 输出true ，失败false）
        $id = json_decode(file_get_contents('php://input'), true);  //angular 获取提交数据
        //单个id
        if (is_numeric($id)) {
            $affect = DB::table('resourcestore')->where(['id' => $id])->delete();
            // dd($affect);
            if ($affect) {
                echo true;
            } else {
                echo false;
            }
        } else {
            echo false;
        }

    }


    //我的收藏（更多）
    public function myCollectList()
    {
        return view('qiyun/perSpace/myCollectList');
    }

    //我的收藏（更多）数据接口
    public function myCollect()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        //分页参数
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数

        $sum = DB::table('resourcestore')->where('userId', \Auth::user()->id)->count();  //总记录数
        $res = DB::table('resourcestore')->select('id','resourcetitle as title','type','created_at as time')->where('userId', \Auth::user()->id)->orderBy('id', 'desc')->skip($passNUm)->take($perPageNum)->get();;

        if ($res) {
            return response()->json(['status' => true, 'res' => $res, 'count' => $sum]);
        } else {
            return response()->json(['status' => false]);
        }
    }


    //修改用户头像接口
    public function editUserPic(Request $request)
    {
        if ($request->hasFile('Filedata')) {
            //获取文件后缀名
            $ext = strtolower($request->file('Filedata')->getClientOriginalExtension());
            if ($request->file('Filedata')->isValid()) {
                $newname = time() . '.' . $ext;
                if ($request->file('Filedata')->move('./uploads/heads/', $newname)) {
                    //压缩图

                    $img = Image::make(realpath(base_path('public')) . '/uploads/heads/' . $newname)->resize(89, 120);
                    $img->save(realpath(base_path('public')) . '/uploads/heads/small' . $newname);
                    //删除原头像文件
                    if (Auth::user()->pic != '/image/qiyun/member/headImg/default.png') {
                        if (file_exists(realpath(base_path('public')) . Auth::user()->pic)) {
                            unlink(realpath(base_path('public')) . Auth::user()->pic);
                        }
                    }
                    //更新用户表头像字段值
                    DB::table('users')->where('id', Auth::user()->id)->update(['pic' => '/uploads/heads/small' . $newname]);
                    // 返回修改后得头像值
                    echo '/uploads/heads/small' . $newname;
                    //删除上传原图
                    if (file_exists(realpath(base_path('public')) . '/uploads/heads/' . $newname)) {
                        unlink(realpath(base_path('public')) . '/uploads/heads/' . $newname);
                    }
                }
            }
        } else {
            echo 0;  //没有文件上传
        }
    }


    //teacher 接口 （我的教研协助组）
    public function researchAssist()
    {
        //查到结果 status 为 true 否则为false
        $data = DB::table('techresearch as tec')
            ->join('users as u', 'u.username', '=', 'tec.author')
//            ->join('departmenttech as dep', 'dep.parentId', '=', 'tec.id')
            ->where('tec.author', Auth::user()->username)
            ->select('tec.id', 'tec.techResearchName', 'tec.pic', 'u.realname')
            ->orderBy('tec.id', 'desc')
            ->limit(2)
            ->get();
//        dd($data);
        $evaluat = DB::table('evaluat')->where('evaluatAuthor', Auth::user()->username)->count();          //评课
        $arr = [];
        //是否有数据
        if ($data) {
            foreach ($data as $val) {
                $memberSum = DB::table('departmenttech')->where('parentId', $val->id)->count();//成员
                $plan = DB::table('lessonsubject')->where('techResearch', $val->id)->count(); //协备
                $isManage = DB::table('departmenttech')->where('parentId', $val->id)->where('isManage', 1)->first();
                $arr['researchAssist'][] = ['id' => $val->id, 'title' => $val->techResearchName, 'pic' => $val->pic, 'author' => $val->realname, 'isManage' => $isManage ? '有' : '无', 'memberSum' => $memberSum, 'plan' => $plan, 'commentLesson' => $evaluat];
            }
            $arr['status'] = true;

        } else {
            $arr['status'] = false;
        }
//        dd($arr);
        echo json_encode($arr);
    }


    //我的资源列表页(更多)
    public function myResearchList($module)
    {
        switch ($module) {
            case 'myResearchList':
                $title = '我的教研协作组';
                break;
            case 'myPrepareLessonList':
                $title = '我的协同备课';
                break;
            case 'myEvaluatList':
                $title = '我的评课议课';
                break;
            case 'myThemeList':
                $title = '我的主题教研';
                break;
        }

        return view('qiyun/perSpace/myResearchList', compact('module', 'title'));
    }


    //个人中心我的教研、我的备课等等的接口 （更多）
    public function getMyListList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        //根据module不同来显示不同内容
        switch ($arr['module']) {
            case 'myResearchList':
                $table = 'techresearch';
                $where = ['author' => \Auth::user()->username];
                $query = DB::table('techresearch')
                    ->join('users', 'users.username', '=', 'techresearch.author')
                    ->where($where)
                    ->select('techresearch.created_at', 'techresearch.id', 'techresearch.techResearchName', 'techresearch.pic', 'techresearch.description', 'users.realname');
                break;
            case 'myPrepareLessonList':
                $table = 'lessonsubject';
                $where = ['lessonSubjecAuthor' => \Auth::user()->username];
                $query = DB::table('lessonsubject')
                    ->leftJoin('techresearch', 'techresearch.id', '=', 'lessonsubject.techResearch')
                    ->leftJoin('users', 'users.username', '=', 'lessonsubject.lessonSubjecAuthor')
                    ->leftJoin('studysection', 'studysection.id', '=', 'lessonsubject.lessonSection')
                    ->leftJoin('studysubject', 'studysubject.id', '=', 'lessonsubject.lessonSubject')
                    ->leftJoin('studygrade', 'studygrade.id', '=', 'lessonsubject.lessonGrade')
                    ->select('lessonsubject.created_at', 'lessonsubject.id', 'lessonsubject.lessonSubjectName', 'lessonsubject.pic', 'users.realname', 'studysection.sectionName', 'studysubject.subjectName', 'studygrade.gradeName', 'techresearch.techResearchName')
                    ->where($where);
                break;
            case 'myEvaluatList':
                $table = 'evaluat';
                $where = ['evaluatAuthor' => \Auth::user()->username];
                $query = DB::table('evaluat')
                    ->join('users', 'users.username', '=', 'evaluat.evaluatAuthor')
                    ->select('evaluat.created_at', 'evaluat.id', 'evaluat.evaluatName', 'evaluat.beginTime', 'evaluat.evaluatDirection', 'evaluat.evaluatPic', 'users.realname')
                    ->where($where);
                break;
            case 'myThemeList':
                $table = 'department_theme';
                $where = ['userId' => \Auth::user()->id];
                $query = DB::table('department_theme')
                    ->leftJoin('users', 'users.id', '=', 'department_theme.userId')
                    ->select('department_theme.id', 'department_theme.name', 'department_theme.describe', 'department_theme.pic', 'department_theme.peoplenum', 'department_theme.create_at', 'users.realname')
                    ->where($where);
                break;
        }
        //分页参数
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数

        $sum = DB::table($table)->where($where)->count();  //总记录数
        $res = $query->orderBy("$table.id", 'desc')->skip($passNUm)->take($perPageNum)->get();

        if ($res) {
            return response()->json(['status' => true, 'res' => $res, 'count' => $sum]);
        } else {
            return response()->json(['status' => false]);
        }

    }


    //teacher 接口 （我的协同备课）
    public function prepareLesson()
    {

        //查到结果 status 为 true 否则为false
        $user = DB::table('users')->select('username')->where('id', Auth::user()->id)->first();
        $array = DB::table('lessonsubject as sub')
            ->leftJoin('techresearch as sea', 'sea.id', '=', 'sub.techResearch')
            ->leftJoin('users as u', 'u.username', '=', 'sub.lessonSubjecAuthor')
            ->leftJoin('studysection as sec', 'sec.id', '=', 'sub.lessonSection')
            ->leftJoin('studysubject as stu', 'stu.id', '=', 'sub.lessonSubject')
            ->leftJoin('studygrade as gra', 'gra.id', '=', 'sub.lessonGrade')
            ->select('sub.id', 'sub.lessonSubjectName', 'sub.pic', 'u.realname', 'sec.sectionName', 'stu.subjectName', 'gra.gradeName', 'sea.techResearchName')
            ->where('sub.lessonSubjecAuthor', $user->username)
            ->orderBy('sub.id', 'desc')
            ->limit(2)
            ->get();
//        dd($array);
        if ($array) {
            foreach ($array as $val) {
                $articles = DB::table('lessonsubject_article')->where('lessonId', $val->id)->count();//文章
                $resource = DB::table('lessonsubject_resource')->where('lessonId', $val->id)->count();//资源
                $image = DB::table('lessonsubject_image')->where('lessonId', $val->id)->count();//图片
                $video = DB::table('lessonsubject_video')->where('lessonId', $val->id)->count();//视频
                $commentcase = DB::table('lessonsubjects')->where('parentId', $val->id)->count();
                $arr['prepareLesson'][] = ['id' => $val->id, 'title' => $val->lessonSubjectName, 'descript' => $val->sectionName . $val->subjectName . $val->gradeName, 'pic' => $val->pic, 'author' => $val->realname, 'researchteam' => $val->techResearchName, 'commentcase' => $commentcase, 'case' => "2", 'article' => $articles, 'resource' => $resource, 'imagenum' => $image, 'videonum' => $video];
            }
            $arr['status'] = true;

        } else {
            $arr['status'] = false;
        }
//        dd($arr);
        echo json_encode($arr);
    }


    //teacher 接口 （我的评课议课）
    public function lessonComment()
    {
        //查到结果 status 为 true 否则为false
        $user = DB::table('users')->where('id', Auth::user()->id)->select('username', 'realname')->first();
        //获取我的评课信息
        $evaluat = DB::table('evaluat as e')
            ->join('users as u', 'u.username', '=', 'e.evaluatAuthor')
            ->select('e.id', 'e.evaluatName', 'e.beginTime', 'e.evaluatDirection', 'e.evaluatPic', 'u.realname')
            ->where('e.evaluatAuthor', '=', $user->username)
            ->orderBy('e.id', 'desc')
            ->limit(2)
            ->get();
//        dd($evaluat);
        $arr = [];
        if ($evaluat) {
            foreach ($evaluat as $val) {
                $time = explode(" ", $val->beginTime)[0];
                $arr['lessonComment'][] =
                    ['id' => $val->id, 'title' => $val->evaluatName, 'descript' => $val->evaluatDirection, 'pic' => $val->evaluatPic, 'author' => $val->realname, 'time' => $time, 'scope' => '暂无评分'];
            }
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }

        echo json_encode($arr);
    }


    //teacher 接口 （我的主题教研）
    public function themeResearch()
    {
        //查到结果 status 为 true 否则为false
        $data = DB::table('department_theme')->where('userId', Auth::user()->id)->orderBy('id', 'desc')->limit(1)->get();
        $arr = [];
        if ($data) {
            foreach ($data as $val) {
                $articlenum = DB::table('department_article')->where('themeId', $val->id)->count();//文章
                $resourcenum = DB::table('department_resource')->where('themeId', $val->id)->count();//资源
                $imagenum = DB::table('department_images')->where('themeId', $val->id)->count();//图片
                $videonum = DB::table('department_videos')->where('themeId', $val->id)->count();//视频
                $arr['themeResearch'][] = ['id' => $val->id, 'title' => $val->name, 'effective' => '0', 'pic' => $val->pic, 'author' => 'little star', 'peoplenum' => $val->peoplenum, 'articlenum' => $articlenum, 'resourcenum' => $resourcenum, 'imagenum' => $imagenum, 'videonum' => $videonum, 'descript' => $val->describe];
            }
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }

        echo json_encode($arr);
    }


    //teacher 接口  获取我的资源
    public function myResource()
    {
        //前几个 case 分别对应类别id ，default则查出剩下其余类别的资源
        //查出结果 status 为true ，否则为 false

        $type = json_decode(file_get_contents('php://input'), true);  //angular 获取提交数据
        $data = DB::table('resource')->where('userId', Auth::user()->id)->where('resourceType', $type)->orderBy('updated_at', 'desc')->limit(11)->get();
        $arr = [];

        if ($data) {
            foreach ($data as $val) {
                $arr['myResource'][] = ['id' => $val->id, 'pic' => $val->resourcePic, 'title' => $val->resourceTitle, 'browsenum' => $val->resourceView, 'resourceCheck' => $val->resourceCheck];
            }
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }
        echo json_encode($arr);

    }


    //删除我的资源接口
    public function delMyResource()
    {
        $id = $arr = json_decode(file_get_contents('php://input'), true);  // 获取资源id
        //根据资源id 执行相关删除操作  //操作成功 返回 1，失败返回 2;
        $affect = DB::table('resource')->where('id', $id)->delete();
        if ($affect) {
            DB::table('resourcestore')->where(['resourceId' => $id, 'type' => 0])->delete();
            DB::table('resourcecomment')->where(['resourceId' => $id])->delete();
            DB::table('resourcecontent')->where(['resourceId' => $id])->delete();
            DB::table('resource_click')->where(['resourceId' => $id])->delete();
            DB::table('resourceinformant')->where(['resourceId' => $id])->delete();
            echo json_encode(1);
        } else {
            echo json_encode(2);
        }

    }


    //我的资源列表页(更多)
    public function myResourceList($rt)
    {
        return view('qiyun/perSpace/myResourceList', ['rt' => $rt]);
    }

    //个人中心资源接口 （更多）
    public function getResList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $resourceType = $arr['resType'];                      //资源类型
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数
        $uid = Auth::user()->id;
        $sum = DB::table('resource')->where('resourceType', $resourceType)->where('userId', $uid)->count();  //总记录数


        $res = DB::select("select id,resourceTitle,resourceClick,resourceView,created_at,resourcePic from resource where resourceType = $resourceType and userId = $uid order by id desc limit $passNUm,$perPageNum  ");

        if ($res) {
            echo json_encode(['status' => true, 'res' => $res, 'count' => $sum]);
        } else {
            echo json_encode(['status' => false]);
        }

    }


    //teacher 接口  获取我的微课
    public function myMicLesson()
    {
        // case 分别对应类别id
        //查出结果 status 为true ，否则为 false

        $type = json_decode(file_get_contents('php://input'), true);  //angular 获取提交数据
        $result = DB::table('mini_lesson')->where(['user_id' => Auth::user()->id, 'pctype' => $type])->orderBy('id', 'desc')->limit(11)->get();
        if ($result) {
            foreach ($result as $val) {
                $arr['myMicLesson'][] = ['id' => $val->id, 'pic' => $val->coverPic, 'title' => $val->lessonName, 'browsenum' => $val->viewNum];
            }
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }

        echo json_encode($arr);

    }

    //我的微课列表页(更多)
    public function myMicrolessonList($mt)
    {
        return view('qiyun/perSpace/myMicrolessonList', ['mt' => $mt]);
    }

    //个人中心微课接口 （更多）
    public function getMicroList()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $pctype = $arr['micType'];                      //资源类型
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数
        $uid = Auth::user()->id;
        $sum = DB::table('mini_lesson')->where('pctype', $pctype)->where('user_id', $uid)->count();  //总记录数

        $arr = DB::select("select id,lessonName,addTime,likeNum,viewNum,coverPic from mini_lesson where pctype = $pctype and user_id = $uid order by id desc limit $passNUm,$perPageNum  ");

        if ($arr) {
            foreach ($arr as $val) {
                $res[] = ['id' => $val->id, 'lessonName' => $val->lessonName, 'likeNum' => $val->likeNum, 'viewNum' => $val->viewNum, 'coverPic' => $val->coverPic, 'addTime' => date('Y-m-d h:i:s', $val->addTime / 1000)];
            }
            echo json_encode(['status' => true, 'res' => $res, 'count' => $sum]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    //删除个人中心微课接口
    public function delMicroLesson()
    {
        $id = json_decode(file_get_contents('php://input'), true);  // 获取微课id
        //根据微课id 执行相关删除操作  //操作成功 返回 1，失败返回 2;
        $affect = DB::table('mini_lesson')->where('id', $id)->delete();
        if ($affect) {
            DB::table('resourcestore')->where(['resourceId' => $id, 'type' => 5, 'userId' => \Auth::user()->id])->delete();
            DB::table('mini_lesson_comment')->where(['parentId' => $id, 'user_id' => \Auth::user()->id])->delete();
            DB::table('mini_lesson_clickLike')->where(['lesson_id' => $id, 'user_id' => \Auth::user()->id])->delete();
            DB::table('mini_lesson_complain')->where(['parentId' => $id, 'user_id' => \Auth::user()->id])->delete();
            DB::table('mini_lesson_fav')->where(['parentId' => $id, 'user_id' => \Auth::user()->id])->delete();
            echo json_encode(1);
        } else {
            echo json_encode(2);
        }
    }


    //我的消息列表的接口
    public function userMessage()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        $nowPage = $arr['pageIndex'];                         //当前页码
        $perPageNum = $arr['pageSize'];                       //每页显示条数
        $passNUm = ($nowPage - 1) * $perPageNum;                  //跳过条数
        $type = DB::table('user_message as mes')
            ->leftJoin('users as u', 'u.id', '=', 'mes.fromuserId')
            ->select('u.username', 'mes.*')
            ->where(['userId' => Auth::user()->id, 'isOpen' => '0'])
            ->orderBy('addTime', 'desc')
            ->skip($passNUm)
            ->take($perPageNum)
            ->get();
        if ($type) {
            $arr = [];
            foreach ($type as $val) {
                switch ($val->type) {
                    case '0':
                        if ($val->resourceType == '0') {
                            $resourceTitle = DB::table('resource')->where('id', $val->resourceId)->first();
                            $username = DB::table('users')->where('id', $val->userId)->first()->username;
                            if ($resourceTitle && $username) {
                                $arr['createMessage'][] = ['id' => $val->id, 'realname' => $username . ' ,', 'resourceId' => $val->resourceId, 'resourceType' => $val->resourceType, 'techResearchName' => ' 成功发布《' . $resourceTitle->resourceTitle . '》资源', 'type' => $val->type, 'isOpen' => $val->isOpen, 'addTime' => $val->addTime];
                            } else {
                                DB::table('user_message')->delete($val->id);
                            }
                        } else if ($val->resourceType == '1') {
                            $techResearchName = DB::table('techresearch')->where('id', $val->resourceId)->first();
                            $username = DB::table('users')->where('id', $val->userId)->first()->username;
                            if ($techResearchName && $username) {
                                $arr['createMessage'][] = ['id' => $val->id, 'realname' => $username . ' ,', 'resourceId' => $val->resourceId, 'resourceType' => $val->resourceType, 'techResearchName' => ' 成功创建《' . $techResearchName->techResearchName . '》教研组', 'type' => $val->type, 'isOpen' => $val->isOpen, 'addTime' => $val->addTime];
                            } else {
                                DB::table('user_message')->delete($val->id);
                            }
                        } else if ($val->resourceType == '2') {
                            $lessonSubjectName = DB::table('lessonsubject')->where('id', $val->resourceId)->first();
                            $username = DB::table('users')->where('id', $val->userId)->first()->username;
                            if ($lessonSubjectName && $username) {
                                $arr['createMessage'][] = ['id' => $val->id, 'realname' => $username . ' ,', 'resourceId' => $val->resourceId, 'resourceType' => $val->resourceType, 'techResearchName' => ' 成功创建《' . $lessonSubjectName->lessonSubjectName . '》备课', 'type' => $val->type, 'isOpen' => $val->isOpen, 'addTime' => $val->addTime];
                            } else {
                                DB::table('user_message')->delete($val->id);
                            }
                        } else if ($val->resourceType == '3') {
                            $evaluatName = DB::table('evaluat')->where('id', $val->resourceId)->first();
                            $username = DB::table('users')->where('id', $val->userId)->first()->username;
                            if ($evaluatName && $username) {
                                $arr['createMessage'][] = ['id' => $val->id, 'realname' => $username . ' ,', 'resourceId' => $val->resourceId, 'resourceType' => $val->resourceType, 'techResearchName' => ' 成功发起《' . $evaluatName->evaluatName . '》教研评课 ', 'type' => $val->type, 'isOpen' => $val->isOpen, 'addTime' => $val->addTime];
                            } else {
                                DB::table('user_message')->delete($val->id);
                            }
                        } else if ($val->resourceType == '4') {
                            $name = DB::table('department_theme')->where('id', $val->resourceId)->first();
                            $username = DB::table('users')->where('id', $val->userId)->first()->username;
                            if ($name && $username) {
                                $arr['createMessage'][] = ['id' => $val->id, 'realname' => $username . ' ,', 'resourceId' => $val->resourceId, 'resourceType' => $val->resourceType, 'techResearchName' => ' 成功创建《' . $name->name . '》主题', 'type' => $val->type, 'isOpen' => $val->isOpen, 'addTime' => $val->addTime];
                            } else {
                                DB::table('user_message')->delete($val->id);
                            }
                        } else if ($val->resourceType == '5') {
                            $lessonName = DB::table('mini_lesson')->where('id', $val->resourceId)->first();
                            $username = DB::table('users')->where('id', $val->userId)->first()->username;
                            if ($lessonName && $username) {
                                $arr['createMessage'][] = ['id' => $val->id, 'realname' => $username . ' ,', 'resourceId' => $val->resourceId, 'resourceType' => $val->resourceType, 'techResearchName' => ' 成功创建《' . $lessonName->lessonName . '》微课', 'type' => $val->type, 'isOpen' => $val->isOpen, 'addTime' => $val->addTime];
                            } else {
                                DB::table('user_message')->delete($val->id);
                            }
                        }
                        break;
                    case '1':
                        if ($val->resourceType == '1') {
                            $techResearchName = DB::table('techresearch')->where('id', $val->resourceId)->first();
                            if ($techResearchName) {
                                $arr['userMessage'][] = ['id' => $val->id, 'realname' => $val->username . ' ,', 'resourceId' => $val->resourceId, 'fromuserId' => $val->fromuserId, 'resourceType' => $val->resourceType, 'techResearchName' => ' 申请加入《' . $techResearchName->techResearchName . '》教研组 , ', 'messageTitle' => ' 理由是 ' . $val->messageTitle, 'type' => $val->type, 'isOpen' => $val->isOpen, 'addTime' => $val->addTime];
                            } else {
                                DB::table('user_message')->delete($val->id);
                            }
                        } else if ($val->resourceType == '2') {
                            $lessonSubjectName = DB::table('lessonsubject')->where('id', $val->resourceId)->first();
                            if ($lessonSubjectName) {
                                $arr['userMessage'][] = ['id' => $val->id, 'realname' => $val->username . ' ,', 'resourceId' => $val->resourceId, 'fromuserId' => $val->fromuserId, 'resourceType' => $val->resourceType, 'techResearchName' => ' 申请加入《' . $lessonSubjectName->lessonSubjectName . '》备课 , ', 'messageTitle' => ' 理由是 ' . $val->messageTitle, 'type' => $val->type, 'isOpen' => $val->isOpen, 'addTime' => $val->addTime];
                            } else {
                                DB::table('user_message')->delete($val->id);
                            }
                        }
                        break;
                    case '2':
                        if ($val->resourceType == '1') {
                            $techResearchName = DB::table('techresearch')->where('id', $val->resourceId)->first();
                            if ($techResearchName) {
                                $arr['directMessage'][] = ['id' => $val->id, 'realname' => $val->username . ' ,', 'resourceId' => $val->resourceId, 'fromuserId' => $val->fromuserId, 'resourceType' => $val->resourceType, 'techResearchName' => ' 已经加入《' . $techResearchName->techResearchName . '》教研组 , ', 'messageTitle' => ' 理由是 ' . $val->messageTitle, 'type' => $val->type, 'isOpen' => $val->isOpen, 'addTime' => $val->addTime];
                            } else {
                                DB::table('user_message')->delete($val->id);
                            }
                        }
                        break;
                    case '7':
                        if ($val->resourceType == '3') {
                            $evaluatName = DB::table('evaluat')->where('id', $val->resourceId)->first();
                            $username = DB::table('users')->where('id', $val->fromuserId)->first()->username;
                            if ($evaluatName && $username) {
                                $arr['inviteMessage'][] = ['id' => $val->id, 'realname' => $val->username, 'userId' => $val->userId, 'resourceId' => $val->resourceId, 'fromuserId' => $username . '，', 'resourceType' => $val->resourceType, 'techResearchName' => '《' . $evaluatName->evaluatName . '》教研', 'messageTitle' => $val->messageTitle, 'type' => $val->type, 'isOpen' => $val->isOpen, 'addTime' => $val->addTime];
                            } else {
                                DB::table('user_message')->delete($val->id);
                            }
                        } elseif ($val->resourceType == '1') {
                            $techResearch = DB::table('techresearch')->where('id', $val->resourceId)->first();
                            $username = DB::table('users')->where('id', $val->fromuserId)->first()->username;
                            if ($techResearch && $username) {
                                $arr['inviteMessage'][] = ['id' => $val->id, 'realname' => $val->username, 'userId' => $val->userId, 'resourceId' => $val->resourceId, 'fromuserId' => $username . '，', 'resourceType' => $val->resourceType, 'techResearchName' => '《' . $techResearch->techResearchName . '》教研组', 'messageTitle' => $val->messageTitle, 'type' => $val->type, 'isOpen' => $val->isOpen, 'addTime' => $val->addTime];
                            } else {
                                DB::table('user_message')->delete($val->id);
                            }
                        }
                }
            }
            $sum = DB::table('user_message')->where(['userId' => Auth::user()->id, 'isOpen' => '0'])->count();  //总记录数
            $arr['total'] = $sum;
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }
        echo json_encode($arr);
    }

    // 处理我的消息
    public function userMsgHandle()
    {
        $arr = json_decode(file_get_contents('php://input'), true);
        if ($arr['flag'] == '1') { // 同意申请
            if ($arr['resourceType'] == '1') {
                $data['parentId'] = $arr['resourceId'];
                $data['userId'] = $arr['fromuserId'];
                $data['isManage'] = '0';
                $data['status'] = '1';
                $data['created_at'] = Carbon::now();
                if (!DB::table('departmenttech')->where(['parentId' => $arr['resourceId'], 'userId' => $arr['fromuserId']])->first()) {
                    $res = DB::table('departmenttech')->insertGetId($data);
                    if ($res) {
                        if (DB::table('user_message')->where('id', $arr['id'])->update(['type' => '4', 'isOpen' => '1'])) {
                            echo json_encode(['status' => true]);
                        } else {
                            echo json_encode(['status' => false]);
                        }
                    }
                }
            } elseif ($arr['resourceType'] == '2') {
                $parentId = DB::table('lessonsubject')->where('id', $arr['resourceId'])->first()->techResearch;
                $data['parentId'] = $parentId;
                $data['userId'] = $arr['fromuserId'];
                $data['isManage'] = '0';
                $data['status'] = '1';
                $data['created_at'] = Carbon::now();
                if (!DB::table('departmenttech')->where(['parentId' => $parentId, 'userId' => $arr['fromuserId']])->first()) {
                    $res = DB::table('departmenttech')->insertGetId($data);
                    if ($res) {
                        if (DB::table('user_message')->where('id', $arr['id'])->update(['type' => '4', 'isOpen' => '1'])) {
                            echo json_encode(['status' => true]);
                        } else {
                            echo json_encode(['status' => false]);
                        }
                    }
                }
            }
        } elseif ($arr['flag'] == '2') { // 删除消息
            if (DB::table('user_message')->delete($arr['id'])) {
                echo json_encode(['status' => true]);
            } else {
                echo json_encode(['status' => false]);
            }
        } elseif ($arr['flag'] == '3') { // 接受邀请
            if ($arr['resourceType'] == '1') {
                $data['parentId'] = $arr['resourceId'];
                $data['userId'] = $arr['userId'];
                $data['isManage'] = '0';
                $data['status'] = '1';
                $data['created_at'] = Carbon::now();
                if (!DB::table('departmenttech')->where(['parentId' => $arr['resourceId'], 'userId' => $arr['userId']])->first()) {
                    $res = DB::table('departmenttech')->insertGetId($data);
                    if ($res) {
                        if (DB::table('user_message')->where('id', $arr['id'])->update(['type' => '4', 'isOpen' => '1'])) {
                            echo json_encode(['status' => true]);
                        } else {
                            echo json_encode(['status' => false]);
                        }
                    }
                }
            } elseif ($arr['resourceType'] == '3') {
                $data['parentId'] = $arr['resourceId'];
                $data['userId'] = $arr['userId'];
                $data['isManage'] = '0';
                $data['status'] = '1';
                $data['created_at'] = Carbon::now();
                if (!DB::table('evaluatMember')->where(['parentId' => $arr['resourceId'], 'userId' => $arr['userId']])->first()) {
                    $res = DB::table('evaluatMember')->insertGetId($data);
                    if ($res) {
                        if (DB::table('user_message')->where('id', $arr['id'])->update(['type' => '4', 'isOpen' => '1'])) {
                            echo json_encode(['status' => true]);
                        } else {
                            echo json_encode(['status' => false]);
                        }
                    }
                }
            }
        }
    }


    //个人空间通知消息列表的接口
    public function systemMessage()
    {
        $data = DB::table('system_message')->orderBy('created_at', 'desc')->limit(4)->get();
//        dd($data);
        if ($data) {
            foreach ($data as $val) {
                switch ($val->resourceType) {
                    case 0:
                        $arr = DB::table('resource')->leftJoin('users', 'resource.userId', '=', 'users.id')->select('users.id', 'users.realname', 'resource.resourceCheck')->where('resource.id', $val->resourceId)->first();
                        $user = DB::table('users')->select('id', 'realname', 'pic')->where('id', $val->userId)->first();
                        if ($arr && $user) {
                            $array['msg'][] = ['id' => $val->id, 'pic' => $user->pic, 'author' => $arr->realname, 'realname' => $user->realname, 'resourceCheck' => $arr->resourceCheck, 'messageTitle' => $val->messageTitle, 'url' => $val->url, 'resourceType' => '资源', 'addTime' => date('Y-m-d H:i:s', $val->addTime)];
                        } else {
                            DB::table('system_message')->delete($val->id);
                        }
                        break;
                    case 1:
                        $arr = DB::table('techresearch')->leftJoin('users', 'techresearch.author', '=', 'users.username')->select('users.id', 'users.realname')->where('techresearch.id', $val->resourceId)->first();
                        $user = DB::table('users')->select('id', 'realname', 'pic')->where('id', $val->userId)->first();
                        if ($arr && $user) {
                            $array['msg'][] = ['id' => $val->id, 'pic' => $user->pic, 'author' => $arr->realname, 'realname' => $user->realname, 'resourceCheck' => '9', 'messageTitle' => $val->messageTitle, 'url' => $val->url, 'resourceType' => '协作组', 'addTime' => date('Y-m-d H:i:s', $val->addTime)];
                        } else {
                            DB::table('system_message')->delete($val->id);
                        }
                        break;
                    case 2:
                        $arr = DB::table('lessonsubject')->leftJoin('users', 'lessonsubject.lessonSubjecAuthor', '=', 'users.username')->select('users.id', 'users.realname')->where('lessonsubject.id', $val->resourceId)->first();
                        $user = DB::table('users')->select('id', 'realname', 'pic')->where('id', $val->userId)->first();
                        if ($arr && $user) {
                            $array['msg'][] = ['id' => $val->id, 'pic' => $user->pic, 'author' => $arr->realname, 'realname' => $user->realname, 'resourceCheck' => '9', 'messageTitle' => $val->messageTitle, 'url' => $val->url, 'resourceType' => '备课', 'addTime' => date('Y-m-d H:i:s', $val->addTime)];
                        } else {
                            DB::table('system_message')->delete($val->id);
                        }
                        break;
                    case 3:
                        $arr = DB::table('evaluat')->leftJoin('users', 'evaluat.evaluatAuthor', '=', 'users.username')->select('users.id', 'users.realname')->where('evaluat.id', $val->resourceId)->first();
                        $user = DB::table('users')->select('id', 'realname', 'pic')->where('id', $val->userId)->first();
                        if ($arr && $user) {
                            $array['msg'][] = ['id' => $val->id, 'pic' => $user->pic, 'author' => $arr->realname, 'realname' => $user->realname, 'resourceCheck' => '9', 'messageTitle' => $val->messageTitle, 'url' => $val->url, 'resourceType' => '评课', 'addTime' => date('Y-m-d H:i:s', $val->addTime)];
                        } else {
                            DB::table('system_message')->delete($val->id);
                        }
                        break;
                    case 4:
                        $arr = DB::table('department_theme')->leftJoin('users', 'department_theme.userId', '=', 'users.id')->select('users.id', 'users.realname')->where('department_theme.id', $val->resourceId)->first();
                        $user = DB::table('users')->select('id', 'realname', 'pic')->where('id', $val->userId)->first();
                        if ($arr && $user) {
                            $array['msg'][] = ['id' => $val->id, 'pic' => $user->pic, 'author' => $arr->realname, 'realname' => $user->realname, 'resourceCheck' => '9', 'messageTitle' => $val->messageTitle, 'url' => $val->url, 'resourceType' => '主题', 'addTime' => date('Y-m-d H:i:s', $val->addTime)];
                        } else {
                            DB::table('system_message')->delete($val->id);
                        }
                        break;
                    case 5:
                        $arr = DB::table('mini_lesson')->leftJoin('users', 'mini_lesson.user_id', '=', 'users.id')->select('users.id', 'users.realname')->where('mini_lesson.id', $val->resourceId)->first();
                        $user = DB::table('users')->select('id', 'realname', 'pic')->where('id', $val->userId)->first();
                        if ($arr && $user) {
                            $array['msg'][] = ['id' => $val->id, 'pic' => $user->pic, 'author' => $arr->realname, 'realname' => $user->realname, 'resourceCheck' => '9', 'messageTitle' => $val->messageTitle, 'url' => $val->url, 'resourceType' => '微课', 'addTime' => date('Y-m-d H:i:s', $val->addTime)];
                        } else {
                            DB::table('system_message')->delete($val->id);
                        }
                        break;
                    default:
                        $array['msg'][] = ['id' => 1, 'author' => '李林', 'realname' => '冬小青', 'messageTitle' => '共同提升，切磋水平', 'resourceType' => '资源', 'url' => '', 'addTime' => date('Y-m-d H:i:s', time())];
                }
            }
            $array['status'] = true;
        } else {
            echo json_encode(['status' => false]);
        }
        echo json_encode($array);
    }

    /**
     * 获取验证码
     * @telephone
     * @int  gradeId
     * @return json
     */
    public function getMessage(Messages $message, $telephone, $key_1, $key_2)
    {
        $message->mobile = $telephone;
        $code = str_shuffle(mt_rand(100, 999) . "" . mt_rand(100, 999));
        $content = $message->content[$key_1][$key_2][0] . $code . $message->content[$key_1][$key_2][1];
        $result = $message->sendSMS($code, $content);
        $result = explode(":", $result);
        if ($result[0] == "success")
            return Response()->json(["type" => true, "info" => $code]);
        else
            return Response()->json(["type" => false, "info" => "sendFail"]);
    }

    public function telphone(Request $request)
    {
        $phone = $request->phone;
        if (DB::table('users')->where(['phone' => $phone])->first()) {
            return Response()->json(["status" => true, "info" => '* 手机号已被绑定']);
        } else {
            return Response()->json(["status" => false, "info" => '']);
        }
    }

}
