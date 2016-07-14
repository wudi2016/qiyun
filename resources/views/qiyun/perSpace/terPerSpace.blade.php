@extends('qiyun.layouts.layoutHome')

@section('title', '教师个人主页')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/qiyun/perSpace/teacher_personal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/member/uploadify.css') }}">
@endsection

@section('content')
    <div style="height:30px; "></div>
    <div class="main" ng-controller="teaPerSpaceCtrl">
        <div class="main1">
            <!-- 头像-->
            <div class="main1-1">
                <div style="width:120px;height:133px;margin-left:12px;">
                    <!-- <img src="{{asset('image/qiyun/perSpace/3.png')}}" style="margin-top:15px;"> -->
                    <img src="{{asset('{[teaInfo.pic]}')}}" width="120" height="130" style="margin-top:16px;"/>
                </div>
                <div class="main1-11">
                    <li style="border-right:1px solid #2A86DB;"><label>{{$info->tech}}</label><br>教研数</li>
                    <li style="border-right:1px solid #2A86DB;"><label>{{$info->resource}}</label><br>资源数</li>
                    <li><label>{{$info->microLesson}}</label><br>微课数</li>
                </div>
            </div>


            <div class="main1-2" ng-bind="teaInfo.realname + '&nbsp;老师'"></div>
            <div class="main1-3">
                <div class="main1-31">
                    <!-- 选项卡-->
                    <div id="selectMenu" class="main1-32">
                        <li id="teach_hide" name="click_btn_1">个人设置</li>
                        <li name="click_btn_2" ng-click="getMyRes()">我的资源</li>
                        <li name="click_btn_3" ng-click="getMyMic()">我的微课</li>
                        <li name="click_btn_4" ng-click="getMyCollect()">我的收藏</li>
                        <li name="click_btn_5" ng-click="getMyCourse()">我的教研</li>
                        <li name="click_btn_6">我的消息</li>
                    </div>
                    <!-- 个人设置————教师 -->
                    <div class="main1-3-1-five" name="selectName">
                        <div class="main1-33-five" style="clear: both">
                            <li>基本信息</li>
                        </div>
                        <!-- 正文开始 -->
                        <form action="{{url('/perSpace/editUserInfo')}}" method="post" name="teaForm">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="main1-3-11-five">
                                <!-- part1 -->
                                <div class="main1-3-12-five">
                                    <!-- left部分 -->
                                    <div class="main1-3-14-five">
                                        <!-- 账户名 -->
                                        <div class="main1-3-15-five">
                                            <span class="main1-3-15-1-five">*账户名</span>
                                            <span class="main1-3-15-2-five" ng-bind="teaInfo.username"></span>
                                        </div>
                                        <!-- 真实姓名 -->
                                        <div class="main1-3-16-five">
                                            <span class="main1-3-16-1-five">*真实姓名</span>
                                            <input name="realname" class="main1-3-16-2-five"
                                                   ng-model="teaInfo.realname">
                                            <!-- <select name="minzu" class="main1-3-16-3-five">
                                                <option value="">汉族</option>
                                            </select> -->

                                        </div>
                                        {{--<!-- mima -->--}}
                                        {{--<div class="main1-3-17-five">--}}
                                        {{--<span class="main1-3-17-1-five">*修改密码</span>--}}
                                        {{--<input class="main1-3-17-2-five" type="password" name="password"--}}
                                        {{--placeholder="请输入登录密码" size="35" style="height:35px;"/>--}}

                                        {{--</div>--}}
                                        {{--<!-- chongfumima -->--}}
                                        {{--<div class="main1-3-18-five">--}}
                                        {{--<span class="main1-3-18-1-five">*重复修改密码</span>--}}
                                        {{--<input class="main1-3-18-2-five" type="password"--}}
                                        {{--name="password_confirmation"--}}
                                        {{--placeholder="请确认登录密码" size="35" style="height:35px;"/>--}}

                                        {{--</div>--}}
                                        <div class="main1-3-17">
                                            <span class="main1-3-17-1">民族</span>
                                            <select name="nationId" id="">
                                                <option value="">请选择</option>
                                                @foreach($info->nations as $nation)
                                                    <option value="{{$nation->id}}"
                                                            ng-selected="teaInfo.nationId == {{$nation->id}}">{{$nation->nation}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- 性别 -->
                                        <div class="main1-3-19-five">
                                            <span class="main1-3-19-1-five">*性别</span>
                                            <span class="main1-3-19-2-five">
                                                <input type="radio" name="sex" value=" 0" ng-checked="teaInfo.sex == 0">男&nbsp;
                                                <input type="radio" name="sex" value="1" ng-checked="teaInfo.sex == 1">女&nbsp;
                                                {{--<input type="radio" name="sex" value="2" ng-checked="teaInfo.sex == 2">保密--}}
                                            </span>

                                        </div>
                                        <!-- 手机 -->
                                        <div class="main1-3-20-five">
                                            <span class="main1-3-20-1-five">*手机</span>
                                            <input class="main1-3-20-2-five" type="text" name="phone"
                                                   ng-model="teaInfo.phone" size="35" style="height:35px;"/>
                                            <span class="main1-3-20-3-five"><button type="button" class="bind">修改
                                                </button></span>
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
                                    <div class="main1-3-right-five" style="width:120px;">
                                        <!-- <div class="main1-3-right-1-five">
                                             <img src="{{asset('image/qiyun/perSpace/3-3.png')}}"/>
                                        </div>
                                        <div class="main1-3-right-2-five"><a href="#">上传照片</a></div> -->
                                        <div id="imgs" style="width:119px">
                                            <img width="120" height="130" style="margin-top:15px;"
                                                 ng-src="{{asset('{[teaInfo.pic]}')}}">
                                        </div>
                                        <input id="file_upload" name="file_upload" type="file" multiple="true"
                                               value=""/>
                                    </div>

                                </div>
                                <!-- 基本信息 part2 -->
                                <div class="main1-3-13-five">
                                    <!-- 身份证号 -->
                                    <div class="main1-3-21-five">
                                        <span class="main1-3-21-1-five">身份证件号码</span>
                                        @if($info->checks == 1)
                                            <input class="main1-3-21-2-five" name="IDcard" ng-model="teaInfo.IDcard"
                                                   readonly>
                                        @elseif($info->checks == 0)
                                            <input class="main1-3-21-2-five" name="IDcard" ng-model="teaInfo.IDcard">
                                        @endif
                                    </div>
                                    <!-- 所属部门 -->
                                    <!-- <div class="main1-3-22-five">
                                        <span class="main1-3-22-1-five">所属部门</span>
                                        <span class="main1-3-22-2-five">语文教研组</span>

                                    </div> -->
                                    <!-- 任教年级 -->
                                    <div class="main1-3-23-five">
                                        <span class="main1-3-23-1-five">组织机构</span>
                                        {{--<input class="main1-3-23-2-five" type="text" name="grade" ng-model="teaInfo.grade" size="35" style="height:35px;"/>--}}
                                        <select name="provinceId" id="province" style="height:35px; width:100px;">
                                            <option value="">-省份-</option>{{$info->provinceId}}
                                            @foreach($data as $value)
                                                <option value="{{$value->id}}" {{ $value->id == $info->provinceId ? 'selected': '' }} >{{$value->organize_name}}</option>
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

                                        <img ng-src="{{asset('image/qiyun/perSpace/loading.gif')}}"
                                             class="loadingPic hide cityLoading" alt="">

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

                                        <img ng-src="{{asset('image/qiyun/perSpace/loading.gif')}}"
                                             class="loadingPic hide countyLoading" alt="">
                                        {{--学校--}}
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

                                        <img ng-src="{{asset('image/qiyun/perSpace/loading.gif')}}"
                                             class="loadingPic hide schoolLoading" alt="">

                                    </div>
                                    <!-- 任教学校、班级、学科 -->
                                    <div class="main1-3-24-five">
                                        <span class="main1-3-24-1-five">部门学科</span>
                                        {{--学校部门--}}
                                        <select name="departId" id="department" style="height:35px; width:100px;">

                                            @if($info->departs)
                                                <option value="">-学校部门-</option>
                                                @foreach($info->departs as $value)
                                                    <option value="{{$value->id}}" @if($value->id == $info->departId){{'selected'}} @endif >{{$value->departName}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-学校部门-</option>
                                            @endif
                                        </select>

                                        <img src="{{asset('image/qiyun/perSpace/loading.gif')}}"
                                             class="loadingPic hide departLoading" alt="">


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

                                        <img src="{{asset('image/qiyun/perSpace/loading.gif')}}"
                                             class="loadingPic hide gradeLoading" alt="">

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

                                        <img src="{{asset('image/qiyun/perSpace/loading.gif')}}"
                                             class="loadingPic hide classLoading" alt="">

                                        <select name="subjectId" id="subject" style="height:35px; width:100px;">

                                            @if($info->subjects)
                                                <option value="">-学科-</option>
                                                @foreach($info->subjects as $value)
                                                    <option value="{{$value->id}}" @if($value->id == $info->subjectId){{'selected'}} @endif >{{$value->subjectName}}</option>
                                                @endforeach
                                            @else
                                                <option value="">-学科-</option>
                                            @endif
                                        </select>

                                        <img src="{{asset('image/qiyun/perSpace/loading.gif')}}"
                                             class="loadingPic hide subjectLoading" alt="">

                                    </div>

                                    <!--xiugai-->
                                    <div class="main1-3-25-five">

                                        <span class="main1-3-25-1-five"><button id="stubutn">修改</button></span>

                                    </div>
                                </div>
                            </div>
                            <!-- 正文结束 -->
                        </form>
                    </div>


                    <!-- 我的资源————内容区开始 -->
                    <div class="mine_resource hide" name="selectName">
                        <div class="mine_resource_upload">
                            <a href="/resource/uploadResource"><img src="{{asset('image/qiyun/perSpace/6.png')}}"/></a>
                        </div>
                        <!-- neirongqu -->
                        <div class="mine_resource_show">
                            <!-- xuanxiangka -->
                            <div class="mine_resource_show_nav show_nav" id="selectNav">
                                <li style="margin-left:0px;" ng-click="selMyRes('2')">教案</li>
                                <li ng-click="selMyRes('3')">课件</li>
                                <li ng-click="selMyRes('4')">习题</li>
                                <li ng-click="selMyRes('5')">素材</li>
                                <li ng-click="selMyRes('6')">资源包</li>
                                <li style="margin-left:7px;" ng-click="selMyRes('7')">其他</li>
                            </div>
                            <!-- ...div遍历.. -->
                            <div class="mine_resource_show_content">

                                <div class="mine_resource_show_content_div" ng-if="myResource.content && $index < 10"
                                     ng-repeat="i in myResource">
                                    <img class="delpic" src="{{asset('css/qiyun/member/uploadify-cancel.png')}}" alt=""
                                         ng-click="delMyresource(i.id)">
                                    <div class="mine_resource_show_content_div1">
                                        <a href="/resource/resourceDetail/{[i.id]}"><img ng-src="{{asset('{[i.pic]}')}}"
                                                                                         width="100" height="80"/></a>
                                        <div class="checkstatus" ng-if="i.resourceCheck == 0"
                                             style="background: rgba(255,255,255,0);"></div>
                                        <div class="checkstatus" ng-if="i.resourceCheck == 1">审核中</div>
                                        <div class="checkstatus" ng-if="i.resourceCheck == 2">审核未过</div>
                                    </div>
                                    <div class="mine_resource_show_content_div2" ng-bind="i.title"></div>
                                    <div class="mine_resource_show_content_div3" ng-bind=" '播放次数：'+i.browsenum "></div>
                                    <div style="height: 20px;"></div>
                                </div>


                                <div class="spinner" style="padding:133.5px 0px; width:670px;float:left;"
                                     ng-if="myResource.loading">
                                    <div class="bounce1"></div>
                                    <div class="bounce2"></div>
                                    <div class="bounce3"></div>
                                </div>

                                <div id="errorMessage" style="padding:133.5px 0px;width:670px;float:left;"
                                     ng-if="myResource.reload">数据加载失败，请尝试 <a ng-click="selMyRes(myResource.type)">刷新</a>
                                    一下
                                </div>
                                <div id="errorMessage" style="padding:133.5px 0px;width:670px;float:left;"
                                     ng-if="myResource.errormeg">没有内容，快去 <a href="/resource/uploadResource">创建</a> 吧
                                </div>

                                <div class="clear"></div>
                                {{--<div class="body_left_con body_left_con_now">--}}
                                {{--<div class="li_page" style="padding-left:160px;padding-top: 50px;padding-bottom: 50px;">--}}
                                {{--<tm-pagination conf="paginationConf"></tm-pagination>--}}
                                {{--</div>--}}
                                {{--</div>--}}

                            </div>
                            <div class="mine_resource_show_content_extra"
                                 ng-if="myResource.content && myResource.length > 10"><a
                                        href="{{url('/perSpace/myResourceList/{[rt]}')}}"> >>更多 </a></div>
                        </div>

                    </div>
                    <!-- 我的资源————内容区结束 -->

                    <!-- 我的微课————内容区 -->
                    <div class="mine_resource hide" name="selectName">
                        <div class="mine_resource_upload">
                            <a href="/microLesson/microLessonPost"><img
                                        src="{{asset('image/qiyun/perSpace/weike.png')}}"/></a>
                        </div>
                        <!-- neirongqu -->
                        <div class="mine_resource_show">
                            <!-- xuanxiangka -->
                            <div class="mine_resource_show_nav" id="selectWeike">
                                <li style="margin-left:0;" ng-click="selMyMicVideo('0')">讲授类</li>
                                <li ng-click="selMyMicVideo('1')">讨论类</li>
                                <li ng-click="selMyMicVideo('2')">启发类</li>
                                <li ng-click="selMyMicVideo('3')">演示类</li>
                                <li style="margin-left:7px;" ng-click="selMyMicVideo('4')">练习类</li>
                            </div>
                            <!-- ...div遍历.. -->
                            <div class="mine_resource_show_content">

                                <div class="mine_resource_show_content_div" ng-if="myMicLesson.content  && $index < 10"
                                     ng-repeat="i in myMicLesson">
                                    <img class="delpic micro" src="{{asset('css/qiyun/member/uploadify-cancel.png')}}"
                                         alt="" ng-click="delMicroLesson(i.id)">
                                    <div class="mine_resource_show_content_div1">
                                        <a href="/microLesson/microLessonDetail/{[i.id]}"><img
                                                    ng-src="{{asset('{[i.pic]}')}}" width="120" height="120"/></a>
                                    </div>
                                    <div class="mine_resource_show_content_div2" ng-bind="i.title"></div>
                                    <div class="mine_resource_show_content_div3" ng-bind=" '播放次数：'+i.browsenum ">5</div>
                                </div>


                                <div class="spinner" style="padding:133.5px 0px; width:670px;float:left;"
                                     ng-if="myMicLesson.loading">
                                    <div class="bounce1"></div>
                                    <div class="bounce2"></div>
                                    <div class="bounce3"></div>
                                </div>

                                <div id="errorMessage" style="padding:133.5px 0px;width:670px;float:left;"
                                     ng-if="myMicLesson.reload">数据加载失败，请尝试 <a
                                            ng-click="selMyRes(myResource.type)">刷新</a> 一下
                                </div>
                                <div id="errorMessage" style="padding:133.5px 0px;width:670px;float:left;"
                                     ng-if="myMicLesson.errormeg">没有内容，快去 <a href="/microLesson/microLessonPost">创建</a>
                                    吧
                                </div>


                            </div>
                            <div class="mine_resource_show_content_extra"
                                 ng-if="myMicLesson.content && myMicLesson.length > 10"><a
                                        href="{{url('/perSpace/myMicrolessonList/{[mt]}')}}">
                                    >>更多 </a></div>
                        </div>

                    </div>
                    <!-- 我的微课————结束 -->

                    <!-- 我的收藏content开始 -->
                    <!-- 蓝色条 -->
                    <div class="hide" name="selectName">
                        <div class="blue_line">
                            <div class="blue_line_1">我的收藏</div>
                            <a href="{{url('/perSpace/myCollectList')}}" class="blue_line_2"
                               ng-if="collect && collect.length > 9">>>更多</a>
                        </div>
                        <!-- 空白div -->
                        <div style="height:30px"></div>
                        <!-- 删除 资讯 -->
                        <div class="delete_zx">
                            <form>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="delete_del" ng-if="collect">
                                    <button class="delete_span1" type="button" ng-click="mutidelCollect()">删除</button>
                                </div>
                                <div class="core">
                                    <div class="title_1">
                                        <div class="title_1_1">
                                            <input type="checkbox" name="checkbox" ng-click="checkAll(collect)"
                                                   ng-model="checkall" class="title_checkbox"></div>
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
                                            <input type="checkbox" name="ids" ng-model="ids[i.id]"
                                                   class="title_checkbox1">
                                        </div>
                                        <div class="title_2_2">
                                            {{--<span class="title2_span1"><a href="{[i.url]}" ng-bind="i.title"></a></span>--}}
                                            <span class="title2_span1" ng-click="collectDetail(i.url,i.isdel)"
                                                  ng-bind="i.title"> </span>
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
                                                href="/resource">添加收藏</a> 吧
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>

                    <!-- 我的科研协助组-->
                    <div name="selectName" class="selectName  hide">      <!--切换部分-->
                        <div class="main1-35-first">
                            <div class="main1-33-first" style="clear: both">
                                <li>我的教研协助组</li>
                                <a target="_blank" href="/perSpace/myResearchList/myResearchList">
                                    <li style="float: right;margin-right: 10px" ng-if="researchAssist.content">>>更多</li>
                                </a>
                            </div>

                            <div class="main1-34-first" ng-repeat="i in researchAssist" ng-if="researchAssist.content">
                                <div style="float:left;margin-top:10px;"><a href="/research/techGroupInfo/{[i.id]}"><img
                                                ng-src="{{asset('{[i.pic]}')}}" width="120"
                                                height="80"/></a></div>
                                <div style="float:left;margin-left: 10px">
                                    <li style="font-size: 16px;margin-top: 15px" ng-bind="i.title"></li>
                                    <li style="margin-top: 5px;"><label>创建：<a href="" ng-bind="i.author"></a></label><label style="margin-left: 10px;">管理：<a href="" ng-bind="i.isManage"></a></label></li>
                                    <li style="margin-top: 15px"><label><img src="{{asset('image/qiyun/perSpace/20.png')}}" style="margin:0 1px -1px;"><span ng-bind=" '&nbsp;成员：'+ i.memberSum"></span></label><label style="margin-left: 15px;"><img
                                                    src="{{asset('image/qiyun/perSpace/21.png')}}"
                                                    style="margin:0 1px -2px;"><span
                                                    ng-bind=" '&nbsp;协备：'+ i.plan"></span></label>
                                        {{--<label style="margin-left: 15px;"><img--}}
                                                    {{--src="{{asset('image/qiyun/perSpace/22.png')}}"--}}
                                                    {{--style="margin:0 0 -2px 2px;"><span--}}
                                                    {{--ng-bind=" '&nbsp;评课：'+ i.commentLesson"></span></label>--}}
                                        {{--<label style="margin-left: 15px;"><img src="{{asset('image/qiyun/perSpace/23.png')}}" style="margin:0 0 -3px 2px;"><span  ng-bind=" '&nbsp;主题：'+ i.theme"></span></label>--}}
                                    </li>
                                </div>
                            </div>

                            <div class="spinner" style="padding:110px 0px; width:670px;float:left;"
                                 ng-if="researchAssist.loading">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>

                            <div id="errorMessage" style="padding:110px 0px;width:670px;float:left;"
                                 ng-if="researchAssist.reload">数据加载失败，请尝试 <a
                                        ng-click="reloadfunc('researchAssist');">刷新</a> 一下
                            </div>
                            <div id="errorMessage" style="padding:110px 0px;width:670px;float:left;"
                                 ng-if="researchAssist.errormeg">没有教研组，快去 <a href="/research/makeGroup">创建教研组</a> 吧
                            </div>


                        </div>
                        <!-- 我的协同备课-->
                        <div class="main1-35-first">
                            <div class="main1-33-first" style="clear: both">
                                <li>我的协同备课</li>
                                <a href="/perSpace/myResearchList/myPrepareLessonList" target="_blank">
                                    <li style="float: right;margin-right: 10px" ng-if="prepareLesson.content">>>更多</li>
                                </a>
                            </div>

                            <div class="main1-34-first" ng-repeat="i in prepareLesson" ng-if="prepareLesson.content">
                                <div style="float:left; margin-top:12px;"><a href="/research/lessonDetail/{[i.id]}"><img
                                                ng-src={[i.pic]} width="120" height="100"></a>
                                </div>
                                <div style="float:left;margin-left: 10px">
                                    <li style="font-size: 16px;margin-top: 15px" ng-bind="i.title"></li>
                                    <div style="margin-top:5px;font-size:13px;" ng-bind="i.descript"></div>
                                    <li style="font-size:12px;"><label>创建：<a href=""><span style="color:#24CBFF;"
                                                                                           ng-bind="i.author"></span></a></label>
                                        <label style="margin-left: 10px;">教研组：<a href=""><span style="color:#24CBFF;"
                                                                                               ng-bind="i.researchteam"></span></a></label>
                                        <label style="margin-left: 10px;">共案：&nbsp;<a href=""><span
                                                        style="color:#24CBFF;"
                                                        ng-bind="i.commentcase"></span></a></label>
                                        <label style="margin-left: 10px;">个案：&nbsp;<a href=""><span
                                                        style="color:#24CBFF;" ng-bind="i.case"></span></a></label>
                                    </li>
                                    <li style="margin-top: 15px">
                                        <label><img src="{{asset('image/qiyun/perSpace/24.png')}}"
                                                    style="margin:0 1px -1px;"/>&nbsp;文章：{[i.article]}</label>
                                        <label style="margin-left: 15px;"><img
                                                    src="{{asset('image/qiyun/perSpace/25.png')}}"
                                                    style="margin:0 1px -2px;">&nbsp;资源：{[i.resource]}</label>
                                        <label style="margin-left: 15px;"><img
                                                    src="{{asset('image/qiyun/perSpace/26.png')}}"
                                                    style="margin:0 0 -2px 2px;">&nbsp;图片：{[i.imagenum]}</label>
                                        <label style="margin-left: 15px;"><img
                                                    src="{{asset('image/qiyun/perSpace/27.png')}}"
                                                    style="margin:0 0 -2px 2px;">&nbsp;视频：{[i.videonum]}</label>
                                    </li>
                                </div>
                            </div>


                            <div class="spinner" style="padding:110px 0px; width:670px;float:left;"
                                 ng-if="prepareLesson.loading">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>

                            <div id="errorMessage" style="padding:110px 0px;width:670px;float:left;"
                                 ng-if="prepareLesson.reload">数据加载失败，请尝试 <a
                                        ng-click="reloadfunc('prepareLesson');">刷新</a> 一下
                            </div>
                            <div id="errorMessage" style="padding:110px 0px;width:670px;float:left;"
                                 ng-if="prepareLesson.errormeg">没有内容，快去 <a href="/research/makeLesson">创建</a> 吧
                            </div>


                        </div>
                        <!-- 我的评委仪课-->
                        <div class="main1-35-first">
                            <div class="main1-33-first" style="clear: both">
                                <li>我的评课议课</li>
                                <a href="/perSpace/myResearchList/myEvaluatList" target="_blank">
                                    <li style="float: right;margin-right: 10px" ng-if="lessonComment.content">>>更多</li>
                                </a>
                            </div>

                            <div class="main1-38-first">

                                <div class="main1-{[36+$index]}-first" ng-repeat="i in lessonComment"
                                     ng-if="lessonComment.content">
                                    <div class="main1-37-1-first" ng-bind="i.title"></div>
                                    <div style="float:left;"><a href="/research/evaluationInfo/{[i.id]}"><img
                                                    ng-src="{{asset('{[i.pic]}')}}" width="120"
                                                    height="120"/></a></div>
                                    <div style="float:left;margin-left:10px">
                                        <span style="width:155px;overflow:hidden;height:45px;display:block"
                                              ng-bind="i.descript"></span><br/><br/>
                                        <div><label>授课人：<a href="" ng-bind="i.author"></a></label></div>
                                        <br/>
                                        <div><label>授课时间：{[i.time]}</label></div>
                                        <br/>
                                        <div><label ng-bind="i.scope"></label></div>
                                    </div>
                                </div>


                                <div class="spinner" style="padding:110px 0px; width:670px;float:left;"
                                     ng-if="lessonComment.loading">
                                    <div class="bounce1"></div>
                                    <div class="bounce2"></div>
                                    <div class="bounce3"></div>
                                </div>

                                <div id="errorMessage" style="padding:110px 0px;width:670px;float:left;"
                                     ng-if="lessonComment.reload">数据加载失败，请尝试 <a ng-click="reloadfunc('lessonComment');">刷新</a>
                                    一下
                                </div>
                                <div id="errorMessage" style="padding:110px 0px;width:670px;float:left;"
                                     ng-if="lessonComment.errormeg">没有内容，快去 <a href="/research/addEvaluation">创建</a> 吧
                                </div>


                            </div>
                        </div>
                        <!-- 我的主题教研-->
                        <div class="main1-39-first">
                            <div class="main1-33-first" style="clear: both">
                                <li>我的主题教研</li>
                                <a href="/perSpace/myResearchList/myThemeList" target="_blank">
                                    <li style="float: right;margin-right: 10px" ng-if="themeResearch.content">>>更多</li>
                                </a>
                            </div>

                            <div class="main1-40-first" ng-if="themeResearch.content" ng-repeat="i in themeResearch">
                                <div style="float:left;margin-top:2px;"><a href="/research/subjectInfo/{[i.id]}"><img
                                                ng-src="{{asset('{[i.pic]}')}}" width="120"
                                                height="120"/></a></div>
                                <div id="main1-41-first">
                                    <div style="font-size: 16px;margin-top: 10px" ng-bind="i.title"></div>
                                    <div style="margin-top: 10px"><label>创建单位：<a
                                                    href="">{[i.author]}</a></label></div>
                                    <div style="margin-top: 10px">
                                        <label><img src="{{asset('image/qiyun/perSpace/20.png')}}"
                                                    style="margin:0 1px -1px;">&nbsp;参与人数：{[i.peoplenum]}</label>
                                        <label style="margin-left: 15px;"><img
                                                    src="{{asset('image/qiyun/perSpace/24.png')}}"
                                                    style="margin:0 1px -2px;">&nbsp;文章：{[i.articlenum]}</label>
                                        <label style="margin-left: 15px;"><img
                                                    src="{{asset('image/qiyun/perSpace/25.png')}}"
                                                    style="margin:0 0 -2px 2px;">&nbsp;资源：{[i.resourcenum]}</label>
                                        <label style="margin-left: 15px;"><img
                                                    src="{{asset('image/qiyun/perSpace/26.png')}}"
                                                    style="margin:0 0 -2px 2px;">&nbsp;图片：{[i.imagenum]}</label>
                                        <label style="margin-left: 15px;"><img
                                                    src="{{asset('image/qiyun/perSpace/27.png')}}"
                                                    style="margin:0 0 -2px 2px;">&nbsp;视频：{[i.videonum]}</label>
                                    </div>
                                    <div style="height: 12px;"></div>
                                    <div class="main1-41-3-first">专题导语：{[i.descript]}<span><a
                                                    href="/research/subjectInfo/{[i.id]}"
                                                    style="color:#24CBFF;">
                                                &nbsp;[详情]&nbsp;</a></span></div>
                                </div>
                            </div>


                            <div class="spinner" style="padding:110px 0px; width:670px;float:left;"
                                 ng-if="themeResearch.loading">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>

                            <div id="errorMessage" style="padding:110px 0px;width:670px;float:left;"
                                 ng-if="themeResearch.reload">数据加载失败，请尝试 <a
                                        ng-click="reloadfunc('themeResearch');">刷新</a> 一下
                            </div>
                            <div id="errorMessage" style="padding:110px 0px;width:670px;float:left;"
                                 ng-if="themeResearch.errormeg">没有内容，快去 <a href="/research/addSubject">创建</a> 吧
                            </div>


                        </div>
                    </div>
                    <!--切换部分-->
                    <div class="main1-3-1-five_msg hide" name="selectName">
                        <span class="myMsg">我的消息</span>
                        <ul>
                            <li ng-repeat="i in inviteMessage"><span
                                        ng-bind="i.fromuserId + i.messageTitle + i.techResearchName"></span><span><button
                                            ng-click="agreeInvite(i.id,i.resourceId,i.userId,i.resourceType);">同意
                                    </button><button ng-click="refuse(i.id);">拒绝</button></span></li>
                            <li ng-repeat="u in userMessage"><span
                                        ng-bind="u.realname + u.techResearchName + u.messageTitle"
                                        title="{[u.messageTitle]}"></span><span><button
                                            ng-click="agree(u.id,u.resourceType,u.resourceId,u.fromuserId);">同意
                                    </button><button ng-click="refuse(u.id);">拒绝</button></span></li>
                            <li ng-repeat="d in directMessage"><span
                                        ng-bind="d.realname + d.techResearchName + d.messageTitle"
                                        title="{[d.messageTitle]}"></span><label class="delmsg"
                                                                                 ng-click="refuse(d.id);">删除</label>
                            </li>
                            <li ng-repeat="u in createMessage"><span
                                        ng-bind="u.realname + u.techResearchName"></span><label class="delmsg"
                                                                                                ng-click="refuse(u.id);">删除</label>
                            </li>
                        </ul>
                        <span ng-bind="warnMsg" style="margin: 30px 0px;display: block;"></span>
                        <div class="clear"></div>
                        <div class="body_left_con body_left_con_now">
                            <div class="li_page" style="padding-left:160px;padding-top: 50px;padding-bottom: 50px;">
                                <tm-pagination conf="paginationConf"></tm-pagination>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- content结束 -->

                <!-- 通知 -->
                <div class="main1-42">
                    <div class="main1-43">
                        <label><img src="{{asset('image/qiyun/perSpace/12.png')}}" style="margin:2px 0 -2px 2px;"/>&nbsp;&nbsp;消息通知</label>
                    </div>
                    <div class="main1-44">
                        <!-- 通知part-1 -->
                        <div class="main1-45" ng-repeat="m in msg">
                            <div class="main1-45-1" style="margin-top:5px;">
                                <div style="float:left;"><img ng-src="{[m.pic]}" width="50" height="45"/></div>
                                <div class="main1-45-1-1">
                                    <span style="font-size:16px;margin-left:20px"><strong ng-bind="m.realname"></strong></span>
                                    <span style="font-size:12px;" ng-bind="'创建了' + m.resourceType"></span>
                                    <div class="main1-45-1-2" ng-bind="m.messageTitle"></div>
                                </div>
                                <div class="main1-45-1-3">
                                    <div style="padding:5px;margin-top:10px;">
                                        <div style="margin-left:10px;" ng-bind="'主持人：' + m.author"></div>
                                        <div class="main1-45-1-3-1">
                                            <span style="cursor: pointer" class="main1-45-1-3-2"
                                                  ng-click="insert(m.id,m.resourceType,m.url,m.resourceCheck);">我要参与</span>
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
    <script src="{{ URL::asset('js/qiyun/perSpace/teacher_space.js') }}"></script>
    <script src="{{ URL::asset('js/qiyun/angular/controller/teaPerSpaceController.js') }}"></script>
@endsection
		