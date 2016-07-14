@extends('qiyun.layouts.layoutHome')

@section('title','创建备课主题')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/makeLesson.css') }}">
@endsection

@section('content')
		<!--添加评课页开始 -->
	<div class="clear"></div>
	<div class="main_list" ng-controller="makeLessonCtrl">
		<div class="main_head">
			<div class="clear"></div>
			<div class="posi">
				<a href="">
					<div class="li_home"></div>
				</a>
				<a href="">
					<div class="li_nxt">教研备课 > 创建备课主题</div>
				</a>
			</div>
			<div class="main_banner">
				<a href="#"><img src="/image/qiyun/research/addEvaluation/banner.png"/></a>
			</div>
			<div class="main_bott">
				<div class="main_bott_left">创建备课主题</div>
			</div>
		</div>
		<!-- 线下部分 -->
		<div style="height:25px;"></div>
		<form action="" method="">
			<div class="main_form">
				<div class="main_form_first">
					<div class="first_name">备课主题名称</div>
					<div class="first_input"><input type="text" ng-model="postdata.lessonSubjectName" name="lessonSubjectName" ng-blur="isOnly();"/><span style="display: block;color:red;float: left;margin-left:20px;" ng-bind="errorMsg.onlyMsg"></span></div>
				</div>
				<div class="clear"></div>
				<div class="main_form_image">
					<div class="first_name">主题封面</div>
					<div class="first_input">
						<div id="file_upload"></div>
						<div class="uploadarea_bar_r_msg"></div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="main_form_four">
					<div class="four_name">开放时间</div>
					<div class="four_time">
						<div class="four_input">
							<input type="text" name="begin" onclick="WdatePicker()"/>
							<div class="four_img"></div>
						</div>
					</div>
					<div class="four_zhi">结束时间</div>
					<div class="four_time">
						<div class="four_input1">
							<input type="text" name="end" onclick="WdatePicker()"/>
							<div class="four_img1"></div>
						</div>
					</div>
				</div>
				{{--<img src="/image/qiyun/research/addEvaluation/1.png"/>--}}
				<div class="clear"></div>
				<div class="main_form_five">
					<div class="five_name">主备人</div>
					<div class="five_text">
						<div class="five_img">
							<input type="radio" id="choose" value="" ng-model="postdata.lessonSubjecAuthor" name="lessonSubjecAuthor" /><span>选择一个主备人</span></div>
						<div class="five_checkbox">
							<div class="five_checkbox1">
								<input type="radio" value="a" checked id="myis" ng-model="postdata.lessonSubjecAuthor" name="lessonSubjecAuthor" /><span>我自己是主备人</span>
							</div>
						</div>
					</div>
				</div>
				<div class="shadow"></div>
				<div class="selectMainMan hide" name="selectMainMan">
					<div style="text-align: left;margin-left: 35px;font-size:20px;font-weight:bold;margin-top:20px;color: black;">选择主备人</div>
					<div style="height:15px;"></div>
					<hr width="89%"/>
					<div style="height:20px;"></div>
					<div class="content">
						<div class="selector">
							<span>分类查询：</span>
                        <span>
                            <select ng-model="evaluatAuthor.countyScope" name="countyScope" ng-options="x.id as x.county_name for x in conditionCounty" ng-change="author(1,evaluatAuthor.countyScope)">
								<option value="">请选择区域</option>
							</select>
                            <select ng-model="evaluatAuthor.countySchool" name="countySchool" ng-options="x.id as x.schoolName for x in conditionSchool" ng-change="author(2,evaluatAuthor.countySchool)">
								<option value="">请选择学校</option>
							</select>
                            <select ng-model="evaluatAuthor.countySubject" name="countySubject" ng-options="x.id as x.subjectName for x in conditionSubject">
								<option value="">请选择学科</option>
							</select>
                        </span>
							<span class="stMainMan" ng-click="likeQuery(evaluatAuthor.countyScope,evaluatAuthor.countySchool,evaluatAuthor.countySubject);">查询</span>
						</div>
						<div style="height:20px;"></div>
						<div class="accurateSelect">
							<span>精确查询：</span>
							<input name="accurateInput" type="text" ng-model="teacherName.username" placeholder="请输入教师账户" />
							<span class="accurateMainMan" ng-click="exactQuery(teacherName.username);">查询</span>
							<span class="button_btn_span" name="resetReturn">取消选择</span>
						</div>
						<hr style="width:88%; margin-top:20px;"/>
						<div class="name_option">
							<div class="name_option_first">
								<span ng-bind="teacherMsg"></span>
								<div ng-repeat="t in teacherList" class="div_span_radio1"><input type="radio" value="{[t.id]}" name="user" ng-click="chooseTeacher(t.id,t.realname);" />&nbsp;&nbsp;&nbsp;<span ng-bind="t.username"></span>&nbsp;&nbsp;&nbsp;<span ng-bind="t.realname" title="{[t.realname]}"></span></div>
							</div>
						</div>
					</div>
				</div>

				<div class="clear"></div>
				<div class="main_form_six">
					<div class="first_name">所属分类</div>
					<div class="six_type">
						<!-- 学段 -->
						<select ng-model="postdata.lessonSection" name="lessonSection" class="ressection" ng-options="x.id as x.sectionName for x in studysection" ng-change="select(1,postdata.lessonSection)">
							<option value="">请选择学段</option>
						</select>
					</div>
					<div class="six_type1">
						<!-- 学科 -->
						<select ng-model="postdata.lessonSubject" name="lessonSubject" class="ressubject" ng-options="x.id as x.subjectName for x in studysubject" ng-change="select(2,postdata.lessonSubject)">
							<option value="">请选择学科</option>
						</select>
					</div>
					<div class="six_type1">
						<!-- 版本 -->
						<select ng-model="postdata.lessonEdition" name="lessonEdition" class="resedition" ng-options="x.id as x.editionName for x in studyedition" ng-change="select(3,postdata.lessonEdition)">
							<option value="">请选择版本</option>
						</select>
					</div>
					<div class="six_type1">
						<!-- 册别 -->
						<select ng-model="postdata.lessonGrade" name="lessonGrade" class="resgrade"   ng-options="x.id as x.gradeName for x in studygrade" ng-change="select(4,postdata.lessonGrade)">
							<option value="">年级&nbsp;册别</option>
						</select>
					</div>
					<div class="six_type2">
						<select ng-model="postdata.lessonChapter" name="lessonChapter" class="chapter"   ng-options="x.id as x.chapterName for x in studychapter" ng-change="select(5,postdata.lessonChapter)">
							<option value="">请选择教材</option>
						</select>
					</div>
				</div>
				<div class="clear"></div>
				<div class="main_form_five_group">
					<div class="five_name">协作组</div>
					<div class="five_text">
						<div class="five_img">
							<input type="radio" id="chooseGroup" value="" ng-model="postdata.techResearch" name="techResearch" /><span>添加协作组</span>
						</div>
					</div>
				</div>
				{{--协作组--}}
				<div class="chooseGroup hide">
					<div style="text-align: left;margin-left: 35px;font-size:20px;font-weight:bold;margin-top:20px;color: black;">选择协作组</div>
					<div style="height:20px;"></div>
					<hr width="89%"/>
					<div style="height:10px;"></div>
					<div class="content">
						{{--<div class="selector">--}}
							{{--<span>按学科查询：</span>--}}
                        {{--<span>--}}
                            {{--<select ng-model="evaluatAuthor.countyScope" name="countyScope" ng-options="x.id as x.county_name for x in conditionCounty" ng-change="author(1,evaluatAuthor.countyScope)">--}}
								{{--<option value="">请选择区域</option>--}}
							{{--</select>--}}
                            {{--<select ng-model="evaluatAuthor.countySchool" name="countySchool" ng-options="x.id as x.schoolName for x in conditionSchool" ng-change="author(2,evaluatAuthor.countySchool)">--}}
								{{--<option value="">请选择学校</option>--}}
							{{--</select>--}}
                            {{--<select ng-model="evaluatAuthor.countySubject" name="countySubject" ng-options="x.id as x.subjectName for x in conditionSubject">--}}
								{{--<option value="">请选择学科</option>--}}
							{{--</select>--}}
                        {{--</span>--}}
							{{--<span ng-click="likeGroup(evaluatAuthor.countyScope,evaluatAuthor.countySchool,evaluatAuthor.countySubject);">查询</span>--}}
						{{--</div>--}}
						{{--<div style="height:20px;"></div>--}}
						<div class="accurateSelect">
							<span>关键字查询：</span>
							<input name="accurateInput" type="text" ng-model="groupInfo.groupName" placeholder="请输入协作组名称" />
							<span class="accurateMainMan" ng-click="queryGroup(groupInfo.groupName);">查询</span>
							<span class="button_btn_span" name="resetGroup">取消</span>
						</div>
						<hr style="width:88%; margin-top:20px;"/>
						<div class="group_option">
							<div class="name_option_first">
								<span ng-bind="groupMsg"></span>
								<div ng-repeat="g in groupList" class="div_span_radio1"><input type="radio" value="{[g.id]}" name="group" ng-click="chooseGroup(g.id,g.groupName);" />&nbsp;&nbsp;&nbsp;<span ng-bind="g.groupName"></span></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="subject_target">
					<div class="first_target">共案目标</div>
					<div class="clear"></div>
					<div class="second_target">共案是协同备课中，主备人上传的原始版文档，可下载，可编辑，可上传，请各位在限定时间内完成。谢谢！</div>
					<div class="clear"></div>
					<div class="third_target">
						<div class="third_target_first">
							<span>目标名称</span>
							<input type="text" name="lessonSubjectTarget" ng-model="postdata.lessonSubjectTarget" placeholder="请填写目标名称"/>
						</div>
						<div class="clear"></div>
						<div class="third_target_last">
							<span>编辑形式</span>
							<textarea cols="20" readonly>支持上传doc、docx、wps、ppt、ppts等办公软件格式的文字文件。选定该方式，采用线下同编辑的形式，您可以把线下已经编辑好的目标文档上传到课例应用中来；再次编辑时，需下载最新版本的文档进行更改并上传，亦可以修改本地存档的课例文档提交上传。上传后的文档将覆盖之前上传的文档。</textarea>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="main_form_ten">
					<button id="btnSub" ng-click="insert(postdata.lessonSubjectName,postdata.lessonSubjecAuthor,postdata.lessonSubjectTarget,postdata.lessonGrade,postdata.techResearch);">创建备课主题</button>
					<button id="btnRes" type="reset">取消</button>
				</div>
			</div>
		</form>
	</div>
@endsection

@section('js')
	<script language="javascript" type="text/javascript" src="{{ URL::asset('js/DatePicker/WdatePicker.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/makeLessonController.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/member/jquery.uploadify.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/research/makeLesson.js') }}"></script>
@endsection