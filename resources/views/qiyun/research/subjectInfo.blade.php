{{--Created by PhpStorm.--}}
{{--User: Mr.H--}}
{{--Date: 2016/2/1--}}
{{--Time: 15:38--}}
@extends('qiyun.layouts.layoutHome')

@section('title','教研主题研讨详细信息')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/subjectInfo.css') }}">
    @endsection

    @section('content')
            <!-- 主题研讨详细信息开始 -->
    <!-- 搜索下的空白23px -->
    <div class="clear"></div>
    <div class="main_list">
        <div class="main_head">
            <div class="clear"></div>
            <div class="posi">
                <a href="">
                    <div class="li_home"></div>
                </a>
                <a href="">
                    <div class="li_nxt"> 教研备课 > 主题研讨详情</div>
                </a>
            </div>
            <div class="main_banner">
                <a href="#"><img src="/image/qiyun/research/subjectInfo/banner.png"/></a>
            </div>
            <div class="main_bott">
                <div class="main_bott_left">主题详情</div>
            </div>
        </div>
        <!-- 线下部分 -->
        <div class="main_link" ng-controller="subjectInfoCtrl">
            <!-- 左侧部分 -->
            <div class="main_left">
                <div class="main_div_head" ng-class="{disable: subjectInfolock}">
                    <div class="div_head_image">
                        <img src={[subjectInfo.pic]} width="157" height="115"/>
                    </div>
                    <div class="div_head_right">
                        <div class="div_title" ng-bind="subjectInfo.name" title="{[subjectInfo.name]}"></div>
                        <div class="div_title1" ng-class="{disable: subjectInfolock}"
                             ng-bind=" '发表日期：' + subjectInfo.create_at + '&nbsp;&nbsp;&nbsp;&nbsp;创建人：' + subjectInfo.author"></div>
                        <div class="div_title2" ng-class="{disable: subjectInfolock}"
                             ng-bind=" '专题导读：' + subjectInfo.describe" title="{[subjectInfo.describe]}"></div>
                    </div>
                </div>
                <div class="spinner" style="padding:80px 0px;float: left;width:690px;"
                     ng-class="{disable: subjectInfo}">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
                <div id="errorMessage" style="padding:80px 0px;float: left;width:690px;"
                     ng-class="{disable: subjectInfomsg}">数据加载失败，请尝试 <a ng-click="reload('subjectInfo');">刷新</a> 一下
                </div>

                <div class="clear"></div>
                <div class="main_middle">
                    <div class="middle_title">专题话题</div>
                </div>

                <div class="clear"></div>

                <div class="main_form">
                    <form action="/research/insertSubjectTopic" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="themeId" value="{[id]}"/>
                        <div class="form_input_text">
                            <input type="text" name="title" required/>
                        </div>
                        <div class="form_text_area">
                            <textarea cols="65" rows="8" style="resize: none;" name="content" required></textarea>
                        </div>
                        <div class="form_bott_text">
                            <div class="form_bott_text1">还可以输入140字</div>
                            <div class="form_bott_text2">
                                <button>发起话题</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="clear"></div>
                <div class="form_bott_div">
                    <div class="div_text"><span>主题图片</span><a href="/research/getSubjectImage/{[id]}" target="_blank">更多</a></div>
                    <div class="div_foreach">
                        <div class="div_each_small" ng-class="{disable: subjectImagelock}" ng-repeat="i in subjectImage">
                            <img ng-class="{disable: subjectImagelock}" src={[i.pic]} width="216" height="155"/>
                        </div>
                        <div class="spinner" style="padding:30px 0px;float: left;width:690px;"
                             ng-class="{disable: subjectImage}">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>
                        <div id="errorMessage" style="padding:30px 0px;float: left;width:690px;"
                             ng-class="{disable: subjectImagemsg}">数据加载失败，请尝试 <a
                                    ng-click="reload('subjectImage');">刷新</a> 一下
                        </div>
                        <span ng-bind="subjectImageError"></span>
                    </div>
                </div>

                <div class="clear"></div>
                <div class="title_bott">
                    <div class="titie_bott_article"><span>主题文章</span><a href="/research/subjectArticleList/{[id]}" target="_blank">更多</a></div>
                    <div class="title_bott_none" ng-class="{disable: subjectArticlelock}">
                        <ul>
                            <a ng-repeat="a in subjectArticle" href="/research/articleInfo/{[a.id]}" target="_blank"><li ng-bind="$index+1 + '.' + a.title"></li></a>
                        </ul>
                    </div>
                    <div class="spinner" style="padding:5px 0px;float: left;width:690px;"
                         ng-class="{disable: subjectArticle}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <div id="errorMessage" style="padding:5px 0px;margin-top:20px;float: left;width:690px;"
                         ng-class="{disable: subjectArticlemsg}">数据加载失败，请尝试 <a
                                ng-click="reload('subjectArticle');">刷新</a> 一下
                    </div>
                    <span class="subjectArticleError" ng-bind="subjectArticleError"></span>
                </div>

            </div>

            <!-- 右侧部分 -->
            <div class="main_right">
                <!-- 四个小方块（写文章。。。） -->
                <div class="right_float_div">
                    <div class="float_div_part1">
                        <a href="/research/subjectArticle/{[id]}">
                            <div class="div_part1_1"><img src="/image/qiyun/research/subjectInfo/3.png"/></div>
                        </a>
                        <a href="/research/subjectImage/{[id]}">
                            <div class="div_part1_2"><img src="/image/qiyun/research/subjectInfo/4.png"/></div>
                        </a>
                    </div>
                    <div class="float_div_part2">
                        <a href="/research/subjectAudio/{[id]}">
                            <div class="div_part2_3"><img src="/image/qiyun/research/subjectInfo/5.png"/></div>
                        </a>
                        <a href="/research/subjectResource/{[id]}">
                            <div class="div_part2_4"><img src="/image/qiyun/research/subjectInfo/6.png"/></div>
                        </a>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="main_bottom_sum">
                    <div class="bottom_sum_title">主题统计</div>
                    <div class="clear"></div>
                    <div ng-class="{disable: subjectCountlock}">
                        <div class="sum_title_part1">
                            <span class="title_part1_1"><img ng-class="{disable: subjectCountlock}"
                                                             src="/image/qiyun/research/subjectInfo/7.png"
                                                             alt=""></span>
                            <span class="title_part1_1" ng-class="{disable: subjectCountlock}"
                                  ng-bind=" '参与人数：' + subjectCount.peoplenum"></span>
                        </div>
                        <div class="sum_title_part2">
                            <span class="title_part1_1"><img ng-class="{disable: subjectCountlock}"
                                                             src="/image/qiyun/research/subjectInfo/8.png"
                                                             alt=""></span>
                            <span ng-class="{disable: subjectCountlock}"
                                  ng-bind=" '话题：' + subjectCount.topicnum"></span>
                        </div>
                        <div class="sum_title_part2">
                            <span class="title_part1_1"><img ng-class="{disable: subjectCountlock}"
                                                             src="/image/qiyun/research/subjectInfo/9.png"
                                                             alt=""></span>&nbsp;
                            <span ng-class="{disable: subjectCountlock}"
                                  ng-bind=" '文章：' + subjectCount.articlenum"></span>
                        </div>
                        <div class="sum_title_part2">
                            <span class="title_part1_1"><img ng-class="{disable: subjectCountlock}"
                                                             src="/image/qiyun/research/subjectInfo/10.png"
                                                             alt=""></span>&nbsp;
                            <span ng-class="{disable: subjectCountlock}"
                                  ng-bind=" '图片：' + subjectCount.imagesnum"></span>
                        </div>
                        <div class="sum_title_part2">
                            <span class="title_part1_1"><img ng-class="{disable: subjectCountlock}"
                                                             src="/image/qiyun/research/subjectInfo/11.png"
                                                             alt=""></span>&nbsp;
                            <span ng-class="{disable: subjectCountlock}"
                                  ng-bind=" '资源：' + subjectCount.resourcenum"></span>
                        </div>
                        <div class="sum_title_part2">
                            <span class="title_part1_1"><img ng-class="{disable: subjectCountlock}"
                                                             src="/image/qiyun/research/subjectInfo/12.png"
                                                             alt=""></span>&nbsp;
                            <span ng-class="{disable: subjectCountlock}"
                                  ng-bind=" '视频：' + subjectCount.videonum"></span>
                        </div>
                    </div>
                    <div class="spinner" style="padding:5px 0px;width:250px;" ng-class="{disable: subjectCount}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <div id="errorMessage" style="padding:5px 0px;width:250px;" ng-class="{disable: subjectCountmsg}">
                        数据加载失败，请尝试 <a ng-click="reload('subjectCount');">刷新</a> 一下
                    </div>
                </div>

                <div class="bott_bott1">
                    <div class="bottom_sum_title">专题资源<a href="/research/subjectResourceList/{[id]}" target="_blank">更多</a></div>
                    <div class="sum_line_bott bott1" ng-class="{disable: subjectResourcelock}">
                        <ul>
                            <div ng-repeat="r in subjectResource"><a href="/research/subjectResourceDetail/{[r.id]}"><li ng-bind="$index + 1 + '.' + r.name"></li></a></div>
                        </ul>
                    </div>
                    <div class="spinner" style="padding:5px 0px;width:250px;margin-top: 20px;"
                         ng-class="{disable: subjectResource}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <div id="errorMessage" style="padding:5px 0px;width:250px;margin-top: 20px;"
                         ng-class="{disable: subjectResourcemsg}">数据加载失败，请尝试 <a
                                ng-click="reload('subjectResource');">刷新</a> 一下
                    </div>
                    <span class="subjectResourceError" ng-bind="subjectResourceError"></span>
                </div>

                <div class="bott_bott1">
                    <div class="bottom_sum_title">相关视频<a href="/research/subjectVideoList/{[id]}" target="_blank">更多</a></div>
                    <div class="sum_line_bott bott1" ng-class="{disable: subjectVideolock}">
                        <ul>
                            <div ng-repeat="v in subjectVideo"><a href="/research/subjectVideoDetail/{[v.id]}"><li ng-bind="$index + 1 + '.' + v.name"></li></a></div>
                        </ul>
                    </div>
                    <div class="spinner" style="padding:5px 0px;width:250px;" ng-class="{disable: subjectVideo}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <div id="errorMessage" style="padding:5px 0px;width:250px;margin-top: 20px;"
                         ng-class="{disable: subjectVideomsg}">数据加载失败，请尝试 <a ng-click="reload('subjectVideo');">刷新</a>
                        一下
                    </div>
                    <span class="subjectVideoError" ng-bind="subjectVideoError"></span>
                </div>

                <div class="bott_bott1">
                    <div class="bottom_sum_title">主题话题<a href="/research/subjectTopicList/{[id]}" target="_blank">更多</a></div>
                    <div class="sum_line_bott bott1" ng-class="{disable: subjectTopiclock}">
                        <ul>
                            <a ng-repeat="v in subjectTopic" href="/research/topicInfo/{[v.id]}" target="_blank"><li ng-bind="$index + 1 + '.' + v.title"></li></a>
                        </ul>
                    </div>
                    <div class="spinner" style="padding:5px 0px;width:250px;" ng-class="{disable: subjectTopic}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <div id="errorMessage" style="padding:5px 0px;width:250px;margin-top: 20px;"
                         ng-class="{disable: subjectTopicmsg}">数据加载失败，请尝试 <a ng-click="reload('subjectTopic');">刷新</a>
                        一下
                    </div>
                    <span class="subjectTopicError" ng-bind="subjectTopicError"></span>
                </div>

            </div>
        </div>
    </div>
    <!-- 主题研讨详细信息结束 -->
@endsection

@section('js')
    <script>
        var status = {!! session('status') !!};
        if (status == '2') {
            alert('添加失败');
        } else if (status == '3') {
            alert('请先登录');
            location.href = '/';
        }
    </script>
    <script type="text/javascript"
            src="{{ URL::asset('js/qiyun/angular/controller/subjectInfoController.js') }}"></script>
@endsection