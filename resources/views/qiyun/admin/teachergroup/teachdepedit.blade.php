@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                基础设置
                <small>
                    <i class="icon-double-angle-right"></i>
                    教师部门修改
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

                <form action="{{url('admin/teachergroup/editteachdepsub')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{$data->id}}">  
                <input type="hidden" name="uid" value="{{$data->uid}}">   
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- 定位下拉框 -->
                <input disabled="true" type="hidden" id="datausername" name="username" id="form-field-1" placeholder="id" class="col-xs-10 col-sm-5" value="{{$data->username}}" />



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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">   对应部门  </label>
                        <div class="col-sm-9">
                            @if(\Auth::user() -> level() >=3 )
                            <select name="depart" id="depart" class="col-xs-10 col-sm-5" style="width:200px">
                                <option value=""  selected>--对应部门--</option>
                                @foreach($data->depart as $depart)
                                <option value="{{$depart->id}}"  @if($data->sdid == $depart->id) selected
                                @endif>{{$depart->departName}}</option>
                                @endforeach
                            </select>
                            @endif

                             @if(\Auth::user() -> level() <=2 )
                                @foreach($data->depart as $departNames)
                                    @if($data->sdid == $departNames->id)
                                    <input type="text" name="" readonly id="form-field-1" class="col-xs-10 col-sm-5" value="{{$departNames->departName}}" />
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 激活状态 </label>

                        <div class="col-sm-9">
                            <select id="form-field-2" class="col-xs-10 col-sm-5" name="status" style="width:130px">
                                <option value="0" {{$data->status ? '' : 'selected'}}>锁定</option>
                                <option value="1" {{$data->status ? 'selected' : ''}}>激活</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 教师用户名 </label>

                        <div class="col-sm-9">
                            <input readonly="true" type="text" name="username"  id="form-field-1" placeholder="id" class="col-xs-10 col-sm-5" value="{{$data->username}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>
 



{{--
                     <div class="teacher_search">
                     <label class="add_teacher" for="form-field-1">添加教师</label>
                    
                            <select name="flag" id="form-field-1">
                                <option value="" >搜索范围</option>
                                <option value="1" >用户名</option>
                                <option value="2" >教师姓名</option>
                            </select> 
                          
                            <span class="input-icon">
                              <input type="text" placeholder="请输入......" class="nav-search-input" id="nav-search-input" autocomplete="off" name="ln" />
                               <!-- <button class="icon-search nav-search-icon" type="submit"></button> -->
                              <i class="icon-search nav-search-icon"></i>
                            </span>
                            <!-- 按钮  -->
                            <span style="background:#579ecb;padding:5px 15px;cursor: pointer;" onclick=search();>搜索</span>
                            <span><font color="#ccc">(可用于选择所选学校下的老师)</font></span>          
                    </div>                  

                    <div class="space-4"></div>
                    


                    
                    <div class="teacher_checkbox">
                        <div class="checkbox_class_row">         
                            <div class="checkbox_class_line" >
                                
                            </div>                
                        </div>
                    </div>

                    <div class="space-4"></div>    



--}}

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

            // 学校 --> 部门
            $('#school').change(function(){
            var schoolid = $('#school').val();
            // alert(schoolid);
                $.ajax({
                    type:'get',
                    data:{'id':schoolid},
                    url:'{{url('admin/teachergroup/ajaxdeparts')}}',
                    success:function(data){
                        // alert(data);
                        var str = '<option value="">--部门--</option>';
                        $.each(data,function(i,val){
                            str += '<option value="'+val.id+'">'+val.departName+'</option>';
                        })
                        $('#depart').html(str);
                    },
                    dataType:'json',
                    'async':false
                });
            })


            // 学校 --> user教师
            // $('#school').change(function(){
            //     var schoolid = $('#school').val();
            //     $.ajax({
            //         type:'get',
            //         data:{'id':schoolid},
            //         url:'{{url('admin/teachergroup/schooluser')}}',
            //         success:function(data){
            //             // alert(data);
            //             var str = '';
            //              $.each(data,function(i,val){
            //                 str += '<div><input type="radio" name="userId" value="'+val.id+'">'+val.username+'</div>'  ;
            //             })
            //             $('.checkbox_class_row').html(str);
            //         },
            //         dataType:'json',
            //         'async':false
            //     });
            // })



            // 学校 --> user教师 (首次加载默认)
            
            // var schoolid = $('#school').val();
            // var datausername = $('#datausername').val();
            //     $.ajax({
            //         type:'get',
            //         data:{'id':schoolid},
            //         url:'{{url('admin/teachergroup/schooluser')}}',
            //         success:function(data){
            //             // alert(data);
            //             var str = '';
            //              $.each(data,function(i,val){
            //                 if(datausername == val.username){
            //                     str += '<div><input type="radio" name="userId" value="'+val.id+'" checked>'+val.username+'</div>'  ;
            //                 }else{
            //                     str += '<div><input type="radio" name="userId" value="'+val.id+'">'+val.username+'</div>'  ;
            //                 }
            //             })
            //             $('.checkbox_class_row').html(str);
            //         },
            //         dataType:'json',
            //         'async':false
            //     });



    })




        // 选择教师
        // function search(){
        //     var schoolid = $('#school').val();
        //     var username = $('#nav-search-input').val();
        //     alert(username);
        //     if(username.match(/^\s*$/) !== null){
        //         alert('请输入要查询的姓名或用户名！');
        //     }
        //     var flag = $("select[name='flag'] option:checked").val();
        //     if(flag == ''){
        //         alert('请选择搜索范围！');
        //     }else if(flag == '1'){
        //         $.ajax({
        //             type: 'get',
        //             dataType: 'json',
        //             url: '{{url('admin/teachergroup/ajaxuser')}}',
        //             data: {'username':username,'flag':flag,'schoolid':schoolid},
        //             success:function(data){
        //                  var str = '';
        //                  $.each(data,function(i,val){
        //                     str += '<div><input type="radio" name="userId" value="'+val.id+'">'+val.username+'</div>'  ;
        //                 })
        //                 $('.checkbox_class_row').html(str);
        //             }
        //         });
        //     }else if(flag == '2'){
        //         $.ajax({
        //             type: 'get',
        //             dataType: 'json',
        //             url: '{{url('admin/teachergroup/ajaxuser')}}',
        //             data: {'username':username,'flag':flag,'schoolid':schoolid},
        //             success:function(data){
        //                 var str = '';
        //                  $.each(data,function(i,val){
        //                     str += '<div><input type="radio" name="userId" value="'+val.id+'">'+val.realname+'</div>'  ;
        //                 })
        //                 $('.checkbox_class_row').html(str);
        //             }
        //         });
        //     }
        // }
       
    </script>


@endsection
