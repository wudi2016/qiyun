@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try {
                ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {
            }
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="{{url('admin/index')}}">首页</a>
            </li>
            <li class="active">控制台</li>
        </ul><!-- .breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                                <span class="input-icon">
                                    <input type="text" placeholder="Search ..." class="nav-search-input"
                                           id="nav-search-input" autocomplete="off"/>
                                    <i class="icon-search nav-search-icon"></i>
                                </span>
            </form>
        </div><!-- #nav-search -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                添加管理员
            </h1>
        </div>

        @if ( count($errors) > 0 )
                @foreach ( $errors -> all() as $error )
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
        @endif

        <div class="row">
            <div class="col-xs-12">

                <form action="/admin/auth/createManager" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="roleID" value="{{ $info[0] }}">
                    <input type="hidden" name="id" value="{{ $info[1] }}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">用户名</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="username" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属单位</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" value="{{$info[2]}}" disabled class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">职位</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" value="{{$info[2]}}管理员" disabled class="col-xs-10 col-sm-5" />
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" id="btnSub" class="btn btn-info" value="提交" />
                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection