{{--Created by PhpStorm.--}}
{{--User: Mr.H--}}
{{--Date: 2016/1/28--}}
{{--Time: 10:36--}}
@extends('qiyun.layouts.layoutHome')

@section('title','发布共案')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/publishAudio.css') }}">
@endsection

@section('content')
    <!-- 主体部分开始 -->
    <div class="clear"></div>
    <div class="posi">
        <a href="">
            <div class="li_home"></div>
        </a>
        <a href="">
            <div class="li_nxt"> 教研备课 > 协同备课 > 发布共案</div>
        </a>
    </div>
    <!-- 主图div -->
    <div class="zhutu">
        <img src="/image/qiyun/research/publishAudio/15.png" alt="">
    </div>
    <div style="height:40px"></div>
    <!-- 发布资源 -->
    <div class="main_div1">
        <span class="main_div1_span">发布共案</span>
    </div>
    <!-- form表单部分 -->
    <form action="/research/doPublishCommonCase" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div style="height:35px"></div>
        <!-- 提交信息部分 -->
        <div class="form_div1" >
            <input type="hidden" name="id" value="{{$id}}" />
            <input type="hidden" name="evaluatPath" value="" />
            <!-- 上传 -->
            <div class="form_div1_upload">
                <div style="height:20px"></div>
                <div class="form_div1_img">
                    <img src="/image/qiyun/research/publishAudio/5.png" alt="">
                    <div id="file_upload"></div>
                    <div class="uploadarea_bar_r_msg"></div>
                    <span class="form_div1_span">从电脑选择要上传的文件</span>
                </div>
            </div>
            <div style="height:35px"></div>
            <!-- 资源名称 -->
            <div class="form_div1_input1">
                <span class="form_div1_span2">资源名称</span>
                <input type="text" name="name" class="form_div1_input2" required/>
            </div>
            <div style="height:47px"></div>
            <!-- 描述 -->
            <div class="form_div1_miaosu">
                <span class="form_div1_span4">描述</span>
                <textarea class="form_div1_textarea" style="resize: none" name="description" placeholder="选填,简要介绍资源的主要内容,方便更多人的预览和下载" required></textarea>
            </div>
            <div style="height:50px"></div>
            <!-- 发布,取消 -->
            <div class="form_div1_fabu">
                {{--<img src="/image/qiyun/research/publishAudio/2.png" alt="">--}}
                {{--<img src="/image/qiyun/research/publishAudio/3.png" alt="">--}}
                <button id="btnSub" type="submit">发布</button>
                <button id="btnRes" type="reset">取消</button>
            </div>
        </div>
    </form>
    <!-- 主体部分结束 -->
    </div>
@endsection
@section('js')
    <script>
        var status = {!! session('status') !!};
        if(status == '3'){
            alert('请先登录');location.href = '/';
        }else if(status == '2'){
            alert('添加失败');
        }
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/qiyun/research/publishCommonCase.js') }}"></script>
@endsection
