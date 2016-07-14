@extends('qiyun.layouts.layoutHome')

@section('title','微课列表')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/microLesson/microLessonList.css') }}">
@endsection

@section('content')

<!-- 搜索栏结束 -->
<div class="body" ng-controller="microListController">

  <div class="clear"></div>
  <div class="posi">
	 <a href=""><div class="li_home">></div></a>
	 <a href="{{url('/microLesson')}}"><div class="li_nxt">微课中心 ></div></a>
	 <a href=""><div class="li_nxt">微课列表 </div></a>
  </div>

  <div class="li_bar"></div>


  <div class="li_sel">
	 <div class="li_sel_con">
		<div class="li_sel_xk_d">
		   <div class="li_sel_xk_d_xk" >小学课程:</div>

		   <div class="li_sel_xk_d_cn"  sel-sty ng-repeat="i in primary" ng-if="$index < 8" ng-bind="i.name" ng-click="select(1,' where tag2 ='+i.id+' and tag1='+i.sectionId)"></div>

		   <div class="li_sel_xk_d_m" chapter-list ng-if="primary.length >= 8">更多 <span class="jt">▼</span></div>

		</div>
		<!-- 隐藏 -->
		<div class="clear"></div>
		<div class="li_sel_xk_m" style="display:none">

		   <div class="li_sel_xk_d_cn" sel-sty ng-repeat="i in primary" ng-if="$index >= 8" ng-bind="i.name" ng-click="select(1,' where tag2 ='+i.id+' and tag1='+i.sectionId)"></div>

		</div>
		<div class="clear"></div>
	 </div>

	 <div class="li_sel_con2">
		<div class="li_sel_xk_d">
		   <div class="li_sel_xk_d_xk">初中课程:</div>

		   <div class="li_sel_xk_d_cn2" sel-sty ng-repeat="i in junior" ng-if="$index < 8" ng-bind="i.name" ng-click="select(2,' where tag2 ='+i.id+' and tag1='+i.sectionId)"></div>

		   <div class="li_sel_xk_d_m" chapter-list ng-if="junior.length >= 8">更多 <span class="jt">▼</span></div>
		</div>
		<!-- 隐藏 -->
		<div class="clear"></div>
	     <div class="li_sel_xk_m" style="display:none">

		   <div class="li_sel_xk_d_cn" sel-sty ng-repeat="i in junior" ng-if="$index >= 8" ng-bind="i.name" ng-click="select(2,' where tag2 ='+i.id+' and tag1='+i.sectionId)"></div>

		 </div>
		<div class="clear"></div>
	 </div>

	 <div class="li_sel_con3">
		<div class="li_sel_xk_d">
		   <div class="li_sel_xk_d_xk">高中课程:</div>

		   <div class="li_sel_xk_d_cn3" sel-sty ng-repeat="i in high" ng-if="$index < 8" ng-bind="i.name" ng-click="select(3,' where tag2 ='+i.id+' and tag1='+i.sectionId)"></div>

		   <div class="li_sel_xk_d_m" chapter-list ng-if="junior.high >= 8">更多 <span class="jt">▼</span></div>
		</div>
		<!-- 隐藏 -->
		<div class="clear"></div>
	     <div class="li_sel_xk_m" style="display:none">

		   <div class="li_sel_xk_d_cn" sel-sty ng-repeat="i in high" ng-if="$index >= 8" ng-bind="i.name" ng-click="select(3,' where tag2 ='+i.id+' and tag1='+i.sectionId)"></div>

		</div>
		<div class="clear"></div>
	 </div>
  </div>

  <div class="li_con">



	 <div class="li_con_r">
		 <div class="li_con_r_top">
			 {{--<div class="div_7" ng-init="o=[{name: '讲授类', v:0}, {name: '讨论类', v:1}, {name: '启发类', v:2}, {name: '演示类', v:3}, {name: '练习类', v:4}   ]; upData.type=o[0].v;">--}}

			 <div class="li_con_r_top_ls btm" ng-click="select(4,false)" ng-bind=" '全部微课('+sum+')份' "></div>
			<div class="li_con_r_top_ls" ng-click="select(4,'and pctype = 0')">讲授类</div>
			<div class="li_con_r_top_ls" ng-click="select(4,'and pctype = 1')">讨论类</div>
			<div class="li_con_r_top_ls" ng-click="select(4,'and pctype = 2')">启发类</div>
			<div class="li_con_r_top_ls" ng-click="select(4,'and pctype = 3')">演示类</div>
			<div class="li_con_r_top_ls" ng-click="select(4,'and pctype = 4')">练习类</div>
			<div class="li_con_r_top_ls_r"><a href="{{url('/microLesson/microLessonPost')}}"><img src="{{asset('/image/qiyun/microLesson/fabu.png')}}" ></a></div>
		 </div>
		 <div class="li_con_r_or">
			<div class="li_con_r_or_d li_con_r_or_d_2" ng-click="select(5,'order by id asc')">综合排序</div>
			<div class="li_con_r_or_d" ng-click="select(5,'order by likeNum desc')">点赞量</div>
			<div class="li_con_r_or_d" ng-click="select(5,'order by viewNum desc')">浏览量</div>
			<div class="li_con_r_or_d" ng-click="select(5,'order by addTime desc')">上传时间</div>
		 </div>


		 <div class="li_con_r_bar li_con_r_bar_2" ng-if="micBlock" ng-repeat="i in micLessons">
			<div class="li_con_r_bar_top">
				<div class="li_con_r_bar_top_logo word"></div>
				<a href="{{url('/microLesson/microLessonDetail/{[i.id]}')}}"><div class="li_con_r_bar_top_title" ng-bind=" '微课名称:'+i.lessonName "></div></a>
			</div>

			<div class="li_con_r_bar_con">

				<a href="{{url('/microLesson/microLessonDetail/{[i.id]}')}}">
				<div class="li_con_r_bar_con_l"   >
					<img src="{{asset('{[i.coverPic]}')}}" width="140" height="100">
				</div>
				</a>

				<div class="li_con_r_bar_con_m">
					<div class="li_con_r_bar_con_m_t" ng-bind=" '简介:'+i.lessonDes "></div>
					<div class="li_con_r_bar_con_m_m">
						<div class="li_con_r_bar_con_m_m_c" ng-bind=" '大小:'+i.size "></div>
						<div class="li_con_r_bar_con_m_m_c" ng-bind=" '浏览:'+i.viewNum "></div>
						<div class="li_con_r_bar_con_m_m_c" ng-bind=" '收藏:'+i.favNum "></div>
					</div>
					<div class="li_con_r_bar_con_m_b">
						<div class="li_con_r_bar_con_m_m_c" ng-bind=" '发布时间:'+i.addTime "></div>
						<div class="li_con_r_bar_con_m_m_c" ng-bind=" '发布者:'+i.author "></div>
					</div>
				</div>
				<div class="li_con_r_bar_con_r">
					<div class="li_con_r_bar_con_r_t" >点赞量：（ <span ng-bind="i.likeNum"></span> ）</div>
					<div class="li_con_r_bar_con_r_btn"></div>
				</div>
			</div>
		 </div>

		 <div class="spinner" style=" padding:100px 0px;" ng-if="micLoad">
			 <div class="bounce1"></div>
			 <div class="bounce2"></div>
			 <div class="bounce3"></div>
		 </div>

		 <div id="errorMessage" style="padding:100px 0px;"  ng-if="micLoadError">没有找到匹配数据...</div>

	 </div>
  </div>

  <div class="clear"></div>

  <div class="li_page">
	  <div class="li_page" >
		  <tm-pagination conf="paginationConf"></tm-pagination>
	  </div>
	  {{--<div class="li_page_con">--}}
		  {{--<div class="pg pg_n">1</div>--}}
		  {{--<div class="pg">2</div>--}}
		  {{--<div class="pg">3</div>--}}
		  {{--<div class="pg">4</div>--}}
		  {{--<div class="pg">5</div>--}}
	  {{--</div>--}}
  </div>

</div>
    <!-- cener 结束 -->
@endsection

@section('js')
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
   <script type="text/javascript" src="{{ URL::asset('js/qiyun/microLesson/microLessonList.js') }}"></script>
   <script src="{{ URL::asset('js/qiyun/angular/controller/microListController.js') }}"></script>
@endsection


