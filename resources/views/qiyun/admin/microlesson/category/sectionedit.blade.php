@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                微课管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    学段编辑页面
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

                <form action="{{url('admin/microlesson/editmicrolessonCategorysectionsub')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$data->id}}">


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> id </label>

                        <div class="col-sm-9">
                            <input disabled="true" type="text" name="lessonName" id="form-field-1" placeholder="用户id" class="col-xs-10 col-sm-5" value="{{$data->id}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学段名称 </label>

                        <div class="col-sm-9">
                            <input  type="text" name="sectionName" id="form-field-1" placeholder="用户id" class="col-xs-10 col-sm-5" value="{{$data->sectionName}}" />
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