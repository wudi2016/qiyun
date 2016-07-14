{{--Created by PhpStorm.--}}
{{--User: Mr.H--}}
{{--Date: 2016/1/27--}}
{{--Time: 14:08--}}
@extends('qiyun.layouts.layoutHome')

@section('title','发布图片')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/publishPic.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('js/diyUpload/css/diyUpload.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('js/diyUpload/css/webuploader.css') }}">

@endsection

@section('content')
            <!-- 主体部分开始 -->
    <meta name="_token" content="{{ csrf_token() }}"/>
    <div class="clear"></div>
    <div class="posi">
        <a href="">
            <div class="li_home"></div>
        </a>
        <a href="">
            <div class="li_nxt"> 教研备课 > 协同备课 > 发布图片</div>
        </a>
    </div>
    <!-- 主图div -->
    <div class="zhutu">
        <img src="/image/qiyun/research/publishPic/15.png" alt="">
    </div>
    <div style="height:40px"></div>
    <!-- 发布资源 -->
    <div class="main_div1">
        <span class="main_div1_span">发布图片</span>
    </div>
    <!-- 提交信息部分 -->
    <div class="form_div1">
            <!-- 添加图片框 -->
            {{--<div class="form_div1_add" id="uploadPreview">--}}
                {{--<img class="form_div1_img1" src="/image/qiyun/research/publishPic/6.png" alt="">--}}
            {{--</div>--}}
            <div id="box">
                <div id="test"></div>
            </div>
        <div style="height:45px"></div>
    </div>

    <!-- 主体部分结束 -->
    </div>
    <!-- cener 结束 -->

@endsection
@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/diyUpload/js/diyUpload.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/diyUpload/js/webuploader.html5only.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/research/publishPic.js') }}"></script>
@endsection
