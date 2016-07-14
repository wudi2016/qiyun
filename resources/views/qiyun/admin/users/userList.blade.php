@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try {
                ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {
            }
        </script>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="{{url('admin/index')}}">首页</a>
            </li>
            <li class="active">控制台</li>
        </ul><!-- .breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search" method="get" action="{{url('admin/users/userList')}}">
                {{--<input type="hidden" name="provinceId" value="{{$result['provinceId']?$result['provinceId']:""}}">--}}
                {{--<input type="hidden" name="cityId" value="{{$result['cityId']?$result['cityId']:""}}">--}}
                {{--<input type="hidden" name="countyId" value="{{$result['countyId']?$result['countyId']:""}}">--}}
                {{--<input type="hidden" name="schoolId" value="{{$result['schoolId']?$result['schoolId']:""}}">--}}
                {{--<input type="hidden" name="gradeId" value="{{$result['gradeId']?$result['gradeId']:""}}">--}}
                {{--<input type="hidden" name="classId" value="{{$result['classId']?$result['classId']:""}}">--}}

                <select class="input-select" name="type" style="margin-left:500px;float:left;">
                        <option value="">-用户身份-</option>
                        <option value="3" {{$result['type'] == 3?'selected':""}}>学生</option>
                        <option value="1" {{$result['type']==1 ?'selected':""}}>教师</option>
                        <option value="2" {{$result['type']==2 ?'selected':""}}>家长</option>
                </select>
                                <span class="input-icon">
                                    <input type="text" placeholder="用户名 ..." name="username" class="nav-search-input"
                                           id="nav-search-input" autocomplete="off"/>
                                    <i class="icon-search nav-search-icon"></i>
                                </span>

                <input style="background: #579ecb;width:60px;border:0;color:#fff;" type="submit" value="搜索"/>
            </form>
        </div><!-- #nav-search -->
    </div>

    <div class="page-content">
        <div class="page-header" style="padding-bottom:5px;position: relative;">
            <h1>
                用户管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    用户列表
                </small>
                @permission('user.create')
                <a href="{{url('admin/users/addsUser')}}" class="btn btn-xs btn-success"
                   style="margin-left:8px;">
                    <strong class="icon-expand-alt bigger-30">&nbsp;添加用户</strong>
                </a>
                @endpermission
            </h1>
            <form method="get" action="{{url('admin/users/userList')}}">
                {{--<input type="hidden" name="type" value="{{$result['type']?$result['type']:""}}">--}}
                {{--<input type="hidden" name="username" value="{{$result['username']?$result['username']:""}}">--}}
            @if(\Auth::user()->level() > 6)
            <select style="float:left;margin-top:14px;width: 90px;" id='province' name="provinceId">
                <option value="">所在省份</option>
                @foreach($organizes as $value)
                    <option value="{{$value->id}}" {{$result['provinceId'] == $value->id ?'selected':""}}>{{$value->organize_name}}</option>
                @endforeach
            </select>
            <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="city"  name="cityId">
                @if($result['provinceId'])
                    <option value="">所在市区</option>
                    @foreach( $citys as $value)
                        <option value="{{$value->id}}" {{$result['cityId'] == $value->id ?'selected':""}} >{{$value->city_name}}</option>
                    @endforeach
                @else
                    <option value="">所在市区</option>
                @endif
            </select>
            <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="county"  name="countyId">
                @if($result['cityId'])
                    <option value="">所在县区</option>
                    @foreach( $countys as $value)
                        <option value="{{$value->id}}" {{$result['countyId'] == $value->id ?'selected':""}} >{{$value->county_name}}</option>
                    @endforeach
                @else
                    <option value="">所在县区</option>
                @endif
            </select>
            <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="school"  name="schoolId">
                @if($result['countyId'])
                    <option value="">所属学校</option>
                    @foreach( $schools as $value)
                        <option value="{{$value->id}}" {{$result['schoolId'] == $value->id ?'selected':""}} >{{$value->schoolName}}</option>
                    @endforeach
                @else
                    <option value="">所属学校</option>
                @endif
            </select>
            <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="grade" name="gradeId">
                @if($result['schoolId'])
                    <option value="">所在年级</option>
                    @foreach( $grades as $value)
                        <option value="{{$value->id}}" {{$result['gradeId'] == $value->id ?'selected':""}} >{{$value->gradeName}}</option>
                    @endforeach
                @else
                    <option value="">所在年级</option>
                @endif
            </select>
            <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="class" name="classId">
                @if($result['gradeId'])
                    <option value="">所在班级</option>
                    @foreach( $classes as $value)
                        <option value="{{$value->id}}" {{$result['classId'] == $value->id ?'selected':""}} >{{$value->classname}}</option>
                    @endforeach
                @else
                    <option value="">所在班级</option>
                @endif
            </select>
            @endif

            @if(\Auth::user()->level() == 6)
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="city" name="cityId">
                    <option value="">所在市区</option>
                    @foreach($data->cityNames as $value)
                        <option value="{{$value->id}}" {{$result['cityId'] == $value->id ?'selected':""}} >{{$value->city_name}}</option>
                    @endforeach
                </select>
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="county" name="countyId">
                    @if($result['cityId'])
                        <option value="">所在县区</option>
                        @foreach( $organizes['countys'] as $value)
                            <option value="{{$value->id}}" {{$result['countyId'] == $value->id ?'selected':""}} >{{$value->county_name}}</option>
                        @endforeach
                    @else
                        <option value="">所在县区</option>
                    @endif
                </select>
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="school" name="schoolId">

                    @if($result['countyId'])
                        <option value="">所属学校</option>
                        @foreach( $organizes['schools'] as $value)
                            <option value="{{$value->id}}" {{$result['schoolId'] == $value->id ?'selected':""}} >{{$value->schoolName}}</option>
                        @endforeach
                    @else
                        <option value="">所属学校</option>
                    @endif
                </select>
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="grade" name="gradeId">
                    @if($result['schoolId'])
                        <option value="">所在年级</option>
                        @foreach( $organizes['grades'] as $value)
                            <option value="{{$value->id}}" {{$result['gradeId'] == $value->id ?'selected':""}} >{{$value->gradeName}}</option>
                        @endforeach
                    @else
                        <option value="">所在年级</option>
                    @endif
                </select>
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="class" name="classId">

                    @if($result['gradeId'])
                        <option value="">所在班级</option>
                        @foreach( $organizes['classes'] as $value)
                            <option value="{{$value->id}}" {{$result['classId'] == $value->id ?'selected':""}} >{{$value->classname}}</option>
                        @endforeach
                    @else
                        <option value="">所在班级</option>
                    @endif
                </select>
            @endif
            @if(\Auth::user()->level() == 5)
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="county" name="countyId">
                    <option value="">所在县区</option>
                    @foreach($data->countyNames as $value)
                        <option value="{{$value->id}}" {{$result['countyId'] == $value->id ?'selected':""}}>{{$value->county_name}}</option>
                    @endforeach
                </select>
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="school" name="schoolId">
                    @if($result['countyId'])
                        <option value="">所属学校</option>
                        @foreach( $organizes['schools'] as $value)
                            <option value="{{$value->id}}" {{$result['schoolId'] == $value->id ?'selected':""}} >{{$value->schoolName}}</option>
                        @endforeach
                    @else
                        <option value="">所属学校</option>
                    @endif
                </select>
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="grade" name="gradeId">
                    @if($result['schoolId'])
                        <option value="">所在年级</option>
                        @foreach( $organizes['grades'] as $value)
                            <option value="{{$value->id}}" {{$result['gradeId'] == $value->id ?'selected':""}} >{{$value->gradeName}}</option>
                        @endforeach
                    @else
                        <option value="">所在年级</option>
                    @endif
                </select>
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="class" name="classId">
                    @if($result['gradeId'])
                        <option value="">所在班级</option>
                        @foreach( $organizes['classes'] as $value)
                            <option value="{{$value->id}}" {{$result['classId'] == $value->id ?'selected':""}} >{{$value->classname}}</option>
                        @endforeach
                    @else
                        <option value="">所在班级</option>
                    @endif
                </select>
            @endif

            @if(\Auth::user()->level() == 4)
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="school" name="schoolId">
                    <option value="">所属学校</option>
                    @foreach($data->schoolNames as $value)
                        <option value="{{$value->id}}" {{$result['schoolId'] == $value->id ?'selected':""}}>{{$value->schoolName}}</option>
                    @endforeach
                </select>
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="grade" name="gradeId">
                    @if($result['schoolId'])
                        <option value="">所在年级</option>
                        @foreach( $organizes['grades'] as $value)
                            <option value="{{$value->id}}" {{$result['gradeId'] == $value->id ?'selected':""}} >{{$value->gradeName}}</option>
                        @endforeach
                    @else
                        <option value="">所在年级</option>
                    @endif
                </select>
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="class" name="classId">
                    @if($result['gradeId'])
                        <option value="">所在班级</option>
                        @foreach( $organizes['classes'] as $value)
                            <option value="{{$value->id}}" {{$result['classId'] == $value->id ?'selected':""}} >{{$value->classname}}</option>
                        @endforeach
                    @else
                        <option value="">所在班级</option>
                    @endif
                </select>
            @endif

            @if(\Auth::user()->level() == 3)

                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="grade" name="gradeId">
                    <option value="">所在年级</option>
                    @foreach($data->gradeNames as $value)
                        <option value="{{$value->id}}" {{$result['gradeId'] == $value->id ?'selected':""}}>{{$value->gradeName}}</option>
                    @endforeach
                </select>
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="class" name="classId">
                    @if($result['gradeId'])
                        <option value="">所在班级</option>
                        @foreach( $organizes['classes'] as $value)
                            <option value="{{$value->id}}" {{$result['classId'] == $value->id ?'selected':""}} >{{$value->classname}}</option>
                        @endforeach
                    @else
                        <option value="">所在班级</option>
                    @endif
                </select>
            @endif

            @if(\Auth::user()->level() == 2)
                <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="class" name="classId">
                    <option value="">所在班级</option>
                    @foreach($data->classNames as $value)
                        <option value="{{$value->id}}" {{ $value->id == $result['classId'] ? 'selected': '' }}>{{$value->classname}}</option>
                    @endforeach
                </select>
            @endif
                <input style="background: #579ecb;width:80px;height:28px ;border:0;margin:15px 0 0 20px ; color:#fff;" type="submit" value="查找" />
            </form>

        </div><!-- /.page-header -->

        <div class="row">

            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">

                    <div class="col-xs-12">

                        <div class="table-responsive">
                            <input type="hidden" name="maxCount" value="{{$count}}"/>
                            @permission('user.create')
                                <form action="{{url('admin/excel/userInfoImport')}}" method="post" enctype="multipart/form-data" style="float:right;">
                                    <input type="submit" class="btn btn-xs btn-info" id="infoExport" value="导入用户信息" style="width:86px; cursor: pointer;margin-left:40px;" />
                                    <input type="file" name="excel" style="float:right;width:50%; cursor: pointer;margin-right:0;"/>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                                </form>
                                <a href="{{url('admin/excel/userInfoTemplate')}}" class="btn btn-xs btn-info" style="float: right;margin-right:-30px;">
                                    下载导入模板
                                </a>
                            @endpermission
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">
                                        <label>
                                            <span class="lbl">编号</span>
                                        </label>
                                    </th>
                                    <th>用户名</th>
                                    <th>
                                        <i class="hidden-480"></i>
                                        用户状态
                                    </th>
                                    <th>邮箱</th>
                                    <th class="hidden-480">手机</th>

                                    <th>
                                        <i class="hidden-480"></i>
                                        用户身份
                                    </th>

                                    <th>
                                        <i class="hidden-480"></i>
                                        用户头像
                                    </th>

                                    <th>
                                        <i class="hidden-480"></i>
                                        审核状态
                                    </th>
                                    <th class="hidden-480">创建时间</th>
                                    <th class="hidden-480">修改时间</th>

                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach ($userLists as $userList)
                                        {{--@if($userList->level < \Auth::user()->level())--}}
                                            <tr id="btn{{$userList->id}}">
                                                <td class="center">
                                                    <label>
                                                        <span class="lbl">{{$userList->id}}</span>
                                                    </label>
                                                </td>

                                                <td>
                                                    <a href="{{url('admin/users/show/'.$userList->id)}}">{{$userList->username}}</a>
                                                </td>
                                                <td>{{ $userList->status ? "后台导入":"前台注册" }}</td>

                                                <td>{{$userList->email}}</td>
                                                <td class="hidden-480">{{$userList->phone}}</td>
                                                <td>
                                                    @if($userList->type == 1)
                                                        教师
                                                    @elseif($userList->type == 2)
                                                        家长
                                                    @elseif($userList->type==3)
                                                        学生
                                                    @endif
                                                </td>
                                                <td><img width="40" height="40" src="{{$userList->pic}}" alt=""></td>
                                                <td name="checkstatus" id="checks{{$userList->id}}"> {{ $userList->checks ? "已审核":"未审核" }}</td>

                                                <td class="hidden-480">
                                                    <span>{{ $userList->created_at }}</span>
                                                </td>

                                                <td class="hidden-480">
                                                    <span>{{ $userList->updated_at }}</span>
                                                </td>

                                                <td>
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                        @permission('user.edit')
                                                        <a href="{{url('admin/users/editUser/'.$userList->id)}}"
                                                           class="btn btn-xs btn-info">
                                                            <strong>编辑</strong>
                                                        </a>
                                                        @endpermission

                                                        @permission('user.remove')
                                                        <button class="btn btn-xs btn-danger" name="btn-delete" onclick="delUser({{$userList->id}});">
                                                            <strong>删除</strong>
                                                        </button>
                                                        @endpermission

                                                        @permission('user.resetpass')
                                                        <a href="{{url('admin/users/resetPass/'.$userList->id)}}"
                                                           class="btn btn-xs btn-success" name="reset-pass">
                                                            <strong>重置密码</strong>
                                                        </a>
                                                        @endpermission


                                                        <a href="{{url('admin/users/show/'.$userList->id)}}"
                                                           class="btn btn-xs btn-success" name="person-detail">
                                                            <strong>查看详情</strong>
                                                        </a>


                                                        @permission('user.check')
                                                        <span class="btn btn-xs btn-info" name="btn-status" onchange="changeStatus({{$userList->id}});" style="position: relative;display: inline-block;">
                                                            <strong>审核状态</strong>
                                                            <select id="form-field-status{{$userList->id}}" class="col-xs-10 col-sm-2" name="form-field-status" style="filter:alpha(opacity=0); -moz-opacity:0; -khtml-opacity:0;opacity: 0;position:absolute;top:-2px;left:0;z-index: 2;cursor: pointer;height:23px;width:59px;">
                                                                <option value="0" {{$userList->checks==0 ? 'selected':''}}>未审核</option>
                                                                <option value="1" {{$userList->checks==1 ? 'selected':''}}>已审核</option>
                                                            </select>
                                                        </span>
                                                        @endpermission


                                                    </div>
                                                </td>
                                            </tr>
                                            {{--@endif--}}
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $userLists -> appends( app('request') -> all() ) -> render() !!}
                            @if(\Auth::user()->level() > 1)
                                @if(count($userLists))
                                <form action="{{url('admin/excel/userInfoExport')}}" method="post" style="float: right;margin-top:65px;margin-right:-130px;">
                                    <input type="submit" class="btn btn-xs btn-info"  value="导出用户信息" style="width:86px; cursor: pointer; margin-top:-87px;margin-right:130px;" />
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <input type="hidden" name="excels" value="{{ $excels }}"/>
                                </form>
                                @endif
                            @endif
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        });

        function delUser(userId){
//            alert($("#btn"+userId).html());return;
            var page = '';
            var url = '';
            var maxCount = $("input[name='maxCount']").val();
            var maxPage = Math.ceil(maxCount/15);
            var collect = location.href.split('?')[1];
            if(collect){
                var params = collect.split('&');
                if(params.length == 1){
                    page = collect.split('=')[1];
                    if(page < 1){
                        page = 1;
                    }
                    if(page > maxPage){
                        page = maxPage;
                    }
                    url = "userList"+"?page="+page;
                }
                if(params.length > 1){
                    if(params[params.length-1].split('=')[0] != 'page'){
                        url = "userList?"+collect;
                    }else{
                        page = params[params.length-1].split('=')[1];
                        if(page < 1){
                            page = 1;
                        }
                        if(page > maxPage){
                            page = maxPage;
                        }
                        url = "userList?"+collect;
                    }
                }

            }else if(collect === undefined){
                url = 'userList';
            }else{
                page = page;
            }
//            alert(page);return;
            var resu = confirm("确定删除吗？");
            if (resu === true) {
                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/delUser')}}",
                    data: 'id=' + userId,
                    dataType: 'json',


                    success: function (result) {
//						alert(result.msg);
                        if (result.status === true) {
//                            $("#btn"+userId).remove();
                                window.location.href = url;
                        }
                    }
                });
            } else {
                return;
            }
        }

       function changeStatus(userId){
           var checks = $("#form-field-status"+userId).val();
           $.ajax({
               type: "post",
               url: "{{url('admin/users/changeStatus')}}",
               data: {'id':userId,'checks':checks},
               dataType: 'json',


               success: function (result) {
//						alert(result.msg);
                   if (result.status === true) {
                                $("#checks"+userId).html(result.msg);
//                       window.location.href = "userList";
                   }
               }
           });
        }
    </script>
    <script>
        $(function () {
            // 删除用户
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            });

            //Ajax提交，发送_token
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            });

            $("#province").change(function () {
                $('#city').html('<option value="">-所在城市-</option>');
                $('#county').html('<option value="">-所在县区-</option>');
                $('#school').html('<option value="">-所属学校-</option>');
                $('#grade').html('<option value="">-所在年级-</option>');
                $('#class').html('<option value="">-所在班级-</option>');

                var provinceId = $("#province").val();
                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/province')}}",
                    data: 'provinceId=' + provinceId,
                    dataType: 'json',

                    success: function (result) {
                        var str = '<option value="">-所在城市-</option>';
//                        var str1 = '<option value="">-所属学校-</option>';
                        if (result.status === true) {
//                            console.log(result.city);
                            $.each(result.city, function (i, val) {
                                str += '<option value="' + val.id + '">' + val.city_name + '</option>';
                            })
//                            $.each(result.school, function (i, val) {
//                                str1 += '<option value="' + val.schoolId + '">' + val.schoolName + '</option>';
//                            })
                            $('#city').html(str);
//                            $('#school').html(str1);
                        }
                    }
                });
            })
            //市级联动
            $("#city").change(function () {
                $('#county').html('<option value="">-所在县区-</option>');
                $('#school').html('<option value="">-所属学校-</option>');
                $('#grade').html('<option value="">-所在年级-</option>');
                $('#class').html('<option value="">-所在班级-</option>');
                var cityId = $("#city").val();
                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/city')}}",
                    data: 'cityId=' + cityId,
                    dataType: 'json',

                    success: function (data) {
                        var str = '<option value="">-所在县区-</option>';
                        if (data.status === true) {
                            $.each(data.county, function (i, val) {
                                str += '<option value="' + val.id + '">' + val.county_name + '</option>';
                            })
                            $('#county').html(str);
                        }
                    }
                });
            })
            //县区联动
            $("#county").change(function () {
                $('#school').html('<option value="">-所属学校-</option>');
                $('#grade').html('<option value="">-所在年级-</option>');
                $('#class').html('<option value="">-所在班级-</option>');
                var countyId = $("#county").val();
                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/county')}}",
                    data: 'countyId=' + countyId,
                    dataType: 'json',

                    success: function (result) {
                        var str = '<option value="">-所属学校-</option>';
                        if (result.status === true) {
                            $.each(result.school, function (i, val) {
                                str += '<option value="' + val.schoolId + '">' + val.schoolName + '</option>';
                            })
                            $('#school').html(str);
                        }
                    }
                });
            })

            //学校联动
            $("#school").change(function () {
                $('#grade').html('<option value="">-所在年级-</option>');
                $('#class').html('<option value="">-所在班级-</option>');

                var schoolId = $("#school").val();
                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/school')}}",
                    data: 'schoolId=' + schoolId,
                    dataType: 'json',

                    success: function (result) {
                        var str = '<option value="">-所在年级-</option>';
                        if (result.status === true) {
                            $.each(result.grade, function (i, val) {
                                str += '<option value="' + val.gradeId + '">' + val.gradeName + '</option>';
                            })
                            $('#grade').html(str);
                        }
                    }
                });
            })

            //年级联动
            $("#grade").change(function(){
                $('#class').html('<option value="">-所在班级-</option>');

                var gradeId = $("#grade").val();
                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/grade')}}",
                    data: 'gradeId=' + gradeId,
                    dataType: 'json',

                    success: function (result) {
                        var str = '<option value="">-所在班级-</option>';
                        if (result.status === true) {
                            $.each(result.schoolclass,function(i,val){
                                str += '<option value="'+val.schoolclassId+'">'+val.schoolclassName+'</option>';
                            })
                            $('#class').html(str);
                        }
                    }
                });
            })

        })
    </script>
@endsection