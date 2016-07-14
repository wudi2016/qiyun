@extends('qiyun.layouts.layoutHome')

@section('title', '学生个人主页')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/qiyun/perSpace/stu_setting.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/member/uploadify.css') }}">
    {{--<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">--}}
@endsection

@section('content')
    <div style="height:30px; "></div>
    <div ng-controller="stuPerSpaceCtrl" class="main">
        <div class="main1">
            <!-- 头像-->
            <div class="main1-1">
                <div style="width:120px;height:134px;margin-left:12px;"><img ng-src="{{asset('{[stuInfo.pic]}')}}"
                                                                             style="margin-top:25px;width:119px;height:130px;">
                </div>
            </div>

            <div class="main1-2">
                <div ng-bind="stuInfo.realname + '&nbsp;同学' "></div>
            </div>
            <div class="main1-3">
                <div class="main1-31">
                    <!-- 选项卡-->
                    <div class="main1-32">
                        <li id="teach_hide" name="click_btn_1">个人设置</li>
                        <li name="click_btn_2" ng-click="getMyCollect()">我的收藏</li>
                    </div>
                    <!-- 学生————个人设置 -->
                    <div class="main1-3-1" name="person">
                        @if (session('editMsg'))
                            <div class="main1-33 editMsg" style="clear: both">
                                {{ session('editMsg') }}
                            </div>
                        @endif
                        <div class="main1-33" style="clear: both">
                            <li>基本信息</li>
                        </div>
                        <!-- 正文开始 -->
                        <form action="{{url('/perSpace/editUserInfo')}}" method="post" name="stuForm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="main1-3-11">
                                <!-- part1 -->
                                <div class="main1-3-12">
                                    <!-- left部分 -->
                                    <div class="main1-3-14">
                                        <!-- 账户名 -->
                                        <div class="main1-3-15">
                                            <span class="main1-3-15-1">*账户名</span>
                                            <span class="main1-3-15-2" ng-bind="stuInfo.username"></span>
                                        </div>
                                        <!-- 真实姓名 -->
                                        <div class="main1-3-16">
                                            <span class="main1-3-16-1">*真实姓名</span>
                                            <input type="text" class="main1-3-16-2" ng-model="stuInfo.realname"
                                                   name="realname" size="35" style="height:35px;"/>

                                        </div>

                                        <div class="main1-3-17">
                                            <span class="main1-3-17-1">*学号</span>
                                            <input class="main1-3-17-2" type="text" name="sno"
                                                   ng-model="stuInfo.sno" size="35" style="margin-left:65px;height:35px;"/>


                                        </div>
                                        <!-- 民族 -->
                                        <div class="main1-3-18">
                                            <span class="main1-3-18-1">民族</span>
                                            <select name="nationId" id="">
                                                    <option value="">请选择</option>
                                                @foreach($info->nations as $nation)
                                                    <option value="{{$nation->id}}" ng-selected="stuInfo.nationId == {{$nation->id}}">{{$nation->nation}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- mima -->
                                        {{--<div class="main1-3-17">--}}
                                            {{--<span class="main1-3-17-1">*修改密码</span>--}}
                                            {{--<input class="main1-3-17-2" type="password" name="password"--}}
                                                   {{--placeholder="请输入登录密码" size="35" style="height:35px;"/>--}}
                                            {{--<!-- <span >*密码不能为空</span> -->--}}

                                        {{--</div>--}}
                                        {{--<!-- chongfumima -->--}}
                                        {{--<div class="main1-3-18">--}}
                                            {{--<span class="main1-3-18-1">*重复密码</span>--}}
                                            {{--<input class="main1-3-18-2" type="password" name="password_confirmation"--}}
                                                   {{--placeholder="请确认登录密码" size="35" style="height:35px;"/>--}}
                                        {{--</div>--}}
                                            <!-- <span >*密码不能为空</span> -->
                                        <!-- 性别 -->
                                        <div class="main1-3-19">
                                            <span class="main1-3-19-1">*性别</span>
                                <span class="main1-3-19-2">
                                    <input type="radio" name="sex" value=" 0" ng-checked="stuInfo.sex == 0">男&nbsp;
                                    <input type="radio" name="sex" value="1" ng-checked="stuInfo.sex == 1">女&nbsp;
                                </span>

                                        </div>
                                        <!-- 手机 -->
                                        <div class="main1-3-20">
                                            <span class="main1-3-20-1">*手机</span>
                                            <input class="main1-3-20-2" type="text" name="phone"
                                                   ng-model="stuInfo.phone" size="35" style="height:35px;"/>
                                            <span class="main1-3-20-3"><button type="button" class="bind">修改</button></span>
                                            <span class="main1-error-info"></span>
                                        </div>

                                        <div class="main1-code hide">
                                            <span class="main1-code-text">验证码</span>
                                            <input class="main1-code-input" type="text"
                                                   placeholder="请输入手机验证码" size="35" style="height:35px;"/>
                                            <span class="code-code"></span>
                                        </div>
                                    </div>
                                    <!-- 头像部分 -->
                                    <div class="main1-3-right" style="width:120px;">
                                        <div id="imgs" style="width:119px">
                                            <img width="119px" ng-src="{{asset('{[stuInfo.pic]}')}}">
                                        </div>
                                        <input id="file_upload" name="file_upload" type="file" multiple="true"
                                               value=""/>
                                    </div>
                                </div>
                                <!-- 基本信息 part2 -->
                                <div class="main1-3-13">
                                    <!-- 身份证号 -->
                                    <div class="main1-3-21">
                                        <span class="main1-3-21-1">身份证件号码</span>
                                        @if($info->checks)
                                            <input class="main1-3-21-2" type="text" name="IDcard" ng-model="stuInfo.IDcard" size="35" style="height:35px;"/>
                                        @elseif($info->checks == 0)
                                            <input class="main1-3-21-2" type="text" name="IDcard" ng-model="stuInfo.IDcard" size="35" style="height:35px;" readonly/>
                                        @endif
                                    </div>
                                    <!-- xueshengleixing -->
                                    <div class="main1-3-26">
                                        <span class="main1-3-26-1">学生类型</span>
                                        <select name="stuType" class="main1-3-26-2">
                                            <option value=" 0" ng-selected="stuInfo.stuType == 0">普通学生</option>
                                            <option value="1"  ng-selected="stuInfo.stuType == 1">统招生</option>
                                            <option value="2"  ng-selected="stuInfo.stuType == 2">特长生</option>
                                            <option value="3"  ng-selected="stuInfo.stuType == 3">复读生</option>
                                            <option value="4"  ng-selected="stuInfo.stuType == 4">借读生</option>
                                        </select>

                                    </div>
                                    <!-- 年级 -->
                                    <div class="main1-3-27">
                                        <span class="main1-3-23-1-five">组织机构</span>
                                        {{--<input class="main1-3-23-2-five" type="text" name="grade" ng-model="teaInfo.grade" size="35" style="height:35px;"/>--}}
                                        <select name="provinceId" id="province" style="height:35px; width:100px;">
                                            <option value="">-省份-</option>
                                            @foreach($data as $value)
                                                <option value="{{$value->id}}"  {{ $value->id == $info->provinceId ? 'selected': '' }}>{{$value->organize_name}}</option>{{$value->id}}
                                            @endforeach
                                        </select>

                                        <select name="cityId" id="city" style="height:35px; width:100px;">

                                            @if($info->citys)
                                                <option value="">-市区-</option>
                                                @foreach($info->citys as $value)
                                                    <option value="{{$value->id}}" @if($value->id == $info->cityId){{'selected'}} @endif >{{$value->city_name}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-市区-</option>
                                            @endif

                                        </select>

                                        <img src="{{asset('image/qiyun/perSpace/loading.gif')}}" class="loadingPic hide cityLoading" alt="">

                                        <select name="countyId" id="county" style="height:35px; width:100px;">
                                            @if($info->countys)
                                                <option value="">-县区-</option>
                                                @foreach($info->countys as $value)
                                                    <option value="{{$value->id}}" @if($value->id == $info->countyId){{'selected'}} @endif >{{$value->county_name}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-县区-</option>
                                            @endif

                                        </select>

                                        <img src="{{asset('image/qiyun/perSpace/loading.gif')}}" class="loadingPic hide countyLoading" alt="">

                                    </div>
                                    <!-- 班级 -->
                                    <div class="main1-3-27">
                                        <span class="main1-3-24-1-five">学校班级</span>
                                        <select name="schoolId" id="school" style="height:35px; width:100px;">
                                            @if($info->schools)
                                                <option value="">-学校-</option>
                                                @foreach($info->schools as $value)
                                                    <option value="{{$value->id}}" @if($value->id == $info->schoolId){{'selected'}} @endif >{{$value->schoolName}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-学校-</option>
                                            @endif

                                        </select>

                                        <img src="{{asset('image/qiyun/perSpace/loading.gif')}}" class="loadingPic hide schoolLoading" alt="">

                                        <select name="gradeId" id="grade" style="height:35px; width:100px;">
                                            @if($info->grades)
                                                <option value="">-年级-</option>
                                                @foreach($info->grades as $value)
                                                    <option value="{{$value->id}}" @if($value->id == $info->gradeId){{'selected'}} @endif >{{$value->gradeName}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-年级-</option>
                                            @endif
                                        </select>

                                        <img src="{{asset('image/qiyun/perSpace/loading.gif')}}" class="loadingPic hide gradeLoading" alt="">

                                        <select name="classId" id="class" style="height:35px; width:100px;">
                                            @if($info->classes)
                                                <option value="">-班级-</option>
                                                @foreach($info->classes as $value)
                                                    <option value="{{$value->id}}" @if($value->id == $info->classId){{'selected'}} @endif >{{$value->classname}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-班级-</option>
                                            @endif
                                        </select>

                                        <img src="{{asset('image/qiyun/perSpace/loading.gif')}}" class="loadingPic hide classLoading" alt="">

                                    </div>

                                    <div class="main1-3-27">
                                        <span class="main1-3-24-1-five">年度学期</span>
                                        <select name="reportId" id="reportId" style="height:35px; width:100px;">

                                            @if($info->reports)
                                                <option value="">-年度-</option>
                                                @foreach($info->reports as $value)
                                                    <option value="{{$value->id}}"@if($value->id == $info->reportId){{'selected'}} @endif >{{$value->reportName}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-年度-</option>
                                            @endif
                                        </select>

                                        <img src="{{asset('image/qiyun/perSpace/loading.gif')}}" class="loadingPic hide yearLoading" alt="">

                                        <select name="termId" id="termHide"  style="height:35px; width:100px;">

                                            @if($info->terms)
                                                <option value="">-学期-</option>
                                                @foreach($info->terms as $value)
                                                    <option value="{{$value->id}}" @if($value->id == $info->termId){{'selected'}} @endif >{{$value->termName}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-学期-</option>
                                            @endif
                                        </select>

                                        <img src="{{asset('image/qiyun/perSpace/loading.gif')}}" class="loadingPic hide termLoading" alt="">

                                    </div>

                                    <!-- 家庭住址 -->
                                    <!-- <div class="main1-3-27">
                                       <span class="main1-3-27-1">家庭住址</span>
                                       <span class="main1-3-27-2">北京海淀上地硅谷5号楼</span>
                                   </div> -->
                                    <!-- 修改 -->
                                    <div class="main1-3-23">
                                        <span class="main1-3-23-1"><button id="stubutn">修改</button></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- 正文结束 -->
                    </div>
                    <!-- 学生————我的收藏 -->
                    <div name="shoucang" class="hide">
                        <!-- content开始 -->
                        <!-- 蓝色条 -->
                        <div class="blue_line">
                            <div class="blue_line_1">我的收藏</div>
                            {{--<div class="blue_line_2">>>更多</div>--}}
                        </div>
                        <!-- 空白div -->
                        <div style="height:27px"></div>
                        <!-- 删除 资讯 -->
                        <div class="delete_zx">
                            <form >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="delete_del" ng-if="collect">
                                    <button class="delete_span1" type="button"  ng-click="mutidelCollect()">删除</button>
                                </div>
                                <!-- 核心div -->
                                <div class="core">
                                    <div class="title_1">
                                        <div class="title_1_1"><input type="checkbox" name="checkbox"  ng-click="checkAll(collect)" ng-model="checkall"   class="title_checkbox"></div>
                                        <div class="title_1_2">
                                            <span class="title_span1">名称</span>
                                        </div>
                                        <div class="title_1_3">
                                            <span class="title_span2">类型</span>
                                        </div>

                                        <div class="title_1_6">
                                            <span class="title_span5">时间</span>
                                        </div>
                                        <div class="title_1_7">
                                            <span class="title_span6">操作</span>
                                        </div>
                                    </div>

                                    <!-- --收藏-- -->
                                    <div class="title_2" ng-if="content" ng-repeat="i in collect">
                                        <div class="title_2_1">
                                            <input type="checkbox" name="ids" ng-model="ids[i.id]"  class="title_checkbox1">
                                        </div>
                                        <div class="title_2_2">
                                            {{--<span class="title2_span1"><a href="{[i.url]}" ng-bind="i.title"></a></span>--}}
                                            <span class="title2_span1" ng-click="collectDetail(i.url,i.isdel)" ng-bind="i.title"> </span>
                                        </div>
                                        <div class="title_2_3">
                                            <span class="title2_span2" ng-bind="i.type"></span>
                                        </div>

                                        <div class="title_2_6">
                                            <span class="title2_span5" ng-bind="i.time"></span>
                                        </div>
                                        <div class="title_2_7">
                                            <span class="title2_span7"><a ng-click="delCollect(i.id)">删除</a></span>
                                        </div>
                                    </div>

                                    <div class="spinner" style="float: right; padding:150px 0px;" ng-if="loading">
                                        <div class="bounce1"></div>
                                        <div class="bounce2"></div>
                                        <div class="bounce3"></div>
                                    </div>

                                    <div id="errorMessage" style="padding:150px 0px;" ng-if="reload">数据加载失败，请尝试 <a
                                                ng-click="reloadfunc('collect');">刷新</a> 一下
                                    </div>
                                    <div id="errorMessage" style="padding:150px 0px;" ng-if="errormeg">没有收藏内容，快去 <a
                                                href="">添加收藏</a> 吧
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- content结束 -->

                </div>
                <!-- 通知 -->
                <div class="main1-42">
                    <div class="main1-43">
                        <label><img src="{{asset('image/qiyun/perSpace/12.png')}}" style="margin:-2px 0 -2px 0;"/>&nbsp;&nbsp;消息通知</label>
                    </div>
                    <div class="main1-44">
                        <!-- 通知part-1 -->
                        <div class="main1-45" ng-repeat="m in msg">
                            <div class="main1-45-1" style="margin-top:5px;">
                                <div style="float:left;"><img ng-src="{[m.pic]}" width="50" height="45" /></div>
                                <div class="main1-45-1-1">
                                    <span style="font-size:16px;margin-left:20px" ><strong ng-bind="m.realname"></strong></span>
                                    <span style="font-size:12px;" ng-bind="'创建了' + m.resourceType"></span>
                                    <div class="main1-45-1-2" ng-bind="m.messageTitle"></div>
                                </div>
                                <div class="main1-45-1-3">
                                    <div style="padding:5px;margin-top:10px;">
                                        <div style="margin-left:10px;" ng-bind="'主持人：' + m.author"></div>
                                        <div class="main1-45-1-3-1">
                                            <span style="cursor: pointer" class="main1-45-1-3-2" ng-click="insert(m.id,m.resourceType,m.url,m.resourceCheck);">我要参与</span>
                                        </div>
                                        <div style="margin-left:10px;" ng-bind="'创建时间：' + m.addTime"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>

    <script src="{{ URL::asset('js/qiyun/perSpace/stu_personal.js') }}"></script>
    <script src="{{ URL::asset('js/qiyun/angular/controller/stuPerSpaceController.js') }}"></script>
@endsection
		