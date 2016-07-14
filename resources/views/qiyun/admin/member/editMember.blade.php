@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                协作组成员编辑
                <small>
                    <i class="icon-double-angle-right"></i>
                    编辑协作组成员
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

                <form action="{{url('admin/teacher/doMemberEdit')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 教研组名称 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="techResearchName" id="form-field-1" placeholder="教研组名称" class="col-xs-10 col-sm-5" value="{{$data->techResearchName}}" />--}}
                            <select name="parentId" id="" id="form-field-1" class="col-xs-10 col-sm-5">
                                @foreach($data->tenames as $tename)
                                    <option value="{{$tename->id}}"@if($data->parentId == $tename->id) selected @endif>
                                        {{$tename->techResearchName}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名 </label>

                        <div class="col-sm-9">
                            <input type="text" name="" disabled id="form-field-1" placeholder="用户名" class="col-xs-10 col-sm-5" value="{{$data->realname}}" />
                            <input type="hidden" name="userId"  id="form-field-1" placeholder="用户名" class="col-xs-10 col-sm-5" value="{{$data->userId}}" />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否负责人在状态标示 </label>--}}

                        {{--<div class="col-sm-9">--}}
                            {{--<input type="text" id="form-field-2" placeholder="是否公开" class="col-xs-10 col-sm-5" value="{{$data->isOpen}}" />--}}
                            {{--<select id="form-field-2" class="col-xs-10 col-sm-5" name="isManage">--}}
                                {{--<option value="0" {{$data->isManage ? '' : 'selected'}}>普通成员</option>--}}
                                {{--<option value="1" {{$data->isManage ? 'selected' : ''}}>负责人</option>--}}
                            {{--</select>--}}
                            {{--<span class="help-inline col-xs-12 col-sm-7">--}}
                                {{--<span class="middle"></span>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 状态 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" placeholder="教研组状态" class="col-xs-10 col-sm-5" value="" />--}}
                            <select id="form-field-2" class="col-xs-10 col-sm-5" name="status">
                                <option value="0" {{$data->status ? '' : 'selected'}}>锁定</option>
                                <option value="1" {{$data->status ? 'selected' : ''}}>激活</option>
                            </select>
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
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection