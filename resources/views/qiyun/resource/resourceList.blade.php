@extends('qiyun.layouts.layoutHome')

@section('title','资源列表')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/resource/resourceList.css') }}">
@endsection

@section('content')
  <div class="body" ng-controller="resourceListCtrl">

      <div class="clear"></div>
      <div class="posi">
         <a href=""><div class="li_home">></div></a>
         <a href="{{url('/resource')}}"><div class="li_nxt">资源中心 ></div></a>
          <a href=""><div class="li_nxt">{{$menu}} ></div></a>
          <a href=""><div class="li_nxt" ng-bind="a + '>' "></div></a>
          <a href=""><div class="li_nxt" ng-bind="b + '>' "></div></a>
          <a href=""><div class="li_nxt" ng-bind="c"></div></a>
      </div>

      <div class="li_bar"></div>

      <div class="li_sel">
         <div class="li_sel_con" >
            <div class="li_sel_xk_d">
               <div class="li_sel_xk_d_xk">学科:</div>

               <div class="li_sel_xk_d_cn" sel-sty ng-class="{sel: $index == 0}" ng-repeat="i in subject" ng-bind="i.subjectName" ng-click="select(1,i.id,i.subjectName)"></div>

              <!-- <div class="li_sel_xk_d_cn sel">数学</div> -->

               <div class="li_sel_xk_d_m" chapter-list ng-if="subjectMore">更多 <span class="jt">▼</span></div>
            </div>
            <!-- 隐藏 -->
            <div class="clear"></div>
            <div class="li_sel_xk_m" style="display:none">

               <div class="li_sel_xk_d_cn" sel-sty ng-repeat="i in subject2" ng-bind="i.subjectName" ng-click="select(1,i.id,i.subjectName)"></div>

               <!-- <div class="li_sel_xk_d_cn">数学</div> -->
           
            </div>
            <div class="clear"></div>
         </div>
          
         <div class="li_sel_con">
            <div class="li_sel_xk_d">
               <div class="li_sel_xk_d_xk">版本:</div>

               <div class="li_sel_xk_d_cn" sel-sty ng-class="{sel: $index == 0}" ng-repeat="i in edition" ng-bind="i.editionName" ng-click="select(2,i.id,i.editionName)"></div>

               <!-- <div class="li_sel_xk_d_cn">人教版</div> -->

               <div class="li_sel_xk_d_m" chapter-list ng-if="editionMore">更多 <span class="jt">▼</span></div>
            </div>
            <!-- 隐藏 -->
            <div class="clear"></div>
            <div class="li_sel_xk_m" style="display:none">

              <div class="li_sel_xk_d_cn" sel-sty  ng-repeat="i in edition2" ng-bind="i.editionName" ng-click="select(2,i.id,i.editionName)"></div>

              <!-- <div class="li_sel_xk_d_cn">苏教版</div> -->
           
            </div>
            <div class="clear"></div>
         </div>

         <div class="li_sel_con">
            <div class="li_sel_xk_d">
               <div class="li_sel_xk_d_xk">册别:</div>

               <div class="li_sel_xk_d_cn" sel-sty ng-class="{sel: $index == 0}" ng-repeat="i in grade" ng-bind="i.gradeName" ng-click="select(3,i.id,i.gradeName)">一年级下册</div>

               <!-- <div class="li_sel_xk_d_cn">一年级下册</div> -->

               <div class="li_sel_xk_d_m" chapter-list ng-if="gradeMore">更多 <span class="jt">▼</span></div>
            </div>
            <!-- 隐藏 -->
            <div class="clear"></div>
            <div class="li_sel_xk_m" style="display:none">

              <div class="li_sel_xk_d_cn" sel-sty  ng-repeat="i in grade2" ng-bind="i.gradeName" ng-click="select(3,i.id,i.gradeName)">一年级下册</div>

               <!-- <div class="li_sel_xk_d_cn">一年级下册</div> -->
       
            </div>
            <div class="clear"></div>
         </div>
      </div>
      
      <div class="li_con">
         <div class="li_con_l">
             <div class="li_con_l_t">
                 <div class="li_con_l_t_con">教材目录 </div>
             </div>

             <div class="li_con_l_list" ng-repeat="i in chapter">
                 <div class="li_con_l_list_nm" ><div class="li_con_l_list_nm_t" ng-click="select(4,' and resourceChapter in ('+ i.chapterChildIds +')'  )">{[i.chapterTitle]}</div> <div class="jt2" chap-sty>▼</div></div>
                 <div class="li_con_l_list_cont" style="display:none">
                     <div class="li_con_l_list_cont_d" shap-styt ng-repeat="j in i.chapterContent" ng-bind="$index+1+'.'+j.chapterName" ng-click="select(4,' and resourceChapter = '+j.id,false)"></div>
                      <!-- <div class="li_con_l_list_cont_d">1.我多想去看看</div> -->
                 </div>
             </div>

            <!-- <div class="li_con_l_list">
                 <div class="li_con_l_list_nm">汉语拼音 <span class="jt2">▼</span></div>
                 <div class="li_con_l_list_cont" style="display:none">
                     <div class="li_con_l_list_cont_d">1.我多想去看看</div>
                     <div class="li_con_l_list_cont_d">2.雨点儿</div>
                     <div class="li_con_l_list_cont_d">3.雨点儿</div>
                     <div class="li_con_l_list_cont_d">4.雨点儿</div>
                 </div>
             </div> -->

         </div>
         <div class="li_con_r">
             <div class="li_con_r_top">
                <!-- 资源类型 -->
                <div class="li_con_r_top_ls" ng-class="{btm:$index == 0}"  res-ty ng-repeat="i in resourcetype" ng-bind="i.resourceTypeName" ng-click="select(5,' and resourceType = '+i.id,false)"></div>

                <!-- <div class="li_con_r_top_ls btm">全部资源(377份)</div>
                <div class="li_con_r_top_ls">教案</div>
                <div class="li_con_r_top_ls">课件</div>
                <div class="li_con_r_top_ls">习题</div>
                <div class="li_con_r_top_ls">素材</div>
                <div class="li_con_r_top_ls">其他</div> -->
                <a href="{{url('/resource/uploadResource')}}"><div class="li_con_r_top_ls_r"></div></a>
             </div>
             <div class="li_con_r_or">
                <div class="li_con_r_or_d li_con_r_or_d_2" ng-click="select(6,false,false)">综合排序</div>
                <div class="li_con_r_or_d" ng-click="select(6,'order by resourceClick desc',false)">点赞量</div>
                <div class="li_con_r_or_d" ng-click="select(6,'order by resourceView desc',false)">浏览量</div>
                <div class="li_con_r_or_d" ng-click="select(6,'order by created_at desc',false)">上传时间</div>
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
                        <img ng-src="{{asset('{[i.resourcePic]}')}}" width="140" height="100">
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
      var sectionId = {!! $sectionId !!};
      var subjectId = {!! $subjectId !!};
      var editionId = {!! $editionId !!};
  </script>

  <script type="text/javascript" src="{{ URL::asset('js/qiyun/resource/resourceList.js') }}"></script>
  <script src="{{ URL::asset('js/qiyun/angular/controller/resourceListController.js') }}"></script>
@endsection