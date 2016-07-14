{{--Created by PhpStorm.--}}
{{--User: Mr.H--}}
{{--Date: 2016/1/28--}}
{{--Time: 14:30--}}
@extends('qiyun.layouts.layoutHome')

@section('title','发布资源')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/publishResource.css') }}">
@endsection

@section('content')
    <!-- 主体部分开始 -->
    <div class="clear"></div>
    <div class="posi">
        <a href="">
            <div class="li_home"></div>
        </a>
        <a href="">
            <div class="li_nxt"> 教研备课 > 协同备课 > 发布资源</div>
        </a>
    </div>
    <!-- 主图div -->
    <div class="zhutu">
        <img src="/image/qiyun/research/publishResource/15.png" alt="">
    </div>
    <div style="height:40px"></div>
    <!-- 发布资源 -->
    <div class="main_div1">
        <span class="main_div1_span">发布资源</span>
    </div>
    <!-- form表单部分 -->
    <form>
        <div style="height:35px"></div>
        <!-- 提交信息部分 -->
        <div class="form_div1" ng-controller="publishResourceCtrl">
            <input type="hidden" name="evaluatPath" value="" />
            <!-- 上传 -->
            <div class="form_div1_upload">
                <div style="height:20px"></div>
                <div class="form_div1_img">
                    <img src="/image/qiyun/research/publishResource/1.png" alt="">
                    <div id="file_upload"></div>
                    <div class="uploadarea_bar_r_msg"></div>
                    <span class="form_div1_span">从电脑选择要上传的文件</span>
                </div>
            </div>
            <div style="height:35px"></div>
            <!-- 资源名称 -->
            <div class="form_div1_input1">
                <span class="form_div1_span2">资源名称</span>
                <input type="text" class="form_div1_input2" name="name" ng-model="name"/>
            </div>
            <div style="height:47px"></div>
            <!-- 描述 -->
            <div class="form_div1_miaosu">
                <span class="form_div1_span4">描述</span>
                <textarea class="form_div1_textarea" name="description" ng-model="description" style="resize: none" placeholder="选填,简要介绍音视频的主要内容,方便更多人的预览和下载"></textarea>
            </div>
            <div style="height:50px"></div>
            <!-- 发布,取消 -->
            <div class="form_div1_fabu">
                <button id="btnSub" ng-click="insert();">发布</button>
                <button id="btnRes" type="reset">取消</button>
            </div>
        </div>
    </form>
    <!-- 主体部分结束 -->
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/research/uploadCourse.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/publishResourceController.js') }}"></script>
@endsection
