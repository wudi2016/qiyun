@extends('qiyun.layouts.layoutHome')

@section('title','协同备课列表')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/lessonList.css') }}">
@endsection

@section('content')
    <!--  公共banner  -->
    <div id="makeGroup_banner"></div>
    <!-- 主图div -->
    <div class="clear"></div>
    <div class="posi">
        <a href="">
            <div class="li_home"></div>
        </a>
        <a href="">
            <div class="li_nxt"> 教研备课 > 协同备课列表</div>
        </a>
    </div>
    <div class="zhutu"></div>
    <div style="height:50px"></div>

    <!-- 主内容 main -->
    <div class="main" ng-controller="lessonListCtrl">
        <!-- 左main -->
        <div class="main_left">
            <div class="main_left_title">
                <span class="main_left_title_span1">最新备课主题</span>
            </div>

            <div class="main_left_content" ng-class="{disable: lessonListblock}" ng-repeat="l in lessonList">
                <!-- 图片 -->
                <div class="main_left_content_div1">
                    <a href="{{url('research/lessonDetail/{[l.id]}')}}"><img ng-src={[l.pic]} width="157" height="118" alt=""></a>
                </div>
                <!-- 文字信息 -->
                <div class="main_left_content_div2">
                    <div class="main_left_content_div2_1">
                        <a href="{{url('research/lessonDetail/{[l.id]}')}}" style="color: black"><span class="main_left_content_div2_span1" ng-bind="l.lessonName"></span></a>
                    </div>
                    <div class="main_left_content_div2_1_1">
                        <span class="main_left_content_div2_span1_1" ng-bind="l.lessonDesc"></span>
                    </div>
                    <div class="main_left_content_div2_2">
                        <span><font color="#5C8FD1" ng-bind=" '主备人：' + l.lessonAuthor"></font></span>
                    </div>
                    <div class="main_left_content_div2_3">
                        <div class="div2_3_img1">
                            <span ng-bind=" '文章：' + l.article"></span>
                        </div>
                        <div class="div2_3_img2">
                            <span ng-bind=" '资源：' + l.resource"></span>
                        </div>
                        <div class="div2_3_img3">
                            <span ng-bind=" '图片：' + l.images"></span>
                        </div>
                        <div class="div2_3_img3">
                            <span ng-bind=" '视频：' + l.videos"></span>
                        </div>
                    </div>
                </div>
                <!-- 申请加入按钮 -->
                <div class="main_left_content_div3">
                    <div class="main_left_content_img1" ng-click="applyInsert(l.id)"></div>
                    <div><span ng-bind="l.beginTime + ' 至 ' + l.endTime"></span></div>
                </div>
            </div>
            <div class="body_left_con body_left_con_now">
                <div class="li_page" style="padding-left:260px;padding-top: 50px;padding-bottom: 50px;">
                    <tm-pagination conf="paginationConf"></tm-pagination>
                </div>
            </div>
            <div class="spinner" style=" padding:150px 0px;" ng-class="{disable: lessonList}">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>

            <div id="errorMessage" ng-class="{disable: lessonListmsg}">数据加载失败，请尝试 <a ng-click="reload('lessonList');">刷新</a> 一下</div>
        </div>
        <!-- 右main -->
        <div class="main_right" ng-class="{disable: lessonCountblock}">
            <!-- 按钮 -->
            <div class="main_right_img1" ng-click="makeLesson();" style="cursor: pointer">
                <img src="/image/qiyun/research/lessonList/1.jpg" alt="">
            </div>
            <div style="height:40px"></div>
            <!-- 协作组统计 -->
            <div class="main_right_font1">
                <span>备课研究统计</span>
            </div>
            <div style="height:18px"></div>
            <div ng-class="{disable: countblock}" class="right_font1_xz">
                <ul>
                    <li><span class="right_span_xz2" ng-bind="'备课主题 : ' + lessonCount.subjects"></span></li>
                    <li><span class="right_span2_xz2" ng-bind="'共案数量 : ' + lessonCount.cases"></span></li>
                    <li><span class="right_span3_xz2" ng-bind="'资源 : ' + lessonCount.resources"></span></li>
                    <li><span class="right_span4_xz2" ng-bind="'文章 : ' + lessonCount.articles"></span></li>
                    <li><span class="right_span4_xz2" ng-bind="'图片 : ' + lessonCount.images"></span></li>
                    <li><span class="right_span4_xz2" ng-bind="'视频 : ' + lessonCount.videos"></span></li>
                    <li><span class="right_span4_xz2" ng-bind="'话题 : ' + lessonCount.topics"></span></li>
                </ul>
            </div>
            <div class="spinner" ng-class="{disable: lessonCount}">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
            <div id="errorMessage" style="padding:10px 0px;"  ng-class="{disable: lessonCountmsg}">数据加载失败，请尝试 <a ng-click="reload('lessonCount');">刷新</a> 一下</div>
        </div>
        <div class="clear"></div>
        <div id="apply_content">
            <input type="hidden" name="resourceId" ng-model="postdata.resourceId"/>
            <div class="apply_top">
                <span>申请理由</span>
            </div>
            <div class="apply_mid">
                <textarea name="messageTitle" ng-model="postdata.messageTitle"></textarea>
            </div>
            <div class="apply_bot">
                <span ng-click="sureApply();">确定</span>
                <span>取消</span>
            </div>
        </div>
        <div id="shadow"></div>
    </div>

    <!-- 主体部分结束 -->
@endsection

@section('js')
    <script src="{{ URL::asset('js/qiyun/angular/controller/lessonListController.js') }}"></script>
@endsection
