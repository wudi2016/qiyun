{{--Created by PhpStorm.--}}
{{--User: Mr.H--}}
{{--Date: 2016/1/28--}}
{{--Time: 16:29--}}
@extends('qiyun.layouts.layoutHome')

@section('title','我要评分')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/mark.css') }}">
    @endsection

    @section('content')
            <!-- 评分页开始 -->
    <div class="clear"></div>
    <div class="main_list">
        <div class="main_head">
            <div class="clear"></div>
            <div class="posi">
                <a href="">
                    <div class="li_home"></div>
                </a>
                <a href="">
                    <div class="li_nxt">教研备课 > 评课议课 > 我要评分</div>
                </a>
            </div>
            <div class="main_banner">
                <a href="#"><img src="/image/qiyun/research/mark/banner.png"/></a>
            </div>
            <div class="main_bott">
                <div class="main_bott_left">我要评分</div>
            </div>
        </div>
        <!-- 线下部分 -->
        <div class="main_link" ng-controller="markCtrl">
            <form action="/research/addMark" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="evaluatId" value="{[id]}" />
                <div class="main_lesson">
                    <div class="main_shancha" ng-bind="evaluationInfo.evaluationName"></div>
                    <div class="main_shouke">
                        <div class="main_image">
                            <img src="/image/qiyun/research/mark/2.png" class="main_image_2"/>
                            <img src={[evaluationInfo.teacherPic]} width="117" height="119"/>
                        </div>
                        <div class="main_image_right">
                            <div class="main_image_right_1">
                                <span style="color:#5AAFEF;font-weight:bold;" ng-bind="evaluationInfo.teacherName + '&nbsp;&nbsp;'"></span><span ng-bind="evaluationInfo.lessonName"></span>
                            </div>
                            <div ng-bind=" '所属分类：' + evaluationInfo.typeName + '&nbsp;&nbsp;&nbsp;'+' 授课时间：' + evaluationInfo.techTime + '&nbsp;&nbsp;&nbsp;' + ' 评课时间：' + evaluationInfo.start_time + ' 至 ' + evaluationInfo.end_time"></div>
                            <div ng-bind=" '主要评课方向：' + evaluationInfo.mainDirection"></div>
                        </div>
                    </div>
                </div>

                <div class="main_line">
                    <div class="main_line_avg">
                        <div class="main_line_avg1">客观评课项平均分</div>
                        <div class="main_line_avg2" ng-bind="total"></div>
                    </div>
                    <div class="main_line_div">
                        <div class="main_line_div1">
                            <div class="main_line_div1_right">
                                <div ng-repeat="c in content">
                                    <span ng-bind="$index + 1 + '.' + c.evaluatTmpContentName"></span>
                                    <input type="hidden" id="{[c.id]}" value="" name="{[c.id]}" required/>
                                    <span>
                                        <img src='/image/qiyun/research/mark/3.png' ng-click="check(c.id,1)" effet-a/>
                                        <img src='/image/qiyun/research/mark/3.png' ng-click="check(c.id,2)" effet-a/>
                                        <img src='/image/qiyun/research/mark/3.png' ng-click="check(c.id,3)" effet-a/>
                                        <img src='/image/qiyun/research/mark/3.png' ng-click="check(c.id,4)" effet-a/>
                                        <img src='/image/qiyun/research/mark/3.png' ng-click="check(c.id,5)" effet-a/>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="main_area">
                    <div class="main_area_title">课程整体评价</div>
                    <textarea name="commentContent" class="main_area_line" ></textarea>
                    <div class="main_input_btn">
                        <button type="submit" class="main_submit">确定</button>
                        <span ng-click="reset(id);" class="main_reset">取消</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- 评分结束 -->
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/markController.js') }}"></script>
    <script>
        var status = {!! session('status') !!};
        if(status == '2'){
            alert('评分失败');
        }else if(status == '3'){
            alert('请先登录');location.href = '/';
        }else if(status == '4'){
            alert('您已参与过评分，请勿刷分！');
        }
    </script>
@endsection