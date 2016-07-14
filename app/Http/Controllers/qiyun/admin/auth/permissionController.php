<?php

namespace App\Http\Controllers\qiyun\admin\auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Bican\Roles\Models\Permission;
use Validator;
use DB;
use Carbon\Carbon;

class permissionController extends Controller
{
    /**
     * 操作权限列表
     *
     * @return \Illuminate\Http\Response
     */
    public function permissionList()
    {
        $result = DB::table('permissions') -> orderBy('id', 'asc') -> paginate(15);
        return view( 'qiyun.admin.auth.permission.permissionList' ) -> with( 'permissionList', $result );
    }

    /**
     * 操作权限编辑页
     *
     * @param int   permissionId
     * @return \Illuminate\Http\Response
     */
    public function permissionEdit($permissionId)
    {
        $result = DB::table('permissions') -> where('id', $permissionId) -> first();
        return view( 'qiyun.admin.auth.permission.permissionEdit' ) -> with( 'permissionInfo', $result );
    }

    /**
     * 执行角色组编辑
     *
     * @param \Illuminate\Http\Request  $request  
     * @return \Illuminate\Http\Response
     */
    public function doPermissionEdit(Request $request)
    {
        $validator = $this -> validator( $request -> all() );
        if ( $validator -> fails() ) return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( $validator );
        $request['updated_at'] = Carbon::now();
        $result = DB::table('permissions') -> where( 'id', $request -> input('id') ) -> update( $request -> except('_token') );
        if ( $result ) 
            return Redirect() -> to( '/admin/auth/permissionList' ) -> with( 'message', '修改成功' );
        else 
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( '修改失败' );
    }

    /**
     * 删除操作权限
     *
     * @param int   permissionId
     * @return \Illuminate\Http\Response
     */
    public function permissionDelete($permissionId)
    {
        $result = DB::table('permissions') -> where( 'id',  $permissionId ) -> delete();
        if ( $result ) 
            return Redirect() -> to( '/admin/auth/permissionList' ) -> with( 'message', '删除成功' );
        else 
            return Redirect() -> to( '/admin/auth/permissionList' ) -> with( 'message', '删除失败' );
    }

    /**
     * 操作权限添加页
     *
     * @return \Illuminate\Http\Response
     */
    public function addPermission()
    {
        return view( 'qiyun.admin.auth.permission.addPermission' );
    }

    /**
     * 执行操作权限添加
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPermission(Request $request)
    {
        $validator = $this -> validator( $request -> all() );
        if ( $validator -> fails() ) return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( $validator );
        $result  = Permission::create( $request -> except('_token') );
        if ( $result ) 
            return Redirect() -> to( '/admin/auth/permissionList' ) -> with( 'message', '添加成功' );
        else 
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( '添加失败' );
    }

    /**
     * 查看角色组权限
     *
     * @param int   roleID
     * @return \Illuminate\Http\Response
     */
    public function checkRolePermission($permissionID)
    {
        $result = \DB::table('roles') 
                        -> join('permission_role', 'roles.id', '=', 'permission_role.role_id')
                        -> select("permission_role.id", "roles.description", "permission_role.created_at", "permission_role.updated_at") 
                        -> where('permission_role.permission_id', $permissionID) -> orderBy("permission_role.id", "desc") -> paginate(10);
        return view( 'qiyun.admin.auth.permission.checkRolePermission' ) -> with( 'checkRolePermission', $result ) -> with('permissionID', $permissionID);
    }


    /**
     * 用户组添加操作权限
     *
     * @return \Illuminate\Http\Response
     */
    public function addRolePermission($permissionID)
    {
        return view( 'qiyun.admin.auth.permission.addRolePermission' ) -> with('permissionID', $permissionID);
    }


     /**
     * 执行用户组添加操作权限
     *
     * @return \Illuminate\Http\Response
     */
    public function createRolePermission(Request $request)
    {
        $validator = Validator::make( $request -> all(), [ 'role_id' => 'required' ], [ 'role_id.required' => '请选择角色' ] );
        if ( $validator -> fails() ) return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( $validator );
        $request['created_at'] = Carbon::now();
        $request['updated_at'] = $request['created_at'];
        $validator = DB::table('permission_role') -> insert( $request -> except('_token') );
        if ( $validator ) 
            return Redirect() -> to( '/admin/auth/checkRolePermission/'. $request['permission_id'] ) -> with( 'message', '添加成功' );
        else 
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( '添加失败' );
    }



     /**
     * Get a validator for an incoming registration request.
     *
     * @param array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required|max:32',
            'slug' => 'required|max:32',
            'description' => 'required|max:64',
            'model' => 'required|max:32'
        ];

        $messages = [
            'name.required' => '请输入操作权限名称',
            'name.max' => '操作权限名称最多32位',
            'slug.required' => '请输入别名',
            'slug.max' => '别名最多32位',
            'description.required' => '请输入操作权限描述',
            'description.max' => '操作权限描述最多64位',
            'model.required' => '请输入操作权限对应模块',
            'model.max' => '操作权限对应模块最多32位'
        ];

        return Validator::make( $data, $rules, $messages );
    }
}
