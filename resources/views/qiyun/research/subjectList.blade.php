{{--Created by PhpStorm.--}}
{{--User: Mr.H--}}
{{--Date: 2016/1/29--}}
{{--Time: 10:50--}}
@extends('qiyun.layouts.layoutHome')

@section('title','教研主题列表页')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/subjectList.css') }}">
@endsection

@section('content')
<!-- 教研主题列表页开始 -->
<!-- 搜索下的空白23px -->
<div class="clear"></div>
<div class="main_list" ng-controller="subjectListCtrl">
    <div class="main_head">
        <div class="clear"></div>
        <div class="posi">
            <a href="">
                <div class="li_home"></div>
            </a>
            <a href="">
                <div class="li_nxt"> 教研备课 > 主题研讨列表</div>
            </a>
        </div>
        <div class="main_banner">
            <a href="#"><img src="/image/qiyun/research/subjectList/banner.png"/></a>
        </div>
        <div class="main_bott">
            <div class="main_bott_left">主题研讨</div>
            <div class="main_bott_right" ng-click="addSubject();" style="cursor: pointer;"><img src="/image/qiyun/research/subjectList/7.png"/><span>发起主题研讨</span></div>
        </div>
    </div>
    <!-- 线下部分 -->
    <div class="main_div">
        <div class="div_first" ng-class="{disable: subjectListblock}" ng-repeat="s in subjectList">
            <div class="first_div_img"><a href=/research/subjectInfo/{[s.id]}><img ng-class="{disable: subjectListblock}" ng-src={[s.pic]} width="157" height="114"/></a></div>
            <div class="first_img_right">
                <a href=/research/subjectInfo/{[s.id]}><div class="first_right_1" ng-bind="s.name"></div></a>
                <div class="first_right_2" ng-bind="'发表日期：' + s.create_at + '\n\n\n' + '创建人：' + s.author"></div>
                <div class="first_right_3" ng-bind="'参与人数：' + s.peoplenum"></div>
                <div class="first_right_4" ng-bind="'专题导读：' + s.describe" title="{[s.describe]}"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="body_left_con body_left_con_now">
            <div class="li_page" style="padding-left:260px;padding-top: 50px;padding-bottom: 50px;">
                <tm-pagination conf="paginationConf"></tm-pagination>
            </div>
        </div>
        <div class="spinner" style="padding:230px 0px;" ng-class="{disable: subjectList}">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
        <div id="errorMessage" style="padding:230px 0px;"  ng-class="{disable: subjectListmsg}">数据加载失败，请尝试 <a ng-click="reload('subjectList');">刷新</a> 一下</div>
    </div>
</div>

@endsection
@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/subjectListController.js') }}"></script>
@endsection