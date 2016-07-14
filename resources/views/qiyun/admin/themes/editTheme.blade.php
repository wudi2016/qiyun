@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                教研主题编辑
                <small>
                    <i class="icon-double-angle-right"></i>
                    编辑教研主题
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

                <form action="{{url('admin/theme/doThemeEdit')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                            <input type="text" name="name" id="form-field-1" placeholder="主题名称" class="col-xs-10 col-sm-5" value="{{$data->name}}" />

                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 主题导读 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="describe" id="form-field-1" placeholder="主题导读" class="col-xs-10 col-sm-5" value="{{$data->describe}}" />--}}
                            <textarea name="describe" id="form-field-1" class="col-xs-10 col-sm-5" cols="30" rows="10" style="resize: none">{{$data->describe}}</textarea>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 主要图片 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="pic" id="form-field-2" placeholder="主要图片" class="col-xs-10 col-sm-5" value="{{$data->pic}}" />--}}
                            <img src="{{asset($data->pic)}}" alt="" id="uploadPreview" class="col-xs-10 col-sm-5">
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2">  </label>

                        <div class="col-sm-9">
                            <input type="file" name="pic" id="uploadImage" onchange="loadImageFile();" placeholder="图片url" style="width:170px;height:40px;position: absolute;top: 0px;opacity: 0;" />
                            <div class="second_file"><img src="/image/qiyun/research/addSubject/1.png"/></div>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 参与人数 </label>

                        <div class="col-sm-9">
                            <input type="text" name="peoplenum" id="form-field-1" placeholder="参与人数" class="col-xs-10 col-sm-5" value="{{$data->peoplenum}}" />

                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 创建人 </label>

                        <div class="col-sm-9">
                            <input type="text" name="" disabled id="form-field-1" placeholder="创建人" class="col-xs-10 col-sm-5" value="{{$data->realname}}" />
                            <input type="hidden" name="userId" id="form-field-1" placeholder="创建人" class="col-xs-10 col-sm-5" value="{{$data->userId}}" />

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