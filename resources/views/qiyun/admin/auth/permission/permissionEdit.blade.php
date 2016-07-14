@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                权限管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    操作权限编辑页
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

                <form action="{{ url('admin/auth/doPermissionEdit') }}" method="post" class="form-horizontal" role="form">
                    <input type="hidden" name="id" value="{{ $permissionInfo -> id }}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 操作权限名称 </label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="form-field-1" class="col-xs-10 col-sm-5" value="{{ $permissionInfo -> name }}" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 操作权限别名 </label>
                        <div class="col-sm-9">
                            <input type="text" name="slug" id="form-field-1" class="col-xs-10 col-sm-5" value="{{ $permissionInfo -> slug }}" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 操作权限描述 </label>
                        <div class="col-sm-9">
                            <textarea name="description" style="width: 42%; height: 100px; resize: none;">{{ $permissionInfo -> description }}</textarea>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 操作权限对应模块 </label>
                        <div class="col-sm-9">
                            <input type="text" name="model" id="form-field-1" class="col-xs-10 col-sm-5" value="{{ $permissionInfo -> model }}" />
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

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection