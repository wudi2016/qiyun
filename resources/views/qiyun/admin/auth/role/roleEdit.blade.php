@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                权限管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    角色组编辑页
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

                <form action="{{ url('admin/auth/doRoleEdit') }}" method="post" class="form-horizontal" role="form">
                    <input type="hidden" name="id" value="{{ $roleInfo -> id }}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色组名称 </label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="form-field-1" class="col-xs-10 col-sm-5" value="{{ $roleInfo -> name }}" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色组别名 </label>
                        <div class="col-sm-9">
                            <input type="text" name="slug" id="form-field-1" class="col-xs-10 col-sm-5" value="{{ $roleInfo -> slug }}" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色组描述 </label>
                        <div class="col-sm-9">
                            <textarea name="description" style="width: 42%; height: 100px; resize: none;">{{ $roleInfo -> description }}</textarea>
                        </div>
                    </div>

                    <div class="space-4"></div>

                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色组级别 </label>
                        <div class="col-sm-9">
                            <input type="text" name="level" id="form-field-1" class="col-xs-10 col-sm-5" value="{{ $roleInfo -> level }}" />
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