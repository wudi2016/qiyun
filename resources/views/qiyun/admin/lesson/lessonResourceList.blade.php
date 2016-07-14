@extends('qiyun.layouts.layoutAdmin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/video/css2/jquery.fancybox.css')}}" />
@endsection
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
            <form action="{{url('admin/lesson/lessonResourceList')}}" method="get" class="form-search">
                <select name="type" id="form-field-1">
                    <option value="1" @if($data->type == 1) selected @endif>ID</option>
                    <option value="2" @if($data->type == 2) selected @endif>备课名称</option>
                    <option value="3" @if($data->type == 3) selected @endif>资源名称</option>
                    <option value="4" @if($data->type == 4) selected @endif>用户名</option>
                    <option value="5" @if($data->type == 5) selected @endif>全部</option>
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
                协同备课资源管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    协同备课资源列表
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
                                    {{--<th class="center">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" class="ace" />--}}
                                            {{--<span class="lbl"></span>--}}
                                        {{--</label>--}}
                                    {{--</th>--}}
                                    <th>ID</th>
                                    <th>备课名称</th>
                                    <th>资源名称</th>
                                    <th>资源</th>
                                    <th>描述</th>
                                    <th>用户名</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach($data as $resource)
                                          <tr>
                                              {{--<td class="center">--}}
                                                  {{--<label>--}}
                                                      {{--<input type="checkbox" class="ace" />--}}
                                                      {{--<span class="lbl"></span>--}}
                                                  {{--</label>--}}
                                              {{--</td>--}}

                                              <td>
                                                  <a href="#">{{$resource->id}}</a>
                                              </td>
                                              <td>{{$resource->lessonSubjectName}}</td>
                                              <td>{{$resource->name}}</td>
                                              <td><a class="fancybox" href="{{asset($resource->resourceurl)}}" data-width="640" data-height="360">查看</a></td>
                                              <td>{{$resource->describes}}</td>
                                              <td>{{$resource->realname}}</td>
                                              <td>{{$resource->create_at}}</td>
                                              <td>{{$resource->update_at}}</td>


                                              <td>
                                                  <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                      {{--<button class="btn btn-xs btn-success">--}}
                                                          {{--<i class="icon-ok bigger-120"></i>--}}
                                                      {{--</button>--}}

                                                      {{--@permission('lesson.edit')--}}
                                                      <a href="{{url('admin/lesson/lessonResourceEdit/'.$resource->id)}}" class="btn btn-xs btn-info">
                                                          <i class="icon-edit bigger-120"></i>
                                                      </a>
                                                      {{--@endpermission--}}

                                                      {{--@permission('lesson.del')--}}
                                                      <a href="{{url('admin/lesson/delLessonResource/'.$resource->id)}}" class="btn btn-xs btn-danger" onclick="return confirm('删除后将无法找回,确定要删除吗?');">
                                                          <i class="icon-trash bigger-120"></i>
                                                      </a>
                                                      {{--@endpermission--}}

                                                      {{--<button class="btn btn-xs btn-warning">--}}
                                                          {{--<i class="icon-flag bigger-120"></i>--}}
                                                      {{--</button>--}}
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
@section('js')
    <script src="{{asset('admin/video/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/video/js/jwplayer.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/video/js/jquery.fancybox.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".fancybox").fancybox({
                fitToView: false,
                content: '<span></span>', // create temp content
                scrolling: 'no',
                afterLoad: function () {
                    var $width = $(this.element).data('width'); // get dimensions from data attributes
                    var $height = $(this.element).data('height');
                    this.content = "<embed src='/admin/video/player.swf?file=" + this.href + "&autostart=true&amp;wmode=opaque' type='application/x-shockwave-flash' allowfullscreen='true' width='" + $width + "' height='" + $height + "'></embed>"; // replace temp content
                }
            });
        });
    </script>

@endsection