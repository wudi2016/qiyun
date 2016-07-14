@extends('qiyun.layouts.layoutHome')

@section('title','教研中心')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/research.css') }}">
@endsection

@section('content')
	<div ng-controller="researchController">
		<!--  教研页面banner  -->
		<div id="research_banner">
			<div style="height:160px;"></div>
			<div class="research_banner_text_1">Teaching Seminars</div>
			<div style="height:10px;"></div>
			<div class="research_banner_text_2">Personal Center</div>
		</div>


		<div style="height:50px"></div>


		<!--  教师教研组  -->
		<div id="research_contentBlock">
			<div class="research_contentBlock_title">
				<!-- <div class="research_contentBlock_title_block" style="background-position: 0% 9.6%;"></div> -->
				<div class="research_contentBlock_title_text">教师协作组</div>
				<div class="research_contentBlock_title_link"><a href="/research/groupList">更多</a></div>
				<div class="research_contentBlock_title_button" ng-click="makeGroup();" style="cursor: pointer">+ 创建协作组</div>
			</div>
			<div class="research_contentBlock_line"></div>
			<div class="research_contentBlock_content">

				<div class="research_contentBlock_content_tearcherGroup" ng-repeat="i in data.group">
					<div class="research_contentBlock_content_tearcherGroup_image">
						<a href="{{url('research/techGroupInfo/{[i.id]}')}}"><img ng-src="{[i.image]}" width="100%" height="100%"></a>
					</div>
					<div class="research_contentBlock_content_tearcherGroup_content">
						<div class="research_contentBlock_content_tearcherGroup_content_title">
							<a href="{{url('research/techGroupInfo/{[i.id]}')}}" ng-bind="i.groupName"></a>
						</div>
						<div class="research_contentBlock_content_tearcherGroup_content_text">
							<div class="research_contentBlock_content_tearcherGroup_content_text_left" ng-bind="'成员：'+i.members"></div>
							<div class="research_contentBlock_content_tearcherGroup_content_text_right" ng-bind="'协备：' + i.lessons"></div>
						</div>
						{{--<div class="research_contentBlock_content_tearcherGroup_content_text">--}}
							{{--<div class="research_contentBlock_content_tearcherGroup_content_text_left">评课：0</div>--}}
							{{--<div class="research_contentBlock_content_tearcherGroup_content_text_right">主题：0</div>--}}
						{{--</div>--}}
					</div>
				</div>

				<div class="spinner" style="margin: 120px auto;" ng-class="{disable: loading.group}">
	            	<div class="bounce1"></div>
	            	<div class="bounce2"></div>
	            	<div class="bounce3"></div>
	            </div>
		
				<div id="errorMessage" style="margin: 120px auto;" ng-class="{disable: error.group}">数据加载失败，请尝试 <a ng-click="reload('group');">刷新</a> 一下</div>

			</div>
		</div>


		<div style="height:50px"></div>


		<!--  协同备课  -->
		<div id="research_contentBlock">
			<div class="research_contentBlock_title">
				<!-- <div class="research_contentBlock_title_block" style="background-position: 0% 21%;"></div> -->
				<div class="research_contentBlock_title_text">协同备课</div>
				<!-- <div id="moreByLesson" type="plan" class="research_contentBlock_title_moreByLesson research_contentBlock_title_moreByLesson_active">计划</div> -->
				<!-- <div id="moreByLesson" type="theme" class="research_contentBlock_title_moreByLesson">主题</div> -->
				<div class="research_contentBlock_title_link"><a href="/research/lessonList">更多</a></div>
				<div class="research_contentBlock_title_button" style="cursor: pointer;" ng-click="makeLesson();">+ 创建备课计划</div>
			</div>
			<div class="research_contentBlock_line"></div>
			<div id="moreByLesson_content" type="plan" class="research_contentBlock_content">
				<div class="research_contentBlock_content_lesson" ng-repeat="i in data.subject">

					<div style="height:25px;"></div>
					<div class="research_contentBlock_content_lesson_content">
						<div class="research_contentBlock_content_lesson_content_1">
							<a href="/research/lessonDetail/{[i.id]}" ng-bind="i.subjectTitle"></a>
						</div>
						<div class="research_contentBlock_content_lesson_content_2">
							<a style="color: #41A6EE;" click="return false;" ng-bind="'主备人:' + i.subjectAuthor"></a>
						</div>
			            <a href="/research/lessonDetail/{[i.id]}">
						<div class="research_contentBlock_content_lesson_content_3" style="color:#000000" ng-bind="'协作组：'+i.group"></div>
				        </a>
						<div class="research_contentBlock_content_lesson_content_4" ng-bind="i.startTime +' 至 '+ i.endTime"></div>
					</div>
				</div>

				<div class="spinner" style="margin: 120px auto;" ng-class="{disable: loading.subject}">
	            	<div class="bounce1"></div>
	            	<div class="bounce2"></div>
	            	<div class="bounce3"></div>
	            </div>
		
				<div id="errorMessage" style="margin: 120px auto;" ng-class="{disable: error.subject}">数据加载失败，请尝试 <a ng-click="reload('subject');">刷新</a> 一下</div>
			
			</div>

			<!-- <div id="moreByLesson_content" type="theme" class="research_contentBlock_content" style="display:none;">
			
				<div class="research_contentBlock_content_lesson">
					<div style="height:25px;"></div>
					<div class="research_contentBlock_content_lesson_content">
						<div class="research_contentBlock_content_lesson_content_1">
							<a href="">想练好英语口语吗？来吧，咱们一起用英语对话想练好英语口语吗？ ?</a>
						</div>
						<div class="research_contentBlock_content_lesson_content_2">
							<a style="color: #5B8ED3;" href="">李小小</a>
						</div>
						<div class="research_contentBlock_content_lesson_content_3">协作组：昌平一中英语教研组</div>
						<div class="research_contentBlock_content_lesson_content_4">2015-12-20 至 2016-1-30</div>
					</div>
				</div>
			
			</div> -->
		</div>



		<div style="height:30px"></div>


		<!--  评课议课  -->
		<div id="research_contentBlock">
			<div class="research_contentBlock_title">
				<!-- <div class="research_contentBlock_title_block" style="background-position: 0% 22.9%;"></div> -->
				<div class="research_contentBlock_title_text">评课议课</div>
				<div class="research_contentBlock_title_link"><a href="/research/evaluationList">更多</a></div>
				<div class="research_contentBlock_title_button" ng-click="addEvaluation();" style="cursor: pointer;">+ 发起评课</div>
			</div>
			<div class="research_contentBlock_line"></div>
			<div class="research_contentBlock_content">

				<div class="research_contentBlock_content_evaluation" ng-repeat="i in data.evaluation">
					<div class="research_contentBlock_content_evaluation_image">
						<a href="{{url('research/evaluationInfo/{[i.id]}')}}"><img ng-src="{[i.image ]}" width="100%" height="100%"></a>
					</div>
					<div class="research_contentBlock_content_evaluation_content">
						<div class="research_contentBlock_content_evaluation_content_title">
							<a href="{{url('research/evaluationInfo/{[i.id]}')}}" ng-bind="i.evaluationTitle"></a>
						</div>
						<div class="research_contentBlock_content_evaluation_content_text">
							<div class="research_contentBlock_content_evaluation_content_text_name" style="width:150px;">
								主讲人:<a href="" ng-bind="i.evaluationAuthor"></a>
							</div>
							<div class="research_contentBlock_content_evaluation_content_text_time" style="width:154px;text-align:left;" ng-bind=" '所属分类: '+i.evaluattype "></div>
						</div>

						<div class="research_contentBlock_content_evaluation_content_text">
							<div class="research_contentBlock_content_evaluation_content_text_name">
								评课时间:
							</div>
							<div class="research_contentBlock_content_evaluation_content_text_time" style="text-align:left;" ng-bind="(i.startTime | mDate) +' 至 '+ (i.endTime | mDate)"></div>
						</div>

						<div class="research_contentBlock_content_evaluation_content_text">
							<div class="research_contentBlock_content_evaluation_content_text_star" evaluation-star ng-value="{[i.star]}"></div>
							<!-- <div class="research_contentBlock_content_evaluation_content_text_star">♥♥♥♥♥</div> -->
							<!-- <div class="research_contentBlock_content_evaluation_content_text_number">100.0(25)</div> -->
						</div>
					</div>
				</div>

				<div class="spinner" style="margin: 120px auto;" ng-class="{disable: loading.evaluation}">
	            	<div class="bounce1"></div>
	            	<div class="bounce2"></div>
	            	<div class="bounce3"></div>
	            </div>
		
				<div id="errorMessage" style="margin: 120px auto;" ng-class="{disable: error.evaluation}">数据加载失败，请尝试 <a ng-click="reload('evaluation');">刷新</a> 一下</div>
			
			</div>
		</div>



		<div style="height:50px"></div>


		<!--  主题研讨  -->
		<div id="research_contentBlock" style="height:635px;">
			<div class="research_contentBlock_title">
				<!-- <div class="research_contentBlock_title_block" style="background-position: 0% 24.4%;"></div> -->
				<div class="research_contentBlock_title_text">主题研讨</div>
				<div class="research_contentBlock_title_link"><a href="/research/subjectList">更多</a></div>
				<div class="research_contentBlock_title_button" ng-click="addSubject();" style="cursor: pointer;">+ 发起主题</div>
			</div>
			<div class="research_contentBlock_line"></div>
			<div class="research_contentBlock_content" style="height:580px;">

				<div class="research_contentBlock_content_theme" ng-repeat="i in data.theme">
					<div class="research_contentBlock_content_theme_image">
						<a href="{{url('research/subjectInfo/{[i.id]}')}}"><img ng-src="{[i.image]}" width="100%" height="100%"></a>
					</div>
					<div class="research_contentBlock_content_theme_content">
						<div class="research_contentBlock_content_theme_content_title"><a href="{{url('research/subjectInfo/{[i.id]}')}}" ng-bind="i.themeTitle"></a></div>
						<div class="research_contentBlock_content_theme_content_content" ng-bind="i.themeContent"></div>
						<div class="research_contentBlock_content_theme_content_people" ng-bind="i.themeNumber+'人参与'"></div>
						<div class="research_contentBlock_content_theme_content_time" ng-bind=" '发表日期: '+ (i.create_at | mDate)"></div>
					</div>
				</div>

				<div class="spinner" style="margin: 200px auto;" ng-class="{disable: loading.theme}">
	            	<div class="bounce1"></div>
	            	<div class="bounce2"></div>
	            	<div class="bounce3"></div>
	            </div>
		
				<div id="errorMessage" style="margin: 120px auto;" ng-class="{disable: error.theme}">数据加载失败，请尝试 <a ng-click="reload('theme');">刷新</a> 一下</div>
 
			</div>
		</div>

		<div style="height:100px"></div>

	</div>
@endsection

@section('js')
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/research/research.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/researchController.js') }}"></script>
@endsection