@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                组织机构
                <small>
                    <i class="icon-double-angle-right"></i>
                    县区添加
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

                <form action="{{url('admin/organization/addcountyexe')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  对应市区 </label>
                        <div class="col-sm-9">
                            @if(\Auth::user()->level() >6)
                            <select name="cityId" id="city" class="col-xs-10 col-sm-5" style="width:120px">
                                <option value="">---市级---</option>
                               
                            </select>
                            @endif

                            @if(\Auth::user()->level() == 6)
                            <select name="cityId" id="city" class="col-xs-10 col-sm-5" style="width:120px">
                                <option value="">---市级---</option>
                                @foreach($data->citynames as $citynames)
                                <option value="{{$citynames->id}}">{{$citynames->city_name}}</option>
                                @endforeach
                            </select>
                            @endif

                            @if(\Auth::user()->level() == 5)
                                <input type="text" readonly name="cityId" id="city" class="col-xs-10 col-sm-5" value="{{$data->city_name}}" />
                                <input type="hidden" name="cityId" id="cityname" class="col-xs-10 col-sm-5" value="{{$data->cityid}}" />
                            @endif
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>

                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 县区组织名称 </label>

                        <div class="col-sm-9">
                            <input  type="text" name="county_name" id="form-field-1" placeholder="县区组织名称" class="col-xs-10 col-sm-5" value="" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  县区信息介绍 </label>

                        <div class="col-sm-9">
                            <input  type="text" name="county_intro" id="form-field-1" placeholder="县区信息介绍" class="col-xs-10 col-sm-5" value="" />
                        </div>
                    </div>

                    <div class="space-4"></div>





                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 电话 </label>

                        <div class="col-sm-9">
                            <input type="text" name="county_tel" id="county_tel" placeholder="电话" class="col-xs-10 col-sm-5" value="" />
                            <span class="tel_error"></span>
                        </div>
                    </div>

                    <div class="space-4"></div>


 

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学校状态 </label>

                        <div class="col-sm-9">
                            <select name="status" id="form-field-2" class="col-xs-10 col-sm-5">
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
        })
       

        $('#county_tel').blur(function(){
            var tel = $("input[name='county_tel']").val();
            var isMobile=/^(?:13\d|15\d)\d{5}(\d{3}|\*{3})$/;   
            var isPhone=/^((0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/;
            if(!isMobile.test(tel) && !isPhone.test(tel)){
                    $('#county_tel').val('');
                    $('.tel_error').html("<font color='red'>请正确填写电话号码</font>");
                    return false;
            }else{
                    $('.tel_error').html("<font color='red'>可以使用</font>");
            }
        })
        
    </script>

@endsection