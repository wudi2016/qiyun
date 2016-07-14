@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                评课课件编辑
                <small>
                    <i class="icon-double-angle-right"></i>
                    编辑评课课件
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

                <form action="{{url('admin/evaluation/doEditEvaluatCourseware')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 评课名称 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="parentId" id="form-field-1" placeholder="评课名称" class="col-xs-10 col-sm-5" value="{{$data->evaluatTypeName}}" />--}}
                            <select name="parentId"  id="form-field-1" class="col-xs-10 col-sm-5">
                                @foreach($data->evaluatNames as $tename)
                                    <option value="{{$tename->id}}"@if($data->parentId == $tename->id) selected @endif>
                                        {{$tename->evaluatName}}
                                    </option>
                                @endforeach
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 课件名称 </label>

                        <div class="col-sm-9">
                            <input type="text" name="evaluatCourseName" id="form-field-1" placeholder="课件名称" class="col-xs-10 col-sm-5" value="{{$data->evaluatCourseName}}" />
                        </div>
                    </div>

                    {{--<div class="space-4"></div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 课件路径 </label>--}}

                        {{--<div class="col-sm-9">--}}
                            {{--<input type="text" name="evaluatPath" id="form-field-1" placeholder="课件路径" class="col-xs-10 col-sm-5" value="{{$data->evaluatPath}}" />--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 上传课件 </label>

                        <div class="col-sm-9">
                            <input type="file" name="evaluatPath" id="form-field-1" placeholder="课件路径" class="col-xs-10 col-sm-5" value="" />
                        </div>
                    </div>

                    {{--<div class="space-4"></div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 课件格式 </label>--}}

                        {{--<div class="col-sm-9">--}}
                            {{--<input type="text" name="evaluatFomat" id="form-field-1" placeholder="课件格式" class="col-xs-10 col-sm-5" value="{{$data->evaluatFomat}}" />--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="space-4"></div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 课件大小 </label>--}}

                        {{--<div class="col-sm-9">--}}
                            {{--<input type="text" name="evaluatSize" id="form-field-1" placeholder="课件大小" class="col-xs-10 col-sm-5" value="{{$data->evaluatSize}}" />--}}
                        {{--</div>--}}
                    {{--</div>--}}

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
    <!-- 配置文件 -->
    <script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>

    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
@endsection