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
                管理员权限管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    查看操作权限
                    @permission('manager.create') 
                        <a href="{{ url( 'admin/auth/addUserPermission/'. $userID ) }}" class="btn btn-xs btn-success">添加操作权限</a>
                    @endpermission
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
                                        <th>操作权限名称</th>
                                        <th>创建时间</th>
                                        <th>修改时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach( $checkPermissions as $permissions )
                                        <tr>

                                            <td> <a> {{ $permissions -> description }} </a> </td>
                                            <td> <a> {{ $permissions -> created_at }} </a> </td>
                                            <td> <a> {{ $permissions -> updated_at }} </a> </td>

                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                    <a href="{{ url( 'admin/auth/revokeManager/'. $permissions -> id .'/username/1' ) }}" class="btn btn-xs btn-danger" onclick="return confirm('确认撤销该管理员权限?');">撤销权限</a>
                                                </div>
                                            </td>

                                        </tr>
                                      @endforeach
                                   </form>

                                </tbody>
                            </table>
                            {!! $checkPermissions -> appends( app('request') -> all() ) -> render() !!}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection