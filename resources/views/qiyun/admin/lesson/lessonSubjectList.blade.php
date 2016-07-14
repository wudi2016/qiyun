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
            <form action="{{url('admin/lesson/lessonSubjectList')}}" method="get" class="form-search">
                <select name="type" id="form-field-1">
                    <option value="1" @if($data->type == 1) selected @endif>ID</option>
                    <option value="2" @if($data->type == 2) selected @endif>备课主题名称</option>
                    <option value="3" @if($data->type == 3) selected @endif>备课人用户名</option>
                    <option value="4" @if($data->type == 4) selected @endif>全部</option>
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
                协同备课管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    协同备课表
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
                                    <th>pic</th>
                                    <th class="hidden-480">名称</th>
                                    <th>开始时间</th>
                                    <th class="hidden-480">结束时间</th>
                                    <th class="hidden-480">备课人</th>
                                    <th class="hidden-480">目标名称</th>
                                    <th class="hidden-480">学段</th>
                                    <th class="hidden-480">科目</th>
                                    <th class="hidden-480">版本</th>
                                    <th class="hidden-480">年级</th>
                                    <th class="hidden-480">章节</th>
                                    {{--<th class="hidden-480">浏览次数</th>--}}
                                    {{--<th class="hidden-480">点赞次数</th>--}}
                                    {{--<th class="hidden-480">备课主题计划ID</th>--}}
                                    <th class="hidden-480">所属教研组</th>
                                    <th class="hidden-480">状态</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach($data as $lesson)
                                          <tr>
                                              {{--<td class="center">--}}
                                                  {{--<label>--}}
                                                      {{--<input type="checkbox" class="ace" />--}}
                                                      {{--<span class="lbl"></span>--}}
                                                  {{--</label>--}}
                                              {{--</td>--}}

                                              <td>
                                                  <a href="#">{{$lesson->id}}</a>
                                              </td>
                                              <td><img src="{{asset($lesson->pic)}}" width="50px" height="50px"></td>
                                              <td>{{$lesson->lessonSubjectName}}</td>
                                              <td class="hidden-480">{{$lesson->beginTime}}</td>
                                              <td>{{$lesson->endTime}}</td>
                                              <td>{{$lesson->lessonSubjecAuthor}}</td>
                                              <td>{{$lesson->lessonSubjectTarget}}</td>
                                              <td>{{$lesson->sectionName}}</td>
                                              <td>{{$lesson->subjectName}}</td>
                                              <td>{{$lesson->editionName}}</td>
                                              <td>{{$lesson->gradeName}}</td>
                                              <td>{{$lesson->chapterName}}</td>
                                              {{--<td>{{$lesson->lessonView}}</td>--}}
                                              {{--<td>{{$lesson->lessonFav}}</td>--}}
                                              {{--<td>{{$lesson->lessonPlanId}}</td>--}}
                                              <td>{{$lesson->techResearchName}}</td>
                                              <td>{{$lesson->status ? '锁定':'正常'}}</td>
                                              <td>{{$lesson->created_at}}</td>
                                              <td>{{$lesson->updated_at}}</td>


                                              <td>
                                                  <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                      {{--<button class="btn btn-xs btn-success">--}}
                                                          {{--<i class="icon-ok bigger-120"></i>--}}
                                                      {{--</button>--}}

                                                      {{--@permission('lesson.edit')--}}
                                                      <a href="{{url('admin/lesson/lessonSubjectEdit/'.$lesson->id)}}" class="btn btn-xs btn-info">
                                                          <i class="icon-edit bigger-120"></i>
                                                      </a>
                                                      {{--@endpermission--}}

                                                      {{--@permission('lesson.del')--}}
                                                      <a href="{{url('admin/lesson/delLessonSubject/'.$lesson->id)}}" class="btn btn-xs btn-danger" onclick="return confirm('删除后会将此备课下的数据也一并删除,确定还要删除吗?');">
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