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
                    详情展示
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
                            <input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5"
                                   value="{{$Rec->username}}"/>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">真实姓名：</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" placeholder="realname" class="col-xs-10 col-sm-5"
                                   value="{{$Rec->realname}}"/>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">邮箱：</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-3" name="email" placeholder="Email"
                                   class="col-xs-10 col-sm-5" value="{{$Rec->email}}"/>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 性别： </label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-5" type="text" value="{{$Rec->sex==0 ? '男':'女'}}"/>
                            <div class="space-2"></div>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">手机号：</label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-5" type="text" name="phone" id="form-field-4"
                                   placeholder="Phone" value="{{$Rec->phone}}"/>
                            <div class="space-2"></div>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 审核状态： </label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-5" type="text" value="{{$Rec->checks==0 ? '未审核':'已审核'}}"/>
                            <div class="space-2"></div>
                        </div>

                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 用户状态： </label>

                        <div class="col-sm-9">
                            <input class="col-xs-10 col-sm-5" type="text" value="{{$Rec->status==0 ? '前台注册':'后台导入'}}"
                            />
                            <div class="space-2"></div>
                        </div>

                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 用户身份： </label>

                        <div class="col-sm-9">

                            <select  class="col-xs-10 col-sm-5" style="font-size:14px;">
                                <option value="">@if($Rec->type==3)
                                        {{'学生'}}
                                    @elseif($Rec->type == 1)
                                        {{'教师'}}
                                    @elseif($Rec->type == 2)
                                        {{'家长'}}
                                    @endif</option>

                            </select>
                            <div class="space-2"></div>

                        </div>

                    </div>

                    <div class="space-4"></div>
                    @if($Rec->type==3)
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">学号：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" name="email" placeholder="Sno"
                                       class="col-xs-10 col-sm-5" value="{{$Rec->sno}}"/>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 学生类型： </label>

                                <div class="col-sm-9">
                                    <select id="form-field-5" class="col-xs-10 col-sm-5" style="font-size:14px;">
                                        <option value="">@if($Rec->stuType==0)
                                                {{'普通学生'}}
                                            @elseif($Rec->stuType == 1)
                                                {{'统招生'}}
                                            @elseif($Rec->stuType == 2)
                                                {{'特长生'}}
                                            @elseif($Rec->stuType == 3)
                                                {{'复读生'}}
                                            @elseif($Rec->stuType == 4)
                                                {{'借读生'}}
                                            @endif</option>
                                    </select>
                                </div>
                        </div>

                        <div class="space-4"></div>
                    @endif

                    @if($Rec->type==2)
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">孩子账号：</label>

                            <div class="col-sm-9">
                                @if($Rec->childs)
                                    @foreach($Rec->childs as $val)
                                        <input type="text" style="width:41.66%;" value="{{$val->childNick}}"/>
                                        <div style="width:100%; height: 10px;"></div>
                                    @endforeach
                                @else
                                    <input type="text" class="col-xs-10 col-sm-5" placeholder="childNick" value=""/>
                                @endif
                            </div>
                        </div>

                        <div class="space-4"></div>

                    @endif

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">身份证号：</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-3" name="IDcard" placeholder="IDcard"
                                   class="col-xs-10 col-sm-5" value="{{$Rec->IDcard}}"/>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">民族：</label>

                        <div class="col-sm-9">
                                <input type="text" id="form-field-3" name="nationId" placeholder="nation"
                                       class="col-xs-10 col-sm-5" value="{{$Rec->nationId}}"/>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    @if($Rec->type==1 || $Rec->type==3)
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">省份：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" class="col-xs-10 col-sm-5" value="{{isset($Rec->organize_name)?$Rec->organize_name:''}}"/>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">市区：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" class="col-xs-10 col-sm-5" value="{{isset($Rec->city_name)?$Rec->city_name:''}}"/>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">县区：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" class="col-xs-10 col-sm-5" value="{{isset($Rec->county_name)?$Rec->county_name:''}}"/>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">学校：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" class="col-xs-10 col-sm-5" value="{{isset($Rec->schoolName)?$Rec->schoolName:''}}"/>
                            </div>
                        </div>

                        <div class="space-4"></div>
                        @if($Rec->type == 1)
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">部门：</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-3" class="col-xs-10 col-sm-5" value="{{isset($Rec->departName)?$Rec->departName:''}}"/>
                                </div>
                            </div>

                            <div class="space-4"></div>
                        @endif
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">年级：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" class="col-xs-10 col-sm-5" value="{{isset($Rec->gradeName)?$Rec->gradeName:''}}"/>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">班级：</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-3" class="col-xs-10 col-sm-5" value="{{isset($Rec->classname)?$Rec->classname:''}}"/>
                            </div>
                        </div>

                        <div class="space-4"></div>
                        @if($Rec->type==3)
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">年度：</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-3" class="col-xs-10 col-sm-5" value="{{isset($Rec->reportName)?$Rec->reportName:''}}"/>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">学期：</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-3" class="col-xs-10 col-sm-5" value="{{isset($Rec->termName)?$Rec->termName:''}}"/>
                                </div>
                            </div>

                            <div class="space-4"></div>
                        @endif

                        @if($Rec->type==1)
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">学科：</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-3" class="col-xs-10 col-sm-5" value="{{isset($Rec->subjectName)?$Rec->subjectName:''}}"/>
                                </div>
                            </div>

                            <div class="space-4"></div>
                        @endif

                    @endif

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">创建时间：</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" placeholder="updated_at" class="col-xs-10 col-sm-5"
                                   value="{{$Rec->created_at}}"/>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">修改时间：</label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" placeholder="updated_at" class="col-xs-10 col-sm-5"
                                   value="{{$Rec->updated_at}}"/>
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