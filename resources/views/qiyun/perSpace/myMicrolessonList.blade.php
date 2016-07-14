@extends('qiyun.layouts.layoutHome')

@section('title','资源列表')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/perSpace/myResourceList.css') }}">
@endsection

@section('content')
    <div class="body" ng-controller="myMicrolessonListController">
        <div class="clear"></div>
        <div class="posi">
            <a href="">
                <div class="li_home">></div>
            </a>
            <a href="">
                <div class="li_nxt">我的微课 <strong>></strong></div>
            </a>
            <a href="">
                <div class="li_nxt micType"></div>
            </a>
        </div>
        <div class="clear"></div>
        <div class="listPage">
            <div class="listPage-row">

                <div class="listPage-items" ng-repeat="i in res">
                    <a href="{{url('/microLesson/microLessonDetail/{[i.id]}')}}">
                        <div class="items-img">
                            <img src="{{url('{[i.coverPic]}')}}" width='128' height='111'>
                        </div>
                        <div class="items-txt">
                            <div><span>资源名：</span><span ng-bind="i.lessonName"></span></div>
                            <div ng-bind=" '点赞数：'+i.likeNum "></div>
                            <div ng-bind=" '浏览量：'+i.viewNum "></div>
                            <div ng-bind=" '发布时间：'+i.addTime "></div>
                        </div>
                    </a>
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
    <script>
        var micType = {{ $mt }};
        var type = '';
        if (micType == 0) {
            type = '讲授类';
        } else if (micType == 1) {
            type = '讨论类';
        } else if (micType == 2) {
            type = '启发类';
        } else if (micType == 3) {
            type = '演示类';
        } else if (micType == 4) {
            type = '练习类';
        }
        $('.micType').html(type);
    </script>
    <script src="{{ URL::asset('js/qiyun/angular/controller/myMicrolessonListController.js') }}"></script>
@endsection