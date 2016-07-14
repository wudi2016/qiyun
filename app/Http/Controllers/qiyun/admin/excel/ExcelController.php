<?php

namespace App\Http\Controllers\qiyun\admin\excel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Excel;
use Input;
use Auth;
use Carbon\Carbon;

class ExcelController extends Controller
{
    /**
     *导入学校信息
     */
    public function schoolImport()
    {
        return $this->import('school');
    }

    /**
     *导出学校信息
     */
    public function schoolExport(Request $request)
    {
        $info = json_decode($request['export']);
        return $this->export($info, '学校信息');
    }

    /**
     *下载学校导入模板样式
     */
    public function schoolTemplate()
    {
        $megs = ['学校名称', '学校简介', '学校电话', '填写对应的省级的id(参考省级单位)', '填写对应的市级id(参考市单位)', '填写对应的区县级id(参考区县单位)', '学校的负责人'];
        $this->template('school', '学校导入模板', $megs);
    }

    /**
     * 导入学校年度信息
     */
    public function schoolYearImport()
    {
        return $this->import('informationreport');
    }

    /**
     *下载学校年度导入模板样式
     */
    public function schoolYearTemplate()
    {
        $megs = ['对应的学校id(参考学校列表)', '年度名称', '年度开始时间(如:2016-02-02 15:51:04)', '结束时间(2016-02-02 15:51:04)', '年度标题', '内容', '报告年'];
        $this->template('informationreport', '学校年度导入模板', $megs);
    }

    /**
     *导入学期信息
     */
    public function schoolTermImport()
    {
        return $this->import('informationterm');
    }

    /**
     *下载学期导入模板样式
     */
    public function schoolTermTemplate()
    {
        $megs = ['对应的年度id(参考年度列表)', '学期名称', '学期开始时间(如:2016-02-02 15:51:04)', '结束时间(2016-02-02 15:51:04)', '学期标题', '内容', '报告年'];
        $this->template('informationterm', '学校学期导入模板', $megs);
    }

    /**
     *导入年级信息
     */
    public function schoolGradeImport()
    {
        return $this->import('schoolgrade');
    }

    /**
     *下载年级导入模板样式
     */
    public function schoolGradeTemplate()
    {
        $megs = ['对应的学校id(参考学校列表)', '年级名称', '所属的学段(请填数字123:1表示小学2表示初中3表示高中)', '是否毕业年级(请填0或1:0表示否1表示是)'];
        $this->template('schoolgrade', '年级导入模板', $megs);
    }

    /**
     *导入班级信息
     */
    public function schoolClassImport()
    {
        return $this->import('schoolclass');
    }

    /**
     *下载班级导入模板样式
     */
    public function schoolClassTemplate()
    {
        $megs = ['对应的年级id(参考年级列表)', '班级名称', '班级属性(请填数字123:1表示普通班2表示重点班3表示实验班)'];
        $this->template('schoolclass', '班级导入模板', $megs);
    }

    /**
     * 导入任课老师信息
     */
    public function schoolTeachers()
    {
        return $this->import('schoolteachers');
    }

    /**
     *导出任课老师信息
     */
    public function schoolTeachersExport(Request $request)
    {
        $info = json_decode($request['export']);
         return $this->export($info, '任课老师信息');//调用excel封装导出
    }

    /**
     *下载任课老师导入模板样式
     */
    public function schoolTeachersTemplate()
    {
        $megs = ['对应的学科id(参考学校学科设置)', '对应的班级id(参考班级表)', '用户的id(参考用户管理)'];
        $this->template('schoolteachers', '任课老师导入模板', $megs);
    }

    /**
     *导入班主任
     */
    public function schoolHeadteacherImport()
    {
        return $this->import('schoolheadteacher');
    }

    /**
     *导出班主任
     */
    public function schoolHeadteacherExport(Request $request)
    {
        $info = json_decode($request['export']);
        return $this->export($info, '班主任信息');//调用excel封装导出
    }

    /**
     *下载班主任导入模板样式
     */
    public function schoolHeadteacherTemplate()
    {
        $megs = ['对应的班级id(参考班级表)', '用户的id(参考用户管理)'];
        $this->template('schoolheadteacher', '班主任导入模板', $megs);
    }

    /**
     * 导入年级组长
     */
    public function schoolGradeleaderImport()
    {
        return $this->import('schoolgradeleader');
    }

    /**
     *导出年级组长
     */
    public function schoolGradeleaderExport(Request $request)
    {
        $info = json_decode($request['export']);
         return $this->export($info, '年级组长信息');
    }

    /**
     *下载年级组长导入模板样式
     */
    public function schoolGradeleaderTemplate()
    {
        $megs = ['对应的年级id(参考年级表)', '用户的id(参考用户管理)'];
        $this->template('schoolgradeleader', '年级组长导入模板', $megs);
    }

    /**
     * 导入部门负责人
     */
    public function schoolDepartmentleaderImport()
    {
        return $this->import('schooldepartmentleader');
    }

    /**
     *导出部门负责人
     */
    public function schoolDepartmentleaderExport(Request $request)
    {
        $info = json_decode($request['export']);
         return $this->export($info, '部门负责人信息');
    }

    /**
     *下载部门负责人导入模板样式
     */
    public function schoolDepartmentleaderTemplate()
    {
        $megs = ['对应的部门id(参考学校部门管理)', '用户的id(参考用户管理)'];
        $this->template('schooldepartmentleader', '部门负责人导入模板', $megs);
    }

    /**
     *导入教研组长
     */
    public function schoolTeacgroupleaderImport()
    {
        return $this->import('schoolteacgroupleader');
    }

    /**
     *导出教研组长
     */
    public function schoolTeacgroupleaderExport(Request $request)
    {
        $info = json_decode($request['export']);
         return $this->export($info, '教研组长信息');
    }

    /**
     *下载教研组长导入模板样式
     */
    public function schoolTeacgroupleaderTemplate()
    {
        $megs = ['对应的教研组id(参考学校教研组设置)', '用户的id(参考用户管理)'];
        $this->template('schoolteacgroupleader', '教研组长导入模板', $megs);
    }

    /**
     *导入备课组长
     */
    public function schoolLessonleaderImport()
    {
        return $this->import('schoollessonleader');
    }

    /**
     *导出备课组长
     */
    public function schoolLessonleaderExport(Request $request)
    {
        $info = json_decode($request['export']);
        return $this->export($info, '备课组长信息');
    }

    /**
     *下载备课组长导入模板样式
     */
    public function schoolLessonleaderTemplate()
    {
        $megs = ['对应的学科id(参考学校学科设置)', '用户的id(参考用户管理)'];
        $this->template('schoollessonleader', '备课组长导入模板', $megs);
    }


    /**
     * 城市导入
     */
    public function cityImport()
    {
        return $this->import('city');
    }


    /**
     * 城市导出
     */
    public function cityExport()
    {
        $common = DB::table('city as ci')
            ->join('organize as o', 'o.id', '=', 'ci.parent_id')
            ->select('ci.id', 'ci.city_name', 'o.organize_name', 'ci.city_intro', 'ci.city_tel', 'ci.status', 'ci.created_at', 'ci.updated_at');
        if (\Auth::user()->level() > 6) {
            $info = $common
                ->get();
            return $this->export($info, '城市信息表');
        }
        if (\Auth::user()->level() == 6) {
            $info = $common
                ->where('o.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '城市信息表');
        }
        if (\Auth::user()->level() == 5) {
            $info = $common
                ->where('ci.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '城市信息表');
        }

    }

    /**
     *下载城市导入模板样式
     */
    public function cityTemplate()
    {
        $megs = ['城市名称', '填写对应的省级的id(参考省级单位)', '城市信息', '电话'];
        $this->template('city', '城市导入模板', $megs);
    }


    /**
     * 县区导入
     */
    public function countyImport()
    {
        return $this->import('county');
    }

    /**
     * 县区导出
     */
    public function countyExport()
    {
        $common = DB::table('county as co')
            ->join('city as ci', 'ci.id', '=', 'co.parent_id')
            ->join('organize as o', 'o.id', '=', 'ci.parent_id')
            ->select('co.id', 'co.county_name', 'ci.city_name', 'co.county_intro', 'co.county_tel', 'co.status', 'co.created_at', 'co.updated_at');
        if (\Auth::user()->level() > 6) {
            $info = $common
                ->get();
            return $this->export($info, '县区信息表');
        }
        if (Auth::user()->level() == 6) {
            $info = $common
                ->where('o.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '县区信息表');
        }
        if (Auth::user()->level() == 5) {
            $info = $common
                ->where('ci.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '县区信息表');
        }
        if (Auth::user()->level() == 4) {
            $info = $common
                ->where('co.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '县区信息表');
        }

    }

    /**
     *下载区县导入模板样式
     */
    public function countyTemplate()
    {
        $megs = ['县区名称', '填写对应的市区级的id(参考市级单位)', '县区信息', '电话'];
        $this->template('county', '县区导入模板', $megs);
    }


    /**
     * 部门导入excel
     */
    public function departmentImport()
    {
        return $this->import('schooldepartment');
    }

    /**
     * 部门导出excel
     */
    public function departmentExport()
    {

        $common = DB::table('schooldepartment as sp')
            ->join('school as s', 's.id', '=', 'sp.parent_id')
            ->join('city as ci', 's.cityId', '=', 'ci.id')
            ->join('county as co', 's.countryId', '=', 'co.id')
            ->join('organize as o', 's.organizeid', '=', 'o.id')
            ->select('sp.*', 's.schoolName');

        if (\Auth::user()->level() > 6) {
            $info = $common
                ->get();
            return $this->export($info, '部门设置表');
        }
        if (Auth::user()->level() == 6) {
            $info = $common
                ->where('o.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '部门设置表');
        }
        if (Auth::user()->level() == 5) {
            $info = $common
                ->where('ci.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '部门设置表');
        }
        if (Auth::user()->level() == 4) {
            $info = $common
                ->where('co.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '部门设置表');
        }
        if (Auth::user()->level() == 3) {
            $info = $common
                ->where('s.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '部门设置表');
        }
    }

    /**
     *下载部门导入模板样式
     */
    public function departmentTemplate()
    {
        $megs = ['填写对应的学校的id(参考学校单位)', '部门名称'];
        $this->template('schooldepartment', '部门导入模板', $megs);
    }


    /**
     * 教室导入
     */
    public function classImport()
    {
        return $this->import('schoolclassroom');
    }

    /**
     * 教室导出
     */
    public function classExport()
    {
        $common = DB::table('schoolclassroom as sc')
            ->join('school as s', 's.id', '=', 'sc.parentId')
            ->join('city as ci', 's.cityId', '=', 'ci.id')
            ->join('county as co', 's.countryId', '=', 'co.id')
            ->join('organize as o', 's.organizeid', '=', 'o.id')
            ->select('sc.*', 's.schoolName');

        if (\Auth::user()->level() > 6) {
            $info = $common
                ->get();
            return $this->export($info, '教室设置表');
        }
        if (Auth::user()->level() == 6) {
            $info = $common
                ->where('o.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '教室设置表');
        }
        if (Auth::user()->level() == 5) {
            $info = $common
                ->where('ci.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '教室设置表');
        }
        if (Auth::user()->level() == 4) {
            $info = $common
                ->where('co.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '教室设置表');
        }
        if (Auth::user()->level() == 3) {
            $info = $common
                ->where('s.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '教室设置表');
        }
    }


    /**
     *下载教室导入模板样式
     */
    public function classTemplate()
    {
        $megs = ['填写对应的学校的id(参考学校单位)', '教室名称', '教室信息'];
        $this->template('schoolclassroom', '教室导入模板', $megs);
    }


    /**
     * 学科导入
     */
    public function subjectImport()
    {
        return $this->import('schoolsubject');
    }

    /**
     * 学科导出
     */
    public function subjectExport()
    {
        $common = DB::table('schoolsubject as ss')
            ->join('schoolgrade as sg', 'sg.id', '=', 'ss.parentId')
            ->join('school as s', 's.id', '=', 'sg.parentId')
            ->join('city as ci', 's.cityId', '=', 'ci.id')
            ->join('county as co', 's.countryId', '=', 'co.id')
            ->join('organize as o', 's.organizeid', '=', 'o.id')
            ->select('ss.*', 'sg.gradeName');

        if (\Auth::user()->level() > 6) {
            $info = $common
                ->get();
            return $this->export($info, '学科设置表');
        }
        if (Auth::user()->level() == 6) {
            $info = $common
                ->where('o.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '学科设置表');
        }
        if (Auth::user()->level() == 5) {
            $info = $common
                ->where('ci.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '学科设置表');
        }
        if (Auth::user()->level() == 4) {
            $info = $common
                ->where('co.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '学科设置表');
        }
        if (Auth::user()->level() == 3) {
            $info = $common
                ->where('s.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '学科设置表');
        }
    }

    /**
     *下载学科导入模板样式
     */
    public function subjectTemplate()
    {
        $megs = ['填写对应的年级的id(参考年级单位)', '学科名称'];
        $this->template('schoolsubject', '学科导入模板', $megs);
    }


    /**
     * 教研组导入
     */
    public function teachImport()
    {
        return $this->import('schoolteachgroup');
    }

    /**
     * 教研组导出
     */
    public function teachExport()
    {
        $common = DB::table('schoolteachgroup as st')
            ->join('school as s', 's.id', '=', 'st.parentId')
            ->join('schoolsubject as ss', 'ss.id', '=', 'st.subjectId')
            ->join('city as ci', 's.cityId', '=', 'ci.id')
            ->join('county as co', 's.countryId', '=', 'co.id')
            ->join('organize as o', 's.organizeid', '=', 'o.id')
            ->select('st.*', 's.schoolName', 'ss.subjectName');

        if (\Auth::user()->level() > 6) {
            $info = $common
                ->get();
            return $this->export($info, '教研组设置表');
        }
        if (Auth::user()->level() == 6) {
            $info = $common
                ->where('o.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '教研组设置表');
        }
        if (Auth::user()->level() == 5) {
            $info = $common
                ->where('ci.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '教研组设置表');
        }
        if (Auth::user()->level() == 4) {
            $info = $common
                ->where('co.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '教研组设置表');
        }
        if (Auth::user()->level() == 3) {
            $info = $common
                ->where('s.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '教研组设置表');
        }
    }


    /**
     *下载教研组导入模板样式
     */
    public function teachTemplate()
    {
        $megs = ['填写对应的学校的id(参考学校单位)', '教研组名称', '包含的学科id'];
        $this->template('schoolteachgroup', '教研组导入模板', $megs);
    }



    /**
     * 部门分组导入
     */
    public function teachdepImport()
    {
        return $this->import('departmentmember');
    }


    /**
     * 部门分组导出
     */
    public function teachdepExport()
    {
        $common = DB::table('departmentmember as dmm')
            ->join('users','users.id','=','dmm.userId')
            ->join('schooldepartment as sd','sd.id','=','dmm.parentId')
            ->join('school as s','s.id','=','sd.parent_id')
            ->join('county as co','co.id','=','s.countryId')
            ->join('city as ci','ci.id','=','co.parent_id')
            ->join('organize as o','o.id','=','ci.parent_id')
            ->select('o.organize_name','ci.city_name','co.county_name','s.schoolName','sd.departName','users.username','users.realname','dmm.isManage');

        if (\Auth::user()->level() > 6) {
            $info = $common
                ->get();
            return $this->export($info, '部门分组表');
        }
        if (Auth::user()->level() == 6) {
            $info = $common
                ->where('o.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '部门分组表');
        }
        if (Auth::user()->level() == 5) {
            $info = $common
                ->where('ci.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '部门分组表');
        }
        if (Auth::user()->level() == 4) {
            $info = $common
                ->where('co.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '部门分组表');
        }
        if (Auth::user()->level() == 3) {
            $info = $common
                ->where('s.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '部门分组表');
        }
    }


    /**
     *下载部门分组导入模板样式
     */
    public function teachdepTemplate()
    {
        $megs = ['填写对应的id(参考学校单位)', '是否负责人在状态标示 1为负责人 0为普通成员', '包含用户的id'];
        $this->template('departmentmember', '部门分组导入模板', $megs);
    }




    /**
     * 年级分组导入
     */
    public function teachgradeImport()
    {
        return $this->import('grademember');
    }


    /**
     * 部门分组导出
     */
    public function teachgradeExport()
    {
        $common = DB::table('grademember as gm')
                ->join('users','users.id','=','gm.userId')
                ->join('schoolgrade as sg','sg.id','=','gm.parentId')
                ->join('school as s','s.id','=','sg.parentId')
                ->join('county as co','co.id','=','s.countryId')
                ->join('city as ci','ci.id','=','co.parent_id')
                ->join('organize as o','o.id','=','ci.parent_id')
                ->select('o.organize_name','ci.city_name','co.county_name','s.schoolName','sg.gradeName','users.username','users.realname');

        if (\Auth::user()->level() > 6) {
            $info = $common
                ->get();
            return $this->export($info, '班级分组表');
        }
        if (Auth::user()->level() == 6) {
            $info = $common
                ->where('o.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '班级分组表');
        }
        if (Auth::user()->level() == 5) {
            $info = $common
                ->where('ci.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '班级分组表');
        }
        if (Auth::user()->level() == 4) {
            $info = $common
                ->where('co.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '班级分组表');
        }
        if (Auth::user()->level() == 3) {
            $info = $common
                ->where('s.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '班级分组表');
        }
    }


    /**
     *下载部门分组导入模板样式
     */
    public function teachgradeTemplate()
    {
        $megs = ['填写对应的id(参考学校单位)',  '包含用户的id'];
        $this->template('grademember', '年级分组导入模板', $megs);
    }


    /**
     * 学科分组导入
     */
    public function teachsubjectImport()
    {
        return $this->import('subjectmember');
    }


    /**
     * 学科分组导出
     */
    public function teachsubjectExport()
    {
        $common = DB::table('subjectmember as sm')
            ->join('users','users.id','=','sm.userId')
            ->join('schoolsubject as ss','ss.id','=','sm.parentId')
            ->join('schoolgrade as sg','sg.id','=','ss.parentId')
            ->join('school as s','s.id','=','sg.parentId')
            ->join('county as co','co.id','=','s.countryId')
            ->join('city as ci','ci.id','=','co.parent_id')
            ->join('organize as o','o.id','=','ci.parent_id')
            ->select('o.organize_name','ci.city_name','co.county_name','s.schoolName','sg.gradeName','ss.subjectName','users.username','users.realname');

        if (\Auth::user()->level() > 6) {
            $info = $common
                ->get();
            return $this->export($info, '学科分组');
        }
        if (Auth::user()->level() == 6) {
            $info = $common
                ->where('o.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '学科分组');
        }
        if (Auth::user()->level() == 5) {
            $info = $common
                ->where('ci.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '学科分组');
        }
        if (Auth::user()->level() == 4) {
            $info = $common
                ->where('co.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '学科分组');
        }
        if (Auth::user()->level() == 3) {
            $info = $common
                ->where('s.id', \Auth::user()->organizeID)
                ->get();
            return $this->export($info, '学科分组');
        }
    }


    /**
     *下载部门分组导入模板样式
     */
    public function teachsubjectTemplate()
    {
        $megs = ['填写对应的id(参考学校单位)',  '包含用户的id'];
        $this->template('subjectmember', '学科分组导入模板', $megs);
    }






    /**
     * 用户信息表的导入
     */
    public function userInfoImport()
    {
        return $this->userImport('users');
    }

    /**
     * 用户信息表-->导出下载模板
     */
    public function userInfoTemplate()
    {
        $megs = ['对应的用户username', '用户姓名realname', '邮箱Email', '性别sex(0:男,1:女)', '手机号phone', '学校ID(学校管理)','年级ID(年级管理)','班级ID','身份证号IDcard', '科目ID(科目管理)','部门ID(部门管理)','民族ID(班级管理)', '用户类型(老师:1,家长:2,学生:3)','学生类型(0:普通,1:统招,2:特长,3:复读4:借读)','孩子账号(账号1/账号2...)','省ID(省管理)', '市ID(市管理)', '县ID(县管理)','学号sno','年度ID(年度管理)','学期ID(学期管理)'];
        $this->template('users', '用户信息导入模板', $megs);
    }

    /**
     * 用户信息表的导出
     */
    public function userInfoExport()
    {
        $info = json_decode($_POST['excels']);
        foreach($info as $key=>$item)
        {
           if($item->level >= \Auth::user()->level()){
               unset($info[$key]);
           }
            unset($item->level);
        }
        return $this->export($info, '用户信息表');
    }


    /**
     *封装导入
     */
    public function import($table)
    {
        if (Input::hasFile('excel')) { //判断是否止传文件
            $entension = Input::file('excel')->getClientOriginalExtension();//上传文件的后缀
            dd($entension);
            if ($entension == 'xls' || $entension == 'xlsx') { //判断上传格式是否是excel格式
                Excel::load(Input::file('excel'), function ($reader) use ($table,&$result) {
                    $reader = $reader->getSheet(0);//获取excel的第几张表
                    $results = $reader->toArray();//获取表中的数据

                    $names = array_shift($results);//将数组中第一条数组取出

                    $info = DB::select("select column_name from information_schema.columns where `TABLE_SCHEMA` = 'laravel_51' and `TABLE_NAME` = ? ", [$table]);
                    foreach ($info as $val) {
                        $datas[$val->column_name] = $val->column_name;
                    }
                    $array = $datas;
                    unset($results[0]);
                    $c = array_diff($names,$array);
                    $flag = empty($c)?1:0;
                    if($flag){
                        foreach ($results as $key => $val) {
                            $data = array_combine($names, $val);

                            if(array_key_exists('startTime',$data)){
                                $time = substr(strrchr($data['startTime'],'-'),1,2).'-'.$data['startTime'];
                                $data['startTime'] = substr($time,0,8);
                            }
                            if(array_key_exists('endTime',$data)){
                                $time = substr(strrchr($data['endTime'],'-'),1,2).'-'.$data['endTime'];
                                $data['endTime'] = substr($time,0,8);
                            }

                            $data['created_at'] = date('Y-m-d H:i:s', time());
                            $data['updated_at'] = date('Y-m-d H:i:s', time());

                            DB::table($table)->insert($data);
                        }
                        $result = '1';
                    }else{
                        $result = '0';
                    }
                });

                if($result){
                    return redirect()->back()->with('status', '信息导入成功');

                }else{
                    return redirect()->back()->withInput()->withErrors('上传模板不匹配');
                }
            } else {
                return redirect()->back()->withInput()->withErrors('上传格式只支持excel');
            }
        } else {
            return redirect()->back()->withInput()->withErrors('没有导入文件');
        }
    }

    /**
     *封装导入
     */
    public function userImport($table)
    {
        if (Input::hasFile('excel')) { //判断是否止传文件
            $entension = Input::file('excel')->getClientOriginalExtension();//上传文件的后缀
            if ($entension == 'xls' || $entension == 'xlsx') { //判断上传格式是否是excel格式
                Excel::load(Input::file('excel'), function ($reader) use ($table,&$result,&$res,&$username,&$phone,&$email) {
                    $reader = $reader->getSheet(0);//获取excel的第几张表
                    $results = $reader->toArray();//获取表中的数据

                    $names = array_shift($results);//将数组中第一条数组取出

                    $info = DB::select("select column_name from information_schema.columns where `TABLE_SCHEMA` = 'laravel_51' and `TABLE_NAME` = ? ", [$table]);
                    foreach ($info as $val) {
                        $datas[$val->column_name] = $val->column_name;
                    }
                    $array = $datas;
                    unset($results[0]);//去除注释行
                    $c = array_diff($names,$array);
                    $flag = empty($c)?1:0;
                    if($flag){
                        //过滤数据库唯一字段重复导入的问题
                        foreach($results as $key=>$val){
                            $res = array_combine($names,$val);
                            if(!empty($res['username'])){
                                if(DB::table('users')->where('username',$res['username'])->first()){
                                    $username = true;
                                    return $username;
                                }
                            }
                            if(!empty($res['phone'])){
                                if(DB::table('users')->where('phone',$res['phone'])->first()){
                                    $phone = true;
                                    return $phone;
                                }
                            }
                            if(!empty($res['email'])){
                                if(DB::table('users')->where('email',$res['email'])->first()){
                                    $email = true;
                                    return $email;
                                }
                            }
                        }

                        //导入数据入库
                        foreach ($results as $key => $val) {
                            $data = array_combine($names, $val);
                            $data['created_at'] = Carbon::now();
                            $data['updated_at'] = Carbon::now();
                            $data['password'] = bcrypt('123456');
                            $data['checks'] = 1;
                            $data['status'] = 1;

                            $id = DB::table($table)->insertGetId($data);
                            if($id){
                                if($data['type'] == 1){
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
                                //导入用户为家长时，看有无孩子账号导入
                                if($data['type'] == 2){
                                    if(!empty($data['childNick'])){
                                        $array = explode('/',$data['childNick']);
                                        for($i=0;$i<count($array);$i++){
                                            DB::table('parent_childs')->insert(['parentId'=>$id,'childNick'=>$array[$i]]);
                                        }
                                    }
                                }
                            }
                        }
                        $result = '1';
                    }else{
                        $result = '0';
                    }
                });
                //如果数据库唯一字段已存在，那么就不导入，直接报错
                if($username) return redirect()->back()->with('error', "用户名{$res['username']}已存在");

                if($phone) return redirect()->back()->with('error', "手机号{$res['phone']}已存在");

                if($email) return redirect()->back()->with('error', "邮箱{$res['email']}已存在");


                if($result){
                    return redirect()->back()->with('status', '信息导入成功');
                }else{
                    return redirect()->back()->withInput()->withErrors('上传模板不匹配');
                }
            } else {
                return redirect()->back()->withInput()->withErrors('上传格式只支持excel');
            }
        } else {
            return redirect()->back()->withInput()->withErrors('没有导入文件');
        }
    }


    /**
     *封装导出
     */
    public function export($info, $title)
    {
        if(!$info){
            return redirect()->back()->withInput()->withErrors('没有数据可导出');
        }
        foreach ($info as $v) {
            $data[] = get_object_vars($v);
        }
        $titles = array_keys($data[0]);
        $titles = array_combine($titles, $titles);
        array_unshift($data, $titles);
        Excel::create(iconv('UTF-8', 'GBK',$title), function ($excel) use ($data) {
            $excel->sheet('sheet', function ($sheet) use ($data) {
                $sheet->rows($data);
            });
        })->download('xlsx');
    }

    /**
     *封装模板
     */
    public function template($table, $title, $msg)
    {
        $info = DB::select("select column_name from information_schema.columns where `TABLE_SCHEMA` = 'laravel_51' and `TABLE_NAME` = ? ", [$table]);
        foreach ($info as $val) {
            $datas[$val->column_name] = $val->column_name;
        }
        $array = $datas;
        $array['pic'] = 'pic';
        $array['password'] = 'password';
        $array['status'] = 1;
        $array['checks'] = 1;
        $array['remember_token'] = 'remember_token';
        $array['flowSwitch'] = 1;
        $array['uploadSwitch'] = 1;
        $array['isleave'] = 1;
        $array['intro'] = 'nihao';
        $array['organizeID'] = 11;

        if ($array['id']) {
            unset($array['id']);
        }
        if ($array['created_at']) {
            unset($array['created_at']);
        }
        if ($array['updated_at']) {
            unset($array['updated_at']);
        }
        if ($array['pic']) {
            unset($array['pic']);
        }
        if ($array['status']) {
            unset($array['status']);
        }
        if ($array['password']) {
            unset($array['password']);
        }
        if ($array['checks']) {
            unset($array['checks']);
        }
        if ($array['remember_token']) {
            unset($array['remember_token']);
        }
        if ($array['organizeID']) {
            unset($array['organizeID']);
        }
        if ($array['flowSwitch']) {
            unset($array['flowSwitch']);
        }
        if ($array['uploadSwitch']) {
            unset($array['uploadSwitch']);
        }
        if ($array['isleave']) {
            unset($array['isleave']);
        }
        if ($array['intro']) {
            unset($array['intro']);
        }


        $data[] = $array;
        $messages = array_combine($array, $msg);
        $data[1] = $messages;
        Excel::create($title, function ($excel) use ($data) {
            $excel->sheet('sheet', function ($sheet) use ($data) {
                $sheet->rows($data);
            });
        })->download('xlsx');
    }

}
