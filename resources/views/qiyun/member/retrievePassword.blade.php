@extends('qiyun.layouts.layoutHome')

@section('title', '启云')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/member/retrievePassword.css') }}">
@endsection

@section('content')
	<meta name="_token" content="{{ csrf_token() }}"/>
    <div ng-controller="retrievePasswordController">
    <div class="daohang">
    	<div class="daohang_a"></div>
    	<div class="daohang_b">></div>
    	<div class="daohang_c">找回密码</div>
        <div class="dl">已有账户，<a href="/">直接登陆>></a></div>
    </div>
	<div style="clear:both;height:10px"></div>

	<div id="register_content">
	    <div style="height:55px;"></div>
        <div class="process">
            <div class="process_n process_a now"><span class="process_num ">①</span> 填写手机号</div>
            <div class="process_n process_b"><span class="process_num">②</span> 验证账号</div>
            <div class="process_n process_c" style="width:230px;"><span class="process_num">③</span> 设置新密码</div>
        </div>
        <div style="height:45px;"></div>
        
        <div>
            <div class="process_aa " >
                <form name="Form_a" action="" onsubmit="return postcheck()" novalidate>
                    <div class="input_con">
                        <input type="text" name='phone' ng-model="phone" class="input_l" placeholder="请输入您的手机号" ng-pattern="/^1(3|5|8|7){1}[0-9]{9}$/">
                        <span class="errorMsg" ng-show="Form_a.phone.$invalid" ng-bind="'*手机格式错误'"><span>
                    </div>
                    <div style="height:15px;"></div>
                    <div class="input_con">
                        <input type="text" class="input_s yzmsum" placeholder="请输入验证码"> 
                        <div class="yzm">11+13=?</div>
                        <span class="errorMsg yzmts disable">*验证码错误<span>
                    </div>
                    <div style="height:40px;"></div>
                    <div class="input_con">
                        <input type="image" style="float:left;" src="{{asset('image/qiyun/member/retrievePassword/2.png')}}" ng-click="posta()" ng-disabled="!Form_a.$valid">
                    </div>
                </form>
            </div>

            <div class="process_bb disable">
                <form action="">
                    <div class="input_con">
                        <input type="text" ng-model="phoneMsg" class="input_s" placeholder="请输入您的手机验证码"> 
                        <button class="yzmReSend" ng-disabled="yzmReSendClick" ng-click="reLoadMsg()" >{[countdown]}秒后重发验证码</button>
                        <span class="errorMsg shotmsgts disable">*验证码错误<span>
                    </div>
                    <div style="height:40px;"></div>
                    <div class="input_con">
                        <input type="image" style="float:left;" src="{{asset('image/qiyun/member/retrievePassword/6.png')}}" ng-click="postb()">
                    </div>
                </form>
            </div>

            <div class="process_cc disable" >
                <form name="Form_c" action="" novalidate>
                    <div class="input_con">
                        <input type="password" id="psd" name="password" ng-model="password" class="input_l" placeholder="请输入您的密码">
                        <span class="errorMsg disable">*密码不能为空<span>
                    </div>
                    <div style="height:15px;"></div>
                    <div class="input_con">
                        <input type="password" name="repassword" ng-model="repassword" pw-check="psd" class="input_l" placeholder="请再次输入您的新密码">
                        <span class="errorMsg" ng-show="Form_c.repassword.$error.pwmatch" ng-bind="'*密码不一致。'"><span>
                    </div>
                    <div style="height:40px;"></div>
                    <div class="input_con">
                        <input type="image" style="float:left;" src="{{asset('image/qiyun/member/retrievePassword/3.png')}}" ng-click="postc()" ng-disabled="!Form_c.$valid">
                        <input type="image" style="float:left;margin-left:10px;" src="{{asset('image/qiyun/member/retrievePassword/4.png')}}" ng-click="reset()">
                    </div>
                </form>
            </div>
        </div>
	</div>
	</div>
@endsection

@section('js')
    <script src="{{ URL::asset('js/qiyun/angular/controller/retrievePasswordController.js') }}"></script>
    <script src="{{ URL::asset('js/qiyun/angular/directive/registDirective.js') }}"></script>
@endsection