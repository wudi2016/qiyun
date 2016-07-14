@extends('qiyun.layouts.layoutHome')

@section('title','资源列表')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/resource/expandesourceList.css') }}">
@endsection

@section('content')
  <div class="body" ng-controller="expandResourceListCtrl">

      <div class="clear"></div>
      <div class="posi">
         <a href=""><div class="li_home">></div></a>
         <a href="{{url('/resource')}}"><div class="li_nxt">资源中心 ></div></a>
          <a href=""><div class="li_nxt">拓展资源列表 ></div></a>
          <a href=""><div class="li_nxt" ng-bind=" a + '>' "></div></a>
          <a href=""><div class="li_nxt" ng-bind=" b "></div></a>
      </div>

      <div class="li_bar"></div>

      <div class="li_sel">
         <div class="li_sel_con" >
            <div class="li_sel_xk_d">
               <div class="li_sel_xk_d_xk">学段:</div>

               <div class="li_sel_xk_d_cn" sel-sty ng-class="{sel: $index == 0}" ng-if="$index < 9" ng-repeat="i in section" ng-bind="i.sectionName" ng-click="select(1,i.id,i.sectionName)"></div>

              {{--<div class="li_sel_xk_d_cn sel">数学</div>--}}

               <div class="li_sel_xk_d_m" chapter-list ng-if="section.length >= 9">更多 <span class="jt">▼</span></div>
            </div>
            <!-- 隐藏 -->
            <div class="clear"></div>
            <div class="li_sel_xk_m" style="display:none">

               <div class="li_sel_xk_d_cn" sel-sty ng-if="$index >= 9" ng-repeat="i in section" ng-bind="i.sectionName" ng-click="select(1,i.id,i.sectionName)"></div>

               {{--<div class="li_sel_xk_d_cn">数学</div>--}}
           
            </div>
            <div class="clear"></div>
         </div>
          
         <div class="li_sel_con">
            <div class="li_sel_xk_d">
               <div class="li_sel_xk_d_xk">类别:</div>

               <div class="li_sel_xk_d_cn" sel-sty ng-if="$index < 9" ng-class="{sel: $index == 0}" ng-repeat="i in type" ng-bind="i.selName" ng-click="select(2,i.id,i.selName)"></div>

               {{--<div class="li_sel_xk_d_cn">人教版</div>--}}

               <div class="li_sel_xk_d_m" chapter-list ng-if="type.length >= 9">更多 <span class="jt">▼</span></div>
            </div>
            <!-- 隐藏 -->
            <div class="clear"></div>
            <div class="li_sel_xk_m" style="display:none">

              <div class="li_sel_xk_d_cn" sel-sty ng-if="$index >= 9" ng-repeat="i in type" ng-bind="i.selName" ng-click="select(2,i.id,i.selName)"></div>

              <!-- <div class="li_sel_xk_d_cn">苏教版</div> -->
           
            </div>
            <div class="clear"></div>
         </div>

         {{--<div class="li_sel_con">--}}
            {{--<div class="li_sel_xk_d">--}}
               {{--<div class="li_sel_xk_d_xk">册别:</div>--}}

               {{--<!-- <div class="li_sel_xk_d_cn" sel-sty ng-class="{sel: $index == 0}" ng-repeat="i in grade" ng-bind="i.gradeName" ng-click="select(3,i.id)">一年级下册</div> -->--}}

               {{--<div class="li_sel_xk_d_cn">一年级下册</div>--}}

               {{--<div class="li_sel_xk_d_m" chapter-list ng-if="gradeMore">更多 <span class="jt">▼</span></div>--}}
            {{--</div>--}}
            {{--<!-- 隐藏 -->--}}
            {{--<div class="clear"></div>--}}
            {{--<div class="li_sel_xk_m" style="display:none">--}}

              {{--<!-- <div class="li_sel_xk_d_cn" sel-sty  ng-repeat="i in grade2" ng-bind="i.gradeName" ng-click="select(3,i.id)">一年级下册</div> -->--}}

              {{--<div class="li_sel_xk_d_cn">一年级下册</div>--}}
       {{----}}
            {{--</div>--}}
            {{--<div class="clear"></div>--}}
         {{--</div>--}}
      </div>
      
      <div class="li_con">

         <div class="li_con_r">
             <div class="li_con_r_top">
                <!-- 资源类型 -->
                <div class="li_con_r_top_ls" ng-class="{btm:$index == 0}"  res-ty ng-repeat="i in resourcetype" ng-bind="i.resourceTypeName" ng-click="select(3,' and resourceType = '+i.id,false)"></div>

                {{--<div class="li_con_r_top_ls btm res-ty">全部资源(377份)</div>--}}
                {{--<div class="li_con_r_top_ls res-ty">教案</div>--}}
                {{--<div class="li_con_r_top_ls res-ty">课件</div>--}}
                {{--<div class="li_con_r_top_ls res-ty">习题</div>--}}
                {{--<div class="li_con_r_top_ls res-ty">素材</div>--}}
                {{--<div class="li_con_r_top_ls res-ty">其他</div>--}}
                <a href="{{url('/resource/uploadResource')}}"><div class="li_con_r_top_ls_r"></div></a>
             </div>
             <div class="li_con_r_or">
                <div class="li_con_r_or_d li_con_r_or_d_2" ng-click="select(4,false,false)">综合排序</div>
                <div class="li_con_r_or_d" ng-click="select(4,'order by resourceClick desc',false)">点赞量</div>
                <div class="li_con_r_or_d" ng-click="select(4,'order by resourceView desc',false)">浏览量</div>
                <div class="li_con_r_or_d" ng-click="select(4,'order by created_at desc',false)">上传时间</div>
             </div>
             <!-------- logo 样式 ：word pdf avi ppt txt -------->

             <div class="li_con_r_bar li_con_r_bar_2" ng-repeat="i in resource" ng-if="resourceBlock">
                 <a href="{{asset('resource/resourceDetail/{[i.id]}')}}">
                     <div class="li_con_r_bar_top">
                         <div class="li_con_r_bar_top_logo {[i.resourceFormat]}"></div>
                         <div class="li_con_r_bar_top_title" ng-bind="i.resourceTitle"></div>
                     </div>
                 </a>
                 <div class="li_con_r_bar_con">
                     <!-- <div class="li_con_r_bar_con_l" style="background:url({{asset('{[i.resourcePic]}')}}) no-repeat;"> -->
                     <div class="li_con_r_bar_con_l">
                         <img src="{{asset('{[i.resourcePic]}')}}" width="140" height="100">
                     </div>
                     <div class="li_con_r_bar_con_m">
                         <div class="li_con_r_bar_con_m_t" ng-bind="'简介:'+i.resourceIntro"></div>
                         <div class="li_con_r_bar_con_m_m">
                             <div class="li_con_r_bar_con_m_m_c" ng-bind="'大小:'+i.size"></div>
                             <div class="li_con_r_bar_con_m_m_c" ng-bind="'浏览:'+i.resourceView"></div>
                             <div class="li_con_r_bar_con_m_m_c" ng-bind="'收藏:'+i.resourceFav"></div>
                         </div>
                         <div class="li_con_r_bar_con_m_b">
                             <div class="li_con_r_bar_con_m_m_c" ng-bind="'发布时间：'+i.created_at"></div>
                             <div class="li_con_r_bar_con_m_m_c" ng-bind="'发布者:'+i.resourceAuthor"></div>
                         </div>
                     </div>
                     <div class="li_con_r_bar_con_r">
                         <div class="li_con_r_bar_con_r_t">点赞量：（ <span ng-bind="i.resourceClick"></span> ）</div>
                         <div class="li_con_r_bar_con_r_btn" ng-click="doFav(i.id)"></div>
                     </div>
                 </div>
             </div>
             {{--<div class="li_con_r_bar li_con_r_bar_2" ng-if="resourceBlock">--}}
                  {{--<a href="{{asset('')}}">--}}
                  {{--<div class="li_con_r_bar_top">--}}
                    {{--<div class="li_con_r_bar_top_logo "></div>--}}
                    {{--<div class="li_con_r_bar_top_title" >title</div>--}}
                  {{--</div>--}}
                  {{--</a>--}}
                  {{--<div class="li_con_r_bar_con">--}}
                    {{--<div class="li_con_r_bar_con_l">--}}
                        {{--<img src="{{asset('/image/qiyun/resource/pre.png')}}" width="140" height="100">--}}
                    {{--</div>  --}}
                    {{--<div class="li_con_r_bar_con_m">--}}
                      {{--<div class="li_con_r_bar_con_m_t" >简介：。。。</div>--}}
                      {{--<div class="li_con_r_bar_con_m_m">--}}
                        {{--<div class="li_con_r_bar_con_m_m_c" >大小：3M</div>--}}
                       {{--<div class="li_con_r_bar_con_m_m_c" >浏览：25</div>--}}
                        {{--<div class="li_con_r_bar_con_m_m_c" >收藏：23</div>--}}
                      {{--</div>--}}
                      {{--<div class="li_con_r_bar_con_m_b">--}}
                        {{--<div class="li_con_r_bar_con_m_m_c" >发布时间：2015-2-21</div>--}}
                        {{--<div class="li_con_r_bar_con_m_m_c" >发布者admin</div>--}}
                      {{--</div>--}}
                    {{--</div>  --}}
                    {{--<div class="li_con_r_bar_con_r">--}}
                      {{--<div class="li_con_r_bar_con_r_t">点赞量：（ <span ng-bind="i.resourceClick"></span> ）</div>--}}
                      {{--<div class="li_con_r_bar_con_r_btn" ng-click="doFav(i.id)"></div>--}}
                    {{--</div>--}}
                  {{--</div>--}}
             {{--</div>   --}}


            <div class="spinner" style=" padding:100px 0px;" ng-if="resourceLoad">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
            </div>

            <div id="errorMessage" style="padding:100px 0px;"  ng-if="resourceLoadError">没有找到匹配数据...</div>
                


         </div>
      </div>

      <div class="clear"></div>
      <div class="li_page" ng-if="pageShow" style="width:790px;height:20px;float: right;">
          <tm-pagination conf="paginationConf"></tm-pagination>
      </div>
<!--       <div class="li_page">
          <div class="li_page_con">
              <div class="pg pg_n">1</div>
              <div class="pg">2</div>
              <div class="pg">3</div>
              <div class="pg">4</div>
              <div class="pg">5</div>
          </div>
      </div> -->
  </div>
@endsection

@section('js')
  <script type="text/javascript">
      var paraa = {!! $paraa !!};
      var parab = {!! $parab !!};
      var parac = {!! $parac !!};
  </script>

  <script type="text/javascript" src="{{ URL::asset('js/qiyun/resource/resourceList.js') }}"></script>
  <script src="{{ URL::asset('js/qiyun/angular/controller/expandResourceListController.js') }}"></script>
@endsection