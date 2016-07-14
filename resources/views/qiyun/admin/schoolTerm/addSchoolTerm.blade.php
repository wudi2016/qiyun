@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                添加学期信息管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加学期年度信息
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

                <form action="{{url('admin/school/doAddSchoolTerm')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                            @if(\Auth::user()->level() > 4)
                                <select name="school" id="school" class="col-xs-10 col-sm-5">
                                    <option value="" selected>---学校名称---</option>
                                    {{--@foreach($data as $school)--}}
                                        {{--<option value="{{$school->id}}">{{$school->schoolName}}</option>--}}
                                    {{--@endforeach--}}
                                </select>
                            @elseif(\Auth::user()->level() == 4)
                                <select name="school" id="school" class="col-xs-10 col-sm-5">
                                    <option value="" selected>---学校名称---</option>
                                    @foreach($data as $school)
                                        <option value="{{$school->id}}">{{$school->schoolName}}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" readonly name="" id="school" class="col-xs-10 col-sm-5" value="{{$data->schoolName}}" />
                                <input type="hidden" name="school" id="school" class="col-xs-10 col-sm-5" value="{{$data->id}}" />

                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle">
{{--                                    {!!isset($errors) ? $errors->first('parentId', '<span style="color:red;">:message</span>') : ""!!}--}}
                                </span>
                            </span>
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学校名称</label>--}}

                        {{--<div class="col-sm-9">--}}
                            {{--<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" />--}}
                            {{--@if(\Auth::user()->level() > 3)--}}
                                {{--<select name="school" id="school" class="col-xs-10 col-sm-5">--}}
                                    {{--<option value="" selected>---学校名称---</option>--}}
                                    {{--@foreach($data as $school)--}}
                                        {{--<option value="{{$school->id}}">{{$school->schoolName}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--@else--}}
                                {{--<input type="text" readonly name="" id="school" class="col-xs-10 col-sm-5" value="{{$data->schoolName}}" />--}}
                                {{--<input type="hidden" name="school" id="school" class="col-xs-10 col-sm-5" value="{{$data->id}}" />--}}

                            {{--@endif--}}

                            {{--<span class="help-inline col-xs-12 col-sm-7">--}}
                                {{--<span class="middle">--}}
{{--                                    {!!isset($errors) ? $errors->first('parentId', '<span style="color:red;">:message</span>') : ""!!}--}}
                                {{--</span>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 年度名称</label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" />--}}
                            @if(\Auth::user()->level() > 3)
                                <select name="parentId" id="schoolyear" class="col-xs-10 col-sm-5">
                                    <option value="" selected>---年度名称---</option>
                                    {{--@foreach($data as $school)--}}
                                    {{--<option value="{{$school->id}}">{{$school->schoolName}}</option>--}}
                                    {{--@endforeach--}}
                                </select>
                            @else
                                <select name="parentId" id="schoolyear" class="col-xs-10 col-sm-5">
                                    <option value="" selected>---年度名称---</option>
                                    @foreach($data->schoolYear as $schoolYears)
                                        <option value="{{$schoolYears->id}}" @if($data->id == $schoolYears->id) selected @endif>{{$schoolYears->reportName}}</option>
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学期名称 </label>

                        <div class="col-sm-9">
                            <input type="text" name="termName" id="form-field-2" placeholder="学期名称" class="col-xs-10 col-sm-5" value="" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学期开始时间 </label>

                        <div class="col-sm-9">
                            <input type="text" name="startTime" id="form-field-1" placeholder="学期开始时间" class="col-xs-10 col-sm-5" value="" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" style="background:url('{{asset("image/qiyun/research/addEvaluation/2.png")}}') no-repeat;background-position:right;" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学期结束时间 </label>

                        <div class="col-sm-9">
                            <input type="text" name="endTime" id="form-field-1" placeholder="学期结束时间" class="col-xs-10 col-sm-5" value="" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" style="background:url('{{asset("image/qiyun/research/addEvaluation/2.png")}}') no-repeat;background-position:right;" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学期信息报告标题 </label>

                        <div class="col-sm-9">
                            <input type="text" name="reportTitle" id="form-field-2" placeholder="学期信息报告标题" class="col-xs-10 col-sm-5" value="" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学期信息报告内容 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="schoolIntro" id="form-field-2" placeholder="学校简介" class="col-xs-10 col-sm-5" />--}}
                            <textarea name="reportBody" id="form-field-2" placeholder="学期信息报告内容" class="col-xs-10 col-sm-5" cols="30" rows="10" style="resize: none;"></textarea>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学期信息报告年 </label>

                        <div class="col-sm-9">
                            <input type="text" name="reportTermTime" id="form-field-2" placeholder="学期信息报告年" class="col-xs-10 col-sm-5" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学期状态 </label>

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
    <script language="javascript" type="text/javascript" src="{{asset('js/DatePicker/WdatePicker.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{asset('admin/ajax/procince_city_cou_school.js') }}"></script>
    <script language="javascript" type="text/javascript">
        $('#school').change(function(){
            var schoolid = $('#school').val();
            $.ajax({
                type:'get',
                data:{'id':schoolid},
                url:'{{url('admin/school/ajaxSchoolYear')}}',
                success:function(data){
                    var str = '<option value="">---年度名称---</option>';
                    $.each(data,function(i,val){
                        str += '<option value="'+val.id+'">'+val.reportName+'</option>';
                    })
                    $('#schoolyear').html(str);

                },
                dataType:'json',
                'async':false
            });
        })

    </script>
@endsection