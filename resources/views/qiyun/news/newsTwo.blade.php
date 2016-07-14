@extends('qiyun.layouts.layoutHome')

@section('title', '新闻资讯')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/qiyun/news/newslist.css') }}">
    <!-- <link href="{{asset('css/qiyun/admin/assets/css/bootstrap22.css') }}" rel="stylesheet" /> -->
@endsection

@section('content')
	<div ng-controller="newsCtrl">
			<div class="body">
            	<div class="body_left">
            		<div class="body_left_top">
            			<span class="body_left_top_li " >教育资讯</span> &nbsp;|&nbsp;
            			<span class="body_left_top_li body_left_top_now" >教育政策</span>
            		</div>
                    <!-- 资讯内容 -->
            		<div class="body_left_con " ng-controller="zixunPageCtrl">

                        <a ng-repeat="i in zixuns" href="{{url('news/newsDetail/{[i.id]}')}}">
                        <div ng-class="{body_left_con_li_bg:$index%2 ==0 }" class="body_left_con_li ">
                            <div class="body_left_con_li_tit" ng-bind="i.title"></div>
                            <div class="body_left_con_li_time" ng-bind="i.created_at"></div>
                        </div>
                        </a>

			            <!-- <div class="li_page">
					          <div class="li_page_con">
					              <div class="pg pg_n">1</div>
					              <div class="pg">2</div>
					              <div class="pg">3</div>
					              <div class="pg">4</div>
					              <div class="pg">5</div>
					          </div>
					    </div>  -->   
                        <div class="li_page" style="padding-left:100px;">
                            <tm-pagination conf="paginationConf"></tm-pagination>
                        </div>

                        <!-- <div class="spinner" style=" padding:200px 0px;" ng-if="zixunload">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>

                        <div id="errorMessage" style="padding:200px 0px;" ng-if="zixunmsg" >数据加载失败，请尝试 <a ng-click="reload('zixuns');">刷新</a> 一下</div>                              
                        <div id="errorMessage" style="padding:200px 0px;" ng-if="zixunempty" >没有找到相关资讯！</div> -->        			            
            		</div>
                    <!-- 政策内容 -->
            		<div class="body_left_con body_left_con_now" ng-controller="zhengcePageCtrl">

                        <a ng-repeat="i in zhengces" href="{{url('news/newsDetail/{[i.id]}')}}">
                        <div ng-class="{body_left_con_li_bg:$index%2 ==0 }" class="body_left_con_li ">
                            <div class="body_left_con_li_tit" ng-bind="i.title"></div>
                            <div class="body_left_con_li_time" ng-bind="i.created_at"></div>
                        </div>
                        </a>

                        <!-- <div class="li_page">
                              <div class="li_page_con">
                                  <div class="pg pg_n">1</div>
                                  <div class="pg">2</div>
                                  <div class="pg">3</div>
                                  <div class="pg">4</div>
                                  <div class="pg">5</div>
                              </div>
                        </div>  -->   
                        <div class="li_page" style="padding-left:100px;">
                            <tm-paginationb conf="paginationConf"></tm-paginationb>
                        </div>
                        <!-- <div class="spinner" style=" padding:200px 0px;" ng-if="zhengcesload">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>

                        <div id="errorMessage" style="padding:200px 0px;" ng-if="zhengcesmsg" >数据加载失败，请尝试 <a ng-click="reload('zhengces');">刷新</a> 一下</div>                              
                        <div id="errorMessage" style="padding:200px 0px;" ng-if="zhengcesempty" >没有找到相关政策！</div> -->             			            
            		</div>  

            	</div>

            	<div class="body_right">
                	<div class="body_right_top">图片新闻</div>
                	<div class="body_right_con">

                		<div class="body_right_con_li_a" ng-class="{disable: imageNewsblock}" ng-repeat="i in imageNews">
                		    <a href="{{url('news/newsDetail/{[i.id]}')}}">
                			<div class="body_right_con_li_a_img"><img src="{{asset('{[i.image]}')}}" alt="" style="width:150px;height:160px;"></div>
                            <div class="body_right_con_li_a_tit" ng-bind="i.title"></div>
                            </a>
                		</div>

                        <div class="spinner" style=" padding:230px 0px;" ng-class="{disable: imageNews}">
							<div class="bounce1"></div>
							<div class="bounce2"></div>
							<div class="bounce3"></div>
						</div>

						<div id="errorMessage" style="padding:230px 0px;"  ng-class="{disable: imageNewsmsg}">数据加载失败，请尝试 <a ng-click="reload('imageNews');">刷新</a> 一下</div>					

                	</div>
                     
                    <div style="clear:both;"></div>

                	<div class="body_right_top">最热资讯</div>
                	<div style="height:10px;"></div>
                	<div class="body_right_con" >

                        <div ng-repeat="i in hotNews">
                			<a href="{{url('news/newsDetail/{[i.id]}')}}"> <div class="body_right_con_li_b"  ng-bind="i.title"></div> </a>
                        </div>

                        <div class="spinner" style=" padding:100px 0px;" ng-class="{disable: hotNews}">
							<div class="bounce1"></div>
							<div class="bounce2"></div>
							<div class="bounce3"></div>
						</div>

						<div id="errorMessage" style="padding:100px 0px;"  ng-class="{disable: hotNewsmsg}">数据加载失败，请尝试 <a ng-click="reload('hotNews');">刷新</a> 一下</div>
					   		                	
                	</div>                	                	                	            	
            	</div>
			</div>
    	    <div  style="height:70px;clear:both;"></div>
    </div>
@endsection

@section('js')
	<script src="{{ URL::asset('js/qiyun/news/newslist.js') }}"></script>
	<script src="{{ URL::asset('js/qiyun/angular/controller/newsController.js') }}"></script>
@endsection
		