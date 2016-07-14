@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                添加班级信息管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加班级信息
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

                <form action="{{url('admin/school/doAddSchoolClass')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 6)
                                <select name="" id="organize" class="col-xs-10 col-sm-2">
                                    <option value="">--所在省--</option>
                                    @foreach($data as $organizenames)
                                        <option value="{{$organizenames->id}}">{{$organizenames->organize_name}}</option>
                                    @endforeach
                                </select>
                            @endif
                            @if(\Auth::user()->level() > 6)
                                <select name="" id="cityname" class="col-xs-10 col-sm-2">
                                    <option value="">--所在市--</option>
                                </select>
                            @elseif(\Auth::user()->level() == 6)
                                <select name="" id="cityname" class="col-xs-10 col-sm-2">
                                    <option value="">--所在市--</option>
                                    @foreach($data as $citys)
                                        <option value="{{$citys->id}}">{{$citys->city_name}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if(\Auth::user()->level() > 5)
                                <select name="" id="countyname" class="col-xs-10 col-sm-2">
                                    <option value="">--所在区县--</option>

                                </select>
                            @elseif(\Auth::user()->level() == 5)
                                <select name="" id="countyname" class="col-xs-10 col-sm-5">
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
                            @if(\Auth::user()->level() > 3)
                                <select name="school" id="school" class="col-xs-10 col-sm-5">
                                    <option value="" selected>---学校名称---</option>
                                    {{--@foreach($data as $school)--}}
                                        {{--<option value="{{$school->id}}">{{$school->schoolName}}</option>--}}
                                    {{--@endforeach--}}
                                </select>
                            @else
                                <input type="text" readonly name="" id="school" class="col-xs-10 col-sm-5" value="{{$data->schoolName}}" />
                                <input type="hidden"  name="school" id="school" class="col-xs-10 col-sm-5" value="{{$data->id}}" />
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
                                <select name="parentId" id="schoolgrade" class="col-xs-10 col-sm-5">
                                    <option value="" selected>---年级名称---</option>
                                </select>
                            @elseif(\Auth::user()->level() == 3)
                                <select name="parentId" id="schoolgrade" class="col-xs-10 col-sm-5">
                                    <option value="" selected>---年级名称---</option>
                                    @foreach($data->schoolGrades as $schoolGrade)
                                        <option value="{{$schoolGrade->id}}">{{$schoolGrade->gradeName}}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" readonly name="" id="schoolgrade" class="col-xs-10 col-sm-5" value="{{$data->gradeName}}" />
                                <input type="hidden"  name="parentId" id="schoolgrade" class="col-xs-10 col-sm-5" value="{{$data->gradeid}}" />
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 班级名称 </label>

                        <div class="col-sm-9">
                            <input type="text" name="classname" id="form-field-2" placeholder="班级名称" class="col-xs-10 col-sm-5" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 所属学段 </label>

                        <div class="col-sm-9">
                            <select name="attribute" id="form-field-2" class="col-xs-10 col-sm-5">
                                <option value="1">普通班</option>
                                <option value="2">重点班</option>
                                <option value="3">实验班</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 年级状态 </label>

                        <div class="col-sm-9">
                            <select name="status" id="form-field-2" class="col-xs-10 col-sm-5">
                                <option value="0">锁定</option>
                                <option value="1" selected>激活</option>
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
    <script language="javascript" type="text/javascript" src="{{asset('admin/ajax/procince_city_cou_school.js') }}"></script>
    <script language="javascript" type="text/javascript">
        $('#school').change(function(){
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

    </script>
@endsection