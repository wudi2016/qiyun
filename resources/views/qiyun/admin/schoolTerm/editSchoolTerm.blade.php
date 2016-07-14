@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                学期信息管理编辑
                <small>
                    <i class="icon-double-angle-right"></i>
                    编辑学期信息管理
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

                <form action="{{url('admin/school/doEditSchoolTerm')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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

                    @if(\Auth::user()->level() > 6)
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> </label>
                            <div class="col-sm-9">
                                <select name="" id="organize" class="col-xs-10 col-sm-5">
                                    <option value="">--所在省--</option>
                                    @foreach($data->organizenames as $organizename)
                                        <option value="{{$organizename->id}}" @if($data->organizeid == $organizename->id) selected @endif>{{$organizename->organize_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                    @if(\Auth::user()->level() > 5)
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">  </label>
                            <div class="col-sm-9">
                                <select name="" id="cityname" class="col-xs-10 col-sm-5">
                                    <option value="">--所在市--</option>
                                    @foreach($data->citynames as $cityname)
                                        <option value="{{$cityname->id}}" @if($data->cityId == $cityname->id) selected @endif>{{$cityname->city_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                    @if(\Auth::user()->level() > 4)
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">  </label>
                            <div class="col-sm-9">
                                <select name="" id="countyname" class="col-xs-10 col-sm-5">
                                    <option value="">--所在区县--</option>
                                    @foreach($data->countrynames as $countryname)
                                        <option value="{{$countryname->id}}" @if($data->countryId == $countryname->id) selected @endif>{{$countryname->county_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学校名称 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 3)
                                <select name="school" id="school" class="col-xs-10 col-sm-5">
                                    <option value="">---学校---</option>
                                    @foreach($data->schoolNames as $schoolnames)
                                        <option value="{{$schoolnames->id}}" @if($data->schoolid == $schoolnames->id) selected @endif>{{$schoolnames->schoolName}}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" readonly name="" id="school" class="col-xs-10 col-sm-5" value="{{$data->schoolName}}" />
                                <input type="hidden" name="school" id="school" class="col-xs-10 col-sm-5" value="{{$data->schoolid}}" />
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 年度名称 </label>

                        <div class="col-sm-9">
                            <select name="parentId" id="schoolyear" class="col-xs-10 col-sm-5">
                                <option value="">---年度名称---</option>
                                @foreach($data->schoolYears as $schoolyears)
                                    <option value="{{$schoolyears->id}}" @if($data->parentId == $schoolyears->id) selected @endif>{{$schoolyears->reportName}}</option>
                                @endforeach
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学期名称 </label>

                        <div class="col-sm-9">
                            <input type="text" name="termName" id="form-field-2" placeholder="学期名称" class="col-xs-10 col-sm-5" value="{{$data->termName}}" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学期开始日期 </label>

                        <div class="col-sm-9">
                            <input type="text" name="startTime" id="form-field-1" placeholder="学期开始日期" class="col-xs-10 col-sm-5" value="{{$data->startTime}}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" style="background:url('{{asset("image/qiyun/research/addEvaluation/2.png")}}') no-repeat;background-position:right;" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学期结束日期 </label>

                        <div class="col-sm-9">
                            <input type="text" name="endTime" id="form-field-1" placeholder="学期结束日期" class="col-xs-10 col-sm-5" value="{{$data->endTime}}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" style="background:url('{{asset("image/qiyun/research/addEvaluation/2.png")}}') no-repeat;background-position:right;" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学期信息报告标题 </label>

                        <div class="col-sm-9">
                            <input type="text" name="reportTitle" id="form-field-2" placeholder="学期信息报告标题" class="col-xs-10 col-sm-5" value="{{$data->reportTitle}}" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学期信息报告内容 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="schoolIntro" id="form-field-2" placeholder="学校简介" class="col-xs-10 col-sm-5" value="" />--}}
                            <textarea name="reportBody" id="form-field-2" placeholder="学期信息报告内容" class="col-xs-10 col-sm-5" cols="30" rows="10" style="resize: none">{{$data->reportBody}}</textarea>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学期信息报告年 </label>

                        <div class="col-sm-9">
                            <input type="text" name="reportTermTime" id="form-field-2" placeholder="学期信息报告年" class="col-xs-10 col-sm-5" value="{{$data->reportTermTime}}" />
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
                                <option value="0" {{$data->status ? '' : 'selected'}}>锁定</option>
                                <option value="1" {{$data->status ? 'selected' : ''}}>激活</option>
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