@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                组织机构
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加单位
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

                <form  action="{{url('admin/organization/addsprovinceexe')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    
                    

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 省级单位名称 </label>

                        <div class="col-sm-9">
                            <input  type="text" name="organize_name" id="form-field-1" placeholder="省级单位名称" class="col-xs-10 col-sm-5" value="" />
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  省级单位介绍 </label>

                        <div class="col-sm-9">
                            <input  type="text" name="organize_intro" id="form-field-1" placeholder="信息介绍" class="col-xs-10 col-sm-5" value="" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 电话 </label>

                        <div class="col-sm-9">
                            <input type="text" name="organize_tel" id="organize_tel" placeholder="电话" class="col-xs-10 col-sm-5" value="" />
                            <span class="tel_error"></span>
                        </div>
                    </div>

                    <div class="space-4"></div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 地址 </label>

                        <div class="col-sm-9">
                            <input type="text" name="address" id="form-field-1" placeholder="地址" class="col-xs-10 col-sm-5" value="" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 邮编 </label>

                        <div class="col-sm-9">
                            <input type="text" name="postcode" id="postcode"  placeholder="邮编" class="col-xs-10 col-sm-5" value="" />
                            <span class="pos_error"></span>
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 传真 </label>

                        <div class="col-sm-9">
                            <input type="text" name="faxes" id="faxes"  id="form-field-1" placeholder="传真格式为家庭座机电话" class="col-xs-10 col-sm-5" value="" />
                            <span class="fax_error"></span>
                        </div>
                    </div>

                    <div class="space-4"></div>



                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学校类型 </label>

                        <div class="col-sm-9">

                            <select id="form-field-5" name="type"  class="col-xs-10 col-sm-4">
                                <option value="">-请选择-</option>
                                <option value="0">小学</option>
                                <option value="1">初中</option>
                                <option value="2">高中</option>
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
    // 验证电话
    $('#organize_tel').blur(function(){
        var tel = $("input[name='organize_tel']").val();
        var isMobile=/^(?:13\d|15\d)\d{5}(\d{3}|\*{3})$/;   
        var isPhone=/^((0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/;
        if(!isMobile.test(tel) && !isPhone.test(tel)){
                $('#organize_tel').val('');
                $('.tel_error').html("<font color='red'>请正确填写电话号码</font>");
                return false;
        }else{
                $('.tel_error').html("<font color='red'>可以使用</font>");
        }
    })
    // 验证邮编
    $('#postcode').blur(function(){
        var pos = $("input[name='postcode']").val();
        var postcode =  /^[0-9]{6}$/;
        if(!postcode.test(pos)){
            $('#postcode').val('');
            $('.pos_error').html("<font color='red'>请正确填写邮编</font>");
            return false;
        }else{
            $('.pos_error').html("<font color='red'>可以使用</font>");
        }
    })

    // 验证传真
    $('#faxes').blur(function(){
        var fax = $("input[name='faxes']").val();
        var faxes = /^((0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/;
        if(!faxes.test(fax)){
            $('#faxes').val('');
            $('.fax_error').html("<font color='red'>请正确填写传真</font>");
            return false;
        }else{
             $('.fax_error').html("<font color='red'>可以使用</font>");
        }
    })

    


    </script>
@endsection