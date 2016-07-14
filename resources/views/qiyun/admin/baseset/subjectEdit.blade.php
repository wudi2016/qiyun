@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                基础设置
                <small>
                    <i class="icon-double-angle-right"></i>
                    学科编辑
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

                <form action="{{url('admin/baseset/editsubjectsub')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> id </label>

                        <div class="col-sm-9">
                            <input disabled="true" type="text" name="id" id="form-field-1" placeholder="id" class="col-xs-10 col-sm-5" value="{{$data->id}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                   <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">   对应组织  </label>
                        <div class="col-sm-9">
                            
                            @if(\Auth::user() -> level() > 6)
                            <select name="organize" id="organize" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应组织--</option>
                                 @foreach($data->organize_name as $organize_names)
                                    <option value="{{$organize_names->id}}" @if($data->organizeid == $organize_names->id) selected @endif>{{$organize_names->organize_name}}</option>
                                @endforeach
                            </select>
                            @endif

                            @if(\Auth::user() -> level() <= 6)
                                @foreach($data->organize_name as $organize_names)
                                    @if($data->organizeid == $organize_names->id)
                                    <input type="text" name="" readonly id="form-field-1" class="col-xs-10 col-sm-5" value="{{$organize_names->organize_name}}" />
                                    @endif
                                @endforeach
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>

                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">   对应市区 </label>
                        <div class="col-sm-9">
                            
                             @if(\Auth::user() -> level() >=6 )
                            <select name="city" id="city" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应市区--</option>
                                @foreach($data->city_name as $city_names)
                                <option value="{{$city_names->id}}"  @if($data->cityid == $city_names->id) selected @endif>{{$city_names->city_name}}</option>
                                @endforeach
                            </select>
                            @endif

                            @if(\Auth::user() -> level() <= 5)
                                @foreach($data->city_name as $city_names)
                                    @if($data->cityid == $city_names->id)
                                    <input type="text" name="" readonly id="form-field-1" class="col-xs-10 col-sm-5" value="{{$city_names->city_name}}" />
                                    @endif
                                @endforeach
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>

                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">   对应区县 </label>
                        <div class="col-sm-9">
                            
                             @if(\Auth::user() -> level() >=5 )
                            <select name="county" id="county" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应区县--</option>
                                @foreach($data->county_name as $county_names)
                                <option value="{{$county_names->id}}"  @if($data->countyid == $county_names->id) selected @endif>{{$county_names->county_name}}</option>
                                @endforeach
                            </select>
                            @endif


                            @if(\Auth::user() -> level() <=4 )
                                @foreach($data->county_name as $county_names)
                                    @if($data->countyid == $county_names->id)
                                    <input type="text" name="" readonly id="form-field-1" class="col-xs-10 col-sm-5" value="{{$county_names->county_name}}" />
                                    @endif
                                @endforeach
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>

                        </div>
                    </div>

                    <div class="space-4"></div>


        
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">   对应学校  </label>
                        <div class="col-sm-9">
                            
                            @if(\Auth::user() -> level() >=4 )
                            <select name="school" id="school" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应学校--</option>
                                @foreach($data->schoolName as $schoolNames)
                                <option value="{{$schoolNames->id}}"  @if($data->schoolid == $schoolNames->id) selected
                                @endif>{{$schoolNames->schoolName}}</option>
                                @endforeach
                            </select>
                            @endif

                            @if(\Auth::user() -> level() <=3 )
                                @foreach($data->schoolName as $schoolNames)
                                    @if($data->schoolid == $schoolNames->id)
                                    <input type="text" name="" readonly id="form-field-1" class="col-xs-10 col-sm-5" value="{{$schoolNames->schoolName}}" />
                                    @endif
                                @endforeach
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>

                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">   对应年级  </label>
                        <div class="col-sm-9">
                            @if(\Auth::user() -> level() >=3 )
                            <select name="grade" id="grade" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应年级--</option>
                                 @foreach($data->gradeName as $gradeNames)
                                <option value="{{$gradeNames->id}}"  @if($data->gradeid == $gradeNames->id) selected
                                @endif>{{$gradeNames->gradeName}}</option>
                                @endforeach
                            </select>
                            @endif

                             @if(\Auth::user() -> level() <=2 )
                                @foreach($data->gradeName as $gradeNames)
                                    @if($data->gradeid == $gradeNames->id)
                                    <input type="text" name="" readonly id="form-field-1" class="col-xs-10 col-sm-5" value="{{$gradeNames->gradeName}}" />
                                    @endif
                                @endforeach
                            @endif
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>

                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  学科名称 </label>

                        <div class="col-sm-9">
                            <input  type="text" name="subjectName" id="form-field-1" placeholder="学科名称" class="col-xs-10 col-sm-5" value="{{$data->subjectName}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 激活状态 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" placeholder="激活状态" class="col-xs-10 col-sm-5" value="" />--}}
                            <select id="form-field-2" class="col-xs-10 col-sm-5" name="status">
                                <option value="0" {{$data->status ? '' : 'selected'}}>锁定</option>
                                <option value="1" {{$data->status ? 'selected' : ''}}>激活</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 添加时间 </label>

                        <div class="col-sm-9">
                            <input disabled="true" type="text" name="created_at" id="form-field-1" placeholder="添加时间" onclick="WdatePicker()" class="col-xs-10 col-sm-5" value="{{$data->created_at}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                提交
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->




    <style>
        /*搜索框*/
        .teacher_search{
            margin-left:275px;
        }    

        .span_class{
            float: left;
            margin-left:275px;
        }

        /*添加复选框*/
        .teacher_checkbox{
            background: #ccc;
            width:400px;
            height:200px;
            margin-left:350px;
        }
    
        /*行*/
        .checkbox_class_row{
            width:400px;
            height:30px;
            /*border:1px solid pink;*/
        }
        .checkbox_class_row div{
            width: 120px;
            height:30px;
            float: left;
            margin-left: 20px;
        }
        /*列*/
        .checkbox_class_line{
            float: left;
            width:150px;
            height:28px;
            /*border:1px solid green;*/
        }

    </style>


@endsection
@section('js')
    <script language="javascript" type="text/javascript" src="{{ URL::asset('js/DatePicker/WdatePicker.js') }}"></script>


   <script language="javascript" type="text/javascript">

       $(function(){
            // 组织 --> 市区
            $('#organize').change(function(){
            var cityid = $('#organize').val();
                // alert(cityid);
                $.ajax({
                    type:'get',
                    data:{'id':cityid},
                    url:'{{url('admin/teachergroup/ajaxorganizes')}}',
                    success:function(data){
                        // alert(data);
                        
                            var str = '<option value="">--市区--</option>';
                             $.each(data[0],function(i,val){
                                 str += '<option value="'+val.id+'">'+val.city_name+'</option>';
                             })
                             $('#city').html(str);
                        
                       
                             var str = '<option value="">--学校--</option>';
                             $.each(data[1],function(i,val){
                                 str += '<option value="'+val.id+'">'+val.schoolName+'</option>';
                             })
                             $('#school').html(str);
                    },
                    dataType:'json',
                    'async':false
                });
            })

            //  市区 --> 县区
            $('#city').change(function(){
            var cityid = $('#city').val();
            // alert(cityid);
                $.ajax({
                    type:'get',
                    data:{'id':cityid},
                    url:'{{url('admin/teachergroup/ajaxcitys')}}',
                    success:function(data){
                        // alert(data);
                        
                        var str = '<option value="">--区县--</option>';
                        $.each(data[0],function(i,val){
                            str += '<option value="'+val.id+'">'+val.county_name+'</option>';
                        })
                        $('#county').html(str);

                        var str = '<option value="">--学校--</option>';
                        $.each(data[1],function(i,val){
                            str += '<option value="'+val.id+'">'+val.schoolName+'</option>';
                        })
                        $('#school').html(str);
                    },
                    dataType:'json',
                    'async':false
                });
            })

            //  县区 --> 学校
            $('#county').change(function(){
            var countyid = $('#county').val();
            // alert(countyid);
                $.ajax({
                    type:'get',
                    data:{'id':countyid},
                    url:'{{url('admin/teachergroup/ajaxcountys')}}',
                    success:function(data){
                        // alert(data);
                        var str = '<option value="">--学校--</option>';
                        $.each(data,function(i,val){
                            str += '<option value="'+val.id+'">'+val.schoolName+'</option>';
                        })
                        $('#school').html(str);
                    },
                    dataType:'json',
                    'async':false
                });
            })


          // 学校 -- > 年级
          $('#school').change(function(){
            var schoolid = $('#school').val();
            // alert(schoolid);
                $.ajax({
                    type:'get',
                    data:{'id':schoolid},
                    url:'{{url('admin/teachergroup/ajaxschools')}}',
                    success:function(data){
                        // alert(data);
                        var str = '<option value="">--年级--</option>';
                        $.each(data,function(i,val){
                            str += '<option value="'+val.id+'">'+val.gradeName+'</option>';

                        })
                        $('#grade').html(str);
                    },
                    dataType:'json',
                    'async':false
                });
            })
 

    })

      
    </script>



@endsection