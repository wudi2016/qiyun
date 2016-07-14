@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                协同备课编辑
                <small>
                    <i class="icon-double-angle-right"></i>
                    编辑协同备课
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

                <form action="{{url('admin/lesson/dolessonSubjectEdit')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 名称 </label>

                        <div class="col-sm-9">
                            <input type="text" name="lessonSubjectName" id="form-field-1" placeholder="名称" class="col-xs-10 col-sm-5" value="{{$data->lessonSubjectName}}" />

                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 图片 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="pic" id="form-field-2" placeholder="主要图片" class="col-xs-10 col-sm-5" value="{{$data->pic}}" />--}}
                            <img src="{{asset($data->pic)}}" alt="" id="uploadPreview" class="col-xs-10 col-sm-5">
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2">  </label>

                        <div class="col-sm-9">
                            <input type="file" name="pic" id="uploadImage" onchange="loadImageFile();" placeholder="图片url" style="width:170px;height:40px;position: absolute;top: 0px;opacity: 0;" />
                            <div class="second_file"><img src="/image/qiyun/research/addSubject/1.png"/></div>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 开始时间 </label>

                        <div class="col-sm-9">
                            <input type="text" name="beginTime" id="form-field-1" placeholder="开始时间" class="col-xs-10 col-sm-5" value="{{$data->beginTime}}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" style="background:url('{{asset("image/qiyun/research/addEvaluation/2.png")}}') no-repeat;background-position:right;" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 结束时间 </label>

                        <div class="col-sm-9">
                            <input type="text" name="endTime" id="form-field-1" placeholder="结束时间" class="col-xs-10 col-sm-5" value="{{$data->endTime}}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" style="background:url('{{asset("image/qiyun/research/addEvaluation/2.png")}}') no-repeat;background-position:right;" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名 </label>

                        <div class="col-sm-9">
                            <input type="text" readonly name="lessonSubjecAuthor" id="form-field-1" placeholder="备课人" class="col-xs-10 col-sm-5" value="{{$data->lessonSubjecAuthor}}" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 目标名称 </label>

                        <div class="col-sm-9">
                            <input type="text" name="lessonSubjectTarget" id="form-field-1" placeholder="目标名称" class="col-xs-10 col-sm-5" value="{{$data->lessonSubjectTarget}}" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 学段 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="lessonSection" id="form-field-1" placeholder="备课素材所属学段" class="col-xs-10 col-sm-5" value="{{$data->sectionName}}" />--}}
                            <select name="lessonSection" id="sections" class="col-xs-10 col-sm-5" style="width: 150px;">
                                <option value="">---学段---</option>
                                @foreach($data->sections as $sections)
                                    <option value="{{$sections->id}}" @if($data->lessonSection == $sections->id) selected @endif>{{$sections->sectionName}}</option>
                                @endforeach
                            </select>
                            <select name="lessonSubject" id="subjects" class="col-xs-10 col-sm-5" style="width: 150px;">
                                <option value="">---学科---</option>
                                @foreach($data->subjects as $subjects)
                                    <option value="{{$subjects->id}}" @if($data->lessonSubject == $subjects->id) selected @endif>{{$subjects->subjectName}}</option>
                                @endforeach
                            </select>
                            <select name="lessonEdition" id="editions" class="col-xs-10 col-sm-5" style="width: 150px;">
                                <option value="">---版本---</option>
                                @foreach($data->editions as $editions)
                                    <option class="edit" value="{{$editions->id}}" @if($data->lessonEdition == $editions->id) selected @endif>{{$editions->editionName}}</option>
                                @endforeach
                            </select>
                            <select name="lessonGrade" id="grades" class="col-xs-10 col-sm-5" style="width: 150px;">
                                <option value="">---年级册别---</option>
                                @foreach($data->grades as $grades)
                                    <option class="grad" value="{{$grades->id}}" @if($data->lessonGrade == $grades->id) selected @endif>{{$grades->gradeName}}</option>
                                @endforeach
                            </select>
                            {{--<select name="lessonChapter" id="chapters" class="col-xs-10 col-sm-5" style="width: 150px;">--}}
                                {{--<option value="">---教材章节---</option>--}}
                                {{--@foreach($data->chapters as $chapters)--}}
                                    {{--<option class="chap" value="{{$chapters->id}}" @if($data->lessonChapter == $chapters->id) selected @endif>{{$chapters->chapterName}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    {{--<div class="space-4"></div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 备课所属科目 </label>--}}

                        {{--<div class="col-sm-9">--}}
                            {{--<input type="text" name="lessonSubject" id="kemu" placeholder="备课所属科目" class="col-xs-10 col-sm-5" value="{{$data->subjectName}}" />--}}
                            {{--<span class="help-inline col-xs-12 col-sm-7">--}}
                                {{--<span class="middle"></span>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    {{--<div class="space-4"></div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 备课素材所属版本 </label>--}}

                        {{--<div class="col-sm-9">--}}
                            {{--<input type="text" name="lessonEdition" id="form-field-1" placeholder="备课素材所属版本" class="col-xs-10 col-sm-5" value="{{$data->editionName}}" />--}}
                            {{--<span class="help-inline col-xs-12 col-sm-7">--}}
                                {{--<span class="middle"></span>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="space-4"></div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 备课素材所属年级 </label>--}}

                        {{--<div class="col-sm-9">--}}
                            {{--<input type="text" name="lessonGrade" id="form-field-1" placeholder="备课素材所属年级" class="col-xs-10 col-sm-5" value="{{$data->gradeName}}" />--}}
                            {{--<span class="help-inline col-xs-12 col-sm-7">--}}
                                {{--<span class="middle"></span>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 章节 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="lessonChapter" id="form-field-1" placeholder="备课素材所属章节" class="col-xs-10 col-sm-5" value="{{$data->chapterName}}" />--}}
                            <select name="lessonChapter" id="chapters" class="col-xs-10 col-sm-5">
                                <option value="">---教材章节---</option>
                                @foreach($data->chapters as $chapters)
                                    <option class="chap" value="{{$chapters->id}}" @if($data->lessonChapter == $chapters->id) selected @endif>{{$chapters->chapterName}}</option>
                                @endforeach
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 浏览次数 </label>

                        <div class="col-sm-9">
                            <input type="text" name="lessonView" id="form-field-1" placeholder="浏览次数" class="col-xs-10 col-sm-5" value="{{$data->lessonView}}" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 点赞次数 </label>

                        <div class="col-sm-9">
                            <input type="text" name="lessonFav" id="form-field-1" placeholder="点赞次数" class="col-xs-10 col-sm-5" value="{{$data->lessonFav}}" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    {{--<div class="space-4"></div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 备课主题计划ID </label>--}}

                        {{--<div class="col-sm-9">--}}
                            {{--<input type="text" name="lessonPlanId" id="form-field-1" placeholder="备课主题计划ID" class="col-xs-10 col-sm-5" value="{{$data->lessonPlanId}}" />--}}
                            {{--<span class="help-inline col-xs-12 col-sm-7">--}}
                                {{--<span class="middle"></span>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 状态 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="status" id="form-field-1" placeholder="备课主题状态" class="col-xs-10 col-sm-5" value="{{$data->status}}" />--}}
                            <select id="form-field-2" class="col-xs-10 col-sm-5" name="status">
                                <option value="0" {{$data->status ? '' : 'selected'}}>正常</option>
                                <option value="1" {{$data->status ? 'selected' : ''}}>锁定</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 所属教研组 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="techResearch" id="form-field-1" placeholder="所属教研组ID" class="col-xs-10 col-sm-5" value="{{$data->techResearch}}" />--}}
                            <select name="techResearch"  id="form-field-1" class="col-xs-10 col-sm-5">
                                @foreach($data->themenames as $tename)
                                    <option value="{{$tename->id}}"@if($data->techResearch == $tename->id) selected @endif>
                                        {{$tename->techResearchName}}
                                    </option>
                                @endforeach
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
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    <script language="javascript" type="text/javascript" src="{{asset('js/DatePicker/WdatePicker.js') }}"></script>


@endsection
@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/research/addSubject.js') }}"></script>
    <script language="javascript" type="text/javascript">
        jQuery(function($) {
            //学科
            $('#sections').change(function () {
                $('#editions').find('.edit').remove();
                $('#grades').find('.grad').remove();
                $('#chapters').find('.chap').remove();
                var sectionid = $('#sections').val();
                $.ajax({
                    type:'get',
                    data:{'id':sectionid},
                    url:'{{url('admin/lesson/subject')}}',
                    success:function(data){
                        var str = '<option value="">---学科---</option>';
                        $.each(data,function(i,val){
                            str += '<option value="'+val.id+'">'+val.subjectName+'</option>';
                        })
                        $('#subjects').html(str);

                    },
                    dataType:'json',
                    'async':false
                });
            })

            //版本
            $('#subjects').change(function () {
                $('#grades').find('.grad').remove();
                $('#chapters').find('.chap').remove();
                var subjectid = $('#subjects').val();
                $.ajax({
                    type:'get',
                    data:{'id':subjectid},
                    url:'{{url('admin/lesson/edition')}}',
                    success:function(data){
                        var str = '<option value="">---版本---</option>';
                        $.each(data,function(i,val){
                            str += '<option class="edit" value="'+val.id+'">'+val.editionName+'</option>';
                        })
                        $('#editions').html(str);

                    },
                    dataType:'json',
                    'async':false
                });
            })

            //年级册别
            $('#editions').change(function () {
                $('#chapters').find('.chap').remove();
                var editionid = $('#editions').val();
                $.ajax({
                    type:'get',
                    data:{'id':editionid},
                    url:'{{url('admin/lesson/grade')}}',
                    success:function(data){
                        var str = '<option value="">---年级册别---</option>';
                        $.each(data,function(i,val){
                            str += '<option class="grad" value="'+val.id+'">'+val.gradeName+'</option>';
                        })
                        $('#grades').html(str);

                    },
                    dataType:'json',
                    'async':false
                });
            })

            //章节
            $('#grades').change(function () {
                var gradeid = $('#grades').val();
                $.ajax({
                    type:'get',
                    data:{'id':gradeid},
                    url:'{{url('admin/lesson/chapter')}}',
                    success:function(data){
                        var str = '<option value="">---教材章节---</option>';
                        $.each(data,function(i,val){
                            str += '<option class="chap" value="'+val.id+'">'+val.chapterName+'</option>';
                        })
                        $('#chapters').html(str);

                    },
                    dataType:'json',
                    'async':false
                });
            })

        })
    </script>
@endsection

