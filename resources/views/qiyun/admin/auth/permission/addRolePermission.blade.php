@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                权限管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    用户组添加操作权限
                </small>
            </h1>
        </div><!-- /.page-header -->

        @if ( count($errors) > 0 )
                @foreach ( $errors -> all() as $error )
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
        @endif

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

               <form action="{{ url('admin/auth/createRolePermission') }}" method="post" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 选择用户组 </label>
                        <div class="col-sm-9">
                            <select name="role_id" class="col-xs-10 col-sm-5" style="text-align: center;">
                                <option value="">请选择</option>
                                <option value="1">超级管理员 / Root</option>
                                <option value="2">后台管理员 / Admin</option>
                                <option value="3">省级管理员 / ProvinceManager</option>
                                <option value="4">市级管理员 / CityManager</option>
                                <option value="5">区/县管理员 / CountyManager</option>
                                <option value="6">校级管理员 / SchoolManager</option>
                                <option value="7">年级管理员 / GradeManager</option>
                                <option value="8">班级管理员 / ClassManager</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                提交
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="permission_id" value="{{ $permissionID }}">

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection