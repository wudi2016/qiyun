<?php

namespace App\Http\Controllers\qiyun\admin\auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;
use Validator;
use DB;
use Carbon\Carbon;

class authManageController extends Controller
{
    /**
     * 后台管理员列表
     *
     * @return \Illuminate\Http\Response
     */
    public function adminList()
    {
        $result = \DB::table('users') 
                        -> join('role_user', 'role_user.user_id', '=', 'users.id')
                        -> join('roles', 'roles.id', '=', 'role_user.role_id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "role_user.created_at", "role_user.updated_at") 
                        -> where('roles.id', 2) -> orderBy("role_user.id", "desc") -> paginate(10);
        return view('qiyun.admin.auth.authManage.adminList') -> with('adminList', $result);
    }


    /**
     * 省级管理员列表
     *
     * @return \Illuminate\Http\Response
     */
    public function provinceManagerList()
    {
        $result = \DB::table('users') 
                        -> join('role_user', 'role_user.user_id', '=', 'users.id')
                        -> join('roles', 'roles.id', '=', 'role_user.role_id')
                        -> join('organize', 'users.organizeID', '=', 'organize.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "role_user.created_at", "role_user.updated_at", "organize.organize_name") 
                        -> where('roles.id', 3) -> orderBy("role_user.id", "desc") -> paginate(10);
        return view( 'qiyun.admin.auth.authManage.provinceManagerList' ) -> with( 'provinceManagerList', $result );
    }


    /**
     * 市级管理员列表
     *
     * @return \Illuminate\Http\Response
     */
    public function cityManagerList()
    {
        $where = [ 'roles.id' => 4 ];
        if ( \Auth::user() -> level() < 7 ) $where['city.parent_id'] = \Auth::user() -> organizeID;
        $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('city', 'users.organizeID', '=', 'city.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "city.city_name as cityName", "role_user.created_at", "role_user.updated_at") 
                        -> where($where) -> orderBy("role_user.id", "desc") -> paginate(10);
        return view( 'qiyun.admin.auth.authManage.cityManagerList' ) -> with( 'cityManagerList', $result );
    }


    /**
     * 区县级管理员列表
     *
     * @return \Illuminate\Http\Response
     */
    public function countyManagerList()
    {
        switch ( \Auth::user() -> level() ) {
            case 6:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('county', 'users.organizeID', '=', 'county.id')
                        -> join('city', 'county.parent_id', '=', 'city.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "county.county_name as countyName", "role_user.created_at", "role_user.updated_at") 
                        -> where( [ 'roles.id' => 5, 'city.parent_id' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            case 5:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('county', 'users.organizeID', '=', 'county.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "county.county_name as countyName", "role_user.created_at", "role_user.updated_at") 
                        -> where( [ 'roles.id' => 5, 'county.parent_id' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            default:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('county', 'users.organizeID', '=', 'county.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "county.county_name as countyName", "role_user.created_at", "role_user.updated_at") 
                        -> where( [ 'roles.id' => 5 ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
        }
        return view( 'qiyun.admin.auth.authManage.countyManagerList' ) -> with( 'countyManagerList', $result );
    }


    /**
     * 校级管理员列表
     *
     * @return \Illuminate\Http\Response
     */
    public function schoolManagerList()
    {
        switch ( \Auth::user() -> level() ) {
            case 6:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('school', 'users.organizeID', '=', 'school.id')
                        -> join('county', 'school.countryId', '=', 'county.id')
                        -> join('city', 'county.parent_id', '=', 'city.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "school.schoolName", "role_user.created_at", "role_user.updated_at") 
                        -> where( [ 'roles.id' => 6, 'city.parent_id' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            case 5:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('school', 'users.organizeID', '=', 'school.id')
                        -> join('county', 'school.countryId', '=', 'county.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "school.schoolName", "role_user.created_at", "role_user.updated_at") 
                        -> where( [ 'roles.id' => 6, 'county.parent_id' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            case 4:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('school', 'users.organizeID', '=', 'school.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "school.schoolName", "role_user.created_at", "role_user.updated_at") 
                        -> where( [ 'roles.id' => 6, 'school.countryId' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            default:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('school', 'users.organizeID', '=', 'school.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "school.schoolName", "role_user.created_at", "role_user.updated_at") 
                        -> where( [ 'roles.id' => 6 ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
        }
        return view( 'qiyun.admin.auth.authManage.schoolManagerList' ) -> with( 'schoolManagerList', $result );
    }


    /**
     * 年级管理员列表
     *
     * @return \Illuminate\Http\Response
     */
    public function gradeManagerList()
    {
        switch ( \Auth::user() -> level() ) {
            case 6:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('schoolgrade', 'users.organizeID', '=', 'schoolgrade.id')
                        -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                        -> join('county', 'school.countryId', '=', 'county.id')
                        -> join('city', 'county.parent_id', '=', 'city.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "schoolgrade.gradeName", "role_user.created_at", "role_user.updated_at", "school.schoolName") 
                        -> where( [ 'roles.id' => 7, 'city.parent_id' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            case 5:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('schoolgrade', 'users.organizeID', '=', 'schoolgrade.id')
                        -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                        -> join('county', 'school.countryId', '=', 'county.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "schoolgrade.gradeName", "role_user.created_at", "role_user.updated_at", "school.schoolName") 
                        -> where( [ 'roles.id' => 7, 'county.parent_id' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            case 4:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('schoolgrade', 'users.organizeID', '=', 'schoolgrade.id')
                        -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "schoolgrade.gradeName", "role_user.created_at", "role_user.updated_at", "school.schoolName") 
                        -> where( [ 'roles.id' => 7, 'school.countryId' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            case 3:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('schoolgrade', 'users.organizeID', '=', 'schoolgrade.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "schoolgrade.gradeName", "role_user.created_at", "role_user.updated_at") 
                        -> where( [ 'roles.id' => 7, 'schoolgrade.parentId' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            default:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('schoolgrade', 'users.organizeID', '=', 'schoolgrade.id')
                        -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "schoolgrade.gradeName", "role_user.created_at", "role_user.updated_at", "school.schoolName") 
                        -> where( [ 'roles.id' => 7 ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
        }
        return view( 'qiyun.admin.auth.authManage.gradeManagerList' ) -> with( 'gradeManagerList', $result );
    }


    /**
     * 班级管理员列表
     *
     * @return \Illuminate\Http\Response
     */
    public function classManagerList()
    {
        switch ( \Auth::user() -> level() ) {
            case 6:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('schoolclass', 'users.organizeID', '=', 'schoolclass.id')
                        -> join('schoolgrade', 'schoolclass.parentId', '=', 'schoolgrade.id')
                        -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                        -> join('county', 'school.countryId', '=', 'county.id')
                        -> join('city', 'county.parent_id', '=', 'city.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "schoolclass.classname", "role_user.created_at", "role_user.updated_at", "schoolgrade.gradeName", "school.schoolName") 
                        -> where( [ 'roles.id' => 8, 'city.parent_id' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            case 5:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('schoolclass', 'users.organizeID', '=', 'schoolclass.id')
                        -> join('schoolgrade', 'schoolclass.parentId', '=', 'schoolgrade.id')
                        -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                        -> join('county', 'school.countryId', '=', 'county.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "schoolclass.classname", "role_user.created_at", "role_user.updated_at", "schoolgrade.gradeName", "school.schoolName") 
                        -> where( [ 'roles.id' => 8, 'county.parent_id' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            case 4:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('schoolclass', 'users.organizeID', '=', 'schoolclass.id')
                        -> join('schoolgrade', 'schoolclass.parentId', '=', 'schoolgrade.id')
                        -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "schoolclass.classname", "role_user.created_at", "role_user.updated_at", "schoolgrade.gradeName", "school.schoolName") 
                        -> where( [ 'roles.id' => 8, 'school.countryId' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            case 3:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('schoolclass', 'users.organizeID', '=', 'schoolclass.id')
                        -> join('schoolgrade', 'schoolclass.parentId', '=', 'schoolgrade.id')
                        -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "schoolclass.classname", "role_user.created_at", "role_user.updated_at", "schoolgrade.gradeName", "school.schoolName") 
                        -> where( [ 'roles.id' => 8, 'schoolgrade.parentId' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            case 2:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('schoolclass', 'users.organizeID', '=', 'schoolclass.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "schoolclass.classname", "role_user.created_at", "role_user.updated_at") 
                        -> where( [ 'roles.id' => 8, 'schoolclass.parentId' => \Auth::user() -> organizeID ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
            default:
                $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join('schoolclass', 'users.organizeID', '=', 'schoolclass.id')
                        -> join('schoolgrade', 'schoolclass.parentId', '=', 'schoolgrade.id')
                        -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "schoolclass.classname", "role_user.created_at", "role_user.updated_at", "schoolgrade.gradeName", "school.schoolName") 
                        -> where( [ 'roles.id' => 8 ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
                break;
        }
        return view( 'qiyun.admin.auth.authManage.classManagerList' ) -> with( 'classManagerList', $result );
    }


    /**
     * 删除操作权限
     *
     * @param int   roleUserId
     * @return \Illuminate\Http\Response
     */
    public function revokeManager($id, $userID, $type)
    {
        switch ( intval( $type ) ) {
            case 0:
                $tableName = 'role_user';
                $result = DB::table('users') -> where('id', $userID) -> update( [ 'organizeID' => NULL ] );
                if ( !$result ) return Redirect() -> back() -> with( 'error', '用户撤销失败' );
                break;
            case 1:
                $tableName = 'permission_user';
                break;
            case 2:
                $tableName = 'permission_role';
                break;
        }
        $result = DB::table($tableName) -> where( 'id',  $id ) -> delete();
        if ( $result ) 
            return Redirect() -> back() -> with( 'message', '撤销成功' );
        else 
            return Redirect() -> back() -> with( 'error', '撤销失败' );
    }


    /**
     * 查看操作权限
     *
     * @param int   userId
     * @return \Illuminate\Http\Response
     */
    public function checkPermissions($userId)
    {
        $result = \DB::table('permissions') 
                        -> join('permission_user', 'permission_user.permission_id', '=', 'permissions.id')
                        -> select("permission_user.id", "permissions.description", "permission_user.created_at", "permission_user.updated_at") 
                        -> where('permission_user.user_id', $userId) -> orderBy("permission_user.id", "desc") -> paginate(10);
        return view( 'qiyun.admin.auth.authManage.checkPermissions' ) -> with( 'checkPermissions', $result ) -> with('userID', $userId) ;
    }


    /**
     * 查看管理员
     *
     * @param int   roleID
     * @param int   id
     * @return \Illuminate\Http\Response
     */
    public function checkManagers($roleID, $id)
    {
        $condition = $this -> choiceCondition($roleID);
        $result = \DB::table('users') 
                        -> join('role_user', 'users.id', '=', 'role_user.user_id')
                        -> join('roles', 'role_user.role_id', '=', 'roles.id')
                        -> join($condition[0], 'users.organizeID', '=', $condition[0].'.id')
                        -> select("role_user.id", "users.id as user_id", "users.username", "{$condition[0]}.{$condition[1]} as name", "role_user.created_at", "role_user.updated_at") 
                        -> where( [ 'roles.id' => $roleID, "{$condition[0]}.id" => $id ] ) -> orderBy("role_user.id", "desc") -> paginate(10);
        //如果进入的是省级页面，屏蔽查看权限按钮
        if($roleID == 3){
            return view( 'qiyun.admin.auth.authManage.checkManagers',['organize'=>false]) -> with( 'checkManagers', $result ) -> with( 'info', [ $roleID, $id ] );
        }else{
            return view( 'qiyun.admin.auth.authManage.checkManagers',['organize'=>true]) -> with( 'checkManagers', $result ) -> with( 'info', [ $roleID, $id ] );
        }
    }

    /**
     * 添加管理员
     *
     * @param int   roleID
     * @param int   id
     * @return \Illuminate\Http\Response
     */
    public function addManager($roleID, $id)
    {
        $condition = $this -> choiceCondition($roleID);
        $result = \DB::table($condition[0]) -> select("{$condition[1]} as name") -> where( 'id', $id ) -> first();
        return view( 'qiyun.admin.auth.authManage.addManager' ) -> with( 'info', [ $roleID, $id, $result -> name ] );
    }

    /**
     * 执行添加管理员
     *
     * @return \Illuminate\Http\Response
     */
    public function createManager(Request $request)
    {
        $validator = Validator::make( $request -> all(), [ 'username' => 'required' ], [ 'username.required' => '请输入用户名' ] );
        if ( $validator -> fails() ) return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( $validator );

        switch ( intval( $request['roleID'] ) ) {
            case 3: $condition = "provinceId"; break;
            case 4: $condition = "cityId"; break;
            case 5: $condition = "countyId"; break;
            case 6: $condition = "schoolId"; break;
            case 7: $condition = "gradeId"; break;
            case 8: $condition = "classId"; break;
        };
        $validator = DB::table('users') -> select("id", "type", "organizeID", $condition . " as conditionID") -> where( 'username', $request['username'] ) -> first();
        if ( !$validator ) 
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( [ '用户名不存在' ] );
        if ( $validator -> organizeID ) 
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( [ '用户名已经是管理员' ] );
        if ( $validator -> conditionID != intval( $request['id'] ) ) 
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( [ '请添加相对应机构单位的用户' ] );
        if ( $validator -> type != 1 ) 
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( [ '请选择教师身份的用户' ] );

        $result = DB::table('users') -> where('id', $validator -> id) -> update( [ 'organizeID' => intval( $request['id'] ) ] );
        if ( !$result ) return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( [ '用户提权失败' ] );

        $result = DB::table('role_user') -> insert( [ 'role_id' => intval( $request['roleID'] ), 'user_id' => $validator -> id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ] );
        if ( $result ) 
            return Redirect() -> to( '/admin/auth/checkManagers/'. $request['roleID'] .'/'. $request['id'] ) -> with( 'message', '添加成功' );
        else 
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( [ '添加失败' ] );
    }

    /**
     *  获取单位信息
     *
     * @param int   roleID
     * @return \Illuminate\Http\Response
     */
    public function getCompanyInfo($roleID)
    {
        switch ( intval( $roleID ) ) {
            case 8:
                    if ( \Auth::user() -> level() > 6 ) {
                        $result = \DB::table('schoolclass') 
                                -> join('schoolgrade', 'schoolclass.parentId', '=', 'schoolgrade.id')
                                -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                                -> join('county', 'school.countryId', '=', 'county.id')
                                -> join('city', 'county.parent_id', '=', 'city.id')
                                -> join('organize', 'city.parent_id', '=', 'organize.id')
                                -> select('schoolclass.id', 'schoolclass.classname as name', 'school.schoolName', 'schoolgrade.gradeName', 'organize.organize_name', 'city.city_name', 'county.county_name') 
                                -> orderBy("schoolclass.id", "asc") -> get();
                    } else {
                        switch ( \Auth::user() -> level() ) {
                            case 2: $condition = 'schoolgrade.id'; break;
                            case 3: $condition = 'school.id'; break;
                            case 4: $condition = 'county.id'; break;
                            case 5: $condition = 'city.id'; break;
                            case 6: $condition = 'organize.id'; break;
                        }
                        $result = \DB::table('schoolclass') 
                                -> join('schoolgrade', 'schoolclass.parentId', '=', 'schoolgrade.id')
                                -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                                -> join('county', 'school.countryId', '=', 'county.id')
                                -> join('city', 'county.parent_id', '=', 'city.id')
                                -> join('organize', 'city.parent_id', '=', 'organize.id')
                                -> select('schoolclass.id', 'schoolclass.classname as name', 'school.schoolName', 'schoolgrade.gradeName', 'organize.organize_name', 'city.city_name', 'county.county_name') 
                                -> where($condition, \Auth::user() -> organizeID) -> orderBy("schoolclass.id", "asc") -> get();
                    }
                    break;
                    
            case 7:
                    if ( \Auth::user() -> level() > 6 ) {
                        $result = \DB::table('schoolgrade') 
                                -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                                -> join('county', 'school.countryId', '=', 'county.id')
                                -> join('city', 'county.parent_id', '=', 'city.id')
                                -> join('organize', 'city.parent_id', '=', 'organize.id')
                                -> select('schoolgrade.id', 'schoolgrade.gradeName as name', 'school.schoolName', 'organize.organize_name', 'city.city_name', 'county.county_name') 
                                -> orderBy("school.id", "asc") -> get();
                    } else {
                        switch ( \Auth::user() -> level() ) {
                            case 3: $condition = 'school.id'; break;
                            case 4: $condition = 'county.id'; break;
                            case 5: $condition = 'city.id'; break;
                            case 6: $condition = 'organize.id'; break;
                        }
                        $result = \DB::table('schoolgrade') 
                                -> join('school', 'schoolgrade.parentId', '=', 'school.id')
                                -> join('county', 'school.countryId', '=', 'county.id')
                                -> join('city', 'county.parent_id', '=', 'city.id')
                                -> join('organize', 'city.parent_id', '=', 'organize.id')
                                -> select('schoolgrade.id', 'schoolgrade.gradeName as name', 'school.schoolName', 'organize.organize_name', 'city.city_name', 'county.county_name') 
                                -> where($condition, \Auth::user() -> organizeID) -> orderBy("schoolgrade.id", "asc") -> get();
                    }
                    break;

            case 6:
                    if ( \Auth::user() -> level() > 6 ) {
                        $result = \DB::table('school') 
                                -> join('county', 'school.countryId', '=', 'county.id')
                                -> join('city', 'county.parent_id', '=', 'city.id') 
                                -> join('organize', 'city.parent_id', '=', 'organize.id')
                                -> select('school.id', 'school.schoolName as name', 'organize.organize_name', 'city.city_name', 'county.county_name') -> orderBy("school.id", "asc") -> get();
                    } else {
                        switch ( \Auth::user() -> level() ) {
                            case 4: $condition = 'county.id'; break;
                            case 5: $condition = 'city.id'; break;
                            case 6: $condition = 'organize.id'; break;
                        }
                        $result = \DB::table('school') 
                                -> join('county', 'school.countryId', '=', 'county.id')
                                -> join('city', 'county.parent_id', '=', 'city.id') 
                                -> join('organize', 'city.parent_id', '=', 'organize.id')
                                -> select('school.id', 'school.schoolName as name', 'organize.organize_name', 'city.city_name', 'county.county_name') 
                                -> where($condition, \Auth::user() -> organizeID) -> orderBy("school.id", "asc") -> get();
                    }
                    break;

            case 5:
                    if ( \Auth::user() -> level() > 6 ) {
                        $result = \DB::table('county') 
                                -> join('city', 'county.parent_id', '=', 'city.id') 
                                -> join('organize', 'city.parent_id', '=', 'organize.id')
                                -> select('county.id', 'county.county_name as name', 'organize.organize_name', 'city.city_name') -> orderBy("county.id", "asc") -> get();
                    } else {
                        switch ( \Auth::user() -> level() ) {
                            case 5: $condition = 'city.id'; break;
                            case 6: $condition = 'organize.id'; break;
                        }
                        $result = \DB::table('county') 
                                -> join('city', 'county.parent_id', '=', 'city.id') 
                                -> join('organize', 'city.parent_id', '=', 'organize.id')
                                -> select('county.id', 'county.county_name as name', 'organize.organize_name', 'city.city_name') 
                                -> where($condition, \Auth::user() -> organizeID) -> orderBy("county.id", "asc") -> get();
                    }
                    break;

            case 4:
                    if ( \Auth::user() -> level() > 6 ) {
                        $result = \DB::table('city') -> join('organize', 'city.parent_id', '=', 'organize.id') -> select('city.id', 'city.city_name as name', 'organize.organize_name') -> orderBy("city.id", "asc") -> get();
                    } else {
                        $result = \DB::table('city') 
                                -> join('organize', 'city.parent_id', '=', 'organize.id') -> select('city.id', 'city.city_name as name') 
                                -> where('organize.id', \Auth::user() -> organizeID) -> orderBy("city.id", "asc") -> get();
                    }
                    break;

            case 3:
                    $result = \DB::table('organize') -> select('id', 'organize_name as name') -> orderBy("id", "asc") -> get();
                    break;
        }
        if ( $result ) 
            return Response() -> json([ 'type' => true, 'data' => $result ]); 
        else
            return Response() -> json([ 'type' => false ]); 

    }

    /**
     * 修改角色
     *
     * @param int   roleID
     * @param int   id
     * @return \Illuminate\Http\Response
     */
    public function modifyManager($roleID, $userID, $urlTarget)
    {
        return view( 'qiyun.admin.auth.authManage.modifyManager' ) -> with( 'info', [ 'roleID' => $roleID, 'userID' => $userID, 'urlTarget' => $urlTarget ] );
    }

    /**
     * 执行修改角色
     *
     * @return \Illuminate\Http\Response
     */
    public function updateManager(Request $request)
    {
        $rules = [ 'level' => 'required' ];
        $message = [ 'level.required' => '请选择角色级别' ];
        if ( $request['level'] != '2' ) {
            $rules['company'] = 'required';
            $message['company.required'] = '请选择所属单位';
        }
        $validator = Validator::make( $request -> all(), $rules, $message );
        if ( $validator -> fails() ) return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( $validator );

        $request['company'] = $request['company'] ? $request['company'] : null;
        $result = DB::table('users') -> where('id', $request['userID']) -> update( [ 'organizeID' => intval( $request['company'] ) ] );
        if ( !$result ) return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( ['用户修改权限失败'] );

        $result = DB::table('role_user') -> where('id', $request['roleID']) -> update( [ 'role_id' => intval( $request['level'] ), 'updated_at' => Carbon::now() ] );
        if ( $result ) 
            return Redirect() -> to( '/admin/auth/'. $request['urlTarget'] ) -> with( 'message', '修改成功' );
        else 
            return Redirect() -> back() -> withErrors( [ '修改失败' ] );
    }


    /**
     * 添加用户操作权限
     *
     * @return \Illuminate\Http\Response
     */
    public function addUserPermission($userID)
    {
        $model = DB::table('permissions') -> select('model') -> orderBy('id', 'asc') -> groupBy('model') -> get();
        return view( 'qiyun.admin.auth.authManage.addUserPermission' ) -> with('userID', $userID) -> with('model', $model);
    }

    /**
     *  获取单位信息
     *
     * @param int   roleID
     * @return \Illuminate\Http\Response
     */
    public function getPermissionInfo($modelName)
    {
        $result = DB::table('permissions') -> select('id', 'description') -> where('model', $modelName) -> orderBy('id', 'asc') -> get();
        if ( $result ) 
            return Response() -> json([ 'type' => true, 'data' => $result ]);
        else
            return Response() -> json([ 'type' => false ]);
    }


     /**
     * 执行添加用户操作权限
     *
     * @return \Illuminate\Http\Response
     */
    public function createUserPermission(Request $request)
    {
        $validator = Validator::make( $request -> all(), [ 'permission_id' => 'required' ], [ 'permission_id.required' => '请选择操作权限' ] );
        if ( $validator -> fails() ) return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( $validator );

        $validator = DB::table('permission_user') -> select("id") -> where( [ "permission_id" => $request['permission_id'], "user_id" => $request['user_id'] ] ) -> first();
        if ( $validator ) return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( [ '该权限已存在' ] );

        $request['created_at'] = Carbon::now();
        $request['updated_at'] = $request['created_at'];
        $validator = DB::table('permission_user') -> insert( $request -> except( [ '_token', 'model' ]) );
        if ( $validator ) 
            return Redirect() -> to( '/admin/auth/checkPermissions/'. $request['user_id'] ) -> with( 'message', '添加成功' );
        else 
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( '添加失败' );
    }

    /*
     * @param int   roleID
     * @return 传入用户组ID返回相应的查询条件数组
     */
    private function choiceCondition($roleID)
    {
        switch ( $roleID ) {
            case 3: $condition = [ 'organize', 'organize_name', 'id' ]; break;
            case 4: $condition = [ 'city', 'city_name', 'id' ]; break;
            case 5: $condition = [ 'county', 'county_name', 'id' ]; break;
            case 6: $condition = [ 'school', 'schoolName', 'id' ]; break;
            case 7: $condition = [ 'schoolgrade', 'gradeName', 'id' ]; break;
            case 8: $condition = [ 'schoolclass', 'classname', 'id' ]; break;
        }
        return $condition;
    }

}
 