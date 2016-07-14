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
            <form action="{{url('admin/resource/chapterList')}}" method="get" class="form-search">
                <select name="type" id="form-field-1">
                    <option value="1" @if($data->type == 1) selected @endif>全部</option>
                    <option value="2" @if($data->type == 2) selected @endif>教材目录Id</option>
                    <option value="3" @if($data->type == 3) selected @endif>所属学段</option>
                    <option value="4" @if($data->type == 4) selected @endif>所属学科</option>
                    <option value="5" @if($data->type == 5) selected @endif>所属版本</option>
                    <option value="6" @if($data->type == 6) selected @endif>所属册别</option>
                    <option value="7" @if($data->type == 7) selected @endif>教材目录</option>
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
                资源分类
                <small>
                    <i class="icon-double-angle-right"></i>
                    教材目录列表
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
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>
                                        </label>
                                    </th>
                                    <th>版本id</th>
                                    <th>所属学段</th>
                                    <th>所属学科</th>
                                    <th>所属版本</th>
                                    <th>所属册别</th>
                                    <th>教材目录</th>

                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach($data as $chaptes)
                                          <tr>
                                              <td class="center">
                                                  <label>
                                                      <input type="checkbox" class="ace" />
                                                      <span class="lbl"></span>
                                                  </label>
                                              </td>

                                              <td>
                                                  <a href="#">{{$chaptes->id}}</a>
                                              </td>
                                              <td>{{$chaptes->sectionName}}</td>
                                              <td>{{$chaptes->subjectName}}</td>
                                              <td>{{$chaptes->editionName}}</td>
                                              <td>{{$chaptes->gradeName}}</td>
                                              <td>{{$chaptes->chapterName}}</td>


                                              <td>
                                                  <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                      <!-- 编辑 -->
                                                      <a href="{{url('admin/resource/chapterEdit/'.$chaptes->id)}}" class="btn btn-xs btn-info">
                                                          <i class="icon-edit bigger-120"></i>
                                                      </a>
                                                      <!-- 删除 -->
                                                      <a href="{{url('admin/resource/chapterDel/'.$chaptes->id)}}" class="btn btn-xs btn-danger" onclick="return confirm('删除后将无法找回,确定要删除吗?');">
                                                          <i class="icon-trash bigger-120"></i>
                                                      </a>
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
  <script type="text/javascript">
      var status = {!! session('status') !!};
      if(status == 1){
        alert('成功删除');
      }else if(status ==0){
        alert('删除失败');
      }else if(status ==2){
        alert('该目录下有子目录或资源，无法删除！');
      }
  </script>
@endsection