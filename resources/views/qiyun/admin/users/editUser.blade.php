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
                    编辑用户
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form class="form-horizontal" role="form">
                    <input type="hidden" name="id" value="{{ $Rec->id }}"/>
                    <input type="hidden" name="type" value="{{$Rec->type}}"/>
                    <input type="hidden" name="checks" value="{{$Rec->checks}}"/>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">用户名</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="username" readonly placeholder="Username"
                                   class="col-xs-10 col-sm-4" value="{{$Rec->username}}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2">姓名</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-2" name="realname" placeholder="realname"
                                   class="col-xs-10 col-sm-4" value="{{$Rec->realname}}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">邮箱</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-3" name="email" placeholder="Email"
                                   class="col-xs-10 col-sm-4" value="{{$Rec->email}}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">手机号</label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-4" type="text" name="phone" id="form-field-4"
                                   placeholder="Phone" value="{{$Rec->phone}}"/>
                            <div class="space-2"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">性别</label>

                        <div class="col-sm-9">
                            <select id="form-field-5" class="col-xs-10 col-sm-4" name="sex">
                                <option value=" 0" {{$Rec->sex==0 ? 'selected':''}}>男</option>
                                <option value="1" {{$Rec->sex==1 ? 'selected':''}}>女</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-7">用户状态</label>

                        <div class="col-sm-9">
                            <select id="form-field-7" class="col-xs-10 col-sm-4" name="status">
                                <option value="0" {{$Rec->status==0 ? 'selected':''}}>前台注册</option>
                                <option value="1" {{$Rec->status==1 ? 'selected':''}}>后台导入</option>
                            </select>
                            <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-8">身份证号</label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-4" type="text" name="IDcard" id="form-field-8"
                                   placeholder="IDcard" value="{{$Rec->IDcard}}"/>
                            <div class="space-2"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-8">民族</label>

                        <div class="col-sm-9">
                            <select id="nationId" class="col-xs-10 col-sm-4">
                                <option value="">-请选择-</option>
                                @foreach($Rec->nations as $items)
                                    <option value="{{$items->id}}" {{$Rec->nationId==$items->id ? 'selected':''}}>{{$items->nation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{--修改头像--}}
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

                    @if($Rec->type==2)
                        <div class="form-group childNick">
                            <label class="col-sm-3 control-label no-padding-right " id="tit" for="form-field-4">孩子账号</label>
                            @if($Rec->childs)
                                @foreach($Rec->childs as $key => $val)
                                    @if($key == 0)
                                    <div class="col-sm-9 childNick">
                                        <input class="col-xs-10 col-sm-4" name="childNick" type="text" placeholder="childNick" value="{{$val->childNick}}"/>
                                        <button id="addChild" class="childNum " type="button">+</button>  <button class="removeChild childNum disable"  type="button">-</button>
                                        <div style="width: 100%;height: 14px;"></div>
                                    </div>
                                    @else
                                    <div class="col-sm-9 childNick"  style="margin-left:428px;">
                                        <input class="col-xs-10 col-sm-4" name="childNick" type="text" placeholder="childNick" value="{{$val->childNick}}"/>
                                        <button id="addChild" class="childNum disable " type="button">+</button>  <button class="removeChild childNum "  type="button">-</button>
                                        <div style="width: 100%;height: 14px;"></div>
                                    </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="col-sm-9 childNick">
                                    <input class="col-xs-10 col-sm-4" name="childNick" type="text"/>
                                    <button id="addChild" class="childNum" type="button">+</button>  <button class="removeChild childNum disable"  type="button">-</button>
                                    <div style="width: 100%;height: 14px;"></div>
                                </div>
                            @endif

                        </div>
                    @endif

                    @if($Rec->type==3)
                        <div class="form-group" name="stuType">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学生类型 </label>

                            <div class="col-sm-9">

                                <select id="form-field-stuType" class="col-xs-10 col-sm-4">
                                    <option value="">-请选择-</option>
                                    <option value=" 0" {{$Rec->stuType=='0' ? 'selected':''}}>普通生</option>
                                    <option value="1" {{$Rec->stuType=='1' ? 'selected':''}}>统招生</option>
                                    <option value="2" {{$Rec->stuType=='2' ? 'selected':''}}>特长生</option>
                                    <option value="3" {{$Rec->stuType=='3' ? 'selected':''}}>复读生</option>
                                    <option value="4" {{$Rec->stuType=='4' ? 'selected':''}}>借读生</option>
                                </select>
                                <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle"></span>
                                </span>
                            </div>
                        </div>
                    @endif
                    @if($Rec->type==3 || $Rec->type ==1)
                        <div class="form-group" name="province">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 省份 </label>

                            <div class="col-sm-9">

                                @if(\Auth::user()->level() > 6)
                                    <select class="col-xs-10 col-sm-4" id="province">
                                        <option value="" selected>-省份-</option>
                                        @foreach($data as $value)
                                            <option value="{{$value->id}}" {{ $value->id == $Rec->provinceId ? 'selected': '' }}>{{$value->organize_name}}</option>
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

                        <div class="form-group" name="city">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 市区 </label>

                            <div class="col-sm-9">

                                @if(\Auth::user()->level() > 6)
                                    <select class="col-xs-10 col-sm-4 " id="city">
                                        @if($Rec->citys)
                                            <option value="">-市区-</option>
                                            @foreach($Rec->citys as $val)
                                                <option value="{{$val->id}}" {{ $val->id == $Rec->cityId ? 'selected': '' }}>{{$val->city_name}}</option>
                                            @endforeach
                                        @else
                                            <option value="">-市区-</option>
                                        @endif
                                    </select>
                                @endif

                                @if(\Auth::user()->level() == 6)
                                    <select class="col-xs-10 col-sm-4" id="city">
                                        <option value="">-市区-</option>
                                        @foreach($data->cityNames as $val)
                                            <option value="{{$val->id}}" {{ $val->id == $Rec->cityId ? 'selected': '' }}>{{$val->city_name}}</option>
                                        @endforeach
                                    </select>
                                @endif

                                @if(\Auth::user()->level() <= 5)
                                    <input type="text" readonly class="col-xs-10 col-sm-4"
                                           value="{{$data->city_name}}"/>
                                    <input type="hidden" id="city" value="{{$data->cityid}}"/>
                                @endif
                                <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                            </div>
                        </div>

                        <div class="form-group" name="county">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 县区 </label>

                            <div class="col-sm-9">

                                @if(\Auth::user()->level() > 5)
                                    <select class="col-xs-10 col-sm-4 " id="county">
                                        @if($Rec->countys)
                                            <option value="">-县区-</option>
                                            @foreach($Rec->countys as $val)
                                                <option value="{{$val->id}}" {{ $val->id == $Rec->countyId ? 'selected': '' }}>{{$val->county_name}}</option>
                                            @endforeach
                                        @else
                                            <option value="">-县区-</option>
                                        @endif
                                    </select>
                                @endif

                                @if(\Auth::user()->level() == 5)
                                    <select id="county" class="col-xs-10 col-sm-4">
                                        <option value="">-县区-</option>
                                        @foreach($data->countyNames as $val)
                                            <option value="{{$val->id}}" {{ $val->id == $Rec->countyId ? 'selected': '' }}>{{$val->county_name}}</option>
                                        @endforeach
                                    </select>
                                @endif

                                @if(\Auth::user()->level() <= 4)
                                    <input type="text" readonly class="col-xs-10 col-sm-4"
                                           value="{{$data->county_name}}"/>
                                    <input type="hidden" id="county" value="{{$data->countyid}}"/>
                                @endif
                                <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                            </div>
                        </div>

                        <div class="form-group" name="school">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学校 </label>

                            <div class="col-sm-9">

                                @if(\Auth::user()->level() > 4)
                                    <select class="col-xs-10 col-sm-4" id="school">
                                        @if($Rec->schools)
                                            <option value="">-学校-</option>
                                            @foreach($Rec->schools as $val)
                                                <option value="{{$val->id}}" {{ $val->id == $Rec->schoolId ? 'selected': '' }}>{{$val->schoolName}}</option>
                                            @endforeach
                                        @else
                                            <option value="">-学校-</option>
                                        @endif
                                    </select>
                                @endif

                                @if(\Auth::user()->level() == 4)
                                    <select class="col-xs-10 col-sm-4" id="school">
                                        <option value="">-学校-</option>
                                        @foreach($data->schoolNames as $val)
                                            <option value="{{$val->id}}" {{ $val->id == $Rec->schoolId ? 'selected': '' }}>{{$val->schoolName}}</option>
                                        @endforeach
                                    </select>
                                @endif

                                @if(\Auth::user()->level() <= 3)
                                    <input type="text" readonly class="col-xs-10 col-sm-4"
                                           value="{{$data->schoolName}}"/>
                                    <input type="hidden" id="school" value="{{$data->schoolid}}"/>
                                @endif
                                <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                            </div>
                        </div>

                    {{--部门修改--}}
                        @if($Rec->type == 1)
                            <div class="form-group" name="department">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 部门 </label>

                                <div class="col-sm-9">

                                    @if(\Auth::user()->level() > 3)
                                        <select class="col-xs-10 col-sm-4" id="department">
                                            @if($Rec->departs)
                                                <option value="">-部门-</option>
                                                @foreach($Rec->departs as $val)
                                                    <option value="{{$val->id}}" {{ $val->id == $Rec->departId ? 'selected': '' }}>{{$val->departName}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-部门-</option>
                                            @endif
                                        </select>
                                    @endif

                                    @if(\Auth::user()->level() == 3)
                                        <select class="col-xs-10 col-sm-4" id="grade">
                                            <option value="">-部门-</option>
                                            @foreach($data->departNames as $val)
                                                <option value="{{$val->id}}" {{ $val->id == $Rec->departId ? 'selected': '' }}>{{$val->departName}}</option>
                                            @endforeach
                                        </select>
                                    @endif

                                    {{--@if(\Auth::user()->level() <= 2)--}}
                                        {{--<input type="text" readonly class="col-xs-10 col-sm-4"--}}
                                               {{--value="{{$data->gradeName}}"/>--}}
                                        {{--<input type="hidden" id="grade" value="{{$data->gradeid}}"/>--}}
                                    {{--@endif--}}
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle"></span>
                                    </span>
                                </div>

                            </div>
                        @endif
                        <div class="form-group" name="grade">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 年级 </label>

                            <div class="col-sm-9">

                                @if(\Auth::user()->level() > 3)
                                    <select class="col-xs-10 col-sm-4" id="grade">
                                        @if($Rec->grades)
                                            <option value="">-年级-</option>
                                            @foreach($Rec->grades as $val)
                                                <option value="{{$val->id}}" {{ $val->id == $Rec->gradeId ? 'selected': '' }}>{{$val->gradeName}}</option>
                                            @endforeach
                                        @else
                                            <option value="">-年级-</option>
                                        @endif
                                    </select>
                                @endif

                                @if(\Auth::user()->level() == 3)
                                    <select class="col-xs-10 col-sm-4" id="grade">
                                        <option value="">-年级-</option>
                                        @foreach($data->gradeNames as $val)
                                            <option value="{{$val->id}}" {{ $val->id == $Rec->gradeId ? 'selected': '' }}>{{$val->gradeName}}</option>
                                        @endforeach
                                    </select>
                                @endif

                                @if(\Auth::user()->level() <= 2)
                                    <input type="text" readonly class="col-xs-10 col-sm-4"
                                           value="{{$data->gradeName}}"/>
                                    <input type="hidden" id="grade" value="{{$data->gradeid}}"/>
                                @endif
                                <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle"></span>
                                </span>
                            </div>

                        </div>

                        <div class="form-group" name="class">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 班级 </label>
                            <div class="col-sm-9">
                                @if(\Auth::user()->level() > 2)
                                    <select class="col-xs-10 col-sm-4" id="class">
                                        @if($Rec->classes)
                                            <option value="">-班级-</option>
                                            @foreach($Rec->classes as $val)
                                                <option value="{{$val->id}}" {{ $val->id == $Rec->classId ? 'selected': '' }}>{{$val->classname}}</option>
                                            @endforeach
                                        @else
                                            <option value="">-班级-</option>
                                        @endif
                                    </select>
                                @endif

                                @if(\Auth::user()->level() == 2)
                                    <select class="col-xs-10 col-sm-4" id="class">
                                        <option value="">-班级-</option>
                                        @foreach($data->classNames as $val)
                                            <option value="{{$val->id}}" {{ $val->id == $Rec->classId ? 'selected': '' }}>{{$val->classname}}</option>
                                        @endforeach
                                    </select>
                                @endif

                                @if(\Auth::user()->level() <= 1)
                                    <input type="text" readonly class="col-xs-10 col-sm-4"
                                           value="{{$data->classname}}"/>
                                    <input type="hidden" id="class" value="{{$data->classid}}"/>
                                @endif
                                <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                            </div>
                        </div>
                        @if($Rec->type==1)
                            <div class="form-group" name="subject">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学科 </label>

                                <div class="col-sm-9">
                                    @if(\Auth::user()->level() > 2)
                                        <select class="col-xs-10 col-sm-4" id="subject">
                                            @if($Rec->subjects)
                                                <option value="">-学科-</option>
                                                @foreach($Rec->subjects as $val)
                                                    <option value="{{$val->id}}" {{ $val->id == $Rec->subjectId ? 'selected': '' }}>{{$val->subjectName}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-学科-</option>
                                            @endif
                                        </select>
                                    @endif

                                    @if(\Auth::user()->level() == 2)
                                        <select class="col-xs-10 col-sm-4" id="subject">
                                            <option value="">-学科-</option>
                                            @foreach($data->subjectNames as $val)
                                                <option value="{{$val->id}}" {{ $val->id == $Rec->subjectId ? 'selected': '' }}>{{$val->subjectName}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                    <span class="help-inline col-xs-12 col-sm-7">
                                <span class="middle"></span>
                            </span>
                                </div>
                            </div>
                        @endif
                        @if($Rec->type==3)
                            <div class="form-group" name="yearHide">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 年度 </label>

                                <div class="col-sm-9">

                                    @if(\Auth::user()->level() > 3)
                                        <select class="col-xs-10 col-sm-4" id="yearHide">
                                            @if($Rec->reports)
                                                <option value="">-年度-</option>
                                                @foreach($Rec->reports as $val)
                                                    <option value="{{$val->id}}" {{ $val->id == $Rec->reportId ? 'selected': '' }}>{{$val->reportName}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-年度-</option>
                                            @endif
                                        </select>
                                    @endif

                                    @if(\Auth::user()->level() == 3)
                                        <select class="col-xs-10 col-sm-4" id="yearHide">
                                            <option value="">-年度-</option>
                                            @foreach($data->reportNames as $val)
                                                <option value="{{$val->id}}" {{ $val->id == $Rec->reportId ? 'selected': '' }}>{{$val->reportName}}</option>
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

                            <div class="form-group" name="termHide">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学期 </label>

                                <div class="col-sm-9">

                                    @if(\Auth::user()->level() > 2)
                                        <select class="col-xs-10 col-sm-4" id="termHide">
                                            @if($Rec->terms)
                                                <option value="">-学期-</option>
                                                @foreach($Rec->terms as $val)
                                                    <option value="{{$val->id}}" {{ $val->id == $Rec->termId ? 'selected': '' }}>{{$val->termName}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-学期-</option>
                                            @endif
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
                        @endif
                    @endif

                    <div class="space-4"></div>


                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="button" id="btnSub-edit">
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
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>
    <script>
        $(function () {

            //修改头像
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
                'buttonText': '修改头像',
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



            //Ajax提交，发送_token
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            });
            //层级联动（市级）
            $("#province").change(function () {
                $('#city').html('<option value="">-城市-</option>');
                $('#county').html('<option value="">-县区-</option>');
                $('#school').html('<option value="">-学校-</option>');
                $('#department').html('<option value="">-部门-</option>');
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
                        var str = '<option value="">-城市-</option>';
                        var str1 = '<option value="">-学校-</option>';
                        if (result.flag === true) {
//                            console.log(result.city);
                            $.each(result.city, function (i, val) {
                                str += '<option value="' + val.id + '">' + val.city_name + '</option>';
                            })
                            $('#city').html(str);
                        }

                        if (result.status === true) {
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
                $('#department').html('<option value="">-部门-</option>');
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
                $('#department').html('<option value="">-部门-</option>');
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
                $('#department').html('<option value="">-部门-</option>');
                $('#grade').html('<option value="">-年级-</option>');
                $('#class').html('<option value="">-班级-</option>');
                $('#subject').html('<option value="">-学科-</option>');
                $('#yearHide').html('<option value="">-年度-</option>');
                $('#termHide').html('<option value="">-学期-</option>');
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
                        //年级
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
            // 更新用户
            $("#btnSub-edit").click(function () {
                var dataBtn = {};
                dataBtn.id = $("input[name='id']").val();
                dataBtn.type = $("input[name='type']").val();
                dataBtn.checks = $("input[name='checks']").val();
                dataBtn.username = $("#form-field-1").val();
                dataBtn.realname = $("#form-field-2").val();
                dataBtn.email = $("#form-field-3").val();
                dataBtn.phone = $("#form-field-4").val();
                dataBtn.sex = $("#form-field-5").val();
                dataBtn.status = $("#form-field-7").val();
                dataBtn.IDcard = $("#form-field-8").val();
                dataBtn.nationId = $("#nationId").val();
                //家长有孩子账号时
                var childNicks = '';
                var childNick = $("input[name='childNick']");
//                console.log(childNick.length);
                for(var i=0;i<childNick.length;i++){
                    childNicks += childNick[i].value+',';
                }
//                alert(childNicks);
                dataBtn.childNick = childNicks;
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
                    url: "{{url('admin/users/updateUser')}}",
                    data: {"data": JSON.stringify(dataBtn)},
                    dataType: 'json',

                    success: function (result) {
                        alert(result.msg);
                        if (result.status === true) {
                            location.href = "{{url('admin/users/userList')}}";
                        }
                    }
                });
            })

            //添加学生账号
            $('#addChild').click(function(){
                if($(this).parent().siblings('.childNick').size() < 4){
                    var obja = $(this).parent();
                    var objb = obja.clone();
                    objb.css('margin-left','428px');
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
//            $('.removeChild').live('click',function(){
//                var objn = $(this).parent();
//                objn.remove();
//            });
            $('.childNick').on('click','.removeChild',function(){
                var objn = $(this).parent();
                objn.remove();
            });

        })
    </script>
    <script>

    </script>
@endsection