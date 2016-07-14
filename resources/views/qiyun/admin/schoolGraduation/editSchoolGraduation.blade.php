@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                学生升级
                <small>
                    <i class="icon-double-angle-right"></i>
                    学生升级
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

                <form action="{{url('admin/graduation/doEditGraduation')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学校名称</label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" />--}}
                            @if(\Auth::user()->level() > 3)
                                <select name="schoolId" id="school" class="col-xs-10 col-sm-5">
                                    <option value="" selected>---学校名称---</option>
                                    @foreach($data->schoolNames as $schoolnames)
                                        <option value="{{$schoolnames->id}}" @if($data->schoolId == $schoolnames->id) selected @endif>{{$schoolnames->schoolName}}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" readonly name="" id="school" class="col-xs-10 col-sm-5"  value="{{$data->schoolName}}"/>
                                <input type="hidden" name="schoolId" id="school" class="col-xs-10 col-sm-5"  value="{{$data->schoolId}}"/>
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle">
{{--                                    {!!isset($errors) ? $errors->first('parentId', '<span style="color:red;">:message</span>') : ""!!}--}}
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 年级名称 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" />--}}
                            @if(\Auth::user()->level() > 2)
                                <select name="gradeId" id="schoolgrade" class="col-xs-10 col-sm-5">
                                    <option value="" selected>---年级名称---</option>
                                    @foreach($data->gradeNames as $gradenames)
                                        <option class="grade" value="{{$gradenames->id}}" @if($data->gradeId == $gradenames->id) selected @endif>{{$gradenames->gradeName}}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" readonly name="" id="schoolgrade" class="col-xs-10 col-sm-5" value="{{$data->gradeName}}" />
                                <input type="hidden" name="gradeId" id="schoolgrade" class="col-xs-10 col-sm-5" value="{{$data->gradeId}}" />
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle">
{{--                                    {!!isset($errors) ? $errors->first('parentId', '<span style="color:red;">:message</span>') : ""!!}--}}
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 班级名称 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" />--}}
                            <select name="classId" id="schoolclass" class="col-xs-10 col-sm-5">
                                <option value="" selected>---班级名称---</option>
                                @foreach($data->classnames as $classNames)
                                    <option class="class" value="{{$classNames->id}}" @if($data->classId == $classNames->id) selected @endif>{{$classNames->classname}}</option>
                                @endforeach
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle">
{{--                                    {!!isset($errors) ? $errors->first('parentId', '<span style="color:red;">:message</span>') : ""!!}--}}
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否离校 </label>

                        <div class="col-sm-9">
                            <select name="isleave" id="form-field-2" class="col-xs-10 col-sm-5">
                                <option value="0" {{$data->isleave ? '' : 'selected'}}>未离校</option>
                                <option value="1" {{$data->isleave ? 'selected' : ''}}>离校</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
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

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('js')
    <script language="javascript" type="text/javascript">
        $('#school').change(function(){
            $('#schoolclass').find('.class').remove();
            var schoolid = $('#school').val();
            $.ajax({
                type:'get',
                data:{'id':schoolid},
                url:'{{url('admin/school/ajaxSchoolGrade')}}',
                success:function(data){
                    var str = '<option value="">---年级名称---</option>';
                    $.each(data,function(i,val){
                        str += '<option value="'+val.id+'">'+val.gradeName+'</option>';
                    })
                    $('#schoolgrade').html(str);

                },
                dataType:'json',
                'async':false
            });
        })
        //点击年级名称时获取此年级下的班级名称
        $('#schoolgrade').change(function(){
            var schoolgradeid = $('#schoolgrade').val();
            $.ajax({
                type:'get',
                data:{'id':schoolgradeid},
                url:'{{url('admin/school/ajaxSchoolClass')}}',
                success:function(data){
                    var str = '<option value="">---班级名称---</option>';
                    $.each(data,function(i,val){
                        str += '<option class="class" value="'+val.id+'">'+val.classname+'</option>';
                    })
                    $('#schoolclass').html(str);

                },
                dataType:'json',
                'async':false
            });
        })

    </script>
@endsection