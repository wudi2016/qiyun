@extends('qiyun.layouts.layoutHome')

@section('title','教研主题话题信息')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/articleInfo.css') }}">
@endsection

@section('content')
    <div class="body" ng-controller="topicInfoCtrl">
        <div class="body_left">
            <div class="body_left_top">
                <div ng-class="{disable: contentblock}">
                    <div class="body_left_top_title" ng-bind="content.title"></div>
                    <div class="body_left_top_msg" ng-bind="'发布时间：' + content.create_at  + '&nbsp;&nbsp;&nbsp;发布人：' + content.realname"></div>
                    <div class="body_left_top_con" ng-bind-html="content.content"></div>
                </div>
                <div class="spinner" style=" padding:400px 0px;" ng-class="{disable: content}">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
                <div id="errorMessage" style="padding:400px 0px;"  ng-class="{disable: contentmsg}">数据加载失败，请尝试 <a ng-click="reload('content');">刷新</a> 一下</div>
                <div class="body_left_top_btn">
                    <div class="jiathis_style" style="float:right;">
                        <a class="jiathis_button_qzone"></a>
                        <a class="jiathis_button_tsina"></a>
                        <a class="jiathis_button_tqq"></a>
                        <a class="jiathis_button_weixin"></a>
                        <a class="jiathis_button_renren"></a>
                        <a class="jiathis_counter_style"></a>
                    </div>
                    <script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
                    <div class="body_left_top_btn_txt">分享:</div>
                    {{--<div class="body_left_top_btn_txt">举报</div>--}}
                </div>
            </div>
            <div class="body_left_bottom">
                @if ($datas['prev'])
                    <a href="{{url('/research/topicInfo/'.$datas['prev']->id)}}">
                        <span class="body_left_bottom_pre" style="color:#000000;"><span>上一篇：</span >{{$datas['prev']->title}}</span>
                    </a>
                @else
                    <a href=""><span class="body_left_bottom_pre" style="color:#000000;"><span>上一篇：</span >已是第一篇！</span></a>
                @endif

                @if ($datas['next'])
                    <a href="{{url('/research/topicInfo/'.$datas['next']->id)}}">
                        <span class="body_left_bottom_next" style="color:#000000;"><span>下一篇：</span>{{$datas['next']->title}}</span>
                    </a>
                @else
                    <a href=""><span class="body_left_bottom_pre" style="color:#000000;"><span>下一篇：</span >已是最后一篇！</span></a>
                @endif
            </div>
        </div>
        {{--<div class="body_right">--}}
            {{--<div class="body_right_top">话题列表</div>--}}
            {{--<div>--}}
                {{--<div class="list" ng-repeat="l in list" >--}}
                    {{--<div>--}}
                        {{--<div class="list_title" ng-click="newsClic(l.id)" ng-bind="$index + 1 + '.' + l.title"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="spinner" style=" padding:100px 0px;" ng-class="{disable: list}">--}}
                    {{--<div class="bounce1"></div>--}}
                    {{--<div class="bounce2"></div>--}}
                    {{--<div class="bounce3"></div>--}}
                {{--</div>--}}
                {{--<div id="errorMessage" style="padding:100px 0px;"  ng-class="{disable: listmsg}">数据加载失败，请尝试 <a ng-click="reload('list');">刷新</a> 一下</div>--}}
            {{--</div>--}}
            {{--<div class="li_page" style="padding-top: 50px;padding-bottom: 50px;width: 110%">--}}
                {{--<tm-pagination conf="paginationConf"></tm-pagination>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="de_con_r" style="float:right">
            <div class="de_con_r_tj">相关主题推荐:</div>

            <div class="vde_con_r_con" ng-repeat="o in other">
                <a href=" {{url('/research/subjectInfo/{[o.id]}')}}">
                    <div class="vde_con_r_con_t" ng-bind="o.name"></div>
                </a>
                <div class="vde_con_r_con_b">
                    <div class="vde_con_r_con_b_ll" ng-bind=" '参与人数:' + o.peoplenum"></div>
                    <div class="vde_con_r_con_b_rq" style="float: right" ng-bind="o.create_at"></div>
                </div>
            </div>
            <div class="spinner" style="margin: 150px auto -0;" ng-class="{disable: loading.other}">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
            <div id="errorMessage" style="margin: 150px auto;" ng-class="{disable: error.other}">数据加载失败，<br>请尝试 <a
                        class="click" ng-click="reload('other');">刷新</a> 一下
            </div>
            <div id="errorMessage" style="margin: 150px auto;" ng-class="{disable: empty.other}">没有找到相关主题！</div>
        </div>
    </div>
    </div>
    <div  style="height:70px;clear:both;"></div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/topicInfoController.js') }}"></script>
@endsection