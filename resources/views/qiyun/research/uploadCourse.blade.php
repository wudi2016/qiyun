{{--Created by PhpStorm.--}}
{{--User: Mr.H--}}
{{--Date: 2016/1/26--}}
{{--Time: 10:45--}}
@extends('qiyun.layouts.layoutHome')

@section('title','上传课件')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/uploadCourse.css') }}">
    @endsection

    @section('content')
    <!-- 主体部分开始 -->
    <div class="clear"></div>
    <div class="posi">
        <a href="">
            <div class="li_home"></div>
        </a>
        <a href="">
            <div class="li_nxt"> 教研备课 > 主题研讨 > 发布资源 </div>
        </a>
    </div>
    <!-- 主图div -->
    <div class="zhutu">
        <img src="/image/qiyun/research/uploadCourse/banner.png" alt="">
    </div>
    <div style="height:40px"></div>
    <!-- 发布资源 -->
    <div class="main_div1">
        <span class="main_div1_span">上传课件</span>
    </div>
    <!-- form表单部分 -->
    <form>
        <div style="height:35px"></div>
        <!-- 提交信息部分 -->
        <div class="form_div1" ng-controller="uploadCourseCtrl">
            <input type="hidden" name="evaluatPath" value="" />
            <!-- 上传 -->
            <div class="form_div1_upload">
                <div style="height:10px"></div>
                <div class="form_div1_img">
                    <img src="/image/qiyun/research/uploadCourse/1.png" alt="">
                    <input type="file" id="file_upload" name="uploadAudio" required/>
                    <span class="form_div1_span">从电脑选择要上传的文件，支持文档、图片、音视频、等各种格式课件</span>
                </div>
            </div>
            <div style="height:35px"></div>
            <!-- 资源名称 -->
            <div class="form_div1_input1">
                <span class="form_div1_span2">课件名称</span>
                <input type="text" name="name" ng-model="name" class="form_div1_input2"/>
            </div>
            <div style="height:47px"></div>
            <!-- 描述 -->
            <div class="form_div1_miaosu">
                <span class="form_div1_span4">描述</span>
                <textarea class="form_div1_textarea" name="description" ng-model="description" style="resize: none" placeholder="选填,简要介绍音视频的主要内容,方便更多人的预览和下载"
                          ></textarea>
            </div>
            <div style="height:50px"></div>
            <!-- 发布,取消 -->
            <div class="form_div1_fabu">
                {{--<img src="/image/qiyun/research/publishAudio/2.png" alt="">--}}
                {{--<img src="/image/qiyun/research/publishAudio/3.png" alt="">--}}
                <button id="btnSub" ng-click="insert();">发布</button>
                <button id="btnRes" type="reset">取消</button>
            </div>
        </div>
    </form>
    <!-- 主体部分结束 -->
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/uploadCourseController.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/research/uploadCourse.js') }}"></script>
@endsection