@extends('qiyun.layouts.layoutHome')

@section('title','微课上传')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/microLesson/microLessonPost.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/video/css2/jquery.fancybox.css')}}" />
@endsection

@section('content')
		<!-- 主体部分开始 -->
    		<!-- 空白div 15px -->
    		<div style="height:15px"></div>
			<!-- 上传视频div -->
			<div class="upload_video"><p class="upload_p">上传视频</p></div>	
			<!-- 空白div 22px -->
    		<div style="height:22px"></div>


			<!-- main div 开始-->

	<div class="main" ng-controller="microLessonPostController">
		<!-- form表单 -->
		<form action="">
			<!-- 空div -->
			<div style="height:30px"></div>
			<div class="div_1">
				<span class="div1_span1">*上传视频</span>
				<!-- <span class="div1_span2">上传</span> -->
				<img class="img_weike" src="{{asset('/image/qiyun/microLesson/weike.png')}}" alt="">
                <div class="up_po">
					<input id="file_upload" name="file_upload" type="file" multiple="true" value="" />
				</div>
			</div>
			<div class="main_div1">
			(仅支持mp4格式)
			</div>
			<!-- (支持jpg、png、jpeg、bmp、txt、mp3、mp4、pdf) -->
			<!-- 微课名称 -->
			<div class="div_2">
				<span class="div2_span1">*微课名称</span>
				<input type="text" size="50" class="div2_span2" ng-model="upData.name">
			</div>
			<!-- 内容简介 -->
			<div class="div_3">
				<span class="div3_span1">内容简介:</span>
				<textarea name="neirong" id="" cols="30" rows="10" class="div3_textarea1"  maxlength="100" required placeholder="最多可输入100字" ng-model="upData.descirpt"></textarea>
			</div>
			<!-- 所属分类 -->
			<div class="div_4" id="div_4">
				<span class="div4_span1">*所属分类:</span>
				<div class="div4_nav" id="div4_nav">
					{{--学段--}}
					<div class="div4_nav1">
						<span id="nav1_a">学段</span>
						<div class="nav1_b now" check-sel ng-click="select(1,1)">小学</div>
						<div class="nav1_c" check-sel ng-click="select(1,2)">初中</div>
						<div class="nav1_d" check-sel ng-click="select(1,3)">高中</div>
					</div>

					<!-- 册别 -->
					<div class="div4_nav2" name="xiaoxue">
						<span id="nav2_a">册别</span>
						<div id="nav2_c" ng-repeat="i in grade" check-sel ng-class="{now:$index==0}" ng-bind="i.gradeName" ng-click="select(2,i.id)"></div>
						{{--<img src="{{asset('/image/qiyun/microLesson/upload/1.png')}}" id="nav2_img" alt="">--}}
					</div>

					<!-- 课目 -->
					<div class="div4_nav3">
						<span id="nav2_a_k">课目</span>
						<div class="nav3_a" ng-repeat="i in subject" check-sel ng-class="{now:$index==0}" ng-bind="i.subjectName" ng-click="select(3,i.id)"></div>
						{{--<img src="{{asset('/image/qiyun/microLesson/upload/1.png')}}" id="nav3_img" alt="">--}}
					</div>

				</div>
			</div>
			<!-- 上传片头 -->
			<div class="div_5">
				<span class="div5_span1">上传片头:</span>
				<span class="div5_span2">上传</span>

				<div class="up_po">
					<input id="file_uploada" name="file_upload" type="file" multiple="true" value="" />
				</div>

				<div class="div5_img"><img src="{{asset('/image/qiyun/microLesson/upload/2.png')}}" alt=""></div>
			</div>
			<!-- 上传封面 -->
			<div class="div_6">
				<span class="div6_span1">上传封面:</span>
				<span class="div6_span2">上传</span>

				<div class="up_po">
					<input id="file_uploadb" name="file_upload" type="file" multiple="true" value="" />
				</div>

				<div class="div6_img"><img src="{{asset('/image/qiyun/microLesson/upload/2.png')}}" alt=""></div>
			</div>
			<!-- 课程类型 -->
		    <div class="div_7" ng-init="o=[{name: '讲授类', v:0}, {name: '讨论类', v:1}, {name: '启发类', v:2}, {name: '演示类', v:3}, {name: '练习类', v:4}   ]; upData.type=o[0].v;">
				<span class="div7_span1">*课程类型:</span>
				<select   ng-model="upData.type" ng-options="x.v as x.name for x in o"  style="width:80px"  class="div7_select"></select>
			</div>

			<!-- 预览 -->
			<div class="div_8">
				<div class="div8_div">
					<span class="div8_span1"><a  class="micLessonPath" href="">预览</a></span>
				</div>
			</div>
			<!-- 底横线 -->
			<div class="div_9">
				
			</div>
			<!-- 条款 -->
			<div class="div_10">
				<input  type="checkbox" class="div10_checkbox" ng-model="serviceArticle"/>
				<span class="div10_span1">我已阅读并同意</span>
				<span class="div10_span2">微课上传服务条款</span>
			</div>
			<!-- 确定及取消 -->
			<div class="div_11">
				<input name="submit" type="image" value="" src="{{asset('/image/qiyun/microLesson/upload/4.png')}}" class="div11_img1" ng-class="{disable : !serviceArticle}"  ng-click="postData()"/>
				<input name="submit" type="image" value="" src="{{asset('/image/qiyun/microLesson/upload/5.png')}}" class="div11_img2" ng-click="reset()"/>
			</div>
			<div style="height:10px;"></div>
		</form>	
		<!-- form表单结束 -->
	</div>


	<!-- 空白div -->
	<div style="height:50px"></div>
@endsection

@section('js')
	<script type="text/javascript">
		var list = {!! $arrs !!};
		// console.log(list);
	</script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/microLesson/jquery.uploadify.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/microLesson/microLessonPost.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/microLessonPostController.js') }}"></script>
	<script type="text/javascript" src="{{asset('admin/video/js/jwplayer.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/video/js/jquery.fancybox.js')}}"></script>

       <script>
        $(document).ready(function () {
            $(".micLessonPath").fancybox({
                fitToView: false,
                content: '<span></span>', // create temp content
                scrolling: 'no',
                afterLoad: function () {
                    var $width = $(this.element).data('width'); // get dimensions from data attributes
                    var $height = $(this.element).data('height');
                    this.content = "<embed src='/admin/video/player.swf?file=" + this.href + "&autostart=true&amp;wmode=opaque' type='application/x-shockwave-flash' allowfullscreen='true' width='" + $width + "' height='" + $height + "'></embed>"; // replace temp content
                }
            });
        });
    </script>
@endsection