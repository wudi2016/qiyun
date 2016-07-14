@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try { ace.settings.check('breadcrumbs' , 'fixed') } catch (e) {}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="{{url('admin/index')}}">首页</a>
            </li>
            <li class="active">控制台</li>
        </ul>

        <!-- <div class="nav-search" id="nav-search">
            <form action="{{url('admin/teacherList')}}" method="get" class="form-search">
                <span class="input-icon">
                    <input type="text" name="search" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <button class="icon-search nav-search-icon" type="submit"></button>
                </span>
            </form>
        </div> -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                权限管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    用户组列表
                    <a href="{{ url( 'admin/auth/addRole') }}" class="btn btn-xs btn-success">添加角色组</a>
                </small>
            </h1>
        </div>

        @if (session('message')) <div class="alert alert-success">{{ session('message') }}</div> @endif
        @if (session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

        <div class="row">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>角色组ID</th>
                                    <th>角色组名称</th>
                                    <th>角色组别名</th>
                                    <th>角色组描述</th>
                                    <th>角色组级别</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach( $roleList as $roles )
                                        <tr>

                                            <td> <a> {{ $roles -> id }} </a> </td>
                                            <td> <a> {{ $roles -> name }} </a> </td>
                                            <td> <a> {{ $roles -> slug }} </a> </td>
                                            <td> <a> {{ $roles -> description }} </a> </td>
                                            <td> <a> {{ $roles -> level }} </a> </td>
                                            <td> <a> {{ $roles -> created_at }} </a> </td>
                                            <td> <a> {{ $roles -> updated_at }} </a> </td>

                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                    <a href="{{ url( 'admin/auth/roleEdit/' . $roles -> id ) }}" class="btn btn-xs btn-info">编辑</a>
                                                    <a href="{{ url( 'admin/auth/roleDelete/' . $roles -> id ) }}" class="btn btn-xs btn-danger" onclick="return confirm('删除后将无法找回,确定要删除吗?');">删除</a>
                                                </div>
                                            </td>

                                        </tr>
                                      @endforeach
                                   </form>

                                </tbody>
                            </table>
                            {!! $roleList -> appends( app('request') -> all() ) -> render() !!}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection