@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                学校管理编辑
                <small>
                    <i class="icon-double-angle-right"></i>
                    编辑学校管理
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

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form action="{{url('admin/school/doEditSchool')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="original_pic" value="{{$data->pic}}">
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
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学校名称 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 3)
                                <input type="text" name="schoolName" id="form-field-2" placeholder="学校名称" class="col-xs-10 col-sm-5" value="{{$data->schoolName}}" />
                            @else
                                <input type="text" readonly name="schoolName" id="form-field-2" placeholder="学校名称" class="col-xs-10 col-sm-5" value="{{$data->schoolName}}" />
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学校简介 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="schoolIntro" id="form-field-2" placeholder="学校简介" class="col-xs-10 col-sm-5" value="" />--}}
                            <textarea name="schoolIntro" id="form-field-2" placeholder="学校简介" class="col-xs-10 col-sm-5" cols="30" rows="10" style="resize: none">{{$data->schoolIntro}}</textarea>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学校联系方式 </label>

                        <div class="col-sm-9">
                            <input type="text" name="schoolTel" id="form-field-2" placeholder="学校联系方式" class="col-xs-10 col-sm-5" value="{{$data->schoolTel}}" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 单位</label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" />--}}
                            @if(\Auth::user()->level() > 6)
                                <select name="organizeid" id="organize" class="col-xs-10 col-sm-5">
                                    <option value="" selected>---单位---</option>
                                    @foreach($data->organizename as $organizenames)
                                        <option value="{{$organizenames->id}}" @if($data->organizeid == $organizenames->id) selected @endif>{{$organizenames->organize_name}}</option>
                                    @endforeach
                                </select>
                            @endif
                            @if(\Auth::user()->level() <= 6)
                                <input type="text" readonly name="" id="organize" class="col-xs-10 col-sm-5" value="{{$data->organize_name}}" />
                                <input type="hidden" name="organizeid" id="organize" class="col-xs-10 col-sm-5" value="{{$data->organizeid}}" />
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 市级 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-2" placeholder="" class="col-xs-10 col-sm-5" />--}}
                            @if(\Auth::user()->level() >= 6)
                                <select name="cityId" id="cityname" class="col-xs-10 col-sm-5">
                                    <option value="">---市级---</option>
                                    @foreach($data->citys as $city)
                                        <option value="{{$city->id}}" @if($data->cityId == $city->id) selected @endif>{{$city->city_name}}</option>
                                    @endforeach
                                </select>
                            @endif
                            @if(\Auth::user()->level() <= 5)
                                <input type="text" readonly name="" id="cityname" class="col-xs-10 col-sm-5" value="{{$data->city_name}}" />
                                <input type="hidden" name="cityId" id="cityname" class="col-xs-10 col-sm-5" value="{{$data->cityId}}" />
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 区县 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-2" placeholder="" class="col-xs-10 col-sm-5" />--}}
                            @if(\Auth::user()->level() >= 5)
                                <select name="countryId" id="countyname" class="col-xs-10 col-sm-5">
                                    <option value="">---区县---</option>
                                    {{--@if($data->countryId)--}}
                                        @foreach($data->countys as $county)
                                            <option class="coun" value="{{$county->id}}" @if($data->countryId == $county->id) selected @endif>{{$county->county_name}}</option>
                                        @endforeach
                                    {{--@endif--}}
                                </select>
                            @endif
                            @if(\Auth::user()->level() < 5)
                                <input type="text" readonly name="" id="countyname" class="col-xs-10 col-sm-5" value="{{$data->county_name}}" />
                                <input type="hidden" name="countryId" id="countyname" class="col-xs-10 col-sm-5" value="{{$data->countryId}}" />
                            @endif
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学校封面LOGO </label>

                        <div class="col-sm-9" >
                            <img src="{{asset($data->pic)}}" id="uploadPreview" class="col-xs-10 col-sm-5"/>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2">  </label>

                        <div class="col-sm-9">
                            <input type="file" id="uploadImage" name="pic" onchange="loadImageFile();" style="width:170px;height:40px;position: absolute;top: 0px;opacity: 0;"/>
                            <div class="second_file"><img src="/image/qiyun/research/addSubject/1.png"/></div>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学校负责人/校长姓名 </label>

                        <div class="col-sm-9">
                            <input type="text" name="principal" id="form-field-2" placeholder="学校负责人/校长姓名" class="col-xs-10 col-sm-5" value="{{$data->principal}}" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学校状态 </label>

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
    <script language="javascript" type="text/javascript">
        //市级
        $('#organize').change(function(){
            $('#countyname').find('.coun').remove();
            var organizeid = $('#organize').val();
            $.ajax({
                type:'get',
                data:{'id':organizeid},
                url:'{{url('admin/school/city')}}',
                success:function(data){
                    var str = '<option value="">---市级---</option>';
                    $.each(data,function(i,val){
                        str += '<option value="'+val.id+'">'+val.city_name+'</option>';
                    })
                    $('#cityname').html(str);

                },
                dataType:'json',
                'async':false
            });
        })

        //区县
        $('#cityname').change(function(){
            var cityid = $('#cityname').val();
            $.ajax({
                type:'get',
                data:{'id':cityid},
                url:'{{url('admin/school/county')}}',
                success:function(data){
                    var str = '<option value="">---区县---</option>';
                    $.each(data,function(i,val){
                        str += '<option value="'+val.id+'">'+val.county_name+'</option>';
                    })
                    $('#countyname').html(str);

                },
                dataType:'json',
                'async':false
            });
        })
    </script>

    <script type="text/javascript" src="{{ URL::asset('js/qiyun/research/addSubject.js') }}"></script>
@endsection