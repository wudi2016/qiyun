@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                权限管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    用户添加操作权限
                </small>
            </h1>
        </div><!-- /.page-header -->

        @if ( count($errors) > 0 )
                @foreach ( $errors -> all() as $error )
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
        @endif

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

               <form action="{{ url('admin/auth/createUserPermission') }}" method="post" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 选择操作权限对应模块 </label>
                        <div class="col-sm-9">
                            <select name="model" class="col-xs-10 col-sm-5" style="text-align: center;">
                                <option value="">请选择</option>
                                @foreach( $model as $i )
                                    <option value="{{ $i -> model }}">{{ $i -> model }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 选择操作权限对应模块 </label>
                        <div class="col-sm-9">
                            <select name="permission_id" class="col-xs-10 col-sm-5" style="text-align: center;">
                                <option value="">请选择</option>
                            </select>
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
                    <input type="hidden" name="user_id" value="{{ $userID }}">

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('js')
    <script type="text/javascript">
            $('select[name=permission_id]').attr('disabled', 'disabled');
            $('select[name=model]').change(function () {
                $('select[name=permission_id]').html('<option value="">请选择</option>');
                if ( $(this).val() == '' ) {
                    $('select[name=permission_id]').attr('disabled', 'disabled'); 
                    return;
                } else {
                    $('select[name=permission_id]').removeAttr('disabled');
                };
                $.ajax({
                    type: 'GET',
                    url: '/admin/auth/getPermissionInfo/' + $(this).val(),
                    success: function (response) 
                    {
                        var html = $('select[name=permission_id]').html();
                        for ( var i in response.data ) html += '<option value="'+ response.data[i].id +'">'+ response.data[i].description +'</option>';
                        $('select[name=permission_id]').html(html);
                        delete html;
                    },
                    error: function(error) { alert('error'); }
                });
            });
    </script>
@endsection