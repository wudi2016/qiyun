@extends('qiyun.layouts.layoutHome')

@section('title', '启云')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/member/regist.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/member/uploadify.css') }}">
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
		@if (count($errors) > 0) 
			<div class="register_errorMessage">
				@foreach ($errors -> all() as $error)
		            <li>{{ $error }}</li>
		        @endforeach
			</div>
		@endif
		<div class="register_content_title">
			<div class="register_content_title_block register_content_title_block_active">
				<div class="register_content_title_block_person register_content_title_block_person_active" style="background-position:50% 0%;"></div>教师
			</div>
			<a href="/member/registerstu">
			<div class="register_content_title_block ">
				<div class="register_content_title_block_person " style="background-position:50% 57%;"></div>学生
			</div>
			</a>
			<a href="/member/registerpar">
			<div class="register_content_title_block">
				<div class="register_content_title_block_person" style="background-position:50% 0%;"></div>家长
			</div>
			</a>
		</div>
	    <div style="clear:both;height:5px"></div>
	    <div class="register_directLogin">已有账户，<a href="/">直接登录 >>></a></div>
	    <div style="clear:both;height:10px"></div>
        <!-- 教师 -->
		<form name="teacherForm" action="/member/addMember" method="post" onsubmit="return postcheck('yzmtsa')" class="register_content_form"  novalidate>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="type" value=1>

			<div style="height:20px;"></div>
			<div class="register_content_form_block">
				<div class="register_content_form_block_left">*账户名</div>
				<div class="register_content_form_block_right">
					<input type="text" class="form_name" name="username" placeholder="请输入您的用户名" value="{{ old('username') }}" >&nbsp;&nbsp;
				</div>
			</div>
			<div style="height:15px;">
					<span style="color:red;width:300px;height:15px;display:block;margin-left:330px;text-align:left;">
						<!-- <span style="line-height:15px;font-size:12px;" ng-show="teacherForm.username.$error.required" ng-bind="'*用户名是必须的。'"></span> -->
						<span class="form_name_msg" style="line-height:15px;font-size:12px;"></span>
				    </span>
			</div>
			<div class="register_content_form_block">
				<div class="register_content_form_block_left">*真实姓名</div>
				<div class="register_content_form_block_right">
					<input type="text" class="form_realname" name="realname" placeholder="请输入您的真实姓名" value="{{ old('realname') }}" >&nbsp;&nbsp;
				</div>
			</div>
			<div style="height:15px;">
					<span style="color:red;width:300px;height:15px;display:block;margin-left:330px;text-align:left;">
						<span class="form_realname_msg" style="line-height:15px;font-size:12px;" ></span>
				    </span>
			</div>

			<div class="register_content_form_block">
				<div class="register_content_form_block_left">*密码</div>
				<div class="register_content_form_block_right">
					<input type="password" class="form_password" name="password" id="psd2" placeholder="请输入您密码" ng-model="teacher.password" >&nbsp;&nbsp;
					<span></span>
				</div>
			</div>
			<div style="height:15px;">
					<span style="color:red;width:300px;height:15px;display:block;margin-left:330px;text-align:left;" >
						<span class="form_password_msg" style="line-height:15px;font-size:12px;" ></span>
				    </span>
			</div>
			<div class="register_content_form_block">
				<div class="register_content_form_block_left">*重复密码</div>
				<div class="register_content_form_block_right">
					<input type="password" name="repsd" placeholder="请输确认密码" ng-model="teacher.repsd"  pw-check="psd2">&nbsp;&nbsp;
					<span></span>
				</div>
			</div>
			<div style="height:15px;">
					<span style="color:red;width:300px;height:15px;display:block;margin-left:330px;text-align:left;" ng-show="teacherForm.repsd.$dirty && teacherForm.repsd.$error.pwmatch && teacherForm.repsd.$invalid">
						<span style="line-height:15px;font-size:12px;" ng-show="teacherForm.repsd.$error.pwmatch" ng-bind="'*密码不一致。'"></span>
				    </span>
			</div>

			<div class="register_content_form_block">
				<div class="register_content_form_block_left">*性别</div>
				<div class="register_content_form_block_right">
					@if(old('sex')==0)
						<input type="radio" name="sex"  value = 0 checked>男&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="sex"   value= 1 >女&nbsp;&nbsp;&nbsp;&nbsp;<!-- <input type="radio" name="sex" ng-model="student.sex" value="2">保密 -->
					@else
						<input type="radio" name="sex"  value = 0 >男&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="sex"   value= 1 checked>女&nbsp;&nbsp;&nbsp;&nbsp;<!-- <input type="radio" name="sex" ng-model="student.sex" value="2">保密 -->
					@endif
					<span></span>
				</div>
			</div>
			<div style="height:15px;"></div>
			<div class="register_content_form_block">
				<div class="register_content_form_block_left">*手机</div>
				<div class="register_content_form_block_right">
					{{--<input type="text" name="phone" class="form_phone" ng-model="teacher.phone" required  ng-pattern="/^1(3|5|8|7){1}[0-9]{9}$/">&nbsp;&nbsp;<button class="bind" type="button" onclick="sendMessage()">绑定</button>--}}
					<input type="text" name="phone" class="form_phone" value="{{ old('phone') }}" >&nbsp;&nbsp;<button class="bind" type="button" onclick="sendMessage()">发送验证码</button>
					<span></span>
				</div>
			</div>
			<!-- <div style="height:55px;"> -->
			{{--<div style="height:15px;">--}}
					{{--<span style="color:red;width:300px;height:15px;display:block;margin-left:330px;text-align:left;" ng-show="teacherForm.phone.$dirty  && teacherForm.phone.$invalid">--}}
						{{--<span style="line-height:15px;font-size:12px;" ng-show="teacherForm.phone.$invalid" ng-bind="'*手机格式错误。'"></span>--}}
				    {{--</span>						--}}
			{{--</div>--}}
			<div style="height:15px;">
					<span style="color:red;width:300px;height:15px;display:block;margin-left:330px;text-align:left;">
						<span class="form_phone_msg" style="line-height:15px;font-size:12px;" ></span>
				    </span>
			</div>

			<div class="register_content_form_block">
				<div class="register_content_form_block_left"></div>
				<div class="register_content_form_block_right">
					<input type="text" class="form_message" name="message"  placeholder="请输入短信验证码！" >&nbsp;&nbsp;
					<span></span>
				</div>
			</div>
			<div style="height:15px;">
					<span style="color:red;width:300px;height:15px;display:block;margin-left:330px;text-align:left;" >
						<span class="form_message_msg" style="line-height:15px;font-size:12px;" ></span>
				    </span>
			</div>

			<div class="register_content_form_block">
				<div class="register_content_form_block_left">身份证件号码</div>
				<div class="register_content_form_block_right">
					{{--<input type="text" name="IDcard" class="form_IDcard"  ng-model="teacher.IDcard" ng-pattern="/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])((\d{4})|\d{3}[a-zA-Z])$/">&nbsp;&nbsp;--}}
					<input type="text" name="IDcard" class="form_IDcard" value="{{ old('IDcard') }}" >&nbsp;&nbsp;
					<span></span>
				</div>
			</div>
			{{--<div style="height:15px;">--}}
					{{--<span style="color:red;width:300px;height:15px;display:block;margin-left:330px;text-align:left;" ng-show="teacherForm.IDcard.$dirty  && teacherForm.IDcard.$invalid">--}}
						{{--<span style="line-height:15px;font-size:12px;" ng-show="teacherForm.IDcard.$invalid" ng-bind="'*身份证号码格式错误。'"></span>--}}
				    {{--</span>	--}}
			{{--</div>--}}
			<div style="height:15px;">
					<span style="color:red;width:300px;height:15px;display:block;margin-left:330px;text-align:left;">
						<span class="form_IDcard_msg" style="line-height:15px;font-size:12px;" ></span>
				    </span>
			</div>

			<!-- <div class="register_content_form_block">
				<div class="register_content_form_block_left">所属部门</div>
				<div class="register_content_form_block_right">
					<input type="text" name="part"  ng-model="teacher.part">&nbsp;&nbsp;
					<span></span>
				</div>
			</div>
			<div style="height:15px;"></div> -->
			<div class="register_content_form_block">
				<div class="register_content_form_block_left">邮箱</div>
				<div class="register_content_form_block_right">
					{{--<input type="email" name="email"  ng-model="teacher.email" placeholder="请输入邮箱地址">&nbsp;&nbsp;--}}
					<input type="email" name="email" class="form_email" placeholder="请输入邮箱地址" value="{{ old('email') }}">&nbsp;&nbsp;
					<span></span>
				</div>
			</div>
			{{--<div style="height:15px;">--}}
					{{--<span style="color:red;width:300px;height:15px;display:block;margin-left:330px;text-align:left;" ng-show="teacherForm.email.$dirty  && teacherForm.email.$invalid">--}}
						{{--<span style="line-height:15px;font-size:12px;" ng-show="teacherForm.email.$invalid" ng-bind="'*非法的邮箱地址'"></span>--}}
				    {{--</span>					--}}
			{{--</div>				--}}
			<div style="height:15px;">
					<span style="color:red;width:300px;height:15px;display:block;margin-left:330px;text-align:left;">
						<span class="form_email_msg" style="line-height:15px;font-size:12px;" ></span>
				    </span>
			</div>

			<!-- <div class="register_content_form_block">
				<div class="register_content_form_block_left">任教年级</div>
				<div class="register_content_form_block_right">
					<input type="text" name="grade"  ng-model="teacher.grade">&nbsp;&nbsp;
					<span></span>
				</div>
			</div> -->
			<!-- <div style="height:15px;"></div>
			<div class="register_content_form_block">
				<div class="register_content_form_block_left">任教学科</div>
				<div class="register_content_form_block_right">
					<input type="text" name="subject"  ng-model="teacher.subject">&nbsp;&nbsp;
					<span></span>
				</div>
			</div>	 -->
			<!-- <div style="height:15px;"></div> -->
			<div class="register_content_form_block">
				<div class="register_content_form_block_left">验证码</div>
				<div class="register_content_form_block_right">
					<input type="text" name="" class="yzmtsasum">&nbsp;&nbsp;<button type="button" class="yzm"></button>

					<span></span>
				</div>
			</div>																									
			<div style="height:15px;">
                    <!-- <span style="color:red;width:300px;height:15px;display:block;margin-left:330px;text-align:left;" ng-show="yzm">
						<span style="line-height:15px;font-size:12px;" ng-show="yzm" ng-bind="'*验证码输入错误..'"></span>
				    </span>	 -->
					<span class="yzmtsa yzmts disable" style="color:red;width:300px;height:15px;margin-left:330px;text-align:left;" >
						<span style="line-height:15px;font-size:12px;"  ng-bind="'*验证码输入错误..'"></span>
				    </span>					    
			</div>
			<div class="register_content_form_block">
				<div class="register_content_form_block_left"></div>
			    <div style="height:15px;"></div>

				<div class="register_content_form_block_right">
					<input type="checkbox" name="serviceArticle"  ng-model="teacher.serviceArticle">
					您已同意并阅读 <a href="">启云通教育云平台服务条款</a>
				</div>

			</div>

            <!-- 头像 -->
            <div class="upload">
            	<!-- <img src="{{url('/image/qiyun/member/register/35.png')}}" alt="">
            	<div class="upload_msg">
            		上传照片
            	</div> -->
            	<div id="imgs">
	            	<img width="200px" src="/image/qiyun/member/register/35.png">
            	</div>
                <input id="file_upload"  name="file_upload" type="file" multiple="true" value="" />
            </div>

			<div style="height:50px;"></div>

			<div class="register_content_form_block">
				<div class="register_content_form_block_right">
					<button class="register_content_form_block_right_button "   ng-class="{disable : !teacher.serviceArticle}" ng-disabled="!teacherForm.$valid">立即注册</button>
				</div>
			</div>
		    <div style="width:100%;height:100px;float:left"></div>
		</form>
        <!-- 学生 -->

        <!-- 家长 -->

	</div>
	</div>
@endsection

@section('js')
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/member/regist.js') }}"></script>

	<script src="{{ URL::asset('js/qiyun/angular/controller/registController.js') }}"></script>
	<script src="{{ URL::asset('js/qiyun/angular/directive/registDirective.js') }}"></script>
@endsection