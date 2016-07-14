{{--* Created by PhpStorm.--}}
{{--* User: Mr.H--}}
{{--* Date: 2016/3/8--}}
{{--* Time: 16:07--}}
@extends('qiyun.layouts.layoutHome')

@section('title','主题研讨视频列表')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/resource/resourceDetail.css') }}">
    <style>
        .first_line{
            width:665px;
            min-height:650px;
            border-top:1px solid #ddd;
        }
        .first_line a{
            color: black;
        }
        .first_line ul{
            list-style: none;
        }
        .first_line ul li{
            background-position: 5px;
            height:50px;
            line-height: 50px;
            border-top: 2px solid #ddd;
        }
        .first_line ul li span:first-child{
            display: inline-block;
            width: 320px;
            height:50px;
            margin-left: 5px;
            text-align: left;
            float: left;
            line-height: 50px;
            /*border:1px solid red;*/
        }
        .first_line ul li span:nth-child(3){
            display: inline-block;
            line-height: 50px;
            width: 80px;
            height:50px;
            /*border:1px solid blue;*/
        }
        .first_line ul li span:nth-child(4){
            display: inline-block;
            line-height: 50px;
            float: right;
            width: 150px;
            height:50px;
            /*border:1px solid yellow;*/

        }
    </style>
@endsection

@section('content')
    <div class="body" ng-controller="resourceDetailController">
        <div class="clear"></div>
        <div class="posi">
            <a href="">
                <div class="li_home">></div>
            </a>
            <a href="">
                <div class="li_nxt">教研评课 > 主题研讨视频列表</div>
            </a>
        </div>

        <div class="de_con">
            <div class="de_con_l">
                <div class="first_line">
                    <ul ng-class="{disable: subjectVideoListblock}">
                        <li ng-repeat="e in subjectVideoList">
                            <img src="{[e.pic]}" style="float: left;margin-top:15px;">
                            <a style="color:#000;" href="{{url('/research/subjectVideoDetail/{[e.id]}')}}">
                                <span ng-bind="e.name"></span>
                            </a>
                            <span ng-bind="e.size" style="text-align: right"></span>
                            <span ng-bind="e.created_at"></span>
                        </li>
                    </ul>
                    <div class="body_left_con body_left_con_now">
                        <div class="li_page" style="padding-left:200px;padding-top: 50px;padding-bottom: 50px;">
                            <tm-pagination conf="paginationConf"></tm-pagination>
                        </div>
                    </div>
                    <div class="spinner" style="padding:0px 200px;width:250px;margin-top: 20px;"
                         ng-class="{disable: subjectVideoList}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <div id="errorMessage" style="padding:0px 200px;width:250px;margin-top: 40px;"
                         ng-class="{disable: subjectVideoListmsg}">数据加载失败，请尝试 <a
                                ng-click="reloadcourse('subjectVideoList');">刷新</a> 一下
                    </div>
                    <span style="padding-top: 90px;display: block;" ng-bind="subjectVideoListError"></span>
                </div>
            </div>
        </div>
        <div class="de_con_r" style="float:right">
            <div class="de_con_r_tj">相关主题推荐:</div>

            <div class="vde_con_r_con" ng-repeat="i in data.other">
                <a href=" {{url('/research/subjectInfo/{[i.id]}')}}">
                    <div class="vde_con_r_con_t" ng-bind="i.name"></div>
                </a>
                <div class="vde_con_r_con_b">
                    <div class="vde_con_r_con_b_ll" ng-bind=" '参与人数:' + i.peoplenum"></div>
                    <div class="vde_con_r_con_b_rq" ng-bind=" i.create_at" style="float: right"></div>
                </div>
            </div>
            <div class="spinner" style="margin: 150px auto -0;" ng-class="{disable: loading.other}">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
            <div id="errorMessage" style="margin: 150px auto;" ng-class="{disable: error.other}">数据加载失败，<br>请尝试<a
                        class="click" ng-click="reload('other');">刷新</a> 一下
            </div>
            <div id="errorMessage" style="margin: 150px auto;" ng-class="{disable: empty.other}">没有找到相关资源！</div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript"
            src="{{ URL::asset('/js/qiyun/angular/controller/subjectVideoListController.js') }}"></script>
@endsection