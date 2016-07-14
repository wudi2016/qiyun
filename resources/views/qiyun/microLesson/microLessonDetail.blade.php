@extends('qiyun.layouts.layoutHome')

@section('title','微课详情')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/microLesson/microLessonDetail.css') }}">
@endsection

@section('content')
    <div class="body" ng-controller="resourceDetailController">
      <div class="clear"></div>
      <div class="posi">
         <a href=""><div class="li_home">></div></a>
         <a href="{{url('/microLesson')}}"><div class="li_nxt">微课中心</div></a>
         <a href=""><div class="li_nxt"> >微课列表页</div></a>
{{--         <a href=""><div class="li_nxt"> ></div></a>
         <a href=""><div class="li_nxt"></div></a>     --}}
      </div>


      <div class="de_con">
         <div class="de_con_l">
             <!-- 标题 -->
             <div class="de_con_l_t" >{{ $title }}</div>
             <div class="info">
                  <div class="info_l" >上传时间:  {[{{ $create_at}} | formatTime]}</div>
                  <div class="info_l" >大小: {{ $filesize}} KB</div>
                  <div class="info_l" >贡献者: {{ $author}}</div>
                  {{--<div class="info_l" >时长: {{ $score}} 分</div>--}}
                  <div class="info_l" id="demo"></div>
                  <div class="info_l" >点赞数: {{ $fav}}</div>
                  <div class="info_l" >浏览: {{ $viewnum}}</div>

                  <!-- <div class="info_l">
                      <div class="info_l_c">评分：</div> 
                      <div class="del_xin2" star-count ng-value="^^ data.detail.score ^^"></div>
                  </div> -->
             </div>
             <br />
             <div class="de_con_l_des" >
             简介: {{ $description}}
             </div>
             <!-- 视频界面 -->
             <div class="de_con_l_con">
              @if (in_array($type,['mp4','avi','rmvb','wmv','3gp','flv','mpg']))
              
              <!-- html5视频播放器，只为取出时长 -->
              <video id="videoplay" hidden src="{{ URL::asset($src) }}" controls="controls" oncanplaythrough="myFunction()">

              </video>

             <embed src="{{ URL::asset('ckplayer/ckplayer/ckplayer.swf') }}" flashvars="f={{ URL::asset($src) }}" quality="high" name="player"  width="100%" height="100%" align="middle" allowScriptAccess="always" allowFullscreen="true" type="application/x-shockwave-flash"></embed>


                     <!-- <video src="{{ URL::asset($src) }}" width="100%" height="100%" controls="controls" preload>您的浏览器不支持 video 标签。</video>-->
                @elseif(in_array($type,['mp3','ogg']))
                <div style="width:100%;height:100%;">
                  <div style="height:50%"></div>
                  <audio src="{{ URL::asset($src) }}"  controls="controls" preload>您的浏览器不支持 audio 标签。</audio>
                </div>
                @elseif(in_array($type,['jpg','jpeg','gif','png','bmp']))
                <div style="width:100%;height:100%;overflow:auto">
                  <img src="{{ URL::asset($src) }}" style="max-width:100%;">
                </div>
                @else
                       <video src="{{ URL::asset($src) }}" width="100%" height="100%" controls="controls" preload>您的浏览器不支持 video 标签。</video>
                @endif

                <!--<embed src="{{ URL::asset('ckplayer/ckplayer/ckplayer.swf') }}" flashvars="f={{ URL::asset($src) }}" quality="high" width="100%" height="100%" align="middle" allowScriptAccess="always" allowFullscreen="true" type="application/x-shockwave-flash"></embed>-->
                
                
                
               <div class="de_con_graybg">
                    <!-- 分享 -->
                    <div class="de_con_graybg_jb">
                        <!-- <a href="#"><input name="submit" type="image" value="" src="{{asset('image/qiyun/microLesson/newAdd/3.png')}}" class="de_con_graybg_fx_img"></a> -->
                        
                        <span class="" style="color:red;cursor:pointer" ng-click="doinformant()">举报 </span>
                    </div>
                    <div class="de_con_graybg_fx">
                        <a href="#"><input name="submit" type="image" value="" src="{{asset('image/qiyun/microLesson/newAdd/3.png')}}" class="de_con_graybg_fx_img"></a>

                        <span class="de_con_graybg_fx_span1">分享 </span>
                    </div>
                     <!-- 收藏 -->
                    <div class="de_con_graybg_sc">
                        <input name="submit" type="image" value="" src="{{asset('image/qiyun/microLesson/newAdd/2.png')}}" class="de_con_graybg_sc_img" ng-click="doFav({{$lessonId}})">
                        <span class="de_con_graybg_sc_span1">收藏 {[fav]}</span>
                    </div>
                    <!-- 点赞 -->
                    <div class="de_con_graybg_dz">
                        <input name="submit" type="image" value="" src="{{asset('image/qiyun/microLesson/newAdd/1.png')}}" class="de_con_graybg_dz_img" ng-click="doClick({{$lessonId}})">
                        <span class="de_con_graybg_dz_span1">点赞 {[click]}</span>
                    </div>

                </div>
             </div>
             <!-- <div class="de_con_l_b">
                 <div class="de_con_l_b_o"></div>
                 <div class="de_con_l_b_t"></div>
             </div> -->

            <!-- <div style="height:30px;"></div> -->
          
             <div class="de_con_l_yc">
                 <div class="de_con_l_yc_c">您的评论</div>
                    <!-- 分享功能 -->
                    <!-- JiaThis Button BEGIN -->
                    <div class="jiathis_style" style="float:right;margin-right:-320px;display:none">
                        <a class="jiathis_button_qzone"></a>
                        <a class="jiathis_button_tsina"></a>
                        <a class="jiathis_button_tqq"></a>
                        <a class="jiathis_button_weixin"></a>
                        <a class="jiathis_button_renren"></a>
                        <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                        <a class="jiathis_counter_style"></a>
                    </div>

                    <script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
                    <!-- <span style="color:#41A6EE;float:right;font-size:13px;margin-right:-130px;">分享:</span> -->

                    <!-- JiaThis Button END -->
                 <!-- <div class="del_xin">★★★★★</div> -->
             </div>
             
             
             

             <form action="" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="micLessonId" value="{{$lessonId}}">             
               <div class="de_con_l_inp">
                   <textarea name="microlessonComment" id="" placeholder="请评论.." cols="98" rows="6" style="resize:none" ng-model="post.microlessonComment"></textarea>
               </div>
               <div class="de_con_l_btn">
                   <button class="de_con_l_btn_b" ng-click="postComment({{$lessonId}})">发布评论</button>
               </div>
             </form>

             <div class="de_con_l_com">
                 <div class="de_con_l_com_t" ng-bind="'用户评价('+ data.commentCount +')'"></div>
                 <div class="de_con_l_com_con">

                     <div class="de_con_l_com_con_lis" ng-repeat="i in data.comment">
                          <!-- <div class="de_con_l_com_con_lis_l" style="background: url('{[i.picture]}') 5px 5px no-repeat;"></div> -->
                          <img class="de_con_l_com_con_lis_l" ng-src="{[i.picture]}">
                          <div class="de_con_l_com_con_lis_m">
                              <div class="de_con_l_com_con_lis_m_t">
                                   <!-- <div class="de_con_l_com_con_lis_m_t_x" star-count ng-value="^^ i.score ^^"></div> -->
                                   <div class="de_con_l_com_con_lis_m_t_u" ng-bind="i.author"></div>
                                   <div class="de_con_l_com_con_lis_m_t_t" ng-bind="i.create_at"></div>
                              </div>
                              <div class="de_con_l_com_con_lis_m_b">
                                   <div class="de_con_l_com_con_lis_m_b_c" ng-bind="i.content"></div>
                                   <div class="de_con_l_com_con_lis_m_b_re" ng-if="i.username == i.author" ng-click="delMicCommet(i.id)">删除</div>
                                   <!-- <div class="de_con_l_com_con_lis_m_b_re">回复(1)</div> -->
                              </div>
                          </div>
                     </div>

                    <div class="li_page" style="padding-left:100px;">
                        <tm-pagination conf="paginationConf"></tm-pagination>
                    </div>

                    <!-- <div class="spinner" style="margin: 80px auto 150;" ng-class="{disable: loading.comment}">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                    </div>
            
                    <div id="errorMessage" style="margin: 80px auto 150;" ng-class="{disable: error.comment}">数据加载失败，请尝试 <a class="click" ng-click="reload('comment');">刷新</a> 一下</div>
                    <div id="errorMessage" style="margin: 80px auto 150;" ng-class="{disable: empty.comment}">该微课还没有评论，赶紧来第一个评论吧！</div> -->

                 </div>
             </div>

             <div class="clear"></div>

            <!--  <div class="li_page">
                <div class="li_page_con">
                    <div class="pg pg_n">1</div>
                    <div class="pg">2</div>
                    <div class="pg">3</div>
                    <div class="pg">4</div>
                    <div class="pg">5</div>
                </div>
             </div> -->

         </div>

         <div class="de_con_r">
            <!-- <div class="de_con_r_t">
               <div class="de_con_r_t_l">评价文档:</div>
               <div class="de_xx">★★★★★</div>
            </div> -->
            <div class="de_con_r_tj">相关课程推荐:</div>

            @if(isset($courserec))
            @foreach($courserec as $course)
            <div class="vde_con_r_con" >
                <a href="{{asset('microLesson/microLessonDetail/'.$course->id  )}}">
                    <div class="vde_con_r_con_t" >{{$course->lessonTitle}}</div>
                </a>
               <div class="vde_con_r_con_b">
                    <!-- <div class="del_xin2" star-count ng-value="^^ i.score ^^"></div> -->
                    <div class="vde_con_r_con_b_ll">点赞:{{$course->likeNum}}</div>
                    <div class="vde_con_r_con_b_ll">浏览:{{$course->viewNum}}</div>
                    <div class="vde_con_r_con_b_rq"><?php echo date('Y-m-d ', ($course->addTime)/1000); ?></div>
               </div>
            </div>
            @endforeach
            @elseif(!isset($coutrserec))
            <div >暂无相关课程</div>
            @endif
            

            <!-- <div class="spinner" style="margin: 100px auto -0;">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
            </div> -->
         </div>
      </div>

      <!--  举报 弹出层 -->
      <div class="background_color none" ></div>
      <div class="informant none" >
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
                  <textarea name="" id="informant_con" ng-model="upData.content"  maxlength="100" required placeholder="最多可输入100字" ></textarea>
              </div>
          </div>
          <!-- <div style="height:20px;clear:both"></div> -->

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
      
    </div>


@endsection

@section('js')
  <script type="text/javascript">

      var status = {!! session('status') !!};
      console.log(status);
      if(status == 1){
        alert('评论成功');
      }else if(status ==0){
        alert('评论失败');
      }else if(status ==3){
        alert("请输入评论内容！");
      }else{
        alert("请登录,再评论..");
      }

  </script>



<script type="text/javascript">             

      var a=document.getElementById("videoplay");
      function myFunction() {
          timess = document.getElementById("demo").innerHTML="时长："+Math.floor(a.duration/60)+"分"+Math.floor(a.duration%60)+"秒";
          // alert(timess);
      }

</script>




<script>
      var statusB = {!! session('statusB') !!};
      console.log(statusB);
      if (statusB == 1) {
        //清空数据
          alert('请登录！');
          window.location.href = '/';
      }else if(statusB == 3){
          alert('操作失败，请重试！');
          //去除弹出 灰背景
          $('.background_color').fadeOut("fast");
      }else{
        //清空数据
        alert('已提交！');
        //去除弹出 灰背景
        $('.background_color').fadeOut("fast");
      }
</script>


	<script type="text/javascript" src="{{ URL::asset('js/qiyun/microLesson/microLessonDetail.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/qiyun/angular/controller/microLessonDetailController.js') }}"></script>


<script>
$(function(){
    $.ajax({
            alert(111);
                    type:'get',
                    data:{'times':times},
                    url:'{{url('microLesson/microLessonDetail')}}',
                    success:function(data){
                       
                    },
                    dataType:'json',
                    'async':false
                });
});
</script>

@endsection