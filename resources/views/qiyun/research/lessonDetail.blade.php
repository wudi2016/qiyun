@extends('qiyun.layouts.layoutHome')

@section('title','协备详情')

@section('css')

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/research/lessonDetail.css') }}">
  
@endsection

@section('content')
  <div id="shadow"
     style="height: 1300px;width: 2000px;
         background-color: #ddd;display: none;
         position:fixed;z-index: 1;opacity: 0.6;
         left: 0px;top: 0px"></div>
  <div class="body">

    <div ng-controller="lessonDetailController">

      <div class="clear"></div>

    <!-- 面包屑导航 -->
      <div class="crumbs">
        <ul class="crumbs_ul">
          <div class="crumbs_div1"><li class="crumbs_ul_li"><img class="crumbs_ul_li_img1" src="{{ URL::asset('image/qiyun/research/lessonDetail/add/20.png') }}" alt=""><img src="{{ URL::asset('image/qiyun/research/lessonDetail/add/jiantou.png') }}" alt=""></li></div>
          <div class="crumbs_div2"><li><span class="crumbs_span2">教研备课</span><img src="{{ URL::asset('image/qiyun/research/lessonDetail/add/jiantou.png') }}" alt=""></li></div>
          <div class="crumbs_div3"><li><span class="crumbs_span3">协同备课</span><img src="{{ URL::asset('image/qiyun/research/lessonDetail/add/jiantou.png') }}" alt=""></li></div>
          <div class="crumbs_div4"><li><span class="crumbs_span4">备课组详情</span></li></div>
        </ul>
      </div>


      <div style="height:10px"></div>
      <div class="bk_bar"></div>

      <div class="bk_det">
          <div class="bk_det_t">
              <div class="bk_det_t_l">协备详情</div>
              <!-- <div class="bk_det_t_r">管理协备</div> -->
          </div>
          <div class="bk_det_b">
              <div class="bk_det_b_l"><img src="{[data.lessonDetail.picture]}" width="200" height="150"/></div>
              <div class="bk_det_b_m">
                  <div class="bk_det_b_m_t" ng-bind="data.lessonDetail.title"></div>
                  <div class="bk_det_b_m_l" ng-bind="'创建: ' + data.lessonDetail.create_at"></div>
                  <div class="bk_det_b_m_l" ng-bind="'时间: ' + data.lessonDetail.startTime + ' - ' + data.lessonDetail.endTime"></div>
                  <div class="bk_det_b_m_l" ng-bind="'主备人: ' + data.lessonDetail.author"></div>
                  <div class="bk_det_b_m_l" ng-bind="'教材: ' + data.lessonDetail.resource"></div>
                  <!-- <div class="bk_det_b_m_l" ng-bind="'所属计划: ' + data.lessonDetail.plan"></div> -->
              </div>
              <div class="bk_det_b_r">
                  <div ng-click="publishCommonCase(id);" style="cursor: pointer" class="bk_det_b_r_l_a"></div>
                  <div ng-click="publishPic(id);" style="cursor: pointer" class="bk_det_b_r_l_b"></div>
                  <div ng-click="publishAudio(id);" style="cursor: pointer" class="bk_det_b_r_l_c"></div>
                  <div ng-click="publishResource(id);" style="cursor: pointer" class="bk_det_b_r_l_d"></div>
                  <div ng-click="publishTopic(id);" style="cursor: pointer" class="bk_det_b_r_l_e"></div>
              </div>
          </div>
      </div>

      <div class="bk_con">
          <div class="bk_con_l">
              <div class="bk_con_l_con">
                   <div class="bk_con_l_con_t">
                       <div class="bk_con_l_con_t_l">共案列表</div>
                       <div class="bk_con_l_con_2_t_m">更多</div>
                   </div>

                   <div class="bk_con_l_con_b" ng-repeat="i in data.commomCase">
                       <div class="bk_con_l_con_b_a">
                           <div class="bk_con_l_con_b_aa" ng-bind="i.title"></div>
                       </div>
                       <div class="bk_con_l_con_b_b">
                           <div class="bk_con_l_con_b_b_l">
                               <div class="bk_con_l_con_b_b_l_a">
                                    <div class="bk_con_l_con_b_b_l_a_l"></div>
                                    <div class="bk_con_l_con_b_b_l_a_r">
                                         <div class="bk_con_l_con_b_b_l_a_r_t" ng-bind="i.resourceTitle"></div>
                                         <div class="bk_con_l_con_b_b_l_a_r_b">
                                            <div class="bk_con_l_con_b_b_l_a_r_b_l" ng-bind="'格式: ' + i.resourceFormat"></div>
                                            <div class="bk_con_l_con_b_b_l_a_r_b_l" ng-bind="'上传时间: ' + i.created_at"></div>
                                            <a href="{{url('/research/doDownloadCommonCase/{[i.id]}')}}" onclick="return confirm('确认下载该资源?')"><div class="bk_con_l_con_b_b_l_a_r_b_l" style="color:#598ED2">下载</div></a>
                                         </div>
                                    </div>
                               </div>
                           </div>
                           <div class="bk_con_l_con_b_b_r">
                               <div class="bk_con_l_con_b_b_r_l" ng-bind="'最后编辑: ' + i.lastEdit"></div>
                               <div class="bk_con_l_con_b_b_r_l" ng-bind="i.updated_at"></div>
                               <div class="bk_con_l_con_b_b_r_l" ng-bind="'当前状态: ' + i.status"></div>
                               <div class="bk_con_l_con_b_b_r_l" ><a href="{{url('/research/doDownloadCommonCase/{[i.id]}')}}" onclick="return confirm('确认下载该资源?')"><button class="bj">编辑主题</button></a></div>
                               <div class="bk_con_l_con_b_b_r_l" ><a href="{{url('/research/doDownloadCommonCase/{[i.id]}')}}" onclick="return confirm('确认下载该资源?')"><button class="ck">查看共案</button></a></div>
                           </div>
                       </div>
                   </div>

                   <div class="spinner" style="margin: 150px auto;" ng-class="{disable: loading.commomCase}">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                   </div>
          
                   <div id="errorMessage" style="margin: 150px auto;" ng-class="{disable: error.commomCase}">数据加载失败，请尝试 <a ng-click="reload('getCommomCase', 'commomCase');">刷新</a> 一下</div>
                   <div id="errorMessage" style="margin: 150px auto;" ng-class="{disable: empty.commomCase}">没有找到相关共案！</div>

              </div>

              <!-- <div class="bk_con_l_con">
                   <div class="bk_con_l_con_t">
                       <div class="bk_con_l_con_t_l">个案列表</div>
                       <div class="bxga">编写个案 | 全部个案</div>
                   </div>

                   <div class="bk_con_l_con_b" ng-repeat="i in data.singleCase">
                       <div class="bk_con_l_con_b_a">
                           <div class="bk_con_l_con_b_aa" ng-bind="i.title"></div>
                       </div>
                       <div class="bk_con_l_con_b_b">
                           <div class="bk_con_l_con_b_b_l">
                               <div class="bk_con_l_con_b_b_l_a">
                                    <div class="bk_con_l_con_b_b_l_a_l"></div>
                                    <div class="bk_con_l_con_b_b_l_a_r">
                                         <div class="bk_con_l_con_b_b_l_a_r_t" ng-bind="i.resourceTitle"></div>
                                         <div class="bk_con_l_con_b_b_l_a_r_b">
                                            <div class="bk_con_l_con_b_b_l_a_r_b_l" ng-bind="'格式: ' + i.resourceFormat"></div>
                                            <div class="bk_con_l_con_b_b_l_a_r_b_l" ng-bind="'上传时间: ' + i.created_at"></div>
                                            <div class="bk_con_l_con_b_b_l_a_r_b_l">下载</div>
                                         </div>
                                    </div>
                               </div>
                           </div>
                           <div class="bk_con_l_con_b_b_r">
                               <div class="bk_con_l_con_b_b_r_l" ng-bind="'最后编辑: ' + i.lastEdit"></div>
                               <div class="bk_con_l_con_b_b_r_l" ng-bind="i.updated_at"></div>
                               <div class="bk_con_l_con_b_b_r_l" ng-bind="'当前状态: ' + i.status"></div>
                               <div class="bk_con_l_con_b_b_r_l" ><button class="bj">编辑主题</button></div>
                               <div class="bk_con_l_con_b_b_r_l" ><button class="ck">查看共案</button></div>
                           </div>
                       </div>
                   </div>



                   <div class="spinner" style="margin: 120px auto;" ng-class="{disable: loading.singleCase}">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                   </div>
          
                   <div id="errorMessage" ng-class="{disable: error.singleCase}">数据加载失败，请尝试 <a ng-click="reload('getSingleCase', 'singleCase');">刷新</a> 一下</div>
                   <div id="errorMessage" ng-class="{disable: empty.singleCase}">数据加载失败，请尝试 <a ng-click="reload('getSingleCase', 'singleCase');">刷新</a> 一下</div>

              </div> -->

              <!-- <div class="bk_con_l_con">
                   <div class="bk_con_l_con_t">
                       <div class="bk_con_l_con_t_l_x">内容</div>
                       <div class="bk_con_l_con_t_xk sel_bk">初备</div>
                       <div class="bk_con_l_con_t_xk">反思</div>
                   </div>
                  
                  <div style="height:20px"></div>


                   <div class="bk_con_l_con_b" ng-repeat="i in data.content">
                       <div class="bk_con_l_con_t_xk_con" ng-bind="'初备流程说明: ' + i.firstPrepare"></div>
                       <div class="bk_con_l_con_t_xk_con" ng-bind="'反思: ' + i.reflect" style="display:none"></div>
                   </div>

                   <div class="spinner" style="margin: 80px auto;" ng-class="{disable: loading.content}">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                   </div>
          
                   <div id="errorMessage" style="margin: 80px auto;" ng-class="{disable: error.content}">数据加载失败，请尝试 <a ng-click="reload('getContent', 'content');">刷新</a> 一下</div>
                   <div id="errorMessage" style="margin: 80px auto;" ng-class="{disable: empty.content}">该备课没有说明及反思！</div>

              </div> -->


              
              <!-- <div class="bk_con_l_con_2">
                   <div class="bk_con_l_con_2_t">
                       <div class="bk_con_l_con_2_t_bg"></div>
                       <div class="bk_con_l_con_2_t_c">文章</div>
                       <div class="bk_con_l_con_2_t_m">更多</div>
                   </div>
                   <div class="bk_con_l_con_2_c" ng-repeat="i in realArticle" ng-if="realArticleCon">
                       <div class="bk_con_l_con_2_c_l" ng-bind="i.title"></div>
                       <div class="bk_con_l_con_2_c_r" ng-bind="i.created_at"></div>
                   </div>
                

                   <div class="spinner" style="margin: 80px auto;" ng-if="realArticleLoad">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                   </div>
          
                   <div id="errorMessage" ng-if="realArticleMsg" style="margin: 80px auto;" >数据加载失败，请尝试 <a ng-click="reloadTwo('realArticle');">刷新</a> 一下</div>
                   <div id="errorMessage" ng-if="realArticleEmpty" style="margin: 80px auto;" >没有找到相关文章！</div>

              </div> -->

              <div class="bk_con_l_con">
                   <div class="bk_con_l_con_t">
                       <div class="bk_con_l_con_t_l">个案列表</div>
                       <!-- <div class="bxga">编写个案 | 全部个案</div> -->
                   </div>
              </div>

              <!-- 资源 -->

              <div class="bk_con_l_con_2">
                   <div class="bk_con_l_con_2_t">
                       <div class="bk_con_l_con_2_t_bg"></div>
                       <div class="bk_con_l_con_2_t_c">资源</div>
                       <a href="/research/lessonResourseList/{[id]}"><div class="bk_con_l_con_2_t_m">更多</div></a>
                   </div>

                   <div class="bk_con_l_con_2_c" ng-repeat="i in data.article">
                      <a href="{{url('/lessonDetail/resourceDetail/{[i.id]}')}}">
                       <div class="bk_con_l_con_2_c_p"><img src="{[i.pic]}" width="30"></div>
                       <div class="bk_con_l_con_2_c_l" style="color:#000000" ng-bind="i.title"></div>
                       <div class="bk_con_l_con_2_c_m" style="color:#000000" ng-bind="i.size + 'KB'"></div>
                       <div class="bk_con_l_con_2_c_r" style="color:#000000" ng-bind="i.created_at"></div>
                      </a>
                   </div>

                   <div class="spinner" style="margin: 80px auto;" ng-class="{disable: loading.article}">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                   </div>
          
                   <div id="errorMessage" style="margin: 80px auto;" ng-class="{disable: error.article}">数据加载失败，请尝试 <a ng-click="reload('getArticle', 'article');">刷新</a> 一下</div>
                   <div id="errorMessage" style="margin: 80px auto;" ng-class="{disable: empty.article}">没有找到相关资源！</div>

              </div>

              <div class="clear" style="height:20px;"></div>
              
            





  
              <div class="clear" style="height:20px;"></div>


              <div class="bk_con_l_con_2">
                   <div class="bk_con_l_con_2_t">
                       <div class="bk_con_l_con_2_t_bg"></div>
                       <div class="bk_con_l_con_2_t_c">图片</div>
                       <a href="{{url('/lessonDetail/imageList/{[id]}')}}"><div class="bk_con_l_con_2_t_m">更多</div></a>
                   </div>

                   <div class="bk_con_l_con_2_con" ng-repeat="i in data.image">
                       <a href="{{url('/lessonDetail/imageDetail/{[i.id]}')}}"><div class="bk_con_l_con_2_con_l"><img src="{[i.picture]}" width="225" height="180" /></div></a>
                   </div>

                   <div class="spinner" style="margin: 100px auto;" ng-class="{disable: loading.image}">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                   </div>
          
                   <div id="errorMessage" style="margin: 100px auto;" ng-class="{disable: error.image}">数据加载失败，请尝试 <a ng-click="reload('getImage', 'image');">刷新</a> 一下</div>
                   <div id="errorMessage" style="margin: 100px auto;" ng-class="{disable: empty.image}">没有找到相关图片！</div>

              </div>
              
              <div class="clear" style="height:20px;"></div>

              <div class="bk_con_l_con_2">
                   <div class="bk_con_l_con_2_t">
                       <div class="bk_con_l_con_2_t_bg"></div>
                       <div class="bk_con_l_con_2_t_c">视频</div>
                       <a href="/research/lessonVideoList/{[id]}"><div class="bk_con_l_con_2_t_m">更多</div></a>
                   </div>

                   <div class="bk_con_l_con_2_con" ng-repeat="i in data.video">
                       <!-- <a href=""><div class="bk_con_l_con_2_con_l" style="background: url('{[i.picture]}');"></div></a> -->
                       <a href="{{url('/lessonDetail/videoDetail/{[i.id]}')}}"><div class="bk_con_l_con_2_con_l" style="background: url('{{asset("image/qiyun/research/lessonDetail/add/ship.png")}}');"></div></a>
                   </div>

                   <div class="spinner" style="margin: 100px auto;" ng-class="{disable: loading.video}">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                   </div>
          
                   <div id="errorMessage" style="margin: 100px auto;" ng-class="{disable: error.video}">数据加载失败，请尝试 <a ng-click="reload('getVideo', 'video');">刷新</a> 一下</div>
                   <div id="errorMessage" style="margin: 100px auto;" ng-class="{disable: empty.video}">没有找到相关视频！</div>

              </div>

             <div class="clear"></div>

              <div class="bk_con_l_con_2">
                  <div class="bk_con_l_con_2_t">
                      <div class="bk_con_l_con_2_t_bg"></div>
                      <div class="bk_con_l_con_2_t_c">话题</div>
                      <a href="/research/lessonTopicList/{[id]}"><div class="bk_con_l_con_2_t_m">更多</div></a>
                  </div>

                  <div class="first_line">
                      <ul>
                          <li ng-repeat="i in data.topic">
                              <a style="color:#000;" href="{{url('/lessonDetail/topicDetail/{[i.id]}')}}">
                                  <span ng-bind="'标题：' + i.title"></span>
                              </a>
                              <span class="first_line_second" ng-bind="'作者：' +i.author" style="text-align: right"></span>
                              <span ng-bind="i.create_at" class="first_line_last"></span>
                          </li>
                      </ul>
                  </div>

                  <div class="spinner" style="margin: 100px auto;" ng-class="{disable: loading.topic}">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                  </div>

                  <div id="errorMessage" style="margin: 100px auto;" ng-class="{disable: error.topic}">数据加载失败，请尝试 <a ng-click="reload('getTopic', 'topic');">刷新</a> 一下</div>
                  <div id="errorMessage" style="margin: 100px auto;" ng-class="{disable: empty.topic}">没有找到相关话题！</div>

              </div>

              <div class="clear"></div>

              <!-- <div class='kong'>
                <div class="kong1">
                    <img src="{{ URL::asset('image/qiyun/research/lessonDetail/add/ship.png') }}" alt="">
                </div>
                <div class="kong2">
                    <img src="{{ URL::asset('image/qiyun/research/lessonDetail/add/ship.png') }}" alt="">
                </div>
                <div class="kong3">
                    <img src="{{ URL::asset('image/qiyun/research/lessonDetail/add/ship.png') }}" alt="">
                </div>
              </div> -->

             <div class="clear" style="height:50px;"></div>
          </div>

          <div class="bk_con_r">

             <!--  <div class="bk_con_r_con">
                  <div class="bk_con_r_con_t">
                      <div class="bk_con_r_con_t_l">协备贡献榜</div>
                  </div>
                  <div class="bk_con_r_con_b">

                      <div class="bk_con_r_con_b_gx" ng-repeat="i in data.contribution">
                          <div class="bk_con_r_con_b_gx_l" contribution-count></div>
                          <div class="bk_con_r_con_b_gx_m" ng-bind="i.name"></div>
                          <div class="bk_con_r_con_b_gx_r" ng-bind="i.count + '篇'"></div>
                      </div>
                      
                      <div class="spinner" style="margin: 100px auto;" ng-class="{disable: loading.contribution}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                      </div>
            
                      <div id="errorMessage" ng-class="{disable: error.contribution}">数据加载失败，请尝试 <a ng-click="reload('getContribution', 'contribution');">刷新</a> 一下</div>

                  </div>
              </div>

              <div class="bk_con_r_con">
                  <div class="bk_con_r_con_t">
                      <div class="bk_con_r_con_t_l">集备话题</div>
                      <div class="bk_con_r_con_m">更多</div>
                  </div>
                  <div class="bk_con_r_con_b">

                      <a href="/research/lessonDetail/{[i.id]}" ng-repeat="i in data.topic">
                          <div class="bk_con_r_con_b_ht" ng-bind="i.title"></div>
                      </a>

                      <div class="spinner" style="margin: 100px auto;" ng-class="{disable: loading.topic}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                      </div>
            
                      <div id="errorMessage" ng-class="{disable: error.topic}">数据加载失败，请尝试 <a ng-click="reload('getTopic', 'topic');">刷新</a> 一下</div>

                  </div>
              </div> -->

              <div class="bk_con_r_con">
                  <div class="bk_con_r_con_t">
                      <div class="bk_con_r_con_t_l">相关协备</div>
                      {{--<div class="bk_con_r_con_m">更多</div>--}}
                  </div>
                  <div class="bk_con_r_con_b">

                      <a href="/research/lessonDetail/{[i.id]}" ng-repeat="i in data.relevant">
                          <div class="bk_con_r_con_b_ht" ng-bind="i.title"></div>
                      </a>

                      <div class="spinner" style="margin: 100px auto;" ng-class="{disable: loading.relevant}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                      </div>
            
                      <div id="errorMessage" style="margin: 100px auto;"  ng-class="{disable: error.relevant}">数据加载失败，请尝试 <a ng-click="reload('getRelevant', 'relevant');">刷新</a> 一下</div>
                      <div id="errorMessage" style="margin: 100px auto;"  ng-class="{disable: empty.relevant}">没有找到相关协备！</div>

                  </div>
              </div>

              <div class="bk_con_r_con">
                  <div class="bk_con_r_con_t">
                      <div class="bk_con_r_con_t_l">协备统计</div>
                  </div>

                  <div class="bk_con_r_con_b" ng-repeat="i in data.count">
                      <!-- <div class="bk_con_r_con_b_ht" ng-bind="'个案: ' + i.singleCase"></div>
                      <div class="bk_con_r_con_b_ht" ng-bind="'文案: ' + i.document"></div>
                      <div class="bk_con_r_con_b_ht" ng-bind="'资源: ' + i.resource"></div>
                      <div class="bk_con_r_con_b_ht" ng-bind="'图片: ' + i.image"></div>
                      <div class="bk_con_r_con_b_ht" ng-bind="'视频: ' + i.video"></div>
                      <div class="bk_con_r_con_b_ht" ng-bind="'话题: ' + i.topic"></div> -->


                      <!-- <div class="bk_con_r_con_b_ht1">
                           <img src="{{ URL::asset('image/qiyun/research/lessonDetail/add/4.png') }}"   alt="">
                           <span class="bk_con_r_con_b_img1" ng-bind="'个案: ' + i.singleCase"></span>
                      </div> -->
                      <div class="bk_con_r_con_b_ht2">
                           <img src="{{ URL::asset('image/qiyun/research/lessonDetail/add/9.png') }}"  alt="">
                           <span class="bk_con_r_con_b_img2" ng-bind="'文案: ' + i.document"></span>
                      </div>
                      <div class="bk_con_r_con_b_ht3">
                           <img src="{{ URL::asset('image/qiyun/research/lessonDetail/add/11.png') }}"   alt="">
                           <span class="bk_con_r_con_b_img3" ng-bind="'资源: ' + i.resource"></span>
                      </div>
                      <div class="bk_con_r_con_b_ht4">
                           <img src="{{ URL::asset('image/qiyun/research/lessonDetail/add/10.png') }}"  alt="">
                           <span class="bk_con_r_con_b_img4" ng-bind="'图片: ' + i.image"></span>
                      </div>
                      <div class="bk_con_r_con_b_ht5">
                           <img src="{{ URL::asset('image/qiyun/research/lessonDetail/add/12.png') }}"  alt="">
                           <span class="bk_con_r_con_b_img5" ng-bind="'视频: ' + i.video"></span>
                      </div>
                      <div class="bk_con_r_con_b_ht6">
                           <img src="{{ URL::asset('image/qiyun/research/lessonDetail/add/8.png') }}"  cl alt="">
                           <span class="bk_con_r_con_b_img6" ng-bind="'话题: ' + i.topic"></span>
                      </div>
                  </div>

                  <div class="spinner" style="margin: 100px auto;" ng-class="{disable: loading.count}">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                  </div>
        
                  <div id="errorMessage" ng-class="{disable: error.count}">数据加载失败，请尝试 <a ng-click="reload('getCount', 'count');">刷新</a> 一下</div>

              </div>

              <div class="bk_con_r_con">
                  <div class="bk_con_r_con_t">
                      <div class="bk_con_r_con_t_l">教案组成员</div>
                  </div>
                  <div class="bk_con_r_con_b">

                      <div class="bk_con_r_con_b_cy" ng-repeat="i in data.lessonMember">
                          <div class="bk_con_r_con_b_cy_t" style="background-image: url('{[i.picture]}');"></div>
                          <a href=""><div class="bk_con_r_con_b_cy_b" ng-bind="i.name"></div></a>
                      </div>

                      <div class="spinner" style="margin: 100px auto;" ng-class="{disable: loading.lessonMember}">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                      </div>
            
                      <div id="errorMessage" style="margin: 100px auto;" ng-class="{disable: error.lessonMember}">数据加载失败，请尝试 <a ng-click="reload('getLessonMember', 'lessonMember');">刷新</a> 一下</div>
                      <div id="errorMessage" style="margin: 100px auto;" ng-class="{disable: empty.lessonMember}">该备课组没有成员！</div>

                  </div>
              </div>
          </div>
      </div>

        {{--<!-- ==========================发布话题div开始========================== -->--}}
        <div id="content" ng-controller="topicCtrl">
            <h2>发布话题</h2>
            <div style="clear: both"></div>
            <hr>
            <!--  输入框div -->
            <form>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div style="height:22px"></div>
                <div class="content_div">
                    <span class="content_div_span">话题标题</span>
                    <input type="text" name="title" ng-model="topic.title" class="content_input" />
                </div>
                <div style="height:21px"></div>
                <!-- 话题内容框div -->
                <div class="content_div2">
                    <span class="content_div2_span">话题内容</span>
                    <textarea name="content" class="content_div2_textarea" ng-model="topic.content" maxlength="200" ></textarea>
                </div>
                <div style="height:10px"></div>
                <!-- 输入提示 -->
                <div class="content_div3">
                    您还输入<span>200</span>字
                </div>
                <div style="height:17px"></div>
                <!-- 确定，取消 -->
                <div class="content_div4">
                    <span id="btnSub" ng-click="insertTopic(topic.title,topic.content);">确定</span>
                    <button id="btnRes" type="reset">取消</button>
                </div>
            </form>
        </div>
        {{--<!-- ==========================发布话题div结束========================== -->--}}
    </div>
  </div>

@endsection

@section('js')
  <script type="text/javascript" src="{{ URL::asset('js/qiyun/research/lessonDetail.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/js/qiyun/angular/controller/lessonDetailController.js') }}"></script>
  <script type="text/javascript">
      var lessonDetail = {!! $lessonDetail !!};
  </script>
@endsection