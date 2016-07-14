@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try { ace.settings.check('breadcrumbs', 'fixed') } catch (e) {};
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="{{url('admin/index')}}">首页</a>
            </li>
            <li class="active">控制台</li>
        </ul>

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input"
                           id="nav-search-input" autocomplete="off"/>
                    <i class="icon-search nav-search-icon"></i>
                </span>
            </form>
        </div>
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                修改管理员角色
            </h1>
        </div>

        @if ( count($errors) > 0 )
                @foreach ( $errors -> all() as $error )
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
        @endif

        <div class="row">
            <div class="col-xs-12">
                <form action="/admin/auth/updateManager" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="roleID" value="{{ $info['roleID'] }}">
                    <input type="hidden" name="userID" value="{{ $info['userID'] }}">
                    <input type="hidden" name="urlTarget" value="{{ $info['urlTarget'] }}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">选择级别</label>
                        <div class="col-sm-9">
                            <select name="level" class="col-xs-10 col-sm-5" style="text-align: center;">
                                <option value="">请选择</option>
                                @level(8) <option value="2">后台管理员</option> @endlevel
                                @level(7) <option value="3">省级管理员</option> @endlevel
                                @level(6) <option value="4">市级管理员</option> @endlevel
                                @level(5) <option value="5">区/县管理员</option> @endlevel
                                @level(4) <option value="6">校级管理员</option> @endlevel
                                @level(3) <option value="7">年级管理员</option> @endlevel
                                @level(2) <option value="8">班级管理员</option> @endlevel
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">所属单位</label>
                        <div class="col-sm-9">
                            <select name="company" class="col-xs-10 col-sm-5" style="text-align: center;">
                                <option value="">请选择</option>
                            </select>
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" id="btnSub" class="btn btn-info" value="提　交" />
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">重　置</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
            $('select[name=company]').attr('disabled', 'disabled');
            $('select[name=level]').change(function () {
                $('select[name=company]').html('<option value="">请选择</option>');
                if ( $(this).val() == '' || $(this).val() == '2' ) {
                    $('select[name=company]').attr('disabled', 'disabled'); 
                    return;
                } else {
                    $('select[name=company]').removeAttr('disabled');
                };
                $.ajax({
                    type: 'GET',
                    url: '/admin/auth/getCompanyInfo/' + $(this).val(),
                    success: function (response) 
                    {
                        var html = $('select[name=company]').html();
                        if ( $('select[name=level]').val() == '8' ) 
                            for ( var i in response.data ) html += '<option value="'+ response.data[i].id +'">'+ response.data[i].organize_name +'　< - >　'+ response.data[i].city_name +'　< - >　'+ response.data[i].county_name +'　< - >　'+ response.data[i].schoolName +'　< - >　'+ response.data[i].gradeName +'　< - >　'+ response.data[i].name +'</option>';
                        else if ( $('select[name=level]').val() == '7' )
                            for ( var i in response.data ) html += '<option value="'+ response.data[i].id +'">'+ response.data[i].organize_name +'　< - >　'+ response.data[i].city_name +'　< - >　'+ response.data[i].county_name +'　< - >　'+ response.data[i].schoolName +'　< - >　'+ response.data[i].name +'</option>';
                        else if ( $('select[name=level]').val() == '6' )
                            for ( var i in response.data ) html += '<option value="'+ response.data[i].id +'">'+ response.data[i].organize_name +'　< - >　'+ response.data[i].city_name +'　< - >　'+ response.data[i].county_name +'　< - >　'+ response.data[i].name +'</option>';
                        else if ( $('select[name=level]').val() == '5' )
                            for ( var i in response.data ) html += '<option value="'+ response.data[i].id +'">'+ response.data[i].organize_name +'　< - >　'+ response.data[i].city_name +'　< - >　'+ response.data[i].name +'</option>';
                        else if ( $('select[name=level]').val() == '4' )
                            for ( var i in response.data ) html += '<option value="'+ response.data[i].id +'">'+ response.data[i].organize_name +'　< - >　'+ response.data[i].name +'</option>';
                        else 
                            for ( var i in response.data ) html += '<option value="'+ response.data[i].id +'">'+ response.data[i].name +'</option>';
                        $('select[name=company]').html(html);
                        delete html;
                    },
                    error: function(error) { alert('error'); }
                });
            });
    </script>
@endsection
