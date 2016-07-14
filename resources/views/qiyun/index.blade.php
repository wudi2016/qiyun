@extends('qiyun.layouts.layoutHome')

@section('title', '启创教育云平台')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/qiyun/index.css') }}">
@endsection

@section('content')
    <div ng-controller="indexCtrl">
        <!--  首页banner和登录框  -->
        <div class="bar">
            <!--  <img src="{{asset('image/qiyun/index/banner.png')}}" class="banimg">  -->
            <div id="index_banner">
                @if (session('loginErrot'))
                <div class="index_banner_login" style="background:rgba(255,0,0,0.4)">
                @else
                <div class="index_banner_login">
                @endif
                    <div class="index_banner_login_block">
                        @if ( !Auth::check() )
                                <!-- 登录前 -->
                        <form class="index_banner_login_block_form" action="/auth/login" method="post">
                            <!-- <input type="hidden" name="_method" value="PUT"> -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="index_banner_login_block_form_input">
                                <div style="height:6px;"></div>
                                <div class="index_banner_login_block_form_input_block">
                                    <div class="index_banner_login_block_form_input_block_left"></div>
                                    <div class="index_banner_login_block_form_input_block_line"></div>
                                    <input type="text" name="username" placeholder="请输入登录账号" value="">
                                </div>
                            </div>
                            <div class="index_banner_login_block_form_input">
                                <div style="height:5px;"></div>
                                <div class="index_banner_login_block_form_input_block">
                                    <div class="index_banner_login_block_form_input_block_left"
                                         style="background-position:4px -83px"></div>
                                    <div class="index_banner_login_block_form_input_block_line"></div>
                                    <input type="password" name="password" placeholder="请输入登录密码">
                                </div>
                            </div>
                            @if (session('loginErrot'))
                            <div class="index_banner_login_block_form_text">
                                无效的用户名或密码
                            </div>
                            @else
                            <div class="index_banner_login_block_form_text">
                                <div class="index_banner_login_block_form_text_left">
                                    <input type="checkbox" name="remember">记住密码
                                </div>
                                <div class="index_banner_login_block_form_text_right">
                                    <a href="/member/retrievePassword">忘记密码</a>&nbsp;
                                    <a href="/member/register" style="font-weight:bold;font-size:13px;">免费注册</a>
                                </div>
                            </div>
                            @endif
                            <button class="index_banner_login_block_form_bottom">登&nbsp;&nbsp;录</button>
                        </form>
                        @else
                                <!-- 登陆后 -->
                        <div class="index_banner_login_block_list">
                            <div class="index_banner_login_block_list_top">欢迎您，<span style="font-size:16px;">{{ Auth::user() -> realname }}</span> 
                                @if (Auth::user() -> type == 3)
                                    同学
                                @elseif (Auth::user() -> type == 1)
                                    老师
                                @else
                                    家长
                                @endif
                            </div>
                            <div class="index_banner_login_block_list_con">
                                <div class="index_banner_login_block_list_con_pic">
                                    <!-- <img src="{{asset('image/qiyun/index/4.png')}}"> -->
                                    <img src="{{ Auth::user() -> pic }}">
                                </div>
                                <div class="index_banner_login_block_list_con_des">
                                    <div class="index_banner_login_block_list_con_des_top">
                                        <div class="index_banner_login_block_list_con_des_top_l">账户管理</div>
                                        <div class="index_banner_login_block_list_con_des_top_r"><a href="/auth/logout" onclick="return confirm('确定退出?')">退出</a>
                                        </div>
                                    </div>
                                    <div class="jx"></div>

                                    <div class="index_banner_login_block_list_con_des_fot">
                                        <div class="index_banner_login_block_list_con_des_fot_con">
                                            <div class="index_banner_login_block_list_con_des_fot_con_top" ng-bind="resourceNum"></div>
                                            <div class="index_banner_login_block_list_con_des_fot_con_fot">资源</div>
                                        </div>
                                        <div class="index_banner_login_block_list_con_des_fot_con">
                                            <div class="index_banner_login_block_list_con_des_fot_con_top" ng-bind="micLessonNum"></div>
                                            <div class="index_banner_login_block_list_con_des_fot_con_fot">微课</div>
                                        </div>
                                        @if (Auth::user() -> type == 1)
                                        <div class="index_banner_login_block_list_con_des_fot_con">
                                            <div class="index_banner_login_block_list_con_des_fot_con_top" ng-bind="researchNum"></div>
                                            <div class="index_banner_login_block_list_con_des_fot_con_fot">教研</div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <a href="/perSpace/pe/{{ Auth::user() -> type }}/{{ Auth::user() -> id }}"> <button class="index_banner_login_block_list_btn">进入我的工作空间</button></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <!-- 首页 资讯和政策部分 -->
        {{--<div id="index_InfoAndPolicy">--}}

            {{--<div class="index_InforAndPolicy_info">--}}
                {{--<div class="index_InfoAndPolicy_title">--}}
                    {{--<div class="index_InfoAndPolicy_title_left_text">教育资讯</div>--}}
                    {{--<div class="index_InfoAndPolicy_title_left_link">--}}
                        {{--<a href="{{url('/news')}}">更多</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="index_InfoAndPolicy_line"></div>--}}
                {{--<div class="index_InfoAndPolicy_content_long">--}}
                    {{--<div class="index_InfoAndPolicy_content_long_left">--}}
                        {{--<img src="{{asset('image/qiyun/index/children.jpg')}}" width="100%" height="100%">--}}
                    {{--</div>--}}

                    {{--<div class="index_InfoAndPolicy_content_long_right">--}}
                        {{--<div class="index_InfoAndPolicy_content_long_right_contentByInfoAndPolicy "--}}
                             {{--ng-repeat="i in education">--}}
                            {{--+ <a href="{{ URL::to('/news/newsDetail/{[i.id]}') }}"  class="ng-binding"--}}
                                 {{--ng-bind="i.info"></a>--}}
                        {{--</div>--}}

                        {{--<div class="spinner" style="width: 410px;float: right; padding:110px 0px;"--}}
                             {{--ng-class="{disable: education}">--}}
                            {{--<div class="bounce1"></div>--}}
                            {{--<div class="bounce2"></div>--}}
                            {{--<div class="bounce3"></div>--}}
                        {{--</div>--}}

                        {{--<div id="errorMessage" style="padding:110px 0px;" ng-class="{disable: educationmsg}">数据加载失败，请尝试--}}
                            {{--<a ng-click="reload('education');">刷新</a> 一下--}}
                        {{--</div>--}}

                    {{--</div>--}}


                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="index_InforAndPolicy_policy">--}}
                {{--<div class="index_InfoAndPolicy_title">--}}
                    {{--<div class="index_InfoAndPolicy_title_left_text">政策发布</div>--}}
                    {{--<div class="index_InfoAndPolicy_title_left_link">--}}
                        {{--<a href="{{url('/news/newsTwo')}}">更多</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="index_InfoAndPolicy_line"></div>--}}
                {{--<div class="index_InfoAndPolicy_content_short">--}}

                    {{--<div class="index_InfoAndPolicy_content_long_right_contentByInfoAndPolicy" ng-repeat="i in policy">--}}
                        {{--+ <a href="{{ URL::to('/news/newsDetail/{[i.id]}') }}" ng-bind="i.info"></a>--}}
                    {{--</div>--}}

                    {{--<div class="spinner" style="padding:110px 0px;" ng-class="{disable: policy}">--}}
                        {{--<div class="bounce1"></div>--}}
                        {{--<div class="bounce2"></div>--}}
                        {{--<div class="bounce3"></div>--}}
                    {{--</div>--}}

                    {{--<div id="errorMessage" style="padding:110px 0px;" ng-class="{disable: policymsg}">数据加载失败，请尝试 <a--}}
                                {{--ng-click="reload('policy');">刷新</a> 一下--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div id="index_InfoAndPolicy">--}}
            {{--<div class="index_InforAndPolicy_info" style="width:100%;height:50px;"></div>--}}
        {{--</div>--}}

        <!-- 首页 微课和名师 -->
        <div id="index_InfoAndPolicy" style="height:auto;">

            <div class="index_InforAndPolicy_info" style="height:auto;">
                <div class="index_InfoAndPolicy_title">
                    <div class="index_InfoAndPolicy_title_left_block" style="background-position: 0% 9.6%;"></div>
                    <div class="index_InfoAndPolicy_title_left_text">精品微课</div>
                    <div class="index_InfoAndPolicy_title_left_link">
                        <a href="{{url('/microLesson/microLessonList')}}">更多</a>
                    </div>
                </div>
                <div class="index_InfoAndPolicy_line"></div>
                <div class="index_InfoAndPolicy_content_long" style="height:auto;">


                    <div class="index_InfoAndPolicy_contentByClassroom ng-scope" ng-repeat="i in microVideo">
                        {{--<div class="index_InfoAndPolicy_contentByClassroom_image" micro-video="" ng-class="{disable: microVideoblock}" style="background-image:url({{asset('{[i.image]}')}})">--}}
                            <div class="index_InfoAndPolicy_contentByClassroom_image" micro-video="" ng-class="{disable: microVideoblock}"
                                 ng-style="{ background:'url({{asset('{[i.image]}')}}) no-repeat center center',filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=\'scale\')','background-size':'100% 100%','-moz-background-size':'100% 100%' }">
                            <div style="height: 40px;"></div>
                            <a href="{{asset('microLesson/microLessonDetail/{[i.id]}')}}" 
                               class="index_InfoAndPolicy_contentByClassroom_image_player">▲</a>
                            <div style="height: 30px;"></div>
                            <div class="index_InfoAndPolicy_contentByClassroom_image_bottomText">
                                <div class="index_InfoAndPolicy_contentByClassroom_image_bottomText_left "
                                     ng-bind="'教师：'+i.teacher"></div>
                                <div class="index_InfoAndPolicy_contentByClassroom_image_bottomText_right "
                                     ng-bind="'时长：'+i.time"></div>
                            </div>
                        </div>
                        <div class="index_InfoAndPolicy_contentByClassroom_text">
                            <a href="{{asset('microLesson/microLessonDetail/{[i.id]}')}}" class=""
                               ng-bind="'标题：'+i.title"></a>
                        </div>
                    </div>

                    <div class="spinner" style="padding:250px 0px;" ng-class="{disable: microVideo}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>

                    <div id="errorMessage" style="padding:250px 0px;" ng-class="{disable: microVideomsg}">数据加载失败，请尝试 <a
                                ng-click="reload('microVideo');">刷新</a> 一下
                    </div>

                </div>
            </div>

            <div class="index_InforAndPolicy_policy" style="height:auto;">
                <div class="index_InfoAndPolicy_title">
                    <div class="index_InfoAndPolicy_title_left_block" style="background-position: 0% 11.2%;"></div>
                    <div class="index_InfoAndPolicy_title_left_text">微课名师排行</div>
                    <div class="index_InfoAndPolicy_title_left_link">
                        <a href="">更多</a>
                    </div>
                </div>
                <div class="index_InfoAndPolicy_line"></div>
                <div class="index_InfoAndPolicy_content_short" style="height:auto;">

                    <div class="index_InfoAndPolicy_contentByPersonalSpace_parent" type="teacher">

                        <div class="index_InfoAndPolicy_contentByPersonalSpace " ng-repeat="i in teacher">
                            <div class="index_InfoAndPolicy_contentByPersonalSpace_left">
                                <img width="100%" height="100%" ng-src="{{URL::asset('{[i.image]}')}}">
                            </div>
                            <div class="index_InfoAndPolicy_contentByPersonalSpace_right">
                                <a href="">
                                    <div class="index_InfoAndPolicy_contentByPersonalSpace_right_1 "
                                         ng-bind="i.name"></div>
                                    <div class="index_InfoAndPolicy_contentByPersonalSpace_right_2 "
                                         ng-bind="i.school"></div>
                                    <div class="index_InfoAndPolicy_contentByPersonalSpace_right_2 "
                                         ng-bind="i.class"></div>
                                </a>
                            </div>
                        </div>

                        <div class="spinner" style="padding:250px 0px;" ng-class="{disable: teacher}">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>

                        <div id="errorMessage" style="padding:240px 0px;" ng-class="{disable: teachermsg}">数据加载失败，请尝试 <a
                                    ng-click="reload('teacher');">刷新</a> 一下
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div id="index_InfoAndPolicy">
            <div class="index_InforAndPolicy_info" style="width:100%;height:50px;"></div>
        </div>

        <!-- 首页 资源和排行 -->
        <div id="index_InfoAndPolicy" style="height:auto;">

            <div class="index_InforAndPolicy_info" style="height:auto;">
                <div class="index_InfoAndPolicy_title">
                    <div class="index_InfoAndPolicy_title_left_block" style="background-position: 0% 9.6%;"></div>
                    <div class="index_InfoAndPolicy_title_left_text">优质资源</div>
                    <div class="index_InfoAndPolicy_title_left_link">
                        <a href="{{url('/resource')}}">更多</a>
                    </div>
                </div>
                <div class="index_InfoAndPolicy_line"></div>
                <div class="index_InfoAndPolicy_content_long" style="height:auto;">

                    <div class="index_InfoAndPolicy_contentByClassroom ng-scope" ng-repeat="i in favresource">
                        <div class="index_InfoAndPolicy_contentByClassroom_image" micro-video="" >
                            <a href="{{asset('resource/resourceDetail/{[i.id]}')}}" ><img width="170" height="128" ng-src="{{asset('{[i.resourcePic]}')}}"></a>
                        </div>
                        <div class="index_InfoAndPolicy_contentByClassroom_text">
                            <a href="{{asset('resource/resourceDetail/{[i.id]}')}}" ng-bind="i.title"></a>
                        </div>

                    </div>

                    <div class="spinner" style="padding:150px 0px;" ng-class="{disable: favresource}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>

                    <div id="errorMessage" style="padding:150px 0px;" ng-class="{disable: favresourcemsg}">数据加载失败，请尝试 <a
                                ng-click="reload('favresource');">刷新</a> 一下
                    </div>

                </div>
            </div>

            <div class="index_InforAndPolicy_policy" style="height:auto;">
                <div class="index_InfoAndPolicy_title">
                    <div class="index_InfoAndPolicy_title_left_block" style="background-position: 0% 11.2%;"></div>
                    <div class="index_InfoAndPolicy_title_left_text">热门资源排行</div>
                    <div class="index_InfoAndPolicy_title_left_link">
                        <a href="{{'/resource'}}">更多</a>
                    </div>
                </div>
                <div class="index_InfoAndPolicy_line"></div>
                <div class="index_InfoAndPolicy_content_short" style="height:auto;">

                    <div class="index_InfoAndPolicy_content_short_contentByDepartment ng-scope"
                         ng-repeat="i in resource">
                        <div class="index_InfoAndPolicy_content_short_contentByDepartment_left"
                             ng-bind="$index + 1 + '.'"></div>
                        <div class="index_InfoAndPolicy_content_short_contentByDepartment_right">
                            <a href="{{asset('resource/resourceDetail/{[i.id]}')}}" ng-bind="i.title"></a>
                        </div>
                    </div>

                    <div class="spinner" style=" padding:150px 0px;" ng-class="{disable: resource}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>

                    <div id="errorMessage" style="padding:150px 0px;" ng-class="{disable: resourcemsg}">数据加载失败，请尝试 <a ng-click="reload('resource');">刷新</a> 一下</div>

                </div>
            </div>
        </div>

        <div id="index_InfoAndPolicy">
            <div class="index_InforAndPolicy_info" style="width:100%;height:50px;"></div>
        </div>

        <!-- 首页 最热教研 -->
        <div id="index_InfoAndPolicy">

            <div class="index_InforAndPolicy_info" style="width:100%">
                <div class="index_InfoAndPolicy_title">
                    <div class="index_InfoAndPolicy_title_left_text">最热教研</div>
                    <div class="index_InfoAndPolicy_title_left_link">
                        <a href="{{url('/research')}}">更多</a>
                    </div>
                </div>
                <div class="index_InfoAndPolicy_line"></div>

                <div class="hot_con_sel">
                    <a href="{{url('/research/groupList')}}"><div class="hot_con_sel_num act">教师协作组</div></a>
                    <a href="{{url('/research/lessonList')}}"><div class="hot_con_sel_num">协同备课</div></a>
                    <a href="{{url('/research/evaluationList')}}"><div class="hot_con_sel_num">评课议课</div></a>
                    <a href="{{url('/research/subjectList')}}"><div class="hot_con_sel_num">主题讨论</div></a>
                </div>

                <div class="hot_con_det show">

                    <div class="hot_con_det_num" ng-repeat=" i in techresearch">
                        <div class="hot_con_det_num_img"><a href="{{url('research/techGroupInfo/{[i.id]}')}}"><img width="176" height="125" ng-src="{{asset('{[i.pic]}')}}"></a></div>
                        <a href="{{url('research/techGroupInfo/{[i.id]}')}}"><div class="hot_con_det_num_gpname" ng-bind="i.techResearchName"></div></a>
                        <div class="hot_con_det_num_gpauth" ng-bind=" '创建: '+i.author "></div>
                    </div>

                    <div class="spinner" style=" padding:95px 0px;" ng-class="{disable: techresearch}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>

                    <div id="errorMessage" style="padding:95px 0px;" ng-class="{disable: techresearchmsg}">数据加载失败，请尝试 <a ng-click="reload('techresearch');">刷新</a> 一下</div>
                    <div id="errorMessage" style="padding:95px 0px;" ng-class="{disable: techresearchempty}">没有找到相关信息！</div>

                </div>

                <div class="hot_con_det ">

                    <div class="hot_con_det_num" ng-repeat=" i in lessonsubject">
                        <div class="hot_con_det_num_img"><a href="{{url('research/lessonDetail/{[i.id]}')}}"><img  width="176" height="125" ng-src="{{asset('{[i.pic]}')}}"></a></div>
                        <a href="{{url('research/lessonDetail/{[i.id]}')}}"><div class="hot_con_det_num_gpname" ng-bind="i.lessonSubjectName"></div></a>
                        <div class="hot_con_det_num_gpauth" ng-bind="'创建: '+i.lessonSubjecAuthor"></div>
                    </div>

                    <div class="spinner" style=" padding:95px 0px;" ng-class="{disable: lessonsubject}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <div id="errorMessage" style="padding:95px 0px;" ng-class="{disable: lessonsubjectmsg}">数据加载失败，请尝试 <a ng-click="reload('lessonsubject');">刷新</a> 一下</div>
                    <div id="errorMessage" style="padding:95px 0px;" ng-class="{disable: lessonsubjectempty}">没有找到相关信息！</div>

                </div>

                <div class="hot_con_det ">

                    <div class="hot_con_det_num" ng-repeat="i in evaluat">
                        <div class="hot_con_det_num_img"><a href="{{url('research/evaluationInfo/{[i.id]}')}}"><img width="176" height="125" ng-src="{{asset('{[i.evaluatPic]}')}}"></a></div>
                        <a href="{{url('research/evaluationInfo/{[i.id]}')}}"><div class="hot_con_det_num_gpname" ng-bind="i.evaluatName"></div></a>
                        <div class="hot_con_det_num_gpauth" ng-bind="'创建: '+i.evaluatAuthor"></div>
                    </div>

                    <div class="spinner" style=" padding:95px 0px;" ng-class="{disable: evaluat}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <div id="errorMessage" style="padding:95px 0px;" ng-class="{disable: evaluatmsg}">数据加载失败，请尝试 <a ng-click="reload('evaluat');">刷新</a> 一下</div>
                    <div id="errorMessage" style="padding:95px 0px;" ng-class="{disable: evaluatempty}">没有找到相关信息！</div>

                </div>

                <div class="hot_con_det">

                    <div class="hot_con_det_num" ng-repeat=" i in departmenttheme">
                        <div class="hot_con_det_num_img"><a href="{{url('research/subjectInfo/{[i.id]}')}}"><img width="176" height="125" ng-src="{{asset('{[i.pic]}')}}"></a></div>
                        <a href="{{url('research/subjectInfo/{[i.id]}')}}"><div class="hot_con_det_num_gpname" ng-bind="i.title"></div></a>
                        <div class="hot_con_det_num_gpauth" ng-bind="'创建: '+i.name"></div>
                    </div>

                    <div class="spinner" style=" padding:95px 0px;" ng-class="{disable: departmenttheme}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <div id="errorMessage" style="padding:95px 0px;" ng-class="{disable: departmentthememsg}">数据加载失败，请尝试 <a ng-click="reload('departmenttheme');">刷新</a> 一下</div>
                    <div id="errorMessage" style="padding:95px 0px;" ng-class="{disable: departmentthemeempty}">没有找到相关信息！</div>


                </div>

            </div>
        </div>

        <div id="index_InfoAndPolicy">
            <div class="index_InforAndPolicy_info" style="width:100%;height:30px;"></div>
        </div>

        <!-- 首页 特色学校 -->
        <div id="index_InfoAndPolicy">

            <div class="index_InforAndPolicy_info" style="width:100%">
                <div class="index_InfoAndPolicy_title">
                    <div class="index_InfoAndPolicy_title_left_text">特色学校</div>
                    <div class="index_InfoAndPolicy_title_left_link">
                        <!-- <a href="">更多</a> -->
                    </div>
                </div>
                <div class="index_InfoAndPolicy_line"></div>

                <div class="school">
                    <div class="school_num"><a href="http://www.bj50.com/" target="_blank"><img src="{{asset('image/qiyun/index/12.png')}}"></a></div>
                    <div class="school_num"><a href="http://www.bj214zx.cn/" target="_blank"><img src="{{asset('image/qiyun/index/13.png')}}"></a></div>
                    <div class="school_num"><img src="{{asset('image/qiyun/index/14.png')}}"></div>
                    <div class="school_num"><a href="http://www.bjshiyi.org.cn/index.aspx" target="_blank"><img src="{{asset('image/qiyun/index/15.png')}}"></a></div>
                    <div class="school_num"><a href="http://www.bj18.net/cms/" target="_blank"><img src="{{asset('image/qiyun/index/16.png')}}"></a></div>
                    <div class="school_num"><a href="http://www.huicai.org/" target="_blank"><img src="{{asset('image/qiyun/index/17.png')}}"></a></div>
                    <div class="school_num"><a href="http://www.bj165z.bjedu.cn/HomePageController" target="_blank"><img src="{{asset('image/qiyun/index/18.png')}}"></a></div>
                    <div class="school_num"><a href="http://www.bjshiyi.org.cn/index.aspx" target="_blank"><img src="{{asset('image/qiyun/index/19.png')}}"></a></div>
                </div>
            </div>
        </div>

        <div id="index_InfoAndPolicy">
            <div class="index_InforAndPolicy_info" style="width:100%;height:70px;"></div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('js/qiyun/index.js') }}"></script>
    <script src="{{ URL::asset('js/qiyun/angular/controller/indexController.js') }}"></script>
    <script src="{{ URL::asset('js/qiyun/angular/directive/indexDirective.js') }}"></script>
    <script>
          var checkResearch2 = {!! session('checkResearch2') !!};
          if (checkResearch2 == 1) {  //未登录
              alert('请先登录！');
          }else if(checkResearch2 == 2){ //不是老师
              alert('抱歉，您不是教师！');
          }
    </script>
@endsection
		