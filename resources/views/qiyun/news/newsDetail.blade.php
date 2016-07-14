@extends('qiyun.layouts.layoutHome')

@section('title','新闻详情')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/news/newsdetail.css') }}">
@endsection

@section('content')
	<div class="body" ng-controller="newsdetailCtrl">
    	<div class="body_left">
  		    <div class="body_left_top" ng-class="">
  		        <div ng-class="{disable: contentblock}">
                <div class="body_left_top_title" ng-bind="content.title"></div>    
                <div class="body_left_top_msg" ng-bind="'发布时间：' + (content.time|mDate)  + '&nbsp;&nbsp;&nbsp;发布单位：' + (content.resource|mLimit) +'&nbsp;&nbsp;&nbsp;分类：'+content.type + '&nbsp;&nbsp;&nbsp;点击量：'+content.clickNum"></div>
                <div class="body_left_top_con" ng-bind-html="content.content"> </div>  
                </div>

                <div class="spinner" style=" padding:400px 0px;" ng-class="{disable: content}">
					<div class="bounce1"></div>
					<div class="bounce2"></div>
					<div class="bounce3"></div>
				</div>

				<div id="errorMessage" style="padding:400px 0px;"  ng-class="{disable: contentmsg}">数据加载失败，请尝试 <a ng-click="reload('content');">刷新</a> 一下</div>					




                <div class="body_left_top_btn">
                    <!-- <div class="body_left_top_btn_img"><img src="{{url('image/qiyun/news/6.png')}}" alt=""></div>
                    <div class="body_left_top_btn_img"><img src="{{url('image/qiyun/news/5.png')}}" alt=""></div>
                    <div class="body_left_top_btn_img"><img src="{{url('image/qiyun/news/4.png')}}" alt=""></div>
                    <div class="body_left_top_btn_img"><img src="{{url('image/qiyun/news/3.png')}}" alt=""></div>
                    <div class="body_left_top_btn_img"><img src="{{url('image/qiyun/news/2.png')}}" alt=""></div>
                    <div class="body_left_top_btn_img"><img src="{{url('image/qiyun/news/1.png')}}" alt=""></div> -->

                    <!-- JiaThis Button BEGIN -->
                    <div class="jiathis_style" style="float:right;">
                        <a class="jiathis_button_qzone"></a>
                        <a class="jiathis_button_tsina"></a>
                        <a class="jiathis_button_tqq"></a>
                        <a class="jiathis_button_weixin"></a>
                        <a class="jiathis_button_renren"></a>
                        {{--<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>--}}
                        <a class="jiathis_counter_style"></a>
                    </div>
                    <script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
                    <!-- JiaThis Button END -->

                    <div class="body_left_top_btn_txt">分享:</div>
                    <div class="body_left_top_btn_txt" ng-click="doinformant({{Auth::check()}})">举报</div>
                </div> 
            </div>

            <div class="body_left_bottom">
                @if ($datas['prev'])
                    <a href="{{url('/news/newsDetail/'.$datas['prev']->id)}}">
                        <span class="body_left_bottom_pre" style="color:#000000;"><span>上一篇：</span >{{$datas['prev']->title}}</span>
                    </a>
                @else
                    <a href=""><span class="body_left_bottom_pre" style="color:#000000;"><span>上一篇：</span >已是第一篇！</span></a>
                @endif

                @if ($datas['next'])
                    <a href="{{url('/news/newsDetail/'.$datas['next']->id)}}">
                        <span class="body_left_bottom_next" style="color:#000000;"><span>下一篇：</span>{{$datas['next']->title}}</span>
                    </a>
                @else
                    <a href=""><span class="body_left_bottom_pre" style="color:#000000;"><span>下一篇：</span >已是最后一篇！</span></a>
                @endif
            </div>
    	</div>

    	<div class="body_right">
        	<div class="body_right_top">图片新闻</div>
        	<div class="body_right_con">

        		<div class="body_right_con_li_a" ng-repeat="i in imageNews" >
                    <!-- <div ng-click="newsClic(i.id)"> -->
                    <a href="{{url('/news/newsDetail/{[i.id]}')}}">
        		    <div>
        				<div class="body_right_con_li_a_img"><img ng-src="{{asset('{[i.image]}')}}" alt="" style="width:150px;height:160px;"></div>
                    	<div class="body_right_con_li_a_tit" ng-bind="i.title"></div>
                    </div>
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
        	<div class="body_right_con">

        	    <div ng-repeat="i in hotNews">
                    <a href="{{url('/news/newsDetail/{[i.id]}')}}">
                    <!-- <div class="body_right_con_li_b" ng-bind="i.title" ng-click="newsClic(i.id)"></div>                                      -->
        			<div class="body_right_con_li_b" ng-bind="i.title" ></div>      
                    </a> 		                		
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

    <!--  举报 弹出层 -->
    <div class="background_color none" ></div>
    <div class="informant none" ng-controller="newsdetailCtrl">
    <form >
        <div style="height:30px;"></div>

        <div class="informant_bar">
            <div class="informant_bar_l">举报类型:</div>
            <div class="informant_bar_r" ng-init="o=[{name: '广告营销', v:0}, {name: '抄袭内容', v:1}, {name: '分类错误', v:2}, {name: '暴力色情', v:3}, {name: '政治敏感', v:4}, {name: '其他', v:5}   ]; upData.type=o[0].v;">
                <select name="" id="informant_sel" ng-model="upData.type" ng-options="x.v as x.name for x in o">
                </select>
            </div>
        </div>
        <div style="height:20px;clear:both"></div>
        <div class="informant_bar">
            <div class="informant_bar_l">举报内容:</div>
            <div class="informant_bar_r">
                <textarea name="" id="informant_con" ng-model="upData.content" required></textarea>
            </div>
        </div>
        <div style="height:20px;clear:both"></div>
        <div class="informant_bar">
            <div class="informant_bar_l"></div>
            <div class="informant_bar_r">
                <button  id="informant_commit" type="submit" ng-click="postInformant()">提交</button>
                <button  id="informant_cancel" type="button" ng-click="cancelInformant()">取消</button>
            </div>
        </div>
    </form>
    </div>
    <!--  举报 弹出层 结束 -->
    
@endsection

@section('js')
    <script>
        var newId = {!! $id !!};
    </script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/newsdetailController.js') }}"></script>
@endsection