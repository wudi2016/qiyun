@extends('qiyun.layouts.layoutHome')

@section('title', '启云')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/member/registSuccess.css') }}">
@endsection

@section('content')
	<meta name="_token" content="{{ csrf_token() }}"/>
    <div ng-controller="formCtrl">
    <div class="daohang">
    	<div class="daohang_a"></div>
    	<div class="daohang_b">></div>
    	<div class="daohang_c">用户注册</div>
    </div>
	<div style="clear:both;height:10px"></div>

	<div id="register_content">
	    <div style="height:120px;"></div>
		<div class="register_content_a"> 尊敬的 {{Auth::user() -> realname}} ，恭喜您注册成功，您可以登陆平台页面了！</div>
		<div class="register_content_b"> 您注册的账户：{{Auth::user() -> username}}</div>
        <div class="register_content_c">
        	<a href="/"><img src="{{asset('image/qiyun/member/register/1.png')}}" alt=""></a>
        	<a href="{{url('perSpace/pe/'.Auth::user()->type.'/'.Auth::user()->id)}}"><img src="{{asset('image/qiyun/member/register/2.png')}}" alt=""></a>
        </div>
	</div>
	</div>
@endsection

@section('js')

@endsection