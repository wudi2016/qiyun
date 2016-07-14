{{--Created by PhpStorm.--}}
{{--User: Mr.H--}}
{{--Date: 2016/2/1--}}
{{--Time: 13:32--}}
@extends('qiyun.layouts.layoutHome')

@section('title','添加教研主题')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/addSubject.css') }}">
@endsection

@section('content')
<!-- 评课列表页开始 -->
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
                <div class="li_nxt"> 教研备课 > 添加主题研讨</div>
            </a>
        </div>
        <div class="main_banner">
            <a href="#"><img src="/image/qiyun/research/addSubject/banner.png"/></a>
        </div>
        <div class="main_bott">
            <div class="main_bott_left">发起主题研讨</div>
        </div>
    </div>
    <!-- 线下部分 -->
    <form action="/research/insertSubject" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="main_form">
            <div class="main_form_first" ng-controller="addSubjectCtrl">
                <div class="first_name">课题名称</div>
                <div class="first_input"><input type="text" name="name" ng-model="postdata.name" ng-blur="isOnly();" placeholder="请输入专题名称" required/><span style="display: block;color:red;float: left;margin-left:20px;" ng-bind="errorMsg.onlyMsg"></span></div>
            </div>
        </div>

        <div class="clear"></div>
        <div class="main_form_seven">
            <div class="first_name">主题导读</div>
            <div class="eight_area">
                <textarea cols="75" rows="7" name="describe" style="resize: none" placeholder="请输入专题导读内容" required></textarea>
            </div>

        </div>
        <div class="clear"></div>
        <div class="main_form_second">
            <div class="second_name">主题图片</div>
            <div class="second_img"><img src="/image/qiyun/research/addSubject/back.png" id="uploadPreview"/></div>
            <div class="second_right">
                <input type="file" id="uploadImage" name="pic" onchange="loadImageFile();" required/>
                <div class="second_file"><img src="/image/qiyun/research/addSubject/1.png"/></div>
                <div class="second_text">提示:请上传小于2M的&nbsp;JPG&nbsp;PNG&nbsp;GIF格式文件</div>
            </div>
        </div>

        <div class="clear"></div>
        <div class="main_form_ten">
            <button id="btnSub" type="submit">发布</button>
            <button id="btnRes" type="reset">取消</button>
        </div>
    </form>
</div>


<!-- 评课列表结束 -->
@endsection
@section('js')
    <script>
        var status = {!! session('status') !!};
        if(status == '2'){
            alert('添加失败');
        }
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/research/addSubject.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/addSubjectController.js') }}"></script>
@endsection
