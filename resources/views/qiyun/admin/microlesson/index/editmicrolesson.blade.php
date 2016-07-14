@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                微课管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    微课编辑页面
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

                <form action="{{url('admin/microlesson/editmicrolessonsub')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <input type="hidden" name="logo" value="{{$data->logo}}">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课id </label>

                        <div class="col-sm-9">
                            <input disabled="true" type="text" name="id" id="form-field-1" placeholder="微课id" class="col-xs-10 col-sm-5" value="{{$data->id}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户id </label>

                        <div class="col-sm-9">
                            <input disabled="true" type="text" name="user_id" id="form-field-1" placeholder="用户id" class="col-xs-10 col-sm-5" value="{{$data->user_id}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课名称 </label>

                        <div class="col-sm-9">
                            <input  type="text" name="lessonName" id="form-field-1" placeholder="微课名称" class="col-xs-10 col-sm-5" value="{{$data->lessonName}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课主题 </label>

                        <div class="col-sm-9">
                            <input type="text" name="lessonTitle" id="form-field-1" placeholder="微课主题" class="col-xs-10 col-sm-5" value="{{$data->lessonTitle}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



{{--
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课简介 </label>

                        <div class="col-sm-9">
                            <input type="text" name="lessonDes" id="form-field-1" placeholder="微课简介" class="col-xs-10 col-sm-5" value="{{$data->lessonDes}}" />
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课logo </label>

                        <div class="col-sm-9">
                            <img src="{{asset($data->logo)}}" alt="" style="width:150px">
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  </label>

                        <div class="col-sm-9">
                            <input type="file" name="logo" id="form-field-1" placeholder="微课logo" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 发布作者 </label>

                        <div class="col-sm-9">
                            <input type="text" name="author" id="form-field-1" placeholder="发布作者" class="col-xs-10 col-sm-5" value="{{$data->author}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课点击数 </label>

                        <div class="col-sm-9">
                            <input type="text" name="viewNum" id="form-field-1" placeholder="微课点击数" class="col-xs-10 col-sm-5" value="{{$data->viewNum}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课点赞数 </label>

                        <div class="col-sm-9">
                            <input type="text" name="likeNum" id="form-field-1" placeholder="微课点赞数" class="col-xs-10 col-sm-5" value="{{$data->likeNum}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>


{{--
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 视频路径 </label>

                        <div class="col-sm-9">
                            <input type="text" name="path" id="form-field-1" placeholder="视频路径" class="col-xs-10 col-sm-5" value="{{$data->path}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>
--}}



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课状态 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" placeholder="微课状态" class="col-xs-10 col-sm-5" value="" />--}}
                            <select id="form-field-2" class="col-xs-10 col-sm-5" name="status">
                                <option value="0" {{$data->status ? '' : 'selected'}}>发布</option>
                                <option value="1" {{$data->status ? 'selected' : ''}}>未通过审核</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-4"></div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微课类型 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" placeholder="微课类型" class="col-xs-10 col-sm-5" value="" />--}}
                            <select id="form-field-2" class="col-xs-10 col-sm-5" name="type">
                                <option value="0" {{$data->type ? '' : 'selected'}}>录制音频加图片</option>
                                <option value="1" {{$data->type ? 'selected' : ''}}>拍摄</option>
                            </select>
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