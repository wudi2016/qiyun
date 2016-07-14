@extends('qiyun.layouts.layoutHome')

@section('title','教研协作组列表')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/groupList.css') }}">
    @endsection

    @section('content')
            <!--  公共banner  -->
    <div id="makeGroup_banner"></div>
    <!--  教研组列表页  -->
    <div class="clear"></div>
    <div class="posi">
        <a href="">
            <div class="li_home"></div>
        </a>
        <a href="">
            <div class="li_nxt"> 教研备课 > 教研协作组列表</div>
        </a>
    </div>
    <!-- 主图div -->
    <div class="zhutu"></div>
    <div style="height:50px"></div>



    <!-- 主内容 main -->
    <div class="main" ng-controller="groupListCtrl">
        <!-- 左main -->
        <div class="main_left">
            <div class="main_left_title">
                <span class="main_left_title_span1">协作组列表</span>
            </div>

            <div class="main_left_content" ng-class="{disable: groupListblock}" ng-repeat="g in groupList">
                <!-- 图片 -->
                <div class="main_left_content_div1">
                    <a href="{{url('research/techGroupInfo/{[g.id]}')}}"><img ng-src={[g.pic]} width="157" height="118"
                                                                              alt=""></a>
                </div>
                <!-- 文字信息 -->
                <div class="main_left_content_div2">
                    <div class="main_left_content_div2_1">
                        <a href="{{url('research/techGroupInfo/{[g.id]}')}}"><span ng-bind="g.techResearchName"></span></a>
                    </div>
                    <div class="main_left_content_div2_2">
                        <span>创始人:  <font color="#5C8FD1" ng-bind="g.author"></font></span>
                    </div>
                    <div class="main_left_content_div2_3">
                        <div>
                            <span ng-bind=" '成员：' + g.member"></span>
                        </div>
                        <div class="div2_3_img2">
                            <span ng-bind=" '协备：' + g.xiebei"></span>
                        </div>
                        {{--                    <div class="div2_3_img3">                                       --}}
                        {{--                            <span ng-bind=" '评课：' + g.pingke"></span>            --}}
                        {{--                        </div>                                                      --}}
                    </div>
                </div>
                <!-- 申请加入按钮 -->


                <div class="main_left_content_div3" ng-if="g.isOpen == 0">
                    <div class="main_left_content_img1" ng-click="applyInsert(g.id)"></div>
                </div>
                <div class="main_left_content_div3" ng-if="g.isOpen == 1">
                    <div><span ng-click="directApply(g.id)" class="direct_insert"> + 直接加入</span></div>
                </div>
            </div>

            <div class="body_left_con body_left_con_now">
                <div class="li_page" style="padding-left:260px;padding-top: 50px;padding-bottom: 50px;">
                    <tm-pagination conf="paginationConf"></tm-pagination>
                </div>
            </div>

            <div class="spinner" style=" padding:150px 0px;" ng-class="{disable: groupList}">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
            <div id="errorMessage" ng-class="{disable: groupListmsg}">数据加载失败，请尝试 <a
                        ng-click="reload('groupList');">刷新</a> 一下
            </div>
        </div>
        <!-- 右main -->
        <div class="main_right">
            <!-- 按钮 -->
            <div class="main_right_img1" ng-click="makeGroup();" style="cursor: pointer">
                <img src="/image/qiyun/research/groupList/7.png" alt="">
            </div>
            <div style="height:40px"></div>
            <!-- 协作组统计 -->
            <div class="main_right_font1">
                <span>协作组统计</span>
            </div>
            <div style="height:18px"></div>
            <div ng-class="{disable: countblock}" class="right_font1_xz">
                <ul>
                    <li><span class="right_span_xz2" ng-bind="'协作组总数: ' + count.groupNum"></span></li>
                    <li><span class="right_span2_xz2" ng-bind="'成员总数: ' + count.memberNum"></span></li>
                    <li><span class="right_span3_xz2" ng-bind="'协备: ' + count.xiebeiNum"></span></li>
                    {{--    <li><span class="right_span4_xz2" ng-bind="'评课: ' + count.pinkeNum"></span></li>  --}}
                </ul>
            </div>
            <div class="spinner" ng-class="{disable: count}">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
            <div id="errorMessage" style="padding:10px 0px;" ng-class="{disable: countmsg}">数据加载失败，请尝试 <a
                        ng-click="reload('count');">刷新</a> 一下
            </div>
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
    <script src="{{ URL::asset('js/qiyun/angular/controller/groupListController.js') }}"></script>
@endsection
