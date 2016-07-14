{{--Created by PhpStorm.--}}
{{--User: Mr.H--}}
{{--Date: 2016/1/25--}}
{{--Time: 16:18--}}
@extends('qiyun.layouts.layoutHome')

@section('title','教研评课详情')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/evaluationInfo.css') }}">
    @endsection

    @section('content')
            <!-- 评课详情开始 -->
    <!-- 搜索下的空白23px -->
    <div class="clear"></div>
    <div class="main_list" ng-controller="evaluationInfoCtrl">
        <div class="main_head">
            <div class="clear"></div>
            <div class="posi">
                <a href="">
                    <div class="li_home"></div>
                </a>
                <a href="">
                    <div class="li_nxt"> 教研备课 > 评课议课 > 评课详情</div>
                </a>
            </div>
            <div class="main_banner">
                <a href="#"><img src="/image/qiyun/research/evaluationInfo/banner.png"/></a>
            </div>
            <div class="main_bott">
                <div class="main_bott_left">评课详情</div>
            </div>
        </div>

        <!-- 线下部分 -->
        <div class="main_link">
            <div class="main_lesson">
                <div class="main_shancha" ng-bind="evaluationInfo.evaluationName"></div>
                <div class="main_shouke">
                    <div class="main_image">
                        <img src={[evaluationInfo.teacherPic]} width="100" height="110"/>
                        <img src="/image/qiyun/research/evaluationInfo/2.png" class="main_image_2"/>
                    </div>
                    <div class="main_image_right">
                        <div class="main_image_right_1">
                            <span style="color:5AAFEF;font-weight:bold;"
                                  ng-bind="evaluationInfo.teacherName +'&nbsp;&nbsp;'"></span><span
                                    ng-bind="evaluationInfo.lessonName"></span>
                        </div>
                        <div ng-bind=" '所属分类：' + evaluationInfo.typeName + '&nbsp;&nbsp;&nbsp;'+' 授课时间：' + evaluationInfo.techTime + '&nbsp;&nbsp;&nbsp;' + ' 评课时间：' + evaluationInfo.start_time + ' 至 ' + evaluationInfo.end_time"></div>
                        <div ng-bind=" '主要评课方向：' + evaluationInfo.mainDirection"></div>
                    </div>
                </div>
                <div class="main_upload_lesson">
                    <div class="main_upload_block" ng-click="uploadCourse(evaluationInfo.id);"><img src="/image/qiyun/research/evaluationInfo/14.png"/><span>上传课件</span></div>
                    <div class="main_upload_text">只允许创建人和授课人上传课件</div>
                </div>
            </div>
        </div>

        <!-- 教案、课件系列 -->
        <div class="clear"></div>
        <div class="main_lesson_list">
            <div class="main_lesson_left">
                <div class="main_left_first">
                    <div class="first_head">
                        <div class="first_text">教案&nbsp;/&nbsp;课件列表</div>
                        <div class="first_a"><a style="color: #4dacf0" href="{{url('/research/evaluatCourseList/{[evaluatId]}')}}">更多</a></div>
                    </div>
                    <div class="clear"></div>
                    <div class="first_line">
                        <ul ng-class="{disable: resourceblock}">
                            <li ng-repeat="r in resource">
                                <img src="{[r.pic]}" style="float: left;margin-top:15px;"><a href="{{url('/research/evaluatCourse/{[r.id]}')}}"><span class="first_line_first" ng-bind="r.resourceName"></span></a><span class="first_line_second" ng-bind="r.resourceSize"></span><span class="first_line_last" ng-bind="r.uploadTime"></span>
                            </li>
                        </ul>
                        <div class="spinner" style="padding:0px 200px;width:250px;margin-top: 20px;"
                             ng-class="{disable: resource}">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>
                        <div id="errorMessage" style="padding:0px 200px;width:250px;margin-top: 40px;"
                             ng-class="{disable: resourcemsg}">数据加载失败，请尝试 <a
                                    ng-click="reload('resource');">刷新</a> 一下
                        </div>
                        <span style="padding-top: 90px;display: block;" ng-bind="resourceError"></span>
                    </div>
                </div>
                <!-- 清除浮动 -->
                <div class="clear"></div>
                <!-- second开始 -->
                <div class="main_left_second">
                    <div class="guanjian">关键点评</div>
                    <div class="second_line" ng-repeat="c in comment" ng-class="{disable: commentblock}">
                        <div class="second_line_left"><img src={[c.commentPic]} width="50" height="50"/></div>
                        <div class="second_line_right">
                            <div class="second_line_auth"><a href="#" ng-bind="c.commentPerson"></a></div>
                            <div class="second_line_content" ng-bind="c.content"></div>
                            <div class="second_time" ng-bind="c.commentTime"></div>
                            {{--<div class="second_reply"><a href="#">评论回复</a><span>(0)</span></div>--}}
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="body_left_con body_left_con_now">
                        <div class="li_page">
                            <tm-pagination conf="paginationConf"></tm-pagination>
                        </div>
                    </div>
                    <div class="spinner" style="padding:0px 200px;width:250px;margin-top: 20px;"
                         ng-class="{disable: comment}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <div id="errorMessage" style="padding:0px 200px;width:250px;margin-top: 20px;"
                         ng-class="{disable: commentmsg}">数据加载失败，请尝试 <a
                                ng-click="reload('comment');">刷新</a> 一下
                    </div>
                    <span style="display: block;" ng-bind="commentError"></span>
                </div>
                <!-- 清除浮动 -->
                <div class="clear"></div>

                <div class="main_left_three">
                    <!-- 评论 -->
                    <form action="/research/addEvaluatComment" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="evaluatId" value={[evaluatId]}>
                        <div class="three_comment">评论</div>
                        <div class="three_content">
                            <textarea cols="79" rows="8" name="commentContent" maxlength="140" required style="resize:none;"></textarea>
                        </div>
                        <div class="three_a">
                            <button type="submit">评论</button>
                            <span>还能输入140字</span>
                        </div>
                    </form>
                </div>


            </div>

            <div class="main_lesson_right">
                <div class="right_top">
                    <div class="right_score">
                        <div class="right_title">综合评分</div>
                        <div class="right_star">
                            <img src="/image/qiyun/research/evaluationInfo/4.png"/>
                            <img src="/image/qiyun/research/evaluationInfo/4.png"/>
                            <img src="/image/qiyun/research/evaluationInfo/4.png"/>
                            <img src="/image/qiyun/research/evaluationInfo/4.png"/>
                            <img src="/image/qiyun/research/evaluationInfo/8.png"/>
                        </div>
                    </div>
                    <div class="right_want">
                        <div class="right_94">
                            <span class="right_span1" ng-bind="total"></span>
                            <span class="right_span2" ng-bind="'（' + nums + '）'"></span>
                        </div>
                        <div class="right_play"><a href="#" ng-click="iMark(evaluationInfo.id);">我要评分</a></div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="right-bottem">
                    <div class="bottem_title">各项平均得分</div>
                    <div class="bottem_body">
                        <div class="bottem_body_div" ng-repeat="c in content">
                            <div class="bottem_tec" ng-bind="$index + 1 + '.' + c.evaluatTmpContentName"></div>
                            <div class="bottem_star">
                                <span style="color:black;font-weight: bold;letter-spacing: 3px;" ng-bind="c.score"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 评课详情结束 -->
@endsection

@section('js')
    <script>
        var status = {!! session('status') !!};
        if(status == '2'){
            alert('添加失败');
        }else if(status == '3'){
            alert('请先登录');location.href = '/';
        }
    </script>
    <script type="text/javascript"
            src="{{ URL::asset('js/qiyun/angular/controller/evaluationInfoController.js') }}"></script>
@endsection