{{--Created by PhpStorm.--}}
{{--User: Mr.H--}}
{{--Date: 2016/3/14--}}
{{--Time: 15:55--}}
@extends('qiyun.layouts.layoutHome')

@section('title','协同备课图片列表页')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/subjectImageList.css') }}">
    @endsection
    @section('content')
            <!-- 教研主题列表页开始 -->
    <!-- 搜索下的空白23px -->
    <div class="clear"></div>
    <div class="main_list">
        <div class="main_head">
            <div class="clear"></div>
            <div class="posi">
                <a href="">
                    <div class="li_home"></div>
                </a>
                <a href="">
                    <div class="li_nxt"> 教研备课 > 协同备课图片列表页</div>
                </a>
            </div>
            <div class="main_banner">
                <a href="#"><img src="/image/qiyun/research/subjectList/banner.png"/></a>
            </div>
            <div class="main_bott">
                <div class="main_bott_left">图片列表</div>
            </div>
        </div>
        <!-- 线下部分 -->
        <div class="main_div">
            @if($status == '1')
                @foreach($data as $image)
                    <div class="main_image">
                        <img src="{{$image->imgurl}}" width="220" height="160"/>
                    </div>
                @endforeach
            @elseif($status == '2')
                <div class="main_msg">
                    <span>该备课还没有上传过图片！</span>
                </div>
            @endif
        </div>
    </div>
@endsection