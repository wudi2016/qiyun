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
            <form action="{{url('admin/school/schoolList')}}" method="get" class="form-search">
                <select name="type" id="form-field-1">
                    <option value="1" @if($data->type == 1) selected @endif>ID</option>
                    <option value="2" @if($data->type == 2) selected @endif>学校名称</option>
                    <option value="3" @if($data->type == 3) selected @endif>全部</option>
                </select>
                <span class="input-icon">
                    <input type="text" name="search" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <button class="icon-search nav-search-icon" type="submit"></button>
                </span>
            </form>
        </div><!-- #nav-search -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                学校管理
                <small>
                    <i class="icon-double-angle-right"></i>
                   学校列表
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


        @if(\Auth::user()->level() > 3)
            @permission('base.create')
            <a href="{{url('admin/school/addSchool')}}" class="btn btn-xs btn-info">
                <i class="icon-ok bigger-110">添加</i>
            </a>
            @endpermission

            @permission('base.create')
            <form action="{{url('admin/excel/schoolImport')}}" method="post" enctype="multipart/form-data" style="float:right;">

                <input type="submit" class="btn btn-xs btn-info" value="导入学校信息" >

                <input type="file" name="excel" style="float: right;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>

            <a href="{{url('admin/excel/schoolTemplate')}}" class="btn btn-xs btn-info" style="float: right;margin-right: 10px;">
                <i class="icon-ok bigger-110">下载导入模板</i>
            </a>
            @endpermission
        @endif

        <div class="row">
            <div class="col-sm-9">
                <br>
                <form action="{{url('admin/school/schoolList')}}" method="get" class="form-search">
                    {{--<input type="text" id="form-field-2" placeholder="" class="col-xs-10 col-sm-5" />--}}
                    @if(\Auth::user()->level() > 6)
                        <select name="organizeid" id="organize" class="col-xs-10 col-sm-2" style="width: 110px;">
                            <option value="">--所在省--</option>
                            @foreach($data->organizes as $organizenames)
                                <option value="{{$organizenames->id}}" @if($data->states['organizeid'] == $organizenames->id) selected @endif>{{$organizenames->organize_name}}</option>
                            @endforeach
                        </select>
                    @endif

                    @if(\Auth::user()->level() > 6)
                        <select name="cityId" id="cityname" class="col-xs-10 col-sm-2" style="width: 110px;">
                            <option value="">--所在市--</option>
                            @if($data->states['organizeid'])
                                @foreach($data->states['cityall'] as $citys)
                                    <option value="{{$citys->id}}" @if($data->states['cityId'] == $citys->id) selected @endif>{{$citys->city_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    @elseif(\Auth::user()->level() == 6)
                        <select name="cityId" id="cityname" class="col-xs-10 col-sm-2" style="width: 110px;">
                            <option value="">--所在市--</option>

                                @foreach($data->citynames as $citys)
                                    <option value="{{$citys->id}}" @if($data->states['cityId'] == $citys->id) selected @endif>{{$citys->city_name}}</option>
                                @endforeach

                        </select>
                    @endif

                    @if(\Auth::user()->level() > 5)
                        <select name="countryId" id="countyname" class="col-xs-10 col-sm-2" style="width: 110px;">
                            <option value="">--所在区县--</option>
                            @if($data->states['cityId'])
                                @foreach($data->states['countryall'] as $countrys)
                                    <option class="county" value="{{$countrys->id}}" @if($data->states['countryId'] == $countrys->id) selected @endif>{{$countrys->county_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    @elseif(\Auth::user()->level() == 5)
                        <select name="countryId" id="countyname" class="col-xs-10 col-sm-2" style="width: 110px;">
                            <option value="">--所在区县--</option>

                                @foreach($data->countynames as $countrys)
                                    <option class="county" value="{{$countrys->id}}" @if($data->states['countryId'] == $countrys->id) selected @endif>{{$countrys->county_name}}</option>
                                @endforeach

                        </select>
                    @endif

                    @if(\Auth::user()->level() > 6)
                        <select name="schoolid" id="school" class="col-xs-10 col-sm-2" style="width: 110px;">
                            <option value="">--学校--</option>
                            @if($data->states['organizeid'])
                                @foreach($data->states['schoolall'] as $schools)
                                    <option value="{{$schools->id}}" @if($data->states['schoolid'] == $schools->id) selected @endif>{{$schools->schoolName}}</option>
                                @endforeach
                            @endif
                        </select>
                    @elseif(\Auth::user()->level() == 6)
                        <select name="schoolid" id="school" class="col-xs-10 col-sm-2" style="width: 110px;">
                            <option value="">--学校--</option>
                            @if($data->states['cityId'])
                                @foreach($data->states['schoolall'] as $schools)
                                    <option value="{{$schools->id}}" @if($data->states['schoolid'] == $schools->id) selected @endif>{{$schools->schoolName}}</option>
                                @endforeach
                            @endif
                        </select>
                    @elseif(\Auth::user()->level() == 5)
                        <select name="schoolid" id="school" class="col-xs-10 col-sm-2" style="width: 110px;">
                            <option value="">--学校--</option>
                            @if($data->states['countryId'])
                                @foreach($data->states['schoolall'] as $schools)
                                    <option value="{{$schools->id}}" @if($data->states['schoolid'] == $schools->id) selected @endif>{{$schools->schoolName}}</option>
                                @endforeach
                            @endif
                        </select>
                    @elseif(\Auth::user()->level() == 4)
                        <select name="schoolid" id="school" class="col-xs-10 col-sm-2" style="width: 110px;">
                            <option value="">--学校--</option>

                                @foreach($data->schoolnames as $schools)
                                    <option value="{{$schools->id}}" @if($data->states['schoolid'] == $schools->id) selected @endif>{{$schools->schoolName}}</option>
                                @endforeach

                        </select>
                    @endif
                    <input style="background: #6FB3E0;width:60px;height:28px ;border:0;color:#fff;" type="submit" value="查找" />
                </form>

            </div>

            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    {{--<th class="center">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" class="ace" id="checkAll" />--}}
                                            {{--<span class="lbl"></span>--}}
                                        {{--</label>--}}
                                    {{--</th>--}}
                                    <th>ID</th>
                                    <th>学校名称</th>
                                    {{--<th>学校简介</th>--}}
                                    <th>学校联系方式</th>
                                    <th>单位</th>
                                    <th>城市</th>
                                    <th>区县</th>
                                    <th>学校封面LOGO</th>
                                    <th>学校负责人/校长姓名</th>
                                    <th>学校状态</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                  <form action="{{url('admin/school/delSchools')}}" method="post">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      @foreach($data as $school)
                                          <tr>
                                              {{--<td class="center">--}}
                                                  {{--<label>--}}
                                                      {{--<input type="checkbox" class="ace" name="id[]" value="{{$school->id}}"/>--}}
                                                      {{--<span class="lbl"></span>--}}
                                                  {{--</label>--}}
                                              {{--</td>--}}
                                              <td>
                                                  <a href="#">{{$school->id}}</a>
                                              </td>
                                              <td>{{$school->schoolName}}</td>
                                              {{--<td>{{$school->schoolIntro}}</td>--}}
                                              <td>{{$school->schoolTel}}</td>
                                              <td>{{$school->organize_name}}</td>
                                              <td>{{$school->city_name}}</td>
                                              <td>{{$school->county_name}}</td>
                                              <td><img src="{{asset($school->pic)}}" width="50px" height="50px" onerror="this.src='/image/qiyun/research/addSubject/back.png'"></td>
                                              <td>{{$school->principal}}</td>
                                              <td>{{$school->status ? '激活':'锁定'}}</td>
                                              <td>{{$school->created_at}}</td>
                                              <td>{{$school->updated_at}}</td>

                                              <td>
                                                  <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                      {{--<button class="btn btn-xs btn-success">--}}
                                                          {{--<i class="icon-ok bigger-120"></i>--}}
                                                      {{--</button>--}}

                                                      @permission('base.modify')
                                                      <a href="{{url('admin/school/editSchool/'.$school->id)}}" class="btn btn-xs btn-info">
                                                          <i class="icon-edit bigger-120"></i>
                                                      </a>
                                                      @endpermission

                                                      @if(\Auth::user()->level() > 3)
                                                          @permission('base.remove')
                                                          <a href="{{url('admin/school/delSchool/'.$school->id)}}" class="btn btn-xs btn-danger" onclick="return confirm('删除后无法找回,确定要删除吗?');">
                                                              <i class="icon-trash bigger-120"></i>
                                                          </a>
                                                          @endpermission
                                                      @endif

                                                      <a href="{{ url('admin/auth/checkManagers/6/'.$school->id) }}" class="btn btn-xs btn-success">
                                                          查看管理员
                                                      </a>

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

                                      {{--@if($data)--}}
                                          {{--<button class="btn btn-minier btn-red" onclick="return confirm('删除后将无法找回,确定要删除吗?');">多文件删除</button>--}}
                                      {{--@endif--}}
                                  </form>
                                </tbody>
                            </table>

                            {!! $data->appends(app('request')->all())->render() !!}
                            @if(\Auth::user()->level() > 3)
                                <form action="{{url('admin/excel/schoolExport')}}" method="post" style="float: right;">
                                    {{--<a href="{{url('admin/excel/schoolExport')}}" class="btn btn-xs btn-info" style="float: right;">--}}
                                        {{--<i class="icon-ok bigger-110">导出学校信息</i>--}}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="export" value="{{$export}}">
                                    <input type="submit" class="btn btn-xs btn-info" value="导出学校信息">
                                    {{--</a>--}}
                                </form>

                            @endif

                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.page-content -->
@endsection
@section('js')
    <script>
        //点击省级id查出此省级下的所有市级
        $('#organize').change(function(){
            $('#countyname').find('.county').remove();
            var organizeid = $('#organize').val();
            $.ajax({
                type:'get',
                data:{'id':organizeid},
                url:'{{url('admin/school/city')}}',
                success:function(data){
                    var str = '<option value="">--市级--</option>';
                    $.each(data,function(i,val){
                        str += '<option value="'+val.id+'">'+val.city_name+'</option>';
                    })
                    $('#cityname').html(str);

                },
                dataType:'json',
                'async':false
            });
        })
        //点击市级时查出此市级下的所有区县
        $('#cityname').change(function(){
            var cityid = $('#cityname').val();
            $.ajax({
                type:'get',
                data:{'id':cityid},
                url:'{{url('admin/school/county')}}',
                success:function(data){
                    var str = '<option value="">--所在区县--</option>';
                    $.each(data,function(i,val){
                        str += '<option class="county" value="'+val.id+'">'+val.county_name+'</option>';
                    })
                    $('#countyname').html(str);

                },
                dataType:'json',
                'async':false
            });
        })
        //点击区县时查出此区县下的所有学校
        $('#countyname').change(function(){
            var countyid = $('#countyname').val();
            $.ajax({
                type:'get',
                data:{'id':countyid},
                url:'{{url('admin/school/schools')}}',
                success:function(data){
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

        //点击省级时查出此省级下的学校
        $('#organize').change(function(){
            var organizeid = $('#organize').val();
            $.ajax({
                type:'get',
                data:{'id':organizeid},
                url:'{{url('admin/school/organizeschools')}}',
                success:function(data){
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

        //点击市级时查出此市级下的学校
        $('#cityname').change(function(){
            var citynameid = $('#cityname').val();
            $.ajax({
                type:'get',
                data:{'id':citynameid},
                url:'{{url('admin/school/citychools')}}',
                success:function(data){
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

    </script>

    <script>
        $(function() {
            $("#checkAll").click(function() {
                if($(this).prop('checked')){
                    $('input[name="id[]"]').prop('checked',true);
                }else{
                    $('input[name="id[]"]').prop('checked',false);
                }
            });

            $('input[name="id[]"]').click(function(){
                var chknum = $('input[name="id[]"]').size();
                var chk = 0;
                $('input[name="id[]"]').each(function(){
                    if($(this).prop('checked') == true){
                        chk++;
                    }
                });
                if(chknum == chk){
                    $("#checkAll").prop('checked',true);
                }else{
                    $("#checkAll").prop('checked',false);
                }
            });

        });
    </script>


@endsection