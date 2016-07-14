@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                教师协作组编辑
                <small>
                    <i class="icon-double-angle-right"></i>
                    编辑教师协作组
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

                <form action="{{url('admin/teacher/doTeacherEdit')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <input type="hidden" name="pic" value="{{$data->pic}}">
                    <input type="hidden" name="original_pic" value="{{$data->pic}}">
                    <input type="hidden" name="url" value="{{$_SERVER['HTTP_REFERER']}}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 教研组名称 </label>

                        <div class="col-sm-9">
                            <input type="text" name="techResearchName" id="form-field-1" placeholder="教研组名称" class="col-xs-10 col-sm-5" value="{{$data->techResearchName}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否公开 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-2" placeholder="是否公开" class="col-xs-10 col-sm-5" value="{{$data->isOpen}}" />--}}
                            <select id="form-field-2" class="col-xs-10 col-sm-5" name="isOpen">
                                <option value="0" {{$data->isOpen ? '' : 'selected'}}>否</option>
                                <option value="1" {{$data->isOpen ? 'selected' : ''}}>公开</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> 是否加入 </label>

                        <div class="col-sm-9">
                            {{--<input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="This text field is readonly!" />--}}
                            <select id="form-field-2" class="col-xs-10 col-sm-5" name="isJoin">
                                <option value="0" {{$data->isJoin ? '' : 'selected'}}>否</option>
                                <option value="1" {{$data->isJoin ? 'selected' : ''}}>是</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    {{--<input class="ace" type="checkbox" id="id-disable-check" />--}}
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 协作组简介 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" placeholder="协作组简介" class="col-xs-10 col-sm-5" value="" />--}}
                            <textarea name="description" id="form-field-1" class="col-xs-10 col-sm-5" cols="30" rows="5" style="resize: none;">{{$data->description}}</textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 教研组封面 </label>

                        <div class="col-sm-9">
                            <img src="{{asset($data->pic)}}" id="uploadPreview" class="col-xs-10 col-sm-5"/>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  </label>

                        <div class="col-sm-9">
                            <input type="file" id="uploadImage" name="pic" onchange="loadImageFile();" style="width:170px;height:40px;position: absolute;top: 0px;opacity: 0;"/>
                            <div class="second_file"><img src="/image/qiyun/research/addSubject/1.png"/></div>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 教研组状态 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" placeholder="教研组状态" class="col-xs-10 col-sm-5" value="" />--}}
                            <select id="form-field-2" class="col-xs-10 col-sm-5" name="status">
                                <option value="0" {{$data->status ? '' : 'selected'}}>正常</option>
                                <option value="1" {{$data->status ? 'selected' : ''}}>锁定</option>
                            </select>
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
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/research/addSubject.js') }}"></script>
@endsection