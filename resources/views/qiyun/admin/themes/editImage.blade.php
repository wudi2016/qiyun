@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                教研主题图片编辑
                <small>
                    <i class="icon-double-angle-right"></i>
                    编辑教研主题图片
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

                <form action="{{url('admin/theme/doImageEdit')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                            <select name="themeId"  id="form-field-1" class="col-xs-10 col-sm-5">
                                @foreach($data->themenames as $tename)
                                    <option value="{{$tename->id}}"@if($data->themeId == $tename->id) selected @endif>
                                        {{$tename->name}}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 图片 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="imgurl" id="form-field-1" placeholder="图片url" class="col-xs-10 col-sm-5" value="{{$data->imgurl}}" />--}}
                            <img src="{{asset($data->imgurl)}}" id="uploadPreview" placeholder="图片url" class="col-xs-10 col-sm-5" alt="">
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  </label>

                        <div class="col-sm-9">
                            <input type="file" name="imgurl" id="uploadImage" onchange="loadImageFile();" placeholder="图片url" style="width:170px;height:40px;position: absolute;top: 0px;opacity: 0;" />
                            <div class="second_file"><img src="/image/qiyun/research/addSubject/1.png"/></div>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户ID </label>

                        <div class="col-sm-9">
                            <input type="text" disabled name="" id="form-field-1" placeholder="用户ID" class="col-xs-10 col-sm-5" value="{{$data->realname}}" />
                            <input type="hidden" name="userId" id="form-field-1" placeholder="用户ID" class="col-xs-10 col-sm-5" value="{{$data->userId}}" />

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
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/research/addSubject.js') }}"></script>
@endsection