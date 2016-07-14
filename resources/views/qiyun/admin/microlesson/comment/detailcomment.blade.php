@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                微课管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    详情页面
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

                <form action="{{url('admin/microlesson/editcommentsub')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$data->id}}">
                


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> id </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="id" id="form-field-1" placeholder="评论内容" class="col-xs-10 col-sm-5" value="{{$data->id}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 评论用户 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="评论用户" id="form-field-1" placeholder="评论用户" class="col-xs-10 col-sm-5" value="{{$data->username}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



{{--
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 评论内容 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="content" id="form-field-1" placeholder="评论内容" class="col-xs-10 col-sm-5" value="{{$data->content}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>
--}}


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 评论内容 </label>

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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 评论的微课 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="lessonName" id="form-field-1" placeholder="评论内容" class="col-xs-10 col-sm-5" value="{{$data->lessonName}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>
                  


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 添加时间 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="status" id="form-field-1" placeholder="添加时间" class="col-xs-10 col-sm-5" value="<?php echo date('Y-m-d H:i:s', $data->addTime/1000); ?>" />
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户头像 </label>

                        <div class="col-sm-9">
                           <!--  <input  disabled="true" type="text" name="status" id="form-field-1" placeholder="添加时间" class="col-xs-10 col-sm-5" value="{{$data->picture}}" /> -->
                            <img src="{{asset($data->picture)}}" alt="" width="80" height="60" >
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 评论状态 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="status" id="form-field-1" placeholder="评论状态" class="col-xs-10 col-sm-5" value="{{$data->status ? '未审核':'发布'}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                   
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>
                            

                   <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            



                            <div class="btn" >
                                <a href="../microlessonCommentList"><i class="icon-undo bigger-110"></i>
                                返回</a>
                            </div>
                        </div>
                    </div>


            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection