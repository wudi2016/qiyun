<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>启创教育云平台后台管理系统</title>
    <meta name="keywords" content="启创卓越 启云 启创教育云平台"/>
    <meta name="description" content="启创卓越 启云 启创教育云平台"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- basic styles -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}"/>

    <!--[if IE 7]>
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome-ie7.min.css')}}"/>
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <!-- <link rel="stylesheet" href="http://fonts.useso.com/css?family=Open+Sans:400,300" /> -->

    <!-- ace styles -->

    <link rel="stylesheet" href="{{asset('admin/css/ace.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/css/ace-rtl.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/css/ace-skins.min.css')}}"/>
    @yield('css')

	<!--[if lte IE 8]>
    <link rel="stylesheet" href="{{asset('admin/css/ace-ie.min.css')}}"/>
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="{{asset('admin/js/ace-extra.min.js')}}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="{{asset('admin/js/html5shiv.js')}}"></script>
    <script src="{{asset('admin/js/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body ng-app="primeApp">
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try {
            ace.settings.check('navbar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="/" class="navbar-brand">
                <small>
                    <i class="icon-leaf"></i>
                    启创教育云平台后台管理系统
                </small>
            </a>
        </div>

        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="{{\Auth::user() -> pic}}"/>
                        欢迎光临，{{ \Auth::user() -> username }}
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        {{--<li>--}}
                        {{--<a href="#">--}}
                        {{--<i class="icon-cog"></i>--}}
                        {{--设置--}}
                        {{--</a>--}}
                        {{--</li>--}}

                        {{--<li>--}}
                        {{--<a href="#">--}}
                        {{--<i class="icon-user"></i>--}}
                        {{--个人资料--}}
                        {{--</a>--}}
                        {{--</li>--}}

                        {{--<li class="divider"></li>--}}

                        <li>
                            <a href="{{url('auth/logout')}}">
                                <i class="icon-off"></i>
                                退出
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>

<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        <div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try {
                    ace.settings.check('sidebar', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="sidebar-shortcuts" id="sidebar-shortcuts">

                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>

                    <span class="btn btn-info"></span>

                    <span class="btn btn-warning"></span>

                    <span class="btn btn-danger"></span>
                </div>
            </div>

            <ul class="nav nav-list">
                <li class="active">
                    <a href="{{url('admin/index')}}">
                        <i class="icon-dashboard"></i>
                        <span class="menu-text"> 控制台 </span>
                    </a>
                </li>

                @level(8)
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-text-width"></i>
                        <span class="menu-text"> 权限管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li class="authrole">
                            <a href="{{ url('admin/auth/roleList') }}">
                                <i class="icon-double-angle-right"></i>
                                角色组列表
                            </a>
                        </li>

                        <li class="authpermission">
                            <a href="{{ url('admin/auth/permissionList') }}">
                                <i class="icon-double-angle-right"></i>
                                操作权限列表
                            </a>
                        </li>
                    </ul>
                </li>
                @endlevel

                @level(2)
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-text-width"></i>
                        <span class="menu-text"> 管理员管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        @level(8)
                        <li class="authadmin">
                            <a href="{{ url('/admin/auth/adminList') }}">
                                <i class="icon-double-angle-right"></i>
                                后台管理员
                            </a>
                        </li>
                        @endlevel
                        @level(7)
                        <li class="authprovincemanager">
                            <a href="{{ url('/admin/auth/provinceManagerList') }}">
                                <i class="icon-double-angle-right"></i>
                                省级管理员
                            </a>
                        </li>
                        @endlevel
                        @level(6)
                        <li class="authcitymanager">
                            <a href="{{ url('/admin/auth/cityManagerList') }}">
                                <i class="icon-double-angle-right"></i>
                                市级管理员
                            </a>
                        </li>
                        @endlevel
                        @level(5)
                        <li class="authcountymanager">
                            <a href="{{ url('/admin/auth/countyManagerList') }}">
                                <i class="icon-double-angle-right"></i>
                                区/县管理员
                            </a>
                        </li>
                        @endlevel
                        @level(4)
                        <li class="authschoolmanager">
                            <a href="{{ url('/admin/auth/schoolManagerList') }}">
                                <i class="icon-double-angle-right"></i>
                                校级管理员
                            </a>
                        </li>
                        @endlevel
                        @level(3)
                        <li class="authgrademanager">
                            <a href="{{ url('/admin/auth/gradeManagerList') }}">
                                <i class="icon-double-angle-right"></i>
                                年级管理员
                            </a>
                        </li>
                        @endlevel
                        @level(2)
                        <li class="authclassmanager">
                            <a href="{{ url('/admin/auth/classManagerList') }}">
                                <i class="icon-double-angle-right"></i>
                                班级管理员
                            </a>
                        </li>
                        @endlevel
                    </ul>
                </li>
                @endlevel

                @level(2)
                        <!-- 用户管理 -->
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-user"></i>
                        <span class="menu-text"> 用户管理 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li class="usersuser">
                            <a href="{{url('admin/users/userList')}}">
                                <i class="icon-double-angle-right"></i>
                                用户列表
                            </a>
                        </li>


                        <li class="usersadds">
                            @permission('user.create')
                            <a href="{{url('admin/users/addsUser')}}">
                                <i class="icon-double-angle-right"></i>
                                添加用户
                            </a>
                            @endpermission
                        </li>

                        <li class="usersdetail">
                            <a href="{{url('admin/users/personDetail')}}">
                                <i class="icon-double-angle-right"></i>
                                个人信息
                            </a>
                        </li>
                    </ul>
                </li>
                @endlevel

                @level(7)
                        <!--教师协作组管理-->
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> 教师协作组管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li class="teacherteacher">
                            <a href="{{url('admin/teacher/teacherList')}}">
                                <i class="icon-double-angle-right"></i>
                                教师协作组
                            </a>
                        </li>

                        <li class="teachermember">
                            <a href="{{url('admin/teacher/memberList')}}">
                                <i class="icon-double-angle-right"></i>
                                协作组成员
                            </a>
                        </li>
                    </ul>
                </li>
                @endlevel

                @level(7)
                        <!--资讯管理-->
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> 新闻资讯管理 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li class="newsnews">
                            <a href="{{url('admin/news/newsList')}}">
                                <i class="icon-double-angle-right"></i>
                                新闻资讯表
                            </a>
                        </li>

                        <li class="newsnewstype">
                            <a href="{{url('admin/news/newsTypeList')}}">
                                <i class="icon-double-angle-right"></i>
                                新闻资讯分类表
                            </a>
                        </li>

                        <li class="newsnewsreport">
                            <a href="{{url('admin/news/newsReportList')}}">
                                <i class="icon-double-angle-right"></i>
                                资讯举报表
                            </a>
                        </li>

                    </ul>
                </li>
                @endlevel

                @level(7)
                        <!--教研主题管理-->
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> 教研主题管理 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li class="themetheme">
                            <a href="{{url('admin/theme/themeList')}}">
                                <i class="icon-double-angle-right"></i>
                                教研主题表
                            </a>
                        </li>

                        <li class="themearticle">
                            <a href="{{url('admin/theme/articleList')}}">
                                <i class="icon-double-angle-right"></i>
                                教研主题文章表
                            </a>
                        </li>

                        <li class="themeimage">
                            <a href="{{url('admin/theme/imageList')}}">
                                <i class="icon-double-angle-right"></i>
                                教研主题图片表
                            </a>
                        </li>

                        <li class="themevideo">
                            <a href="{{url('admin/theme/videoList')}}">
                                <i class="icon-double-angle-right"></i>
                                教研主题音视频表
                            </a>
                        </li>

                        <li class="themeresource">
                            <a href="{{url('admin/theme/resourceList')}}">
                                <i class="icon-double-angle-right"></i>
                                教研主题资源表
                            </a>
                        </li>

                        <li class="themetopic">
                            <a href="{{url('admin/theme/topicList')}}">
                                <i class="icon-double-angle-right"></i>
                                教研主题话题表
                            </a>
                        </li>

                    </ul>
                </li>
                @endlevel

                @level(7)
                        <!--协同备课管理-->
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> 协同备课管理 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li class="lessonlessonsubject">
                            <a href="{{url('admin/lesson/lessonSubjectList')}}">
                                <i class="icon-double-angle-right"></i>
                                协同备课表
                            </a>
                        </li>

                        <li class="lessonlessontotal">
                            <a href="{{url('admin/lesson/lessonTotalList')}}">
                                <i class="icon-double-angle-right"></i>
                                协同备课共案表
                            </a>
                        </li>

                        <li class="lessonlessonarticle">
                            <a href="{{url('admin/lesson/lessonArticleList')}}">
                                <i class="icon-double-angle-right"></i>
                                协同备课文章表
                            </a>
                        </li>

                        <li class="lessonlessonimage">
                            <a href="{{url('admin/lesson/lessonImageList')}}">
                                <i class="icon-double-angle-right"></i>
                                协同备课图片表
                            </a>
                        </li>

                        <li class="lessonlessonvideo">
                            <a href="{{url('admin/lesson/lessonVideoList')}}">
                                <i class="icon-double-angle-right"></i>
                                协同备课音视频表
                            </a>
                        </li>

                        <li class="lessonlessonresource">
                            <a href="{{url('admin/lesson/lessonResourceList')}}">
                                <i class="icon-double-angle-right"></i>
                                协同备课资源表
                            </a>
                        </li>

                    </ul>
                </li>
                @endlevel

                @level(7)
                        <!--评课管理-->
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> 评课管理 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li class="evaluationevaluation">
                            <a href="{{url('admin/evaluation/evaluationList')}}">
                                <i class="icon-double-angle-right"></i>
                                评课表
                            </a>
                        </li>

                        <li class="evaluationevaluattype">
                            <a href="{{url('admin/evaluation/evaluatTypeList')}}">
                                <i class="icon-double-angle-right"></i>
                                评课分类表
                            </a>
                        </li>

                        <li class="evaluationevaluatcourseware">
                            <a href="{{url('admin/evaluation/evaluatCoursewareList')}}">
                                <i class="icon-double-angle-right"></i>
                                评课课件表
                            </a>
                        </li>

                        <li class="evaluationevaluatcomment">
                            <a href="{{url('admin/evaluation/evaluatCommentList')}}">
                                <i class="icon-double-angle-right"></i>
                                评课评论表
                            </a>
                        </li>

                        <li class="evaluationevaluatcommentreply" style="display: none;">
                            <a href="{{url('admin/evaluation/evaluatCommentReplyList')}}">
                                <i class="icon-double-angle-right"></i>
                                评课评论回复表
                            </a>
                        </li>

                        <li class="evaluationevaluatresult">
                            <a href="{{url('admin/evaluation/evaluatResultList')}}">
                                <i class="icon-double-angle-right"></i>
                                评课打分结果表
                            </a>
                        </li>

                        <li class="evaluationevaluattemp">
                            <a href="{{url('admin/evaluation/evaluatTempList')}}">
                                <i class="icon-double-angle-right"></i>
                                评课模板表
                            </a>
                        </li>

                        <li class="evaluationevaluattmpcontent">
                            <a href="{{url('admin/evaluation/evaluatTmpContentList')}}">
                                <i class="icon-double-angle-right"></i>
                                评课模板对应选项标准表
                            </a>
                        </li>

                        <li class="evaluationevaluatmember">
                            <a href="{{url('admin/evaluation/evaluatMemberList')}}">
                                <i class="icon-double-angle-right"></i>
                                评课成员表
                            </a>
                        </li>

                    </ul>
                </li>
                @endlevel

                @level(7)
                        <!-- 微课列表 -->
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> 微课管理 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li class="microlessonmicrolesson">
                            <a href="{{url('admin/microlesson/microlessonList')}}">
                                <i class="icon-double-angle-right"></i>
                                微课数据列表
                            </a>
                        </li>

                        <li class="microlessonmicrolessoncategory">
                            <a href="{{url('admin/microlesson/microlessonCategoryList')}}">
                                <i class="icon-double-angle-right"></i>
                                微课分类管理
                            </a>
                        </li>


                        <li class="microlessonmicrolessoncomment">
                            <a href="{{url('admin/microlesson/microlessonCommentList')}}">
                                <i class="icon-double-angle-right"></i>
                                微课评论管理
                            </a>
                        </li>

                        <li class="microlessonmicrolessoncomplain">
                            <a href="{{url('admin/microlesson/microlessonComplainList')}}">
                                <i class="icon-double-angle-right"></i>
                                微课投诉管理
                            </a>
                        </li>

                        <li class="microlessonmicrolessoncollect">
                            <a href="{{url('admin/microlesson/microlessonCollectList')}}">
                                <i class="icon-double-angle-right"></i>
                                微课收藏管理
                            </a>
                        </li>

                    </ul>
                </li>
                @endlevel

                @level(7)
                        <!-- 资源管理 -->
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> 资源管理 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">

                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-double-angle-right"></i>

                                资源分类
                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="icon-pencil"></i>

                                        学段
                                        <b class="arrow icon-angle-down"></b>
                                    </a>

                                    <ul class="submenu">
                                        <li class="sectionadd">
                                            <a href="{{url('admin/resource/sectionAdd')}}">
                                                <i class="icon-plus"></i>
                                                添加学段
                                            </a>
                                        </li>

                                        <li class="resourcesection">
                                            <a href="{{url('admin/resource/sectionList')}}">
                                                <i class="icon-eye-open"></i>
                                                查看学段
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="icon-pencil"></i>

                                        学科
                                        <b class="arrow icon-angle-down"></b>
                                    </a>

                                    <ul class="submenu">
                                        <li class="subjectadd">
                                            <a href="{{url('admin/resource/subjectAdd')}}">
                                                <i class="icon-plus"></i>
                                                添加学科
                                            </a>
                                        </li>

                                        <li class="resourcesubject">
                                            <a href="{{url('admin/resource/subjectList')}}">
                                                <i class="icon-eye-open"></i>
                                                查看学科
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="icon-pencil"></i>

                                        版本
                                        <b class="arrow icon-angle-down"></b>
                                    </a>

                                    <ul class="submenu">
                                        <li class="editionadd">
                                            <a href="{{url('admin/resource/editionAdd')}}">
                                                <i class="icon-plus"></i>
                                                添加版本
                                            </a>
                                        </li>

                                        <li class="resourceedition">
                                            <a href="{{url('admin/resource/editionList')}}">
                                                <i class="icon-eye-open"></i>
                                                查看版本
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="icon-pencil"></i>

                                        册别
                                        <b class="arrow icon-angle-down"></b>
                                    </a>

                                    <ul class="submenu">
                                        <li class="gradeadd">
                                            <a href="{{url('admin/resource/gradeAdd')}}">
                                                <i class="icon-plus"></i>
                                                添加册别
                                            </a>
                                        </li>

                                        <li class="resourcegrade">
                                            <a href="{{url('admin/resource/gradeList')}}">
                                                <i class="icon-eye-open"></i>
                                                查看册别
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="icon-pencil"></i>

                                        教材目录
                                        <b class="arrow icon-angle-down"></b>
                                    </a>

                                    <ul class="submenu">
                                        <li class="chapteradd">
                                            <a href="{{url('admin/resource/chapterAdd')}}">
                                                <i class="icon-plus"></i>
                                                添加教材目录
                                            </a>
                                        </li>

                                        <li class="resourcechapter">
                                            <a href="{{url('admin/resource/chapterList')}}">
                                                <i class="icon-eye-open"></i>
                                                查看教材目录
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="icon-pencil"></i>
                                        拓展资源类别
                                        <b class="arrow icon-angle-down"></b>
                                    </a>

                                    <ul class="submenu">
                                        <li class="expandresseladd">
                                            <a href="{{url('admin/resource/expandResSelAdd')}}">
                                                <i class="icon-plus"></i>
                                                添加拓展资源类别
                                            </a>
                                        </li>

                                        <li class="resourceexpandressel">
                                            <a href="{{url('admin/resource/expandResSelList')}}">
                                                <i class="icon-eye-open"></i>
                                                查看拓展资源类别
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>

                        </li>


                        <li class="resourceresource">
                            <a href="{{url('admin/resource/resourceList')}}">
                                <i class="icon-double-angle-right"></i>
                                资源列表
                            </a>
                        </li>

                        <li class="resourceexpandresource">
                            <a href="{{url('admin/resource/expandResourceList')}}">
                                <i class="icon-double-angle-right"></i>
                                拓展资源列表
                            </a>
                        </li>

                        <li class="resourceadd">
                            <a href="{{url('admin/resource/resourceAdd')}}">
                                <i class="icon-double-angle-right"></i>
                                添加资源
                            </a>
                        </li>

                        <li class="resourceresourceinformant">
                            <a href="{{url('admin/resource/resourceInformantList')}}">
                                <i class="icon-double-angle-right"></i>
                                资源举报列表
                            </a>
                        </li>
                    </ul>
                </li>
                @endlevel


                @level(2)
                        <!--基础设置-->
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> 基础设置管理 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">

                        @level(7)
                        <li class="organizationprovince">
                            <a href="{{url('admin/organization/provinceList')}}">
                                <i class="icon-double-angle-right"></i>
                                省级单位
                            </a>
                        </li>
                        @endlevel
                        @level(6)
                        <li class="organizationcity">
                            <a href="{{url('admin/organization/cityList')}}">
                                <i class="icon-double-angle-right"></i>
                                市区单位
                            </a>
                        </li>
                        @endlevel
                        @level(5)
                        <li class="organizationcounty">
                            <a href="{{url('admin/organization/countyList')}}">
                                <i class="icon-double-angle-right"></i>
                                县区单位
                            </a>
                        </li>
                        @endlevel

                        @level(4)
                        <li class="schoolschool">
                            <a href="{{url('admin/school/schoolList')}}">
                                <i class="icon-double-angle-right"></i>
                                学校列表
                            </a>
                        </li>
                        @endlevel

                        @level(3)
                        <li class="schoolschoolyear">
                            <a href="{{url('admin/school/schoolYearList')}}">
                                <i class="icon-double-angle-right"></i>
                                学校年度表
                            </a>
                        </li>
                        @endlevel

                        @level(3)
                        <li class="schoolschoolterm">
                            <a href="{{url('admin/school/schoolTermList')}}">
                                <i class="icon-double-angle-right"></i>
                                学期表
                            </a>
                        </li>
                        @endlevel
                        @level(3)
                        <li class="schoolschoolgrade">
                            <a href="{{url('admin/school/schoolGradeList')}}">
                                <i class="icon-double-angle-right"></i>
                                年级表
                            </a>
                        </li>
                        @endlevel

                        @level(2)
                        <li class="schoolschoolclass">
                            <a href="{{url('admin/school/schoolClassList')}}">
                                <i class="icon-double-angle-right"></i>
                                班级表
                            </a>
                        </li>
                        @endlevel

                        @level(3)
                        <li class="basesetdepartment">
                            <a href="{{url('admin/baseset/departmentList')}}">
                                <i class="icon-double-angle-right"></i>
                                学校部门设置
                            </a>
                        </li>
                        @endlevel

                        @level(3)
                        <li class="basesetclassroom">
                            <a href="{{url('admin/baseset/classroomList')}}">
                                <i class="icon-double-angle-right"></i>
                                学校教室设置
                            </a>
                        </li>
                        @endlevel

                        @level(3)
                        <li class="basesetsubject">
                            <a href="{{url('admin/baseset/subjectList')}}">
                                <i class="icon-double-angle-right"></i>
                                学校学科设置
                            </a>
                        </li>
                        @endlevel

                        @level(3)
                        <li class="basesetteachgroup">
                            <a href="{{url('admin/baseset/teachgroupList')}}">
                                <i class="icon-double-angle-right"></i>
                                学校教研组设置
                            </a>
                        </li>
                        @endlevel


                    </ul>
                </li>
                @endlevel

                @level(3)
                        <!--教师分组-->
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> 教师分组管理 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">


                        @level(3)
                        <li class="teachergroupteachdep">
                            <a href="{{url('admin/teachergroup/teachdepList')}}">
                                <i class="icon-double-angle-right"></i>
                                部门分组
                            </a>
                        </li>
                        @endlevel

                        @level(3)
                        <li class="teachergroupteachgrade">
                            <a href="{{url('admin/teachergroup/teachgradeList')}}">
                                <i class="icon-double-angle-right"></i>
                                年级分组
                            </a>
                        </li>
                        @endlevel

                        @level(2)
                        <li class="teachergroupteachsubject">
                            <a href="{{url('admin/teachergroup/teachsubjectList')}}">
                                <i class="icon-double-angle-right"></i>
                                学科分组
                            </a>
                        </li>
                        @endlevel

                    </ul>
                </li>
                @endlevel

                @level(2)
                        <!--学校岗位设置-->
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> 岗位设置管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>


                    <ul class="submenu">
                        @level(3)
                        <li class="schoolschoolteacher">
                            <a href="{{url('admin/school/schoolTeacherList')}}">
                                <i class="icon-double-angle-right"></i>
                                任课老师表
                            </a>
                        </li>
                        @endlevel

                        @level(2)
                        <li class="schoolschoolheadteaher">
                            <a href="{{url('admin/school/schoolHeadteaherList')}}">
                                <i class="icon-double-angle-right"></i>
                                班主任表
                            </a>
                        </li>
                        @endlevel

                        @level(3)
                        <li class="schoolschoolgradeleader">
                            <a href="{{url('admin/school/schoolGradeleaderList')}}">
                                <i class="icon-double-angle-right"></i>
                                年级组长表
                            </a>
                        </li>

                        <li class="schoolschooldepartmentleader">
                            <a href="{{url('admin/school/schoolDepartmentleaderList')}}">
                                <i class="icon-double-angle-right"></i>
                                部门负责人表
                            </a>
                        </li>

                        <li class="schoolschoolteacgroupleader">
                            <a href="{{url('admin/school/schoolTeacgroupleaderList')}}">
                                <i class="icon-double-angle-right"></i>
                                教研组长表
                            </a>
                        </li>

                        <li class="schoolschoollessonleader">
                            <a href="{{url('admin/school/schoolLessonleaderList')}}">
                                <i class="icon-double-angle-right"></i>
                                备课组长表
                            </a>
                        </li>
                        @endlevel

                    </ul>

                </li>
                @endlevel


                @level(3)
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> 毕业升级管理 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li class="graduationgraduation">
                            <a href="{{url('admin/graduation/graduationList')}}">
                                <i class="icon-double-angle-right"></i>
                                毕业升级
                            </a>
                        </li>

                        <li class="graduationleavestudents">
                            <a href="{{url('admin/graduation/leaveStudentsList')}}">
                                <i class="icon-double-angle-right"></i>
                                离校学生
                            </a>
                        </li>

                    </ul>

                </li>
                @endlevel

            </ul><!-- /.nav-list -->

            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left"
                   data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try {
                    ace.settings.check('sidebar', 'collapsed')
                } catch (e) {
                }
            </script>
        </div>

        <div class="main-content">
            @yield('content')
        </div>

        <div class="ace-settings-container" id="ace-settings-container">

            <div class="ace-settings-box" id="ace-settings-box">
                <div>
                    <div class="pull-left">
                        <select id="skin-colorpicker" class="hide">
                            <option data-skin="default" value="#438EB9">#438EB9</option>
                            <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                            <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                            <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                        </select>
                    </div>
                    <span>&nbsp; 选择皮肤</span>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar"/>
                    <label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar"/>
                    <label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs"/>
                    <label class="lbl" for="ace-settings-breadcrumbs">固定面包屑</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl"/>
                    <label class="lbl" for="ace-settings-rtl">切换到左边</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container"/>
                    <label class="lbl" for="ace-settings-add-container">
                        切换窄屏
                        <b></b>
                    </label>
                </div>
            </div>
        </div><!-- /#ace-settings-container -->
    </div><!-- /.main-container-inner -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<!--<script src="assets/js/jquery-2.0.3.min.js"></script>-->
<script src="{{asset('admin/js/jquery-2.0.3.min.js')}}"></script>
<!-- <![endif]-->

<!--[if IE]>
<script src="{{asset('admin/js/jquery-1.10.2.min.js')}}"></script>
<![endif]-->

<!--[if !IE]> -->
<script>
    var url = window.location.href;
    var param = url.split('admin/');
    var route = (param[param.length - 1]).toLowerCase();
    var first = route.split('/')[(route.split('/').length - 2)];
    var second = route.split('/')[(route.split('/').length - 3)];
    if(route.match(/\//g)){
        if (route.match(/\//g).length == '1') { // 一个‘/’
            route = route.split('/')[route.split('/').length - 1];
            if (route.indexOf('?') > 0) { // 一个‘/’ 一个‘？’
                var real = route.split('?')[route.split('?').length - 2];
                if (first == 'resource') { // 资源多级菜单
                    $('.' + first + real.slice(0, -4)).parent().parent().parent().parent().parent().addClass('open');
                    $('.' + first + real.slice(0, -4)).parent().parent().parent().parent().addClass('open');
                    $('.' + first + real.slice(0, -4)).parent().parent().parent().parent().parent().css('display', 'block');
                    $('.' + first + real.slice(0, -4)).parent().parent().parent().css('display', 'block');
                    $('.' + first + real.slice(0, -4)).parent().parent().addClass('open');
                    $('.' + first + real.slice(0, -4)).parent().parent().css('display', 'block');
                    $('.' + first + real.slice(0, -4)).parent().css('display', 'block');
                    $('.' + first + real.slice(0, -4)).addClass('active');

                    $('.' + first + real.slice(4)).parent().parent().parent().parent().parent().addClass('open');
                    $('.' + first + real.slice(4)).parent().parent().parent().parent().addClass('open');
                    $('.' + first + real.slice(4)).parent().parent().parent().parent().parent().css('display', 'block');
                    $('.' + first + real.slice(4)).parent().parent().parent().css('display', 'block');
                    $('.' + first + real.slice(4)).parent().parent().addClass('open');
                    $('.' + first + real.slice(4)).parent().parent().css('display', 'block');
                    $('.' + first + real.slice(4)).parent().css('display', 'block');
                    $('.' + first + real.slice(4)).addClass('active');
                } else {
                    $('.' + first + real.slice(0, -4)).parent().parent().addClass('open');
                    $('.' + first + real.slice(0, -4)).parent().css('display', 'block');
                    $('.' + first + real.slice(0, -4)).addClass('active');
                    $('.' + first + real.slice(4)).parent().parent().addClass('open');
                    $('.' + first + real.slice(4)).parent().css('display', 'block');
                    $('.' + first + real.slice(4)).addClass('active');
                }
            } else { // 仅一个‘/’
                if (first == 'resource') { // 资源一个 ‘/’
                    $('.' + first + route.slice(0, -4)).parent().parent().parent().parent().parent().addClass('open');
                    $('.' + first + route.slice(0, -4)).parent().parent().parent().parent().addClass('open');
                    $('.' + first + route.slice(0, -4)).parent().parent().parent().parent().parent().css('display', 'block');
                    $('.' + first + route.slice(0, -4)).parent().parent().parent().css('display', 'block');
                    $('.' + first + route.slice(0, -4)).parent().parent().addClass('open');
                    $('.' + first + route.slice(0, -4)).parent().parent().css('display', 'block');
                    $('.' + first + route.slice(0, -4)).parent().css('display', 'block');
                    $('.' + first + route.slice(0, -4)).addClass('active');

                    $('.' + first + route.slice(4)).parent().parent().parent().parent().parent().addClass('open');
                    $('.' + first + route.slice(4)).parent().parent().parent().parent().addClass('open');
                    $('.' + first + route.slice(4)).parent().parent().parent().parent().parent().css('display', 'block');
                    $('.' + first + route.slice(4)).parent().parent().parent().css('display', 'block');
                    $('.' + first + route.slice(4)).parent().parent().addClass('open');
                    $('.' + first + route.slice(4)).parent().parent().css('display', 'block');
                    $('.' + first + route.slice(4)).parent().css('display', 'block');
                    $('.' + first + route.slice(4)).addClass('active');

                    if (route == 'resourceadd') {
                        $('.resourceadd').parent().parent().addClass('open');
                        $('.resourceadd').parent().css('display', 'block');
                        $('.resourceadd').addClass('active');
                    } else if (route == 'sectionadd' || route == 'subjectadd' || route == 'editionadd' || route == 'gradeadd' || route == 'chapteradd' || route == 'expandresseladd') {
                        $('.' + route).parent().parent().parent().parent().parent().addClass('open');
                        $('.' + route).parent().parent().parent().parent().addClass('open');
                        $('.' + route).parent().parent().parent().parent().parent().css('display', 'block');
                        $('.' + route).parent().parent().parent().css('display', 'block');
                        $('.' + route).parent().parent().addClass('open');
                        $('.' + route).parent().parent().css('display', 'block');
                        $('.' + route).parent().css('display', 'block');
                        $('.' + route).addClass('active');
                    }
                } else { // 一个‘/’
                    if (route == 'addsuser') {
                        $('.' + first + route.slice(0, 4)).parent().parent().addClass('open');
                        $('.' + first + route.slice(0, 4)).parent().css('display', 'block');
                        $('.' + first + route.slice(0, 4)).addClass('active');
                    } else if (route == 'addevaluattype' || route == 'addrole' || route == 'addpermission' || route == 'addnews' || route == 'addnewstype' || route == 'addschool' || route == 'addschoolyear' || route == 'addschoolterm' || route == 'addschoolgrade' || route == 'addschoolclass' || route == 'addteachdep' || route == 'addteachgrade' || route == 'addteachsubject' || route == 'addschoolteacher' || route == 'addschoolheadteaher' || route == 'addschoolgradeleader' || route == 'addschooldepartmentleader' || route == 'addschoolteacgroupleader' || route == 'addschoollessonleader') {
                        $('.' + first + route.slice(0, -3)).parent().parent().addClass('open');
                        $('.' + first + route.slice(0, -3)).parent().css('display', 'block');
                        $('.' + first + route.slice(0, -3)).addClass('active');
                        $('.' + first + route.slice(3)).parent().parent().addClass('open');
                        $('.' + first + route.slice(3)).parent().css('display', 'block');
                        $('.' + first + route.slice(3)).addClass('active');
                    } else if (route == 'addmicro') {
                        $('.microlessonmicrolesson').parent().parent().addClass('open');
                        $('.microlessonmicrolesson').parent().css('display', 'block');
                    } else if (route == 'addsubject') {
                        $('.microlessonmicrolessoncategory').parent().parent().addClass('open');
                        $('.microlessonmicrolessoncategory').parent().css('display', 'block');
                        $('.microlessonmicrolessoncategory').addClass('active');
                    } else if (route == 'persondetail') {
                        $('.usersdetail').parent().parent().addClass('open');
                        $('.usersdetail').parent().css('display', 'block');
                        $('.usersdetail').addClass('active');
                    } else {
                        $('.' + first + route.slice(0, -4)).parent().parent().addClass('open');
                        $('.' + first + route.slice(0, -4)).parent().css('display', 'block');
                        $('.' + first + route.slice(0, -4)).addClass('active');
                        $('.' + first + route.slice(4)).parent().parent().addClass('open');
                        $('.' + first + route.slice(4)).parent().css('display', 'block');
                        $('.' + first + route.slice(4)).addClass('active');
                    }
                }

            }
        } else if (route.match(/\//g).length == '2') { // 2个‘/’
            route = route.split('/')[route.split('/').length - 2];
            if (second == 'resource') {
                if (route == 'resourcecomment') {
                    $('.resourceresource').parent().parent().addClass('open');
                    $('.resourceresource').parent().css('display', 'block');
                }
                $('.' + second + route.slice(0, -4)).parent().parent().parent().parent().parent().addClass('open');
                $('.' + second + route.slice(0, -4)).parent().parent().parent().parent().addClass('open');
                $('.' + second + route.slice(0, -4)).parent().parent().parent().parent().parent().css('display', 'block');
                $('.' + second + route.slice(0, -4)).parent().parent().parent().css('display', 'block');
                $('.' + second + route.slice(0, -4)).parent().parent().addClass('open');
                $('.' + second + route.slice(0, -4)).parent().parent().css('display', 'block');
                $('.' + second + route.slice(0, -4)).parent().css('display', 'block');
                $('.' + second + route.slice(0, -4)).addClass('active');

                $('.' + second + route.slice(4)).parent().parent().parent().parent().parent().addClass('open');
                $('.' + second + route.slice(4)).parent().parent().parent().parent().addClass('open');
                $('.' + second + route.slice(4)).parent().parent().parent().parent().parent().css('display', 'block');
                $('.' + second + route.slice(4)).parent().parent().parent().css('display', 'block');
                $('.' + second + route.slice(4)).parent().parent().addClass('open');
                $('.' + second + route.slice(4)).parent().parent().css('display', 'block');
                $('.' + second + route.slice(4)).parent().css('display', 'block');
                $('.' + second + route.slice(4)).addClass('active');
            } else if (route == 'show' || route == 'resetpass') {
                $('.usersuser').parent().parent().addClass('open');
                $('.usersuser').parent().css('display', 'block');
            } else if (route == 'checkrolepermission' || route == 'addrolepermission') {
                $('.authrole').parent().parent().addClass('open');
                $('.authrole').parent().css('display', 'block');
            } else if (route == 'checkpermissions' || route == 'adduserpermission') {
                $('.authclassmanager').parent().parent().addClass('open');
                $('.authclassmanager').parent().css('display', 'block');
            } else if (route == 'detailmicrolesson') {
                $('.microlessonmicrolesson').parent().parent().addClass('open');
                $('.microlessonmicrolesson').parent().css('display', 'block');
                $('.microlessonmicrolesson').addClass('active');
            } else if (route == 'newsdetail') {
                $('.newsnews').parent().parent().addClass('open');
                $('.newsnews').parent().css('display', 'block');
                $('.newsnews').addClass('active');
            } else if (route == 'detailcomment') {
                $('.microlessonmicrolessoncomment').parent().parent().addClass('open');
                $('.microlessonmicrolessoncomment').parent().css('display', 'block');
                $('.microlessonmicrolessoncomment').addClass('active');
            } else if (route == 'listgrade' || route == 'listsubject' || route == 'editgrade' || route == 'editsubject') {
                $('.microlessonmicrolessoncategory').parent().parent().addClass('open');
                $('.microlessonmicrolessoncategory').parent().css('display', 'block');
                $('.microlessonmicrolessoncategory').addClass('active');
            } else {
                $('.' + second + route.slice(0, -4)).parent().parent().addClass('open');
                $('.' + second + route.slice(0, -4)).parent().css('display', 'block');
                $('.' + second + route.slice(0, -4)).addClass('active');
                $('.' + second + route.slice(4)).parent().parent().addClass('open');
                $('.' + second + route.slice(4)).parent().css('display', 'block');
                $('.' + second + route.slice(4)).addClass('active');
            }
        } else if (route.match(/\//g).length == '4') {
            var auth = route.split('/')[route.split('/').length - 5];
            route = route.split('/')[route.split('/').length - 1];
            $('.' + auth + route.slice(0, -4)).parent().parent().addClass('open');
            $('.' + auth + route.slice(0, -4)).parent().css('display', 'block');
            $('.' + auth + route.slice(0, -4)).addClass('active');
        } else if (route.match(/\//g).length == '3') {
            route = route.split('/')[route.split('/').length - 3];
            if(route == 'checkmanagers' || route == 'addmanager'){
                $('.schoolschoolclass').parent().parent().addClass('open');
                $('.schoolschoolclass').parent().css('display', 'block');
            }
        }
    }

</script>
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{asset("admin/js/jquery-2.0.3.min.js")}}'>" + "<" + "script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>" + "<" + "script>");
</script>
<![endif]-->

<script type="text/javascript">
    if ("ontouchend" in document) document.write("<script src='{{asset("admin/js/jquery.mobile.custom.min.js")}}'>" + "<" + "script>");
</script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/typeahead-bs2.min.js')}}"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="{{asset('admin/js/excanvas.min.js')}}"></script>

<![endif]-->

<script src="{{asset('admin/js/jquery-ui-1.10.3.custom.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.easy-pie-chart.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('admin/js/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('admin/js/flot/jquery.flot.pie.min.js')}}"></script>
<script src="{{asset('admin/js/flot/jquery.flot.resize.min.js')}}"></script>

<!-- ace scripts -->

<script src="{{asset('admin/js/ace-elements.min.js')}}"></script>


<!-- inline scripts related to this page -->
<script type="text/javascript" src="{{asset('js/qiyun/angular/frame/angular.min.js') }}"></script>
<script type="text/javascript" src="{{asset('js/qiyun/angular/app.js') }}"></script>
<script type="text/javascript" src="{{asset('js/qiyun/angular/frame/tm.pagination.js') }}"></script>
<script type="text/javascript" src="{{asset('js/qiyun/angular/frame/tm.paginationb.js') }}"></script>

@yield('js')
<script src="{{asset('admin/js/ace.min.js')}}"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $('.easy-pie-chart.percentage').each(function () {
            var $box = $(this).closest('.infobox');
            var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
            var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
            var size = parseInt($(this).data('size')) || 50;
            $(this).easyPieChart({
                barColor: barColor,
                trackColor: trackColor,
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: parseInt(size / 10),
                animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
                size: size
            });
        })

        $('.sparkline').each(function () {
            var $box = $(this).closest('.infobox');
            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
            $(this).sparkline('html', {
                tagValuesAttribute: 'data-values',
                type: 'bar',
                barColor: barColor,
                chartRangeMin: $(this).data('min') || 0
            });
        });


        var placeholder = $('#piechart-placeholder').css({'width': '90%', 'min-height': '150px'});
        var data = [
            {label: "social networks", data: 38.7, color: "#68BC31"},
            {label: "search engines", data: 24.5, color: "#2091CF"},
            {label: "ad campaigns", data: 8.2, color: "#AF4E96"},
            {label: "direct traffic", data: 18.6, color: "#DA5430"},
            {label: "other", data: 10, color: "#FEE074"}
        ]

        function drawPieChart(placeholder, data, position) {
            $.plot(placeholder, data, {
                series: {
                    pie: {
                        show: true,
                        tilt: 0.8,
                        highlight: {
                            opacity: 0.25
                        },
                        stroke: {
                            color: '#fff',
                            width: 2
                        },
                        startAngle: 2
                    }
                },
                legend: {
                    show: true,
                    position: position || "ne",
                    labelBoxBorderColor: null,
                    margin: [-30, 15]
                }
                ,
                grid: {
                    hoverable: true,
                    clickable: true
                }
            })
        }

        drawPieChart(placeholder, data);

        /**
         we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
         so that's not needed actually.
         */
        placeholder.data('chart', data);
        placeholder.data('draw', drawPieChart);


        var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
        var previousPoint = null;

        placeholder.on('plothover', function (event, pos, item) {
            if (item) {
                if (previousPoint != item.seriesIndex) {
                    previousPoint = item.seriesIndex;
                    var tip = item.series['label'] + " : " + item.series['percent'] + '%';
                    $tooltip.show().children(0).text(tip);
                }
                $tooltip.css({top: pos.pageY + 10, left: pos.pageX + 10});
            } else {
                $tooltip.hide();
                previousPoint = null;
            }

        });


        var d1 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d1.push([i, Math.sin(i)]);
        }

        var d2 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d2.push([i, Math.cos(i)]);
        }

        var d3 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.2) {
            d3.push([i, Math.tan(i)]);
        }


        var sales_charts = $('#sales-charts').css({'width': '100%', 'height': '220px'});
        $.plot("#sales-charts", [
            {label: "Domains", data: d1},
            {label: "Hosting", data: d2},
            {label: "Services", data: d3}
        ], {
            hoverable: true,
            shadowSize: 0,
            series: {
                lines: {show: true},
                points: {show: true}
            },
            xaxis: {
                tickLength: 0
            },
            yaxis: {
                ticks: 10,
                min: -2,
                max: 2,
                tickDecimals: 3
            },
            grid: {
                backgroundColor: {colors: ["#fff", "#fff"]},
                borderWidth: 1,
                borderColor: '#555'
            }
        });


        $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('.tab-content')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            var w2 = $source.width();

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
            return 'left';
        }


        $('.dialogs,.comments').slimScroll({
            height: '300px'
        });


        //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
        //so disable dragging when clicking on label
        var agent = navigator.userAgent.toLowerCase();
        if ("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
            $('#tasks').on('touchstart', function (e) {
                var li = $(e.target).closest('#tasks li');
                if (li.length == 0)return;
                var label = li.find('label.inline').get(0);
                if (label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation();
            });

        $('#tasks').sortable({
                    opacity: 0.8,
                    revert: true,
                    forceHelperSize: true,
                    placeholder: 'draggable-placeholder',
                    forcePlaceholderSize: true,
                    tolerance: 'pointer',
                    stop: function (event, ui) {//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                        $(ui.item).css('z-index', 'auto');
                    }
                }
        );
        $('#tasks').disableSelection();
        $('#tasks input:checkbox').removeAttr('checked').on('click', function () {
            if (this.checked) $(this).closest('li').addClass('selected');
            else $(this).closest('li').removeClass('selected');
        });


    })

</script>
<script type="text/javascript">
    if ($('.alert').css('display') == 'block') {
        setTimeout(function () {
            $('.alert').slideUp(500);
        }, 3000);
    }
    ;
</script>
<!-- <div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div> -->
</body>
</html>

