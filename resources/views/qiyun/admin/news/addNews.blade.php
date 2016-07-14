@extends('qiyun.layouts.layoutAdmin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                添加资讯
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加资讯
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

                <form action="{{url('admin/news/doAddNews')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新闻标题 </label>

                        <div class="col-sm-9">
                            <input type="text" name="title" id="form-field-1" placeholder="新闻标题" class="col-xs-10 col-sm-5" value="" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新闻描述 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="description" id="form-field-1" placeholder="新闻描述" class="col-xs-10 col-sm-5" value="{{$data->description}}" />--}}
                            <textarea name="description" id="form-field-1" placeholder="新闻描述" class="col-xs-10 col-sm-5" cols="30" rows="10" style="resize: none;"></textarea>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新闻来源 </label>

                        <div class="col-sm-9">
                            <input type="text" name="source" id="form-field-1" placeholder="新闻来源" class="col-xs-10 col-sm-5" value="" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 作者 </label>

                        <div class="col-sm-9">
                            <input type="text" name="author" id="form-field-1" placeholder="作者" class="col-xs-10 col-sm-5" value="" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新闻封面图 </label>

                        <div class="col-sm-9">
                            <img src="/image/qiyun/research/addSubject/back.png" id="uploadPreview" class="col-xs-10 col-sm-5"/>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  </label>

                        <div class="col-sm-9">
                            <input type="file" id="uploadImage" name="pic" onchange="loadImageFile();" style="width:170px;height:40px;position: absolute;top: 0px;opacity: 0;"/>
                            <div class="second_file"><img src="/image/qiyun/research/addSubject/1.png"/></div>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新闻分类 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" name="userId" id="form-field-1" placeholder="新闻分类" class="col-xs-10 col-sm-5" value="{{$data->typeName}}" />--}}
                            <select name="typeId"  id="form-field-1" class="col-xs-10 col-sm-5">
                                @foreach($data as $tename)
                                    <option value="{{$tename->id}}">
                                        {{$tename->typeName}}
                                    </option>
                                @endforeach
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新闻内容 </label>

                        <div class="col-sm-9">
                            <textarea name="content" id="container" cols="50" rows="10"></textarea>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 点击数 </label>

                        <div class="col-sm-9">
                            <input type="text" name="clickNum" id="form-field-1" placeholder="点击数" class="col-xs-10 col-sm-5" value="" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 粉丝数 </label>

                        <div class="col-sm-9">
                            <input type="text" name="favNum" id="form-field-1" placeholder="粉丝数" class="col-xs-10 col-sm-5" value="" />
                            <span class="help-inline col-xs-12 col-sm-7">
                                <label class="middle">
                                    <span class="lbl"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 状态 </label>

                        <div class="col-sm-9">
                            {{--<input type="text" id="form-field-1" placeholder="教研组状态" class="col-xs-10 col-sm-5" value="" />--}}
                            <select id="form-field-2" class="col-xs-10 col-sm-5" name="status">
                                <option value="0">正常</option>
                                <option value="1">锁定</option>
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
    <!-- 配置文件 -->
    <script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>

    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
@endsection
@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/research/addSubject.js') }}"></script>
@endsection