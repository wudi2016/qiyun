@extends('qiyun.layouts.layoutAdmin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/member/uploadify.css') }}">
    <style>
        .childNum{
            width:35px;
            height:26px;
            background:#41A6EE;
            border: none;
            color:#ffffff;
            font-weight:bold;
            /*pointer-events: none;*/
            cursor: pointer;
            position:relative;
            top:-3px;
            left:4px;
        }
        .disable{
            background: silver;
            pointer-events: none;
        }
    </style>
@endsection
@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try {
                ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {
            }
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="{{url('admin/index')}}">首页</a>
            </li>
            <li class="active">控制台</li>
        </ul><!-- .breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                                <span class="input-icon">
                                    <input type="text" placeholder="Search ..." class="nav-search-input"
                                           id="nav-search-input" autocomplete="off"/>
                                    <i class="icon-search nav-search-icon"></i>
                                </span>
            </form>
        </div><!-- #nav-search -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                用户管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加用户
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

                <form class="form-horizontal" role="form">
                    <input type="hidden" name="remember_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">用户名</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="username_text" placeholder="Username"
                                   class="col-xs-10 col-sm-4" required/><span
                                    style="display: block;height:30px;line-height: 30px;color:brown;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-6">姓名</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-6" placeholder="Realname" class="col-xs-10 col-sm-4"
                                   required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-6">性别</label>

                        <div class="col-sm-9">

                            <select id="form-field-7" class="col-xs-10 col-sm-4">
                                <option value="">-请选择-</option>
                                <option value="0">男</option>
                                <option value="1">女</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 密码 </label>

                        <div class="col-sm-9">
                            <input type="password" id="form-field-2" placeholder="Password" class="col-xs-10 col-sm-4"/>
                            <span style="display: block;height:30px;line-height: 30px;color:red;" name="checkPass">*必填</span>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">邮箱</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-3" placeholder="Email" class="col-xs-10 col-sm-4"
                                   required/><span
                                    style="display: block;height:30px;line-height: 30px;color:brown;"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">手机号</label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-4" type="text" id="form-field-4" placeholder="Phone"/><span
                                    style="display: block;height:30px;line-height: 30px;color:brown;"></span>
                            <div class="space-2"></div>
                        </div>
                    </div>

                    {{--上传头像--}}
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户头像 </label>
                        <input type="hidden" value="" name="headImg"/>
                        <div class="col-sm-9">
                            <span  id="imgs"></span>
                            <input id="file_upload" name="file_upload" type="file" multiple="true"
                                   value=""/>
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">身份证号</label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-4" type="text" id="form-field-10" placeholder="IDcard"/>
                            <span style="display: block;height:30px;line-height: 30px;color:brown;"></span>
                            <div class="space-2"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">民族</label>

                        <div class="col-sm-9">
                            <select id="nationId" class="col-xs-10 col-sm-4" required>
                                <option value="">-请选择-</option>
                                @foreach($nations as $val)
                                    <option value="{{$val->id}}">{{$val->nation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                    {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-4">备注</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<textarea id="form-field-11" style="width: 41.6%; height: 100px; resize: none;"></textarea>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 用户身份 </label>

                        <div class="col-sm-9">

                            <select id="form-field-5" class="col-xs-10 col-sm-4" required>
                                <option value="">-请选择-</option>
                                <option value="1">教师</option>
                                <option value="2">家长</option>
                                <option value="3">学生</option>
                            </select>
                            <span style="display: block;height:30px;line-height: 30px;color:red;">*必选</span>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group hide" name="sno">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">学号</label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-4" id="form-field-8" type="text" placeholder="Sno"/>
                            <div class="space-2"></div>
                        </div>
                    </div>

                    <div class="form-group hide" name="stuType">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学生类型 </label>

                        <div class="col-sm-9">

                            <select id="form-field-stuType" class="col-xs-10 col-sm-4">
                                <option value="">-请选择-</option>
                                <option value=" 0">普通生</option>
                                <option value="1">统招生</option>
                                <option value="2">特长生</option>
                                <option value="3">复读生</option>
                                <option value="4">借读生</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group hide childNick" name="childNick">
                        <label class="col-sm-3 control-label no-padding-right " id="tit" for="form-field-4">孩子账号</label>
                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-4" name="childNick" type="text" placeholder="childNick"/>
                            <div class="space-2"></div>
                            <button id="addChild" class="childNum" type="button">+</button>  <button class="removeChild childNum disable"  type="button">-</button>
                        </div>
                    </div>

                    <div class="form-group hide" name="province">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 省份 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 6)
                                <select class="col-xs-10 col-sm-4" id="province">
                                    <option value="" selected>-省份-</option>
                                    @foreach($data as $value)
                                        <option value="{{$value->id}}">{{$value->organize_name}}</option>
                                    @endforeach

                                </select>
                            @endif

                            @if(\Auth::user()->level() <= 6)
                                <input type="text" readonly class="col-xs-10 col-sm-4"
                                       value="{{$data->organize_name}}"/>
                                <input type="hidden" name="organizeid" id="province" value="{{$data->organizeid}}"/>
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>


                    <div class="form-group hide" name="city">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 市区 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 6)
                                <select class="col-xs-10 col-sm-4 " id="city">
                                    <option value="">-市区-</option>
                                </select>
                            @endif

                            @if(\Auth::user()->level() == 6)
                                <select class="col-xs-10 col-sm-4" id="city">
                                    <option value="">-市区-</option>
                                    @foreach($data->cityNames as $val)
                                        <option value="{{$val->id}}">{{$val->city_name}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if(\Auth::user()->level() <= 5)
                                <input type="text" readonly class="col-xs-10 col-sm-4" value="{{$data->city_name}}"/>
                                <input type="hidden" id="city" value="{{$data->cityid}}"/>
                            @endif
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group hide" name="county">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 县区 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 5)
                                <select class="col-xs-10 col-sm-4 " id="county">
                                    <option value="">-县区-</option>
                                </select>
                            @endif

                            @if(\Auth::user()->level() == 5)
                                <select id="county" class="col-xs-10 col-sm-4">
                                    <option value="">-县区-</option>
                                    @foreach($data->countyNames as $val)
                                        <option value="{{$val->id}}">{{$val->county_name}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if(\Auth::user()->level() <= 4)
                                <input type="text" readonly class="col-xs-10 col-sm-4" value="{{$data->county_name}}"/>
                                <input type="hidden" id="county" value="{{$data->countyid}}"/>
                            @endif
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group hide" name="school">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学校 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 4)
                                <select class="col-xs-10 col-sm-4" id="school">
                                    <option value="">-学校-</option>
                                </select>
                            @endif

                            @if(\Auth::user()->level() == 4)
                                <select class="col-xs-10 col-sm-4" id="school">
                                    <option value="">-学校-</option>
                                    @foreach($data->schoolNames as $val)
                                        <option value="{{$val->id}}">{{$val->schoolName}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if(\Auth::user()->level() <= 3)
                                <input type="text" readonly class="col-xs-10 col-sm-4" value="{{$data->schoolName}}"/>
                                <input type="hidden" id="school" value="{{$data->schoolid}}"/>
                            @endif
                            <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle"></span>
                                </span>
                        </div>
                    </div>
                    {{--学校部门--}}
                    <div class="form-group hide" name="department">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 部门 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 3)
                                <select class="col-xs-10 col-sm-4" id="department">
                                    <option value="">-部门-</option>
                                </select>
                            @endif

                            @if(\Auth::user()->level() == 3)
                                <select class="col-xs-10 col-sm-4" id="department">
                                    <option value="">-部门-</option>
                                    @foreach($data->departNames as $val)
                                        <option value="{{$val->id}}">{{$val->departName}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if(\Auth::user()->level() == 2)
                                <select class="col-xs-10 col-sm-4" id="department">
                                    <option value="">-部门-</option>
                                    @foreach($data->depart as $val)
                                        <option value="{{$val->id}}">{{$val->departName}}</option>
                                    @endforeach
                                </select>
                            @endif
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>

                    </div>
                    {{--学校部门结束--}}

                    <div class="form-group hide" name="grade">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 年级 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 3)
                                <select class="col-xs-10 col-sm-4" id="grade">
                                    <option value="">-年级-</option>
                                </select>
                            @endif

                            @if(\Auth::user()->level() == 3)
                                <select class="col-xs-10 col-sm-4" id="grade">
                                    <option value="">-年级-</option>
                                    @foreach($data->gradeNames as $val)
                                        <option value="{{$val->id}}">{{$val->gradeName}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if(\Auth::user()->level() <= 2)
                                <input type="text" readonly class="col-xs-10 col-sm-4" value="{{$data->gradeName}}"/>
                                <input type="hidden" id="grade" value="{{$data->gradeid}}"/>
                            @endif
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>

                    </div>

                    <div class="form-group hide" name="class">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 班级 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 2)
                                <select class="col-xs-10 col-sm-4" id="class">
                                    <option value="">-班级-</option>
                                </select>
                            @endif

                            @if(\Auth::user()->level() == 2)
                                <select class="col-xs-10 col-sm-4" id="class">
                                    <option value="">-班级-</option>
                                    @foreach($data->classNames as $val)
                                        <option value="{{$val->id}}">{{$val->classname}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if(\Auth::user()->level() <= 1)
                                <input type="text" readonly class="col-xs-10 col-sm-4" value="{{$data->classname}}"/>
                                <input type="hidden" id="class" value="{{$data->classid}}"/>
                            @endif
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group hide" name="yearHide">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 年度 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 3)
                                <select class="col-xs-10 col-sm-4" id="yearHide">
                                    <option value="">-年度-</option>
                                </select>
                            @endif

                            @if(\Auth::user()->level() == 3)
                                <select class="col-xs-10 col-sm-4" id="yearHide">
                                    <option value="">-年度-</option>
                                    @foreach($data->reportNames as $val)
                                        <option value="{{$val->id}}">{{$val->reportName}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if(\Auth::user()->level() < 3)
                                <input type="text" class="col-xs-10 col-sm-4" placeholder="请输入您所在年度"/>
                                {{--<input type="hidden" id="termHide" value="{{$arr->reportid}}" />--}}
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle"></span>
                                </span>
                        </div>
                    </div>

                    <div class="form-group hide" name="termHide">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学期 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 2)
                                <select class="col-xs-10 col-sm-4" id="termHide">
                                    <option value="">-学期-</option>
                                </select>
                            @endif

                            @if(\Auth::user()->level() <= 2)
                                <input type="text" class="col-xs-10 col-sm-4" value="" placeholder="请输入您所在学期"/>
                            @endif
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group hide" name="subject">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学科 </label>

                        <div class="col-sm-9">
                            @if(\Auth::user()->level() > 2)
                                <select class="col-xs-10 col-sm-4" id="subject">
                                    <option value="">-学科-</option>
                                </select>
                            @endif

                            @if(\Auth::user()->level() == 2)
                                <select class="col-xs-10 col-sm-4" id="subject">
                                    <option value="">-学科-</option>
                                    @foreach($data->subjectNames as $val)
                                        <option value="{{$val->id}}">{{$val->subjectName}}</option>
                                    @endforeach
                                </select>
                            @endif

                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>


                    <div class="space-4"></div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="button" id="btnSub">
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

                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('js/jquery.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>

    <script>
        $(function () {
            //上传头像
            var uploadify_onSelectError = function(file, errorCode, errorMsg) {
                var msgText = "上传失败\n";
                switch (errorCode) {
                    case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
                        //this.queueData.errorMsg = "每次最多上传 " + this.settings.queueSizeLimit + "个文件";
                        msgText += "每次最多上传 " + this.settings.queueSizeLimit + "个文件";
                        break;
                    case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
                        msgText += "文件大小超过限制( " + this.settings.file_size_limit + " )";
                        break;
                    case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
                        msgText += "文件大小为0";
                        break;
                    case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
                        msgText += "文件格式不正确，仅限 " + this.settings.file_types;
                        break;
                    default:
                        msgText += "错误代码：" + errorCode + "\n" + errorMsg;
                }
                alert(msgText);
            };


            var img = '';
            var headImg = '';

            $('#file_upload').uploadify({
                'swf': '/image/qiyun/member/register/uploadify.swf',
                'uploader': '/admin/users/addImg',
                'buttonText': '头像上传',
                'file_size_limit' : '5MB',
                'file_types': " *.jpg;*.png;*.jpeg;*.bmp;*.pdf;*.ico;*.gif ",
                'overrideEvents'  : ['onSelectError'],
                'onSelectError' : uploadify_onSelectError,
                'post_params' : {
                    '_token' : $('meta[name="csrf-token"]').attr('content')
                },
                'onUploadSuccess': function (file, data, response) {
//                     alert(data);
                    // img = "<img width='89px' style='margin:10px auto;' src='" + data + "'> <input  type='hidden' name='pic' value='" + data + "'>";
                    img = "<img width='89px' style='margin:10px auto;' src='" + data + "'>";

                    $('#imgs').html(img);
                    headImg = data;

                }

            });

            //当注册用户什么不同时，分别显示其对应项
            $("#form-field-5").change(function () {
                if ($("#form-field-5").val() === '') {
                    $("div[name='sno']").addClass('hide');
                    $("div[name='province']").addClass('hide');
                    $("div[name='city']").addClass('hide');
                    $("div[name='county']").addClass('hide');
                    $("div[name='school']").addClass('hide');
                    $("div[name='grade']").addClass('hide');
                    $("div[name='class']").addClass('hide');
                    $("div[name='subject']").addClass('hide');
                    $("div[name='yearHide']").addClass('hide');
                    $("div[name='termHide']").addClass('hide');
                    $("div[name='childNick']").addClass('hide');
                    $("div[name='stuType']").addClass('hide');
                    $("div[name='department']").addClass('hide');
                } else {
                    if ($("#form-field-5").val() == 3) {
                        $("div[name='sno']").removeClass('hide');
                        $("div[name='province']").removeClass('hide');
                        $("div[name='city']").removeClass('hide');
                        $("div[name='county']").removeClass('hide');
                        $("div[name='school']").removeClass('hide');
                        $("div[name='class']").removeClass('hide');
                        $("div[name='grade']").removeClass('hide');
                        $("div[name='yearHide']").removeClass('hide');
                        $("div[name='termHide']").removeClass('hide');
                        $("div[name='stuType']").removeClass('hide');
                        $("div[name='subject']").addClass('hide');
                        $("div[name='department']").addClass('hide');
                    } else if ($("#form-field-5").val() == 1) {
                        $("div[name='province']").removeClass('hide');
                        $("div[name='city']").removeClass('hide');
                        $("div[name='county']").removeClass('hide');
                        $("div[name='school']").removeClass('hide');
                        $("div[name='class']").removeClass('hide');
                        $("div[name='grade']").removeClass('hide');
                        $("div[name='subject']").removeClass('hide');
                        $("div[name='department']").removeClass('hide');
                        $("div[name='yearHide']").addClass('hide');
                        $("div[name='termHide']").addClass('hide');
                        $("div[name='sno']").addClass('hide');
                        $("div[name='stuType']").addClass('hide');
                    } else {
                        $("div[name='sno']").addClass('hide');
                        $("div[name='province']").addClass('hide');
                        $("div[name='city']").addClass('hide');
                        $("div[name='county']").addClass('hide');
                        $("div[name='school']").addClass('hide');
                        $("div[name='class']").addClass('hide');
                        $("div[name='grade']").addClass('hide');
                        $("div[name='subject']").addClass('hide');
                        $("div[name='yearHide']").addClass('hide');
                        $("div[name='termHide']").addClass('hide');
                        $("div[name='stuType']").addClass('hide');
                        $("div[name='department']").addClass('hide');
                    }

                    if ($("#form-field-5").val() == 2) {
                        $("div[name='childNick']").removeClass('hide');
                    } else {
                        $("div[name='childNick']").addClass('hide');
                    }
                }


            });


            //Ajax提交，发送_token
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            });
            //初始化错误状态值
            var flag = false;
            //验证用户名唯一
            $("#form-field-1").blur(function () {
                var username = $(this).val();
                if(!/^[a-zA-Z0-9]{5,24}$/.test(username) || username == '') {
                    $(this).next().html('用户名应为5-24位字母或数字！');
                    flag = true;
                }else{
                    $.ajax({
                        type: "post",
                        url: "{{url('admin/users/checkUsername')}}",
                        data: 'username_text=' + username,
                        dataType: 'json',

                        success: function (data) {
                            var str = '';
                            if (data.flag === true) {
                                str += data.meg;
                                flag = true;
                            }else{
                                flag = false;
                            }
                            $("#form-field-1").next().html(str);
                        }
                    })
                }
            })

            //验证邮箱唯一
            $("#form-field-3").blur(function () {
                var email = $(this).val();
                if (!/^\w+((-\w+)|(\.\w+))*@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/.test(email) || email == '') {
                    $(this).next().html('邮箱格式不符合规则！');
                    flag = true;
                } else {
                    $.ajax({
                        type: "post",
                        url: "{{url('admin/users/checkEmail')}}",
                        data: 'email=' + email,
                        dataType: 'json',

                        success: function (data) {
                            var str = '';
                            if (data.flag === true) {
                                str += data.meg;
                                flag = true;
                            }else{
                                flag = false;
                            }
                            $("#form-field-3").next().html(str);
                        }
                    })
                }

            })

            //验证手机号唯一
            $("#form-field-4").blur(function () {
                var phone = $(this).val();
                if (!phone.match(/^[1][358][0-9]{9}$/) && !phone.match(/^[1][7][07][0-9]{8}$/) || phone == '') {
                    $(this).next().html('手机号不符合规则！');
                    flag = true;
                } else {
                    $.ajax({
                        type: "post",
                        url: "{{url('admin/users/checkPhone')}}",
                        data: 'phone=' + phone,
                        dataType: 'json',

                        success: function (data) {
                            var str = '';
                            if (data.flag === true) {
                                str += data.meg;
                                flag = true;
                            }else{
                                flag = false;
                            }
                            $("#form-field-4").next().html(str);
                        }
                    })
                }

            })

            //验证身份证号
            $("#form-field-10").blur(function () {
                var IDcard = $(this).val();
                if (!IDcard.match(/^[1-9]\d{7}\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X|x)$/) || IDcard == '') {
                    $(this).next().html('身份证号码不正确！');
                    flag = true;
                } else {
                    $.ajax({
                        type: "post",
                        url: "{{url('admin/users/checkIDcard')}}",
                        data: 'IDcard=' + IDcard,
                        dataType: 'json',

                        success: function (data) {
                            var str = '';
                            if (data.flag === true) {
                                str += data.meg;
                                flag = true;
                            }else{
                                flag = false;
                            }
                            $("#form-field-10").next().html(str);
                        }
                    })
                }
            })
            //层级联动（市级）
            $("#province").change(function () {

                    $('#city').html('<option value="">-市区-</option>');
                    $('#county').html('<option value="">-县区-</option>');
                    $('#school').html('<option value="">-学校-</option>');
                    $('#grade').html('<option value="">-年级-</option>');
                    $('#class').html('<option value="">-班级-</option>');
                    $('#subject').html('<option value="">-学科-</option>');
                    $('#yearHide').html('<option value="">-年度-</option>');
                    $('#termHide').html('<option value="">-学期-</option>');

                var provinceId = $("#province").val();

                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/province')}}",
                    data: 'provinceId=' + provinceId,
                    dataType: 'json',

                    success: function (result) {
                        var str = '<option value="">-市区-</option>';
                        var str1 = '<option value="">-学校-</option>';
                        if (result.flag === true) {
//                            console.log(result.city);
                            $.each(result.city, function (i, val) {
                                str += '<option value="' + val.id + '">' + val.city_name + '</option>';
                            })
                            $('#city').html(str);
                        }

                        if (result.status === true) {
//                            console.log(result.city);

                            $.each(result.school, function (i, val) {
                                str1 += '<option value="' + val.schoolId + '">' + val.schoolName + '</option>';
                            })
                            $('#school').html(str1);
                        }
                    }
                });
            })
            //市级联动
            $("#city").change(function () {

                $('#county').html('<option value="">-县区-</option>');
                $('#school').html('<option value="">-学校-</option>');
                $('#grade').html('<option value="">-年级-</option>');
                $('#class').html('<option value="">-班级-</option>');
                $('#subject').html('<option value="">-学科-</option>');
                $('#yearHide').html('<option value="">-年度-</option>');
                $('#termHide').html('<option value="">-学期-</option>');
                var cityId = $("#city").val();
                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/city')}}",
                    data: 'cityId=' + cityId,
                    dataType: 'json',

                    success: function (data) {
                        var str = '<option value="">-县区-</option>';
                        var str1 = '<option value="">-学校-</option>';
                        if (data.flag === true) {
//                            console.log(data.county);
                            $.each(data.county, function (i, val) {
                                str += '<option value="' + val.id + '">' + val.county_name + '</option>';
                            })
                            $('#county').html(str);

                        }

                        if (data.status === true) {
                            $.each(data.school, function (i, val) {
                                str1 += '<option value="' + val.schoolId + '">' + val.schoolName + '</option>';
                            })
                            $('#school').html(str1);
                        }
                    }
                });
            })
            //县区联动
            $("#county").change(function () {
                $('#school').html('<option value="">-学校-</option>');
                $('#grade').html('<option value="">-年级-</option>');
                $('#class').html('<option value="">-班级-</option>');
                $('#subject').html('<option value="">-学科-</option>');
                $('#yearHide').html('<option value="">-年度-</option>');
                $('#termHide').html('<option value="">-学期-</option>');
                var countyId = $("#county").val();

                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/county')}}",
                    data: 'countyId=' + countyId,
                    dataType: 'json',

                    success: function (result) {
                        var str = '<option value="">-学校-</option>';
                        if (result.status === true) {
                            $.each(result.school, function (i, val) {
                                str += '<option value="' + val.schoolId + '">' + val.schoolName + '</option>';
                            })
                            $('#school').html(str);
                        }
                    }
                });
            })

            //县区联动
            $("#school").change(function () {
                $('#grade').html('<option value="">-年级-</option>');
                $('#class').html('<option value="">-班级-</option>');
                $('#subject').html('<option value="">-学科-</option>');
                $('#yearHide').html('<option value="">-年度-</option>');
                $('#termHide').html('<option value="">-学期-</option>');
                $('#department').html('<option value="">-部门-</option>');
                var schoolId = $("#school").val();
                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/school')}}",
                    data: 'schoolId=' + schoolId,
                    dataType: 'json',

                    success: function (result) {
                        var str = '<option value="">-年级-</option>';
                        var str1 = '<option value="">-年度-</option>';
                        var str2 = '<option value="">-部门-</option>';
                        //学校
                        if (result.flag === true) {
                            $.each(result.grade, function (i, val) {
                                str += '<option value="' + val.gradeId + '">' + val.gradeName + '</option>';
                            })
                            $('#grade').html(str);
                        }
                        //年度
                        if (result.status === true) {

                            $.each(result.report, function (i, val) {
                                str1 += '<option value="' + val.id + '">' + val.reportName + '</option>';
                            })
                            $('#yearHide').html(str1);
                        }
                        //部门
                        if (result.stat === true) {

                            $.each(result.depart, function (i, val) {
                                str2 += '<option value="' + val.id + '">' + val.departName + '</option>';
                            })
                            $('#department').html(str2);
                        }
                    }
                });
            })

            //年度联动
            $("#yearHide").change(function () {
                $('#termHide').html('<option value="">-学期-</option>');
                var yearId = $("#yearHide").val();
                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/report')}}",
                    data: 'yearId=' + yearId,
                    dataType: 'json',

                    success: function (result) {
                        var str = '<option value="">-学期-</option>';
                        if (result.status === true) {
                            $.each(result.term, function (i, val) {
                                str += '<option value="' + val.id + '">' + val.termName + '</option>';
                            })
                            $('#termHide').html(str);
                        }
                    }
                });
            })

            //年级联动
            $("#grade").change(function () {
                $('#class').html('<option value="">-班级-</option>');
                $('#subject').html('<option value="">-学科-</option>');
                var gradeId = $("#grade").val();
                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/grade')}}",
                    data: 'gradeId=' + gradeId,
                    dataType: 'json',

                    success: function (result) {
                        var str = '<option value="">-班级-</option>';
                        var str1 = '<option value="">-学科-</option>';
                        if (result.flag === true) {
                            $.each(result.schoolclass, function (i, val) {
                                str += '<option value="' + val.schoolclassId + '">' + val.schoolclassName + '</option>';
                            })
                            $('#class').html(str);
                        }

                        if (result.status === true) {
                            $.each(result.subject, function (i, val) {
                                str1 += '<option value="' + val.subjectId + '">' + val.subjectName + '</option>';
                            })
                            $('#subject').html(str1);
                        }
                    }
                });
            })

            // 判断状态值
            if(flag) return;
            //获取数据，发送给控制器处理，并处理返回信息
            $("#btnSub").click(function () {
                var username = $("#form-field-1").val();
                var email = $("#form-field-3").val();
                var phone = $("#form-field-4").val();
                var IDcard = $("#form-field-10").val();
                //验证用户名规则
                    if(!/^[a-zA-Z0-9]{5,24}$/.test(username) || username == '') {
                        flag = true;
                    }

                //验证邮箱规则
                    if (!/^\w+((-\w+)|(\.\w+))*@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/.test(email) || email == '') {
                        flag = true;
                    }

                //验证手机号规则
                    if (!phone.match(/^[1][358][0-9]{9}$/) && !phone.match(/^[1][7][07][0-9]{8}$/) || phone == '') {
                        flag = true;
                    }


                //验证身份证号
                    if (!IDcard.match(/^[1-9]\d{7}\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X|x)$/) || IDcard == '') {
                        flag = true;
                    }

                if(flag)  return;

                var dataBtn = {};
//                dataBtn.remember_token = $("input[name='remember_token']").val();
                dataBtn.username = $("#form-field-1").val();
                dataBtn.realname = $("#form-field-6").val();
                dataBtn.sex = $("#form-field-7").val();
                dataBtn.password = $("#form-field-2").val();
                dataBtn.email = $("#form-field-3").val();
                dataBtn.phone = $("#form-field-4").val();
                dataBtn.type = $("#form-field-5").val();
                dataBtn.sno = $("#form-field-8").val();
                //家长有孩子账号时
                var childNicks = '';
                var childNick = $("input[name='childNick']");
//                console.log(childNick.length);
                for(var i=0;i<childNick.length;i++){
                    childNicks += childNick[i].value+',';
                }
                dataBtn.childNick = childNicks;
                dataBtn.IDcard = $("#form-field-10").val();
                dataBtn.nationId = $("#nationId").val();
                dataBtn.provinceId = $("#province").val();
                dataBtn.cityId = $("#city").val();
                dataBtn.countyId = $("#county").val();
                dataBtn.schoolId = $("#school").val();
                dataBtn.departId = $("#department").val();
                dataBtn.gradeId = $("#grade").val();
                dataBtn.reportId = $("#yearHide").val();
                dataBtn.classId = $("#class").val();
                dataBtn.termId = $("#termHide").val();
                dataBtn.subjectId = $("#subject").val();
                dataBtn.stuType = $("#form-field-stuType").val();
                dataBtn.pic = headImg;




                $.ajax({
                    type: "post",
                    url: "{{url('admin/users/insertUser')}}",
                    data: {"data": JSON.stringify(dataBtn)},
                    dataType: 'json',

                    success: function (data) {
                        alert(data.msg);
                        if (data.status === true) {
                            window.location.href = "userList";
                        }
                    }
                });
            })


            //添加学生账号
            $('#addChild').click(function(){
                if($(this).parent().parent().siblings('.childNick').size() < 4){
                    var obja = $(this).parent().parent();
                    var objb = obja.clone();
                    objb.find('.removeChild').removeClass('disable');
                    objb.find('#addChild').addClass('disable');
                    objb.find('input[type=text]').val(' ');
                    obja.after(objb);
                    objb.find('#tit').html(' ');
                }else{
                    return false;
                }
            });

            //删除学生账号
            $('.removeChild').live('click',function(){
                var objn = $(this).parents('.childNick');
                objn.remove();
            });



        })
    </script>
@endsection
