@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                基础设置
                <small>
                    <i class="icon-double-angle-right"></i>
                    学科添加
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

                <form action="{{url('admin/baseset/addsubjectexe')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">   对应组织  </label>
                        <div class="col-sm-9">
                            
                            @if(\Auth::user() -> level() >=6 )
                            <select name="organize" id="organize" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应组织--</option>
                                @foreach($data as $organizes)
                                    <option value="{{$organizes->id}}">{{$organizes->organize_name}}</option>
                                @endforeach
                            </select>
                            @endif

                            @if(\Auth::user() -> level() <= 5 )
                                @foreach($data as $organizes)
                                <input type="text" name="" readonly id="form-field-1" class="col-xs-10 col-sm-5" value="{{$organizes->organize_name}}" />
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
                            
                            @if(\Auth::user() -> level() >5 )
                            <select name="city" id="city" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应市区--</option>
                               
                            </select>
                            @endif

                            @if(\Auth::user() -> level() == 5 )
                            <select name="city" id="city" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应市区--</option>
                                @foreach($data as $citys)
                                    <option value="{{$citys->id}}">{{$citys->city_name}}</option>
                                @endforeach
                            </select>
                            @endif

                            @if(\Auth::user() -> level() <= 4 )
                                @foreach($data as $citys)
                                <input type="text" name="" readonly id="form-field-1" class="col-xs-10 col-sm-5" value="{{$citys->city_name}}" />
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
                            
                            @if(\Auth::user() -> level() >4 )
                            <select name="county" id="county" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应区县--</option>
                               
                            </select>
                            @endif

                            @if(\Auth::user() -> level() == 4 )
                            <select name="county" id="county" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应区县--</option>
                                @foreach($data as $countys)
                                    <option value="{{$countys->id}}">{{$countys->county_name}}</option>
                                @endforeach
                            </select>
                            @endif

                            @if(\Auth::user() -> level() == 3 )
                                @foreach($data as $countys)
                                <input type="text" name="" readonly id="form-field-1" class="col-xs-10 col-sm-5" value="{{$countys->county_name}}" />
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
                            
                            @if(\Auth::user() -> level() > 3 )
                            <select name="school" id="school" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应学校--</option>
                                
                            </select>
                            @endif

                            @if(\Auth::user() -> level() == 3 )
                            <select name="school" id="school" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应学校--</option>
                                @foreach($data as $schools)
                                    <option value="{{$schools->id}}">{{$schools->schoolName}}</option>
                                @endforeach
                            </select>
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>

                        </div>
                    </div>

                    <div class="space-4"></div>






                    <!-- 选择年级 -->
                  <!--   <span class="span_class">选择年级</span> -->
        

                    <div class="teacher_checkbox">
                        <div class="checkbox_class_row">         
                            <div class="checkbox_class_line" >
                                
                            </div>                
                        </div>
                    </div>


                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  学科名称 </label>

                        <div class="col-sm-9">
                            <input  type="text" name="subjectName" id="form-field-1" placeholder="学科名称" class="col-xs-10 col-sm-5" value="" />
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
        /*添加教师*/
        .add_teacher{
            margin-left: -38px;
        }
    

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
            background: #F5F5F5;
            width:600px;
            /*height:400px;*/
            height:auto;
            margin-left:238px;
        }
    
        /*行*/
        .checkbox_class_row{
            width:600px;
            height:300px;

            /*border:1px solid pink;*/
        }
        .checkbox_class_row div{
            width: 180px;
            height:30px;
            float: left;
            margin-left: 20px;
        }
       /* .checkbox_class_row div:first-child{
            margin-left: 0px;
        }*/
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
                        // var str = '<option value="">--年级--</option>';
                        var str = '';
                        $.each(data,function(i,val){
                            // str += '<option value="'+val.id+'">'+val.gradeName+'</option>';
                            str += '<div><input type="checkbox" name="gradeName[]" value="'+val.id+'">'+val.gradeName+'</div>'  ;

                        })
                        $('.checkbox_class_row').html(str);
                    },
                    dataType:'json',
                    'async':false
                });
            })

 

    })

      
    </script>




@endsection

