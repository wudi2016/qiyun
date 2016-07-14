@extends('qiyun.layouts.layoutHome')

@section('title','教研评课列表')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/evaluationList.css') }}">
@endsection

@section('content')

    <!-- 评课列表页开始 -->
    <!-- 搜索下的空白23px -->
    <div class="clear"></div>
    <div class="main_list" ng-controller="evaluationListCtrl">
        <div class="main_head">
            <div class="clear"></div>
            <div class="posi">
                <a href="">
                    <div class="li_home"></div>
                </a>
                <a href="">
                    <div class="li_nxt"> 教研备课 > 教研评课列表</div>
                </a>
            </div>
            <div class="main_banner">
                <a href="#"><img src="/image/qiyun/research/evaluationList/banner.png"/></a>
            </div>
            <div class="main_bott">
                <div class="main_bott_left">评课议课</div>
                <div class="main_bott_right" ng-click="addEvaluation();" style="cursor: pointer"><img src="/image/qiyun/research/evaluationList/2.png"/><span>发起评课</span></div>
            </div>
        </div>
        <!-- 线下部分 -->
        <div class="main_link">
            <!-- div部分 -->
            <div class="main_foreach">
                <!-- di一行div -->
                <div class="main_foreach_div">
                    <!-- 每一个小div -->
                    <div class="main_foreach_div1" ng-repeat="e in evaluation" ng-class="{disable: evaluationblock}" ng-class="{[sClass]}">
                        <div class="main_foreach_div1-1"><a href="/research/evaluationInfo/{[e.id]}" ng-bind="e.evaluationName"></a></div>
                        <div class="main_foreach_divsmall">
                            <div class="main_foreach_div1-2">
                                <a href="/research/evaluationInfo/{[e.id]}"><img ng-src={[e.pic]}/ width="120" height="120"></a>
                            </div>
                            <div class="main_foreach_div1-3">
                                <div ng-bind=" '所属分类：' + e.typeName "></div>
                                <div ng-bind=" '授课人：' + e.teacherName"></div>
                                <div>评课时间段：</div>
                                <div ng-bind=" e.start_time + '至' + e.end_time "></div>
                                <div class="main_foreach_div1-4">
                                    <img src="/image/qiyun/research/evaluationList/7.png"/>
                                    <img src="/image/qiyun/research/evaluationList/7.png"/>
                                    <img src="/image/qiyun/research/evaluationList/7.png"/>
                                    <img src="/image/qiyun/research/evaluationList/7.png"/>
                                    <img src="/image/qiyun/research/evaluationList/8.png"/>
                                    <span class="main_foreach_div1-5" ng-bind="e.score"></span>
                                    <span ng-bind="'（' + e.nums + '）'"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="body_left_con body_left_con_now">
                        <div class="li_page" style="padding-left:300px;padding-top: 50px;padding-bottom: 50px;">
                            <tm-pagination conf="paginationConf"></tm-pagination>
                        </div>
                    </div>
                    <div class="spinner" style=" padding:230px 0px;" ng-class="{disable: evaluation}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <div id="errorMessage" style="padding:230px 0px;"  ng-class="{disable: evaluationmsg}">数据加载失败，请尝试 <a ng-click="reload('evaluation');">刷新</a> 一下</div>
                </div>
            </div>
        </div>
    </div>
        <!-- 评课列表结束 -->
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/evaluationListController.js') }}"></script>
@endsection