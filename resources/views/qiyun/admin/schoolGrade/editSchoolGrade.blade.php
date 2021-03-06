@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                年级信息管理编辑
                <small>
                    <i class="icon-double-angle-right"></i>
                    编辑年级信息管理
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

                <form action="{{url('admin/school/doEditSchoolGrade')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学校名称</label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" />--}}
                            @if(\Auth::user()->level() > 3)
                                <select name="parentId" id="school" class="col-xs-10 col-sm-5">
                                    <option value="" selected>---学校名称---</option>
                                    @foreach($data->schoolNames as $schoolnames)
                                        <option value="{{$schoolnames->id}}" @if($data->schoolid == $schoolnames->id) selected @endif>{{$schoolnames->schoolName}}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" readonly name="" id="school" class="col-xs-10 col-sm-5" value="{{$data->schoolName}}" />
                                <input type="hidden" name="parentId" id="school" class="col-xs-10 col-sm-5" value="{{$data->schoolid}}" />
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 年级名称 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 2)
                                <input type="text" name="gradeName" id="form-field-2" placeholder="年级名称" class="col-xs-10 col-sm-5" value="{{$data->gradeName}}" />
                            @endif
                            @if(\Auth::user()->level() == 2)
                                <input type="text" readonly name="gradeName" id="form-field-2" placeholder="年级名称" class="col-xs-10 col-sm-5" value="{{$data->gradeName}}" />
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 所属学段 </label>

                        <div class="col-sm-9">
                            <select name="period" id="form-field-2" class="col-xs-10 col-sm-5">
                                <option value="1" {{$data->period == 1 ? 'selected' : ''}}>小学</option>
                                <option value="2" {{$data->period == 2 ? 'selected' : ''}}>初中</option>
                                <option value="3" {{$data->period == 3 ? 'selected' : ''}}>高中</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否毕业年级 </label>

                        <div class="col-sm-9">
                            <select name="isGraduate" id="form-field-2" class="col-xs-10 col-sm-5">
                                <option value="0" {{$data->isGraduate ? '' : 'selected'}}>否</option>
                                <option value="1" {{$data->isGraduate ? 'selected' : ''}}>是</option>
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
    <script language="javascript" type="text/javascript" src="{{asset('admin/ajax/procince_city_cou_school.js') }}"></script>
    <script language="javascript" type="text/javascript">
        $('#school').change(function(){
            $('#schoolterm').find('.term').remove();
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

        //点击年度名称时获取此年度下的学期名称
        $('#schoolyear').change(function(){
            var schoolyearid = $('#schoolyear').val();
            $.ajax({
                type:'get',
                data:{'id':schoolyearid},
                url:'{{url('admin/school/ajaxSchoolTerm')}}',
                success:function(data){
                    var str = '<option value="">---学期名称---</option>';
                    $.each(data,function(i,val){
                        str += '<option class="term" value="'+val.id+'">'+val.termName+'</option>';
                    })
                    $('#schoolterm').html(str);

                },
                dataType:'json',
                'async':false
            });
        })

    </script>
@endsection