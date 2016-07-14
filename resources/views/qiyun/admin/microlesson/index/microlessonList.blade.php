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

            <form class="form-search"  method="get" action="{{url('admin/microlesson/microlessonList')}}">
                <select name="flag" id="form-field-1">
                    <option value="0" @if($data->flag == 0) selected @endif>全部</option>
                    <option value="1" @if($data->flag == 1) selected @endif>微课名称</option>
                    <option value="2" @if($data->flag == 2) selected @endif>用户名</option>
                    <option value="3" @if($data->flag == 3) selected @endif>微课主题</option>
                </select> 
                <span class="input-icon">
                  <input type="text" placeholder="请输入微课名称" class="nav-search-input" id="nav-search-input" autocomplete="off"   name="ln"  />
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
                微课管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    微课信息列表
                </small>
            </h1>
        </div><!-- /.page-header -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

 

        <form action="{{url('admin/microlesson/addmicro')}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <a href="{{url('admin/microlesson/addmicro')}}" class="btn btn-xs btn-info">
                  <i class="icon-ok bigger-110">添加微课</i>
              </a>
         </form>



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
                                    <th>微课名称</th>
                                    <th>用户名</th>
                                    <th>微课主题</th>
                                    <th>微课简介</th>
                                    <th>logo</th>
                                    <th>微课作者</th>
                                    <th>视频路径</th>
                                    <th>微课点击数</th>
                                    <th>微课点赞数</th>
                                    <th>微课类型</th>
                                    <th>微课总时长</th>
                                    <th>微课状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach($data as $micro)
                                          <tr>
                                             
                                              
                                              <td>
                                                  <a href="#">{{$micro->id}}</a>
                                              </td>
                                              <td>{{$micro->lessonName}}</td>
                                              <td>{{$micro->username}}</td>
                                              <td>{{$micro->lessonTitle}}</td>
                                              <td>{{$micro->lessonDes}}</td>
                                              <td> <img src="{{asset($micro->logo)}}" alt="" width="80" height="60" > </td>
                                              <td>{{$micro->author}}</td>
                                              <td><a href="{{url('microLesson/microLessonDetail/'.$micro->id)}}">查看视频</a></td>
                                              <td>{{$micro->viewNum}}</td>
                                              <td>{{$micro->likeNum}}</td>
                                              <td>{{$micro->type? '拍摄' : '录制音频图片'}}</td>
                                              <td>{{$micro->lessonTime}}</td>
                                              <td>{{$micro->status ? '未审核':'发布'}}</td>

                                              <td>
                                                  <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                      {{--<button class="btn btn-xs btn-success">--}}
                                                          {{--<i class="icon-ok bigger-120"></i>--}}
                                                      {{--</button>--}}

                                                      <a href="{{url('admin/microlesson/editmicrolesson/'.$micro->id)}}" class="btn btn-xs btn-info">
                                                          <i class="icon-edit bigger-120"></i>
                                                      </a>

                                                      <a href="{{url('admin/microlesson/delmicro/'.$micro->id)}}" style="width:29px" class="btn btn-xs btn-danger" onclick="return confirm('删除后将无法找回,确定要删除吗?');">
                                                          <i class="icon-trash bigger-120"></i>
                                                      </a>

                                                      {{--<button class="btn btn-xs btn-warning">--}}
                                                          {{--<i class="icon-flag bigger-120"></i>--}}
                                                      {{--</button>--}}
                                                       <a href="{{url('admin/microlesson/detailmicrolesson/'.$micro->id)}}" class="btn btn-xs btn-success" name="person-detail">
                                                          <i class="icon-ok bigger-120">查看详情</i>
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
