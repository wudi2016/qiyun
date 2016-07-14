@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                添加任课老师信息管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加任课老师信息
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
            <div class="col-xs-12"  style="width:100%;float: left">
                <!-- PAGE CONTENT BEGINS -->
                <form action="{{url('admin/school/doAddSchoolTeacher')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div style="width: 50%;float: left;">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group" style="">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> </label>

                            <div class="col-sm-9">
                                @if(\Auth::user()->level() > 6)
                                    <select name="" id="organize" class="col-xs-10 col-sm-3">
                                        <option value="">--所在省--</option>
                                        @foreach($data as $organizenames)
                                            <option value="{{$organizenames->id}}">{{$organizenames->organize_name}}</option>
                                        @endforeach
                                    </select>
                                @endif
                                @if(\Auth::user()->level() > 6)
                                    <select name="" id="cityname" class="col-xs-10 col-sm-3">
                                        <option value="">--所在市--</option>
                                    </select>
                                @elseif(\Auth::user()->level() == 6)
                                    <select name="" id="cityname" class="col-xs-10 col-sm-6">
                                        <option value="">--所在市--</option>
                                        @foreach($data as $citys)
                                            <option value="{{$citys->id}}">{{$citys->city_name}}</option>
                                        @endforeach
                                    </select>
                                @endif

                                @if(\Auth::user()->level() > 5)
                                    <select name="" id="countyname" class="col-xs-10 col-sm-4">
                                        <option value="">--所在区县--</option>

                                    </select>
                                @elseif(\Auth::user()->level() == 5)
                                    <select name="" id="countyname" class="col-xs-10 col-sm-10">
                                        <option value="">--所在区县--</option>
                                        @foreach($data as $countys)
                                            <option value="{{$countys->id}}">{{$countys->county_name}}</option>
                                        @endforeach
                                    </select>
                                @endif


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学校名称</label>

                            <div class="col-sm-9">
                                {{--<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" />--}}
                                @if(\Auth::user()->level() > 4)
                                    <select name="school" id="school" class="col-xs-10 col-sm-10">
                                        <option value="" selected>--学校--</option>
                                        {{--@foreach($data as $school)--}}
                                        {{--<option value="{{$school->id}}">{{$school->schoolName}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                @elseif(\Auth::user()->level() == 4)
                                    <select name="school" id="school" class="col-xs-10 col-sm-10">
                                        <option value="" selected>--学校--</option>
                                        @foreach($data as $school)
                                            <option value="{{$school->id}}">{{$school->schoolName}}</option>
                                        @endforeach
                                    </select>
                                @endif
                                @if(\Auth::user()->level() == 3)
                                    <input type="text" readonly name="" id="school" class="col-xs-10 col-sm-10" value="{{$data->schoolName}}" />
                                    <input type="hidden" name="school" id="school" class="col-xs-10 col-sm-10" value="{{$data->id}}" />
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
                                @if(\Auth::user()->level() > 3)
                                    <select name="gradeid" id="schoolgrade" class="col-xs-10 col-sm-10">
                                        <option value="" selected>---年级名称---</option>
                                    </select>
                                @endif
                                @if(\Auth::user()->level() <= 3)
                                    <select name="gradeid" id="schoolgrade" class="col-xs-10 col-sm-10">
                                        <option value="" selected>---年级名称---</option>
                                        @foreach($data->shoolGrade as $shoolGrades)
                                            <option value="{{$shoolGrades->id}}">{{$shoolGrades->gradeName}}</option>
                                        @endforeach
                                    </select>
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
                                <select name="classid" id="schoolclass" class="col-xs-10 col-sm-10">
                                    <option value="" selected>---班级名称---</option>
                                </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle">
{{--                                    {!!isset($errors) ? $errors->first('parentId', '<span style="color:red;">:message</span>') : ""!!}--}}
                                </span>
                            </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学科名称 </label>

                            <div class="col-sm-9">
                                {{--<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" />--}}
                                <select name="subjectid" id="schoolsubject" class="col-xs-10 col-sm-10">
                                    <option value="" selected>---学科名称---</option>
                                </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle">
{{--                                    {!!isset($errors) ? $errors->first('parentId', '<span style="color:red;">:message</span>') : ""!!}--}}
                                </span>
                            </span>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 任课老师 </label>--}}
                            {{--<div class="col-sm-9" id="teachers">--}}
                                {{--@foreach($names as $name)--}}
                                {{--<label class="col-xs-10 col-sm-5" style="width: 150px;" >--}}
                                {{--<input type="checkbox"  name="uid[]" value="{{$name->id}}" />{{$name->realname}}--}}
                                {{--</label>--}}
                                {{--@endforeach--}}

                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 状态 </label>

                            <div class="col-sm-9">
                                <select name="status" id="form-field-2" class="col-xs-10 col-sm-10">
                                    <option value="0">锁定</option>
                                    <option value="1" selected>激活</option>
                                </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                            </div>
                        </div>


                        <div class="clearfix form-actions" style="background: #ffffff;border: 0px;">
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



                    </div>

                    <div style="width: 500px;height:300px;float: left;">
                        <div class="top1" style="height: 20px;width: 400px;font-weight: bold;background: #fff;">任课老师</div>
                        <div class="top2" style="width: 500px;height: 280px;border: 1px solid #D5D5D5;overflow: auto">
                            <div class="form-group">
                                {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 任课老师 </label>--}}
                                <div class="col-sm-9" id="teachers">
                                    {{--@foreach($names as $name)--}}
                                        {{--<label class="col-xs-10 col-sm-5" style="width: 150px;" >--}}
                                            {{--<input type="checkbox"  name="uid[]" value="{{$name->id}}" />{{$name->realname}}--}}
                                        {{--</label>--}}
                                    {{--@endforeach--}}

                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('js')
    <script language="javascript" type="text/javascript" src="{{asset('admin/ajax/procince_city_cou_school.js') }}"></script>
    <script language="javascript" type="text/javascript">
        $('#school').change(function(){
            $('#schoolclass').find('.class').remove();
            $('#schoolsubject').find('.sub').remove();
            var schoolid = $('#school').val();
            $.ajax({
                type:'get',
                data:{'id':schoolid},
                url:'{{url('admin/school/ajaxSchoolGrade')}}',
                success:function(data){
                    var str = '<option value="">---年级名称---</option>';
                    $.each(data,function(i,val){
                        str += '<option class="grade" value="'+val.id+'">'+val.gradeName+'</option>';
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

        //点击年级名称时获取此年级下的学科名称
        $('#schoolgrade').change(function(){
            var schoolgradeid = $('#schoolgrade').val();
            $.ajax({
                type:'get',
                data:{'id':schoolgradeid},
                url:'{{url('admin/school/ajaxSchoolSubject')}}',
                success:function(data){
                    var str = '<option value="">---学科名称---</option>';
                    $.each(data,function(i,val){
                        str += '<option class="sub" value="'+val.id+'">'+val.subjectName+'</option>';
                    })
                    $('#schoolsubject').html(str);

                },
                dataType:'json',
                'async':false
            });
        })

        //点击学科名称时获取此年级学科下的任课老师名称
        $('#schoolsubject').change(function(){
            var schoolgradeid = $('#schoolgrade').val();
            var schoolsubjectid = $('#schoolsubject').val();
            $.ajax({
                type:'get',
                data:{'schoolgradeid':schoolgradeid,'schoolsubjectid':schoolsubjectid},
                url:'{{url('admin/school/ajaxTeachers')}}',
                success:function(data){
                    var str = '';
                    $.each(data,function(i,val){
                        str += '<label class="col-xs-10 col-sm-5" style="width: 150px;" ><input type="checkbox" name="uid[]" value="'+val.userId+'" />'+val.realname+'</label>';
                    })
                    $('#teachers').html(str);

                },
                dataType:'json',
                'async':false
            });
        })

    </script>
@endsection