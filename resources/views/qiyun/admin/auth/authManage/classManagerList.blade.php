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

        <!-- <div class="nav-search" id="nav-search">
            <form action="{{url('admin/teacherList')}}" method="get" class="form-search">
                <span class="input-icon">
                    <input type="text" name="search" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <button class="icon-search nav-search-icon" type="submit"></button>
                </span>
            </form>
        </div> --><!-- #nav-search -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                管理员权限管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    班级管理员列表
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
                                    <th>管理员名称</th>
                                    <th>所属班级</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach( $classManagerList as $classManager )
                                        <tr>

                                            <td> <a> {{ $classManager -> username }} </a> </td>
                                            <td> <a> {{ $classManager -> classname }} </a> </td>
                                            <td> <a> {{ $classManager -> created_at }} </a> </td>
                                            <td> <a> {{ $classManager -> updated_at }} </a> </td>

                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                    @level(2)
                                                        @permission('manager.check')
                                                            <a href="{{ url( 'admin/auth/checkPermissions/' . $classManager -> user_id ) }}" class="btn btn-xs btn-success">
                                                                查看操作权限
                                                            </a>
                                                        @endpermission

                                                        @permission('manager.modify') 
                                                            <a href="{{ url( 'admin/auth/modifyManager/' . $classManager -> id ) . '/'. $classManager -> user_id .'/classManagerList' }}" class="btn btn-xs btn-info">
                                                                修改角色级别
                                                            </a>
                                                        @endpermission
                                                        
                                                        @permission('manager.remove') 
                                                            <a href="{{ url( 'admin/auth/revokeManager/' . $classManager -> id .'/'. $classManager -> user_id .'/0' ) }}" class="btn btn-xs btn-danger" onclick="return confirm('确认撤销该权限?');">
                                                                撤销
                                                            </a>
                                                        @endpermission
                                                    @endlevel
                                                </div>
                                            </td>

                                        </tr>
                                      @endforeach
                                   </form>

                                </tbody>
                            </table>
                            {!! $classManagerList -> appends( app('request') -> all() ) -> render() !!}
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->


            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection