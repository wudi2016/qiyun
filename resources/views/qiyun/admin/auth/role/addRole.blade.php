@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                权限管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加角色组
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

               <form action="{{ url('admin/auth/createRole') }}" method="post" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色组名称 </label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{ old('name') }}" id="form-field-1" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色组别名 </label>
                        <div class="col-sm-9">
                            <input type="text" name="slug" value="{{ old('slug') }}" id="form-field-1" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色组描述 </label>
                        <div class="col-sm-9">
                            <textarea name="description" style="width: 42%; height: 100px; resize: none;">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="space-4"></div>

                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色组级别 </label>
                        <div class="col-sm-9">
                            <input type="text" name="level" value="{{ old('level') }}" id="form-field-1" class="col-xs-10 col-sm-5" />
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