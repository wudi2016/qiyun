@extends('qiyun.layouts.layoutHome')

@section('title', '启云')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/resource/uploadResourceSuccess.css') }}">
@endsection

@section('content')
	<meta name="_token" content="{{ csrf_token() }}"/>
    <div ng-controller="formCtrl">
    <div class="daohang">
    	<div class="daohang_a"></div>
    	<div class="daohang_b">></div>
        <div class="daohang_c">资源中心</div>
        <div class="daohang_b">></div>
    	<div class="daohang_c">资源上传</div>
    </div>
	<div style="clear:both;height:10px"></div>

	<div id="register_content">
	    <div style="height:120px;"></div>
		<div class="register_content_a"> 资源发布成功！您可以点击查看或者返回个人空间查看。</div>
        <div style="height:60px;"></div>
        <div class="register_content_c">
        	<a href="{{url('/resource/resourceDetail/'.$id)}}"><img src="{{asset('image/qiyun/resource/btn1.png')}}" alt=""></a>
			{{--<a href="{{url('/resource/uploadResource')}}"><img src="{{asset('image/qiyun/resource/btn2.png')}}" alt=""></a>--}}
			<a href="{{url('/perSpace/pe/'.Auth::user() -> type.'/'.Auth::user() -> id)}}"><img src="{{asset('image/qiyun/resource/btn2.png')}}" alt=""></a>
        </div>
	</div>
	</div>
@endsection

@section('js')

@endsection