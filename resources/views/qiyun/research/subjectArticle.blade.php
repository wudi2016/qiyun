{{--Created by PhpStorm.--}}
{{--User: Mr.H--}}
{{--Date: 2016/1/26--}}
{{--Time: 17:28--}}
@extends('qiyun.layouts.layoutHome')

@section('title','发布文章')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/subjectArticle.css') }}">
@endsection

@section('content')
        <!-- center 开始 -->
    <div class="container">
        <!-- 主体部分开始 -->
        <div class="clear"></div>
        <div class="posi">
            <a href="">
                <div class="li_home"></div>
            </a>
            <a href="">
                <div class="li_nxt"> 教研备课 > 主题研讨 > 发布文章 </div>
            </a>
        </div>
        <!-- 主图div -->
        <div class="zhutu">
            <img src="/image/qiyun/research/addEvaluation/banner.png" alt="">
        </div>
        <div style="height:40px"></div>
        <!-- 发布资源 -->
        <div class="main_div1">
            <span class="main_div1_span">发布文章</span>
        </div>
        <!-- form表单部分 -->
        <form action="{{url('/research/insertSubjectArticle')}}" method="post" name="pubForm">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div style="height:36px"></div>
            <!-- 提交信息部分 -->
            <div class="form_div1" ng-controller="subjectArticleCtrl">

                <input type="hidden" name="themeId" value="{[id]}" />
                <!-- 文章标题 -->
                <div class="form_div1_wz">
                    <span class="form_div1_wz_span">文章标题</span>
                    <input type="text" class="form_div1_wz_input" name="title" required/>
                </div>
                <div style="height:30px"></div>
                <!-- 插件留言 -->
                <div class="form_div_content">
                    <span class="form_div_content_span">文章内容</span>
                    <textarea id="container" style="resize: none" name="content"></textarea>
                </div>
                <div style="height:200px"></div>
                <div class="clear"></div>
                <div class="form_div1_fabu">
                    <button id="btnSub" type="submit">发布</button>
                    <span id="btnRes" ng-click="articleReset(id);">取消</span>
                </div>
                <div style="height:112px"></div>
            </div>
        </form>
        <!-- 主体部分结束 -->
    </div>
    <!-- cener 结束 -->
@endsection
@section('js')
        <!-- 配置文件 -->
    <script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>

    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
    <script>
        var status = {!! session('status') !!};
        var url = window.location.href;
        var param = url.split('/');
        var evaluatId = param[param.length-1];
        if(status == '1'){
            alert('添加成功');
            location.href = '/research/subjectInfo/' + evaluatId;
        }else if(status == '3'){
            alert('请先登录');
            location.href = '/';
        }else if(status == '2'){
            alert('添加失败');
        }
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/subjectArticleController.js') }}"></script>
@endsection
