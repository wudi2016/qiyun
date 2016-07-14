@extends('qiyun.layouts.layoutHome')

@section('title', '启云')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/member/terms.css') }}">
@endsection

@section('content')
	<meta name="_token" content="{{ csrf_token() }}"/>
    <div ng-controller="retrievePasswordController">
    <div class="daohang">
    	<div class="daohang_a"></div>
    	<div class="daohang_b">></div>
    	<div class="daohang_c">平台服务条款</div>
    </div>
	<div style="clear:both;height:10px"></div>

	<div id="register_content">
        <div style="height:20px;"></div>
        <div style="border: 1px solid #FFBCD2">
            <div style="height:600px;line-height:600px;text-align: center">服务条款</div>
        </div>
        <div style="height:50px;"></div>
    </div>
	</div>
@endsection

@section('js')
    {{--<script src="{{ URL::asset('js/qiyun/angular/controller/retrievePasswordController.js') }}"></script>--}}
    {{--<script src="{{ URL::asset('js/qiyun/angular/directive/registDirective.js') }}"></script>--}}
@endsection