<?php

namespace App\Http\Controllers\qiyun\admin\auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Bican\Roles\Models\Role;
use Validator;
use DB;
use Carbon\Carbon;

class roleController extends Controller
{
    /**
     * 角色组列表
     *
     * @return \Illuminate\Http\Response
     */
    public function roleList()
    {
    	$result = DB::table('roles') -> orderBy('id', 'asc') -> paginate(10);
    	return view( 'qiyun.admin.auth.role.roleList' ) -> with( 'roleList', $result );
    }

    /**
     * 角色组编辑页
     *
     * @param  int   roleId
     * @return \Illuminate\Http\Response
     */
    public function roleEdit($roleId)
    {
    	$result = DB::table('roles') -> where('id', $roleId) -> first();
    	return view( 'qiyun.admin.auth.role.roleEdit' ) -> with( 'roleInfo', $result );
    }

    /**
     * 执行角色组编辑
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doRoleEdit(Request $request)
    {
        $validator = $this -> validator( $request -> all() );
        if ( $validator -> fails() ) return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( $validator );
        $request['updated_at'] = Carbon::now();
        $result = DB::table('roles') -> where( 'id', $request -> input('id') ) -> update( $request -> except('_token')  );
        if ( $result ) 
            return Redirect() -> to( '/admin/auth/roleList' ) -> with( 'message', '修改成功' );
        else 
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( '修改失败' );
    }

    /**
     * 删除角色组
     *
     * @param  int   roleId
     * @return \Illuminate\Http\Response
     */
    public function roleDelete($roleId)
    {
    	$result = \DB::table('roles') -> where( 'id',  $roleId ) -> delete();
    	if ( $result ) 
		return Redirect() -> to('/admin/auth/roleList') -> with( 'message', '删除成功' );
    	else 
    		return Redirect() -> to('/admin/auth/roleList') -> with( 'message', '删除失败' );
    }

    /**
     * 角色组添加页
     *
     * @return \Illuminate\Http\Response
     */
    public function addRole()
    {
        return view( 'qiyun.admin.auth.role.addRole' );
    }

    /**
     * 执行角色添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createRole(Request $request)
    {
        $validator = $this -> validator( $request -> all() );
        if ( $validator -> fails() ) return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( $validator );
        $result  = Role::create( $request -> except('_token') );
        if ( $result ) 
            return Redirect() -> to( '/admin/auth/roleList' ) -> with( 'message', '添加成功' );
        else 
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( '添加失败' );
    }

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required|max:24',
            'slug' => 'required|max:24',
            'description' => 'required|max:64',
            'level' => 'required|integer'
        ];

        $messages = [
            'name.required' => '请输入角色组名称',
            'name.max' => '角色组名称最多24位',
            'slug.required' => '请输入角色组别名',
            'slug.max' => '角色组别名最多24位',
            'description.required' => '请输入角色组描述',
            'description.max' => '角色组描述最多64位',
            'level.required' => '请输入角色组级别',
            'level.integer' => '角色组级别必须为数字'
        ];

        return Validator::make( $data, $rules, $messages );
    }

}
