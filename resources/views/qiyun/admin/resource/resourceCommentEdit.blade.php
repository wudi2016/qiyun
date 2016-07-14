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
            <form class="form-search">
                                <span class="input-icon">
                                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                                    <i class="icon-search nav-search-icon"></i>
                                </span>
            </form>
        </div><!-- #nav-search -->
    </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="page-content">
        <div class="page-header">
            <h1>
                资源列表
                <small>
                    <i class="icon-double-angle-right"></i>
                    编辑评论
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form method="post" action="{{url('admin/resource/resourceCommentDoEdit')}}" class="form-horizontal" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <input type="hidden" name="resId" value="{{$resId}}">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">评论内容</label>

                        <div class="col-sm-9">
                            <!-- <input type="text" name ='sectionName' id="form-field-1" placeholder="sectionName" value="{{$data -> commentContent}}" class="col-xs-10 col-sm-5" /> -->
                            <textarea name="commentContent" id="" cols="30"  class=" col-sm-5" >{{$data -> commentContent}}</textarea>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info">
                                <i class="icon-ok bigger-110"></i>
                                提交
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>

                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection

@section('js')
  <script type="text/javascript">
      var status = {!! session('status') !!};
      if(status){
        alert('修改成功');
        window.location.href = '/admin/resource/resourceComment/'+status;
      }else if(status ==0){
        alert('修改失败');
      }
  </script>
@endsection

