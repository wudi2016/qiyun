@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                组织机构
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加城市
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

                <form action="{{url('admin/organization/addcityexe')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                  
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  对应省份 </label>
                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 6)
                            <select name="organizeid" id="organize" class="col-xs-10 col-sm-5" style="width:120px">
                                <option value="" selected>--省份--</option>
                                @foreach($data as $organizename)
                                    <option value="{{$organizename->id}}">{{$organizename->organize_name}}</option>
                                @endforeach
                            </select>
                            @endif
                            @if(\Auth::user()->level() <= 6)
                                <input type="text" name="" readonly id="form-field-1" class="col-xs-10 col-sm-5" value="{{$data->organize_name}}" />
                                <input type="hidden" name="organizeid"  id="form-field-1" class="col-xs-10 col-sm-5" value="{{$data->organizeid}}" />
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>

                        </div>
                    </div>

                    <div class="space-4"></div>
            




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 市教育局名称 </label>

                        <div class="col-sm-9">
                            <input  type="text" name="city_name" id="form-field-1" placeholder="市教育局名称" class="col-xs-10 col-sm-5" value="" />
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 城市信息 </label>

                        <div class="col-sm-9">
                            <input type="text" name="city_intro" id="form-field-1" placeholder="城市信息" class="col-xs-10 col-sm-5" value="" />
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 电话 </label>

                        <div class="col-sm-9">
                            <input type="text" name="city_tel"  id="city_tel" placeholder="电话" class="col-xs-10 col-sm-5" value="" />
                            <span class="tel_error"></span>
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学校状态 </label>

                        <div class="col-sm-9">
                            <select name="status" id="form-field-2" class="col-xs-10 col-sm-5" style="width:120px">
                                <option value="1">激活</option>
                                <option value="0">锁定</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
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
@endsection
@section('js')
    <script language="javascript" type="text/javascript" src="{{ URL::asset('js/DatePicker/WdatePicker.js') }}"></script>

    <script>
    $('#city_tel').blur(function(){
        var tel = $("input[name='city_tel']").val();
        var isMobile=/^(?:13\d|15\d)\d{5}(\d{3}|\*{3})$/;   
        var isPhone=/^((0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/;
        if(!isMobile.test(tel) && !isPhone.test(tel)){
                $('#city_tel').val('');
                $('.tel_error').html("<font color='red'>请正确填写电话号码</font>");
                return false;
        }else{
                $('.tel_error').html("<font color='red'>可以使用</font>");
        }
    })

    </script>

@endsection

