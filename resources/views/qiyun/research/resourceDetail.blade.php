@extends('qiyun.layouts.layoutHome')

@section('title','备课资源详情')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qiyun/resource/resourceDetail.css') }}">
@endsection

@section('content')
    <div class="body" ng-controller="resourceDetailController">
      <div class="clear"></div>
      <div class="posi">
         <a href=""><div class="li_home"></div></a>
         <a href=""><div class="li_nxt">教研备课 > 备课资源详情</div></a>
      </div>

      <div class="de_con">
         <div class="de_con_l">




            <div class="de_con_l_t" >{{$resDetail->resourceTitle}}</div>
             <div class="info">
                  <div class="info_l" >上传时间: {{$resDetail->create_at}}</div>
                  <div class="info_l" >大小:{{$resDetail->size}}</div>
                  <div class="info_l" >贡献者: {{$resDetail->resourceAuthor}}</div>
                 {{-- <div class="info_l" >点赞数: {{$resDetail->resourceClick}}</div> --}}
                 {{-- <div class="info_l" >浏览:{{$resDetail->resourceView}}</div> --}}
             </div>
             <br />
             <div class="de_con_l_des">简介: {{$resDetail->describes}}</div>
             
             <div class="de_con_l_con">
                @if (in_array($type,['.mp4','.avi','.rmvb','.wmv','.3gp','.flv','.mpg']))
                  <video src="{{ URL::asset($resDetail->resourceurl) }}" width="100%" height="100%" controls="controls" preload>您的浏览器不支持 video 标签。</video>
                @elseif(in_array($type,['.jpg','.jpeg','.gif','.png','.bmp']))
                <div style="width:100%;height:100%;overflow:auto">
                  <img src="{{ URL::asset($resDetail->resourceurl) }}" style="max-width:100%;">
                </div>
                @else
                  <iframe src="{{ URL::asset($resDetail->resourceurl) }}" width="100%" height="100%"></iframe>
                @endif


                <div class="de_con_graybg">
                    <!-- 分享 -->
                    <!-- <div class="de_con_graybg_fx"> -->
                        <!-- <a href="#"><input name="submit" type="image" value="" src="{{asset('image/qiyun/microLesson/newAdd/3.png')}}" class="de_con_graybg_fx_img"></a> -->
                        <!-- <span class="de_con_graybg_fx_span1">分享 {[share]}</span> -->
                    <!-- </div> -->
                     <!-- 收藏 -->
                    <!-- <div class="de_con_graybg_sc"> -->
                        <!-- <input name="submit" type="image" value="" src="{{asset('image/qiyun/microLesson/newAdd/2.png')}}" class="de_con_graybg_sc_img" ng-click="doFav({{$resDetail->id}})"> -->
                        <!-- <span class="de_con_graybg_sc_span1">收藏 {[fav]}</span> -->
                    <!-- </div> -->
                    <!-- 点赞 -->
                    <!-- <div class="de_con_graybg_dz"> -->
                        <!-- <input name="submit" type="image" value="" src="{{asset('image/qiyun/microLesson/newAdd/1.png')}}" class="de_con_graybg_dz_img" ng-click="doClick({{$resDetail->id}})"> -->
                        <!-- <span class="de_con_graybg_dz_span1">{[click]}</span> -->
                    <!-- </div> -->
                </div>
             </div>
         




             <!-- <div class="de_con_l_b">
                 <div class="de_con_l_b_o"></div>
                 <div class="de_con_l_b_t"></div>
             </div> -->

            <!-- <div style="height:30px;"></div> -->
          
             <div class="de_con_l_yc">
                 <!-- <div class="de_con_l_yc_c">您的评论</div> -->
                 <!-- qq,空间,微信 -->
                 <!-- <div class="de_con_l_yc_qq">
                      <div class="de_con_l_yc_qq_6">
                          <a href="#"><input name="submit" type="image" value="" src="{{ URL::asset('image/qiyun/microLesson/newAdd/6.png') }}" /></a>
                      </div>
                      <div class="de_con_l_yc_qq_5">
                          <a href=""><input name="submit" type="image" value="" src="{{ URL::asset('image/qiyun/microLesson/newAdd/5.png') }}" class="de_con_l_yc_qq_5"/></a>
                      </div>
                      <div class="de_con_l_yc_qq_4">
                          <a href=""><input name="submit" type="image" value="" src="{{ URL::asset('image/qiyun/microLesson/newAdd/4.png') }}" class="de_con_l_yc_qq_4"/></a>
                      </div>
                 </div> -->
                 <!-- 微博，朋友圈 -->
                 <!-- <div class="de_con_l_yc_wb">
                      <div class="de_con_l_yc_wb_9">
                          <a href=""><input name="submit" type="image" value="" src="{{ URL::asset('image/qiyun/microLesson/newAdd/9.png') }}" /></a>
                      </div>
                      <div class="de_con_l_yc_wb_8">
                          <a href=""><input name="submit" type="image" value="" src="{{ URL::asset('image/qiyun/microLesson/newAdd/8.png') }}" /></a>
                      </div>
                      <div class="de_con_l_yc_wb_7">
                          <a href=""><input name="submit" type="image" value="" src="{{ URL::asset('image/qiyun/microLesson/newAdd/7.png') }}" /></a>
                      </div>
                 </div> -->
                 <!-- <div class="del_xin">★★★★★</div> -->
             </div>

             <!-- <form action="" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="resourceId" value="{{$resourceId}}">
               <div class="de_con_l_inp">
                   <textarea name="comment" id="" style="resize:none" placeholder="进行评论.." cols="98" rows="6" ng-model="post.comment"></textarea>
               </div>
               <div class="de_con_l_btn">
                   <button class="de_con_l_btn_b" ng-click="postComment({{$resourceId}})">发布评论 </button>
               </div>
             </form>

             <div class="de_con_l_com">
                 <div class="de_con_l_com_t" ng-bind="'用户评价('+ data.commentCount +')'"></div>
                 <div class="de_con_l_com_con">

                     <div class="de_con_l_com_con_lis" ng-repeat="i in data.comment">
                          <img class="de_con_l_com_con_lis_l" src="{[i.picture]}">
                          <div class="de_con_l_com_con_lis_m">
                              <div class="de_con_l_com_con_lis_m_t">
                                   <div class="de_con_l_com_con_lis_m_t_u" ng-bind="i.author"></div>
                                   <div class="de_con_l_com_con_lis_m_t_t" ng-bind="i.create_at"></div>
                              </div>
                              <div class="de_con_l_com_con_lis_m_b">
                                   <div class="de_con_l_com_con_lis_m_b_c" ng-bind="i.content"></div>
                                   <div class="de_con_l_com_con_lis_m_b_re">回复(1)</div>
                              </div>
                          </div>
                     </div>
                     
                    <div class="li_page" style="padding-left:100px;">
                        <tm-pagination conf="paginationConf"></tm-pagination>
                    </div>

                 </div>
             </div>

             <div class="clear" style="height:50px;"></div> -->

         </div>

         <div class="de_con_r" style="float:right">
            <!-- <div class="de_con_r_t">
               <div class="de_con_r_t_l">评价文档:</div>
               <div class="de_xx">★★★★★</div>
            </div> -->
            <div class="de_con_r_tj">相关资源推荐:</div>

            <div class="vde_con_r_con" ng-repeat="i in data.other">
               <!-- <a href="/resource/resourceDetail/^^ i.id ^^"><div class="vde_con_r_con_t" ng-bind="i.title"></div></a> -->
               <a href=" {{url('/resource/resourceDetail/{[i.id]}')}}"><div class="vde_con_r_con_t" ng-bind="i.resourceTitle"></div></a>
               <div class="vde_con_r_con_b">
                    <!-- <div class="del_xin2" star-count ng-value="^^ i.score ^^"></div> -->
                    <div class="vde_con_r_con_b_ll" ng-bind=" '点赞: '+ i.resourceFav"> </div>
                    <div class="vde_con_r_con_b_ll" ng-bind=" '浏览:' + i.resourceView"></div>
                    <div class="vde_con_r_con_b_rq" ng-bind=" i.created_at"></div>
               </div>
            </div>

            <div class="spinner" style="margin: 150px auto -0;" ng-class="{disable: loading.other}">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
            </div>
    
            <div  id="errorMessage" style="margin: 150px auto;" ng-class="{disable: error.other}">数据加载失败，<br>请尝试 <a class="click" ng-click="reload('other');">刷新</a> 一下</div>
            <div  id="errorMessage" style="margin: 150px auto;" ng-class="{disable: empty.other}">没有找到相关资源！</div>

         </div>
      </div>
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
  <script type="text/javascript" src="{{ URL::asset('/js/qiyun/resource/resourceDetail.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('/js/qiyun/angular/controller/resourceDetailController.js') }}"></script>
@endsection