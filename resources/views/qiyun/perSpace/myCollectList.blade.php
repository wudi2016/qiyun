@extends('qiyun.layouts.layoutHome')

@section('title','资源列表')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/perSpace/myCollectList.css') }}">
@endsection

@section('content')
    <div class="body" ng-controller="myCollectListController">

        <div class="list-items">
            <div class="head-items">
                <span>名称</span><span>类型</span><span>时间</span><span>操作</span>
            </div>
            <div ng-repeat="i in res">
                <div class="repeat-items">
                    <span ng-bind="i.title"></span>
                    <span ng-bind="i.type == 5?'微课':i.type==0?'资源':''"></span>
                    <span ng-bind="i.time"></span>
                    <span><a ng-click="delCollect(i.id)">删除</a></span>
                </div>
            </div>


            <div style="clear:both"></div>

            <div class="body_left_con body_left_con_now">
                <div class="li_page">
                    <tm-pagination conf="paginationConf"></tm-pagination>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ URL::asset('js/qiyun/angular/controller/myCollectListController.js') }}"></script>
@endsection