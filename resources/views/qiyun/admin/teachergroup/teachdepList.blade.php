@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="{{url('admin/index')}}">首页</a>
            </li>
            <li class="active">控制台</li>
        </ul><!-- .breadcrumb -->

        <div class="nav-search" id="nav-search">

            <form class="form-search"  method="get" action="{{url('admin/teachergroup/teachdepList')}}">
                
                <select name="flag" id="form-field-1">
                    <option value="0" @if($data->flag == 0) selected @endif>全部</option>
                    <option value="1" @if($data->flag == 1) selected @endif>用户名</option>
                    <option value="2" @if($data->flag == 2) selected @endif>教师姓名</option>
                </select> 
              
                <span class="input-icon">
                  <input type="text" placeholder="请输入......" class="nav-search-input" id="nav-search-input" autocomplete="off"   name="ln"  />
                   <!-- <button class="icon-search nav-search-icon" type="submit"></button> -->
                  <i class="icon-search nav-search-icon"></i>
                </span>
                <!-- 按钮  -->
                <input style="background: #579ecb;width:60px;" type="submit" value="搜索"/>
            </form>

        </div><!-- #nav-search -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                基础设置
                <small>
                    <i class="icon-double-angle-right"></i>
                    部门分组
                </small>
            </h1>
        </div><!-- /.page-header -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


         <div class="">
            <form action="{{url('admin/teachergroup/addteachdep')}}" method="post">
            @permission('teachgroup.create')
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <a href="{{url('admin/teachergroup/addteachdep')}}" class="a_tianjia">
                      <i class=" btn btn-xs btn-info icon-ok bigger-110">添加</i>
                  </a>
            @endpermission
            </form>
        </div>

        @permission('teachgroup.create')
        <div>
          <form action="{{url('admin/excel/teachdepImport')}}" method="post" enctype="multipart/form-data" style="float:right;margin-top:-20px;">

                <input type="submit" class="btn btn-xs btn-info" value="导入部门分组信息" >
                <input type="file" name="excel" style="float: right;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>

          <a href="{{url('admin/excel/teachdepTemplate')}}" class="btn btn-xs btn-info" style="float: right;margin-right: 10px;margin-top:-20px;">
                <i class="icon-ok bigger-110">下载导入模板</i>
          </a>
        </div>
        @endpermission



        <div class="div_sousuo">
        <form method="get" action="{{url('admin/teachergroup/teachdepList')}}">
       <!-- 超级管理员 -->
        @if(\Auth::user()->level() > 6)
            <select style="float:left;margin-top:14px;width: 110px;" id='organize' name="organize">
                <option value="">所在省份</option>
                @foreach($organize as $organize)
                    <option value="{{$organize->id}}" @if($data->labels['organize'] == $organize->id) selected @endif >{{$organize->organize_name}} </option>
                @endforeach
            </select>
        @endif
        @if(\Auth::user()->level() > 6)
            <select style="float:left;margin:14px 0 0 10px;width: 110px;" id="city"  name="city">
                <option value="">所在市区</option>
                @if($data->labels['organize'])
                    @foreach($data->labels['cityinfo'] as $city)
                        <option value="{{$city->id}}" @if($data->labels['city'] == $city->id) selected @endif>{{$city->city_name}}</option>
                    @endforeach
                @endif
            </select>
        @endif
        <!-- 省级 -->
        @if(\Auth::user()->level() == 6)
            <select style="float:left;margin:14px 0 0 10px;width: 110px;" id="city"  name="city">
                <option value="">所在市区</option>
                @foreach($data->city as $city)
                        <option value="{{$city->id}}" @if($data->labels['city'] == $city->id) selected @endif >{{$city->city_name}}</option>
                @endforeach
            </select>
        @endif

        @if(\Auth::user()->level() > 5)
          <select style="float:left;margin:14px 0 0 10px;width: 110px;" id="county"  name="county">
              <option value="">所在县</option>
              @if($data->labels['city'])
                  @foreach($data->labels['countyinfo'] as $county)
                      <option class="county" value="{{$county->id}}" @if($data->labels['county'] == $county->id) selected @endif>{{$county->county_name}}</option>
                  @endforeach
              @endif
          </select>
        @endif

        @if(\Auth::user()->level() == 5)
            <select style="float:left;margin:14px 0 0 10px;width: 110px;" id="county"  name="county">
                <option value="">所在县</option>
                @foreach($data->county as $county)
                        <option value="{{$county->id}}" @if($data->labels['county'] == $county->id) selected @endif >{{$county->county_name}}</option>
                @endforeach
            </select>
        @endif

        @if(\Auth::user()->level() > 6)
            <select style="float:left;margin:14px 0 0 10px;width: 110px;" id="school"  name="school">
                <option value="">所在学校</option>
                @if($data->labels['organize'])
                    @foreach($data->labels['schoolinfo'] as $school)
                    <option class="school" value="{{$school->id}}" @if($data->labels['school'] == $school->id) selected @endif>{{$school->schoolName}}</option>
                    @endforeach
                @endif
            </select>
        @endif

          @if(\Auth::user()->level() == 6)
            <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="school"  name="school">
                <option value="">所在学校</option>
                @if($data->labels['city'])
                    @foreach($data->labels['schoolinfo'] as $school)
                        <option value="{{$school->id}}" @if($data->labels['school'] == $school->id) selected @endif>{{$school->schoolName}}</option>
                    @endforeach
                @endif
            </select>
        @endif

        @if(\Auth::user()->level() == 5)
            <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="school"  name="school">
                <option value="">所在学校</option>
                @if($data->labels['county'])
                    @foreach($data->labels['schoolinfo'] as $school)
                        <option value="{{$school->id}}" @if($data->labels['school'] == $school->id) selected @endif>{{$school->schoolName}}</option>
                    @endforeach
                @endif
            </select>
        @endif
        
        @if(\Auth::user()->level() == 4)
            <select style="float:left;margin:14px 0 0 10px;width: 110px;" id="school"  name="school">
                <option value="">所在学校</option>
                @foreach($data->school as $school)
                        <option value="{{$school->id}}" @if($data->labels['school'] == $school->id) selected @endif >{{$school->schoolName}}</option>
                @endforeach
            </select>
        @endif

       @if(\Auth::user()->level() > 3)
        <select style="float:left;margin:14px 0 0 10px;width: 110px;" id="departName" name="departName" >
              <option value="" >部门名称</option>
               @if($data->labels['school'])
                    @foreach($data->labels['departinfo'] as $departName)
                    <option class="departName" value="{{$departName->id}}" @if($data->labels['departName'] == $departName->id) selected @endif>{{$departName->departName}}</option>
                    @endforeach
                @endif
        </select>
        @endif

        @if(\Auth::user()->level() == 3)
        <select style="float:left;margin:14px 0 0 10px;width: 110px;" id="departName" name="departName" >
              <option value="" >部门名称</option>
               @foreach($data->departName as $departName)
               <option value="{{$departName->id}}" @if($data->labels['departName'] == $departName->id) selected @endif >{{$departName->departName}}</option>
               @endforeach
        </select>
        @endif


            <input style="background: #579ecb;width:80px;height:28px ;border:0;margin:15px 0 0 20px ; color:#fff;" type="submit" value="查找" />  
        </form>
      </div> 



        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">

                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">

                                <thead>
                                <tr>
                                   
                                    <th>id</th>
                                    <th>对应组织</th>
                                    <th>对应市区</th>
                                    <th>对应区县</th>
                                    <th>对应学校</th>
                                    <th>对应部门</th>
                                    <th>用户名</th>
                                    <th>教师姓名</th>
                                    <th>是否为负责人</th>
                                    <th>权限状态</th>
                                    <th>添加时间</th>
                                    <th>更新时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach($data as $teachdep)
                                          <tr>
                                              
                                              
                                              <td>
                                                  <a href="#">{{$teachdep->id}}</a>
                                              </td>
                                              <td>{{$teachdep->organize_name}}</td>
                                              <td>{{$teachdep->city_name}}</td>
                                              <td>{{$teachdep->county_name}}</td>
                                              <td>{{$teachdep->schoolName}}</td>
                                              <td>{{$teachdep->departName}}</td>
                                              <td>{{$teachdep->username}}</td>
                                              <td>{{$teachdep->realname}}</td>
                                              <td>{{$teachdep->isManage ? '负责人':'普通成员'}}</td>
                                              <td>{{$teachdep->status ? '激活':'锁定'}}</td>
                                              <td>{{$teachdep->created_at}}</td>
                                              <td>{{$teachdep->updated_at}}</td>
                                              
                                              <td>
                                                  <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                      {{--<button class="btn btn-xs btn-success">--}}
                                                          {{--<i class="icon-ok bigger-120"></i>--}}
                                                      {{--</button>--}}
@permission('teachgroup.modify')
                                                      <a href="{{url('admin/teachergroup/editteachdep/'.$teachdep->id)}}" class="btn btn-xs btn-info">
                                                          <i class="icon-edit bigger-120"></i>
                                                      </a>
@endpermission
@permission('teachgroup.remove')
                                                      <a href="{{url('admin/teachergroup/delteachdep/'.$teachdep->id)}}" style="width:29px" class="btn btn-xs btn-danger" onclick="return confirm('删除后将无法找回,确定要删除吗?');">
                                                          <i class="icon-trash bigger-120"></i>
                                                      </a>
@endpermission
                                                      {{--<button class="btn btn-xs btn-warning">--}}
                                                          {{--<i class="icon-flag bigger-120"></i>--}}
                                                      {{--</button>--}}
                                                  </div>

                                                  <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                      <div class="inline position-relative">
                                                          <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                              <i class="icon-cog icon-only bigger-110"></i>
                                                          </button>

                                                          <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                              <li>
                                                                  <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                        <span class="blue">
                                          <i class="icon-zoom-in bigger-120"></i>
                                        </span>
                                                                  </a>
                                                              </li>

                                                              <li>
                                                                  <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                        <span class="green">
                                          <i class="icon-edit bigger-120"></i>
                                        </span>
                                                                  </a>
                                                              </li>

                                                              <li>
                                                                  <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                        <span class="red">
                                          <i class="icon-trash bigger-120"></i>
                                        </span>
                                                                  </a>
                                                              </li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </td>
                                          </tr>
                                      @endforeach

                                </form>

                                </tbody>
                            </table>
                          {!! $data->appends(app('request')->all())->render() !!}    
                          <a href="{{url('admin/excel/teachdepExport')}}" class="btn btn-xs btn-info" style="float: right;">
                                    <i class="icon-ok bigger-110">导出学校信息</i>
                          </a>
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->


       




            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    <style>
    
      .a_tianjia{
          /*float:left;*/
          margin-top: -50px;
      }
      .div_sousuo{
          float:left;
          /*margin-left: 20px;*/
          /*margin-top: -20px;*/
      }

    </style>
@endsection

@section('js')
<script src="{{asset('admin/common/baseset/department.js')}}"></script>
<script language="javascript" type="text/javascript">

       $(function(){
            // 组织 --> 市区
            $('#organize').change(function(){
            var cityid = $('#organize').val();
            $('#city').html('<option value="">-所在城市-</option>');
            $('#county').html('<option value="">-所在县区-</option>');
            $('#school').html('<option value="">-所属学校-</option>');
            $('#departName').html('<option value="">-所属部门-</option>');
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
            $('#county').html('<option value="">-所在县区-</option>');
            $('#school').html('<option value="">-所属学校-</option>');
            $('#departName').html('<option value="">-所属部门-</option>');
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
            $('#school').html('<option value="">-所属学校-</option>');
            $('#departName').html('<option value="">-所属部门-</option>');
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

             //  学校 --> 部门
            $('#school').change(function(){
            var schoolid = $('#school').val();
            $('#departName').html('<option value="">-所属部门-</option>');
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
                        $('#departName').html(str);
                    },
                    dataType:'json',
                    'async':false
                });
            })

 

    })

      
    </script>


@endsection
