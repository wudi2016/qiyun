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
            <form action="{{url('admin/resource/expandResourceList')}}" method="get" class="form-search">
                <select name="type" id="form-field-1">
                    <option value="1" @if($data->type == 1) selected @endif>全部</option>
                    <option value="2" @if($data->type == 2) selected @endif>资源Id</option>
                    <option value="3" @if($data->type == 3) selected @endif>资源标题</option>
                    <option value="4" @if($data->type == 4) selected @endif>作者</option>
                    <option value="5" @if($data->type == 5) selected @endif>所属学段</option>
                    <option value="6" @if($data->type == 6) selected @endif>拓展类别</option>
                    {{--<option value="7" @if($data->type == 7) selected @endif>所属版本</option>--}}
                    {{--<option value="8" @if($data->type == 8) selected @endif>所属册别</option>--}}
                    <!-- <option value="9" @if($data->type == 9) selected @endif>教材目录</option> -->

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
                资源管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    拓展资源列表
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">
                                        <label>
                                            <input type="checkbox" class="ace" id="checkall"/>
                                            <span class="lbl"></span>
                                        </label>
                                    </th>
                                    <th>资源id</th>
                                    <th>资源标题</th>
                                    <th>作者</th>

                                    <th>所属学段</th>
                                    <th>所属拓展类别</th>

                                    <!-- <th>教材目录</th> -->

                                    <th>资源状态</th>
                                    <th>审核状态</th>
                                    <th>创建日期</th>

                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="{{url('admin/resource/resourceMultiDel')}}" method="post">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                      @foreach($data as $resources)
                                          <tr>
                                              <td class="center">
                                                  <label>
                                                      <input type="checkbox" name="resIds[]" value="{{$resources->id}}" class="ace" />
                                                      <span class="lbl"></span>
                                                  </label>
                                              </td>

                                              <td><a href="#">{{$resources->id}}</a></td>
                                              <td>{{$resources->resourceTitle}}</td>
                                              <td>{{$resources->resourceAuthor}}</td>

                                              <td>{{$resources->sectionName}}</td>
                                              <td>{{$resources->selName}}</td>

                                              {{-- <td>{{$resources->chapterName}}</td> --}}

                                              <td>
                                                @if ($resources->resourceStatus == 0)
                                                    激活
                                                @elseif ($resources->resourceStatus == 1)
                                                    锁定
                                                @else
                                                    空数据
                                                @endif
                                              </td>
                                              <td>
                                                  @if ($resources->resourceCheck == 0)
                                                      通过
                                                  @elseif ($resources->resourceCheck == 1)
                                                      审核中
                                                  @elseif ($resources->resourceCheck == 2)
                                                      未通过                                                      
                                                  @endif
                                              <td>{{$resources->created_at}}</td>




                                              <td>
                                                  <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                      <!-- 编辑 -->
                                                      <!-- <a href="{{url('admin/resource/chapterEdit/'.$resources->id)}}" class="btn btn-xs btn-info">
                                                          <i class="icon-edit bigger-120"></i>
                                                      </a> -->
                                                      <!-- 查看评论 -->
                                                      <a href="{{url('/resource/resourceDetail/'.$resources->id)}}"><button class="btn btn-minier btn-purple" type="button">预览资源</button></a>

                                                      <button data-toggle="dropdown" class="btn btn-inverse btn-xs dropdown-toggle">
                                                        审查编辑
                                                        <span class="icon-caret-down icon-on-right"></span>
                                                      </button>
                                                      <ul class="dropdown-menu dropdown-inverse">
                                                        <li>
                                                          <a href="{{url('admin/resource/resourceStatus/'.$resources->id.'/0')}}" >通过审查</a>
                                                        </li>
                                                        <li>
                                                          <a href="{{url('admin/resource/resourceStatus/'.$resources->id.'/1')}}" >审查中</a>
                                                        </li>
                                                        <li>
                                                          <a href="{{url('admin/resource/resourceStatus/'.$resources->id.'/2')}}">未通过</a>
                                                        </li>
                                                      </ul>
                                                      <a href="{{url('admin/resource/resourceComment/'.$resources->id)}}" title="查看评论" class="btn btn-xs btn-info">
                                                          <span class="label label-sm label-success">查看评论</span>
                                                      </a>                                                      
                                                      <!-- 删除 -->
                                                      <a href="{{url('admin/resource/resourceDel/'.$resources->id)}}" title="删除" class="btn btn-xs btn-danger" onclick="return confirm('删除后将无法找回,确定要删除吗?');">
                                                          <i class="icon-trash bigger-120"></i>
                                                      </a>
                                                  </div>
                                              </td>
                                          </tr>
                                      @endforeach

                                      @if($data)
                                          {{--<button type="submit" title="多文件删除" class="btn btn-xs btn-danger" onclick="return confirm('删除后将无法找回,确定要删除吗?');" style="position:relative;top:-5px;left:13px;">--}}
                                              {{--<i class="icon-trash bigger-120"></i>--}}
                                          {{--</button>--}}
                                          <button class="btn btn-minier btn-red"  style="position:relative;top:-5px;left:0px;" onclick="return confirm('删除后将无法找回,确定要删除吗?');">多文件删除</button>
                                      @endif
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
  <script type="text/javascript">
      var status = {!! session('status') !!};
      if(status == 1){
        alert('成功删除');
      }else if(status ==0){
        alert('删除失败');
      }
  </script>

  <script>
     $('#checkall').click(function(){
         var checkboxs = $("input[type='checkbox']")
         for(var i=0;i<checkboxs.length;i++){
                 checkboxs[i].checked=!checkboxs[i].checked;
         }
     })
  </script>

@endsection