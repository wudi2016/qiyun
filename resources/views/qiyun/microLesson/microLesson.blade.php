@extends('qiyun.layouts.layoutHome')

@section('title','微课中心')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/microLesson/microLesson.css') }}">
@endsection

@section('content')
	<div ng-controller="microLessonController">
		<!--  微课中心banner  -->
		<!-- 最上层 -->
		<div id="main">	
			<div class="banner_div"></div>
			<!-- 右侧图片 -->
			<div class="right_div">
    				<div class="right_div1">
    					<img src="{{ URL::asset('image/qiyun/microLesson/top/3.png') }}" class="right_div2_img" alt="">
    					<span class="right_div1_span1" ng-bind="courseNum"></span>
    					<span class="right_div1_span2">个微课</span>
    				</div>
    				<div class="right_div2">
    					<img src="{{ URL::asset('image/qiyun/microLesson/top/4.png') }}" class="right_div2_img" alt="">
    					<span class="right_div2_span1" ng-bind="weekNum"></span>
    					<span class="right_div2_span2">份本周更新</span>
    				</div>
    				<!-- 上传图片按钮 -->
				  	<a href="{{url('/microLesson/microLessonPost')}}"><img  src="{{ URL::asset('image/qiyun/microLesson/top/10.png') }}" class="input_upload" /></a>
					<p class="p_style">交流分享您的优质微课</p>
    		</div>

		</div>


		<!-- <div style="height:50px"></div> -->


		<!--  推荐课程  -->
		<div id="microLesson_contentBlock">
			<div class="microLesson_contentBlock_title">
				<div id="recommend" type="boutique" class="microLesson_contentBlock_title_block microLesson_contentBlock_title_block_active">精品课程</div>
				<div id="recommend" type="new" class="microLesson_contentBlock_title_block">最新课程</div>
				<div id="recommend" type="hot" class="microLesson_contentBlock_title_block">最热课程</div>
			</div>
			<div class="microLesson_contentBlock_line"></div>

			<div id="recommendContent" type="boutique" class="microLesson_contentBlock_content">

				<div class="microLesson_contentBlock_content_recommend" ng-repeat="i in data.recommend.competitiveProducts">
					<a href="{{asset('microLesson/microLessonDetail/{[i.id]}')}}">
					<div class="microLesson_contentBlock_content_recommend_image"
						 ng-style="{ background:'url({{asset('{[i.picture]}')}}) no-repeat center center',filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=\'scale\')','background-size':'100% 100%','-moz-background-size':'100% 100%' }">
						<div style="height:165px;">
							<!-- <img height="165" width="320"  src="{{ URL::asset('image/qiyun/microLesson/top/17.jpg') }}"  alt=""> -->
						</div>
						<div class="microLesson_contentBlock_content_recommend_image_bottomText">
							<div class="microLesson_contentBlock_content_recommend_image_bottomText_left" ng-bind="'教师：' + i.teacher"></div>
							<div class="microLesson_contentBlock_content_recommend_image_bottomText_right" ng-bind="i.time"></div>
						</div>
						<div class="microLesson_contentBlock_content_recommend_image_position">
							<div style="height:25px;"></div>
							<div class="microLesson_contentBlock_content_recommend_image_position_title" ng-bind="i.title"></div>
							<div style="height:10px;"></div>
							<div class="microLesson_contentBlock_content_recommend_image_position_content" ng-bind="i.content"></div>
						</div>
					</div>
					</a>
					<div class="microLesson_contentBlock_content_recommend_text"><a href="{{asset('microLesson/microLessonDetail/{[i.id]}')}}" ng-bind="i.title"></a></div>
				</div>

			</div>

			<div id="recommendContent" type="new" class="microLesson_contentBlock_content" style="display:none;">

				<div class="microLesson_contentBlock_content_recommend" ng-repeat="i in data.recommend.new">
				<a href="{{asset('microLesson/microLessonDetail/{[i.id]}')}}">
					{{--<div class="microLesson_contentBlock_content_recommend_image" style="background-image:url({{ URL::asset('{[i.picture]}') }})">--}}
					<div class="microLesson_contentBlock_content_recommend_image"
						 ng-style="{ background:'url({{asset('{[i.picture]}')}}) no-repeat center center',filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=\'scale\')','background-size':'100% 100%','-moz-background-size':'100% 100%' }">
						<div style="height:165px;"></div>
						<div class="microLesson_contentBlock_content_recommend_image_bottomText">
							<div class="microLesson_contentBlock_content_recommend_image_bottomText_left" ng-bind="'教师：' + i.teacher"></div>
							<div class="microLesson_contentBlock_content_recommend_image_bottomText_right" ng-bind="i.time"></div>
						</div>
						<div class="microLesson_contentBlock_content_recommend_image_position">
							<div style="height:25px;"></div>
							<div class="microLesson_contentBlock_content_recommend_image_position_title" ng-bind="i.title"></div>
							<div style="height:10px;"></div>
							<div class="microLesson_contentBlock_content_recommend_image_position_content" ng-bind="i.content"></div>
						</div>
					</div>
					<div class="microLesson_contentBlock_content_recommend_text"><a href="{[i.src]}" ng-bind="i.title"></a></div>
				</a>
				</div>
			
			</div>

			<div id="recommendContent" type="hot" class="microLesson_contentBlock_content" style="display:none;">

				<div class="microLesson_contentBlock_content_recommend" ng-repeat="i in data.recommend.hot">
				<a href="{{asset('microLesson/microLessonDetail/{[i.id]}')}}">
					<div class="microLesson_contentBlock_content_recommend_image"
						 ng-style="{ background:'url({{asset('{[i.picture]}')}}) no-repeat center center',filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=\'scale\')','background-size':'100% 100%','-moz-background-size':'100% 100%' }">
						<div style="height:165px;"></div>
						<div class="microLesson_contentBlock_content_recommend_image_bottomText">
							<div class="microLesson_contentBlock_content_recommend_image_bottomText_left" ng-bind="'教师：' + i.teacher"></div>
							<div class="microLesson_contentBlock_content_recommend_image_bottomText_right" ng-bind="i.time"></div>
						</div>
						<div class="microLesson_contentBlock_content_recommend_image_position">
							<div style="height:25px;"></div>
							<div class="microLesson_contentBlock_content_recommend_image_position_title" ng-bind="i.title"></div>
							<div style="height:10px;"></div>
							<div class="microLesson_contentBlock_content_recommend_image_position_content" ng-bind="i.content"></div>
						</div>
					</div>
					<div class="microLesson_contentBlock_content_recommend_text"><a href="{[i.src]}" ng-bind="i.title"></a></div>
			    </a>
				</div>
			
			</div>

			<div class="spinner" style="margin: 140px auto;" ng-class="{disable: loading.recommend}">
            	<div class="bounce1"></div>
            	<div class="bounce2"></div>
            	<div class="bounce3"></div>
            </div>
	
			<div id="errorMessage" style="margin: 140px auto;" ng-class="{disable: error.recommend}">数据加载失败，请尝试 <a ng-click="reload('recommend');">刷新</a> 一下</div>

		</div>



		<div style="clear:both;height:80px"></div>


		<!--  按年级分类课程  -->
		<!-- <div id="microLesson_contentBlock" style="height:990px;"> -->
		<div id="microLesson_contentBlock">
			<div class="microLesson_contentBlock_title">
				<div id="bySchool" type="primary" class="microLesson_contentBlock_title_block microLesson_contentBlock_title_block_active" ng-click="select(1,1)">小学课程</div>
				<div id="bySchool" type="junior" class="microLesson_contentBlock_title_block" ng-click="select(1,2)">初中课程</div>
				<div id="bySchool" type="senior" class="microLesson_contentBlock_title_block" ng-click="select(1,3)">高中课程</div>
				<a class="gengduoList" href="{{url('/microLesson/microLessonList')}}"> >>更多 </a>
			</div>
			<div class="microLesson_contentBlock_line"></div>

			<div style="clear:both;"></div>
            <!-- 小学选项列表 -->
				<div class="microLesson_contentBlock_navigation" id="bySchool_navigation" type="primary" name="lesson">
					<!-- <div class="microLesson_contentBlock_navigation_block " ng-class="{microLesson_contentBlock_navigation_block_active:$index ==0}" micgrade-list ng-repeat="i in grade" value="" ng-bind="i.gradeName" ng-click="select(2,i.id)"></div> -->
					<div class="microLesson_contentBlock_navigation_block "  micgrade-list ng-repeat="i in grade" value="" ng-bind="i.gradeName" ng-click="select(2,i.id)"></div>


				</div>
				<div style="width:100%;height:20px;clear:both;"></div>
				<div class="microLesson_contentBlock_navigation" id="bySchool_navigation" type="primary" name="level">
					<!-- <div class="microLesson_contentBlock_navigation_block " ng-class="{microLesson_contentBlock_navigation_block_active:$index ==0}" micsubject-list ng-repeat="i in subject" value="" ng-bind="i.subjectName" ng-click="select(3,i.id)"></div> -->
					<div class="microLesson_contentBlock_navigation_block "  micsubject-list ng-repeat="i in subject" value="" ng-bind="i.subjectName" ng-click="select(3,i.id)"></div>

				</div>

			<div style="clear:both;"></div>
			<div style="height:25px;clear:both;"></div>

            <!-- ---------------微课内容显示------------ -->
			
			<div id="bySchool_content" type="primary" class="microLesson_contentBlock_content">

				<div class="microLesson_contentBlock_content_bySchool" ng-repeat="i in micLessonCon" ng-if="micLessonBlock">
					{{--<div class="microLesson_contentBlock_content_recommend_image" style="background-image:url({{ URL::asset('{[i.coverPic]}') }})">--}}
					<div class="microLesson_contentBlock_content_recommend_image"
						 ng-style="{ background:'url({{asset('{[i.coverPic]}')}}) no-repeat center center',filter:'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=\'scale\')','background-size':'100% 100%','-moz-background-size':'100% 100%' }">
					    <a href="{{asset('microLesson/microLessonDetail/{[i.id]}')}}" target="_black">
						<div style="height:165px;"></div>
						<div class="microLesson_contentBlock_content_recommend_image_bottomText">
							<div class="microLesson_contentBlock_content_recommend_image_bottomText_left" ng-bind=" '教师：'+i.author "></div>
							<div class="microLesson_contentBlock_content_recommend_image_bottomText_right" ng-bind="i.lessontime"></div>
						</div>
						<div class="microLesson_contentBlock_content_recommend_image_position">
							<div style="height:25px;"></div>
							<div class="microLesson_contentBlock_content_recommend_image_position_title" ng-bind="i.lessontitle"></div>
							<div style="height:10px;"></div>
							<div class="microLesson_contentBlock_content_recommend_image_position_content" ng-bind="i.lessondes"></div>
						</div>
						</a>
					</div>
					<div class="microLesson_contentBlock_content_recommend_text">
						<a href="{{asset('microLesson/microLessonDetail/{[i.id]}')}}" target="_black" ng-bind="i.lessontitle"></a>
					</div>
				</div>


	            <div class="spinner" style=" padding:110px 0px;" ng-if="micLessonLoad">
	              <div class="bounce1"></div>
	              <div class="bounce2"></div>
	              <div class="bounce3"></div>
	            </div>

	            <!-- <div id="errorMessage" style="padding:110px 0px;"  ng-if="resourceLoadError">数据加载失败，请尝试 <a ng-click="reload('hotNews');">刷新</a> 一下</div> -->
	            <div id="errorMessage" style="padding:110px 0px;"  ng-if="micLessonLoadError">没有找到匹配数据...</div>

			</div>	


		</div>
		<div style="height:450px;"></div>
	</div>
@endsection

@section('js')
	<script type="text/javascript">
      var list = {!! $arrs !!};
	</script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/microLesson/microLesson.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/microLessonController.js') }}"></script>
	<script>
      var status = {!! session('status') !!};

      var delay = setInterval("msg()",1000);
      var msg = function(){
	      if(status == 1){
	      	if (confirm('请登录！')) {
               window.location.href="/";
	      	}
	      }else if(status ==2){
	        alert('抱歉，您不是教师！');
	      }      	
	      clearInterval(delay);
      }
	</script>
@endsection