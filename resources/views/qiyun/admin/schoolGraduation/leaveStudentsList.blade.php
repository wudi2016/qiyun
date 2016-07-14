@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="{{url('admin/index')}}">首页</a>
            </li>
            <li class="active">控制台</li>
        </ul><!-- .breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form action="{{url('admin/graduation/graduationList')}}" method="get" class="form-search">
                <select name="type" id="form-field-1">
                    <option value="1" @if($data->type == 1) selected @endif>ID</option>
                    <option value="2" @if($data->type == 2) selected @endif>学号</option>
                    <option value="3" @if($data->type == 3) selected @endif>真实姓名</option>
                    <option value="4" @if($data->type == 4) selected @endif>学校名称</option>
                    <option value="5" @if($data->type == 5) selected @endif>年级</option>
                    <option value="6" @if($data->type == 6) selected @endif>全部</option>
                </select>
                <span class="input-icon">
                    <input type="text" name="search" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <button class="icon-search nav-search-icon" type="submit"></button>
                </span>
            </form>
        </div><!-- #nav-search -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                离校学生
                <small>
                    <i class="icon-double-angle-right"></i>
                    离校学生
                </small>
            </h1>
        </div><!-- /.page-header -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
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

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    {{--<th class="center">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" class="ace" />--}}
                                            {{--<span class="lbl"></span>--}}
                                        {{--</label>--}}
                                    {{--</th>--}}
                                    <th>ID</th>
                                    <th>学号</th>
                                    <th>登录名</th>
                                    <th>真实姓名</th>
                                    <th>email</th>
                                    <th>性别</th>
                                    <th>手机号</th>
                                    <th>学校</th>
                                    <th>年级</th>
                                    <th>班级</th>
                                    {{--<th>是否毕业年级</th>--}}
                                    <th>是否离校</th>
                                    {{--<th>操作</th>--}}
                                </tr>
                                </thead>

                                <tbody>
                                <form action="" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @foreach($data as $student)
                                        <tr>
                                            {{--<td class="center">--}}
                                                {{--<label>--}}
                                                    {{--<input type="checkbox" class="ace" name="id[]" value="{{$student->id}}"/>--}}
                                                    {{--<span class="lbl"></span>--}}
                                                {{--</label>--}}
                                            {{--</td>--}}

                                            <td>
                                                <a href="#">{{$student->id}}</a>
                                            </td>
                                            <td>{{$student->sno}}</td>
                                            <td>{{$student->username}}</td>
                                            <td>{{$student->realname}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->sex ? '女':'男'}}</td>
                                            <td>{{$student->phone}}</td>
                                            <td>{{$student->schoolName}}</td>
                                            <td>{{$student->gradeName}}</td>
                                            <td>{{$student->classname}}</td>

                                            {{--<td>{{$student->intake}}</td>--}}
                                            {{--<td>{{$student->isGraduate ? '是' : '否'}}</td>--}}
                                            <td>{{$student->isleave ? '已离校': '未离校'}}</td>

                                            {{--<td>--}}
                                                {{--<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">--}}
                                                    {{--<button class="btn btn-xs btn-success">--}}
                                                    {{--<i class="icon-ok bigger-120"></i>--}}
                                                    {{--</button>--}}

                                                    {{--<a href="{{url('admin/graduation/editGraduation/'.$student->id)}}" class="btn btn-xs btn-info">--}}
                                                        {{--<i class="icon-edit bigger-120"></i>--}}
                                                    {{--</a>--}}

                                                    {{--<a href="{{url('admin/graduation/delSchoolClass/'.$student->id)}}" class="btn btn-xs btn-danger" onclick="return confirm('删除后无法找回,确定要删除吗?');">--}}
                                                        {{--<i class="icon-trash bigger-120"></i>--}}
                                                    {{--</a>--}}

                                                    {{--<button class="btn btn-xs btn-warning">--}}
                                                    {{--<i class="icon-flag bigger-120"></i>--}}
                                                    {{--</button>--}}
                                                {{--</div>--}}

                                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                    <div class="inline position-relative">
                                                        <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-cog icon-only bigger-110"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </form>
                                </tbody>
                            </table>
                            {!! $data->appends(app('request')->all())->render() !!}
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        {{--<a href="{{url('admin/school/addSchoolClass')}}" class="btn btn-xs btn-info">--}}
            {{--<i class="icon-ok bigger-110">添加</i>--}}
        {{--</a>--}}

        {{--<form action="{{url('admin/excel/schoolClassImport')}}" method="post" enctype="multipart/form-data" >--}}
            {{--<input type="submit" class="btn btn-xs btn-info" value="导入班级信息" style="margin-top: 10px;">--}}
            {{--<input type="file" name="excel">--}}
            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
            {{--<i class="icon-ok bigger-110" >导入学校信息</i>--}}
        {{--</form>--}}
    </div><!-- /.page-content -->
@endsection