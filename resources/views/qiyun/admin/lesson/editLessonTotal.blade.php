@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                协同备课共案编辑
                <small>
                    <i class="icon-double-angle-right"></i>
                    编辑协同备课共案
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

                <form action="{{url('admin/lesson/doEditLessonTotal')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="urlPath" value="{{$_SERVER['HTTP_REFERER']}}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> ID </label>

                        <div class="col-sm-9">
                            <input readonly="" type="text" name="id" class="col-xs-10 col-sm-5" id="form-input-readonly" value="{{$data->id}}" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 主题名称 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="name" id="form-field-1" placeholder="主题名称" class="col-xs-10 col-sm-5" value="{{$data->name}}" />--}}
                            <select name="parentId"  id="form-field-1" class="col-xs-10 col-sm-5">
                                @foreach($data->lessonSubjectName as $tename)
                                    <option value="{{$tename->id}}"@if($data->parentId == $tename->id) selected @endif>
                                        {{$tename->lessonSubjectName}}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 共案名称 </label>

                        <div class="col-sm-9">
                            <input type="text" name="lessonName" id="form-field-1" placeholder="共案名称" class="col-xs-10 col-sm-5" value="{{$data->lessonName}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 共案标题 </label>

                        <div class="col-sm-9">
                            <input type="text" name="title" id="form-field-1" placeholder="共案标题" class="col-xs-10 col-sm-5" value="{{$data->title}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 描述 </label>

                        <div class="col-sm-9">
                            <textarea name="descript" id="form-field-1" placeholder="描述" class="col-xs-10 col-sm-5" cols="30" rows="10" style="resize: none;">{{$data->descript}}</textarea>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 共案格式 </label>

                        <div class="col-sm-9">
                            <input type="text" name="type" id="form-field-2" placeholder="共案格式" class="col-xs-10 col-sm-5" value="{{$data->type}}" />
                            {{--<textarea name="type" id="form-field-2" placeholder="共案格式" class="col-xs-10 col-sm-5" cols="30" rows="10" style="resize: none;">{{$data->content}}</textarea>--}}

                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 状态 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" placeholder="教研组状态" class="col-xs-10 col-sm-5" value="" />--}}
                            <select id="form-field-2" class="col-xs-10 col-sm-5" name="status">
                                <option value="0" {{$data->status ? '' : 'selected'}}>可编辑</option>
                                <option value="1" {{$data->status ? 'selected' : ''}}>不可编辑</option>
                            </select>
                        </div>
                    </div>

                    {{--<div class="space-4"></div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> url </label>--}}

                        {{--<div class="col-sm-9">--}}
                            {{--<input type="text" name="resourceUrl" id="form-field-1" placeholder="url" class="col-xs-10 col-sm-5" value="{{$data->resourceUrl}}" id="form-input-readonly" readonly="" />--}}
                            {{--<img src="{{asset($data->url)}}" id="form-field-1" placeholder="url" class="col-xs-10 col-sm-5" alt="">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  </label>

                        <div class="col-sm-9">
                            <input type="hidden" name="organurl" value="{{$data->resourceUrl}}">
                            {{--<img src="{{asset('image/qiyun/resource/up.png')}}" alt="" id="form-field-1">--}}
                            <img src="{{asset('image/qiyun/resource/up.png')}}" alt="" id="form-field-1" style="position:absolute;">
                            {{--<input type="file" name="resourceUrl" id="form-field-1" placeholder="url" class="col-xs-10 col-sm-5" value="" style="width:170px;height:40px;position: absolute;top: 0px;opacity: 0;" />--}}
                            <input type="file" name="url" id="file_upload" multiple="true" value="" />
                            <div class="uploadarea_bar_r_msg"></div>
                            <div id="uploadurl"></div>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 编辑人 </label>

                        <div class="col-sm-9">
                            <input type="text" readonly name="editerName" id="form-field-1" placeholder="编辑人" class="col-xs-10 col-sm-5" value="{{$data->editerName}}" />

                        </div>
                    </div>


                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                Submit
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/upload.css') }}">
    <script>
        //上传文件
        var evaluatPic = '';

        var addMsg = function(){
            $('.uploadarea_bar_r_msg').html('资源上传成功!');
        }

        $('#file_upload').uploadify({
            'swf'      : '/image/qiyun/member/register/uploadify.swf',
            'uploader' : '/admin/theme/doUploadpic',
            'buttonText' : '',
            'width':'160',
            'height':'40',
            'post_params' : {
                '_token' : '{{csrf_token()}}'
            },
            'onUploadSuccess' : function(file, data, response) {
                evaluatPic = '<input type="hidden" name="url" value="'+data+'">';
                $('#uploadurl').html(evaluatPic);
                if(data){
                    setTimeout('addMsg()',4000);
                }
            }
        });
    </script>
@endsection