@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                添加部门负责人信息管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加部门负责人信息
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
            <div class="col-xs-12" style="width:100%;float: left;">
                <!-- PAGE CONTENT BEGINS -->

                <form action="{{url('admin/school/doAddSchoolDepartmentleader')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div style="width: 50%;float: left;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
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
                                        <option value="" selected>---学校名称---</option>

                                    </select>
                                @elseif(\Auth::user()->level() == 4)
                                    <select name="school" id="school" class="col-xs-10 col-sm-10">
                                        <option value="" selected>---学校名称---</option>
                                        @foreach($data as $school)
                                            <option value="{{$school->id}}">{{$school->schoolName}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="text" readonly name="" id="" class="col-xs-10 col-sm-5" value="{{$data->schoolName}}" />
                                    <input type="hidden" name="school" id="school" class="col-xs-10 col-sm-5" value="{{$data->id}}" />
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
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 部门名称 </label>

                            <div class="col-sm-9">
                                {{--<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" />--}}
                                @if(\Auth::user()->level() > 3)
                                    <select name="parentId" id="department" class="col-xs-10 col-sm-10">
                                        <option value="" selected>---部门名称---</option>
                                        {{--@foreach($data as $school)--}}
                                        {{--<option value="{{$school->id}}">{{$school->schoolName}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                @else
                                    <select name="parentId" id="department" class="col-xs-10 col-sm-10">
                                        <option value="" selected>---部门名称---</option>
                                        @foreach($data->schoolDepartment as $schoolDepartments)
                                            <option value="{{$schoolDepartments->id}}">{{$schoolDepartments->departName}}</option>
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

                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-2">  </label>--}}

                            {{--<div class="col-sm-9">--}}
                                {{--<form action="{{url('admin/school/schoolHeadteaherList')}}" method="get" class="form-search">--}}
                                {{--<select id="searchtype">--}}
                                    {{--<option value="1" >全部</option>--}}
                                    {{--<option value="2" >账号</option>--}}
                                    {{--<option value="3" >姓名</option>--}}
                                {{--</select>--}}
                                {{--<span class="input-icon">--}}
                                    {{--<input type="text" name="search" placeholder="Search ..." class="nav-search-input" id="searchcontent" autocomplete="off" />--}}
                                    {{--<button class="icon-search nav-search-icon"></button>--}}
                                    {{--<span style="background: #C0C0C0;padding:5px 15px;cursor: pointer;" id="searchsubmit" >搜索</span>--}}
                                {{--</span>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="space-4"></div>

                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 部门负责人 </label>--}}
                            {{--<div class="col-sm-9" id="allteachers">--}}
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

                        <div class="clearfix form-actions" style="background: #fff;border: 0px;">
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
                        <div class="top1" style="width: 500px;height:30px;font-weight: bold;line-height: 30px;">
                            <div style="width: 70px;float: left;">部门负责人</div>
                            <div style="width: 430px; height:30px;float: right;">
                                <div class="">
                                    <div class="" style="margin-left: 70px;width: 400px;">
                                        <select id="searchtype">
                                            <option value="1" >全部</option>
                                            <option value="2" >账号</option>
                                            <option value="3" >姓名</option>
                                        </select>
                                        <span class="">
                                            <input type="text" name="search" placeholder="Search ..." class="nav-search-input" id="searchcontent" autocomplete="off" />
                                            {{--<button class="icon-search nav-search-icon"></button>--}}
                                            <span style="background: #C0C0C0;padding:5px 15px;cursor: pointer;" id="searchsubmit" >搜索</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="top3" style="width: 500px;height: 200px;overflow: auto;border: 1px solid #D5D5D5;">
                            <div class="form-group">
                                <div class="col-sm-9" id="allteachers">
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
            var schoolid = $('#school').val();
            $.ajax({
                type:'get',
                data:{'id':schoolid},
                url:'{{url('admin/school/ajaxDepartmentleader')}}',
                success:function(data){
                    var str = '<option value="">---部门名称---</option>';
                    $.each(data,function(i,val){
                        str += '<option value="'+val.id+'">'+val.departName+'</option>';
                    })
                    $('#department').html(str);

                },
                dataType:'json',
                'async':false
            });
        })

        //点击学校时查出此学校下的所有的老师信息
        $('#school').change(function(){
            var schoolid = $('#school').val();
            $.ajax({
                type:'get',
                data:{'id':schoolid},
                url:'{{url('admin/school/ajaxallteachers')}}',
                success:function(data){
                    var str = '';
                    $.each(data,function(i,val){
                        str += '<label class="col-xs-10 col-sm-5" style="width: 150px;" ><input type="checkbox" name="uid[]" value="'+val.id+'" />'+val.realname+'</label>';
                    })
                    $('#allteachers').html(str);

                },
                dataType:'json',
                'async':false
            });
        })

        //点击搜索时查出此学校下的老师信息
        $('#searchsubmit').click(function(){
            if(!$('#school').val()){
                alert('请选择学校名称');return;
            }
            var schoolid = $('#school').val();
            var type = $('#searchtype').val();
            var search = $('#searchcontent').val();
            $.ajax({
                type:'get',
                data:{'id':schoolid,'type':type,'search':search},
                url:'{{url('admin/school/ajaxallteachers')}}',
                success:function(data){
                    var str = '';
                    $.each(data,function(i,val){
                        str += '<label class="col-xs-10 col-sm-5" style="width: 150px;" ><input type="checkbox" name="uid[]" value="'+val.id+'" />'+val.realname+'</label>';
                    })
                    $('#allteachers').html(str);

                },
                dataType:'json',
                'async':false
            });
        })



    </script>
@endsection