@extends('qiyun.layouts.layoutAdmin')
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
                    个人详情
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">用户名：</label>

                        <div class="col-sm-9">
                            <input type="text" readonly class="col-xs-10 col-sm-5"
                                   value="{{\Auth::user()->username}}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">真实姓名：</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" readonly placeholder="realname" class="col-xs-10 col-sm-5"
                                   value="{{\Auth::user()->realname}}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">邮箱：</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-3" readonly class="col-xs-10 col-sm-5" value="{{\Auth::user()->email}}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 性别： </label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-5" type="text" readonly value="@if(\Auth::user()->sex==0) 男 @elseif(\Auth::user()->sex==1) 女 @endif"/>
                            <div class="space-2"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">手机号：</label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-5" readonly  type="text" name="phone" id="form-field-4"
                                   placeholder="Phone" value="{{\Auth::user()->phone}}"/>
                            <div class="space-2"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 审核状态： </label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-5" readonly  type="text" value="@if(\Auth::user()->checks==0) 未审核 @elseif(\Auth::user()->checks==1) 已审核 @endif "/>
                            <div class="space-2"></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 用户状态： </label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-5" readonly  type="text" value="@if(\Auth::user()->status==0) 前台注册 @elseif(\Auth::user()->status==1) 后台导入 @endif"
                            />
                            <div class="space-2"></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 用户身份： </label>

                        <div class="col-sm-9">
                            <input type="text" readonly  name="" placeholder=""
                                   class="col-xs-10 col-sm-5" value="@if(\Auth::user()->type == 1) 教师 @elseif(\Auth::user()->type == 2) 家长 @elseif(\Auth::user()->type == 3) 学生 @endif"/>
                            <div class="space-2"></div>

                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">身份证号：</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-3" readonly  name="IDcard" placeholder="IDcard"
                                   class="col-xs-10 col-sm-5" value="{{\Auth::user()->IDcard}}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">民族：</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-3" readonly  name="IDcard" placeholder="nation"
                                   class="col-xs-10 col-sm-5" value="{{(\Auth::user()->nationId?\Auth::user()->nationId:'').'&nbsp;&nbsp;'}}{{\Auth::user()->nations ? \Auth::user()->nations->nation:''}}"/>
                        </div>
                    </div>

                    @if(\Auth::user()->type==1)
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">省份：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" readonly  class="col-xs-10 col-sm-5" value="{{(\Auth::user()->provinceId?\Auth::user()->provinceId:'').'&nbsp;&nbsp;'}}{{\Auth::user()->organizes ? \Auth::user()->organizes->organize_name:''}}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">市区：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" readonly  class="col-xs-10 col-sm-5" value="{{(\Auth::user()->cityId?\Auth::user()->cityId:'').'&nbsp;&nbsp;'}}{{\Auth::user()->citys ? \Auth::user()->citys->city_name:''}}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">县区：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" readonly  class="col-xs-10 col-sm-5" value="{{(\Auth::user()->countyId?\Auth::user()->countyId:'').'&nbsp;&nbsp;'}}{{\Auth::user()->countys ? \Auth::user()->countys->county_name:''}}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">学校：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" readonly  class="col-xs-10 col-sm-5" value="{{(\Auth::user()->schoolId?\Auth::user()->schoolId:'').'&nbsp;&nbsp;'}}{{\Auth::user()->schools ? \Auth::user()->schools->schoolName:''}}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">部门：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" readonly  class="col-xs-10 col-sm-5" value="{{(\Auth::user()->departId?\Auth::user()->departId:'').'&nbsp;&nbsp;'}}{{\Auth::user()->departs ? \Auth::user()->departs->departName:''}}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">年级：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" readonly  class="col-xs-10 col-sm-5" value="{{(\Auth::user()->gradeId?\Auth::user()->gradeId:'').'&nbsp;&nbsp;'}}{{\Auth::user()->grades ? \Auth::user()->grades->gradeName:''}}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">班级：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" readonly  class="col-xs-10 col-sm-5" value="{{(\Auth::user()->classId?\Auth::user()->classId:'').'&nbsp;&nbsp;'}}{{\Auth::user()->classes ? \Auth::user()->classes->classname:''}}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">学科：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" readonly  class="col-xs-10 col-sm-5" value="{{(\Auth::user()->subjectId?\Auth::user()->subjectId:'').'&nbsp;&nbsp;'}}{{\Auth::user()->subjects ? \Auth::user()->subjects->subjectName:''}}"/>
                            </div>
                        </div>

                    @endif

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">创建时间：</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" readonly  placeholder="created_at" class="col-xs-10 col-sm-5"
                                   value="{{\Auth::user()->created_at}}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">修改时间：</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" readonly  placeholder="updated_at" class="col-xs-10 col-sm-5"
                                   value="{{\Auth::user()->updated_at}}"/>
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <a href="{{url('admin/users/userList')}}" class="btn btn-info" style="margin-left:150px;">
                                <i class="icon-ok bigger-110"></i>
                                返回首页
                            </a>
                        </div>
                    </div>

                </form>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection