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

            <form class="form-search"  method="get" action="{{url('admin/microlesson/microlessonComment')}}">
                <span class="input-icon">
                  <input type="text" placeholder="请输入评论用户名称" class="nav-search-input" id="nav-search-input" autocomplete="off"   name="ui"  />
                   <!-- <button class="icon-search nav-search-icon" type="submit"></button> -->
                  <i class="icon-search nav-search-icon"></i>
                </span>
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
                    微课评论管理
                </small>
            </h1>
        </div><!-- /.page-header -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
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
                                    
                                    <th>id</th>
                                    <th>评论用户</th>
                                    <th>评论内容</th>
                                    <th>评论的微课</th>
                                    <th>添加时间</th>
                                    <th>用户头像</th>
                                    <th>评论状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach($data as $comment)
                                          <tr>
                                             
                                              
                                              <td>
                                                  <a href="#">{{$comment->id}}</a>
                                              </td>
                                              <td>{{$comment->username}}</td>
                                              <td>{{$comment->content}}</td>
                                              <td>{{$comment->lessonName}}</td>
                                              <td><?php echo date('Y-m-d H:i:s', $comment->addTime); ?></td>
                                              <td><!-- {{$comment->picture}} --><img src="{{asset($comment->picture)}}" alt="" width="80" height="60" ></td>
                                              <td>{{$comment->status ? '未审核':'发布'}}</td>

                                              <td>
                                                  <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                      {{--<button class="btn btn-xs btn-success">--}}
                                                          {{--<i class="icon-ok bigger-120"></i>--}}
                                                      {{--</button>--}}

                                                      <a href="{{url('admin/microlesson/editcomment/'.$comment->id)}}" class="btn btn-xs btn-info">
                                                          <i class="icon-edit bigger-120"></i>
                                                      </a>

                                                      <a href="{{url('admin/microlesson/delcomment/'.$comment->id)}}" class="btn btn-xs btn-danger" onclick="return confirm('删除后将无法找回,确定要删除吗?');">
                                                          <i class="icon-trash bigger-120"></i>
                                                      </a>

                                                      {{--<button class="btn btn-xs btn-warning">--}}
                                                          {{--<i class="icon-flag bigger-120"></i>--}}
                                                      {{--</button>--}}
                                                        <a href="{{url('admin/microlesson/detailcomment/'.$comment->id)}}" class="btn btn-xs btn-success" name="person-detail">
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
