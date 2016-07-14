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

            <form class="form-search"  method="get" action="{{url('admin/organization/countyList')}}">
                <select name="flag" id="form-field-1">
                    <option value="0" @if($data->flag == 0) selected @endif>全部</option>
                    <option value="1" @if($data->flag == 1) selected @endif>县教育局名称</option>
                    <option value="2" @if($data->flag == 2) selected @endif>电话</option>
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
                组织机构
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加县区
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


@level(5)
         
      <div class="">
        <form action="{{url('admin/organization/addscounty')}}" method="post">

              @permission('base.create')
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              @foreach($data as $county)
              <a href="{{url('admin/organization/addscounty')}}" class="a_tianjia">
              @endforeach
                  <i class=" btn btn-xs btn-info icon-ok bigger-110">添加</i>
              </a>
              @endpermission
        </form>
      </div>

       @permission('base.create')
        <div>
          <form action="{{url('admin/excel/countyImport')}}" method="post" enctype="multipart/form-data" style="float:right; margin-top:-20px;">

                <input type="submit" class="btn btn-xs btn-info" value="导入县级信息" >
                <input type="file" name="excel" style="float: right;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>

          <a href="{{url('admin/excel/countyTemplate')}}" class="btn btn-xs btn-info" style="float: right;margin-right: 10px; margin-top:-20px;">
                <i class="icon-ok bigger-110">下载导入模板</i>
          </a>
        </div>
          @endpermission
      <div class="div_sousuo">
        <form method="get" action="{{url('admin/organization/countyList')}}">
       <!-- 超级管理员 -->
        @if(\Auth::user()->level() > 6)
            <select style="float:left;margin-top:14px;width: 90px;" id='organize' name="organize">
                <option value="">所在省份</option>
                @foreach($organize as $organize)
                    <option value="{{$organize->id}}" @if($data->labels['organize'] == $organize->id) selected @endif >{{$organize->organize_name}} </option>
                @endforeach
            </select>
        @endif
        @if(\Auth::user()->level() > 6)
            <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="city"  name="city">
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
            <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="city"  name="city">
                <option value="">所在市区</option>
                @foreach($data->city as $city)
                        <option value="{{$city->id}}" @if($data->labels['city'] == $city->id) selected @endif >{{$city->city_name}}</option>
                @endforeach
            </select>
        @endif

        @if(\Auth::user()->level() > 5)
          <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="county"  name="county">
              <option value="">所在县</option>
              @if($data->labels['city'])
                  @foreach($data->labels['countyinfo'] as $county)
                      <option class="county" value="{{$county->id}}" @if($data->labels['county'] == $county->id) selected @endif>{{$county->county_name}}</option>
                  @endforeach
              @endif
          </select>
        @endif

        @if(\Auth::user()->level() == 5)
            <select style="float:left;margin:14px 0 0 10px;width: 90px;" id="county"  name="county">
                <option value="">所在县</option>
                @foreach($data->county as $county)
                        <option value="{{$county->id}}" @if($data->labels['county'] == $county->id) selected @endif >{{$county->county_name}}</option>
                @endforeach
            </select>
        @endif


            <input style="background: #579ecb;width:80px;height:28px ;border:0;margin:15px 0 0 20px ; color:#fff;" type="submit" value="查找" />  
        </form>
      </div> 
 @endlevel

        

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
                                    <th>对应城市</th>
                                    <th>县级教育局名称</th>
                                    <th>县区介绍</th>
                                    <th>电话</th>
                                    <th>县级激活状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="">
                                      @foreach($data as $county)
                                          <tr>
                                              
                                              
                                              <td>
                                                  <a href="#">{{$county->id}}</a>
                                              </td>
                                              <td>{{$county->organize_name}}</td>
                                              <td>{{$county->city_name}}</td>
                                              <td>{{$county->county_name}}</td>
                                              <td>{{$county->county_intro}}</td>
                                              <td>{{$county->county_tel}}</td>
                                              <td>{{$county->status ? '激活' : '锁定'}}</td>
          

                                              <td>
                                                  <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

                                                      @level(5)
                                                      @permission('base.modify')
                                                      <a href="{{url('admin/organization/editcounty/'.$county->id)}}" class="btn btn-xs btn-info">
                                                          <i class="icon-edit bigger-120"></i>
                                                      </a>
                                                      @endpermission
                                                      @endlevel

                                                      @level(5)
                                                      @permission('base.remove')
                                                      <a href="{{url('admin/organization/delcounty/'.$county->id)}}" style="width:29px" class="btn btn-xs btn-danger" onclick="return confirm('删除后将无法找回,确定要删除吗?');">
                                                          <i class="icon-trash bigger-120"></i>
                                                      </a>
                                                      @endpermission
                                                      @endlevel

                                                      <a href="{{ url('admin/auth/checkManagers/5/'.$county->id) }}" class="btn btn-xs btn-success">
                                                          查看管理员
                                                      </a>


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
                            @if(\Auth::user()->level() > 3)
                                <a href="{{url('admin/excel/countyExport')}}" class="btn btn-xs btn-info" style="float: right;">
                                    <i class="icon-ok bigger-110">导出县级信息</i>
                                </a>
                            @endif
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->



            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    <style>
    
      .a_tianjia{
          margin-top: -50px;
          /*float:left;*/
      }
      .div_sousuo{
          float:left;
          /*margin-left: 20px;*/
          /*margin-top: -20px;*/
      }

    </style>
@endsection

@section('js')
    <script language="javascript" type="text/javascript">
        //市级
        $(function(){
            $('#organize').change(function(){
            var organizeid = $('#organize').val();
            // alert(organizeid);
                $.ajax({
                    type:'get',
                    data:{'id':organizeid},
                    url:'{{url('admin/organization/ajaxcity')}}',
                    success:function(data){
                        // alert(data);
                        var str = '<option value="">---市级---</option>';
                        $.each(data,function(i,val){
                            str += '<option value="'+val.id+'">'+val.city_name+'</option>';
                        })
                        $('#city').html(str);
                    },
                    dataType:'json',
                    'async':false
                });
            })

            // 县
            $('#city').change(function(){
            var cityid = $('#city').val();
            // alert(cityid);
                $.ajax({
                    type:'get',
                    data:{'id':cityid},
                    url:'{{url('admin/organization/ajaxcounty')}}',
                    success:function(data){
                        var str = '<option value="">---县级---</option> ';
                        $.each(data,function(i,val){
                            str += '<option value="'+val.id+'">'+val.county_name+'</option> ';
                        })
                        $('#county').html(str);
                    },
                    dataType:'json',
                    'async':false
                });
            })






        })

    </script>

@endsection
