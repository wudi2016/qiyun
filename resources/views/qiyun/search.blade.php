@extends('qiyun.layouts.layoutHome')

@section('title', '查询结构')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/qiyun/search.css') }}">
@endsection

@section('content')
	<div ng-controller="searchCtrl">
			<div class="body">
            	<div class="body_left">
            		<div class="body_left_top">
            			<span class="body_left_top_li body_left_top_now" >查询结果</span>
            		</div>
                    <!-- 资讯内容 -->
            		<div class="body_left_con body_left_con_now" ng-controller="zixunPageCtrl">

                        <a ng-repeat="i in resoults" href="{{url('{[preurl + i.id]}')}}">
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

            	</div>
			</div>
    	    <div  style="height:70px;clear:both;"></div>
    </div>
@endsection

@section('js')
    <script>
        var searchType = "{!! $searchType !!}";
        var searchValue = "{!! $searchValue !!}";
        $('.input').html(searchType);
        $('.hidden_value').html("<input type='hidden' name='searchType' value='"+searchType+"' >");
    </script>
	<script src="{{ URL::asset('js/qiyun/search.js') }}"></script>
	<script src="{{ URL::asset('js/qiyun/angular/controller/searchController.js') }}"></script>
@endsection
		