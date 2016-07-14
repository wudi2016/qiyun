@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                评课打分结果编辑
                <small>
                    <i class="icon-double-angle-right"></i>
                    编辑评课打分结果
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

                <form action="{{url('admin/evaluation/doEditEvaluatResult')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="urlPath" value="{{$_SERVER['HTTP_REFERER']}}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> ID </label>

                        <div class="col-sm-9">
                            <input readonly="" type="text" name="id" class="col-xs-10 col-sm-5" id="form-input-readonly" value="{{$data->id}}" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle" style="color: red;font-size: 11px">
                                    <span class="lbl">不可修改</span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 评课名称 </label>

                        <div class="col-sm-9">
                            <input type="text" readonly name="" id="form-field-1" placeholder="评课名称" class="col-xs-10 col-sm-5" value="{{$data->evaluatName}}" />
                            <input type="hidden" readonly name="evaluatId" id="form-field-1" placeholder="评课名称" class="col-xs-10 col-sm-5" value="{{$data->evaluatId}}" />
                            {{--<select name="evaluatId" id="form-field-1" class="col-xs-10 col-sm-5">--}}
                                {{--@foreach($data->evaluatNames as $evaluatnames)--}}
                                    {{--<option value="{{$evaluatnames->id}}" @if($data->evaluatId == $evaluatnames->id) selected @endif>--}}
                                        {{--{{$evaluatnames->evaluatName}}--}}
                                    {{--</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle" style="color: red;font-size: 11px">
                                    <span class="lbl">不可修改</span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 评课标准选项 </label>

                        <div class="col-sm-9">
                            <input type="text" readonly name="" id="form-field-1" placeholder="评课标准选项" class="col-xs-10 col-sm-5" value="{{$data->evaluatTmpContentName}}" />
                            <input type="hidden" readonly name="evaluatIdTmpContentId" id="form-field-1" placeholder="评课标准选项" class="col-xs-10 col-sm-5" value="{{$data->evaluatIdTmpContentId}}" />
                            {{--<select name="evaluatId" id="form-field-1" class="col-xs-10 col-sm-5">--}}
                                {{--@foreach($data->evaluatTmpContentNames as $evaluatnames)--}}
                                    {{--<option value="{{$evaluatnames->id}}" @if($data->evaluatIdTmpContentId == $evaluatnames->id) selected @endif>--}}
                                        {{--{{$evaluatnames->evaluatTmpContentName}}--}}
                                    {{--</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}

                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle" style="color: red;font-size: 11px">
                                    <span class="lbl">不可修改</span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 参与人数 </label>

                        <div class="col-sm-9">
                            <input type="text" name="nums" id="form-field-1" placeholder="参与人数" class="col-xs-10 col-sm-5" value="{{$data->nums}}" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分数 </label>

                        <div class="col-sm-9">
                            <input type="text" name="score" id="form-field-1" placeholder="分数" class="col-xs-10 col-sm-5" value="{{$data->score}}" />

                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
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
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection