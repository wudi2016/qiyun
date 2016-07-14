@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                用户管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    重置密码
                </small>
            </h1>

        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form class="form-horizontal" role="form">
                    <input type="hidden" name="resetPass" value="{{$res->id}}"/>
                    <input type="hidden" name="remember_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名： </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" readonly class="col-xs-10 col-sm-5" value="{{$res->username}}"/>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新密码： </label>

                        <div class="col-sm-9">
                            <input type="password" id="form-field-2" placeholder="newPass" class="col-xs-10 col-sm-5" /><span style="color:brown;"></span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 确认密码： </label>

                        <div class="col-sm-9">
                            <input type="password" id="form-field-3" placeholder="confirmedPass" class="col-xs-10 col-sm-5" /><span style="color:brown;"></span>
                        </div>
                    </div>
                    
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="button" id="btnPass">
                                <i class="icon-ok bigger-110"></i>
                                修改
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('js')
    <script>
        $(function(){
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
            });
            //重置密码
            $("#form-field-2").blur(function(){
                var res = $("#form-field-2").val();
                if(res.match(/^[0-9a-zA-Z_]{6,16}$/)){
                    $(this).next().html('');
                }else{
                    $(this).next().html('新密码应为6-16位字母或数字');
                    return;
                }
            })

            $("#form-field-3").keyup(function(){
                var res = $("#form-field-2").val();
                var res1 = $("#form-field-3").val();

                if(res1.match(/^[0-9a-zA-Z_]{6,16}$/)){
                    if(res !== res1){
                        $(this).next().html('两次密码不一致');
                        return;
                    }else{
                        $(this).next().html('');
                    }
                }else{
                    $(this).next().html('确认密码应为6-16位字母或数字');
                    return;

                }

            })

            $("#btnPass").click(function(){
                var id = $("input[name='resetPass']").val();
                var newPass = $("#form-field-2").val();
                var conPass = $("#form-field-3").val();
                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/reset')}}",
                    data: 'id='+id +'&newPass='+newPass+'&conPass='+conPass,
                    dataType: 'json',

                    success: function(result){
                        alert(result.msg);
                        if(result.status === true){
                            location.href="{{url('admin/users/userList')}}";
                        }
                    }
                });

            })
        })
    </script>
@endsection