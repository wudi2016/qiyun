<?php

namespace App\Http\Controllers\qiyun\admin\graduation;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class GraduationController extends Controller
{
    /**
     *毕业学生升级列表
     */
    public function graduationList(Request $request){
        $query = DB::table('users as u');
        if($request['type'] == 1){
            $query = $query->where('u.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){
            $query = $query->where('u.sno','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){
            $query = $query->where('u.realname','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){
            $query = $query->where('s.schoolName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 5){
            $query = $query->where('g.gradeName','like','%'.trim($request['search']).'%');
        }
        if(Auth::user()->level() > 6){
            $data = $query
                ->leftJoin('school as s','u.schoolId','=','s.id')
                ->leftJoin('schoolgrade as g','u.gradeId','=','g.id')
                ->leftJoin('schoolclass as c','u.classId','=','c.id')
                ->where('type',3)
                ->where('isleave',0)
                ->select('u.id','u.sno','u.username','u.realname','u.email','u.sex','u.phone','u.schoolId','u.gradeId','u.classId','u.isleave','s.schoolName','g.gradeName','c.classname','g.isGraduate')
                ->paginate(15);
        }
        switch(Auth::user()->level()){
            case 6:
                $data = $query
                    ->leftJoin('school as s','u.schoolId','=','s.id')
                    ->leftJoin('schoolgrade as g','u.gradeId','=','g.id')
                    ->leftJoin('schoolclass as c','u.classId','=','c.id')
                    ->where('type',3)
                    ->where('isleave',0)
                    ->where('s.organizeid',Auth::user()->organizeID)
                    ->select('u.id','u.sno','u.username','u.realname','u.email','u.sex','u.phone','u.schoolId','u.gradeId','u.classId','u.isleave','s.schoolName','g.gradeName','c.classname','g.isGraduate')
                    ->paginate(15);
                break;
            case 5:
                $data = $query
                    ->leftJoin('school as s','u.schoolId','=','s.id')
                    ->leftJoin('schoolgrade as g','u.gradeId','=','g.id')
                    ->leftJoin('schoolclass as c','u.classId','=','c.id')
                    ->where('type',3)
                    ->where('isleave',0)
                    ->where('s.cityId',Auth::user()->organizeID)
                    ->select('u.id','u.sno','u.username','u.realname','u.email','u.sex','u.phone','u.schoolId','u.gradeId','u.classId','u.isleave','s.schoolName','g.gradeName','c.classname','g.isGraduate')
                    ->paginate(15);
                break;
            case 4:
                $data = $query
                    ->leftJoin('school as s','u.schoolId','=','s.id')
                    ->leftJoin('schoolgrade as g','u.gradeId','=','g.id')
                    ->leftJoin('schoolclass as c','u.classId','=','c.id')
                    ->where('type',3)
                    ->where('isleave',0)
                    ->where('s.countryId',Auth::user()->organizeID)
                    ->select('u.id','u.sno','u.username','u.realname','u.email','u.sex','u.phone','u.schoolId','u.gradeId','u.classId','u.isleave','s.schoolName','g.gradeName','c.classname','g.isGraduate')
                    ->paginate(15);
                break;
            case 3:
                $data = $query
                    ->leftJoin('school as s','u.schoolId','=','s.id')
                    ->leftJoin('schoolgrade as g','u.gradeId','=','g.id')
                    ->leftJoin('schoolclass as c','u.classId','=','c.id')
                    ->where('type',3)
                    ->where('isleave',0)
                    ->where('s.id',Auth::user()->organizeID)
                    ->select('u.id','u.sno','u.username','u.realname','u.email','u.sex','u.phone','u.schoolId','u.gradeId','u.classId','u.isleave','s.schoolName','g.gradeName','c.classname','g.isGraduate')
                    ->paginate(15);
                break;
        }

        $data->type = $request['type'];
        return view('qiyun.admin.schoolGraduation.schoolGraduationList',['data'=>$data]);
    }

    /**
     *编辑升级
     */
    public function editGraduation($id){
        $data = DB::table('users as u')
            ->leftJoin('school as s','u.schoolId','=','s.id')
            ->leftJoin('schoolgrade as g','u.gradeId','=','g.id')
            ->leftJoin('schoolclass as c','u.classId','=','c.id')
            ->where('type',3)
            ->where('isleave',0)
            ->where('u.id',$id)
            ->select('u.id','u.sno','u.username','u.realname','u.email','u.sex','u.phone','u.schoolId','u.gradeId','u.classId','u.isleave','s.schoolName','g.gradeName','c.classname','g.isGraduate')
            ->first();
        if(Auth::user()->level() > 6){
            $data->schoolNames = DB::table('school')->select('id','schoolName')->get();
        }
        switch(Auth::user()->level()){
            case 6:
                $data->schoolNames = DB::table('school')->where('organizeid',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
            case 5:
                $data->schoolNames = DB::table('school')->where('cityId',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
            case 4:
                $data->schoolNames = DB::table('school')->where('countryId',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
            case 3:
                $data->schoolNames = DB::table('school')->where('id',Auth::user()->organizeID)->select('id','schoolName')->get();
                break;
        }
        $data->gradeNames = DB::table('schoolgrade')->where('parentId',$data->schoolId)->select('id','gradeName')->get();
        $data->classnames = DB::table('schoolclass')->where('parentId',$data->gradeId)->select('id','classname')->get();
        return view('qiyun.admin.schoolGraduation.editSchoolGraduation',['data'=>$data]);
    }

    /**
     *执行编辑
     */
    public function doEditGraduation(Request $request){
        $data = $request->except('_token','urlPath');
        if(DB::table('users')->where('id',$request['id'])->update($data)){
            return redirect('admin/message')->with(['status'=>'成功','redirect'=>$request['urlPath']]);
        }else{
            return redirect()->back()->withInput()->withErrors('失败');
        }
    }


    /**
     *离校学生列表
     */
    public function leaveStudentsList(Request $request){
        $query = DB::table('users as u');
        if($request['type'] == 1){
            $query = $query->where('u.id','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 2){
            $query = $query->where('u.sno','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 3){
            $query = $query->where('u.realname','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 4){
            $query = $query->where('s.schoolName','like','%'.trim($request['search']).'%');
        }
        if($request['type'] == 5){
            $query = $query->where('g.gradeName','like','%'.trim($request['search']).'%');
        }
        if(Auth::user()->level() > 6){
            $data = $query
                ->leftJoin('school as s','u.schoolId','=','s.id')
                ->leftJoin('schoolgrade as g','u.gradeId','=','g.id')
                ->leftJoin('schoolclass as c','u.classId','=','c.id')
                ->where('type',3)
                ->where('isleave',1)
                ->select('u.id','u.sno','u.username','u.realname','u.email','u.sex','u.phone','u.schoolId','u.gradeId','u.classId','u.isleave','s.schoolName','g.gradeName','c.classname','g.isGraduate')
                ->paginate(15);
        }
        switch(Auth::user()->level()){
            case 6:
                $data = $query
                    ->leftJoin('school as s','u.schoolId','=','s.id')
                    ->leftJoin('schoolgrade as g','u.gradeId','=','g.id')
                    ->leftJoin('schoolclass as c','u.classId','=','c.id')
                    ->where('type',3)
                    ->where('isleave',1)
                    ->where('s.organizeid',Auth::user()->organizeID)
                    ->select('u.id','u.sno','u.username','u.realname','u.email','u.sex','u.phone','u.schoolId','u.gradeId','u.classId','u.isleave','s.schoolName','g.gradeName','c.classname','g.isGraduate')
                    ->paginate(15);
                break;
            case 5:
                $data = $query
                    ->leftJoin('school as s','u.schoolId','=','s.id')
                    ->leftJoin('schoolgrade as g','u.gradeId','=','g.id')
                    ->leftJoin('schoolclass as c','u.classId','=','c.id')
                    ->where('type',3)
                    ->where('isleave',1)
                    ->where('s.cityId',Auth::user()->organizeID)
                    ->select('u.id','u.sno','u.username','u.realname','u.email','u.sex','u.phone','u.schoolId','u.gradeId','u.classId','u.isleave','s.schoolName','g.gradeName','c.classname','g.isGraduate')
                    ->paginate(15);
                break;
            case 4:
                $data = $query
                    ->leftJoin('school as s','u.schoolId','=','s.id')
                    ->leftJoin('schoolgrade as g','u.gradeId','=','g.id')
                    ->leftJoin('schoolclass as c','u.classId','=','c.id')
                    ->where('type',3)
                    ->where('isleave',1)
                    ->where('s.countryId',Auth::user()->organizeID)
                    ->select('u.id','u.sno','u.username','u.realname','u.email','u.sex','u.phone','u.schoolId','u.gradeId','u.classId','u.isleave','s.schoolName','g.gradeName','c.classname','g.isGraduate')
                    ->paginate(15);
                break;
            case 3:
                $data = $query
                    ->leftJoin('school as s','u.schoolId','=','s.id')
                    ->leftJoin('schoolgrade as g','u.gradeId','=','g.id')
                    ->leftJoin('schoolclass as c','u.classId','=','c.id')
                    ->where('type',3)
                    ->where('isleave',1)
                    ->where('s.id',Auth::user()->organizeID)
                    ->select('u.id','u.sno','u.username','u.realname','u.email','u.sex','u.phone','u.schoolId','u.gradeId','u.classId','u.isleave','s.schoolName','g.gradeName','c.classname','g.isGraduate')
                    ->paginate(15);
                break;
        }
        $data->type = $request['type'];
        return view('qiyun.admin.schoolGraduation.leaveStudentsList',['data'=>$data]);
    }
}
