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
            <form action="{{url('admin/news/newsList')}}" method="get" class="form-search">
                <select name="type" id="form-field-1">
                    <option value="1" @if($data->type == 1) selected @endif>ID</option>
                    <option value="2" @if($data->type == 2) selected @endif>新闻标题</option>
                    <option value="3" @if($data->type == 3) selected @endif>作者</option>
                    <option value="4" @if($data->type == 4) selected @endif>新闻分类</option>
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
                新闻资讯管理
                <small>
                    <i class="icon-double-angle-right"></i>
                   资讯列表
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

        {{--@permission('news.add')--}}
        <a href="{{url('admin/news/addNews')}}" class="btn btn-xs btn-info">
            <i class="icon-ok bigger-110">添加</i>
        </a>
        {{--@endpermission--}}

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
                                    <th>新闻标题</th>
                                    {{--<th class="hidden-480">新闻描述</th>--}}
                                    <th>新闻来源</th>
                                    <th class="hidden-480">作者</th>
                                    <th class="hidden-480">新闻封面图</th>
                                    <th class="hidden-480">新闻分类</th>
                                    {{--<th class="hidden-480">新闻内容</th>--}}
                                    <th class="hidden-480">点击数</th>
                                    <th class="hidden-480">粉丝数</th>
                                    <th class="hidden-480">新闻状态</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach($data as $news)
                                          <tr>
                                              {{--<td class="center">--}}
                                                  {{--<label>--}}
                                                      {{--<input type="checkbox" class="ace" />--}}
                                                      {{--<span class="lbl"></span>--}}
                                                  {{--</label>--}}
                                              {{--</td>--}}

                                              <td>
                                                  <a href="#">{{$news->id}}</a>
                                              </td>
                                              <td>{{$news->title}}</td>
                                              {{--<td>{{$news->description}}</td>--}}
                                              <td class="hidden-480">{{$news->source}}</td>
                                              <td>{{$news->author}}</td>
                                              <td><img src="{{asset($news->pic)}}" alt="" width="50px" height="50px"></td>
                                              <td>{{$news->typeName}}</td>
                                              {{--<td>{{$news->content}}</td>--}}
                                              <td>{{$news->clickNum}}</td>
                                              <td>{{$news->favNum}}</td>
                                              <td>{{$news->status ? '锁定' : '正常'}}</td>
                                              <td>{{$news->created_at}}</td>
                                              <td>{{$news->updated_at}}</td>


                                              <td>
                                                  <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                      <a href="{{url('admin/news/newsDetail/'.$news->id)}}" class="btn btn-xs btn-success">
                                                          <i class="icon-ok bigger-120">详情</i>
                                                      </a>

                                                      {{--@permission('news.edit')--}}
                                                      <a href="{{url('admin/news/newsEdit/'.$news->id)}}" class="btn btn-xs btn-info">
                                                          <i class="icon-edit bigger-120"> </i>
                                                      </a>
                                                      {{--@endpermission--}}

                                                      {{--@permission('news.del')--}}
                                                      <a href="{{url('admin/news/delNews/'.$news->id)}}" class="btn btn-xs btn-danger" onclick="return confirm('删除后将无法找回,确定要删除吗?');">
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