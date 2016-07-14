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

            <form class="form-search"  method="get" action="{{url('admin/organization/provinceList')}}">
                <select name="flag" id="form-field-1">
                    <option value="0" @if($data->flag == 0) selected @endif>全部</option>
                    <option value="1" @if($data->flag == 1) selected @endif>省教育局名称</option>
                    <option value="2" @if($data->flag == 2) selected @endif>电话</option>
                </select>
                <span class="input-icon">
                  <input type="text" placeholder="请输入......" class="nav-search-input" id="nav-search-input" autocomplete="off"   name="ln"  />
                   <!-- <button class="icon-search nav-search-icon" type="submit"></button> -->
                  <i class="icon-search nav-search-icon"></i>
                </span>
                <!-- 按钮  -->
                <input style="background: #579ecb;width:60px;" type="submit" value="搜索"/>
            </form>

        </div><!-- #nav-search -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                组织机构
                <small>
                    <i class="icon-double-angle-right"></i>
                    单位组织
                </small>
            </h1>
        </div><!-- /.page-header -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

@level(7)
         <form action="{{url('admin/organization/addsprovince')}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <a href="{{url('admin/organization/addsprovince')}}" class="btn btn-xs btn-info">
                  <i class="icon-ok bigger-110">添加</i>
              </a>
         </form>
@endlevel
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">

                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">

                                <thead>
                                <tr>
                                   
                                    <th>id</th>
                                    <th>省级单位名称</th>
                                    <th>省级单位介绍</th>
                                    <th>电话</th>
                                    <th>地址</th>
                                    <th>邮编</th>
                                    <th>传真</th>
                                    <th>学校类型</th>
                                    <th>添加时间</th>
                                    <th>更新时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach($data as $pro)
                                          <tr>
                                           
                                              
                                              <td>
                                                  <a href="#">{{$pro->id}}</a>
                                              </td>
                                              <td>{{$pro->organize_name}}</td>
                                              <td>{{$pro->organize_intro}}</td>
                                              <td>{{$pro->organize_tel}}</td>
                                              <td>{{$pro->address}}</td>
                                              <td>{{$pro->postcode}} </td>
                                              <td>{{$pro->faxes}}</td>
                                              <td>
                                                @if($pro->type == 0)
                                                    小学
                                                @elseif($pro->type == 1)
                                                    初中
                                                @else
                                                    高中
                                                @endif
                                              </td>
                                            <!--   <td>{{$pro->status ? '锁定':'激活'}}</td> -->
                                              <td>{{$pro->created_at}}</td>
                                              <td>{{$pro->updated_at}}</td>
                                              

                                              <td>
                                                  <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                     
                                                      

@if(\Auth::user()->level() > 7)


                                                      <a href="{{url('admin/organization/editprovince/'.$pro->id)}}" class="btn btn-xs btn-info">
                                                          <i class="icon-edit bigger-120"></i>
                                                      </a>
 
      
                                                     
                                                      <a href="{{url('admin/organization/delpro/'.$pro->id)}}" style="width:29px" class="btn btn-xs btn-danger" onclick="return confirm('删除后将无法找回,确定要删除吗?');">
                                                          <i class="icon-trash bigger-120"></i>
                                                      </a>

@endif
                                                      <a href="{{ url('admin/auth/checkManagers/3/'.$pro->id) }}" class="btn btn-xs btn-success">
                                                          查看管理员
                                                      </a>


                                                  </div>

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
    </div><!-- /.page-content -->
@endsection
