@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                微课管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    微课投诉编辑页面
                </small>
            </h1>
        </div><!-- /.page-header -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form action="{{url('admin/microlesson/editcomplainsub')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$data->id}}">



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> id </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="id" id="form-field-1" placeholder="id" class="col-xs-10 col-sm-5" value="{{$data->id}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>    



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 投诉用户 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="username" id="form-field-1" placeholder="评论用户" class="col-xs-10 col-sm-5" value="{{$data -> username}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>  




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 被投诉的微课 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="lessonName" id="form-field-1" placeholder="评论用户" class="col-xs-10 col-sm-5" value="{{$data -> lessonName}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>  




                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 投诉内容 </label>

                        <div class="col-sm-9">
                            <textarea name="content" id="form-field-2" class="col-xs-10 col-sm-5" cols="30" rows="10" style="resize:none;">{{$data->content}}</textarea>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 投诉类型 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="type" id="form-field-1" placeholder="评论用户" class="col-xs-10 col-sm-5" value="{{$data->type}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>  

                  
                  


                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
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
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection