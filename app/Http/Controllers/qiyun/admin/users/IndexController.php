<?php

namespace App\Http\Controllers\qiyun\admin\users;

use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $organizes = DB::table('organize')->get();
        $query = \DB::table('users')
            ->leftJoin('school as s', 's.id', '=', 'users.schoolId')
            ->leftJoin('schoolgrade as gra', 'gra.id', '=', 'users.gradeId')
            ->leftJoin('schoolclass as cla', 'cla.id', '=', 'users.classId')
            ->leftJoin('schoolsubject as sub', 'sub.id', '=', 'users.subjectId')
            ->leftJoin('organize as org', 'org.id', '=', 'users.provinceId')
            ->leftJoin('city as ci', 'ci.id', '=', 'users.cityId')
            ->leftJoin('county as cou', 'cou.id', '=', 'users.countyId')
            ->leftJoin('role_user','role_user.user_id','=','users.id')
            ->leftJoin('roles','roles.id','=','role_user.role_id');
        //给搜索条件赋初值
        $result = [];
        $result['provinceId'] = null;
        $result['cityId'] = null;
        $result['countyId'] = null;
        $result['schoolId'] = null;
        $result['gradeId'] = null;
        $result['classId'] = null;

        if(\Auth::user()->level() > 6){
            if ($request->provinceId) {
                $query->where('users.provinceId', $request->provinceId);
                $result['provinceId'] = $request->provinceId;
                $citys = DB::table('city')->where('parent_id', $request->provinceId)->where('status', 1)->get();
            } else {
                $query = $query;
                $result['provinceId'] = false;
            }

            if ($request->cityId) {
                $query->where('users.cityId', $request->cityId);
                $result['cityId'] = $request->cityId;
                $countys = DB::table('county')->where('parent_id', $request->cityId)->where('status', 1)->get();
            } else {
                $result['cityId'] = false;
            }

            if ($request->countyId) {
                $query->where('users.countyId', $request->countyId);
                $result['countyId'] = $request->countyId;
                $schools = DB::table('school')->where('countryId', $request->countyId)->where('status', 1)->get();
            } else {
                $result['countyId'] = false;
            }

            if ($request->schoolId) {
                $query->where('users.schoolId', $request->schoolId);
                $result['schoolId'] = $request->schoolId;
                $grades = DB::table('schoolgrade')->where('parentId', $request->schoolId)->where('status', 1)->get();
            } else {
                $result['schoolId'] = false;
            }

            if ($request->gradeId) {
                $query->where('users.gradeId', $request->gradeId);
                $result['gradeId'] = $request->gradeId;
                $classes = DB::table('schoolclass')->where('parentId', $request->gradeId)->where('status', 1)->get();
            } else {
                $result['gradeId'] = false;
            }

            if ($request->classId) {
                $query->where('users.classId', $request->classId);
                $result['classId'] = $request->classId;
            } else {
                $result['classId'] = false;
            }

        }else{
            switch (\Auth::user()->level()) {
                case 6:
                    if ($request->cityId) {
                        $query->where('users.cityId', $request->cityId);
                        $result['cityId'] = $request->cityId;
                        $organizes['countys'] = DB::table('county')->where('parent_id', $request->cityId)->where('status', 1)->get();
                    } else {
                        $query->where('users.provinceId', \Auth::user()->organizeID);
                        $result['cityId'] = false;
                    }

                    if ($request->countyId) {
                        $query->where('users.countyId', $request->countyId);
                        $result['countyId'] = $request->countyId;
                        $organizes['schools'] = DB::table('school')->where('countryId', $request->countyId)->where('status', 1)->get();
                    } else {
                        $result['countyId'] = false;
                    }

                    if ($request->schoolId) {
                        $query->where('users.schoolId', $request->schoolId);
                        $result['schoolId'] = $request->schoolId;
                        $organizes['grades'] = DB::table('schoolgrade')->where('parentId', $request->schoolId)->where('status', 1)->get();
                    } else {
                        $result['schoolId'] = false;
                    }

                    if ($request->gradeId) {
                        $query->where('users.gradeId', $request->gradeId);
                        $result['gradeId'] = $request->gradeId;
                        $organizes['classes'] = DB::table('schoolclass')->where('parentId', $request->gradeId)->where('status', 1)->get();
                    } else {
                        $result['gradeId'] = false;
                    }

                    if ($request->classId) {
                        $query->where('users.classId', $request->classId);
                        $result['classId'] = $request->classId;
                    } else {
                        $result['classId'] = false;
                    }

                    $data = DB::table('organize')->where('id', \Auth::user()->organizeID)->select('id as organizeid', 'organize_name')->first();
                    $data->cityNames = DB::table('city')->where('parent_id', Auth::user()->organizeID)->select('id', 'city_name')->where('status', 1)->get();
                    break;
                case 5:
                    if ($request->countyId) {
                        $query->where('users.countyId', $request->countyId);
                        $result['countyId'] = $request->countyId;
                        $organizes['schools'] = DB::table('school')->where('countryId', $request->countyId)->where('status', 1)->get();
                    } else {
                        $query->where('users.cityId', \Auth::user()->organizeID);
                        $result['countyId'] = false;
                    }

                    if ($request->schoolId) {
                        $query->where('users.schoolId', $request->schoolId);
                        $result['schoolId'] = $request->schoolId;
                        $organizes['grades'] = DB::table('schoolgrade')->where('parentId', $request->schoolId)->where('status', 1)->get();
                    } else {
                        $result['schoolId'] = false;
                    }

                    if ($request->gradeId) {
                        $query->where('users.gradeId', $request->gradeId);
                        $result['gradeId'] = $request->gradeId;
                        $organizes['classes'] = DB::table('schoolclass')->where('parentId', $request->gradeId)->where('status', 1)->get();
                    } else {
                        $result['gradeId'] = false;
                    }

                    if ($request->classId) {
                        $query->where('users.classId', $request->classId);
                        $result['classId'] = $request->classId;
                    } else {
                        $result['classId'] = false;
                    }

                    $data = DB::table('city as c')
                        ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                        ->select('c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                        ->first();
                    $data->countyNames = DB::table('county')->where('parent_id', Auth::user()->organizeID)->select('id', 'county_name')->where('status', 1)->get();
                    break;
                case 4:
                    if ($request->schoolId) {
                        $query->where('users.schoolId', $request->schoolId);
                        $result['schoolId'] = $request->schoolId;
                        $organizes['grades'] = DB::table('schoolgrade')->where('parentId', $request->schoolId)->where('status', 1)->get();
                    } else {
                        $query->where('users.countyId', \Auth::user()->organizeID);
                        $result['schoolId'] = false;
                    }

                    if ($request->gradeId) {
                        $query->where('users.gradeId', $request->gradeId);
                        $result['gradeId'] = $request->gradeId;
                        $organizes['classes'] = DB::table('schoolclass')->where('parentId', $request->gradeId)->where('status', 1)->get();
                    } else {
                        $result['gradeId'] = false;
                    }

                    if ($request->classId) {
                        $query->where('users.classId', $request->classId);
                        $result['classId'] = $request->classId;
                    } else {
                        $result['classId'] = false;
                    }

                    $data = DB::table('county as cou')
                        ->leftJoin('city as c', 'cou.parent_id', '=', 'c.id')
                        ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                        ->where('cou.id', Auth::user()->organizeID)
                        ->select('cou.id as countyid', 'cou.county_name', 'c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                        ->first();
                    $data->schoolNames = DB::table('school')->where('countryId', \Auth::user()->organizeID)->where('status', 1)->get();
                    break;

                case 3:
                    if ($request->gradeId) {
                        $query->where('users.gradeId', $request->gradeId);
                        $result['gradeId'] = $request->gradeId;
                        $organizes['classes'] = DB::table('schoolclass')->where('parentId', $request->gradeId)->get();
                    } else {
                        $query->where('users.schoolId', \Auth::user()->organizeID);
                        $result['gradeId'] = false;
                    }

                    if ($request->classId) {
                        $query->where('users.classId', $request->classId);
                        $result['classId'] = $request->classId;
                    } else {
                        $result['classId'] = false;
                    }

                    $data = DB::table('school as s')
                        ->leftJoin('county as cou', 'cou.id', '=', 's.countryId')
                        ->leftJoin('city as c', 'cou.parent_id', '=', 'c.id')
                        ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                        ->where('s.id', Auth::user()->organizeID)
                        ->select('s.id as schoolid', 's.schoolName', 'cou.id as countyid', 'cou.county_name', 'c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                        ->first();
                    $data->gradeNames = DB::table('schoolgrade')->where('parentId', \Auth::user()->organizeID)->where('status', 1)->get();
                    break;

                case 2:
                    if ($request->classId) {
                        $query->where('users.classId', $request->classId);
                        $result['classId'] = $request->classId;
                    } else {
                        $query->where('users.gradeId', \Auth::user()->organizeID);
                        $result['classId'] = false;
                    }
                    $data = DB::table('schoolgrade as gra')
                        ->leftJoin('school as s', 's.id', '=', 'gra.parentId')
                        ->leftJoin('county as cou', 'cou.id', '=', 's.countryId')
                        ->leftJoin('city as c', 'cou.parent_id', '=', 'c.id')
                        ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                        ->where('gra.id', Auth::user()->organizeID)
                        ->select('gra.id as gradeid', 'gra.gradeName', 's.id as schoolid', 's.schoolName', 'cou.id as countyid', 'cou.county_name', 'c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                        ->first();
                    $data->classNames = DB::table('schoolclass')->where('parentId', \Auth::user()->organizeID)->where('status', 1)->get();
                    break;

                case 1:
                    $query->where('users.classId', \Auth::user()->organizeID);
                    $data = DB::table('schoolclass as cla')
                        ->leftJoin('schoolgrade as gra', 'gra.id', '=', 'cla.parentId')
                        ->leftJoin('school as s', 's.id', '=', 'gra.parentId')
                        ->leftJoin('county as cou', 'cou.id', '=', 's.countryId')
                        ->leftJoin('city as c', 'cou.parent_id', '=', 'c.id')
                        ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                        ->where('cla.id', \Auth::user()->organizeID)
                        ->select('cla.id as classid', 'cla.classname', 'gra.id as gradeid', 'gra.gradeName', 's.id as schoolid', 's.schoolName', 'cou.id as countyid', 'cou.county_name', 'c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                        ->first();
                    break;
            }

        }


        //按用户类型搜索
        if ($request->type) {
            $query->where('users.type', $request->type);
            $result['type'] = $request->type;
        } else {
            $result['type'] = false;
        }

        //按用户名搜索
        if ($request->username) {
            $query->where('username', 'like', '%' . $request->username . '%');
            $result['username'] = $request->username;
        } else {
            $result['username'] = false;
        }



        //导出的数据处理
        $excels = $query->select('users.id as 编号', 'users.username as 用户名', 'users.realname as 姓名', 'users.email as 邮箱', 'users.sex as 性别(0:男,1:女)', 'users.phone as 手机号', 'users.IDcard as 身份证号', 'users.intro as 备注', 'users.type as 类型(1:教师,2:家长,3:学生)', 'users.childNick as 孩子账号', 'users.sno as 学号', 's.schoolName as 学校', 'gra.gradeName as 年级', 'cla.classname as 班级', 'sub.subjectName as 学科', 'org.organize_name as 省份', 'ci.city_name as 市区', 'cou.county_name as 县区', 'users.created_at as 创建时间', 'users.updated_at as 更新时间','roles.level as level')->where('users.username','<>',\Auth::user()->username)->get();
        //获取列表页总条数

        $count = count($excels);
        $excels = json_encode($excels);

        //列表页数据
        $userLists = $query
            ->select('users.*','roles.level')
            ->where(function($querys){
                $querys->where('roles.level','<',\Auth::user()->level())
                    ->orWhere('roles.level',null);
            })

            ->orderBy('users.id', 'desc')
            ->paginate();
//        dd($userLists);

        return view('qiyun.admin.users.userList', compact('userLists', 'excels', 'organizes', 'data', 'result', 'citys', 'countys', 'schools', 'grades', 'classes', 'count'));
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
                $arr['flag'] = true;
            }
        } else {
            $arr['flag'] = false;
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
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
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
                $arr['flag'] = true;
            }
        } else {
            $arr['flag'] = false;
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
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }
//        dd($arr);
        return response()->json($arr);
    }

    /**
     * 联动县区
     */
    public function county()
    {
        $id = $_POST['countyId']?$_POST['countyId']:null;
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
            $arr['status'] = false;
        }
        return response()->json($arr);
    }

    /**
     * 联动学校
     */
    public function school()
    {
        $id = $_POST['schoolId']?$_POST['schoolId']:null;
        //年级
        $data = DB::table('schoolgrade')->where(['parentId' => $id, 'status' => 1])->get();
        if ($data) {
            foreach ($data as $val) {
                $arr['grade'][] = ['gradeId' => $val->id, 'gradeName' => $val->gradeName];
                $arr['flag'] = true;
            }
        } else {
            $arr['flag'] = false;
        }
        //学校对应的年度
        $array = DB::table('informationreport')->where(['parentId' => $id, 'status' => 1])->get();
        if ($array) {
            foreach ($array as $val) {
                $arr['report'][] = ['id' => $val->id, 'reportName' => $val->reportName];
            }
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }
        //学校对应的部门
        $array = DB::table('schooldepartment')->where(['parent_id' => $id, 'status' => 1])->get();
        if ($array) {
            foreach ($array as $val) {
                $arr['depart'][] = ['id' => $val->id, 'departName' => $val->departName];
            }
            $arr['stat'] = true;
        } else {
            $arr['stat'] = false;
        }

        return response()->json($arr);
    }

    /**
     * 联动年度
     */
    public function report()
    {
        $id = $_POST['yearId']?$_POST['yearId']:null;
        //学期
        $data = DB::table('informationterm')->select('id', 'termName')->where(['parentId' => $id, 'status' => 1])->get();
//        dd($data);
        if ($data) {
            foreach ($data as $item) {
                $arr['term'][] = ['id' => $item->id, 'termName' => $item->termName];
            }
            $arr['status'] = true;
        } else {
            return response()->json(['status' => false]);
        }
        return response()->json($arr);
    }

    /**
     * 联动年级
     */
    public function grade()
    {
        $id = $_POST['gradeId']?$_POST['gradeId']:null;
        //班级
        $data = DB::table('schoolclass')->where(['parentId' => $id, 'status' => 1])->get();
        if ($data) {
            foreach ($data as $val) {
                $arr['schoolclass'][] = ['schoolclassId' => $val->id, 'schoolclassName' => $val->classname];
                $arr['flag'] = true;
            }
        } else {
            $arr['flag'] = false;
        }
        //学科
        $array = DB::table('schoolsubject')->where(['parentId' => $id, 'status' => 1])->get();
        if ($array) {
            foreach ($array as $item) {
                $arr['subject'][] = ['subjectId' => $item->id, 'subjectName' => $item->subjectName];
            }
            $arr['status'] = true;
        } else {
            $arr['status'] = false;
        }
        return response()->json($arr);
    }

    /**
     * 增加用户
     *
     */
    public function addUser()
    {
        //查询省份，并发送给添加页
        switch (\Auth::user()->level()) {
            case 8:
                $data = DB::table('organize')->select('id', 'organize_name')->where('status', 1)->get();
                break;
            case 7:
                $data = DB::table('organize')->select('id', 'organize_name')->where('status', 1)->get();
                break;
            case 6:
                $data = DB::table('organize')->where('id', \Auth::user()->organizeID)->select('id as organizeid', 'organize_name')->first();
                $data->cityNames = DB::table('city')->where('parent_id', Auth::user()->organizeID)->where('status', 1)->select('id', 'city_name')->get();
                break;
            case 5:
                $data = DB::table('city as c')
                    ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                    ->where('c.id', \Auth::user()->organizeID)
                    ->select('c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                    ->first();
                $data->countyNames = DB::table('county')->where('parent_id', Auth::user()->organizeID)->where('status', 1)->select('id', 'county_name')->get();
                break;
            case 4:
                $data = DB::table('county as cou')
                    ->leftJoin('city as c', 'cou.parent_id', '=', 'c.id')
                    ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                    ->where('cou.id', Auth::user()->organizeID)
                    ->select('cou.id as countyid', 'cou.county_name', 'c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                    ->first();
                $data->schoolNames = DB::table('school')->where('countryId', \Auth::user()->organizeID)->where('status', 1)->get();
                break;
            case 3:
                $data = DB::table('school as s')
                    ->leftJoin('county as cou', 'cou.id', '=', 's.countryId')
                    ->leftJoin('city as c', 'cou.parent_id', '=', 'c.id')
                    ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                    ->where('s.id', Auth::user()->organizeID)
                    ->select('s.id as schoolid', 's.schoolName', 'cou.id as countyid', 'cou.county_name', 'c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                    ->first();
                $data->gradeNames = DB::table('schoolgrade')->where('parentId', \Auth::user()->organizeID)->where('status', 1)->get();
                $data->reportNames = DB::table('informationreport')->where('parentId', \Auth::user()->organizeID)->where('status', 1)->get();
                $data->departNames = DB::table('schooldepartment')->where(['parent_id' => \Auth::user()->organizeID, 'status' => 1])->get();
                break;
            case 2:
                $data = DB::table('schoolgrade as gra')
                    ->leftJoin('school as s', 's.id', '=', 'gra.parentId')
                    ->leftJoin('county as cou', 'cou.id', '=', 's.countryId')
                    ->leftJoin('city as c', 'cou.parent_id', '=', 'c.id')
                    ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                    ->where('gra.id', Auth::user()->organizeID)
                    ->select('gra.id as gradeid', 'gra.gradeName', 's.id as schoolid', 's.schoolName', 'cou.id as countyid', 'cou.county_name', 'c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                    ->first();

                //查询出学校管理员对应的学校，确定部门
                $rec = DB::table('schoolgrade')->where('id', Auth::user()->organizeID)->first();
                $data->depart = DB::table('schooldepartment as dep')
                    ->leftJoin('school as s', 's.id', '=', 'dep.parent_id')
                    ->leftJoin('county as cou', 'cou.id', '=', 's.countryId')
                    ->leftJoin('city as c', 'cou.parent_id', '=', 'c.id')
                    ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                    ->where('dep.parent_id', $rec->parentId)
                    ->where('dep.status', 1)
                    ->select('dep.id as departid', 'departName')
                    ->get();
//                dd($data->depart);
                $data->classNames = DB::table('schoolclass')->where('parentId', \Auth::user()->organizeID)->where('status', 1)->get();
                $data->subjectNames = DB::table('schoolsubject')->where('parentId', \Auth::user()->organizeID)->where('status', 1)->get();
                break;

        }

        $nations = DB::table('user_nation')->get();

        return view('qiyun.admin.users.addUser', compact('data', 'nations'));
    }

    public function insertUser()
    {
        //插入用户
        $data = json_decode($_POST['data'], true);
        //没有头像，用默认值
        if (!$data['pic']) {
            unset($data['pic']);
        }
        //判断如有孩子账号字段，就销毁
        if ($data['childNick']) {
            if (rtrim($data['childNick'], ',')) {
                $childs = explode(',', rtrim($data['childNick'], ','));
            }
            unset($data['childNick']);
        }

        $data['status'] = 1;
        $data['checks'] = 1;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
//        dd($data);
        $validator = $this->validator($data);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'msg' => $validator->messages()->all()
                ]
            );
        }
        //获取用户插入的id
        $data['password'] = bcrypt($data['password']);
        $id = DB::table('users')->insertGetId($data);
        if ($id) {
            //当添加家长用户成功后，添加孩子账号到parent_child
            if (isset($childs)) {
                for ($i = 0; $i < count($childs); $i++) {
                    DB::table('parent_childs')->insert(['childNick' => $childs[$i], 'parentId' => $id]);
                }
            }

            //当插入用户为教师时，分别向grademember和schoolteachers插入一条数据
            if ($data['type'] == 1) {
                //向departmentmember中插入一条数据
                if (!empty($data['departId'])) {
                    $array = ['parentId' => $data['departId'], 'userId' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                    DB::table('departmentmember')->insert($array);
                }

                //向grademember中插入一条数据
                if (!empty($data['gradeId'])) {
                    $array = ['parentId' => $data['gradeId'], 'userId' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                    DB::table('grademember')->insert($array);
                }

                //向subjectmember插入一条数据
                if (!empty($data['subjectId'])) {
                    $array = ['parentId' => $data['subjectId'], 'userId' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                    DB::table('subjectmember')->insert($array);
                }
            }
            return response()->json(['status' => true, 'msg' => '添加成功！']);
        } else {
            return response()->json(['status' => false, 'msg' => '添加失败！']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //详情展示
        $Rec = DB::table('users')->where('id', $id)->first();
        $nations = DB::table('user_nation')->select('id','nation')->where('id',$Rec->nationId)->first();
        $Rec->nationId = $nations?$nations->nation:null;
        if ($Rec->type == 2) {
            $Rec->childs = DB::table('parent_childs')->where('parentId', $id)->get();
            if (!$Rec->childs) {
                $Rec->childs = false;
            }
        }
        $organizes = DB::table('organize')->where('id', $Rec->provinceId)->first();
        $citys = DB::table('city')->where('id', $Rec->cityId)->first();
        $countys = DB::table('county')->where('id', $Rec->countyId)->first();
        $schools = DB::table('school')->where('id', $Rec->schoolId)->first();
        $departs = DB::table('schooldepartment')->where('id',$Rec->departId)->first();
        $grades = DB::table('schoolgrade')->where('id', $Rec->gradeId)->first();
        $classes = DB::table('schoolclass')->where('id', $Rec->classId)->first();
        $subjects = DB::table('schoolsubject')->where('id', $Rec->subjectId)->first();
        $reports = DB::table('informationreport')->where('id', $Rec->reportId)->first();
        $terms = DB::table('informationterm')->where('id', $Rec->termId)->first();
        if ($organizes)
            $Rec->organize_name = $organizes->organize_name;
        if ($citys)
            $Rec->city_name = $citys->city_name;
        if ($countys)
            $Rec->county_name = $countys->county_name;
        if ($schools)
            $Rec->schoolName = $schools->schoolName;
        if($departs)
            $Rec->departName = $departs->departName;
        if ($grades)
            $Rec->gradeName = $grades->gradeName;
        if ($classes)
            $Rec->classname = $classes->classname;
        if ($subjects)
            $Rec->subjectName = $subjects->subjectName;
        if($reports)
            $Rec->reportName = $reports->reportName;
        if($terms)
            $Rec->termName = $terms->termName;
//        dd($Rec);
        return view('qiyun.admin.users.showUser', compact('Rec'));
    }

    /**
     * 用户个人显示
     */
    public function personDetail()
    {
        \Auth::user()->organizes = DB::table('organize')->where('id', \Auth::user()->provinceId)->first();
        \Auth::user()->citys = DB::table('city')->where('id', \Auth::user()->cityId)->first();
        \Auth::user()->countys = DB::table('county')->where('id', \Auth::user()->countyId)->first();
        \Auth::user()->schools = DB::table('school')->where('id', \Auth::user()->schoolId)->first();
        \Auth::user()->departs = DB::table('schooldepartment')->where('id', \Auth::user()->departId)->first();
        \Auth::user()->grades = DB::table('schoolgrade')->where('id', \Auth::user()->gradeId)->first();
        \Auth::user()->classes = DB::table('schoolclass')->where('id', \Auth::user()->classId)->first();
        \Auth::user()->subjects = DB::table('schoolsubject')->where('id', \Auth::user()->subjectId)->first();
        \Auth::user()->nations = DB::table('user_nation')->where('id', \Auth::user()->nationId)->first();
        return view('qiyun.admin.users.personDetail');
    }

    /**
     *检查用户名唯一性的接口
     */

    public function checkUsername()
    {
        //接收输入的用户名
        $username = $_POST['username_text'];
        $rec = DB::table('users')->where('username', $username)->first();
        if ($rec) {
            return response()->json(['flag' => true, 'meg' => '用户名已存在！']);
        } else {
            return response()->json(['flag' => false]);
        }
    }

    /**
     *检查邮箱唯一性的接口
     */

    public function checkEmail()
    {
        //接收输入的用户名
        $email = $_POST['email'];
        $rec = DB::table('users')->where('email', $email)->first();
//        dd($rec);
        if ($rec) {
            return response()->json(['flag' => true, 'meg' => '邮箱已存在！']);
        } else {
            return response()->json(['flag' => false]);
        }
    }

    /**
     *检查手机唯一性的接口
     */

    public function checkPhone()
    {
        //接收输入的用户名
        $phone = $_POST['phone'];
        $rec = DB::table('users')->where('phone', $phone)->first();
//        dd($rec);
        if ($rec) {
            return response()->json(['flag' => true, 'meg' => '手机号码已存在！']);
        } else {
            return response()->json(['flag' => false]);
        }
    }

    /**
     *检查手机唯一性的接口
     */

    public function checkIDcard()
    {
        //接收输入的用户名
        $IDcard = $_POST['IDcard'];
        $rec = DB::table('users')->where('IDcard', $IDcard)->first();
//        dd($rec);
        if ($rec) {
            return response()->json(['flag' => true, 'meg' => '身份证号已存在！']);
        } else {
            return response()->json(['flag' => false]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function editUser($id)
    {
        //查询省份，并发送给添加页
        switch (\Auth::user()->level()) {
            case 8:
                $data = DB::table('organize')->select('id', 'organize_name')->where('status', 1)->get();
                break;
            case 7:
                $data = DB::table('organize')->select('id', 'organize_name')->where('status', 1)->get();
                break;
            case 6:
                $data = DB::table('organize')->where('id', \Auth::user()->organizeID)->select('id as organizeid', 'organize_name')->first();
                $data->cityNames = DB::table('city')->where('parent_id', Auth::user()->organizeID)->where('status', 1)->select('id', 'city_name')->get();
                break;
            case 5:
                $data = DB::table('city as c')
                    ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                    ->select('c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                    ->where('c.id', Auth::user()->organizeID)
                    ->first();
                $data->countyNames = DB::table('county')->where('parent_id', Auth::user()->organizeID)->where('status', 1)->select('id', 'county_name')->get();
                break;
            case 4:
                $data = DB::table('county as cou')
                    ->leftJoin('city as c', 'cou.parent_id', '=', 'c.id')
                    ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                    ->where('cou.id', Auth::user()->organizeID)
                    ->select('cou.id as countyid', 'cou.county_name', 'c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                    ->first();
                $data->schoolNames = DB::table('school')->where('countryId', \Auth::user()->organizeID)->where('status', 1)->get();
                break;
            case 3:
                $data = DB::table('school as s')
                    ->leftJoin('county as cou', 'cou.id', '=', 's.countryId')
                    ->leftJoin('city as c', 'cou.parent_id', '=', 'c.id')
                    ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                    ->where('s.id', Auth::user()->organizeID)
                    ->select('s.id as schoolid', 's.schoolName', 'cou.id as countyid', 'cou.county_name', 'c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                    ->first();
                $data->gradeNames = DB::table('schoolgrade')->where('parentId', \Auth::user()->organizeID)->where('status', 1)->get();
                $data->reportNames = DB::table('informationreport')->where('parentId', \Auth::user()->organizeID)->where('status', 1)->get();
                $data->departNames = DB::table('schooldepartment')->where('parent_id', \Auth::user()->organizeID)->where('status', 1)->get();
                break;
            case 2:
                $data = DB::table('schoolgrade as gra')
                    ->leftJoin('school as s', 's.id', '=', 'gra.parentId')
                    ->leftJoin('county as cou', 'cou.id', '=', 's.countryId')
                    ->leftJoin('city as c', 'cou.parent_id', '=', 'c.id')
                    ->leftJoin('organize as o', 'c.parent_id', '=', 'o.id')
                    ->where('gra.id', Auth::user()->organizeID)
                    ->select('gra.id as gradeid', 'gra.gradeName', 's.id as schoolid', 's.schoolName', 'cou.id as countyid', 'cou.county_name', 'c.id as cityid', 'c.city_name', 'o.id as organizeid', 'o.organize_name')
                    ->first();
                $data->classNames = DB::table('schoolclass')->where('parentId', \Auth::user()->organizeID)->where('status', 1)->get();
                $data->subjectNames = DB::table('schoolsubject')->where('parentId', \Auth::user()->organizeID)->where('status', 1)->get();
                break;

        }
        //修改用户是家长时
        $Rec = DB::table('users')->where('id', $id)->first();
        if ($Rec->type == 2) {
            $Rec->childs = DB::table('parent_childs')->where('parentId', $id)->get();
            if (!$Rec->childs) {
                $Rec->childs = false;
            }
        }

        if ($Rec->provinceId)
            $Rec->citys = DB::table('city')->where('parent_id', $Rec->provinceId)->where('status', 1)->get();
        else
            $Rec->citys = false;

        if ($Rec->cityId)
            $Rec->countys = DB::table('county')->where('parent_id', $Rec->cityId)->where('status', 1)->get();
        else
            $Rec->countys = false;

        if ($Rec->countyId)
            $Rec->schools = DB::table('school')->where('countryId', $Rec->countyId)->where('status', 1)->get();
        else
            $Rec->schools = false;

        if ($Rec->schoolId) {
            $Rec->grades = DB::table('schoolgrade')->where('parentId', $Rec->schoolId)->where('status', 1)->get();
            $Rec->reports = DB::table('informationreport')->where('parentId', $Rec->schoolId)->where('status', 1)->get();
            $Rec->departs = DB::table('schooldepartment')->where('parent_id', $Rec->schoolId)->where('status', 1)->get();
        } else {
            $Rec->grades = false;
            $Rec->reports = false;
            $Rec->departs = false;
        }

        if ($Rec->reportId)
            $Rec->terms = DB::table('informationterm')->where('parentId', $Rec->reportId)->where('status', 1)->get();
        else
            $Rec->terms = false;

        if ($Rec->gradeId) {
            $Rec->classes = DB::table('schoolclass')->where('parentId', $Rec->gradeId)->where('status', 1)->get();
            $Rec->subjects = DB::table('schoolsubject')->where('parentId', $Rec->gradeId)->where('status', 1)->get();
        } else {
            $Rec->classes = false;
            $Rec->subjects = false;
        }

        $Rec->nations = DB::table('user_nation')->get();
//        dd($Rec->nations);

        return view('qiyun.admin.users.editUser', compact('Rec', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser()
    {
        //更新用户
        $data = json_decode($_POST['data'], true);
        //没有头像，用默认值
        if (!$data['pic']) {
            unset($data['pic']);
        }
        $data['updated_at'] = Carbon::now();
        $data['password'] = '123456';
        $validator = $this->validator($data);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'msg' => $validator->messages()->all()
                ]
            );
        }
        unset($data['password']);
        //判断如有孩子账号字段，就销毁
        if($data['childNick']){
            if (rtrim($data['childNick'], ',')) {
                $childs = explode(',', rtrim($data['childNick'], ','));
            }
            unset($data['childNick']);
        }
        $affect_rows = DB::table('users')->where('id', '=', $data['id'])->update($data);
        if ($affect_rows) {
            //当添加家长用户成功后，添加孩子账号到parent_child
            if (isset($childs)) {
                for ($i = 0; $i < count($childs); $i++) {
                    $array[] = ['childNick' => $childs[$i], 'parentId' => $data['id']];
                }
                //当孩子账号表中有数据，则先删除，再添加
                if(DB::table('parent_childs')->where('parentId',$data['id'])){
                    DB::table('parent_childs')->where('parentId',$data['id'])->delete();
                    DB::table('parent_childs')->insert($array);
                }else{//没有直接添加
                    DB::table('parent_childs')->insert($array);
                }
            }
//            当修改用户为教师且审核通过时，判断并分别修改grademember和schoolteachers的数据或插入数据
            if ($data['type'] == 1 && $data['checks'] == 1) {
                //判断grademember有无数据，有就修改，没有就插入
                if (!empty($data['gradeId'])) {
                    if (DB::table('grademember')->where(['userId' => $data['id']])->get()) {
                        DB::table('grademember')->where(['userId' => $data['id']])->update(['parentId' => $data['gradeId'], 'updated_at' => Carbon::now()]);
                    } else {
                        $arr = ['parentId' => $data['gradeId'], 'userId' => $data['id'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                        DB::table('grademember')->insert($arr);
                    }
                } else {
                    if (DB::table('grademember')->where(['userId' => $data['id']])->get()) {
                        DB::table('grademember')->where(['userId' => $data['id']])->delete();
                    }
                }

                //判断subjectmember有无数据，有就修改，没有就插入
                if (!empty($data['subjectId'])) {
                    if (DB::table('subjectmember')->where(['userId' => $data['id']])->get()) {
                        DB::table('subjectmember')->where(['userId' => $data['id']])->update(['parentId' => $data['subjectId'], 'updated_at' => Carbon::now()]);
                    } else {
                        $array = ['parentId' => $data['subjectId'], 'userId' => $data['id'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                        DB::table('subjectmember')->insert($array);
                    }
                } else {
                    if (DB::table('subjectmember')->where(['userId' => $data['id']])->get()) {
                        DB::table('subjectmember')->where(['userId' => $data['id']])->delete();
                    }
                }

                //判断departmentmember有无数据，有就修改，没有就插入
                if (!empty($data['departId'])) {
                    if (DB::table('departmentmember')->where(['userId' => $data['id']])->get()) {
                        DB::table('departmentmember')->where(['userId' => $data['id']])->update(['parentId' => $data['departId'], 'updated_at' => Carbon::now()]);
                    } else {
                        $array = ['parentId' => $data['departId'], 'userId' => $data['id'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                        DB::table('departmentmember')->insert($array);
                    }
                } else {
                    if (DB::table('departmentmember')->where(['userId' => $data['id']])->get()) {
                        DB::table('departmentmember')->where(['userId' => $data['id']])->delete();
                    }
                }
            }
            return response()->json(['status' => true, 'msg' => '修改成功！']);
        } else {
            return response()->json(['status' => false, 'msg' => '修改失败！']);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function delUser()
    {
        //删除用户
        $id = $_POST['id'];
//        dd($id);
        $res = DB::table('users')->where('id', '=', $id)->delete();
        if ($res) {
            //删除部门分组
            $departId = DB::table('departmentmember')->where('userId',$id)->get();
            if($departId)
                DB::table('departmentmember')->where('userId',$id)->delete();

            //删除年级分组
            $gradeId = DB::table('grademember')->where('userId', $id)->get();
            if ($gradeId)
                DB::table('grademember')->where('userId', $id)->delete();

            //删除学科分组
            $subjectId = DB::table('subjectmember')->where('userId', $id)->get();
            if ($subjectId)
                DB::table('subjectmember')->where('userId', $id)->delete();

            //删除孩子账号
            $childs = DB::table('parent_childs')->get();
            if($childs)
                DB::table('parent_childs')->where('parentId',$id)->delete();

            return response()->json(
                [
                    'status' => true,
                    'msg' => '删除成功！'
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'msg' => '删除失败！'
                ]
            );
        }
    }

    /**
     * resetPass the specified resource from storage.
     */
    public function resetPass($id)
    {
        //重置密码
        $res = DB::table('users')->find($id);
        return view('qiyun.admin.users.resetPass', compact('res'));
    }

    /**
     * resetPass the specified resource from storage.
     */

    public function reset()
    {
        //提交密码
        $id = $_POST['id'];
        $newPass = $_POST['newPass'];
        $conPass = $_POST['conPass'];
        if ($newPass == "") {
            return response()->json(
                [
                    'status' => false,
                    'msg' => '新密码不能为空！'
                ]
            );
        }
        if ($conPass == "") {
            return response()->json(
                [
                    'status' => false,
                    'msg' => '确认密码不能为空！'
                ]
            );
        }
        if (preg_match('/^[0-9a-zA-Z_]{6,16}$/', $newPass) && preg_match('/^[0-9a-zA-Z_]{6,16}$/', $conPass)) {
            if ($newPass === $conPass) {
                $data['password'] = bcrypt($_POST['newPass']);
                $data['updated_at'] = Carbon::now();
                $res = DB::table('users')->where('id', '=', $id)->update($data);
                if ($res) {
                    return response()->json(
                        [
                            'status' => true,
                            'msg' => '重置成功！'
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            'status' => false,
                            'msg' => '重置失败！'
                        ]
                    );
                }
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'msg' => '两次密码不一致!'
                    ]
                );
            }
        } else {
            return response()->json(
                [
                    'status' => false,
                    'msg' => '密码为6-16位字母或数字!'
                ]
            );
        }

    }

    /**
     * 状态值修改
     */
    public function changeStatus()
    {
        //状态值修改
        $id = $_POST['id'];
        $checks = $_POST['checks'];
        $res = DB::table('users')->where('id', '=', $id)->update(['checks' => $checks, 'updated_at' => Carbon::now()]);
        if ($res) {
            //当用户状态改变时，对部门，年级，学科三个分组操作
            $rec = DB::table('users')->where('id', $id)->first();
            //只有当用户为教师时操作
            if ($rec->type == 1) {
                if ($checks) {//未审核->已审核
                    //向departmentmember中插入一条数据
                    if (!empty($rec->departId)) {
                        $array = ['parentId' => $rec->departId, 'userId' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                        DB::table('departmentmember')->insert($array);
                    }

                    //向grademember中插入一条数据
                    if (!empty($rec->gradeId)) {
                        $array = ['parentId' => $rec->gradeId, 'userId' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                        DB::table('grademember')->insert($array);
                    }

                    //向subjectmember插入一条数据
                    if (!empty($rec->subjectId)) {
                        $array = ['parentId' => $rec->subjectId, 'userId' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                        DB::table('subjectmember')->insert($array);
                    }
                } else {//已审核->未审核(从相应分组表中删除数据)
                    if (DB::table('departmentmember')->where(['userId' => $id])->get()) {
                        DB::table('departmentmember')->where(['userId' => $id])->delete();
                    }

                    if (DB::table('grademember')->where(['userId' => $id])->get()) {
                        DB::table('grademember')->where(['userId' => $id])->delete();
                    }

                    if (DB::table('subjectmember')->where(['userId' => $id])->get()) {
                        DB::table('subjectmember')->where(['userId' => $id])->delete();
                    }
                }

            }

            return response()->json(['status' => true, 'msg' => $checks == 1 ? '已审核' : '未审核']);
        } else {
            return response()->json(['status' => false, 'msg' => '修改失败！']);
        }
    }


    //Ajax上传图片
    public function imgUpload()
    {
        $file = Input::file('file');
        $id = Input::get('id');
        $allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only upload png, jpg or gif.'];
        }

        $destinationPath = 'uploads/images/';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10) . '.' . $extension;
        $file->move($destinationPath, $fileName);
        return Response::json(
            [
                'success' => true,
                'pic' => asset($destinationPath . $fileName),
                'id' => $id
            ]
        );
    }

    /**
     * verify the specified resource from storage.
     *
     */
    protected function validator(array $data)
    {
        $rules = [
            'username' => 'required|min:5|max:24',
            'realname' => 'required|min:2|max:10',
            'password' => 'required|min:6|max:16',
            'phone' => 'required|digits:11',
            'email' => 'required|email',
            'IDcard' => 'required'
        ];

        $messages = [
            'username.required' => '请输入用户名',
            'username.min' => '用户名最少5位',
            'username.max' => '用户名最多24位',
            'realname.required' => '请输入姓名',
            'realname.min' => '姓名最少两位字母或汉字',
            'realname.max' => '姓名最多十位字母或汉字',
            'password.required' => '请输入密码',
            'password.min' => '密码最少6位',
            'password.max' => '密码最多16位',
            'phone.required' => '请输入手机号',
            'phone.digits' => '手机号为11位数字',
            'email.required' => '请输入您的邮箱',
            'email.email' => '请输入正确的Email格式',
            'IDcard.required' => '身份证号应为18位数字或字母'
        ];

        return Validator::make($data, $rules, $messages);
    }

    public function addImg(Request $request)
    {
        //获取文件后缀名
        $ext = strrchr($_FILES['Filedata']['name'], '.');

        if ($request->hasFile('Filedata')) {
            if ($request->file('Filedata')->isValid()) {
                $newname = time() . $ext;
                if ($request->file('Filedata')->move('./uploads/heads/', $newname)) {

                    $img = Image::make(realpath(base_path('public')) . '/uploads/heads/' . $newname)->resize(89, 120);
                    $img->save(realpath(base_path('public')) . '/uploads/heads/small' . $newname);
                    echo '/uploads/heads/small' . $newname;

                    if (file_exists(realpath(base_path('public')) . '/uploads/heads/' . $newname)) {
                        unlink(realpath(base_path('public')) . '/uploads/heads/' . $newname);
                    }
                }
            }
        } else {
            echo 0;  //没有文件上传
        }
    }

}
