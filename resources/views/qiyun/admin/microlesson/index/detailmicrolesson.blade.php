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

                <form action="{{url('admin/microlesson/editmicrosub')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$data->id}}">
                    



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> id </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="id" id="form-field-1" placeholder="id" class="col-xs-10 col-sm-5" value="{{$data->id}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课名称 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="微课名称" id="form-field-1" placeholder="微课名称" class="col-xs-10 col-sm-5" value="{{$data->lessonName}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名称 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="user_id" id="form-field-1" placeholder="用户名称" class="col-xs-10 col-sm-5" value="{{$data->username}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课标题 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="lessonTitle" id="form-field-1" placeholder="微课标题" class="col-xs-10 col-sm-5" value="{{$data->lessonTitle}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>
                  

{{--
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课内容简介 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="lessonDes" id="form-field-1" placeholder="微课内容简介" class="col-xs-10 col-sm-5" value="{{$data->lessonDes}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>
--}}


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课简介 </label>

                        <div class="col-sm-9">
                            <textarea name="lessonDes" id="form-field-2" class="col-xs-10 col-sm-5" cols="30" rows="10" style="resize:none;">{{$data->lessonDes}}</textarea>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>





                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学段 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="lessonDes" id="form-field-1" placeholder="学段" class="col-xs-10 col-sm-5" value="{{$data->sectionName}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 年级 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="lessonDes" id="form-field-1" placeholder="年级" class="col-xs-10 col-sm-5" value="{{$data->gradeName}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学科 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="lessonDes" id="form-field-1" placeholder="学科" class="col-xs-10 col-sm-5" value="{{$data->subjectName}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 视频路径 </label>

                        <div class="col-sm-9">
{{--
                            <input  disabled="true" type="text" name="lessonDes" id="form-field-1" placeholder="学科" class="col-xs-10 col-sm-5" value="{{$data->path}}" />
--}}
                        <a href="{{url('microLesson/microLessonDetail/'.$data->id)}}">点击查看视频</a>
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 点击数 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="lessonDes" id="form-field-1" placeholder="学科" class="col-xs-10 col-sm-5" value="{{$data->viewNum}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 点赞数 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="lessonDes" id="form-field-1" placeholder="点赞数" class="col-xs-10 col-sm-5" value="{{$data->likeNum}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>
                

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户头像 </label>

                        <div class="col-sm-9">
                        
                            <img src="{{asset($data->logo)}}" alt="" width="80" height="60" >
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




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  添加时间 </label>

                        <div class="col-sm-9">
                            <input  disabled="true" type="text" name="user_id" id="form-field-1" placeholder=" 添加时间" class="col-xs-10 col-sm-5" value="   <?php echo date('Y-m-d H:i:s' , ($data->addTime)/1000 );  ?>  " />
                        </div>
                    </div>

                    <div class="space-4"></div>



                   
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>
                            

                   <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            



                            <div class="btn" >
                                <a href="../microlessonList"><i class="icon-undo bigger-110"></i>
                                返回</a>
                            </div>
                        </div>
                    </div>


            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection