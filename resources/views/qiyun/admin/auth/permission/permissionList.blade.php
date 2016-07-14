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

       <!--  <div class="nav-search" id="nav-search">
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
                    操作权限列表
                    <a href="{{ url( 'admin/auth/addPermission') }}" class="btn btn-xs btn-success">添加操作权限</a>
                </small>
            </h1>
        </div><!-- /.page-header -->

        @if (session('message')) <div class="alert alert-success">{{ session('message') }}</div> @endif
        @if (session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>操作权限名称</th>
                                    <th>操作权限别名</th>
                                    <th>操作权限描述</th>
                                    <th>操作权限对应模块</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach( $permissionList as $permission )
                                        <tr>
                                            <td> <a> {{ $permission -> name }} </a> </td>
                                            <td> <a> {{ $permission -> slug }} </a> </td>
                                            <td> <a> {{ $permission -> description }} </a> </td>
                                            <td> <a> {{ $permission -> model }} </a> </td>
                                            <td> <a> {{ $permission -> created_at }} </a> </td>
                                            <td> <a> {{ $permission -> updated_at }} </a> </td>

                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                    <a href="{{ url( 'admin/auth/checkRolePermission/' . $permission -> id ) }}" class="btn btn-xs btn-success">查看用户组</a>
                                                    <a href="{{ url( 'admin/auth/permissionEdit/' . $permission -> id ) }}" class="btn btn-xs btn-info">编辑</a>
                                                    <a href="{{ url( 'admin/auth/permissionDelete/' . $permission -> id ) }}" class="btn btn-xs btn-danger" onclick="return confirm('删除后将无法找回,确定要删除吗?');">删除</a>
                                                 </div>
                                            </td>
                                        </tr>
                                      @endforeach
                                   </form>

                                </tbody>
                            </table>
                            {!! $permissionList -> appends( app('request') -> all() ) -> render() !!}
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->


            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection