<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<script>
			 window.onerror=function(){return true;}
		</script>
		<title>@yield('title')</title> 
		<!-- layout css -->
		<link rel="stylesheet" type="text/css" href="{{asset('css/qiyun/layouts/layout.css')}}">
		<!-- 本页css文件 -->
		@yield('css')
	</head>
	<body ng-app="primeApp">
	<!-- top开始 -->
		<div class="top">
			<div class="t_con">
			   <a href="/"><div class="menu" name="index">首页</div></a>
			   <a href="/resource"><div class="menu" name="resource">资源中心</div></a>
			   <!-- <a href=""><div class="menu" name="">教学应用</div></a>	 -->
			   <a href="/research"><div class="menu" name="research">教研备课</div></a>	
			   <a href="/microLesson"><div class="menu" name="microLesson">微课中心</div></a>
			   <a href="/news"><div class="menu" name="news">新闻资讯</div></a>

				<!-- <a href=""><div class="menu" name="">社区论坛</div></a>	 -->
               
               
               @if (!Auth::check())
			   		<div class="login"><a href="{{url('/')}}">登录</a>&nbsp;|&nbsp;<a href="{{url('member/register')}}">注册</a></div>
			   @else
			   <a href="/perSpace/pe/{{ Auth::user() -> type }}/{{ Auth::user() -> id }}"><div class="menu" name="perSpace">个人空间</div></a>

				   <div class="islogin"  ng-controller="layoutCtrl">
					   <div class="msg" style="cursor: pointer;"><a href="/auth/logout" onclick="return confirm('确定退出?')">退出</a></div>
					   <div class="msg" ng-bind="schoolName"></div>
					   @if(Auth::user() -> type == 3)
				       <div class="msg" ng-bind="className"></div>
					   @endif
				       <div class="msg">{{ Auth::user() -> realname }}</div>
				   </div>
			   @endif
			</div>
	    </div>
        <div class="top_top"></div>
	<!-- top结束 -->
    <!-- center 开始 -->
    	<div class="container">
    	    <!-- 搜索栏开始 -->
    	    
	    		<div class="search_c">
		    		<div class="search">
						<div class="logo"></div>
						<div class="ser hidden">
							<div class="serbar">
							    <form action="{{url('/index/search')}}">
							        <div class="hidden_value">
							        	<input type="hidden" name="searchType" value="资讯">
							        </div>
									<div class="ser_l">
			                            <!-- 下拉列表 -->
			                            <div id="select">
									        <div class="input">
									            资讯 ▼
									        </div>
									        <div id="sub">
									            <ul>
									                <li>资讯</li>
									                <li>资源</li>
									                <li>微课</li>
									                <!-- <li>空间</li> -->
									            </ul>
									        </div>
									    </div>|
			                            <!-- 下拉列表 -->
										{{--@if(!session('searchValue'))--}}
										{{--<input type="text" name="searchValue" placeholder="请输入关键字搜索">--}}
										{{--@else--}}
										<input type="text" name="searchValue" placeholder="请输入关键字搜索" value="{{session('searchValue')}}">
										{{--@endif--}}
									</div>
									<!-- <input type="button" class="btn"> -->
									<button type="submit" class="btn"></button>
								</form>
							</div>
						</div>
					</div>
	    		</div>

    		<!-- 搜索栏结束 -->

    		<!-- 每页内容部分 -->
            @yield('content')
    	</div>
    <!-- cener 结束 -->

    <!-- bottom 开始-->
        <div class="clear"></div>
		<div class="bottom">
		    <div class="b_con">
	    		<div class="copyright">Copyright @ 2016 primecloud.cn Inc.All Rights Reserved. 启创卓越 版权所有</div>
	    		<div class="hotline">客服热线: 400-666-5695 技术支持电话: 010-62668558 客服邮箱:service@primecloud.cn
	    		<span>
	    			@if ( \Auth::check() && \Auth::user() -> level() > 0 )
			    		<a href="{{ url('/admin/index') }}" style="color: black;">后台管理</a>
			    		&nbsp;|&nbsp;
		    		@endif
		    		<a href="" style="color: black;">帮助中心</a>
		    	</span>
		    </div>
	    	</div>	           
	    </div>
    <!-- bottom 结束-->
	</body>
	<!-- layout js -->
	<script type="text/javascript" src="{{asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{asset('js/qiyun/angular/frame/angular.min.js') }}"></script>
	<script type="text/javascript" src="{{asset('js/qiyun/layouts/layout.js') }}"></script>
	<script type="text/javascript" src="{{asset('js/qiyun/angular/app.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/qiyun/angular/frame/tm.pagination.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/qiyun/angular/frame/tm.paginationb.js') }}"></script>
	<script>
          var checkResearch = {!! session('checkResearch') !!};
          if (checkResearch == 1) {  //未登录
              alert('请先登录！');
              window.location.href = '/';
          }else if(checkResearch == 2){ //不是老师
              alert('抱歉，您不是教师！');
          }
	</script>
    <!-- 本页js文件 -->
    @yield('js')
</html>